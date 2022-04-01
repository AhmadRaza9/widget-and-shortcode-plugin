<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ahmadraza.ga
 * @since      1.0.0
 *
 * @package    Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/admin/partials
 */
?>
<div class="wrap">
    <h1><?php echo get_admin_page_title(); ?></h1>
    <?php settings_errors();?>
    <form action="options.php" method="POST">
<?php
// Security
settings_fields('ws-settings-page-options-group');

// display section
do_settings_sections('ws-settings-page');

?>
        <?php submit_button();?>
    </form>
</div>