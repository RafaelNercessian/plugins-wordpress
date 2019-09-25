<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/09/2019
 * Time: 09:17
 */

function yvg_list_videos($atts, $content = null)
{
    global $post;

    $atts = shortcode_atts(array(
        'title' => 'Video Gallery',
        'count' => 20,
        'category' => 'all'
    ), $atts);

    if ($atts['category'] == 'all') {
        $terms = '';
    } else {
        $terms = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }

    $args = array(
        'post_type' => 'video',
        'post_status' => 'publish',
        'orderby' => 'created',
        'order' => 'ASC',
        'posts_per_page' => $atts['count'],
        'tax_query' => $terms
    );

    $videos = new WP_Query($args);
    if ($videos->have_posts()) {
        $category = str_replace('-', '', $atts['category']);
        $output = '';
        $output .= '<div class="video-list">';
        while ($videos->have_posts()) {
            $videos->the_post();
            $video_id = get_post_meta($post->ID, 'video_id', true);
            $details = get_post_meta($post->ID, 'details', true);
            $output .= '<div class="yvg-video">';
            $output .= '<h4>' . get_the_title() . '</h4>';
            if(get_option('yvg_setting_disable_fullscreen')){
                $output .= '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>';
            }else{
                $output .= '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            }
            $output .= '<div>' . $details . '</div>';
            $output .= '</div>';
        }
        wp_reset_postdata();
        return $output;
    } else {
        return '<p>No Videos Found</p>';
    }
}

add_shortcode('videos','yvg_list_videos');