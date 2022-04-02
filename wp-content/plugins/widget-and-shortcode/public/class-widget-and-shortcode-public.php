<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ahmadraza.ga
 * @since      1.0.0
 *
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/public
 * @author     Ahmad raza <raza.ataki@gmail.com>
 */
class Widget_And_Shortcode_Public
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

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Widget_And_Shortcode_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Widget_And_Shortcode_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/widget-and-shortcode-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Widget_And_Shortcode_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Widget_And_Shortcode_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/widget-and-shortcode-public.js', array('jquery'), $this->version, false);

    }

    /**
     * Load my css     */

    // public function shortcode_public_css()
    // {

    //     wp_register_style('short_code_css', plugin_dir_url(__FILE__), 'css/widget-and-shortcode-Shortcode.css', array(), $this->version, 'all');
    //     wp_enqueue_style('short_code_css');
    // }

    /**
     * Single Template
     */

    public function single_template_blog($template)
    {

        if (is_single()) {
            require_once WIDGET_AND_SHORTCODE_BASE_DIR . 'public/class-widget-and-shortcode-post-type-template-loader.php';
            $template_loader = new WIDGET_AND_SHORTCODE_POST_TYPES_Template_Loader();

            return $template_loader->get_template_part('single', 'ws', false);
        }

        return $template;
    }

    /**
     * Archive Template
     */

    public function archive_template_blog($template)
    {
        if (is_archive()) {
            // template for CPT book
            require_once WIDGET_AND_SHORTCODE_BASE_DIR . 'public/class-widget-and-shortcode-post-type-template-loader.php';
            $template_loader = new WIDGET_AND_SHORTCODE_POST_TYPES_Template_Loader();

            return $template_loader->get_template_part('archive', 'ws', false);
        }
        return $template;

    }

    /**
     *
     * The Content Template
     */
    public function the_content($content)
    {
        if (is_single()) {
            return '<pre>' . $content . '</pre>';
        }
        return $content;
    }

}
