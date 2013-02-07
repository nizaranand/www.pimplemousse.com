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

	if(isset($optionType["dismiss"]))
	{
		update_option( 'meanthemes_dismiss_moustachey', '1' );
		header('Location:'. get_site_url() .'/wp-admin/admin.php?page=meanthemes_theme_options&tab=general_options');
	}
}
?>