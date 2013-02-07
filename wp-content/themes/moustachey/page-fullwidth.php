<?php
/**
 Template Name: Page - Full Width
 *
 * @package WordPress
 * @subpackage Moustachey
 * @since Moustachey 1.0
 */
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="wrapper main full-page">
	    <article role="main" class="content" id="post-<?php the_ID(); ?>">
	    	
	    	<?php if(!has_post_thumbnail()) { ?>
	    		
	    		<?php } else {?>
	    			<span class="post-thumb"><?php the_post_thumbnail("archive-thumb"); ?></span>
	    		<?php } ?> 
	    		<div class="hgroup single-hold">
	    			    <h1><?php the_title(); ?></h1>
	    		</div>
	    		<div class="single-hold">
	        		<?php the_content(); ?>
		        </div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'meanthemes' ), 'after' => '</div>' ) ); ?>
	        <?php endwhile; ?>
	    </article>
</section>
<?php get_footer(); ?>
