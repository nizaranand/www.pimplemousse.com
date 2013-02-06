<?php
/*
 * Template name: Blog
 */

get_header();
global $current_page_id;
$current_page_id=$post->ID;
?>

<?php get_sidebar(); ?>
<?php  getPageSlider(); ?>
<div class="center-content">
    <div class="content-fixed-sidebar">
        <?php
        if (get_query_var('paged')) {

            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {

            $paged = get_query_var('page');
        } else {

            $paged = 1;
        }
        $optionss = get_post_meta($post->ID, 'themeton_additional_options', true);
        $posts_per_page = get_the_option('stonking_blog_postnumber', 5);
		$includecats = array();
		if(isset($optionss['blog_categories'])) {
			$includecats = implode(',', (array) $optionss['blog_categories']);
			$includecats = $includecats ? "category_name='" . $includecats . "'&" : '';
		}
        $query = $includecats . "posts_per_page=" . $posts_per_page . "&paged=$paged"."&ignore_sticky_posts=0";
		/*$q_str = array(
			'category_name' => $includecats,
			'posts_per_page' => $posts_per_page,
			'paged' => $paged,
			'ignore_sticky_posts' => 0,
		);*/
        global $more;
        $mymore = $more;
        $more = false;
		wp_reset_query();
        query_posts($query);
        ?>
        <?php get_template_part('loop', 'tumblog'); ?>
    </div>
    <div class="page-width">
        <?php
        pagination();
        ?>
    </div>
</div>
        <?php get_footer(); ?>