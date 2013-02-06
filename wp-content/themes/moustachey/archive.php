<?php get_header(); ?>
 <?php $general_options = get_option( 'meanthemes_theme_general_options_moustachey' ); ?>
 <?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>



<section class="full-page main" role="main">
	<div class="wrapper">
	
		<?php if($general_options[ 'hide_archive_title' ] ) { ?>
		
		<?php } else { ?>
	
	<article role="main" class="content searching" id="post-<?php the_ID(); ?>">
		    <div class="hgroup single-hold">
		            <h1>
		            <?php if ( is_day() ) : ?>
		            				<?php printf( __( "Daily Archives: <span>%s</span>" , "meanthemes" ), get_the_date() ); ?>
		            <?php elseif ( is_month() ) : ?>
		            				<?php printf( __( "Monthly Archives: <span>%s</span>" , "meanthemes" ), get_the_date('F Y') ); ?>
		            <?php elseif ( is_year() ) : ?>
		            				<?php printf( __( "Yearly Archives: <span>%s</span>" , "meanthemes" ), get_the_date('Y') ); ?>
		            <?php else : ?>
		            				<?php _e( "Archives: " , "meanthemes" ); ?><?php echo single_cat_title(); ?>
		            <?php endif; ?>
		            			</h1>
		    </div>
		    </article>
	<?php } ?>
	
	
		<?php
		rewind_posts();
		if (have_posts()) :
		while (have_posts()) : the_post();
		if(!get_post_format()) {
		   get_template_part('format', 'standard');
		} else {
		   get_template_part('format', get_post_format());
		}
		endwhile;
		endif;
		?>



<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<div class="nav-previous"><?php next_posts_link( __( '&lt; Previous', 'meanthemes' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Next &gt;', 'meanthemes' ) ); ?></div>
		</div><!-- #nav-below -->
<?php endif; ?>

	</div>
</section>

  
<?php get_footer();  ?>