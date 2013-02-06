<?php
/*
 * Template name: Home
 */
get_header();
global $current_page_id;
$current_page_id=$post->ID;
?>
<?php get_sidebar(); ?>
<?php getPageSlider(); ?>
<div class="home-center-content">
    <div class="home-bottom">
	<?php 
		global $more;
		$mymore=$more;
		$more=false;
		$optionss = get_post_meta($post->ID, 'themeton_additional_options', true);
		wp_reset_query();
	if(isset($optionss['home_content_latest']) && $optionss['home_content_latest'] == 'true') {
		query_posts('posts_per_page=3');
		if(have_posts()) {
			while(have_posts ()){ the_post();
				$id = $post->ID;
			?>
				<div class="home-3">
					<h1 id="hh3"><?php the_title(); ?></h1>
					<?php 
					$galleryurl = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'gallery-link' );
					if ($galleryurl) {?>
						<img src="<?php echo $galleryurl[0] ? $galleryurl[0] : get_template_directory_uri().'/images/featured.jpg'; ?>" alt="<?php the_title(); ?>"/>
					<?php }
					else { ?>
						<img src="<?php echo get_template_directory_uri();?>/images/no-img.jpg" alt=""/>
					<?php } ?>
					<?php $more=false; the_content(__(get_the_option('stonking_trans_readmore', 'Read more'), 'stonking')); ?>
				</div>
			<?php }
		}
	} else {		
		$post_array=array();
		for ($ii = 1; $ii < 4; $ii++) {
			if(isset($optionss['home_content'.$ii]) && $optionss['home_content'.$ii] != ''){
				array_push($post_array, $optionss['home_content'.$ii]);
			}
		}
		query_posts(array('post__in' => $post_array));
		//print_r($post_array);
		for ($i = 0; $i < sizeof($wp_query->posts); $i++) {
		   $posts_by_id[$wp_query->posts[$i]->ID] = $i;
		}
		foreach ($post_array as $id) {			
		  //if ($i = $posts_by_id[$id]) {
			
			$post = $wp_query->posts[$posts_by_id[$id]];
			setup_postdata($post);
			?>
				<div class="home-3">
					<h1 id="hh3"><?php the_title(); ?></h1>
					<?php 
					$galleryurl = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'gallery-link' );
					if ($galleryurl) {?>
						<img src="<?php echo $galleryurl[0] ? $galleryurl[0] : get_template_directory_uri().'/images/featured.jpg'; ?>" alt="<?php the_title(); ?>"/>
					<?php }
					else { ?>
						<img src="<?php echo get_template_directory_uri();?>/images/no-img.jpg" alt=""/>
					<?php } ?>
					<?php $more=false; the_content(__(get_the_option('stonking_trans_readmore', 'Read more'), 'stonking')); ?>
				</div>
			<?php //}
		}
	}
		wp_reset_query();
	?>
        <div class="clearfix"></div>
        <div class="footer-home">
            <?php get_footer(); ?>
        </div>
    </div>
</div>