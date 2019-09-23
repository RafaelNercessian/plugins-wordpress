<?php
/**
 * Plugin Name: Facebook Footer Link
 * Description: Ads a Facebook profile link to the end of posts
 * Version: 1.0
 * Author: Rafael Nercessian
 */

if (!defined( 'ABSPATH' )) {
    exit;
}

$ffl_options = get_option('ffl_settings');

require_once plugin_dir_path(__FILE__).'includes/facebook-footer-link-script.php';
require_once plugin_dir_path(__FILE__).'includes/facebook-footer-link-content.php';

if(is_admin())
    require_once plugin_dir_path(__FILE__).'includes/facebook-footer-link-settings.php';