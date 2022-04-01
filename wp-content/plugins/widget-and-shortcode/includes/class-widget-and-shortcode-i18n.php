<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://ahmadraza.ga
 * @since      1.0.0
 *
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/includes
 * @author     Ahmad raza <raza.ataki@gmail.com>
 */
class Widget_And_Shortcode_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'widget-and-shortcode',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
