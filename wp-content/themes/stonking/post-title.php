<?php if(!is_single()) { ?>
	<h1 class="article-title"><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('%s', 'stonking'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
<?php } else { ?>
	<h1 class="article-title"><?php the_title(); ?></h1>
	<?php get_template_part('post', 'teaser'); ?>
<?php } ?>
