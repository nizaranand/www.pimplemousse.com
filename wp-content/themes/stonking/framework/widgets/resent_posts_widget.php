<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ResentTumbPostWidget extends WP_Widget {

    // var $widget_ops = array( 'classname' => 'TwitterWidget', 'description' => 'An example widget that displays a person\'s name and sex.' );
    // var $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'TwitterWidget-widget' );
    function ResentTumbPostWidget() {
        $widget_ops = array('classname' => 'RecentTumbPostWidget', 'description' => 'Recent posts with Thumbnail.');
        // $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'TwitterWidget-widget');
        // parent::WP_Widget(false, $name = 'WenderHost Subpages', $widget_ops);
        parent::WP_Widget(false, 'Themeton recent posts', $widget_ops);
    }

    function widget($args, $instance) {
	global $pageType;
        extract($args);

        /* User-selected settings. */
        $title = apply_filters('widget_title', $instance['title']);
        $post_count = $instance['number_posts'];
        if (!$post_count) {
            $post_count = 5;
        }
        $cats = (array) $instance['post_category'];


        $q = 'posts_per_page=' . $post_count;
        if ($instance['post_type'] != 'post') {
            $q = $q . '&post_type=' . $instance['post_type'];
        }
        if (count($cats) > 0) {
            $typ = 'cat';
            if ($instance['post_type'] != 'post')
                $typ = 'terms';
            $catq = '&' . $typ . '=';
            $sp = '';
            foreach ($cats as $mycat) {
                $catq = $catq . $sp . $mycat;
                $sp = ',';
            }
            $q = $q . $catq;
        }
        if ($instance['post_order'] == 'commented')
            $q = $q . '&orderby=comment_count';
	
	query_posts($q);
        if (function_exists('render_post_' . $instance['theme']))
            call_user_func('render_post_' . $instance['theme'], $args, $title);
        else {
            /* Before widget (defined by themes). */
            echo $before_widget;

            /* Title of widget (before and after defined by themes). */
            if ($title)
                echo $before_title . $title . $after_title;
            
	    echo '<ul class="post-list">';
            if (have_posts ()) : while (have_posts ()) : the_post();
                global $id;
                
		$feat_img = get_post_meta($id, 'featured_image', true);
		if (!$feat_img) {
		    $feat_img = get_post_image();
		    if (!$feat_img || $feat_img == '/images/default.jpg') {
			if (get_option('doma_default_avatar') != '')
			    $feat_img = get_option('doma_default_avatar');
			else
			    $feat_img = get_template_directory_uri() . "/images/avatar.jpg";
		    }
		}

                print '<li class="recent-news-item">';
                if ($instance['theme'] == 'post_thumbnailed') {
                    print '<div class="date post-image-widget">
                    <a class="preload" href="';
		    the_permalink();
		    print '">';
		    if(has_post_thumbnail($post->ID)){
			if ($instance['post_order'] == 'commented' && $pageType != "masonry")
			    the_post_thumbnail('sidebar-thumb-little');
			else
			    the_post_thumbnail('sidebar-thumb');	
		    }else{
			print '<img src="'.get_post_image().'">';
    
		    }
		    print '</div>';
                }
                    print '<div class="post-data post-title-widget';
                    if (!$instance['theme'] != 'post_thumbnailed')
                        print '-full';
                    print '"><a href="';
                    the_permalink();
                    print '">';
                    the_title();
                    print '</a>';
                    if ($instance['date_show'])
                        print '<span class="twitter-time">' . get_the_date() . '</span>';
                    print '</div>';
                    print '<div class="cleared"></div>';
                    print '</li>';
                endwhile;
            else:

            endif;
            echo '</ul>';
            echo $after_widget;
        }

        wp_reset_query();
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        /* Strip tags (if needed) and update the widget settings. */
        $instance['title'] = strip_tags($new_instance['title']);
        $arr = ($new_instance['post_category']);
        if ($new_instance['post_type'] == 'post') {
            $instance['post_category'] = $_REQUEST['post_category'];
        } else {
            $tax = get_object_taxonomies($new_instance['post_type']);
            $instance['post_category'] = $_REQUEST['tax_input'][$tax[0]];
        }
        $instance['number_posts'] = strip_tags($new_instance['number_posts']);
        $instance['post_type'] = strip_tags($new_instance['post_type']);
        $instance['post_order'] = strip_tags($new_instance['post_order']);
        $instance['theme'] = strip_tags($new_instance['theme']);
        $instance['date_show'] = strip_tags($new_instance['date_show']);
        //$instance['sex'] = $new_instance['sex'];
        //$instance['show_sex'] = $new_instance['show_sex'];

        return $instance;
    }

    function form($instance) {

        //Output admin widget options form
        extract(shortcode_atts(array(
                    'title' => '',
                    'number_posts' => 5,
                    'post_type' => 'post'
                        ), $instance));
        $defaultThemes = Array(Array("name" => 'Thumbnailed posts', 'user_func' => 'post_thumbnailed'),
            Array("name" => 'Default posts', 'user_func' => 'post_nonthumbnailed')
        );
        $themes = apply_filters('tt_resent_posts_widget_theme_list', $defaultThemes);
        $defaultPostTypes = Array(Array("name" => 'Post', 'post_type' => 'post'));
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>"  />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('theme'); ?>">Show type:</label>
            <select class="widefat" id="<?php echo $this->get_field_id('theme'); ?>" name="<?php echo $this->get_field_name('theme'); ?>">
        <?php
        foreach ($themes as $theme) {
        ?>
            <option value="<?php print $theme['user_func'] ?>" <?php echo selected($instance['theme'], $theme['user_func']); ?>><?php print $theme['name'] ?></option>
        <?php
        }
        ?>
    </select>
</p>

<p>
    <label for="<?php echo $this->get_field_id('date_show'); ?>">Show Date:</label>
    <input class="checkbox" type="checkbox" <?php checked($instance['date_show'], true); ?> value="1"  id="<?php echo $this->get_field_id('date_show'); ?>" name="<?php echo $this->get_field_name('date_show'); ?>"   />
</p>
<p>
    <label for="<?php echo $this->get_field_id('post_order'); ?>">Post order:</label>
    <select class="widefat" id="<?php echo $this->get_field_id('post_order'); ?>" name="<?php echo $this->get_field_name('post_order'); ?>">
        <option value="latest" <?php if ($instance['post_order'] == 'latest')
            print 'selected="selected"'; ?>>Latest posts</option>
        <option value="commented" <?php if ($instance['post_order'] == 'commented')
                    print 'selected="selected"'; ?>>Most commented posts</option>
    </select>
</p>
<?php
                $customTypes = apply_filters('tt_resent_posts_widget_type_list', $defaultPostTypes);
                if (count($customTypes) > 0) {
?>
                    <p>
                        <label for="<?php echo $this->get_field_id('post_type'); ?>">Post from:</label>
                        <select rel="<?php echo $this->get_field_id('post_cats'); ?>" onChange="get_post_terms(this);" class="widefat" id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>">
        <?php
                    foreach ($customTypes as $postType) {
        ?>
                        <option value="<?php print $postType['post_type'] ?>" <?php echo selected($post_type, $postType['post_type']); ?>><?php print $postType['name'] ?></option>
        <?php
                    }
        ?>
                </select>
            </p>
<?php
                }
?>
                <p>
                    If you were not selected for cats, it will show all categories.
                </p>

                <div id="<?php echo $this->get_field_id('post_cats'); ?>" style="height:150px; overflow:auto; border:1px solid #dfdfdf;">

    <?php
                //$post_type='post';
                $tax = get_object_taxonomies($post_type);

                $selctedcat = false;
                if ($instance['post_category'] != '')
                    $selctedcat = $instance['post_category']; wp_terms_checklist(0, array('taxonomy' => $tax[0], 'checked_ontop' => false, 'selected_cats' => $selctedcat));
    ?>
            </div>

            <p>
                <label for="<?php echo $this->get_field_id('number_posts'); ?>">Number of posts to show:</label>
                <input  id="<?php echo $this->get_field_id('number_posts'); ?>" name="<?php echo $this->get_field_name('number_posts'); ?>" value="<?php echo $number_posts; ?>" size="3"  />
            </p>
<?php
            }

        }

        add_action('widgets_init', create_function('', 'return register_widget("ResentTumbPostWidget");'));
        add_action('wp_ajax_themeton_resent_post_terms', 'get_post_type_terms');

        function get_post_type_terms() {
            $cat = 'post';
            if ($_REQUEST['post_format'] != '')
                $cat = $_REQUEST['post_format'];
            $tax = get_object_taxonomies($cat);
            wp_terms_checklist(0, array('taxonomy' => $tax[0], 'checked_ontop' => false, 'selected_cats' => false));
            die;
        }

        add_filter('tt_resent_posts_widget_type_list', 'post_protfolio_type');
        add_action('wp_ajax_get_portfolio_terms', 'post_type_portfolio_terms');

        function post_type_portfolio_terms() {

        }

        function post_protfolio_type($types) {
            $types[] = Array('name' => 'Portpolios', 'post_type' => 'portfolio');
            return $types;
        }
?>
