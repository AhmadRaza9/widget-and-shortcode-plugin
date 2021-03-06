<?php

/**
 *
 *
 * @package Widget_And_Shortcode
 * @subpackage Widget_And_Shortcode/includes
 * @author Ahmad <raza.ataki@gmail.com>
 */

if (!class_exists('Widget_And_Shortcode_Post_Type_List')) {

    class Widget_And_Shortcode_Post_Type_List extends WP_Widget
    {

        /**
         * Sets up the widgets name etc
         */
        public function __construct()
        {
            $widget_ops = array(
                'classname' => 'ws_post_type_list_class',
                'description' => __("Display Post Type List", "widget-and-shortcode"),
            );
            parent::__construct('ws_post_type_list', __("Post Type List ", "widget-and-shortcode"), $widget_ops);
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget($args, $instance)
        {
            // outputs the content of the widget

            // $args array keys
            // array(
            //     0 => 'name',
            //     1 => 'id',
            //     2 => 'description',
            //     3 => 'class',
            //     4 => 'before_widget',
            //     5 => 'after_widget',
            //     6 => 'before_title',
            //     7 => 'after_title',
            //     8 => 'before_sidebar',
            //     9 => 'after_sidebar',
            //     10 => 'show_in_rest',
            //     11 => 'widget_id',
            //     12 => 'widget_name',
            // );

            echo $args['before_widget'];
            echo $args['before_title'];
            // Title will be displayed here
            $title = isset($instance['title']) ? $instance['title'] : '';
            $post_type = isset($instance['post_type']) ? $instance['post_type'] : '';
            echo $title . "<br/>";

            $this->show_post_types_frontend();

            echo $args['after_title'];
            echo $args['after_widget'];

        }

        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form($instance)
        {
            // outputs the options form on admin

            $title = isset($instance['title']) ? $instance['title'] : '';
            $post_type = isset($instance['post_type']) ? $instance['post_type'] : '';

            ?>

            <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'widget-and-shortcode');?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_html($title); ?>" >
            </p>
            <p>
            <label for="<?php echo esc_attr($this->get_field_id('post_type')) ?>"><?php _e('Post Type :', 'widget-and-shortcode')?></label>
            <select name="<?php echo esc_attr($this->get_field_id('post_type')) ?>" class="widefat" id="post_type">
            <?php $all_post_types = get_all_post_types();?>
            <?php foreach ($all_post_types as $single_post_type): ?>
                <option value="<?php echo $single_post_type; ?>"><?php echo $single_post_type; ?></option>
            <?php endforeach;?>
            </select>
            </p>

            <?php

        }

        /**
         * Processing widget options on save
         *
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         *
         * @return array
         */
        public function update($new_instance, $old_instance)
        {
            // processes widget options to be saved
            $sanitized_instance['title'] = sanitize_text_field($new_instance['title']);
            $sanitized_instance['post_type'] = sanitize_text_field($new_instance['post_type']);

            return $sanitized_instance;
        }

        /**
         * Show Post Types
         */
        public function show_post_types_frontend()
        {

            ?>

<?php show_post_types($atts = '');?>
<?php

        }

    }
}
