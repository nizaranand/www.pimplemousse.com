<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="wrapper main main-page">
	    <article role="main" class="content" id="post-<?php the_ID(); ?>">
	    	
	    	<?php if(!has_post_thumbnail()) { ?>
	    		
	    		<?php } else {?>
	    			<span class="post-thumb"><?php if( (isset($general_options[ 'no_nav' ])) && ($general_options[ 'no_nav' ])) { ?>
	    				<?php the_post_thumbnail("archive-thumb"); ?>
	    			<?php } else { ?>
	    				<?php the_post_thumbnail("single-thumb"); ?>
	    			<?php } ?></span>
	    			
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
	  <?php if( (isset($general_options[ 'no_nav' ])) && ($general_options[ 'no_nav' ])) { ?>
	   <?php } else { ?>
	   	<div class="sidebar">
	   		<?php get_sidebar(); ?>
	   	</div>
	   <?php } ?>
</section>
<?php get_footer(); ?>
