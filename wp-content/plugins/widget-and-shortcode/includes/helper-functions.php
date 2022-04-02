<?php
/**
 * Small Archive Blog Excerpt Length
 */
function control_post_type_content()
{
    return 20;
}

add_filter('excerpt_length', 'control_post_type_content', 20);

// add_action('wp_footer', function () {
//     global $wp_post_types;
//     echo "<pre style='background-color:#fff;'>";
//     var_export($wp_post_types);
//     echo "</pre>";
// });

/**
 * These are general settings functions
 */

function show_post_type_number_option()
{
    $show_post_type_number = (get_option('ws_number_of_post_types') == '') ? absint(3) : absint(get_option('ws_number_of_post_types'));
    return $show_post_type_number;
}

function show_post_type_option()
{
    $post_type = (get_option('ws_whole_post_types') == '') ? 'post' : get_option('ws_whole_post_types');
    return $post_type;
}

function show_post_type_bgColor_option()
{
    $post_type_bgColor = (get_option('ws_color_of_cards') == '') ? '#D9F1FC' : get_option('ws_color_of_cards');

    return $post_type_bgColor;
}

function show_post_type_style_option()
{
    $post_type_style = (get_option('ws_radio_button_input') == 'compact') ? get_option('ws_radio_button_input') : 'normal';

    return $post_type_style;
}

function show_post_type_readmore_option()
{
    $post_type_readmore_button = (get_option('ws_read_more_of_post_types') == '') ? 'Find out more' : get_option('ws_read_more_of_post_types');

    return $post_type_readmore_button;
}

/**
 * These are shortcode setting functions
 */

function shortcode_number_of_post_type()
{
    $shortcode_number_of_post_type = absint(get_option('ws_advance_number_of_post_types')) ?? absint(3);
    return $shortcode_number_of_post_type;
}

function shortcode_post_type_option()
{
    $shortcode_post_type = (get_option('ws_advance_whole_post_types') == '') ? 'post' : get_option('ws_advance_whole_post_types');
    return $shortcode_post_type;
}

function shortcode_post_type_bgColor_option()
{
    $shortcode_post_type_bgColor = (get_option('ws_advance_color_of_cards') == '') ? '#D9F1FC' : get_option('ws_advance_color_of_cards');

    return $shortcode_post_type_bgColor;
}

function shortcode_post_type_style_option()
{
    $shortcode_post_type_style = get_option('ws_advance_select_layout') ?? 'column-three';

    return $shortcode_post_type_style;
}

function shortcode_post_type_readmore_option()
{
    $shortcode_post_type_readmore_button = (get_option('ws_advance_read_more_of_post_types') == '') ? 'Find out more' : get_option('ws_advance_read_more_of_post_types');

    return $shortcode_post_type_readmore_button;
}
