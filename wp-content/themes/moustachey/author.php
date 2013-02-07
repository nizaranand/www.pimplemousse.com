<?php get_header(); ?>
 <?php $general_options = get_option( 'meanthemes_theme_general_options_moustachey' ); ?>
 <?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>



<section class="full-page main" role="main">
	<div class="wrapper">
	
	<?php if( (isset($general_options[ 'archive_sidebar' ])) && ($general_options[ 'archive_sidebar' ])) { ?>
		<div class="home-content">
	<?php } ?>
	
	<?php if( (isset($general_options[ 'hide_archive_title' ])) && ($general_options[ 'hide_archive_title' ])) { ?>
		
		<?php } else { ?>
	
	<article role="main" class="content searching" id="post-<?php the_ID(); ?>">
		    <div class="hgroup single-hold">
		           <h1 class="searching">
		           
		           <?php
		           $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
		           ?>
		           <?php echo sanitize_text_field( $content_options['written_by'] ); ?> <span><?php echo $curauth->display_name; ?></span>
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
	
	<?php if( (isset($general_options[ 'archive_sidebar' ])) && ($general_options[ 'archive_sidebar' ])) { ?>
	
		
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
		</div>	
	<?php } ?>
	
</section>

  
<?php get_footer();  ?>