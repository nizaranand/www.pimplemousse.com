<?php get_header(); ?>
<section class="wrapper main full-page">
	    <article role="main" class="content" id="post-<?php the_ID(); ?>">
	    	 <div class="hgroup single-hold">
	    	 	<h1><?php _e( "We're awfully sorry! We cannot find that page", "meanthemes" ); ?></h1>
	    	 </div>
	    	 <div class="single-hold">
	      		 <p><?php _e( "Sorry, we can't find that page, please try clicking on the navigation above.", "meanthemes" ); ?></p>
	      	</div>
	      </article>		 
</section>
<?php get_footer(); ?>
