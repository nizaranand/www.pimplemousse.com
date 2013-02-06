<?php
get_header(); 
?>
<?php
$title = __(get_the_option('stonking_trans_searchresult', 'Search result for')) . ' : ' . '<span>' . get_search_query() . '</span>';
?>
<?php get_sidebar(); ?>
<div class="center-content">
    <div class="content-fixed-sidebar">
		<?php if (have_posts ()) : ?>
			<div class="standard-page-title">
				<h1 class="page-title"><?php print $title; ?></h1>
			</div>
		<?php
			get_template_part('loop', 'search');
		?>
		<?php else : ?>
				<div class="no-results not-found">
					<div class="standard-page-title">
						<h1 class="page-title"><?php echo get_the_option('stonking_trans_nothingfound') ?></h1>
						<div class="entry-content">
							<p><?php echo get_the_option('stonking_trans_nothingfoundtext'); ?></p>
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>