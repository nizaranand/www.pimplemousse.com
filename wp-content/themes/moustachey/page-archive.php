<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php
/**
 Template Name: Page - Archives
 *
 * @package WordPress
 * @subpackage Moustachey
 * @since Moustachey 1.0
 */
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="wrapper main main-page">
	    <article role="main" class="content" id="post-<?php the_ID(); ?>">
	    	
	    	<?php if(!has_post_thumbnail()) { ?>
	    		
	    		<?php } else {?>
	    			<span class="post-thumb"><?php the_post_thumbnail("single-thumb"); ?></span>
	    		<?php } ?> 
	    		<div class="hgroup single-hold">
	    			    <h1><?php the_title(); ?></h1>
	    		</div>
	    		<div class="single-hold">
	        		<?php the_content(); ?>
	        		
	        		<div class="archives">
		        		<h3><?php _e("By month" , "meanthemes"); ?></h3>
		        		<ul>
		        			<?php wp_get_archives(); ?>
		        		</ul>	
		        		
		        		<h3><?php _e("By year" , "meanthemes"); ?></h3>
		        		<ul>
		        			<?php wp_get_archives('type=yearly'); ?>
						</ul>

		        		<h3><?php _e("By category" , "meanthemes"); ?></h3>
		        		<ul>
			        		<?php wp_list_categories('hierarchical=0&title_li='); ?> 
			        	</ul>	
					</div>        		
		        </div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'meanthemes' ), 'after' => '</div>' ) ); ?>
	        <?php endwhile; ?>
	    </article>
	   <?php if($general_options[ 'no_nav' ] ) { ?>
	   <?php } else { ?>
	   	<div class="sidebar">
	   		<?php get_sidebar(); ?>
	   	</div>
	   <?php } ?>
</section>
<?php get_footer(); ?>
