<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 24/09/2019
 * Time: 06:51
 */

function ns_add_scripts(){
    wp_enqueue_style('ns-main-style',plugins_url().'/newsletter_subscriber/css/style.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('ns-main-script',plugins_url().'/newsletter_subscriber/js/main.js');
}

add_action('wp_enqueue_scripts','ns_add_scripts');