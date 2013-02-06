<?php
/*
 * Template name: Blog masonry
 */
add_action('wp_footer', 'portfolio_script');

function portfolio_script() {
?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/masonry_script.js"></script>
<?php
}

wp_register_script('theme-masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js');
//wp_register_script('theme-portfolio', get_template_directory_uri() . '/js/portfolio_scripts.js');
wp_enqueue_script('jquery');
wp_enqueue_script('theme-masonry');

$pageType = "masonry";

get_header();

global $wp_query;
$current_page_id = $wp_query->post->ID;
?>

<?php get_sidebar(); ?>
<?php // getPageSlider(); ?>
<div class="center-content">
	<?php get_sidebar('right'); ?>
    <!-- <div id="sliderHome"> -->
		<?php // if (function_exists('premium_slider')){ premium_slider(1); }; ?>
	<!-- </div> -->
    <div class="masonry-content masoned masonry-blog">
        <?php
        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {

            $paged = get_query_var('page');
        } else {

            $paged = 1;
        }
		//the_meta();
		// echo "Post:" . $current_page_id;
        $optionss = get_post_meta($current_page_id, 'themeton_additional_options', true);
        $posts_per_page = get_the_option('stonking_blog_postnumber', 5);
		$includecats = '';
		// echo "optiona";
		/* echo "<pre>";
		print_r ($optionss);
		echo "</pre>"; */
		if(isset($optionss['blog_categories'])) {
			$includecats = implode(',', (array) $optionss['blog_categories']);
			$includecats = $includecats ? "category_name='" . $includecats . "'&" : '';
		}
		
        //$query = $includecats . "posts_per_page=" . $posts_per_page . "&paged=$paged"."&ignore_sticky_posts=0";
		$query = $includecats . "posts_per_page=" . $posts_per_page . "&paged=$paged"."&ignore_sticky_posts=0&cat=-69";
        global $more;
        $mymore = $more;
        $more = false;
		wp_reset_query();
        query_posts($query);
        ?>
        <?php get_template_part('loop', 'tumblog'); ?>
    </div>
    <div class="page-masonry">
<?php
        pagination();
?>
    </div>
</div>
<?php get_footer(); ?>