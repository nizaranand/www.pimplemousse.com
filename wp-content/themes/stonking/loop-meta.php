<?php if (have_posts ()) {
    while (have_posts ()) : the_post(); ?>

	<div class="article-block">
		<div class="article with-meta">
			<?php postSlideImage(); ?>
			<div class="article-content">
				<a href="<?php the_permalink(); ?>"><h1 class="article-title"><?php the_title(); ?></h1></a>
				<?php the_content(__(get_the_option('stonking_trans_readmore', 'Read more'), 'stonking')); ?>
			</div>
		</div>
		<div class="article-fixed-meta">
			<div class="fixed-head">
				<h1 class="article-title"><?php echo showBrief(get_the_title(), 8); ?></h1>
				<span class="article-date"><?php reset_the_date(); the_date(); ?></span>
				<div class="cleared"></div>
			</div>
			<div class="fixed-meta-content">
				<ul class="fixed-meta-list">
					<li class="comment-icon"><?php comments_number(get_the_option('stonking_trans_nocomments'),get_the_option('stonking_trans_onecomment'),'% '.get_the_option('stonking_trans_comments')); ?></li>
					<li class="category-icon"><?php printf(get_the_category_list( ', ' ) ); ?></li>
					<li class="author-icon"><?php echo get_the_option('stonking_trans_postedby'); ?> : <?php the_author_posts_link(); ?></li>
				</ul>
			</div>
		</div>
		<div class="cleared"></div>
	</div>
	<div class="cleared"></div>
<?php endwhile; 
	pagination();
}
?>