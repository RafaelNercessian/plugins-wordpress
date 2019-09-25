<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 24/09/2019
 * Time: 16:13
 */

function mgr_add_scripts(){
    wp_enqueue_style('mgr-main-style',plugins_url().'/includes/my-github-repos/css/style.css');
    wp_enqueue_script('mgr-main-script',plugins_url().'/includes/my-github-repos/js/main.js');
}

add_action('wp_enqueue_scripts','mgr_add_scripts');