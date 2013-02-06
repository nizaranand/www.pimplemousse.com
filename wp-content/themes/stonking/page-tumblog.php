<?php
/*
 * Template name: Tumblog
 */
global $use_tumb;
$use_tumb = true;
get_header();
?>
<?php get_sidebar(); ?>
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
	$includecats = implode(',', (array) $optionss['blog_categories']);
	$sticky = get_option('sticky_posts');
	$query = Array(
	    'category_name' => $includecats,
	    'posts_per_page' => $posts_per_page,
	    'paged' => $paged,
	   // 'post__in' => get_option('sticky_posts'),
	    'ignore_sticky_posts' => 0
	);
	//$query = 'category_name=' . $includecats . "&posts_per_page=" . $posts_per_page . "&paged=$paged";
	wp_reset_query();
	global $more;
	$mymore = $more;
	$more = false;
	query_posts($query);
	?>
	<?php
	get_template_part('loop', 'tumblog');
	$more = $mymore;
	?>
    </div>
    <div class="page-width">
	<?php
	pagination();
	?>
    </div>
</div>


<?php get_footer(); ?>