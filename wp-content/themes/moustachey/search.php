<?php get_header(); ?>


<section class="wrapper main full-page">

<?php if ( have_posts() ) { ?>
	    <article role="main" class="content searching" id="post-<?php the_ID(); ?>">
	    	    <div class="hgroup single-hold">
	    	            <h1><?php printf( __( 'Search Results for: %s', 'meanthemes' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	    	    </div>
	    	    </article>
	    	        <?php get_template_part( 'loop-search', 'search' ); ?>

	    		 <?php } else { ?>
	    		 <article role="main" class="content" id="post-<?php the_ID(); ?>">
	    		 	    <div class="hgroup single-hold">
	    		 	           <h1><?php _e( 'Nothing Found', 'meanthemes' ); ?></h1>
	    		 	    </div>
	    		 	    <div class="single-hold">
	    		 	     <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'meanthemes' ); ?></p>
						</div>
	    		 </article>
<?php } ?>
</section>
<?php get_footer(); ?>
