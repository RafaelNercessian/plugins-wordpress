<?php
/**
 * Plugin Name: Youtube Video Gallery
 * Description: Add a youtube video
 * Version: 1.0
 * Author: Rafael Nercessian
 */

if (!defined( 'ABSPATH' )) {
    exit;
}

require_once plugin_dir_path(__FILE__).'includes/youtube-vid-gallery-scripts.php';
require_once plugin_dir_path(__FILE__).'includes/youtube-vid-gallery-shortcodes.php';

if(is_admin()){
    require_once plugin_dir_path(__FILE__).'includes/youtube-vid-gallery-cpt.php';
    require_once plugin_dir_path(__FILE__).'includes/youtube-vid-gallery-fields.php';
    require_once plugin_dir_path(__FILE__).'includes/youtube-vid-gallery-settings.php';
}