<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ahmadraza.ga
 * @since      1.0.0
 *
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/admin
 * @author     Ahmad raza <raza.ataki@gmail.com>
 */
class Widget_And_Shortcode_Admin
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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/widget-and-shortcode-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/widget-and-shortcode-admin.js', array('jquery'), $this->version, false);

    }

    /**
     * All the hooks for admin_init
     */

    public function admin_init()
    {

    }

    /**
     * Add admin menu for our plugin
     */

    public function add_admin_menu()
    {

        // Add plugin menu in Admin menu

        add_menu_page(
            'WP Widgets and Shortcode Setting', // page_title
            'WP Widgets & Shortcode', // menu_title
            'manage_options', // capability
            'widget-and-shortcode', // menu_slug
            array($this, 'admin_page_display'), // function
            'dashicons-admin-generic', // icon_url
            60, // position
        );

    }

    /**
     * Admin Page Display
     */

    public function admin_page_display()
    {
        // Old method of saving options
        // include "partials/widget-and-shortcode-admin-display-form-method.php";

        include "partials/widget-and-shortcode-admin-display.php";

    }

    /**
     * To add Plugin Menu and Settings Page
     */

    public function plugin_menu_settings_using_helper()
    {

        require_once WIDGET_AND_SHORTCODE_BASE_DIR . 'vendor/boo-settings-helper/class-boo-settings-helper.php';

        $widget_and_shortcode_settings = array(
            // 'tabs' => true,
            'prefix' => 'ws_',
            'menu' => array(

                'slug' => 'widget-and-shortcode',
                'page_title' => __('WP Widgets and Shortcode Setting', 'widget-and-shortcode'),
                'menu_title' => __('WP Widgets and Shortcode', 'widget-and-shortcode'),
                'manage_options', // capability
                'widget-and-shortcode', // menu_slug
                array($this, 'admin_page_display'), // function
                'dashicons-admin-generic', // icon_url
                60, // position

            ),
            'sections' => array(
                // General Seciton
                array(
                    'id' => 'ws_general_section',
                    'title' => __('General Section', 'widget-and-shortcode'),
                    'desc' => __('These are general settings', 'widget-and-shortcode'),
                ),

            ),
            'fields' => array(
                // fields for General Section
                'ws_general_section' => array(
                    array(
                        'id' => 'test_field',
                        'label' => __('Test Field', 'widget-and-shortcode'),
                    ),
                    array(
                        'id' => 'archive_column',
                        'label' => __('Archive Column', 'widget-and-shortcode'),
                        'type' => 'select',
                        'options' => array(
                            'column-two' => __('Two Columns', 'widget-and-shortcode'),
                            'column-three' => __('Three Columns', 'widget-and-shortcode'),
                            'column-four' => __('Four Columns', 'widget-and-shortcode'),
                            'column-five' => __('Five Columns', 'widget-and-shortcode'),
                        ),
                    ),
                ),
            ),

            'links' => array(
                'plugin_basename' => plugin_basename(WIDGET_AND_SHORTCODE_BASE_FILE),
                'action_links' => true,
            ),
        );

        new Boo_Settings_Helper($widget_and_shortcode_settings);

    }
}
