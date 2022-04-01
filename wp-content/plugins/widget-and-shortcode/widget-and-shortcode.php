<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ahmadraza.ga
 * @since             1.0.0
 * @package           Widget_And_Shortcode
 *
 * @wordpress-plugin
 * Plugin Name:       WP Widget and Shortcode
 * Plugin URI:        https://ahmadraza.ga
 * Description:       In this plugin, you can select registered post types and show them on the frontend in card layouts with limits and you can add the Read More button to show more detail.
 * Version:           1.0.0
 * Author:            Ahmad raza
 * Author URI:        https://ahmadraza.ga
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       widget-and-shortcode
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WIDGET_AND_SHORTCODE_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-widget-and-shortcode-activator.php
 */
function activate_widget_and_shortcode()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-widget-and-shortcode-activator.php';
    Widget_And_Shortcode_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-widget-and-shortcode-deactivator.php
 */
function deactivate_widget_and_shortcode()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-widget-and-shortcode-deactivator.php';
    Widget_And_Shortcode_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_widget_and_shortcode');
register_deactivation_hook(__FILE__, 'deactivate_widget_and_shortcode');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-widget-and-shortcode.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_widget_and_shortcode()
{

    $plugin = new Widget_And_Shortcode();
    $plugin->run();

}
run_widget_and_shortcode();
