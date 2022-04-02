<?php

// If this file is call directyl, abort.
if (!defined('ABSPATH')) {
    die;
}

/**
 * Plugin Shortcode Functionaliity
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/includes
 * @author     Ahmad <raza.ataki@gmail.com>
 */

if (!class_exists('Widget_and_Shortcode_ws_Shortcodes')) {

    class Widget_and_Shortcode_ws_Shortcodes
    {

        /**
         * The ID of this plugin.
         *
         * @since    1.0.0
         * @access   private
         * @var      string    $plugin_name    The ID of this plugin.
         */
        private $plugin_name;

        /**
         * The version of this plugin.
         *
         * @since    1.0.0
         * @access   private
         * @var      string    $version    The current version of this plugin.
         */
        private $version;

        /**
         * It will be hold all the css for all shortcodes
         */

        protected $shortcode_css;

        /**
         * Temple loader class
         */

        private $template_loader;

        /**
         * Initialize the class and set its properties.
         *
         * @since    1.0.0
         * @param      string    $plugin_name       The name of the plugin.
         * @param      string    $version    The version of this plugin.
         */
        public function __construct($plugin_name, $version)
        {

            $this->plugin_name = $plugin_name;
            $this->version = $version;
            $this->setup_hooks();
        }

        /**
         * Setup action / filter hooks
         */

        public function setup_hooks()
        {
            add_action('wp_enqueue_scripts', array($this, 'register_style'));

        }

        /**
         * Register Placeholder Style
         */

        public function register_style()
        {
            wp_register_style(
                $this->plugin_name . '-shortcodes', // handle
                WIDGET_AND_SHORTCODE_BASE_DIR . 'public/css/rocket-books-shortcodes.css', // src

            );
        }

        /**
         * Shortcode for Books list
         * Usage => [ws_list post_type='post' limit=1 bgcolor='#030303' style='compact' color='#ffffff'][/ws_list]
         */

        public function ws_list($atts, $content)
        {

            $shortcode_post_type = show_post_type_option();

            $shortcode_post_type_bgColor = show_post_type_bgColor_option();

            $shortcode_post_type_style = show_post_type_style_option();

            $shortcode_number_of_post_type = show_post_type_number_option();
            $post_type_readmore_button = show_post_type_readmore_option();

            $atts = shortcode_atts(
                array(
                    'limit' => $shortcode_number_of_post_type,
                    'bgcolor' => $shortcode_post_type_bgColor,
                    'style' => $shortcode_post_type_style,
                    'post_type' => $shortcode_post_type,
                    'color' => '',
                ), // pairs
                $atts, // atts
                'ws_list', // shortcode
            );

            $loop_args = array(
                'post_type' => $atts['post_type'],
                'posts_per_page' => $atts['limit'],

            );

            $loop = new WP_Query($loop_args);

            // Step 1: Register a placeholder

            ob_start();
            ?>


<div class="ws-shortcodes ws-cards <?php echo $atts['style']; ?> " id="ws-main-sec" style="background-color: <?php echo $atts['bgcolor']; ?>; color:<?php echo $atts['color']; ?>">
            <?php
// var_dump($shortcode_number_of_post_type);
            while ($loop->have_posts()):
                $loop->the_post();

                // $template_loader->get_template_part('archive/content', 'book');
                ?>
								<article id="ws-<?php the_ID();?>" <?php post_class('ws-cpt ws-card');?> style="background-color: <?php echo $atts['bgcolor']; ?>;" >
											<?php include WIDGET_AND_SHORTCODE_BASE_DIR . 'templates/archive/ws-content.php';?>
								</article>
										    <?php
    // End the loop.
            endwhile;
            // restore original post
            wp_reset_postdata();
            ?>

</div>

            <?php
return ob_get_clean();
        }

    }

}
