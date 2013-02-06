<?php

	/*
	*	Plugin Name: 	Social Media Bookmark Plugin + (SMBP)
	*	Plugin URI: 	http://wordpress.org/
	*	Description: 	Socially enhance your website/bog
	*	Version: 		1.0
	*	Author: 		Benjamin Reid
	*	Author URI: 	http://www.nouveller.com/
	*/
	
	
	
	$wp_url = get_bloginfo('wpurl');
	
	/*

	*/
	
	function icon_filter($content)
	{
		global $wp_url;
	
		$regex = '/\[(\w*)\s(button|16|32)\]/';
		
		$replace = '<img src="'.$wp_url.'/wp-content/plugins/smbp/icons/$2/$1.png" />';
	
		$filtered_content = preg_replace($regex, $replace, $content);
	
		return $filtered_content;
	}

	add_filter('the_content', 'icon_filter');
	
	add_filter('the_excerpt', 'icon_filter');
	
	add_filter('comment_text', 'icon_filter');
	
	
	
	/*
	
	*/
	
	function icon($site = '', $size = '')
	{
		global $wp_url;
	
		if(empty($site) || empty($size))
		{
			echo '<p><em>Please make sure you enter a <strong>social network site</strong> and a <strong>size</strong> into the <code>icon</code> template function.</em></p>';
		}
		else 
		{
			if($size == 'button')
			{
				$width = '122';
				
				$height = '42';
				
			}
			else 
			{
				$width = $size;
				
				$height = $width;		
			}
			
			
			$icon = '<img src="'.$wp_url.'/wp-content/plugins/smbp/icons/'.$size.'/'.$site.'.png" width="'.$width.'" height="'.$height.'" />';
			
			return $icon;
		}
	}

?>