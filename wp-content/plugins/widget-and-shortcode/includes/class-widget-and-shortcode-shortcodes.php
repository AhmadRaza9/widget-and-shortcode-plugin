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
            show_post_types($atts);
        }

    }

}
