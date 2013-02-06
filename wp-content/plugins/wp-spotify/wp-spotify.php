<?php
	/*
	Plugin Name: WP-Spotify
	Plugin URI: http://hermanssondavid.com
	Description: Link Spotify tracks to your posts and pages. Including widget.
	Version: 2.0
	Author: David Hermansson
	Author URI: http://hermanssondavid.com
	*/
	
	if (isset($spotify)) return false;
	require_once(dirname(__FILE__) . '/wp-spotify.class.php');
	$spotify = new Spotify();
?>