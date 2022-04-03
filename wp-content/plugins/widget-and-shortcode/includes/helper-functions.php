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

/**
 *
 * Loop function for shortcode and widget
 *
 */

function show_post_types()
{
    $args = array(
        'post_type' => show_post_type_option(),
        'posts_per_page' => absint(show_post_type_number_option()),
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()):
        while ($loop->have_posts()):
            $loop->the_post();
            ?>
		<div class="ws-card" style="background-color: <?php echo show_post_type_bgColor_option(); ?>;">
		<?php if (has_post_thumbnail()): ?>
		        <div class="ws-card-img">
		        <?php the_post_thumbnail('small');?>
		        </div>
		        <?php endif;?>
	<div class="ws-card-content">
	<h3><a href="<?php the_permalink(get_the_ID());?>"> <?php the_title();?></a></h3>

	<?php apply_filters('ws_custom_excerpt_length', __(the_excerpt()));?>

	<a class="ws-buttom" href="<?php the_permalink(get_the_ID());?>"> <?php echo show_post_type_readmore_option(); ?></a>

	</div>
	</div>

							<?php

    endwhile;
    endif;
}