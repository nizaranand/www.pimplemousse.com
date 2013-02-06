<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sociallinkswidget extends WP_Widget {

    // var $widget_ops = array( 'classname' => 'TwitterWidget', 'description' => 'An example widget that displays a person\'s name and sex.' );
    // var $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'TwitterWidget-widget' );
    var $socials_array = array("aim", "amazon", "apple", "bebo", "bookmark", "delicious", "digg", "dribbble", "email", "ember", "facebook", "flickr", "forrst", "gowalla", "mixx", "readernaut", "rss", "sharethis", "skype", "stumbleupon", "tumblr", "twitter", "video", "vimeo", "wordpress", "wrench", "yahoo.png");

    function sociallinkswidget() {
        $widget_ops = array('classname' => 'sociallinkswidget', 'description' => 'Please enter your social site accounts.');
        // $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'TwitterWidget-widget');
        // parent::WP_Widget(false, $name = 'WenderHost Subpages', $widget_ops);
        parent::WP_Widget(false, 'Themeton social links', $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_widget;
        if ($title)
            echo $before_title . $title . $after_title;
        echo '<ul class="socials">';
        foreach ($this->socials_array as $social) {
            if (isset($instance[$social.'_url']) && $instance[$social.'_url'] && $instance[$social.'_url'] != '')
                echo "<li class='social-icons'><a href='" . $instance[$social . '_url'] . "' " . (($social != "email") ? "target='_blank'" : "") . " title='".ucfirst($social)."'><img src='" . get_template_directory_uri() . "/images/social_networking_iconpack/" . $social . "_32.png' alt='".ucfirst($social)."' /></a></li>";
        }
        print '</ul>';
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        /* Strip tags (if needed) and update the widget settings. */
        $instance['title'] = strip_tags($new_instance['title']);

        foreach ($this->socials_array as $social)
            $instance[$social . '_url'] = strip_tags($new_instance[$social . '_url']);

        return $instance;
    }

    function form($instance) {
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo isset($instance['title']) ? $instance['title'] : ''; ?>"  />
        </p>
<?php foreach ($this->socials_array as $social) {
?>
            <p>
                <label for="<?php echo $this->get_field_id($social . '_url'); ?>"><?php echo ucfirst($social); ?> url:</label>
                <input class="widefat" id="<?php echo $this->get_field_id($social . '_url'); ?>" name="<?php echo $this->get_field_name($social . '_url'); ?>" value="<?php echo isset($instance[$social . '_url']) ? $instance[$social . '_url'] : ''; ?>"  />
            </p>
<?php
        }
    }

}

add_action('widgets_init', create_function('', 'return register_widget("sociallinkswidget");'));
?>
