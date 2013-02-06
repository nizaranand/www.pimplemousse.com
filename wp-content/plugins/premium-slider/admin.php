<?php
/*
Plugin Name: Premium Slider
Plugin URI: http://premiumslider.matthewruddy.com
Description: The Premium Slider is a multi-instance image slider plugin for Wordpress. It allows you to easily create and manage individually unique image sliders and customize them to your liking without needing to have any CSS or HTML knowledge. Sliders can get images from posts or from custom URLs.
Version: 1.0.9
Author: Matthew Ruddy
Author URI: http://matthewruddy.com
License: This plugin is licensed under the GNU General Public License. Copyright 2011 MatthewRuddy.com
*/


add_action('wp_head', 'premium_slider_header');

function premium_slider_admin_scripts() {
global $pagenow;

if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
  $url = 'meta';
} else {
  $url = 'admin';
}

wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('script-admin', WP_PLUGIN_URL.'/premium-slider/js/premium.slider.'. $url .'.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('script-admin');
}

function premium_slider_admin_styles() {
wp_enqueue_style('thickbox');
wp_register_style('premium-admin', WP_PLUGIN_URL.'/premium-slider/css/tabs.css', false);
wp_enqueue_style('premium-admin');
}

if ( ( isset($_GET['page']) && $_GET['page'] == 'premium-slider/admin.php' ) || $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
add_action('admin_print_scripts', 'premium_slider_admin_scripts');
add_action('admin_print_styles', 'premium_slider_admin_styles');
}

function add_scripts() {
$scripturl = WP_PLUGIN_URL .'/premium-slider/js/';

if ( !is_admin() ) {
  if ( get_option('premium_slider_jquery') != 'false' ) {
    wp_enqueue_script('jquery');
  }
  
  wp_register_script('easing', $scripturl.'jquery.easing.js', false, '1.3');
  wp_enqueue_script('easing');
  wp_register_script('script', $scripturl.'premium.slider.js', false, '1.0.9');
  wp_enqueue_script('script');
}

}

function add_styles() {
$sliderstyle = WP_PLUGIN_URL .'/premium-slider/css/slider.css';

wp_register_style('slider', $sliderstyle, '', '1.0.9');
wp_enqueue_style('slider');

}

add_action('wp_print_styles','add_styles');
add_action('wp_print_scripts','add_scripts');

// Admin Scripts

require_once 'slideshow.php';
require_once 'metabox.php';

function get_plugin_url( $path ) {
  return plugins_url( $path, __FILE__ );
}

function premium_slider_options( $type ) {
  if ( $type == 'names' ) {
    $array = array(
      'name', 'description', 'img1', 'img2', 'img3', 'img4', 'img5', 'img6', 'img7', 'img8', 'img9', 'img10',
      'img1url', 'img2url', 'img3url', 'img4url', 'img5url', 'img6url', 'img7url', 'img8url', 'img9url', 'img10url',
      'img1text', 'img2text', 'img3text', 'img4text', 'img5text', 'img6text', 'img7text', 'img8text', 'img9text', 'img10text',
      'img1title', 'img2title', 'img3title', 'img4title', 'img5title', 'img6title', 'img7title', 'img8title', 'img9title', 'img10title',
      'activation', 'width', 'height', 'shadow', 'sinterval', 'transition', 'bgcolour', 'bwidth', 'bcolour', 'preload', 'start', 'buttons',
      'source', 'featcat', 'featpost', 'padbottom', 'padleft', 'padright', 'paddingtop', 'shadowstyle', 'paginationon', 'paginationoff',
      'next', 'prev', 'sPagination', 'pageposition', 'pageside', 'permalink', 'transpeed', 'paginationstyle', 'paginationnum', 'textoverlay'
    );
  } elseif ( $type == 'values' ) {
    $array = array(
      'name' => '', 'description' => '', 'img1' => '', 'img2' => '', 'img3' => '', 'img4' => '', 'img5' => '', 'img6' => '', 'img7' => '', 'img8' => '', 'img9' => '', 'img10' => '',
      'img1url' => '', 'img2url' => '', 'img3url' => '', 'img4url' => '', 'img5url' => '', 'img6url' => '', 'img7url' => '', 'img8url' => '', 'img9url' => '', 'img10url' => '',
      'img1text' => '', 'img2text' => '', 'img3text' => '', 'img4text' => '', 'img5text' => '', 'img6text' => '', 'img7text' => '', 'img8text' => '', 'img9text' => '', 'img10text' => '',
      'img1title' => '', 'img2title' => '', 'img3title' => '', 'img4title' => '', 'img5title' => '', 'img6title' => '', 'img7title' => '', 'img8title' => '', 'img9title' => '', 'img10title' => '',
      'activation' => 'enable', 'width' => '480', 'height' => '160', 'shadow' => '', 'sinterval' => '4000', 'transition' => 'slide', 'bgcolour' => 'fff', 'bwidth' => '0', 'bcolour' => 'ccc', 'preload' => 'indicator', 'start' => '1', 'buttons' => 'true',
      'source' => 'custom', 'featcat' => '', 'featpost' => '10', 'padbottom' => '0', 'padleft' => '0', 'padright' => '0', 'paddingtop' => '0', 'shadowstyle' => 'arc', 'paginationon' => get_plugin_url( '/images/pagination_current.png' ), 'paginationoff' => get_plugin_url( '/images/pagination.png' ),
      'next' => '', 'prev' => '', 'sPagination' => 'on', 'pageposition' => 'outside', 'pageside' => 'left', 'permalink' => '', 'transpeed' => '1200', 'paginationstyle' => 'icons', 'paginationnum' => '4', 'textoverlay' => ''
      );
  }
  return $array;
}

function premium_slider_search( $slideshows, $key, $value, $return = 'array' ) {
    // Foreach array within the $slideshows array, this variable is incremented. It is then used to determine the array index of the matched ID.
    $id = 0;
    $found = false;
    if ( is_array( $slideshows ) ) {
        foreach ( $slideshows as $slideshow ) {
            if ( $slideshow[ $key ] == $value ) {
                // Return either the entire array, or its array index within the $slideshows array.
                if ( $return == 'array' ) return $slideshow;
                elseif ( $return == 'id' ) return $id;
                elseif ( $return == 'boolean' )
                    if ( isset ( $slideshow ) )
                        return true;
                    else
                        return false;
            }
        $id++; }
    }
}

function premium_slider_install () {
  
  $names = premium_slider_options( 'names' );
  $values = premium_slider_options( 'values' );
  $id = 1;
  
  $first = array();
  
  foreach ( $names as $name ) {
    $array = array( $name => stripslashes( $values[ $name ] ) );
    $first = array_merge( $array, $first );
  }
  
  $first[ 'id' ] = $id;
  $first[ 'name' ] = 'SliderOne';
  $first[ 'description' ] = 'This is the description for slider one. You can edit it by clicking "Edit Slider".';
  
  add_option( 'premium_slider_slideshows', array( $first ) );
  add_option( 'premium_slider_id', $id+1 );
  add_option( 'premium_slider_jquery', 'true' );
  
}

function premium_slider_uninstall () {
  delete_option( 'premium_slider_slideshows' );
  delete_option( 'premium_slider_id' );
  delete_option( 'premium_slider_jquery' );
}

register_activation_hook(__FILE__,'premium_slider_install');
register_uninstall_hook(__FILE__,'premium_slider_uninstall');

function print_admin_form() {
  global $wpdb;
  $table_name = $wpdb->prefix . "premiumslider";

  if(isset($_REQUEST['deleteslider'])) { // Delete Slider
    $id = $_REQUEST['deleteslider'];
    $sliders = get_option( 'premium_slider_slideshows' );
    $sliders = array_values( $sliders );
    $slider = premium_slider_search( $sliders, 'id', $id, 'id' );
    unset( $sliders[ $slider ] );
    $sliders = array_values( $sliders );
    update_option( 'premium_slider_slideshows', $sliders );
  }
    
  if (isset($_POST['addnew'])) { // Add new slider
	
	
	  $names = premium_slider_options( 'names' );
	  $values = premium_slider_options( 'values' );
	  $id = get_option( 'premium_slider_id' );
	  $sliders = get_option( 'premium_slider_slideshows' );
	  
	  $new = array();
	  
	  foreach ( $names as $name ) {
	    $array = array( $name => stripslashes( $values[ $name ] ) );
	    $new = array_merge( $array, $new );
	  }
	  
	  $new[ 'id' ] = $id;
	  $new[ 'name' ] = $_REQUEST[ 'name' ];
	  $new[ 'description' ] = $_REQUEST[ 'description' ];
	  
	  $sliders = array_merge( $sliders, array( $new ) );
	
	  update_option( 'premium_slider_slideshows', $sliders );
	  update_option( 'premium_slider_id', $id+1 );
	  
	  
  }
  
  if (isset($_POST['jquerystat'])) { // Change jQuery settings
	
	$jquery = $_REQUEST['jquery'];
	
	if ($jquery != ''){
  update_option( 'premium_slider_jquery', $jquery );
  echo '<div id="message" class="updated" style="width:750px;"><p><strong>Successfully updated jQuery settings.</strong></p></div>'; }
  else {
  echo '<div id="message" class="error" style="width:750px;"><p><strong>Failed to update jQuery settings.</strong></p></div>'; }
  }
  
  if(!isset($_REQUEST['editslider']) && !isset($_REQUEST['do_editslider'])){ ?>
	

<div class="wrap">
<div id="icon-plugins" class="icon32"></div><h2>Premium Slider</h2>

<div style="width:500px;float:left;">
    <div class="metabox-holder" style="width:500px;">
    <div class="postbox">
      <table class="form-table" style="margin:0;">
      <td style="padding:0;width:30px;"><h3><?php _e('ID', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td>
      <td style="padding:0;width:130px;"><h3><?php _e('Name', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td>
      <td style="padding:0;width:280px;"><h3><?php _e('Description', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td>
      <td style="padding:0;"><h3><?php _e('Edit', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td>
      <td style="width:50px;padding:0;"><h3><?php _e('Delete', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td>
      </tr>
      <?php
      $names = get_option( 'premium_slider_slideshows' );
      
      foreach ($names as $name) { ?>
        <tr valign="top" style="border-bottom:1px solid #ccc;">
        <td style="margin:5px 0;"><?php echo $name[ 'id' ]; ?></td>
        <td style="margin:5px 0;"><?php echo $name[ 'name' ]; ?></td>
        <td style="margin:5px 0;"><p style="margin:0;font-style:italic;font-size:11px;"><?php echo $name[ 'description' ]; ?></p></td>
        <td style="margin:5px 0;"><form action="" method="post"><input name="editslider" type="hidden" value="<?php echo $name[ 'id' ];?>" /><input type="submit" class="button-secondary" value="Edit" /></form></td>
        <td style="margin:5px 0;"><form action="" method="post"><input name="deleteslider" type="hidden" value="<?php echo $name[ 'id' ];?>" /><input type="submit" class="button-primary" value="Delete" /></form></td>
        </tr>
      <?php } ?>
      </table>
    </div>
    </div>
 </div>
    
 <div style="width:350px;float:left;margin-left:15px;">   
	<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>&updated=true">
	  <div class="metabox-holder" style="width:350px;">
    <div class="postbox">
      <h3><span><?php _e('Add new slider:', 'premium_slider_trans', 'premium_slider_trans'); ?></span></h3>
      <h4 style="margin:10px;"><?php _e('Name:', 'premium_slider_trans', 'premium_slider_trans'); ?></h4><input type="text" name="name" style="width:330px;margin:10px;margin-top:0;"/>
      <h4 style="margin:10px;"><?php _e('Description:', 'premium_slider_trans', 'premium_slider_trans'); ?></h4><textarea name="description" style="width:330px;height:100px;margin:10px;margin-top:0;overflow:hidden;"></textarea><br />
      <input type="submit" class="button-primary" name="addnew" value="Add Slider" style="margin:10px;margin-top:0;" />
    </div>
    </div>
	</form>
	
  <form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>&updated=true">
	  <div class="metabox-holder" style="width:350px;">
    <div class="postbox">
      <h3><span><?php _e('Enable/Disable jQuery', 'premium_slider_trans', 'premium_slider_trans'); ?></span></h3>
      <div style="margin: 10px;">
      <h4 style="float:left;margin:5px 0 0 0;padding:0;"><?php _e('Load jQuery?', 'premium_slider_trans', 'premium_slider_trans'); ?></h4>
      <select name="jquery" style="width: 80px; float: left; margin: 0 0 10px 15px;">
          <option value="true" <?php selected('true', get_option('premium_slider_jquery')) ?>><?php _e('True', 'premium_slider_trans', 'premium_slider_trans'); ?></option>
          <option value="false" <?php selected('false', get_option('premium_slider_jquery')); ?>><?php _e('False', 'premium_slider_trans', 'premium_slider_trans'); ?></option>
        </select>
      </div>
      </td>
      <input type="submit" class="button-secondary" name="jquerystat" value="Save Changes" style="margin:0 0 10px 15px;" />
    </div>
    </div>
	</form>
	</div>
  
</div> <?php } 

  if(isset($_REQUEST['editslider'])||isset($_REQUEST['do_editslider'])){ // Update Slider
    if(isset($_REQUEST['editslider'])){
    $cat = $_REQUEST['editslider'];
    $slider = premium_slider_search( get_option( 'premium_slider_slideshows' ), 'id', $cat, 'array' ); }
    
    if(isset($_REQUEST['do_editslider'])){
      	  
	  $names = premium_slider_options( 'names' );
	  $id = $_REQUEST[ 'editsliderid' ];
	  $sliders = get_option( 'premium_slider_slideshows' );
	  $slider = premium_slider_search( $sliders, 'id', $id, 'id' );
	  
	  $updated = array();
	  
	  foreach ( $names as $name ) {
	    $array = array( $name => stripslashes( $_REQUEST[ $name ] ) );
	    $updated = array_merge( $array, $updated );
	  }
	  
	  $updated[ 'id' ] = $id;
	  
	  
	  if($updated[ 'textoverlay' ] == '') {
	    $updated[ 'pageposition' ] = 'outside';
	  }
	  if($updated[ 'textoverlay' ] != '') {
	    $updated[ 'pageposition' ] = $_REQUEST[ 'pageposition' ];
	  }
	  
	  $sliders[ $slider ] = $updated;

    if($updated[ 'name' ]==''){
    echo '<div id="message" class="error" style="width:750px;"><p><strong>Error: Failed to enter slider name.</strong></p></div>';
    }
    else{
    update_option( 'premium_slider_slideshows', $sliders );
    echo '<div id="message" class="updated" style="width:750px;"><p><strong>Successfully updated slider!</strong></p></div>'; 
    }
    $cat = $_REQUEST['editsliderid'];
    $slider = premium_slider_search( get_option( 'premium_slider_slideshows' ), 'id', $cat, 'array' ); }?>
    <div class="wrap">
    <h2 style="margin:0;">"<?php echo $slider[ 'name' ];?>" <?php _e('Slider Settings', 'premium_slider_trans', 'premium_slider_trans'); ?></h2>
    <form method="post" action="">
    	
  <div id="premium-tabs">
	<ul>
 		<li class="custom-images selected"><a href="javascript: jQuery.tabs('custom-images');"><?php _e('Custom Images', 'premium_slider_trans', 'premium_slider_trans'); ?></a></li>
		<li class="slider-settings"><a href="javascript: jQuery.tabs('slider-settings');"><?php _e('Slider Settings', 'premium_slider_trans', 'premium_slider_trans'); ?></a></li>
		<li class="usage-settings"><a href="javascript: jQuery.tabs('usage-settings');"><?php _e('Usage Settings', 'premium_slider_trans', 'premium_slider_trans'); ?></a></li>
	</ul>
	
	<div class="metabox-holder" style="width:810px;">
  <input id="upload_image_button" class="button-secondary" type="button" value="Upload Image" />
	<input name="editsliderid" type="hidden" value="<?php echo $cat; ?>" /><input type="submit" name="do_editslider" class="button-primary" value="Update Options" />
	<div style="display:inline;font-style:italic;font-size:11px;padding-left:10px;"><?php _e('<b>Important:</b> Click "save changes" after every image you "insert into post".', 'premium_slider_trans', 'premium_slider_trans'); ?> </div>
	</div>
		
  
    <div class="tab-content" id="custom-images" style="display: block;"><!-- first div for content tabs -->
    
    <div class="metabox-holder" style="width:810px;float:left;">
    <div class="postbox">
      <table class="form-table" style="margin:0;">
      <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:0;width:180px;"><h3><?php _e('Name', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td>
      <td style="padding:0;width:250px;"><h3><?php _e('Value', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td>
      <td style="padding:0;"><h3><?php _e('Description', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td>
      </tr>
      <tr valign="top" style="border-bottom:1px solid #ccc;">
      <td><?php _e('Name', 'premium_slider_trans', 'premium_slider_trans'); ?></td>
      <td><input type="text" name="name" value="<?php echo $slider[ 'name' ]; ?>" style="width:250px;margin:10px;margin-left:0;margin-top:0;"/></td>
      <td style="margin:5px 0;"><p style="margin:0;font-style:italic;font-size:11px;"><?php _e('Edit the name of this specific slider.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td>
      </tr>
      <tr valign="top" style="border-bottom:1px solid #ccc;">
      <td><?php _e('Description', 'premium_slider_trans', 'premium_slider_trans'); ?></td>
      <td><textarea name="description" style="width:250px;height:80px;margin:10px;margin-left:0;margin-top:0;overflow:hidden;"><?php echo $slider[ 'description' ]; ?></textarea></td>
      <td style="margin:5px 0;"><p style="margin:0px;font-style:italic;font-size:11px;"><?php _e('Change the description of the slider (optional).', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td>
      </tr>
      </table>
    </div>
    </div>
  
	<div class="metabox-holder" style="width:402px;float:left;"><div class="postbox"><h3><span>Image #1 link:</span></h3>
	<?php if($slider[ 'img1' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img1' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]=='') echo 'id="upload_image"'; ?> name="img1" value="<?php echo stripslashes($slider[ 'img1' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img1url" value="<?php echo stripslashes($slider[ 'img1url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img1title" value="<?php echo stripslashes($slider[ 'img1title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img1text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img1text' ]; ?></textarea></div>
	
		<div class="postbox"><h3><span>Image #2 link:</span></h3>
	<?php if($slider[ 'img2' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img2' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]=='') echo 'id="upload_image"'; ?> name="img2" value="<?php echo stripslashes($slider[ 'img2' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img2url" value="<?php echo stripslashes($slider[ 'img2url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img2title" value="<?php echo stripslashes($slider[ 'img2title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img2text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img2text' ]; ?></textarea></div>
	
		<div class="postbox"><h3><span>Image #3 link:</span></h3>
	<?php if($slider[ 'img3' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img3' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]!=''  && $slider[ 'img3' ]=='') echo 'id="upload_image"'; ?> name="img3" value="<?php echo stripslashes($slider[ 'img3' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img3url" value="<?php echo stripslashes($slider[ 'img3url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img3title" value="<?php echo stripslashes($slider[ 'img3title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img3text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img3text' ]; ?></textarea></div>
	
		<div class="postbox"><h3><span>Image #4 link:</span></h3>
	<?php if($slider[ 'img4' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img4' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]!='' && $slider[ 'img3' ]!='' && $slider[ 'img4' ]=='') echo 'id="upload_image"'; ?> name="img4" value="<?php echo stripslashes($slider[ 'img4' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img4url" value="<?php echo stripslashes($slider[ 'img4url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img4title" value="<?php echo stripslashes($slider[ 'img4title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img4text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img4text' ]; ?></textarea></div>

		<div class="postbox"><h3><span>Image #5 link:</span></h3>
	<?php if($slider[ 'img5' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img5' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]!='' && $slider[ 'img3' ]!='' && $slider[ 'img4' ]!='' && $slider[ 'img5' ]=='') echo 'id="upload_image"'; ?> name="img5" value="<?php echo stripslashes($slider[ 'img5' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img5url" value="<?php echo stripslashes($slider[ 'img5url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img5title" value="<?php echo stripslashes($slider[ 'img5title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img5text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img5text' ]; ?></textarea></div></div>

		<div class="metabox-holder" style="width:402px;float:left;margin-left:10px;"><div class="postbox"><h3><span>Image #6 link:</span></h3>
	<?php if($slider[ 'img6' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img6' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]!='' && $slider[ 'img3' ]!='' && $slider[ 'img4' ]!='' && $slider[ 'img5' ]!='' && $slider[ 'img6' ]=='') echo 'id="upload_image"'; ?> name="img6" value="<?php echo stripslashes($slider[ 'img6' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img6url" value="<?php echo stripslashes($slider[ 'img6url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img6title" value="<?php echo stripslashes($slider[ 'img6title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img6text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img6text' ]; ?></textarea></div>

		<div class="postbox"><h3><span>Image #7 link:</span></h3>
	<?php if($slider[ 'img7' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img7' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]!='' && $slider[ 'img3' ]!='' && $slider[ 'img4' ]!='' && $slider[ 'img5' ]!='' && $slider[ 'img6' ]!='' && $slider[ 'img7' ]=='') echo 'id="upload_image"'; ?> name="img7" value="<?php echo stripslashes($slider[ 'img7' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img7url" value="<?php echo stripslashes($slider[ 'img7url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img7title" value="<?php echo stripslashes($slider[ 'img7title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img7text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img7text' ]; ?></textarea></div>

		<div class="postbox"><h3><span>Image #8 link:</span></h3>
	<?php if($slider[ 'img8' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img8' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]!='' && $slider[ 'img3' ]!='' && $slider[ 'img4' ]!='' && $slider[ 'img5' ]!='' && $slider[ 'img6' ]!='' && $slider[ 'img7' ]!='' && $slider[ 'img8' ]=='') echo 'id="upload_image"'; ?> name="img8" value="<?php echo stripslashes($slider[ 'img8' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img8url" value="<?php echo stripslashes($slider[ 'img8url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img8title" value="<?php echo stripslashes($slider[ 'img8title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img8text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img8text' ]; ?></textarea></div>

		<div class="postbox"><h3><span>Image #9 link:</span></h3>
	<?php if($slider[ 'img9' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img9' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]!='' && $slider[ 'img3' ]!='' && $slider[ 'img4' ]!='' && $slider[ 'img5' ]!='' && $slider[ 'img6' ]!='' && $slider[ 'img7' ]!='' && $slider[ 'img8' ]!='' && $slider[ 'img9' ]=='') echo 'id="upload_image"'; ?> name="img9" value="<?php echo stripslashes($slider[ 'img9' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img9url" value="<?php echo stripslashes($slider[ 'img9url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img9title" value="<?php echo stripslashes($slider[ 'img9title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img9text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img9text' ]; ?></textarea></div>
	
		<div class="postbox"><h3><span>Image #10 link:</span></h3>
	<?php if($slider[ 'img10' ]) echo '<h4 style="margin:10px;">Preview:</h4><img src="'.$slider[ 'img10' ].'" style="margin:0 10px;width:380px;" />'; ?><h4 style="margin:10px;">Image Path:</h4><input type="text" <?php if($slider[ 'img1' ]!='' && $slider[ 'img2' ]!='' && $slider[ 'img3' ]!='' && $slider[ 'img4' ]!='' && $slider[ 'img5' ]!='' && $slider[ 'img6' ]!='' && $slider[ 'img7' ]!='' && $slider[ 'img8' ]!='' && $slider[ 'img9' ]!='' && $slider[ 'img10' ]=='') echo 'id="upload_image"'; ?> name="img10" value="<?php echo stripslashes($slider[ 'img10' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;"/><h4 style="margin:10px;">Image URL:</h4><input type="text" name="img10url" value="<?php echo stripslashes($slider[ 'img10url' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Title:</h4><input type="text" name="img10title" value="<?php echo stripslashes($slider[ 'img10title' ]); ?>" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="width: 380px;margin:10px;margin-top:0px;" /><h4 style="margin:10px;">Text:</h4><textarea name="img10text" <?php if($slider[ 'source' ]!='custom') echo 'readonly="readonly"';?>style="overflow:hidden;<?php if($slider[ 'source' ]!='custom') echo 'background:#eee;'; ?>width:380px;margin:10px;margin-top:0px;"><?php echo $slider[ 'img10text' ]; ?></textarea></div></div>
	
	<div class="clear"></div>	
	</div><!--end first content div-->
	
	<div class="tab-content" id="slider-settings" style="display: none;"><!-- second div for content tabs -->
		
	<div class="metabox-holder" style="width: 815px;">
	<div class="postbox">

		<table class="form-table" style="margin:0;">
		<tr valign="top"><td style="padding:0;width:180px;"><h3><?php _e('General', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td><td style="padding:0;width:130px;"><h3><span style="visibility:hidden;"><?php _e('Value', 'premium_slider_trans', 'premium_slider_trans'); ?></span></h3></td><td style="padding:0;"><h3><span style="visibility:hidden;"><?php _e('Description', 'premium_slider_trans', 'premium_slider_trans'); ?></span></h3></td></tr>




		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="width" style="padding:10px;font-weight:bold;"><?php _e('Slider "width"', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="width" value="<?php echo $slider[ 'width' ]; ?>" style="width: 50px;" />px</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Set the sliders width.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>

		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="height" style="padding:10px;font-weight:bold;"><?php _e('Slider "height"', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="height" value="<?php echo $slider[ 'height' ]; ?>" style="width: 50px;" />px</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Set the sliders height.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="padbottom" style="padding:10px;font-weight:bold;"><?php _e('Padding Bottom', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="padbottom" value="<?php echo $slider[ 'padbottom' ]; ?>" style="width: 50px;" />px</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Amount of padding to add to the bottom of the slider.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="paddingtop" style="padding:10px;font-weight:bold;"><?php _e('Padding Top', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="paddingtop" value="<?php echo $slider[ 'paddingtop' ]; ?>" style="width: 50px;" />px</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Amount of padding to add to the top of the slider.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="padright" style="padding:10px;font-weight:bold;"><?php _e('Padding Right', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="padright" value="<?php echo $slider[ 'padright' ]; ?>" style="width: 50px;" />px</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Amount of padding to add to the right of the slider.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>
		
    <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="padleft" style="padding:10px;font-weight:bold;"><?php _e('Padding Left', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="padleft" value="<?php echo $slider[ 'padleft' ]; ?>" style="width: 50px;" />px</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Amount of padding to add to the left of the slider.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="bgcolour" style="padding:10px;font-weight:bold;"><?php _e('Background Colour:', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="bgcolour" value="<?php echo $slider[ 'bgcolour' ]; ?>" style="width: 50px;" /></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Change the sliders background colour. When left blank it is set to white in order for the preloader to function correctly.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>

		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="start" style="padding:10px;font-weight:bold;"><?php _e('Start Position:', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="start" value="<?php echo $slider[ 'start' ]; ?>" style="width: 50px;" /></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Number of the image that the slider will start with. Choose a number between one and ten.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>

<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="sinterval" style="padding:10px;font-weight:bold;"><?php _e('Auto Play:', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="sinterval" value="<?php echo $slider[ 'sinterval' ]; ?>" style="width: 50px;" /></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('The amount of time in milliseconds each image is displayed for.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>


		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="transpeed" style="padding:10px;font-weight:bold;"><?php _e('Transition Speed:', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="transpeed" value="<?php echo $slider[ 'transpeed' ]; ?>" style="width: 50px;" /></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Amount of time it takes to transition one image to another.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>

    <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="transition" style="padding:10px;font-weight:bold;"><?php _e('Animation Style:', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
		<td style="padding:5px 0;margin-left:5px;"><select name="transition" style="width:110px;">
			<option style="padding-right:10px;" value="slide" <?php selected('slide', $slider[ 'transition' ]); ?>><?php _e('Slide', 'premium_slider_trans', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="smooth" <?php selected('smooth', $slider[ 'transition' ]); ?>><?php _e('Smooth', 'premium_slider_trans', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="fade" <?php selected('fade', $slider[ 'transition' ]); ?>><?php _e('Fade', 'premium_slider_trans', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="swipe" <?php selected('swipe', $slider[ 'transition' ]); ?>><?php _e('Swipe', 'premium_slider_trans', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="bounce" <?php selected('bounce', $slider[ 'transition' ]); ?>><?php _e('Bounce', 'premium_slider_trans', 'premium_slider_trans'); ?></option>
		</select></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Easing effect used to transition from each image. Choose from five different effect: slide, smooth, fade, swipe & bounce.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>

		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="bwidth" style="padding:10px;font-weight:bold;"><?php _e('Border Width:', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="bwidth" value="<?php echo $slider[ 'bwidth' ]; ?>" style="width: 50px;" />px</td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Width of the sliders surrounding border. Set to "0" for no border.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>

<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="bcolour" style="padding:10px;font-weight:bold;"><?php _e('Border Colour:', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="bcolour" value="<?php echo $slider[ 'bcolour' ]; ?>" style="width: 50px;" /></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Colour of the surrounding border.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>
		
		</table></div></div><!-- General -->
		
		<div class="metabox-holder" style="width: 815px;">
    <div class="postbox">
		
		<table class="form-table" style="margin:0;">
		<tr valign="top"><td style="padding:0;width:180px;"><h3><?php _e('Text Overlay', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td><td style="padding:0;width:130px;"><h3><span style="visibility:hidden;">Value</span></h3></td><td style="padding:0;"><h3><span style="visibility:hidden;">Description</span></h3></td></tr>

	  <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="textoverlay" style="padding:10px;font-weight:bold;"><?php _e('Disable Text', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
		<td style="padding:5px 0;margin-left:5px;"><input type="checkbox" name="textoverlay" <?php if ($slider[ 'textoverlay' ]) echo "checked='checked'"; ?>/><?php _e('Disable', 'premium_slider_trans', 'premium_slider_trans'); ?></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Choose to disable the text overlay if you wish.', 'premium_slider_trans', 'premium_slider_trans'); ?></p></td></tr>

		</table></div></div>
		
		<div class="metabox-holder" style="width: 815px;">
    <div class="postbox">
		
		<table class="form-table" style="margin:0;">
		<tr valign="top"><td style="padding:0;width:180px;"><h3><?php _e('Shadow', 'premium_slider_trans', 'premium_slider_trans'); ?></h3></td><td style="padding:0;width:130px;"><h3><span style="visibility:hidden;">Value</span></h3></td><td style="padding:0;"><h3><span style="visibility:hidden;">Description</span></h3></td></tr>

		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="shadow" style="padding:10px;font-weight:bold;"><?php _e('Disable Shadow', 'premium_slider_trans', 'premium_slider_trans'); ?></label></td>
		<td style="padding:5px 0;margin-left:5px;"><input type="checkbox" name="shadow" <?php if ($slider[ 'shadow' ]) echo "checked='checked'"; ?>/><?php _e('Disable', 'premium_slider_trans'); ?></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Disable the shadow beneath the slider.', 'premium_slider_trans'); ?></p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="shadowtype" style="padding:10px;font-weight:bold;"><?php _e('Shadow Style:', 'premium_slider_trans'); ?></label></td>
		<td style="padding:5px 0;margin-left:5px;"><select name="shadowstyle" style="width:110px;">
			<option style="padding-right:10px;" value="arc" <?php selected('arc', $slider[ 'shadowstyle' ]); ?>><?php _e('Arc', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="large" <?php selected('large', $slider[ 'shadowstyle' ]); ?>><?php _e('Large', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="small" <?php selected('small', $slider[ 'shadowstyle' ]); ?>><?php _e('Small', 'premium_slider_trans'); ?></option>
		</select></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Choose between three different types of shadow beneath the slider.', 'premium_slider_trans'); ?></p></td></tr>

    </table></div></div>
    
    <div class="metabox-holder" style="width: 815px;">
    <div class="postbox">
		
		<table class="form-table" style="margin:0;">
		<tr valign="top"><td style="padding:0;width:180px;"><h3><?php _e('Navigation', 'premium_slider_trans'); ?></h3></td><td style="padding:0;width:130px;"><h3><span style="visibility:hidden;">Value</span></h3></td><td style="padding:0;"><h3><span style="visibility:hidden;">Description</span></h3></td></tr>


		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="buttons" style="padding:10px;font-weight:bold;"><?php _e('Next/Previous Buttons', 'premium_slider_trans'); ?></td></label>
		<td style="padding:5px 0;margin-left:5px;"><input type="checkbox" name="buttons" <?php if ($slider[ 'buttons' ]) echo "checked='checked'"; ?>/><?php _e('Enable', 'premium_slider_trans'); ?></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Enable the "next" and "previous" buttons. By default these are disabled.', 'premium_slider_trans'); ?></p></td></tr>

    <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="next" style="padding:10px;font-weight:bold;"><?php _e('Next Button Image', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="next" <?php if(empty($_REQUEST['buttons'])) {echo 'readonly="readonly"';}?> value="<?php echo $slider[ 'next' ]; ?>" style="width: 100px;" /><?php if($next!='') echo '<img src="'.$next.'" width="20px" style="position:relative;top:5px;padding-left:5px;" />';?></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('change the icon used for the "next" button. If left blank, it will use the default image.', 'premium_slider_trans'); ?></p></td></tr>
    
    <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="prev" style="padding:10px;font-weight:bold;"><?php _e('Previous Button Image', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="prev" <?php if(empty($_REQUEST['buttons'])) {echo 'readonly="readonly"';}?> value="<?php echo $slider[ 'prev' ]; ?>" style="width: 100px;" /><?php if($prev!='') echo '<img src="'.$prev.'" width="20px" style="position:relative;top:5px;padding-left:5px;" />';?></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Change the icon used for the "previous" button. If left blank, it will use the default image.', 'premium_slider_trans'); ?></p></td></tr>
		
		
		</table></div></div>
	  <div class="metabox-holder" style="width: 815px;">
    <div class="postbox">
		
		<table class="form-table" style="margin:0;">
		<tr valign="top"><td style="padding:0;width:180px;"><h3><?php _e('Preloader', 'premium_slider_trans'); ?></h3></td><td style="padding:0;width:130px;"><h3><span style="visibility:hidden;">Value</span></h3></td><td style="padding:0;"><h3><span style="visibility:hidden;">Description</span></h3></td></tr>



	<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="preload" style="padding:10px;font-weight:bold;"><?php _e('Preload Icon:', 'premium_slider_trans'); ?></label></td>
		<td style="padding:5px 0;margin-left:5px;"><select name="preload" style="width:110px;">
			<option style="padding-right:10px;" value="none" <?php selected('none', $slider[ 'preload' ]); ?>><?php _e('None', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="indicator" <?php selected('indicator', $slider[ 'preload' ]); ?>><?php _e('Indicator', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="arrows" <?php selected('arrows', $slider[ 'preload' ]); ?>><?php _e('Arrows', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="bar" <?php selected('bar', $slider[ 'preload' ]); ?>><?php _e('Bar', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="bigflower" <?php selected('bigflower', $slider[ 'preload' ]); ?>><?php _e('Big Flower', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="bounceball" <?php selected('bounceball', $slider[ 'preload' ]); ?>><?php _e('Bouncing Ball', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="original" <?php selected('original', $slider[ 'preload' ]); ?>><?php _e('Original', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="balls" <?php selected('balls', $slider[ 'preload' ]); ?>><?php _e('Balls', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="snake" <?php selected('snake', $slider[ 'preload' ]); ?>><?php _e('Snake', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="halfsnake" <?php selected('halfsnake', $slider[ 'preload' ]); ?>><?php _e('Half-snake', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="digital" <?php selected('digital', $slider[ 'preload' ]); ?>><?php _e('Digital', 'premium_slider_trans'); ?></option>
	<option style="padding-right:10px;" value="3d" <?php selected('3d', $slider[ 'preload' ]); ?>><?php _e('3D', 'premium_slider_trans'); ?></option>
		</select></td>

		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Animation displayed while slider is loading. Choose between eight different options or set to "none" for no image.', 'premium_slider_trans'); ?></p></td></tr>

		</table></div></div>
		<div class="metabox-holder" style="width: 815px;">
    <div class="postbox">
		
		<table class="form-table" style="margin:0;">
		<tr valign="top"><td style="padding:0;width:180px;"><h3><?php _e('Pagination', 'premium_slider_trans'); ?></h3></td><td style="padding:0;width:130px;"><h3><span style="visibility:hidden;">Value</span></h3></td><td style="padding:0;"><h3><span style="visibility:hidden;">Description</span></h3></td></tr>

		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="sPagination" style="padding:10px;font-weight:bold;"><?php _e('Pagination', 'premium_slider_trans'); ?></label></td>
		<td style="padding:5px 0;margin-left:5px;"><select name="sPagination" style="width:110px;">
			<option style="padding-right:10px;" value="yes" <?php selected('yes', $slider[ 'sPagination' ]); ?>><?php _e('Yes', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="no" <?php selected('no', $slider[ 'sPagination' ]); ?>><?php _e('No', 'premium_slider_trans'); ?></option>
		</select></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Icons acting as links for each individual image.', 'premium_slider_trans'); ?></p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="pageposition" style="padding:10px;font-weight:bold;"><?php _e('Pagination Position:', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><select name="pageposition" style="width:110px;" <?php if($slider[ 'textoverlay' ] == '') { echo 'disabled="disabled"'; } ?>>
			<option style="padding-right:10px;" value="outside" <?php selected('outside', $slider[ 'pageposition' ]); ?>><?php _e('Outside', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="inside" <?php selected('inside', $slider[ 'pageposition' ]); ?>><?php _e('Inside', 'premium_slider_trans'); ?></option>
		</select><br /><select name="pageside" style="width:110px;">
			<option style="padding-right:10px;" value="left" <?php selected('left', $slider[ 'pageside' ]); ?>><?php _e('Left', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="right" <?php selected('right', $slider[ 'pageside' ]); ?>><?php _e('Right', 'premium_slider_trans'); ?></option>
		</select></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Choose whether the pagination will be displayed inside the slider or outside of it. Also select whether it will appear on the left or right. Note: if the text overlay is enabled, you cannot position the pagination inside the slider.', 'premium_slider_trans'); ?></p></td></tr>
		
		<tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="paginationstyle" style="padding:10px;font-weight:bold;"><?php _e('Pagination Style:', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><select name="paginationstyle" style="width:110px;">
			<option style="padding-right:10px;" value="icons" <?php selected('icons', $slider[ 'paginationstyle' ]); ?>><?php _e('Icons', 'premium_slider_trans'); ?></option>
			<option style="padding-right:10px;" value="images" <?php selected('images', $slider[ 'paginationstyle' ]); ?>><?php _e('Images', 'premium_slider_trans'); ?></option>
		</select>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Choose between the various different styles of pagination.', 'premium_slider_trans'); ?></p></td></tr>
		
    <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="paginationnum" style="padding:10px;font-weight:bold;"><?php _e('Number of thumbs:', 'premium_slider_trans'); ?></label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="paginationnum" <?php if($slider[ 'paginationstyle' ] == 'icons') echo 'readonly="readonly"'; ?> value="<?php echo $slider[ 'paginationnum' ]; ?>" style="width: 100px;" />
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Select the amount of thumbnails to display as pagination when "Images" is selected above.', 'premium_slider_trans'); ?></p></td></tr>
		
    <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="paginationon" style="padding:10px;font-weight:bold;"><?php _e('Icon (active)', 'premium_slider_trans'); ?>:</label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="paginationon" <?php if($slider[ 'sPagination' ]=='no') echo 'readonly="readonly"';?> value="<?php echo $slider[ 'paginationon' ]; ?>" style="width: 100px;" /><?php if($slider[ 'paginationon' ]!='') echo '<img src="'.$slider[ 'paginationon' ].'" style="position:relative;top:5px;padding-left:5px;" />';?></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Insert the selected version here of your custom pagination icon here.', 'premium_slider_trans'); ?></p></td></tr>
		
    <tr valign="top" style="border-bottom:1px solid #ccc;"><td style="padding:5px 0;"><label for="paginationoff" style="padding:10px;font-weight:bold;"><?php _e('Icon (inactive)', 'premium_slider_trans'); ?>:</label></td>
			<td style="padding:5px 0;margin-left:5px;"><input type="text" name="paginationoff" <?php if($slider[ 'sPagination' ]=='no') echo 'readonly="readonly"';?> value="<?php echo $slider[ 'paginationoff' ]; ?>" style="width: 100px;" /><?php if($slider[ 'paginationoff' ]!='') echo '<img src="'.$slider[ 'paginationoff' ].'" style="position:relative;top:5px;padding-left:5px;" />';?></td>
		<td style="margin:5px 0;"><p style="margin:0;margin-left:10px;font-style:italic;font-size:11px;"><?php _e('Use your own custom pagination icons. Insert the unselected version here.', 'premium_slider_trans'); ?></p></td></tr>
	
		</table></div></div>
  <div class="clear"></div>
  </div>
  
  <div class="tab-content" id="usage-settings" style="display: none;"><!--third div for content tabs -->
	<div class="metabox-holder"style="width:815px;">
	<div class="postbox">
	<table class="form-table" style="margin:0;">
	<tr valign="top"><td style="padding:0;width:180px;"><h3><?php _e('Name', 'premium_slider_trans'); ?></h3></td><td style="padding:0;width:235px;"><h3><?php _e('Value', 'premium_slider_trans'); ?></h3></td><td style="padding:0;"><h3><?php _e('Description', 'premium_slider_trans'); ?></td></h3></tr>
	<tr valign="top" style="border-bottom:1px solid #ccc;">
	<td  style="padding:5px 0;">
     <label for="activation" style="padding:10px;font-weight:bold;"><?php _e('Activate Plugin', 'premium_slider_trans'); ?></label>
  </td>
  <td style="padding:5px 0;">
			<?php if($slider[ 'activation' ] == 'enable') { ?>
			<input type="radio" checked="checked" value="enable" name="activation"><?php _e('Enable', 'premium_slider_trans'); ?>
			<br />
			<input type="radio" value="disable" name="activation"><?php _e('Disable', 'premium_slider_trans'); ?>
			<?php } else { ?>
			<input type="radio" value="enable" name="activation"><?php _e('Enable', 'premium_slider_trans'); ?>
			<br />
			<input type="radio" checked="checked" value="disable" name="activation"><?php _e('Disable', 'premium_slider_trans'); ?>
			<?php } ?>
	</td>
	<td  style="margin:5px 0;">
	<p style="margin:0;font-style:italic;font-size:11px;">
	<?php _e('Enable or disable the slider.', 'premium_slider_trans'); ?>
	</p>
	</td>
	</tr>
			
	<tr valign="top" style="border-bottom:1px solid #ccc;">
	<td  style="padding:5px 0;">
  <label for="permalink" style="padding:10px;font-weight:bold;"><?php _e('Permalinks', 'premium_slider_trans'); ?></label>
  </td>
  <td style="padding:5px 0;">
			<input type="checkbox" name="permalink" <?php if ($slider[ 'permalink' ]) echo "checked='checked'"; ?>/><?php _e('Disable', 'premium_slider_trans'); ?>
	</td>
	<td  style="margin:5px 0;">
	<p style="margin:0;font-style:italic;font-size:11px;">
	<?php _e('Check this box to disable the permalinks on images sourced from posts (custom fields).', 'premium_slider_trans'); ?>
	</p>
	</td>
	</tr>
			
			<tr valign="top" style="border-bottom:1px solid #ccc;">
			<td  style="padding:5px 0;">
        <label for="source" style="padding:10px;font-weight:bold;"><?php _e('Get Images From?', 'premium_slider_trans'); ?></label>
      </td>
      <td  style="padding:5px 0;">
        <select name="source" style="width:235px;">
          <option value="featured" <?php selected('featured', $slider[ 'source' ]); ?>><?php _e('Custom Fields (Selected Category)', 'premium_slider_trans'); ?></option>
          <option value="all" <?php selected('all', $slider[ 'source' ]); ?>><?php _e('Custom Fields (All Categories)', 'premium_slider_trans'); ?></option>
          <option value="custom" <?php selected('custom', $slider[ 'source' ]); ?>><?php _e('Custom Images', 'premium_slider_trans'); ?></option>
        </select>
      </td>	
      <td  style="padding:5px 0;">
      <p style="margin:0 10px;font-style:italic;font-size:11px;">
      <?php _e('Here you can select the source from which the images are displayed.', 'premium_slider_trans'); ?></p><p style="margin:10px;font-style:italic;font-size:11px;"><?php _e('Select "Custom Fields" if you wish to get the images from custom fields. To do so, enter "easing" under name field & and the URL of the chosen image under the value field.', 'premium_slider_trans'); ?></p><p style="margin:10px;font-style:italic;font-size:11px;"><?php _e('Otherwise, you can choose to display "custom" images. These images can be uploaded in the "Custom Images" section where you can specify links to images from the Media Library or elsewhere.', 'premium_slider_trans'); ?></p><p style="margin:10px;font-style:italic;font-size:11px;"><?php _e('By default, this option is set to "Custom Fields (Selected Category)".', 'premium_slider_trans'); ?>
      </p>
      </td>
      </tr>
      
      <tr valign="top" style="border-bottom:1px solid #ccc;">
      <td  style="padding:5px 0;">
        <label for="featcat" style="padding:10px;font-weight:bold;"><?php _e('Selected Category:', 'premium_slider_trans'); ?></label>
      <td  style="padding:5px 0;"><style type="text/css">.cat_select{width:235px;};</style>
        <?php wp_dropdown_categories(array('hide_empty' => 0, 'class' => 'cat_select', 'name' => 'featcat', 'orderby' => 'name', 'selected' => $slider[ 'featcat' ], 'hierarchical' => true,));?>
      </td>
      <td style="padding:5px 0;">
      <p style="margin:10px;margin-top:0;font-style:italic;font-size:11px;">
      <?php _e("Here you can select which categorie's post thumbnails you wish to display if you have selected the 'Post thumbnails (Selected Category)' option above."); ?>
      </p>
      </tr>
      
      <tr valign="top">
      <td  style="padding:5px 0;">
        <label for="featpost" style="padding:10px;font-weight:bold;"><?php _e('Number of Posts:', 'premium_slider_trans'); ?></label>
      </td>
      <td  style="padding:5px 0;"">
          <input type="text" id="test" style="width:50px;" name="featpost" value="<?php echo $slider[ 'featpost' ]; ?>" <?php if($slider[ 'source' ]=='custom') echo 'readonly="readonly"'; ?> />
      </td>
      <td style="padding:5px 0;">
      <p style="margin:0 10px;font-style:italic;font-size:11px;">
      <?php _e('Number of post thumbnails to be displayed in the slider. No matter how high you set it, the slider will display a maximum of 10 images.', 'premium_slider_trans'); ?> </p></tr>
      </table>
      </div></div></div>
	
	<div class="clear"></div>
	</div><!--end yui-content-->
	</form>
  </div><!--end #wrap--><?php }
    }
    
    
function get_slider($id){
  global $wpdb;
  
  $table_name = $wpdb->prefix . "premiumslider";
  return $wpdb->get_row("SELECT * FROM $table_name WHERE id='$id'");
}


function delete_slider($id){
  global $wpdb;
  
  $table_name = $wpdb->prefix . "premiumslider";
  $data = $wpdb->get_row("SELECT * FROM $table_name WHERE id='$id'");
  return $data;
}

function add_premium_menu() {
   add_menu_page(
	'Premium Slider',
	'Premium Slider',
	'administrator',
	'premium-slider/admin.php',
	'print_admin_form'
	);
}

add_action('admin_menu', 'add_premium_menu');

function premium_slider_header() {
  $sliders = get_option( 'premium_slider_slideshows' );
    foreach ($sliders as $slider) { ?> 
    <style type="text/css"><?php if($slider[ 'paginationstyle' ] == 'icons') { ?>
  #lofslidecontent<?php echo $slider[ 'id' ]; ?> .lof-navigator li{<?php if($slider[ 'paginationstyle' ]=='icons'){ ?>background: url(<?php if($slider[ 'paginationoff' ]=='') echo WP_PLUGIN_URL.'/premium-slider/images/pagination.png'; if($slider[ 'paginationoff' ]!='') echo $slider[ 'paginationoff' ]; ?>) 0 0 no-repeat;<?php } ?>} 
  #lofslidecontent<?php echo $slider[ 'id' ]; ?> .lof-navigator li.active{<?php if($slider[ 'paginationstyle' ]=='icons'){ ?>background: url(<?php if($slider[ 'paginationon' ]=='') echo WP_PLUGIN_URL.'/premium-slider/images/pagination_current.png'; if($slider[ 'paginationon' ]!='') echo $slider[ 'paginationon' ]; ?>) 0 0 no-repeat;<?php } ?>}
  <?php } ?>
  <?php if($slider[ 'paginationstyle' ] == 'images') { ?>
  #lofslidecontent<?php echo $slider[ 'id' ]; ?> .lof-navigator { }
  #lofslidecontent<?php echo $slider[ 'id' ]; ?> .lof-navigator li img { height: 40px;}
  <?php } ?></style><?php
    }
}

$my_translator_domain   = premium_slider_trans;
$my_translator_is_setup = 0;
function fabfunc_setup(){
  global $my_translator_domain, $my_translator_is_setup;
  if($my_translator_is_setup) {
    return;
  }
  load_plugin_textdomain($my_translator_domain,
       PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)),
       dirname(plugin_basename(__FILE__)));
}

function premium_slider_short($args) {
    extract(shortcode_atts(array('id'=>'', 'center'=>''), $args));
    ob_start();
    if($center == 'true') {
    premium_slider_center($id);
    }
    else {
    premium_slider($id);
    }
    $output_string=ob_get_contents();;
    ob_end_clean();

return $output_string;
}

function premium_slider_center($id) {
   global $wpdb;
      $table_name = $wpdb->prefix . "premiumslider";
      $sql_names = "SELECT width FROM $table_name WHERE id='$id'";
      $width = $wpdb->get_row($sql_names); ?>
<div style="width: <?php echo $width[ 'width' ]; ?>px; margin: 0 auto;">
  <?php premium_slider($id); ?>
</div><?php
}

add_shortcode('premiumslider', 'premium_slider_short');