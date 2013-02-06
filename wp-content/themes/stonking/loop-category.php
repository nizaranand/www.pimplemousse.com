<?php if (have_posts ()) {
    while (have_posts ()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('article-block'); ?>>
        <div class="article">
            <div class="article-content">
			<?php postSlideImage(); ?>
			<a href="<?php the_permalink(); ?>"><h1 class="article-title"><?php the_title(); ?></h1></a>
			<?php get_template_part('post', 'meta'); ?>
			<?php get_template_part('post', 'content'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php endwhile; 
	pagination();
}
?>