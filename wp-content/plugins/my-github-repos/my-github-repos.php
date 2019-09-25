<?php
/**
 * Plugin Name: My Github Repos
 * Description: Display User Repos in Widget
 * Version: 1.0
 * Author: Rafael Nercessian
 */

if (!defined( 'ABSPATH' )) {
    exit;
}

require_once plugin_dir_path(__FILE__).'/includes/my-github-repos-class.php';
require_once plugin_dir_path(__FILE__).'/includes/my-github-repos-scripts.php';

function mgr_register_widget() {
    register_widget('WP_My_Github_Repos');
}
add_action('widgets_init', 'mgr_register_widget');