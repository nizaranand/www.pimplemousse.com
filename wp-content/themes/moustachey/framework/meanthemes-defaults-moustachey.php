<?php
if(defined("ABSPATH"))
{
	$path = ABSPATH;
}
else
{
	$path = "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
}
include_once $path . 'wp-load.php';
include_once $path . 'wp-includes/wp-db.php';
include_once $path . 'wp-includes/pluggable.php';

if(isset($_POST["meanthemes_options"]))
{
	$optionType = $_POST["meanthemes_options"];

	if(isset($optionType["reset-general_options"]))
	{
		// default configuration options
		$defaultOptions = array(
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

		update_option("meanthemes_theme_general_options_moustachey", $defaultOptions);
		header('Location:'. get_site_url() .'/wp-admin/admin.php?page=meanthemes_theme_options&tab=general_options');
	}
	if(isset($optionType["reset-social_options"]))
	{
		// default configuration options
		$defaultOptions = array(
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
		update_option("meanthemes_theme_social_options_moustachey", $defaultOptions);
		header('Location:'. get_site_url() .'/wp-admin/admin.php?page=meanthemes_theme_options&tab=social_options');
	}
	if(isset($optionType["reset-styling_options"]))
	{
		// default configuration options
		$defaultOptions = array(
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
		update_option("meanthemes_theme_styling_options_moustachey", $defaultOptions);
		header('Location:'. get_site_url() .'/wp-admin/admin.php?page=meanthemes_theme_options&tab=styling_options');
	}

	if(isset($optionType["reset-content_options"]))
	{
		// default configuration options
		$defaultOptions = array(
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

		update_option("meanthemes_theme_content_options_moustachey", $defaultOptions);
		header('Location:'. get_site_url() .'/wp-admin/admin.php?page=meanthemes_theme_options&tab=content_options');
	}
}
?>