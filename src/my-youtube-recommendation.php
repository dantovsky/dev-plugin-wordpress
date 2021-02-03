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

 // Best Practices
 // https://developer.wordpress.org/plugins/plugin-basics/best-practices/

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

$my_my_yt_rec_admin = new My_Youtube_Recommendation_Admin(
    MY_YOUTUBE_RECOMMENDATION_BASENAME,
    MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG,
    MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME,
    MY_YOUTUBE_RECOMMENDATION_VERSION
);

/*

Fatal error: Uncaught Error: Call to undefined function add_setting_section() in
/var/www/html/wp-content/plugins/my-youtube-recommendation/includes/class-my-youtube-recommendation-admin.php:128 Stack trace:

#0 /var/www/html/wp-includes/class-wp-hook.php(287): My_Youtube_Recommendation_Admin->page_init('')
#1 /var/www/html/wp-includes/class-wp-hook.php(311): WP_Hook->apply_filters(NULL, Array)
#2 /var/www/html/wp-includes/plugin.php(484): WP_Hook->do_action(Array)
#3 /var/www/html/wp-admin/admin.php(175): do_action('admin_init')
#4 /var/www/html/wp-admin/plugins.php(10): require_once('/var/www/html/w...')
#5 {main} thrown in /var/www/html/wp-content/plugins/my-youtube-recommendation/includes/class-my-youtube-recommendation-admin.php on line 128

*/
