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
