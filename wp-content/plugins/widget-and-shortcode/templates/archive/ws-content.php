<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php
$shortcode_post_type_readmore_button = show_post_type_readmore_option();
?>

<article id="ws-<?php the_ID();?>" <?php post_class('ws-cpt');?>>
	<header class="ws-entry-header">
        <?php if (has_post_thumbnail()): ?>
            <div class="ws-entry-img">
                <a href="<?php echo get_post_permalink(); ?>">
                <?php the_post_thumbnail('medium-large');?>
                </a>
            </div>
        <?php endif;?>
    </header>

	<div class="ws-entry-content">
        <?php the_title(sprintf('<h3 class="ws-entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h3>');?>
<p>
<?php echo apply_filters('ws_control_content', wp_trim_words(get_the_content(), 20)); ?>
</p>
<a class="ws-button" href="<?php the_permalink(get_the_ID());?>"><?php echo $shortcode_post_type_readmore_button; ?></a>

	</div><!-- .entry-content -->

</article>


