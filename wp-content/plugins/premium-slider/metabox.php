<?php
function premium_slider_meta_box() {
  global $post;
  
  $meta_box_value = get_post_meta($post->ID, '_premiumslider', true);
  
  if($meta_box_value == '')
    $meta_box_value = '';
  
  echo '<input type="hidden" name="premiumslider_noncename" id="premiumslider_noncename" value="'.wp_create_nonce( basename(__FILE__) ).'" />';
  
  
    
  if($meta_box_value == '') {
    $noimage = WP_PLUGIN_URL.'/premium-slider/images/noimage.png'; }
  else {
    $noimage = get_post_meta($post->ID, '_premiumslider', true); } ?>
  
  <div id="preview"><img id="previewimage" src="<?php echo $noimage; ?>" alt="<?php echo $imglink; ?>" style="width: 220px; margin-top: 10px;" /></div>
  
  <div style="position: relative; margin: 10px 10px 0 0;"><input type="text" id="Image" style="position: relative; right: 0; width: 85%;" name="premiumslider" value="<?php echo $meta_box_value; ?>" />
  
  <input class="button-secondary" id="Image_button" type="button" style="position: relative; left: 0; margin-top: 10px;" value="Upload Image" /></div>
  
  <p style="margin-top: 10px;"><label for="premiumslider"><?php _e('After you have uploaded an image click "insert into post" then update your post.'); ?></label></p><?php
  }
  
function premium_slider_create_box() {
    global $theme_name;
    
    if ( function_exists('add_meta_box') )  {
      add_meta_box( 'premium-slider-meta-box', 'Premium Slider Image', 'premium_slider_meta_box', 'post', 'side', 'high' );
    }
}

function premium_slider_save_postdata ($post_id) {
  global $post;
  
  if (!wp_verify_nonce($_POST['premiumslider_noncename'], basename(__FILE__) )) {
    return $post_id;
  }
  
  if ( 'page' == $_POST['post_type'] ) {   
      if ( !current_user_can( 'edit_page', $post_id ))   
      return $post_id;   
    }
    else {   
      if ( !current_user_can( 'edit_post', $post_id ))   
      return $post_id;   
    } 
    
   $data = $_POST['premiumslider'];
   
   if(get_post_meta($post_id, '_premiumslider') == '')
    add_post_meta($post_id, '_premiumslider', $data, true);
    
   elseif($data != get_post_meta($post_id, '_premiumslider', true))
    update_post_meta($post_id, '_premiumslider', $data);
    
   elseif($data == '')
    delete_post_meta($post_id, '_premiumslider', get_post_meta($post_id, '_premiumslider', true));
}

add_action('admin_menu', 'premium_slider_create_box');
add_action('save_post', 'premium_slider_save_postdata');