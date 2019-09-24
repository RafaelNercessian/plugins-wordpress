<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 24/09/2019
 * Time: 10:41
 */

function mtl_list_todos($atts, $content = null)
{
    global $post;
    $atts = shortcode_atts(array(
        'title' => 'My Todos',
        'count' => 10,
        'category' => 'all'
    ),$atts);

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
        'post_type' => 'todo',
        'post_status' => 'publish',
        'orderby' => 'due_date',
        'order' => 'ASC',
        'posts_per_page' => $atts['count'],
        'tax_query' => $terms
    );

    $todos = new WP_Query($args);
    if ($todos->have_posts()) {
        $category = str_replace('-', ' ', $atts['category']);
        $category = strtolower($category);
        $output = '';
        $output .= '<div class="todo-list">';
        while ($todos->have_posts()) {
            $todos->the_post();

            $priority = get_post_meta($post->ID, 'priority', true);
            $details = get_post_meta($post->ID, 'details', true);
            $due_date = get_post_meta($post->ID, 'due_date', true);

            $output .= '<div class="todo">';
            $output .= '<h4>' . get_the_title() . '</h4>';
            $output .= '<div>' . $details . '</div>';
            $output .= '<div class="priority-' . strtolower($priority) . '">'. $priority.'</div>';
            $output .= '<div class="due_date">Due Date: ' . $due_date . '</div>';
            $output .= '</div>';
        }
        $output .= '</div>';
        wp_reset_postdata();
        return $output;
    }else{
        return '<p>No Todos</p>';
    }

}

add_shortcode('todos','mtl_list_todos');