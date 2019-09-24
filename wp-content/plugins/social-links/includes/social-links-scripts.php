<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 23/09/2019
 * Time: 14:44
 */

function sls_add_scripts(){
    wp_enqueue_style('sl-main-style',plugins_url().'/social-links/css/style.css');
    wp_enqueue_script('sl-main-script',plugins_url().'/social-links/css/main.js');
}

add_action('wp_enqueue_scripts','sls_add_scripts');