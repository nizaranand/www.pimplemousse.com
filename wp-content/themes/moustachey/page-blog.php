<?php 
/**
 Template Name: Page - Blog Layout
 *
 * @package WordPress
 * @subpackage Moustachey
 * @since Moustachey 1.0
 */
get_header(); ?>
 <?php $general_options = get_option( 'meanthemes_theme_general_options_moustachey' ); ?>
 <?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php 
$homeShow = "";
$homePortfolioShow = "";
$blogFull = "";
if (isset($general_options[ 'show_blog_full' ])) {
		$blogFull = $general_options[ 'show_blog_full' ];
	  } 

$homeShow = sanitize_text_field( $general_options['home_amount'] );

?>


<section class="full-page main" role="main">

	<div class="wrapper">
	
	<?php if($general_options[ 'home_sidebar' ] ) { ?>
		<div class="home-content">
	<?php } ?>
		<?php
		$temp = $wp_query;
		$wp_query= null;
		$wp_query = new WP_Query();
		$wp_query->query('&paged='.$paged);
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
<?php
	$paged = get_query_var('paged');
	query_posts('cat=-0&paged='.$paged);
?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<div class="nav-previous"><?php next_posts_link( __( '&lt; Previous', 'meanthemes' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Next &gt;', 'meanthemes' ) ); ?></div>
		</div><!-- #nav-below -->
<?php endif; ?>
	</div>
	
<?php if($general_options[ 'home_sidebar' ] ) { ?>
	
	
	<div class="sidebar">
		<?php get_sidebar(); ?>
	</div>
<?php } ?>
</div>	
	
</section>

  
<?php get_footer();  ?>