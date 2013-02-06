<div class="single-sidebar-box">
<?php
	if(!is_single()) {	           
		global $more;    // Declare global $more (before the loop).
		$more = 0;       // Set (inside the loop) to display content above the more tag.
		the_content("Lire la suite...");
	} else { 
		the_content();
		if(function_exists('the_ratings')) { the_ratings(); }
		
		?>
		
		<?php
	}
?>
  <?php get_template_part('post', 'edit'); ?>
</div>