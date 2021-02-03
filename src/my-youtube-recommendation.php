<?php

/**
 * @link              https://www.github.com/gabrielfroes/my_youtube_recommendation
 * @since             1.0.0
 * @package           My_Youtube_Recommendation
 *
 * @wordpress-plugin
 * Plugin Name:       My Youtube Recommendation
 * Plugin URI:        https://www.github.com/gabrielfroes/my_youtube_recommendation
 * Description:       Display the last videos from a Youtube channel using Youtube feed and keep always updated even for cached posts.
 * Version:           1.0.0
 * Author:            Gabriel Froes
 * Author URI:        https://www.youtube.com/codigofontetv
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       my-youtube-recommendation
 * Domain Path:       /languages/
 */

// Die if call this file directly
if (! defined('WPINC')) {
  wp_die();
}

// Plugin version
if (! defined('MY_YOUTUBE_RECOMMENDATION_VERSION')) {
  define('MY_YOUTUBE_RECOMMENDATION_VERSION', '1.0.0');
}

// Plugin name
if (! defined('MY_YOUTUBE_RECOMMENDATION_NAME')) {
  define('MY_YOUTUBE_RECOMMENDATION_NAME', 'My Youtube Recommendation');
}

// Plugin slug (folder name)
if (! defined('MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG')) {
  define('MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG', 'my-youtube-recommendation');
}

// Plugin basename
if (! defined('MY_YOUTUBE_RECOMMENDATION_BASENAME')) {
  define('MY_YOUTUBE_RECOMMENDATION_BASENAME', plugin_basename(__FILE__));
}

// Plugin folder
if (! defined('MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR')) {
  define('MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// JSON file name
if (! defined('MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME')) {
  define('MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME', 'my-yt-rec.json');
}

require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation.php';
require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation-json.php';
require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation-shortcode.php';
require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation-widget.php';

if (is_admin()) {
  require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-my-youtube-recommendation-admin.php';
}
