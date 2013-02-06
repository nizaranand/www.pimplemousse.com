<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//function stonking_admin_init(){
require_once TEMPLATEPATH . '/includes/admin_options/general_options.php';
require_once TEMPLATEPATH . '/includes/admin_options/page_options.php';
require_once TEMPLATEPATH . '/includes/admin_options/font_options.php';
require_once TEMPLATEPATH . '/includes/admin_options/color_options.php';
require_once TEMPLATEPATH . '/includes/admin_options/trans_options.php';
require_once TEMPLATEPATH . '/includes/admin_options/import_export.php';

//}
$defaultcufonFonts = Array(
    Array('name' => 'None'),
    Array('name' => 'Greyscale Basic')
);

function postSlideImage() {
	global $pageType;

    if (is_single() && get_the_option('stonking_single_featuredimage') == 'true')
      $show = true;
    else if (is_page() && get_the_option('stonking_page_featuredimage') == 'true')
      $show = true;
    else if (get_the_option('stonking_blog_featuredimage') == 'true')
      $show = true;
    else if (has_post_thumbnail())
      $show = true;

    if ($show) {
		  global $post;
		  $portfolio_embed = get_post_meta($post->ID, 'tt_slide_embed', true);

		  if ($portfolio_embed == '')
	    	$slide_imgs = get_post_meta($post->ID, 'tt_slide_images', true);
	    else
	    	$slide_imgs='';
	    	
	    	if ($portfolio_embed != '') {
	   ?>
	         <div class="article-image">
  	       <?php
    	       print $portfolio_embed;
    	     ?>
    	     </div>
    	     <?php
      	 }
      	 if (($slide_imgs != '' && count($slide_imgs) > 0) || has_post_thumbnail()) {
?>
	    <div class="article-image">
	        <div class="hover-content">
				<div class="article-image-slide zoom">
					<?php
						if (count($slide_imgs) > 0) {
							foreach ($slide_imgs as $immg) {
								if ($immg['image_thumb']) {
									$slide_image = $immg['image'];
								}else
									$slide_image=$immg['image'];
			
								if ($immg['media'] != '') {
									if(get_the_option("stonking_blog_featuredimage_link")=='true' || is_single()) {
										print '<a rel="prettyPhoto[' . $post->ID . ']" href="' . $immg['media'] . '" class="preload imgMedium item-preview iconPlay">';
									} else {
										print '<a href="' . get_permalink() . '" class="imgMedium">';
									}
										
										
								} else {
									if(get_the_option("stonking_blog_featuredimage_link")=='true' || is_single()) {
										print ('<a rel="prettyPhoto[' . $post->ID . ']" href="' . $immg['image'] . '" class="preload imgMedium item-preview iconZoom">');
									} else {
										print '<a href="' . get_permalink() . '" class="preload imgMedium">';
									}
										
								}
					?>
					<?php
								if (isset($pageType) && $pageType == "masonry" && has_post_thumbnail()) {
									the_post_thumbnail('masonry-thumb');
								} else {
					?>
									<img src="<?php echo $slide_image; ?>" alt=""/>
					<?php
								}
							print '</a>';
							}
						} elseif (is_single() && has_post_thumbnail()) {
						  $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
						  print ('<a rel="prettyPhoto[' . $post->ID . ']" href="' . $large_image_url[0] . '" class="preload imgMedium item-preview iconZoom">');
						  the_post_thumbnail('post-top-thumb');
						  print '</a>';
						} else {
							if (isset($pageType) && $pageType == "masonry" && has_post_thumbnail()) {
								print '<a href="' . get_permalink() . '" class="imgMedium">';
								the_post_thumbnail('masonry-thumb');
								print '</a>';
							}
						}
	    ?>
				</div>
			</div>
		</div>
<?php
	}
    }
}

function getPageSlider() {
    global $current_page_slide_imgs, $current_page_id;
    $current_page_slide_imgs = get_post_meta($current_page_id, 'tt_head_slide_images', true);
    if ($current_page_slide_imgs != '' && count($current_page_slide_imgs) > 0) {
	add_action('wp_footer', 'page_slider_scripts');
	$height_style = 'style="height:';
	if (get_post_meta($current_page_id, 's_height', true) != '') {
	    $height_style.=get_post_meta($current_page_id, 's_height', true) . 'px"';
	} else {
	    $height_style.='600px"';
	}
?>
	<div id="header2" <?php print $height_style; ?>>
	    <!-- jQuery handles to place the header background images -->
	    <div id="headerimgs" <?php print $height_style; ?>>
		<div id="headerimg1" class="headerimg" <?php print $height_style; ?>></div>
		<div id="headerimg2" class="headerimg" <?php print $height_style; ?>></div>
	    </div>
	    <!-- Slideshow controls -->
	    <div id="headernav-outer">
		<div id="headernav">
		    <div id="back" class="btn"></div>
		    <div id="control" class="btn"></div>
		    <div id="next" class="btn"></div>
		    <div class="clearfix"></div>
		</div>
	    </div>
	    <!-- jQuery handles for the text displayed on top of the images -->
	    <div id="headertxt">
		<div class="caption">
		    <div id="firstline"></div>
		    <a href="#" id="secondline"></a>
		    <span class="clearfix"></span>
		</div>
	    </div>
	</div>
<?php
    }
}

function page_slider_scripts() {
    global $current_page_slide_imgs, $current_page_id;
?>
    <script type="text/javascript">
        // Variable to store the images we need to set as background
        // which also includes some text and url's.
        var photos = [
<?php
    foreach ($current_page_slide_imgs as $immg) {
	print '{';
	if ($immg['image'] != '')
	    print '"image" : "' . $immg['image'] . '"';
	if ($immg['text'] != '')
	    print ',"firstline" : "' . $immg['text'] . '"';
	if ($immg['link_text'] != '')
	    print ',"secondline" : "' . $immg['link_text'] . '"';
	if ($immg['link'] != '')
	    print ',"url" : "' . $immg['link'] . '"';
	else
		print ',"url" : "#"';
	print '},';
    }
?>
    ];
    </script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts_slider.js"></script>
<?php
}
?>
