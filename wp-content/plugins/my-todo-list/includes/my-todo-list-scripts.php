<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 24/09/2019
 * Time: 10:39
 */

function mtl_add_admin_scripts(){
    wp_enqueue_style('mtl-admin-style',plugins_url().'/my-todo-list/css/style-admin.css');
}

add_action('admin_init','mtl_add_admin_scripts');

function mtl_add_scripts(){
    wp_enqueue_style('mtl-style',plugins_url().'/my-todo-list/css/style.css');
    wp_enqueue_script('mtl-script',plugins_url().'/my-todo-list/js/main.js');
}

add_action('wp_enqueue_scripts','mtl_add_scripts');
