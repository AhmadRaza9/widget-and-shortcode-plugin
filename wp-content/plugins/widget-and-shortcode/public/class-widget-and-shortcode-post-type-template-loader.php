<?php

if (!class_exists('WIDGET_AND_SHORTCODE_POST_TYPES_Template_Loader')) {
    if (!class_exists('Gamajo_Template_Loader')) {
        require_once WIDGET_AND_SHORTCODE_BASE_DIR . 'vendor/class-gamajo-template-loader.php';
    }

    class WIDGET_AND_SHORTCODE_POST_TYPES_Template_Loader extends Gamajo_Template_Loader
    {

        /** Prefix for filter names... */
        protected $filter_prefix = 'widget_and_shortcode';

        /** Direcotry name where custom templates for this plugin should be found in the theme... */
        protected $theme_template_directory = 'widget-and-shortcode';

        /** Reference to the root directory path of this plugin */

        protected $plugin_directory = WIDGET_AND_SHORTCODE_BASE_DIR;

        /** Directory name where templates are found in this plugin... */

        protected $plugin_template_directory = 'templates';

    }
}
