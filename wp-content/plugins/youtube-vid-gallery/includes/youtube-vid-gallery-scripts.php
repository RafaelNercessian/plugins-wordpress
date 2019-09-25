<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/09/2019
 * Time: 09:13
 */


function yvg_add_admin_scripts(){
    wp_enqueue_style('yvg-main-admin-style',plugins_url().'/includes/css/style-admin.css');
    wp_enqueue_script('yvg-main-admin-script',plugins_url().'/includes/js/main-admin.js');
}

add_action('admin_init','yvg_add_admin_scripts');

function yvg_add_scripts(){
    wp_enqueue_style('yvg-main-style',plugins_url().'/includes/css/style.css');
    wp_enqueue_script('yvg-main-script',plugins_url().'/includes/js/main.js');
}

add_action('wp_enqueue_scripts','yvg_add_scripts');