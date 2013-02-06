<?php
/*
 * @package Stonking
 */

get_header();
global $current_page_id;
$current_page_id=$post->ID;
?>
<?php get_sidebar(); ?>
<?php getPageSlider(); ?>
<div class="center-content">
    <div class="content-fixed-sidebar">
	<div class="single-sidebar-box">
		<div id="post-<?php the_ID(); ?>" <?php post_class('single-sidebar'); ?>>
			<div class="heading-text">
				<h1 class="single-heading"><?php the_title(); ?></h1>
				<?php get_template_part('post', 'teaser'); ?>
			</div>
			<?php
				postSlideImage();
				//the_breadcrumb();
			?>
			
		</div>
		<div class="article-content">
        <?php the_post(); the_content(); ?>
			<?php get_template_part('post', 'edit'); ?>
			<?php get_template_part('post', 'author'); ?>
		</div>
		<div class="clearfix"></div>
		<?php if (get_the_option('stonking_comment_receive') == 'Only pages' || get_the_option('stonking_comment_receive') == 'Posts/pages') { comments_template('', true); } ?>
		</div>
    </div>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>