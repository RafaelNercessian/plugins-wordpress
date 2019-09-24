<?php
/**
 * Plugin Name: My Todo List
 * Description: Simple todo list plugin
 * Version: 1.0
 * Author: Rafael Nercessian
 */

if (!defined( 'ABSPATH' )) {
    exit;
}

require_once plugin_dir_path(__FILE__).'/includes/my-todo-list-scripts.php';
require_once plugin_dir_path(__FILE__).'/includes/my-todo-list-shortcodes.php';

if(is_admin()){
    require_once plugin_dir_path(__FILE__).'/includes/my-todo-list-fields.php';
    require_once plugin_dir_path(__FILE__).'/includes/my-todo-list-cpt.php';
}