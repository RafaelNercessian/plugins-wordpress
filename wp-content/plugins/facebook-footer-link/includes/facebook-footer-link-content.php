<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 23/09/2019
 * Time: 09:51
 */

function fll_add_footer($content){
    global $ffl_options;
    $footer_output = '<hr>';
    $footer_output .= '<div class="footer_content">';
    $footer_output .= '<span class="dashicons dashicons-facebook"></span>Find me on <a style="color: '.$ffl_options['link_color'].'"target="_blank" href="'. $ffl_options['facebook_url'] .'">Facebook</a>';

    if($ffl_options['show_in_feed']){
        if(is_single() || is_home() && $ffl_options['enable'])
            return $content . $footer_output;
    }else{
        if(is_single() && $ffl_options['enable'])
            return $content . $footer_output;
    }


    return $content;
}

add_filter('the_content','fll_add_footer');