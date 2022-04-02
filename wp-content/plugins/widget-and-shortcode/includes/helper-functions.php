<?php
/* Small Archive Blog Excerpt Length */
function ws_custom_excerpt_length()
{
    return 10;
}
add_filter('excerpt_length', 'ws_custom_excerpt_length', 999);

// function ws_custom_content_length($content)
// {
//     return substr($content, 0, 300);
// }
// add_filter('the_content', 'ws_custom_content_length', 999);

/* These are general settings functions */

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
