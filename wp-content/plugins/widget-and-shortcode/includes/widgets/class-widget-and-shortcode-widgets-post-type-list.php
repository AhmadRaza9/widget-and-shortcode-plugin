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
            echo $title . "<br/>";

            $show_post_type_number = (get_option('ws_number_of_post_types') == '') ? 3 : get_option('ws_number_of_post_types');

            $post_type = (get_option('ws_whole_post_types') == '') ? 'post' : get_option('ws_whole_post_types');

            $post_type_bgColor = (get_option('ws_color_of_cards') == '') ? '#D9F1FC' : get_option('ws_color_of_cards');

            $post_type_style = (get_option('ws_radio_button_input') == 'compact') ? get_option('ws_radio_button_input') : 'normal';

            $post_type_readmore_button = (get_option('ws_read_more_of_post_types') == '') ? 'Find out more' : get_option('ws_read_more_of_post_types');

            $this->show_post_types_frontend($show_post_type_number, $post_type, $post_type_readmore_button, $post_type_bgColor, $post_type_style);

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

            ?>

            <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'widget-and-shortcode');?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_html($title); ?>" >
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

            return $sanitized_instance;
        }

        /**
         * Show Post Types
         */
        public function show_post_types_frontend($show_post_type_number, $post_type, $post_type_readmore_button, $post_type_bgColor, $post_type_style)
        {
            $args = array(
                'post_type' => $post_type,
                'posts_per_page' => absint($show_post_type_number),
            );

            $loop = new WP_Query($args);
            ?>
<div class="<?php echo $post_type_style; ?>" style="background-color: <?php echo $post_type_bgColor; ?>;">
<?php if ($loop->have_posts()): ?>
  <?php while ($loop->have_posts()): ?>
       <?php $loop->the_post();?>

      <div class="ws-card">
          <?php if (has_post_thumbnail()): ?>
        <div class="ws-card-img">
            <?php the_post_thumbnail(sprintf('<img src="%s"', '>'));?>
        </div>
        <?php endif?>
        <div class="ws-card-content">
          <h3><?php the_title(sprintf('<a href="%s" >', esc_url(get_permalink())), '</a>');?></h3>

          <?php apply_filters('control_post_type_content', __(the_excerpt()));?>

          <a class="ws-buttom" href="<?php the_permalink(get_the_ID());?>"><?php echo $post_type_readmore_button; ?></a>

        </div>
      </div>


    <?php endwhile;?>
<?php endif;?>
</div>

<?php

        }

    }
}
