<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 23/09/2019
 * Time: 09:33
 */

//Add scripts
function ffl_add_scripts(){
    wp_enqueue_style('ffl-main-style',plugins_url().'/facebook-footer-link/css/style.css');
    wp_enqueue_script('ffl-main-script',plugins_url().'/facebook-footer-link/js/main.js');
}

add_action('wp_enqueue_scripts','ffl_add_scripts');