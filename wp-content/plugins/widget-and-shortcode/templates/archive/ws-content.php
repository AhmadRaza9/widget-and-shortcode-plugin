<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>


<article id="ws-<?php the_ID();?>" <?php post_class('ws-cpt');?>>
	<header class="ws-entry-header">
		<?php the_title(sprintf('<h3 class="ws-entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h3>');?>
	</header>
    <div class="ws-entry-img">

        <a href="<?php echo get_post_permalink(); ?>">
        <?php the_post_thumbnail('medium-large');?>
        </a>
    </div>

	<div class="ws-entry-content">
<?php
// include BLOG_POST_BASE_DIR . "templates/blog-meta.php";

apply_filters('archive_ws_excerpt_length', __(the_excerpt()));

?>

	</div><!-- .entry-content -->

</article>


