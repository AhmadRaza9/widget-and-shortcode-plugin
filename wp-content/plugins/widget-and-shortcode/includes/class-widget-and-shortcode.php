<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://ahmadraza.ga
 * @since      1.0.0
 *
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/includes
 * @author     Ahmad raza <raza.ataki@gmail.com>
 */
class Widget_And_Shortcode
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      Widget_And_Shortcode_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        if (defined('WIDGET_AND_SHORTCODE_VERSION')) {
            $this->version = WIDGET_AND_SHORTCODE_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'widget-and-shortcode';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
        $this->define_widget_hooks();
        $this->define_shortcodes_hooks();

        // $this->archive_template_for_post_type();

    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Widget_And_Shortcode_Loader. Orchestrates the hooks of the plugin.
     * - Widget_And_Shortcode_i18n. Defines internationalization functionality.
     * - Widget_And_Shortcode_Admin. Defines all hooks for the admin area.
     * - Widget_And_Shortcode_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-widget-and-shortcode-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-widget-and-shortcode-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-widget-and-shortcode-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-widget-and-shortcode-public.php';

        /**
         * The class responsible for defining all Widgets related functionality
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-widget-and-shortcode-widgets.php';

        /**
         * The class responsible for defining all shortcodes related functionality
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-widget-and-shortcode-shortcodes.php';

        /**
         * All Helper Functions
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/helper-functions.php';

        $this->loader = new Widget_And_Shortcode_Loader();

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Widget_And_Shortcode_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale()
    {

        $plugin_i18n = new Widget_And_Shortcode_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks()
    {

        $plugin_admin = new Widget_And_Shortcode_Admin($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

        /**
         * Add plugin menu page add in admin menu page using this hook
         */

        $this->loader->add_action('admin_menu', $plugin_admin, 'plugin_menu_settings_using_helper');

    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks()
    {

        $plugin_public = new Widget_And_Shortcode_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        // $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'shortcode_public_css');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

        /**
         * the content template
         */
        // $this->loader->add_action('the_content', $plugin_public, 'the_content');

        /**
         * Single Post template
         */
        // $this->loader->add_filter('single_template', $plugin_public, 'single_template_blog');

        /**
         * Archive Post template
         */
        // $this->loader->add_filter('archive_template', $plugin_public, 'archive_template_blog');

    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Widget_And_Shortcode_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }

/**
 * controlling widgets functionality for our plugin
 */

    public function define_widget_hooks()
    {

        $plugin_widgets = new Widget_And_Shortcode_Widgets(
            $this->get_plugin_name(),
            $this->get_version()
        );

        $this->loader->add_action('widgets_init', $plugin_widgets, 'register_widgets');

    }

    /**
     * Defining all Shortcode for the plugin
     */
    public function define_shortcodes_hooks()
    {

        $plugin_shortcodes = new Widget_and_Shortcode_ws_Shortcodes(
            $this->get_plugin_name(),
            $this->get_version()
        );

        add_shortcode('ws_list', array($plugin_shortcodes, 'ws_list'));

    }

}
