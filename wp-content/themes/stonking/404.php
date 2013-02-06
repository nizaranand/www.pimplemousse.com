<?php
get_header();
?>
<?php get_sidebar(); ?>
<div class="center-content">
    <div class="content-fixed-sidebar">
        <div class="not-found">
			<div class="standard-page-title">
				<h1 class="page-title">
					<?php echo get_the_option('stonking_trans_404title', 'Page not found'); ?>
				</h1>
				<span class="not-found-desc">
					<?php echo get_the_option('stonking_trans_404text'); ?>
				</span>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>