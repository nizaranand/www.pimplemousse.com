<?php

/* #######################################################################

Set Default values on install 

 ####################################################################### */
 
add_editor_style();

function meanthemes_install()
{
	$defaultGeneral = array(
		"google_analytics" => "",
		"truncate_comment_links" => "",
		"uppercase_titles" => "1",
		"show_strapline" => "",
		"switch_nav" => "",
		"show_blog_full" => "",
		"home_sidebar" => "",
		"archive_sidebar" => "",
		"no_nav" => "",
		"comments_off" => "",
		"show_top_reveal" => "1",
		"blocked_body" => "",
		"show_twitter" => "1",
		"show_social_footer" => "1",
		"show_widget_footer" => "1",
		"social_white" => "1",
		"show_footer_credit" => "1",
		"logo_text" => "1",
		"logoupload" => "",
		"logo_2x_upload" => "",
		"appletouchupload" => get_template_directory_uri().'/apple-touch-icon-precomposed.png',	
		"faviconupload" => get_template_directory_uri().'/favicon.png',
		"swatchupload" => "",
		"emailaddress" => "",
		"googleapikey" => "",
		"googleapill" => "",
		"pinupload" => "",
		"show_contactform" => "1",
		"tweet_count" => "1",
		"hide_archive_title" => "",
		"use_admin_date" => "1",
		"hide_page_menu" => "",
		"no_thumbnail_gallery" => "",
		"no_thumbnail" => "",
		"show_social_share" => "",
		"show_author" => ""
	);
	$defaultSocial = array(
		"twitter" => "",
		"facebook" => "",
		"linkedin" => "",
		"googleplus" => "",
		"zerply" => "",
		"vimeo" => "",
		"youtube" => "",
		"pinterest" => "",
		"dribbble" => "",
		"github" => "",
		"instagram" => "",
		"flickr" => "",
		"rss" => ""
	 );
	$defaultStyling = array(
		"logo_colour" => "",
		"heading_font_colour" => "",
		"menu_active_colour" => "",
		"body_font_colour" => "",
		"link_colour" => "",
		"hover_colour" => "",
		"background_colour" => "",
		"content_background_colour" => "",
		"footer_colour" => "",
		"footer_colour_text" => "",
		"button_colour" => "",
		"button_hover_colour" => "",
		"archive_dark" => "",
		"archive_bright" => "",
		"archive_ondark_text" => "",
		"archive_ondark_link" => "",
		"archive_ondark_link_hover" => "",
		"archive_onbright_text" => "",
		"archive_onbright_link" => "",
		"archive_onbright_link_hover" => "",
		"sidebar_colour" => "",
		"google_map_colour" => "#c84a28",
		"mobile_menu_colour" => "",
		"heading_font" => "",
		"font_family" => "",
		"google_heading_font" => "",
		"google_body_font" => "",
		"googlefonts_advanced" => "",
		"googlefonts_advanced_css" => "body { font-family: INSERT YOUR BODY FONT HERE  }
		
h1, h2, h3, h4, h5, h6, nav, span.site-title, span.strap, .meta, a.more, .format-link a, .format-link p, .format-quote p, .flex-next, .flex-prev, .navigation, a.url, a.comment-date, .comment-reply, p.form-submit input, .single-quote, button, input#searchsubmit { font-family: INSERT YOUR HEADING FONT HERE }",
		"typekit_id" => "",
		"typekit_heading_font" => "",
		"typekit_body_font" => "",
		"adobe_heading_font" => "",
		"main_nav_size" => "",
		"body_size" => "",
		"heading_1" => "",
		"heading_2" => "",
		"heading_3" => "",
		"heading_4" => "",
		"heading_5" => "",
		"heading_6" => "",
		"heading_supersize" => "",
		"site_title_size" => "",
		"strapline_size" => "",
		"css_block" => ""
	 );
	$defaultContent = array(
		"donate_pulldown" => "$",
		"donate_message" => "$50 raised so far",
		"donate_details" => "Thank you to everyone so far, you've been great.",
		"donate_link" => "#",
		"donate_link_text" => "Please continue to sponsor",
		"read_more" => __("Read more", "meanthemes"),
		"view_post" => __("View post", "meanthemes"),
		"navigation" => __("Navigation", "meanthemes"),
		"share_on" => __("Share on: ", "meanthemes"),
		"written_by" => __("By ", "meanthemes"),
		"author_more" => __("See more posts by this author", "meanthemes"),		
		"separator" => __("-", "meanthemes"),
		"contact_us_tab" => __("Contact us", "meanthemes"),
		"contact_us_phone" => __("+44123 456789", "meanthemes"),
		"contact_us_email" => __("themes@meanthemes.com", "meanthemes")
		  
	);
	update_option("meanthemes_theme_general_options_moustachey", $defaultGeneral);
	update_option("meanthemes_theme_social_options_moustachey", $defaultSocial);
	update_option("meanthemes_theme_styling_options_moustachey", $defaultStyling);
	update_option("meanthemes_theme_content_options_moustachey", $defaultContent);
}

if (get_option('meanthemes_install_moustachey') != "installed") {
	meanthemes_install();
	update_option( 'meanthemes_install_moustachey', 'installed' );
}




/* #######################################################################

 'MeanThemes Theme' menu.

 ####################################################################### */
 
function meanthemes_theme_menu() {

	add_theme_page(__('Theme Options', 'meanthemes'),  __('Theme Options', 'meanthemes'), 'administrator', 'meanthemes_theme_options', 'meanthemes_theme_general');
	add_object_page(__('Theme Options', 'meanthemes'), __('Theme Options', 'meanthemes'), 'administrator', 'meanthemes_theme_menu', 'meanthemes_theme_general', get_stylesheet_directory_uri() . '/functions/meanthemes_options.png');
	add_submenu_page('meanthemes_theme_menu', __('General settings', 'meanthemes'), __('General Settings', 'meanthemes'), 'administrator', 'meanthemes_theme_general_options_moustachey', 'meanthemes_theme_general');
	add_submenu_page('meanthemes_theme_menu', __('Social Settings', 'meanthemes'), __('Social settings', 'meanthemes'), 'administrator', 'meanthemes_theme_social_options_moustachey', create_function( null, 'meanthemes_theme_general( "social_options" );' ));
	add_submenu_page('meanthemes_theme_menu', __('Styling &amp; Font Options', 'meanthemes'), __('Styling &amp; Font Options', 'meanthemes'), 'administrator', 'meanthemes_theme_styling_options_moustachey', create_function( null, 'meanthemes_theme_general( "styling_options" );' ));
	add_submenu_page('meanthemes_theme_menu', __('Text/Content Options', 'meanthemes'), __('Text/Content Options', 'meanthemes'), 'administrator', 'meanthemes_theme_content_options_moustachey', create_function( null, 'meanthemes_theme_general( "content_options" );' ));
} // end meanthemes_menu setup - now add action
add_action( 'admin_menu', 'meanthemes_theme_menu' );

/* #######################################################################

Set up tabs

####################################################################### */

function meanthemes_theme_general( $active_tab = '' ) {
?>
<?php $meanThemesName = "Moustachey"; ?>

	<div class="wrap meanthemes_admin">
		<div id="icon-themes" class="icon32"></div>
		<h2><?php echo($meanThemesName." "); ?><?php _e('Theme Options', 'meanthemes') ?></h2>
		<?php settings_errors(); ?>

		<?php if( isset( $_GET[ 'tab' ] ) ) {
		$active_tab = $_GET[ 'tab' ];
	} else if( $active_tab == 'social_options' ) {
			$active_tab = 'social_options';
		} else if( $active_tab == 'styling_options' ) {
			$active_tab = 'styling_options';
		} else if( $active_tab == 'content_options' ) {
			$active_tab = 'content_options';
		} else {
		$active_tab = 'general_options';
	} ?>
		<h2 class="nav-tab-wrapper">
			<a href="?page=meanthemes_theme_options&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php _e('General Settings', 'meanthemes') ?></a>
			<a href="?page=meanthemes_theme_options&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Social Settings', 'meanthemes') ?></a>
			<a href="?page=meanthemes_theme_options&tab=styling_options" class="nav-tab <?php echo $active_tab == 'styling_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Styling  &amp; Font Options', 'meanthemes') ?></a>
			<a href="?page=meanthemes_theme_options&tab=content_options" class="nav-tab <?php echo $active_tab == 'content_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Text/Content Settings', 'meanthemes') ?></a>
		</h2>
		
		
			<p class="advice pdf">
			<?php _e('<strong>Getting stuck?</strong> No problem... ','meanthemes') ?><a target="_blank" href="<?php echo get_template_directory_uri() .'/documentation/moustachey_documentation.pdf' ?>" title="<?php _e('View the Documentation here','meanthemes') ?>"><?php _e('View the Documentation here','meanthemes') ?></a>.
			</p>
			
			<?php
			
			$meanthemesInstalled = get_option('meanthemes_install');
			$meanthemesDismiss = get_option('meanthemes_dismiss_moustachey');
			if (!$meanthemesDismiss) {
			
			?>
			<form method="post" action="<?php echo get_template_directory_uri() . '/framework/meanthemes-dismiss.php'?>">
			
			<div class="advice oops">			
			
				
			
			<?php
			
				if($meanthemesInstalled == "installed") { ?>
					<p><?php _e('It looks like you already have the following MeanThemes themes installed: ','meanthemes') ?></p>
					<?php
					echo("<ul><li>Scruvely</li> </ul>");
				}
				
			
			 ?>
			 
			 <p><strong><?php _e('Please note, you will need to copy across any settings from your other themes, we do not automatically import your settings.','meanthemes') ?></strong></p>
			 <input name="meanthemes_options[dismiss]" type="submit" class="button-secondary" value="<?php esc_attr_e('Dismiss (and hide) this message', 'meanthemes'); ?>" />
			</div>
			</form>
			
			<?php
			} else {
				
			}
?>
<form method="post" action="options.php" class="meanthemes_admin">
<?php			
			
	if( $active_tab == 'general_options' ) {
		settings_fields( 'meanthemes_theme_general_options_moustachey' );
		do_settings_sections( 'meanthemes_theme_general_options_moustachey' );
	} elseif( $active_tab == 'social_options' ) {
		settings_fields( 'meanthemes_theme_social_options_moustachey' );
		do_settings_sections( 'meanthemes_theme_social_options_moustachey' );
	} elseif( $active_tab == 'content_options' ) {
		settings_fields( 'meanthemes_theme_content_options_moustachey' );
		do_settings_sections( 'meanthemes_theme_content_options_moustachey' );
	} else {
		settings_fields( 'meanthemes_theme_styling_options_moustachey' );
		do_settings_sections( 'meanthemes_theme_styling_options_moustachey' );
	}
	submit_button();
?>

		</form>
		<form method="post" action="<?php echo get_template_directory_uri() . '/framework/meanthemes-defaults-moustachey.php'?>">
			<div class="meanthemes-reset">
				<input name="meanthemes_options[reset-<?php echo $active_tab; ?>]" type="submit" class="button-secondary" value="<?php esc_attr_e('Reset Defaults', 'meanthemes'); ?>" rel="<?php _e('This tab has been reset to default settings, the page will now refresh.','meanthemes'); ?>" /><p class="advice mini"><?php _e('Only click this if you want to reset to defaults for this tab!', 'meanthemes'); ?></p>
			</div>
		</form>
		<script src="<?php echo get_template_directory_uri();?>/framework/js/meanthemes-reset.js"></script>
		<script src="<?php echo get_template_directory_uri();?>/framework/js/meanthemes-upload.js"></script>
	</div>
<?php
}

/* #######################################################################

Register 'General' settings

####################################################################### */

function meanthemes_initialize_theme_options() {

	if( false == get_option( 'meanthemes_theme_general_options_moustachey' ) ) {
		add_option( 'meanthemes_theme_general_options_moustachey' );
	}

	add_settings_section( 'general_settings_section', __('General Settings', 'meanthemes'), 'meanthemes_general_options_callback', 'meanthemes_theme_general_options_moustachey');
	
	add_settings_section('general_settings_analytics_section', __('Analytics settings', 'meanthemes'), 'general_settings_analytics_callback', 'meanthemes_theme_general_options_moustachey');
	add_settings_field("google_analytics", __('Google Analytics ID', 'meanthemes'), "meanthemes_text", "meanthemes_theme_general_options_moustachey", "general_settings_analytics_section", array("name"=>"google_analytics", "settings" => "meanthemes_theme_general_options_moustachey", "label" => "", "explanation" => "", "class" => "small"));


	add_settings_section('general_settings_global_section', __('Global settings', 'meanthemes'), 'general_settings_global_section_callback', 'meanthemes_theme_general_options_moustachey');
	add_settings_field("truncate_comment_links", __('Truncate links within comments', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"truncate_comment_links", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to reduce the width of really really long web addresses placed on a post\'s comments.', 'meanthemes'), "explanation" => ""));
	add_settings_field("uppercase_titles", __('Uppercase all Headings', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"uppercase_titles", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to show the strapline under the logo/site heading.', 'meanthemes'), "explanation" => ""));
	add_settings_field("show_strapline", __('Show Strapline', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_strapline", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to show the strapline under the logo/site heading.', 'meanthemes'), "explanation" => ""));
	add_settings_field("show_blog_full", __('Enable full content posts in archive', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_blog_full", "settings" => "meanthemes_theme_general_options_moustachey" , "explanation" => "" , "class" => "", "label" => __('Tick to show full blog posts on blog archives and index page', 'meanthemes'),));
	add_settings_field("switch_nav", __('Switch Navigation to Left', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"switch_nav", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to switch the default right navigation to display left.', 'meanthemes'), "explanation" => ""));
	add_settings_field("no_nav", __('Turn off Side Navigation / Use Full Width', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"no_nav", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to turn off side navigation across the whole theme.', 'meanthemes'), "explanation" => __('This will make every page and post full width.', 'meanthemes')));
	add_settings_field("hide_archive_title", __('Turn off "Archives:" Text', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"hide_archive_title", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to turn off "Archives" text in category view.', 'meanthemes'), "explanation" => ""));
	add_settings_field("use_admin_date", __('Use Admin format for date', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"use_admin_date", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to use the default date settings.', 'meanthemes'), "explanation" => ""));
	
	
	add_settings_field("comments_off", __('Turn Comments off completely', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"comments_off", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to turn off comments across the whole theme.', 'meanthemes'), "explanation" => ""));
	add_settings_field("show_top_reveal", __('Show Top Panel / Donate Reveal', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_top_reveal", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to show the top panel reveal.', 'meanthemes'), "explanation" => ""));
	
	
	add_settings_field("blocked_body", __('Switch to Boxed layout', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"blocked_body", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to show left and right borders, you can control colour through the Styling tab.', 'meanthemes'), "explanation" => ""));
	add_settings_field("show_twitter", __('Show Twitter', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_twitter", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to activate the footer twitter feed.', 'meanthemes'), "explanation" => ""));
	add_settings_field("show_social_footer", __('Show Social in Footer', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_social_footer", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to activate the social footer section.', 'meanthemes'), "explanation" => ""));
	add_settings_field("show_widget_footer", __('Enable Widgets in Footer', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_widget_footer", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to activate the widgets in footer section.', 'meanthemes'), "explanation" => ""));
	add_settings_field("social_white", __('Use white social icons', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"social_white", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('By default, icons are white untick this to use black instead.', 'meanthemes'), "explanation" => ""));
	add_settings_field("show_footer_credit", __('Show MeanThemes Footer credit', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_footer_credit", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to show a footer credit to MeanThemes.', 'meanthemes'), "explanation" => ""));
	add_settings_field("tweet_count", __('Enter amount of tweets to feed into footer', 'meanthemes'), "meanthemes_text", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"tweet_count", "settings" => "meanthemes_theme_general_options_moustachey", "label" => "", "explanation" => "", "class" => "small"));
	
		add_settings_field("tweet_count", __('Enter amount of tweets to feed into footer', 'meanthemes'), "meanthemes_text", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"tweet_count", "settings" => "meanthemes_theme_general_options_moustachey", "label" => "", "explanation" => "", "class" => "small"));
	
	add_settings_field("hide_page_menu", __('Hide Page menu', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"hide_page_menu", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to hide the sub page sidebar navigation.', 'meanthemes'), "explanation" => __('This leaves the sidebar free to fill with any widget.','meanthemes')));
	add_settings_field("no_thumbnail_gallery", __('Disabled featured image on Gallery posts', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"no_thumbnail_gallery", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to hide featured image on gallery posts.', 'meanthemes'), "explanation" => ""));
	add_settings_field("no_thumbnail", __('Disabled featured image on all posts (not gallery)', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"no_thumbnail", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to hide featured image on all posts (not pages or gallery posts).', 'meanthemes'), "explanation" => ""));
	
	add_settings_field("show_social_share", __('Show social share', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_social_share", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Share any post to Twitter, Facebook and Google+.', 'meanthemes'), "explanation" => ""));
	
	add_settings_field("show_author", __('Show Author information', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_global_section", array("name"=>"show_author", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to show author information on the whole theme.', 'meanthemes'), "explanation" => ""));
	
	
		
	
	
	add_settings_section('general_settings_images_section', __('Images', 'meanthemes'), 'meanthemes_general_images_options_callback', 'meanthemes_theme_general_options_moustachey');
	add_settings_field("logo_text", __('Plain Text Logo', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_images_section", array("name"=>"logo_text", "settings" => "meanthemes_theme_general_options_moustachey", "label" => "", "explanation" => __('If you\'d like us to just use your site name as the logo please tick this.', 'meanthemes')));
	add_settings_field("logoupload", __('Logo Upload', 'meanthemes'), "meanthemes_upload", "meanthemes_theme_general_options_moustachey", "general_settings_images_section", array("name"=>"logoupload", "settings" => "meanthemes_theme_general_options_moustachey", "explanation" => __('For best results upload your logo with a maximum height of 75px and width of 175px.', 'meanthemes')));
	add_settings_field("logo_2x_upload", __('Retina Logo Upload', 'meanthemes'), "meanthemes_upload", "meanthemes_theme_general_options_moustachey", "general_settings_images_section", array("name"=>"logo_2x_upload", "settings" => "meanthemes_theme_general_options_moustachey", "explanation" => __('For best results upload your logo with a maximum height of 150px and width of 350px. The logo will be resized by half for Retina devices.', 'meanthemes')));
	add_settings_field("appletouchupload", __('Apple Touch Upload', 'meanthemes'), "meanthemes_upload", "meanthemes_theme_general_options_moustachey", "general_settings_images_section", array("name"=>"appletouchupload", "settings" => "meanthemes_theme_general_options_moustachey", "explanation" => __('For best results upload a 128x128px .png file.', 'meanthemes')));
	add_settings_field("faviconupload", __('Favicon Upload', 'meanthemes'), "meanthemes_upload", "meanthemes_theme_general_options_moustachey", "general_settings_images_section", array("name"=>"faviconupload", "settings" => "meanthemes_theme_general_options_moustachey", "explanation" => __('For best results upload 32x32px .png, .ico or .gif file.', 'meanthemes')));
	
	add_settings_field("swatchupload", __('Swatch Upload', 'meanthemes'), "meanthemes_upload", "meanthemes_theme_general_options_moustachey", "general_settings_images_section", array("name"=>"swatchupload", "settings" => "meanthemes_theme_general_options_moustachey", "explanation" => __('For best results upload a file that repeats on X and Y axis.', 'meanthemes')));	
	
	
	add_settings_section('general_settings_homepage_section', __('Homepage settings', 'meanthemes'), 'meanthemes_general_homepage_options_callback', 'meanthemes_theme_general_options_moustachey');
	
		add_settings_field("home_sidebar", __('Turn on Side Navigation on homepage', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_homepage_section", array("name"=>"home_sidebar", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to turn on side navigation on the homepage only.', 'meanthemes'), "explanation" => ""));

add_settings_section('general_settings_archive_section', __('Archive page settings', 'meanthemes'), 'meanthemes_general_archive_options_callback', 'meanthemes_theme_general_options_moustachey');

	add_settings_field("archive_sidebar", __('Turn on Side Navigation on archive pages', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_archive_section", array("name"=>"archive_sidebar", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to turn on side navigation on all archive pages.', 'meanthemes'), "explanation" => ""));
	
	
	add_settings_section('general_settings_contact_section', __('Contact page settings', 'meanthemes'), 'meanthemes_general_contact_options_callback', 'meanthemes_theme_general_options_moustachey');
	add_settings_field("emailaddress", __('Contact Form Email Address', 'meanthemes'), "meanthemes_text", "meanthemes_theme_general_options_moustachey", "general_settings_contact_section", array("name"=>"emailaddress", "settings" => "meanthemes_theme_general_options_moustachey" , "explanation" => "" , "class" => ""));
	add_settings_field("googleapikey", __('Google API Key', 'meanthemes'), "meanthemes_text", "meanthemes_theme_general_options_moustachey", "general_settings_contact_section", array("name"=>"googleapikey", "settings" => "meanthemes_theme_general_options_moustachey" , "explanation" => "You'll need to register and setup an API key through Google maps.", "class" => ""));
	add_settings_field("googleapill", __('Google Maps Latitude &amp; Longitude', 'meanthemes'), "meanthemes_text", "meanthemes_theme_general_options_moustachey", "general_settings_contact_section", array("name"=>"googleapill", "settings" => "meanthemes_theme_general_options_moustachey" , "explanation" => "Simply enter Latitude first, then Longitude with a comma ( , ) in between. e.g. 60.988831,-1.497833" , "class" => ""));
	add_settings_field("pinupload", __('Google Pin Upload', 'meanthemes'), "meanthemes_upload", "meanthemes_theme_general_options_moustachey", "general_settings_contact_section", array("name"=>"pinupload", "settings" => "meanthemes_theme_general_options_moustachey", "explanation" => __('For best results upload your pin with a maximum width of 30px x 30px .png file.', 'meanthemes')));
	add_settings_field("show_contactform", __('Show Contact Form', 'meanthemes'), "meanthemes_checkbox", "meanthemes_theme_general_options_moustachey", "general_settings_contact_section", array("name"=>"show_contactform", "settings" => "meanthemes_theme_general_options_moustachey", "label" => __('Tick to activate Contact Form on Contact template.', 'meanthemes'), "explanation" => ""));
	

	register_setting('meanthemes_theme_general_options_moustachey','meanthemes_theme_general_options_moustachey');

}
add_action( 'admin_init', 'meanthemes_initialize_theme_options' );

/* #######################################################################

Section Callbacks

####################################################################### */

function meanthemes_general_options_callback() {
	$textcontent = __('This tab holds the general settings for the website and is divided into the sections for ease of navigation.', 'meanthemes');
	echo '<p class="advice top">'.$textcontent.'</p>';
}

function general_settings_analytics_callback() {
	$textcontent = __('If you use Google Analytics, insert your ID below and we will do the rest for you. Your analytics ID should look like this: UA-XXXXXXXX-X with X representing numbers.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}
function meanthemes_general_contact_options_callback() {
	$textcontent = __('Change settings specifically for the contact page.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}
function meanthemes_general_homepage_options_callback() {
	$textcontent = __('Change settings specifically for the homepage and static blog layout page.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}
function meanthemes_general_archive_options_callback() {
	$textcontent = __('Change settings specifically for the archive pages.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}
function meanthemes_general_images_options_callback() {
	$textcontent = __('Upload your website logo, Apple Touch icon and Favicon. If you\'d like to crop or resize your images after they have uploaded, head over to the "Media" area where you can crop your images, make sure you come back here though and reselect your newly cropped image and click Save at the bottom.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function general_settings_global_section_callback() {
	$textcontent = __('Global settings, these effect the whole website.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}


/* #######################################################################

Register 'Social' settings

####################################################################### */

function meanthemes_theme_intialize_social_options() {

	if( false == get_option( 'meanthemes_theme_social_options_moustachey' ) ) {
		add_option( 'meanthemes_theme_social_options_moustachey' );
	} // end if

	add_settings_section('social_settings_section', __('Social Settings', 'meanthemes'), 'meanthemes_social_options_callback', 'meanthemes_theme_social_options_moustachey');
	
	

	add_settings_field("twitter", __('Twitter', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"twitter", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "" , "class" => ""));
	add_settings_field("facebook", __('Facebook', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"facebook", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "" , "class" => ""));
	add_settings_field("linkedin", __('Linked In', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"linkedin", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "" , "class" => ""));
	add_settings_field("googleplus", __('Google +', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"googleplus", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "" , "class" => ""));
	add_settings_field("zerply", __('Zerply', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"zerply", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "" , "class" => ""));
	add_settings_field("vimeo", __('Vimeo', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"vimeo", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "" , "class" => ""));
	add_settings_field("youtube", __('YouTube', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"youtube", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "" , "class" => ""));
	add_settings_field("pinterest", __('Pinterest', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"pinterest", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("dribbble", __('Dribbble', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"dribbble", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("github", __('Github', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"github", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("instagram", __('Instagram', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"instagram", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("flickr", __('Flickr', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"flickr", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("rss", __('RSS', 'meanthemes'), "meanthemes_text", "meanthemes_theme_social_options_moustachey", "social_settings_section", array("name"=>"rss", "settings" => "meanthemes_theme_social_options_moustachey" , "explanation" => __('By default your RSS feed will be yourdomain.com/rss e.g. http://www.meanthemes.com/theme/moustachey/rss' , 'meanthemes'), "class" => ""));
	
	register_setting('meanthemes_theme_social_options_moustachey', 'meanthemes_theme_social_options_moustachey', 'meanthemes_theme_sanitize_social_options');

}
add_action( 'admin_init', 'meanthemes_theme_intialize_social_options' );

/* #######################################################################

Register 'Social' settings callback

####################################################################### */

function meanthemes_social_options_callback() {
	$textcontent = __('Please fill in the full URL (web address) of the social networks you would like to display.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

/* #######################################################################

Register 'Styling' settings

####################################################################### */

function meanthemes_theme_initialize_styling_options() {

	if( false == get_option( 'meanthemes_theme_styling_options_moustachey' ) ) {
		add_option( 'meanthemes_theme_styling_options_moustachey' );
	} // end if
	add_settings_section('styling_options_section', 'Styling Options', 'meanthemes_styling_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');

	add_settings_section('styling_options_colours_section', __('Colours', 'meanthemes'), 'meanthemes_styling_colour_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');

	add_settings_field("logo_colour", __('Plain Text Logo Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"logo_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("heading_font_colour", __('Heading Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"heading_font_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("menu_active_colour", __('Menu Active/Hover Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"menu_active_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("body_font_colour", __('Content Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"body_font_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("link_colour", __('Content Link Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"link_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("hover_colour", __('Content Link Hover Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"hover_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("background_colour", __('Background Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"background_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("content_background_colour", __('Content Background Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"content_background_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "Use in conjunction with boxed layout.", "class" => "small"));
	add_settings_field("footer_colour", __('Footer Background Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"footer_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("footer_colour_text", __('Colour for Footer text', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"footer_colour_text", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("button_colour", __('Button Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"button_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("button_hover_colour", __('Button Hover Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"button_hover_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("archive_dark", __('Archive / Home Dark Background Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"archive_dark", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("archive_bright", __('Archive / Home Bright Background Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"archive_bright", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	
		add_settings_field("archive_ondark_text", __('On Dark Text Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"archive_ondark_text", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
		add_settings_field("archive_ondark_link", __('On Dark Link Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"archive_ondark_link", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
		add_settings_field("archive_ondark_link_hover", __('On Dark Link Hover Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"archive_ondark_link_hover", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
		add_settings_field("archive_onbright_text", __('On Bright Text Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"archive_onbright_text", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
		add_settings_field("archive_onbright_link", __('On Bright Link Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"archive_onbright_link", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
		add_settings_field("archive_onbright_link_hover", __('On Bright Link Hover Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"archive_onbright_link_hover", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
				
		
		add_settings_field("sidebar_colour", __('Sidebar Background colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"sidebar_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	
	
	
	
	
	add_settings_field("google_map_colour", __('Google Map Road Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"google_map_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "This colours the roads on the Google Map on the homepage.", "class" => "small"));
	add_settings_field("mobile_menu_colour", __('Mobile Menu Colour', 'meanthemes'), "meanthemes_colour", "meanthemes_theme_styling_options_moustachey", "styling_options_colours_section", array("name"=>"mobile_menu_colour", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "This changes the background colour for the mobile/tablet menu.", "class" => "small"));

	add_settings_section('styling_options_fonts_section', __('Default Web fonts', 'meanthemes'), 'meanthemes_styling_fonts_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');

	add_settings_field("heading_font", __('Heading &amp; Text Logo Font', 'meanthemes'), "meanthemes_font", "meanthemes_theme_styling_options_moustachey", "styling_options_fonts_section", array("name"=>"heading_font", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
	add_settings_field("font_family", __('Content Font', 'meanthemes'), "meanthemes_font", "meanthemes_theme_styling_options_moustachey", "styling_options_fonts_section", array("name"=>"font_family", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));

	add_settings_section('styling_options_googlefonts_section', __('Google Web fonts', 'meanthemes'), 'meanthemes_styling_googlefonts_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');

	add_settings_field("google_heading_font", __('Headings, Text Logo &amp; blog meta e.g. category font', 'meanthemes'), "meanthemes_text", "meanthemes_theme_styling_options_moustachey", "styling_options_googlefonts_section", array("name"=>"google_heading_font", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));

	add_settings_field("google_body_font", __('Main Content', 'meanthemes'), "meanthemes_text", "meanthemes_theme_styling_options_moustachey", "styling_options_googlefonts_section", array("name"=>"google_body_font", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "small"));
	
	add_settings_section('styling_options_googlefonts_advanced_section', __('Google Web fonts (Advanced)', 'meanthemes'), 'meanthemes_styling_googlefonts_advanced_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');
	
	add_settings_field("googlefonts_advanced", __('Google Webfont JavaScript', 'meanthemes'), "meanthemes_textarea", "meanthemes_theme_styling_options_moustachey", "styling_options_googlefonts_advanced_section", array("name"=>"googlefonts_advanced", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("googlefonts_advanced_css", __('Font Control CSS Block', 'meanthemes'), "meanthemes_textarea", "meanthemes_theme_styling_options_moustachey", "styling_options_googlefonts_advanced_section", array("name"=>"googlefonts_advanced_css", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => ""));
	
	
	
	add_settings_section('styling_options_typekitfonts_section', __('Typekit Web fonts', 'meanthemes'), 'meanthemes_styling_typekitfonts_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');
	
		add_settings_field("typekit_id", __('Typekit ID', 'meanthemes'), "meanthemes_text", "meanthemes_theme_styling_options_moustachey", "styling_options_typekitfonts_section", array("name"=>"typekit_id", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "You will need this ID for your Typekit fonts to work", "class" => "small"));
	
		add_settings_field("typekit_heading_font", __('Headings, Text Logo &amp; blog meta e.g. category font', 'meanthemes'), "meanthemes_textarea", "meanthemes_theme_styling_options_moustachey", "styling_options_typekitfonts_section", array("name"=>"typekit_heading_font", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "mini"));
		add_settings_field("typekit_body_font", __('Main Content', 'meanthemes'), "meanthemes_textarea", "meanthemes_theme_styling_options_moustachey", "styling_options_typekitfonts_section", array("name"=>"typekit_body_font", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "mini"));
		
		
	add_settings_section('styling_options_adobefonts_section', __('Adobe Edge Web fonts', 'meanthemes'), 'meanthemes_styling_adobefonts_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');
	
		add_settings_field("adobe_heading_font", __('Headings, Text Logo &amp; blog meta e.g. category font', 'meanthemes'), "meanthemes_textarea", "meanthemes_theme_styling_options_moustachey", "styling_options_adobefonts_section", array("name"=>"adobe_heading_font", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => "mini"));
	
	
		add_settings_section('styling_options_fontsize_section', __('Font Sizes', 'meanthemes'), 'meanthemes_styling_fontsize_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');
	
		add_settings_field("main_nav_size", __('Main Navigation size', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"main_nav_size", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
		add_settings_field("body_size", __('Body Font size', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"body_size", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
		add_settings_field("heading_1", __('Heading 1', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"heading_1", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
		add_settings_field("heading_2", __('Heading 2', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"heading_2", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
		add_settings_field("heading_3", __('Heading 3', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"heading_3", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
		add_settings_field("heading_4", __('Heading 4', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"heading_4", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
		add_settings_field("heading_5", __('Heading 5', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"heading_5", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
		add_settings_field("heading_6", __('Heading 6', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"heading_6", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
		add_settings_field("heading_supersize", __('Donate box title size', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"heading_supersize", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
	add_settings_field("site_title_size", __('Site title size', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"site_title_size", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
	add_settings_field("strapline_size", __('Strapline size', 'meanthemes'), "meanthemes_fontsize", "meanthemes_theme_styling_options_moustachey", "styling_options_fontsize_section", array("name"=>"strapline_size", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => ""));
	
	add_settings_section('styling_options_css_block_section', 'Custom CSS Block', 'meanthemes_styling_css_block_options_callback', 'meanthemes_theme_styling_options_moustachey', 'meanthemes');


	add_settings_field("css_block", __('CSS Block', 'meanthemes'), "meanthemes_textarea", "meanthemes_theme_styling_options_moustachey", "styling_options_css_block_section", array("name"=>"css_block", "settings" => "meanthemes_theme_styling_options_moustachey" , "explanation" => "", "class" => ""));



	register_setting('meanthemes_theme_styling_options_moustachey', 'meanthemes_theme_styling_options_moustachey', 'meanthemes_theme_validate_styling_options');

}
add_action( 'admin_init', 'meanthemes_theme_initialize_styling_options' );

/* #######################################################################

'Styling' callbacks

####################################################################### */

function meanthemes_styling_options_callback() {
	$textcontent = __('You can choose all your styling options for your theme below, many colour values double up across the theme, we\'ll provide a list of all elements affected in each section.', 'meanthemes');
	echo '<p class="advice top">'.$textcontent.'</p>';
}

function meanthemes_styling_colour_options_callback() {
	$textcontent = __('You can configure almost all of the colours in this theme below.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function meanthemes_styling_fonts_options_callback() {
	$textcontent = __('The below dropdown boxes have a list of the standard web safe font families, please make sure you choose from one of each, if you decide to use Google web fonts, these fonts will be superceded by the Google font and will provide the back up font should the Google web font server be inaccessible.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}
function meanthemes_styling_fontsize_options_callback() {
	$textcontent = __('You can control all the font sizes in the website here.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}
function meanthemes_styling_googlefonts_options_callback() {
	$textcontent = __('If you\'d like to use a Google Web font, all you need to do is go to <a href="http://www.google.com/webfonts/" title="Visit Google Webfonts (will open in separate window)" target="_blank">Google Web fonts</a>, choose the font you\'d like to use and enter the name of the font in the boxes below. For example: Lato. We\'ll do the rest. <strong>Please only enter one font per option.</strong>. If you want even more control over your Google fonts, use the advanced option below.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function meanthemes_styling_googlefonts_advanced_options_callback() {
	$textcontent = __('This is the advanced version of Google web fonts, the standard version above does not allow for different font weights or more than two fonts. Go to <a href="http://www.google.com/webfonts">http://www.google.com/webfonts</a>, choose your fonts by clicking "Add to collection" and then click "Use". Scroll down to point 3, "Javascript" tab in the blue block and grab the code. Insert that code into the "Google Webfont JavaScript" box below and enter the CSS for the Google font in the "Font Control CSS Block" below. <strong>Please make sure you clear the standard Google Fonts above.</strong>', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function meanthemes_styling_typekitfonts_options_callback() {
	$textcontent = __('If you\'d like to use a Typekit Web font, visit <a href="http://www.typekit.com" title="Visit Typekit (will open in separate window)" target="_blank">Typekit.com</a>, choose the font you\'d like to use and enter the CSS attributes Typekit gives you. For example: Museo Sans would be entered as "museo-sans-1","museo-sans-2".', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function meanthemes_styling_adobefonts_options_callback() {
	$textcontent = __('If you\'d like to use the brand new Adobe Edge Web font, visit <a href="http://html.adobe.com/edge/webfonts/" title="Visit Adobe Edge Webkit (will open in separate window)" target="_blank">http://html.adobe.com/edge/webfonts/</a>, choose the font you\'d like to use and enter the CSS attributes Adobe gives you. abril-fatface. Please do not include the semi colon ( ; ) or the "serif" or "san-serif".', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function meanthemes_styling_css_block_options_callback() {
	$textcontent = __('We know our theme is amazing, but we do understand that you may want to add your own CSS code, well don\'t worry, add your code below and we\'ll add it to the head of the web page after all of the MeanThemes CSS.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}
function meanthemes_styling_palette_options_callback() {
	$textcontent = __('We have pre-made 4 colour palettes for you to use, screen shots of each are below. Do not worry though, you can still overwrite the theme colours in the "Colours" section underneath.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

/* #######################################################################

Register 'Text/Content' settings

####################################################################### */

function meanthemes_theme_initialize_content_options() {

	if( false == get_option( 'meanthemes_theme_content_options_moustachey' ) ) {
		add_option( 'meanthemes_theme_content_options_moustachey' );
	}


	add_settings_section('content_options_section', __('Text/Content Options', 'meanthemes'), 'meanthemes_content_options_callback', 'meanthemes_theme_content_options_moustachey', 'meanthemes');

		
	add_settings_section('content_options_more_section', __('Global', 'meanthemes'), 'meanthemes_content_more_options_callback', 'meanthemes_theme_content_options_moustachey', 'meanthemes');
	add_settings_field("read_more", __('Read more', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"read_more", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("view_post", __('View Post', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"view_post", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("navigation", __('Sidebar Navigation', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"navigation", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => "small"));
	
	add_settings_field("donate_pulldown", __('Donate Pull down link', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"donate_pulldown", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("donate_message", __('Donate Title', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"donate_message", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("donate_details", __('Donate Details', 'meanthemes'), "meanthemes_textarea", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"donate_details", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("donate_link", __('Donate Link URL', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"donate_link", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "Please enter full URL including http://", "class" => ""));
	add_settings_field("donate_link_text", __('Donate Link Text', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"donate_link_text", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("separator", __('Separator text', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"separator", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("share_on", __('"Share on: " text', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"share_on", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => "small"));
	
	add_settings_field("written_by", __('"By " text', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"written_by", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => "small"));
	add_settings_field("author_more", __('"See more posts by this author" text', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_more_section", array("name"=>"author_more", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => "small"));
	
	

	add_settings_section('content_options_contact_page_section', __('Contact', 'meanthemes'), 'meanthemes_content_contact_page_options_callback', 'meanthemes_theme_content_options_moustachey', 'meanthemes');
	add_settings_field("contact_us_tab", __('Contact Form title', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_contact_page_section", array("name"=>"contact_us_tab", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("contact_us_email", __('Contact Email', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_contact_page_section", array("name"=>"contact_us_email", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => ""));
	add_settings_field("contact_us_phone", __('Contact Phone', 'meanthemes'), "meanthemes_text", "meanthemes_theme_content_options_moustachey", "content_options_contact_page_section", array("name"=>"contact_us_phone", "settings" => "meanthemes_theme_content_options_moustachey" , "explanation" => "", "class" => ""));
	


	register_setting('meanthemes_theme_content_options_moustachey', 'meanthemes_theme_content_options_moustachey');


}
add_action( 'admin_init', 'meanthemes_theme_initialize_content_options' );

/* #######################################################################

Register 'Footer' settings

####################################################################### */

function meanthemes_content_options_callback() {
	$textcontent = __('This theme uses a number of small text blocks to entitle each section of content, you can control them here.', 'meanthemes');
	echo '<p class="advice top">'.$textcontent.'</p>';
}

function meanthemes_content_homepage_options_callback() {
	$textcontent = __('The content here will appear on the homepage.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function meanthemes_content_portfolio_options_callback() {
	$textcontent = __('The content here will appear on the portfolio archive page.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function meanthemes_content_more_options_callback() {
	$textcontent = __('Change the text here for the default "view post" text used on the blog section and "navigation" used on the page sidebar.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}
function meanthemes_content_contact_page_options_callback() {
	$textcontent = __('The following section shows on the Contact Page template, email and phone number are shown on the footer.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}

function meanthemes_content_contact_details_options_callback() {
	$textcontent = __('The following section powers the Footer section on the website.', 'meanthemes');
	echo '<p class="advice">'.$textcontent.'</p>';
}


/* #######################################################################

Field Callbacks

####################################################################### */

// Standard Text Input
function meanthemes_text($args)
{
	$advice = $args["explanation"];
	if($advice) {
		$advice = '<p class="advice mini">' . $args["explanation"] . '</p>';
	}
	$cssClass = $args["class"];
	$options = get_option($args["settings"]);
	if($cssClass == "small") {
		echo '<input name="'.$args["settings"].'[' . $args["name"]. ']" id="'.$args["name"].'" type="text" value="' . $options[$args["name"]] . '"/>' . $advice;
	} else {
		echo '<input name="'.$args["settings"].'[' . $args["name"]. ']" id="'.$args["name"].'" type="text" class="med-text" value="' . $options[$args["name"]] . '"/>' . $advice;
	}
}

// Colour Picker Text Input
function meanthemes_colour($args)
{
	$advice = $args["explanation"];
	if($advice) {
		$advice = '<p class="advice mini">' . $args["explanation"] . '</p>';
	}
	$cssClass = $args["class"];
	$options = get_option($args["settings"]);
	if($cssClass == "small") {
		echo '<input name="'.$args["settings"].'[' . $args["name"]. ']" id="'.$args["name"].'" type="text" value="' . $options[$args["name"]] . '"/> <input type="button" class="pickcolour button-secondary" value="'.__('Select Colour', 'meanthemes').'" /><div class="colorpicker" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>' . $advice;
	} else {
		echo '<input name="'.$args["settings"].'[' . $args["name"]. ']" id="'.$args["name"].'" type="text" class="med-text" value="' . $options[$args["name"]] . '"/> <input type="button" class="pickcolour button-secondary" value="'.__('Select Colour', 'meanthemes').'" /><div class="colorpicker" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>' . $advice;
	}
}

// Standard Checkbox
function meanthemes_checkbox($args) {
	$advice = $args["explanation"];
	if($advice) {
		$advice = '<p class="advice mini">' . $args["explanation"] . '</p>';
	}
	$options = get_option($args["settings"]);

	$html = '<input type="checkbox" id="'.$args["name"].'" name="'.$args["settings"].'[' . $args["name"]. ']" value="1" ' . checked( 1, isset( $options[$args["name"]] ) ? $options[$args["name"]] : 0, false ) . '/>';
	$html .= '<label for="'.$args["name"].'">&nbsp;'  . $args["label"] . '</label>' . $advice;

	echo $html;

}

// Palette Options Radio
function meanthemes_palette($args) {
	$advice = $args["explanation"];
	if($advice) {
		$advice = '<p class="advice mini">' . $args["explanation"] . '</p>';
	}
	$options = get_option($args["settings"]);
		
	$html = '<div class="meanthemes-palette first"><label for="'.$args["name"].'1"><img src="'. get_stylesheet_directory_uri() . '/framework/palette-options/default.png" /><input type="radio" id="'.$args["name"].'1" name="'.$args["settings"].'[' . $args["name"]. ']" value="1"' . checked( 1, $options[$args["name"]], false ) . '/>' . __('Default', 'meanthemes') . '</label></div>';
	
	$html .= '<div class="meanthemes-palette"><label for="'.$args["name"].'2"><img src="'. get_stylesheet_directory_uri() . '/framework/palette-options/pink.png" /><input type="radio" id="'.$args["name"].'2" name="'.$args["settings"].'[' . $args["name"]. ']" value="2"' . checked( 2, $options[$args["name"]], false ) . '/>' . __('Pink', 'meanthemes') . '</label></div>';
	
	$html .= '<div class="meanthemes-palette"><label for="'.$args["name"].'3"><img src="'. get_stylesheet_directory_uri() . '/framework/palette-options/orange.png" /><input type="radio" id="'.$args["name"].'3" name="'.$args["settings"].'[' . $args["name"]. ']" value="3"' . checked( 3, $options[$args["name"]], false ) . '/>' . __('Orange', 'meanthemes') . '</label></div>';
	
	
	$html .= '<div class="meanthemes-palette"><label for="'.$args["name"].'4"><img src="'. get_stylesheet_directory_uri() . '/framework/palette-options/green.png" /><input type="radio" id="'.$args["name"].'4" name="'.$args["settings"].'[' . $args["name"]. ']" value="4"' . checked( 4, $options[$args["name"]], false ) . '/>' . __('Green', 'meanthemes') . '</label></div>';

	echo $html;

}

// Image/File upload
function meanthemes_upload($args) {
	$advice = $args["explanation"];
	if($advice) {
		$advice = '<p class="advice mini">' . $args["explanation"] . '</p>';
	}
	$options = get_option($args["settings"]);

	$url = '';
	if( isset( $options[$args["name"]] ) ) {
		$url = esc_url( $options[$args["name"]] );
	}

	echo '<input type="text" class="med-text upload_image" id="'.$args["name"].'" name="'.$args["settings"].'[' . $args["name"]. ']" value="' . $url . '" /><input class="upload_image_button button-secondary" type="button" value="'.__('Upload / Choose Image', 'meanthemes').'" />' . $advice;
}

// Textarea
function meanthemes_textarea($args) {
	$advice = $args["explanation"];
	if($advice) {
		$advice = '<p class="advice mini">' . $args["explanation"] . '</p>';
	}
	$cssClass = $args["class"];
	$options = get_option($args["settings"]);
	if($cssClass == "mini") {
		echo '<textarea id="'.$args["name"].'" name="'.$args["settings"].'[' . $args["name"]. ']" class="med-text mini" rows="5"" cols="3">' . $options[$args["name"]] . '</textarea>' . $advice;
	}
	else if($cssClass == "small") {
		echo '<textarea id="'.$args["name"].'" name="'.$args["settings"].'[' . $args["name"]. ']" rows="5" cols="50">' . $options[$args["name"]] . '</textarea>' . $advice;
	} 
	 else {
		echo '<textarea id="'.$args["name"].'" name="'.$args["settings"].'[' . $args["name"]. ']" class="med-text" rows="5" cols="50">' . $options[$args["name"]] . '</textarea>' . $advice;
	}

}

// Font Selection
function meanthemes_font($args) {
	$advice = $args["explanation"];
	if($advice) {
		$advice = '<p class="advice mini">' . $args["explanation"] . '</p>';
	}
	$options = get_option($args["settings"]);

	$html = '<select id="'.$args["name"].'" name="'.$args["settings"].'[' . $args["name"]. ']">';
	$html .= '<option value="">'.__('Select Default Font', 'meanthemes').'</option>';
	$html .= '<option value="verdana"' . selected( $options[$args["name"]], 'verdana', false) . '>'.__('Verdana, Geneva, sans-serif', 'meanthemes').'</option>';
	$html .= '<option value="georgia"' . selected( $options[$args["name"]], 'georgia', false) . '>'.__('Georgia, "Times New Roman", Times, serif', 'meanthemes').'</option>';
	$html .= '<option value="courier"' . selected( $options[$args["name"]], 'courier', false) . '>'.__('"Courier New", Courier, monospace', 'meanthemes').'</option>';

	$html .= '<option value="arial"' . selected( $options[$args["name"]], 'arial', false) . '>'.__('Arial, Helvetica, sans-serif', 'meanthemes').'</option>';
	$html .= '<option value="helvetica"' . selected( $options[$args["name"]], 'helvetica', false) . '>'.__('Helvetica, Arial, sans-serif', 'meanthemes').'</option>';
	$html .= '<option value="tahoma"' . selected( $options[$args["name"]], 'tahoma', false) . '>'.__('Tahoma, Geneva, sans-serif', 'meanthemes').'</option>';
	$html .= '<option value="trebuchet"' . selected( $options[$args["name"]], 'trebuchet', false) . '>'.__('"Trebuchet MS", Arial, Helvetica, sans-serif', 'meanthemes').'</option>';
	$html .= '<option value="arialblack"' . selected( $options[$args["name"]], 'arialblack', false) . '>'.__('"Arial Black", Gadget, sans-serif', 'meanthemes').'</option>';
	$html .= '<option value="timesnew"' . selected( $options[$args["name"]], 'timesnew', false) . '>'.__('"Times New Roman", Times, serif', 'meanthemes').'</option>';
	$html .= '<option value="palatino"' . selected( $options[$args["name"]], 'palatino', false) . '>'.__('"Palatino Linotype", "Book Antiqua", Palatino, serif', 'meanthemes').'</option>';
	$html .= '<option value="lucida"' . selected( $options[$args["name"]], 'lucida', false) . '>'.__('"Lucida Sans Unicode", "Lucida Grande", sans-serif', 'meanthemes').'</option>';
	$html .= '<option value="msserif"' . selected( $options[$args["name"]], 'msserif', false) . '>'.__('"MS Serif", "New York", serif', 'meanthemes').'</option>';
	$html .= '<option value="lucidaconsole"' . selected( $options[$args["name"]], 'lucidaconsole', false) . '>'.__('"Lucida Console", Monaco, monospace').'</option>';
	$html .= '</select>';

	echo $html;

}

// Font Size Selection
function meanthemes_fontsize($args) {
	$advice = $args["explanation"];
	if($advice) {
		$advice = '<p class="advice mini">' . $args["explanation"] . '</p>';
	}
	$options = get_option($args["settings"]);

	$html = '<select id="'.$args["name"].'" name="'.$args["settings"].'[' . $args["name"]. ']">';
	$html .= '<option value="">'.__('Select Font Size', 'meanthemes').'</option>';
	$html .= '<option value="10px"' . selected( $options[$args["name"]], '10px', false) . '>'.__('10px', 'meanthemes').'</option>';
	$html .= '<option value="11px"' . selected( $options[$args["name"]], '11px', false) . '>'.__('11px', 'meanthemes').'</option>';
	$html .= '<option value="12px"' . selected( $options[$args["name"]], '12px', false) . '>'.__('12px', 'meanthemes').'</option>';
	$html .= '<option value="13px"' . selected( $options[$args["name"]], '13px', false) . '>'.__('13px', 'meanthemes').'</option>';
	$html .= '<option value="14px"' . selected( $options[$args["name"]], '14px', false) . '>'.__('14px', 'meanthemes').'</option>';
	$html .= '<option value="15px"' . selected( $options[$args["name"]], '15px', false) . '>'.__('15px', 'meanthemes').'</option>';
	$html .= '<option value="16px"' . selected( $options[$args["name"]], '16px', false) . '>'.__('16px', 'meanthemes').'</option>';
	$html .= '<option value="17px"' . selected( $options[$args["name"]], '17px', false) . '>'.__('17px', 'meanthemes').'</option>';
	$html .= '<option value="18px"' . selected( $options[$args["name"]], '18px', false) . '>'.__('18px', 'meanthemes').'</option>';
	$html .= '<option value="19px"' . selected( $options[$args["name"]], '19px', false) . '>'.__('19px', 'meanthemes').'</option>';
	$html .= '<option value="20px"' . selected( $options[$args["name"]], '20px', false) . '>'.__('20px', 'meanthemes').'</option>';
	$html .= '<option value="21px"' . selected( $options[$args["name"]], '21px', false) . '>'.__('21px', 'meanthemes').'</option>';
	$html .= '<option value="22px"' . selected( $options[$args["name"]], '22px', false) . '>'.__('22px', 'meanthemes').'</option>';
	$html .= '<option value="23px"' . selected( $options[$args["name"]], '23px', false) . '>'.__('23px', 'meanthemes').'</option>';
	$html .= '<option value="24px"' . selected( $options[$args["name"]], '24px', false) . '>'.__('24px', 'meanthemes').'</option>';
	$html .= '<option value="25px"' . selected( $options[$args["name"]], '25px', false) . '>'.__('25px', 'meanthemes').'</option>';
	$html .= '<option value="26px"' . selected( $options[$args["name"]], '26px', false) . '>'.__('26px', 'meanthemes').'</option>';
	$html .= '<option value="27px"' . selected( $options[$args["name"]], '27px', false) . '>'.__('27px', 'meanthemes').'</option>';
	$html .= '<option value="28px"' . selected( $options[$args["name"]], '28px', false) . '>'.__('28px', 'meanthemes').'</option>';
	$html .= '<option value="29px"' . selected( $options[$args["name"]], '29px', false) . '>'.__('29px', 'meanthemes').'</option>';
	$html .= '<option value="30px"' . selected( $options[$args["name"]], '30px', false) . '>'.__('30px', 'meanthemes').'</option>';
	$html .= '<option value="31px"' . selected( $options[$args["name"]], '31px', false) . '>'.__('31px', 'meanthemes').'</option>';
	$html .= '<option value="32px"' . selected( $options[$args["name"]], '32px', false) . '>'.__('32px', 'meanthemes').'</option>';
	$html .= '<option value="33px"' . selected( $options[$args["name"]], '33px', false) . '>'.__('33px', 'meanthemes').'</option>';
	$html .= '<option value="34px"' . selected( $options[$args["name"]], '34px', false) . '>'.__('34px', 'meanthemes').'</option>';
	$html .= '<option value="35px"' . selected( $options[$args["name"]], '35px', false) . '>'.__('35px', 'meanthemes').'</option>';
	$html .= '<option value="36px"' . selected( $options[$args["name"]], '36px', false) . '>'.__('36px', 'meanthemes').'</option>';
	$html .= '<option value="37px"' . selected( $options[$args["name"]], '37px', false) . '>'.__('37px', 'meanthemes').'</option>';
	$html .= '<option value="38px"' . selected( $options[$args["name"]], '38px', false) . '>'.__('38px', 'meanthemes').'</option>';
	$html .= '<option value="39px"' . selected( $options[$args["name"]], '39px', false) . '>'.__('39px', 'meanthemes').'</option>';
	$html .= '<option value="40px"' . selected( $options[$args["name"]], '40px', false) . '>'.__('40px', 'meanthemes').'</option>';
	$html .= '<option value="41px"' . selected( $options[$args["name"]], '41px', false) . '>'.__('41px', 'meanthemes').'</option>';
	$html .= '<option value="42px"' . selected( $options[$args["name"]], '42px', false) . '>'.__('42px', 'meanthemes').'</option>';
	$html .= '<option value="43px"' . selected( $options[$args["name"]], '43px', false) . '>'.__('43px', 'meanthemes').'</option>';
	$html .= '<option value="44px"' . selected( $options[$args["name"]], '44px', false) . '>'.__('44px', 'meanthemes').'</option>';
	$html .= '<option value="45px"' . selected( $options[$args["name"]], '45px', false) . '>'.__('45px', 'meanthemes').'</option>';
	$html .= '<option value="46px"' . selected( $options[$args["name"]], '46px', false) . '>'.__('46px', 'meanthemes').'</option>';
	$html .= '<option value="47px"' . selected( $options[$args["name"]], '47px', false) . '>'.__('47px', 'meanthemes').'</option>';
	$html .= '<option value="48px"' . selected( $options[$args["name"]], '48px', false) . '>'.__('48px', 'meanthemes').'</option>';
	$html .= '<option value="49px"' . selected( $options[$args["name"]], '49px', false) . '>'.__('49px', 'meanthemes').'</option>';
	$html .= '<option value="50px"' . selected( $options[$args["name"]], '50px', false) . '>'.__('50px', 'meanthemes').'</option>';
	$html .= '<option value="51px"' . selected( $options[$args["name"]], '51px', false) . '>'.__('51px', 'meanthemes').'</option>';
	$html .= '<option value="52px"' . selected( $options[$args["name"]], '52px', false) . '>'.__('52px', 'meanthemes').'</option>';
	$html .= '<option value="53px"' . selected( $options[$args["name"]], '53px', false) . '>'.__('53px', 'meanthemes').'</option>';
	$html .= '<option value="54px"' . selected( $options[$args["name"]], '54px', false) . '>'.__('54px', 'meanthemes').'</option>';
	$html .= '<option value="55px"' . selected( $options[$args["name"]], '55px', false) . '>'.__('55px', 'meanthemes').'</option>';
	$html .= '<option value="56px"' . selected( $options[$args["name"]], '56px', false) . '>'.__('56px', 'meanthemes').'</option>';
	$html .= '<option value="57px"' . selected( $options[$args["name"]], '57px', false) . '>'.__('57px', 'meanthemes').'</option>';
	$html .= '<option value="58px"' . selected( $options[$args["name"]], '58px', false) . '>'.__('58px', 'meanthemes').'</option>';
	$html .= '<option value="59px"' . selected( $options[$args["name"]], '59px', false) . '>'.__('59px', 'meanthemes').'</option>';
	$html .= '<option value="60px"' . selected( $options[$args["name"]], '60px', false) . '>'.__('60px', 'meanthemes').'</option>';
	$html .= '<option value="61px"' . selected( $options[$args["name"]], '61px', false) . '>'.__('61px', 'meanthemes').'</option>';
	$html .= '<option value="62px"' . selected( $options[$args["name"]], '62px', false) . '>'.__('62px', 'meanthemes').'</option>';
	$html .= '<option value="63px"' . selected( $options[$args["name"]], '63px', false) . '>'.__('63px', 'meanthemes').'</option>';
	$html .= '<option value="64px"' . selected( $options[$args["name"]], '64px', false) . '>'.__('64px', 'meanthemes').'</option>';
	$html .= '<option value="65px"' . selected( $options[$args["name"]], '65px', false) . '>'.__('65px', 'meanthemes').'</option>';
	$html .= '<option value="66px"' . selected( $options[$args["name"]], '66px', false) . '>'.__('66px', 'meanthemes').'</option>';
	$html .= '<option value="67px"' . selected( $options[$args["name"]], '67px', false) . '>'.__('67px', 'meanthemes').'</option>';
	$html .= '<option value="68px"' . selected( $options[$args["name"]], '68px', false) . '>'.__('68px', 'meanthemes').'</option>';
	$html .= '<option value="69px"' . selected( $options[$args["name"]], '69px', false) . '>'.__('69px', 'meanthemes').'</option>';
	$html .= '<option value="70px"' . selected( $options[$args["name"]], '70px', false) . '>'.__('70px', 'meanthemes').'</option>';
	
	$html .= '</select>';

	echo $html;

}




/* #######################################################################

Sanitization callback for the Social Options.

####################################################################### */

/**
 * @params $input The unsanitized collection of options.
 *
 * @returns   The collection of sanitized values.
 */
function meanthemes_theme_sanitize_social_options( $input ) {

	$output = array();

	foreach( $input as $key => $val ) {

		if( isset ( $input[$key] ) ) {
			$output[$key] = esc_url_raw( strip_tags( stripslashes( $input[$key] ) ) );
		}

	}

	return apply_filters( 'meanthemes_theme_sanitize_social_options', $output, $input );

}

function meanthemes_theme_validate_styling_options( $input ) {

	$output = array();

	foreach( $input as $key => $value ) {

		if( isset( $input[$key] ) ) {

			$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );

		}

	}

	return apply_filters( 'meanthemes_theme_validate_styling_options', $output, $input );

}

/* #######################################################################

Update Mechanism

####################################################################### */

require 'meanthemes-updates.php';
$meanthemes_update_checker = new ThemeUpdateChecker(
	'moustachey',
	'http://www.meanthemes.com/updates/moustachey.json'
);


/* #######################################################################

Envoke Media Uploader JS & CSS

####################################################################### */

function meanthemes_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script( 'farbtastic' );
	wp_enqueue_script('mean_colour',get_template_directory_uri() . '/framework/js/meanthemes-colour.js');
}

function meanthemes_admin_styles() {
	wp_enqueue_style('thickbox');
	wp_enqueue_style( 'farbtastic' );
}

add_action('admin_print_scripts', 'meanthemes_admin_scripts');
add_action('admin_print_styles', 'meanthemes_admin_styles');


/* #######################################################################

Load MeanThemes Admin CSS

####################################################################### */

function meanthemes_admin_css()
{
	wp_register_style("meanthemes_admin", get_template_directory_uri()."/framework/meanthemes_admin.css", false, false);
	wp_enqueue_style("meanthemes_admin");
}
add_action('admin_print_styles', 'meanthemes_admin_css',11);

/* #######################################################################

Load Front-end JS

####################################################################### */



function wp_load_meanmenu() {
	wp_enqueue_script('meanmenu',get_template_directory_uri() . '/assets/js/plugins/jquery.meanmenu.js',array('jquery'));
}
function wp_load_tweets() {
	wp_enqueue_script('tweets',get_template_directory_uri() . '/assets/js/plugins/jquery.tweet.js',array('jquery'));
}
function wp_load_superfish() {
	wp_enqueue_script('superfish',get_template_directory_uri() . '/assets/js/plugins/superfish.js',array('jquery'));
}
function wp_load_supersubs() {
	wp_enqueue_script('supersubs',get_template_directory_uri() . '/assets/js/plugins/supersubs.js',array('jquery','superfish'));
}
function wp_load_validate() {
	wp_enqueue_script('validate',get_template_directory_uri() . '/assets/js/plugins/jquery.validate.js',array('jquery'));
}
function wp_load_fitvids() {
	wp_enqueue_script('fitvids',get_template_directory_uri() . '/assets/js/plugins/jquery.fitvids.js',array('jquery'));
}
function wp_load_flexslider() {
	wp_enqueue_script('flexslider',get_template_directory_uri() . '/assets/js/plugins/jquery.flexslider-min.js',array('jquery'));
}
function wp_load_jplayer() {
	wp_enqueue_script('jplayer',get_template_directory_uri() . '/assets/js/plugins/jquery.jplayer.min.js',array('jquery'));
}
function wp_load_truncate() {
	wp_enqueue_script('truncate',get_template_directory_uri() . '/assets/js/plugins/jquery.truncate.min.js',array('jquery'));
}
function wp_load_meanthemes() {
	wp_enqueue_script('meanthemes',get_template_directory_uri() . '/assets/js/meanthemes.js',array('jquery', 'jquery-ui-accordion', 'jquery-ui-tabs','flexslider','truncate'));
}
function wp_load_htmlshim() {
	wp_enqueue_script('htmlshim',get_template_directory_uri() . '/assets/js/html5.js',array('jquery'));
}

if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

add_action('wp_enqueue_scripts', 'wp_load_htmlshim');
add_action('wp_enqueue_scripts', 'wp_load_meanmenu');
add_action('wp_enqueue_scripts', 'wp_load_tweets');
add_action('wp_enqueue_scripts', 'wp_load_superfish');
add_action('wp_enqueue_scripts', 'wp_load_supersubs');
add_action('wp_enqueue_scripts', 'wp_load_validate');
add_action('wp_enqueue_scripts', 'wp_load_fitvids');
add_action('wp_enqueue_scripts', 'wp_load_flexslider');
add_action('wp_enqueue_scripts', 'wp_load_jplayer');
add_action('wp_enqueue_scripts', 'wp_load_truncate');
add_action('wp_enqueue_scripts', 'wp_load_meanthemes');
 

/* #######################################################################

Load Front-end CSS

####################################################################### */

function theme_styles() { 
  wp_register_style( 'custom-style', 
    get_template_directory_uri() . '/framework/meanthemes-options.php', 
    array(), 
    '20121030', 
    'all' );
  wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');
?>