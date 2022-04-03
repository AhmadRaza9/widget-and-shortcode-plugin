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

/** Loop function for shortcode and widget **/

// $shortcode_post_type, $shortcode_post_type_bgColor, $shortcode_post_type_style, $shortcode_number_of_post_type, $post_type_readmore_button

// [ws_list limit=2 bgcolor='#ff0000' style='compact' post_type='post' readmore='Read More'][/ws_list]

function show_post_types($atts)
{
    $atts = shortcode_atts(
        array(
            'limit' => '',
            'bgcolor' => '',
            'style' => '',
            'post_type' => '',
            'readmore' => '',
        ), // pairs
        $atts, // atts
        'ws_list', // shortcode
    );

    $args = array(
        'post_type' => empty($atts['post_type']) ? show_post_type_option() : $atts['post_type'],
        'posts_per_page' => empty($atts['limit']) ? show_post_type_number_option() : $atts['limit'],
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()):
        while ($loop->have_posts()):
            $loop->the_post();
            ?>
												<div id="ws-main-sec" class="ws-shortcodes ws-cards <?php echo empty($atts['style']) ? show_post_type_style_option() : $atts['style']; ?>">
												<div class="ws-card" style="background-color:<?php echo empty($atts['bgcolor']) ? show_post_type_bgColor_option() : $atts['bgcolor']; ?>;">
												<?php if (has_post_thumbnail()): ?>
												<div class="ws-card-img">
												<?php the_post_thumbnail('small');?>
												</div>
												<?php endif;?>
						<div class="ws-card-content">
						<h3><a href="<?php the_permalink(get_the_ID());?>"> <?php the_title();?></a></h3>
						<?php apply_filters('ws_custom_excerpt_length', __(the_excerpt()));?>
						<a class="ws-buttom" href="<?php the_permalink(get_the_ID());?>"><?php echo empty($atts['readmore']) ? show_post_type_readmore_option() : $atts['readmore']; ?></a>
						</div>
						</div>
						</div>
						<?php

    endwhile;
    endif;
}

/**
 * Get All Post Types
 */

function get_all_post_types()
{
    $all_post_type = [];
    $assocs_all_post_type = array();

    $args = array(

        'public' => true,

    );
    $post_types = get_post_types($args, false);
    unset($post_types['attachment']);
    foreach ($post_types as $post_type_obj):
        $labels = get_post_type_labels($post_type_obj);
        array_push($all_post_type, $labels->singular_name);
    endforeach;
    foreach ($all_post_type as $val) {
        $assocs_all_post_type[$val] = $val;
    }
    return $assocs_all_post_type;

}