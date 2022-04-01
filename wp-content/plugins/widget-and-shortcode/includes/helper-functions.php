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

function ws_registered_options()
{
    $whole_options = [];

    $whole_options[] = $show_post_type_number = (get_option('ws_number_of_post_types') == '') ? absint(3) : absint(get_option('ws_number_of_post_types'));

    $whole_options[] = $post_type = (get_option('ws_whole_post_types') == '') ? 'post' : get_option('ws_whole_post_types');

    $whole_options[] = $post_type_bgColor = (get_option('ws_color_of_cards') == '') ? '#D9F1FC' : get_option('ws_color_of_cards');

    $whole_options[] = $post_type_style = (get_option('ws_radio_button_input') == 'compact') ? get_option('ws_radio_button_input') : 'normal';

    $whole_options[] = $post_type_readmore_button = (get_option('ws_read_more_of_post_types') == '') ? 'Find out more' : get_option('ws_read_more_of_post_types');

    return $whole_options;
}
