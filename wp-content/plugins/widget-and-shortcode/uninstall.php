<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://ahmadraza.ga
 * @since      1.0.0
 *
 * @package    Widget_And_Shortcode
 */

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

$option_ids_to_delete = array(
    0 => 'ws_advance_color_of_cards',
    1 => 'ws_advance_number_of_post_types',
    2 => 'ws_advance_read_more_of_post_types',
    3 => 'ws_advance_select_layout',
    4 => 'ws_advance_whole_post_types',
    5 => 'ws_color_of_cards',
    6 => 'ws_number_of_post_types',
    7 => 'ws_radio_button_input',
    8 => 'ws_read_more_of_post_types',
    9 => 'ws_whole_post_types',

);

if (current_user_can('manage_options')) {
    foreach ($option_ids_to_delete as $option_id) {
        delete_option($optioin_id);
    }
}
