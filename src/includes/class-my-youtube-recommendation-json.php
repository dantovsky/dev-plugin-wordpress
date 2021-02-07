<?php

if (! class_exists('My_Youtube_Recommendation_Json')) {

    // This class reads data from Youtube

    class My_Youtube_Recommendation_Json {

        private $channel_id;

        public function __construct($channel_id) {
            $this->channel_id = $channel_id;
        }

        public function from_youtube_feed() {
            $channel_id = $this->channel_id;
            $feed_url = "https://www.youtube.com/feeds/videos.xml?channel_id={$channel_id}";
            $response = wp_remote_get($feed_url);
            $content = wp_remote_retrieve_body($response);

            $content = preg_replace( '/<(\/)?(yt|media)\:/i', '<$1$2_', $content );
            $xml = simplexml_load_string( $content, "SimpleXMLElement", LIBXML_NOCDATA );

            $json = json_encode($xml);
            $content = json_decode($json, true);

            // var_dump($content);
            $videos = array();
            $count = 0;

            // Extract needed fields from Youtube account information
            foreach($content['entry'] as $index => $item) {

                // Channel info
                if($count == 0) {
                    $videos['channel'] = $item['author'];
                    $videos['channel']['avatar'] = $this->get_channel_avatar();
                }

                // Videos list
                $yt_video_id = $item['yt_videoId'];
                $videos['videos'][$count]['id'] = $yt_video_id;
                $videos['videos'][$count]['link'] = "https://youtu.be/{$yt_video_id}";
                $videos['videos'][$count]['thumbnail'] = "https://img.youtube.com/vi/{$yt_video_id}/mqdefault.jpg";
                $videos['videos'][$count]['title'] = $item['title'];
                $videos['videos'][$count]['published'] = $item['published'];
                $videos['videos'][$count]['rating'] = $item['media_group']['media_community']['media_starRating']['@attributes']['average'];
                $videos['videos'][$count]['likes'] = $item['media_group']['media_community']['media_starRating']['@attributes']['count'];
                $videos['videos'][$count]['views'] = $item['media_group']['media_community']['media_starRating']['@attributes']['views'];

                $count++;
            }

            return json_encode($videos);
        }

        private function get_channel_avatar() {

            $channel_id     = $this->channel_id;
            $channel_url    = "https://m.youtube.com/channel/{$channel_id}";
            $response       = wp_remote_get($channel_url);
            $content        = wp_remote_retrieve_body($response);
            $http_code      = wp_remote_retrieve_response_code($response);

            if ($http_code != 200) {
                return;
            }

            $pattern = '/class="appbar-nav-avatar" src="([^"]*)"/i'; // '/class="appbar-nav-avatar" src="([^"]*)"/i';
            preg_match($pattern, $content, $matches); // Does not working

            // var_dump($matches);

            if ($matches[1]) {
                $avatar = $matches[1];
            }

            return $avatar;
        }
    }
}

// $my = new My_Youtube_Recommendation_Json('UCFuIUoyHB12qpYa8Jpxoxow');
// $json = $my->from_youtube_feed();
// var_dump($json);

// $my = new My_Youtube_Recommendation_Json('UCFuIUoyHB12qpYa8Jpxoxow');
// $avatar = $my->get_channel_avatar();
// var_dump($avatar);
