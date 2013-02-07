<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php if ( ( is_single() ) || ( is_archive() ) || ( !is_page() ) ) { ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	<?php endif; ?>
<?php } ?>
<?php if ( (is_page()) && (!is_page_template('page-contact.php')) ) { ?>
	<?php if( $general_options[ 'hide_page_menu' ] ) {
	// no nothing
	} else { ?>	<h5><?php echo sanitize_text_field( $content_options['navigation'] );?></h5>
	<ul>
	    <?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
	    <?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
	</ul>
	<?php } ?>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Widget Area')) : ?>
		<div class="widgets">
		</div>
	<?php endif; ?>
<?php } ?>
<?php if ( is_page_template('page-contact.php') ) { ?>	
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact Widget Area')) : ?>
		<div class="widgets">
		</div>
	<?php endif; ?>
<?php } ?>

