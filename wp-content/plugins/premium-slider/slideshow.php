<?php
// Edit text overlay excerpt.

function premium_slider($id) {
  extract(shortcode_atts(array('id'=>$id), $id));

  $sliders = get_option( 'premium_slider_slideshows' );
  $slider = premium_slider_search( $sliders, 'id', $id, 'array' );
  
  
  if($slider[ 'paginationstyle' ] == 'iTunes') {
    if($slider[ 'orientation' ] == 'vertical') {
      $ituneheight = $slider[ 'height' ]/$slider[ 'paginationnum' ];
      $itunewidth = $slider[ 'width' ]/4;
    }
    if($slider[ 'orientation' ] == 'horizontal') {
      $ituneheight = $slider[ 'height' ]/4;
      $itunewidth = $slider[ 'width' ]/$slider[ 'paginationnum' ];
    }
  }
  
  $slider[ 'padtop' ] = $slider[ 'bwidth' ]*2;

	if ($slider[ 'activation' ] == 'enable') {

	$padding = '';

	if ($slider[ 'shadow' ] == '') {
	$padding = $slider[ 'padbottom' ];
	$imgpadding = '0'; }
	else {
	$imgpadding = $slider[ 'padbottom' ]; } ?>
  <!-- Easing Slider -->
   
  <script type="text/javascript">
jQuery(document).ready(function(){	
<?php if($slider[ 'buttons' ] != '') { ?>
  jQuery('.lof-next').hide();
  jQuery('.lof-previous').hide();
  jQuery('#lofslidecontent<?php echo $id; ?>').hover(function() {
    jQuery('.lof-next').show();
    jQuery('.lof-previous').show();
  },
    function() {
      jQuery('.lof-next').hide();
      jQuery('.lof-previous').hide();
    }
  ); <?php }; ?>
	var buttons = { previous:jQuery('#lofslidecontent<?php echo $id; ?> .lof-previous') , next:jQuery('#lofslidecontent<?php echo $id; ?> .lof-next') };
	$obj = jQuery('#lofslidecontent<?php echo $id; ?>')
	.lofJSidernews( { interval : <?php echo $slider[ 'sinterval' ]; ?>,
	<?php if($slider[ 'transition' ]=='slide') echo "easing : 'easeInOutExpo'";
		if($slider[ 'transition' ]=='smooth') echo "easing : 'easeInOutQuad'";
    if($slider[ 'transition' ]=='fade') echo "direction : 'opacity'";
		if($slider[ 'transition' ]=='swipe') echo "easing : 'easeOutBack'";
		if($slider[ 'transition' ]=='bounce') echo "easing : 'easeOutBounce'"; ?>,
	duration : <?php echo $slider[ 'transpeed' ]; ?>,
	auto : true,
	maxItemDisplay : <?php if($slider[ 'paginationstyle' ]=='icons') echo '10'; if($slider[ 'paginationstyle' ]=='images'||$slider[ 'paginationstyle' ]=='iTunes') echo $slider[ 'paginationnum' ]; ?>,
	startItem:<?php if($slider[ 'start' ]=='1') echo '0';
	if($slider[ 'start' ]=='2') echo '1'; 
	if($slider[ 'start' ]=='3') echo '2'; 
	if($slider[ 'start' ]=='4') echo '3'; 
	if($slider[ 'start' ]=='5') echo '4'; 
	if($slider[ 'start' ]=='6') echo '5'; 
	if($slider[ 'start' ]=='7') echo '6'; 
	if($slider[ 'start' ]=='8') echo '7'; 
	if($slider[ 'start' ]=='9') echo '8'; 
	if($slider[ 'start' ]=='10') echo '9'; ?>,
	navPosition     : 'horizontal',
	navigatorHeight : <?php if($slider[ 'paginationstyle' ] == 'icons') echo '20'; if($slider[ 'paginationstyle' ] == 'images') echo '40'; ?>,
	navigatorWidth  : <?php if($slider[ 'paginationstyle' ] == 'icons') echo '20'; if($slider[ 'paginationstyle' ] == 'images') echo '110'; ?>,
	buttons : buttons,
			wapperSelector: 	'.lof-main-wapper',
			navItemsSelector    : '.lof-navigator li',
			navOuterSelector    : '.lof-navigator-outer' ,
	mainWidth:<?php echo $slider[ 'width' ]; ?>} );	
});</script>
    <div class="lof-container" id="lofslidecontent<?php echo $id; ?>" style="height:<?php echo $slider[ 'height' ]; ?>px;padding-right:<?php echo $slider[ 'padright' ]; ?>px;padding-top:<?php echo $slider[ 'paddingtop' ]; ?>px;padding-left:<?php echo $slider[ 'padleft' ];?>px;padding-bottom:<?php echo $imgpadding;?>px;">
      <div class="lof-slidecontent" style="border:<?php echo $slider[ 'bwidth' ];?>px solid #<?php echo $slider[ 'bcolour' ]; ?>;width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
   <div class="preload" style="<?php if($slider[ 'transition' ]=='fade') echo 'padding-top:1px\9;'; ?><?php if ($slider[ 'preload' ]!='none') { ?>background:url(<?php echo WP_PLUGIN_URL; ?>/premium-slider/images/<?php if($slider[ 'preload' ]=='indicator') echo 'indicator'; if($slider[ 'preload' ]=='arrows') echo 'arrows';  if($slider[ 'preload' ]=='bar') echo 'bar'; if($slider[ 'preload' ]=='bigflower') echo 'bigflower'; if($slider[ 'preload' ]=='bounceball') echo 'bounceball'; if($slider[ 'preload' ]=='halfsnake') echo 'halfsnake'; if($slider[ 'preload' ]=='balls') echo 'balls'; if($slider[ 'preload' ]=='original') echo 'original'; if($slider[ 'preload' ]=='digital') echo 'digital'; if($slider[ 'preload' ]=='3d') echo '3d'; if($slider[ 'preload' ]=='snake') echo 'snake'; ?>.gif) no-repeat center center #<?php if($slider[ 'bgcolour' ]=='') echo 'fff'; else echo $slider[ 'bgcolour' ]; ?>;<?php } else { ?>background-color: #<?php if($slider[ 'bgcolour' ]=='') echo 'fff'; else echo $slider[ 'bgcolour' ]; } ?>">

        </div>
            <div class="lof-main-outer" style="background: #<?php echo $slider[ 'bgcolour' ]; ?>;width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
                <ul class="lof-main-wapper">
              <?php
  	
  	if ($slider[ 'source' ] == 'featured') { ?>
      <?php $recent = new WP_Query('cat='.$slider[ 'featcat' ].'&showposts='.$slider[ 'featpost' ].'');
        while($recent->have_posts()) : $recent->the_post(); global $post;
          //$image = get_post_meta($post->ID, '_premiumslider', true); 
		  //$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); $image = $image[0]; 
		  if (has_post_thumbnail()) { ?>
                  <li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;" ><?php if($slider[ 'permalink' ] == '') { ?><a href="<?php the_permalink(); ?>"><?php } ?><?php the_post_thumbnail('premium-slider-thumb'); ?><?php if($slider[ 'permalink' ] == '') { ?></a><?php } ?>
                  <?php if($slider[ 'textoverlay' ]=='') { ?>
                    <div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
                      <h3><?php the_title(); ?></h3>
                      <p><?php global $more;    // Declare global $more (before the loop).
		$more = 0;       // Set (inside the loop) to display content above the more tag.
		the_content(''); ?></p>
                    </div>
                  <?php } ?>
                  </li>
        <?php }endwhile; wp_reset_query(); ?>
        
    <?php } else if($slider[ 'source' ] == 'all') { ?>
      <?php $recent = new WP_Query('showposts='.$slider[ 'featpost' ].'');
        while($recent->have_posts()) : $recent->the_post(); global $post;
          $image = get_post_meta($post->ID, '_premiumslider', true); if (!empty($image)) { ?>
                   <li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;"><?php if($slider[ 'permalink' ] == '') { ?><a href="<?php the_permalink(); ?>"><?php } ?><img src="<?php echo $image; ?>" alt="<?php echo $images; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" /><?php if ($slider[ 'permalink' ] == '') { ?></a><?php } ?>
                   <?php if($slider[ 'textoverlay' ]=='') { ?>
                    <div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
                      <h3><?php the_title(); ?></h3>
                      <p><?php the_excerpt(); ?></p>
                    </div>
                   <?php } ?>
                   </li>
        <?php }endwhile; wp_reset_query(); ?>
        
  <?php } else if($slider[ 'source' ] == 'custom') {
  
	if ($slider[ 'img1' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img1url' ]!='') { ?><a href="<?php echo $slider[ 'img1url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img1' ]; ?>" alt="<?php echo $slider[ 'img1' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img1url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img1title' ]=='' && $slider[ 'img1text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img1title' ]!='') { ?><h3><?php echo $slider[ 'img1title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img1text' ]!='') { ?><p><?php echo $slider[ 'img1text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }

	if ($slider[ 'img2' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img2url' ]!='') { ?><a href="<?php echo $slider[ 'img2url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img2' ]; ?>" alt="<?php echo $slider[ 'img2' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img2url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img2title' ]=='' && $slider[ 'img2text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img2title' ]!='') { ?><h3><?php echo $slider[ 'img2title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img2text' ]!='') { ?><p><?php echo $slider[ 'img2text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
	if ($slider[ 'img3' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img3url' ]!='') { ?><a href="<?php echo $slider[ 'img3url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img3' ]; ?>" alt="<?php echo $slider[ 'img3' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img3url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img3title' ]=='' && $slider[ 'img3text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img3title' ]!='') { ?><h3><?php echo $slider[ 'img3title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img3text' ]!='') { ?><p><?php echo $slider[ 'img3text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
	if ($slider[ 'img4' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img4url' ]!='') { ?><a href="<?php echo $slider[ 'img4url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img4' ]; ?>" alt="<?php echo $slider[ 'img4' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img4url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img4title' ]=='' && $slider[ 'img4text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img4title' ]!='') { ?><h3><?php echo $slider[ 'img4title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img4text' ]!='') { ?><p><?php echo $slider[ 'img4text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
	if ($slider[ 'img5' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img5url' ]!='') { ?><a href="<?php echo $slider[ 'img5url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img5' ]; ?>" alt="<?php echo $slider[ 'img5' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img5url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img5title' ]=='' && $slider[ 'img5text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img5title' ]!='') { ?><h3><?php echo $slider[ 'img5title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img5text' ]!='') { ?><p><?php echo $slider[ 'img5text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
	if ($slider[ 'img6' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img6url' ]!='') { ?><a href="<?php echo $slider[ 'img6url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img6' ]; ?>" alt="<?php echo $slider[ 'img6' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img6url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img6title' ]=='' && $slider[ 'img6text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img6title' ]!='') { ?><h3><?php echo $slider[ 'img6title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img6text' ]!='') { ?><p><?php echo $slider[ 'img6text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
	if ($slider[ 'img7' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img7url' ]!='') { ?><a href="<?php echo $slider[ 'img7url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img7' ]; ?>" alt="<?php echo $slider[ 'img7' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img7url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img7title' ]=='' && $slider[ 'img7text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img7title' ]!='') { ?><h3><?php echo $slider[ 'img7title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img7text' ]!='') { ?><p><?php echo $slider[ 'img7text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
	if ($slider[ 'img8' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img8url' ]!='') { ?><a href="<?php echo $slider[ 'img8url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img8' ]; ?>" alt="<?php echo $slider[ 'img8' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img8url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img8title' ]=='' && $slider[ 'img8text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img8title' ]!='') { ?><h3><?php echo $slider[ 'img8title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img8text' ]!='') { ?><p><?php echo $slider[ 'img8text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
	if ($slider[ 'img9' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img9url' ]!='') { ?><a href="<?php echo $slider[ 'img9url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img9' ]; ?>" alt="<?php echo $slider[ 'img9' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img9url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img9title' ]=='' && $slider[ 'img9text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img9title' ]!='') { ?><h3><?php echo $slider[ 'img9title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img9text' ]!='') { ?><p><?php echo $slider[ 'img9text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
	if ($slider[ 'img10' ]) { ?>
		<li style="width:<?php echo $slider[ 'width' ]; ?>px;height:<?php echo $slider[ 'height' ]; ?>px;">
      <?php if($slider[ 'img10url' ]!='') { ?><a href="<?php echo $slider[ 'img10url' ]; ?>"><?php } ?>
        <img src="<?php echo $slider[ 'img10' ]; ?>" alt="<?php echo $slider[ 'img10' ]; ?>" style="width: <?php echo $slider[ 'width' ]; ?>px;" />
      <?php if($slider[ 'img10url' ]!='') { ?></a><?php } ?>
          <?php if($slider[ 'textoverlay' ]=='') { ?>
            <?php if($slider[ 'img10title' ]=='' && $slider[ 'img10text' ]=='') { }
              else { ?><div class="lof-main-item-desc" style="display: none;bottom: 0; left: 0; font-family: Arial; width: <?php echo $slider[ 'width' ]; ?>px;">
              <?php if($slider[ 'img10title' ]!='') { ?><h3><?php echo $slider[ 'img10title' ]; ?></h3><?php } ?>
              <?php if($slider[ 'img10text' ]!='') { ?><p><?php echo $slider[ 'img10text' ]; ?></p><?php } ?>
            </div><?php } ?>
          <?php } ?> 
    </li><?php }
		
		}
		
	?></ul><?php


	if ($slider[ 'buttons' ]=='');
	else { ?>
              <div onclick="return false" class="lof-previous" style="
	background:url(<?php if($slider[ 'prev' ]=='') echo WP_PLUGIN_URL.'/premium-slider/images/b_prev.png'; if($slider[ 'prev' ]!='') echo $slider[ 'prev' ]; ?>) no-repeat left center;
	
  <?php if($slider[ 'paginationstyle' ] == 'iTunes'&&$slider[ 'pageposition' ] == 'inside'&&$slider[ 'orientation' ] == 'vertical') {
  if($slider[ 'pageside' ] == 'left') {
    $navpos = 10+$itunewidth;
    ?>left: <?php echo $navpos; ?>px; <?php
    }
  }
  if($slider[ 'paginationstyle' ] == 'images'&&$slider[ 'pageposition' ] == 'inside'&&$slider[ 'orientation' ] == 'vertical') {
    if($slider[ 'pageside' ] == 'left') {
      echo 'left: 110px;'; }
  }
  if($slider[ 'paginationstyle' ] != 'images'||'iTunes'&&$slider[ 'pageposition' ] != 'inside'&&$slider[ 'orientation' ] != 'vertical') {
    echo 'left: 10px;';
  } ?> "></div>
              <div onclick="return false" class="lof-next" style="
	background:url(<?php if($slider[ 'next' ]=='') echo WP_PLUGIN_URL.'/premium-slider/images/b_next.png'; if($slider[ 'next' ]!='') echo $slider[ 'next' ]; ?>) no-repeat right center;
	
  <?php if($slider[ 'paginationstyle' ] == 'iTunes'&&$slider[ 'pageposition' ] == 'inside'&&$slider[ 'orientation' ] == 'vertical') {
  if($slider[ 'pageside' ] == 'right') {
    $navpos = 10+$itunewidth;
    ?>right: <?php echo $navpos; ?>px; <?php
    }
  }
  if($slider[ 'paginationstyle' ] == 'images'&&$slider[ 'pageposition' ] == 'inside'&&$slider[ 'orientation' ] == 'vertical') {
    if($slider[ 'pageside' ] == 'right') {
      echo 'right: 110px;'; }
  }
  if($slider[ 'paginationstyle' ] != 'images'&&$slider[ 'pageposition' ] != 'inside'&&$slider[ 'orientation' ] != 'vertical'||$slider[ 'paginationstyle' ] != 'iTunes'&&$slider[ 'pageposition' ] != 'inside'&&$slider[ 'orientation' ] != 'vertical') {
    echo 'right: 10px;';
  } ?> "></div> <?php }

	?></div><?php


	$sPagination = $slider[ 'sPagination' ];

	if ($sPagination=='yes') { ?>
                <div class="lof-navigator-wapper" style="
  <?php 
  if($slider[ 'paginationstyle' ] == 'icons') {
    if($slider[ 'pageside' ] == 'left') {
              if($slider[ 'pageposition' ] == 'inside') {
                echo 'bottom: 0; left: 5px;';
              }
              if($slider[ 'pageposition' ] == 'outside' || $slider[ 'textoverlay' ] == '') {
                echo 'bottom: -30px; left: 0;';
              }
           }
           if($slider[ 'pageside' ] == 'right') {
              if($slider[ 'pageposition' ] == 'inside') {
                echo 'bottom: 0; right: 0;';
              }
              if($slider[ 'pageposition' ] == 'outside' || $slider[ 'textoverlay' ] == '') {
                echo 'bottom: -30px; right: 0;';
              }
     } 
   }
  if($slider[ 'paginationstyle' ] == 'images') {
    if($slider[ 'pageside' ] == 'left') {
              if($slider[ 'pageposition' ] == 'inside') {
                echo 'bottom: 10px; left: 10px;';
              }
              if($slider[ 'pageposition' ] == 'outside' || $slider[ 'textoverlay' ] == '') {
                echo 'bottom: -50px; left: 0;';
              }
           }
           if($slider[ 'pageside' ] == 'right') {
              if($slider[ 'pageposition' ] == 'inside') {
                echo 'bottom: 10px; right: 0;';
              }
              if($slider[ 'pageposition' ] == 'outside' || $slider[ 'textoverlay' ] == '') {
                echo 'bottom: -50px; right: -10px;';
              }
     } 
   }?>">
                  <div class="lof-navigator-outer">
                    <ul class="lof-navigator">
                      <?php
  	
  	if($slider[ 'source' ] == 'featured') { ?>
      <?php $recent = new WP_Query('cat='.$slider[ 'featcat' ].'&showposts='.$slider[ 'featpost' ].'');
        while($recent->have_posts()) : $recent->the_post(); global $post;
          $image = get_post_meta($post->ID, '_premiumslider', true); if (!empty($image)) {
            if($slider[ 'paginationstyle' ]=='icons') { ?>
            <li><span>.</span></li>
            <?php }
            if($slider[ 'paginationstyle' ]=='images') {
            ?><li style="width: 110px; height: 40px;"><img src="<?php echo $image; ?>" style="width: 100px;" alt="<?php echo $image; ?>" /></li><?php
            }
            if($slider[ 'paginationstyle' ]=='iTunes') {
            ?><li style="width:<?php echo $itunewidth; ?>px; height:<?php echo$ituneheight; ?>px;"><img src="<?php echo WP_PLUGIN_URL; ?>/premium-slider/scripts/timthumb.php?src=<?php echo $image; ?>&h=<?php echo $ituneheight; ?>&zc=1" alt="<?php echo $image; ?>" /></li><?php
            }
        } endwhile; wp_reset_query(); ?>
        
      <?php } else if($slider[ 'source' ] == 'all') { ?>
      <?php $recent = new WP_Query('showposts='.$slider[ 'featpost' ].'');
        while($recent->have_posts()) : $recent->the_post(); global $post;
          $image = get_post_meta($post->ID, '_premiumslider', true); if (!empty($image)) {
            if($slider[ 'paginationstyle' ]=='icons') { ?>
            <li><span>.</span></li>
            <?php }
            if($slider[ 'paginationstyle' ]=='images') {
            ?><li style="width: 110px; height: 40px;"><img src="<?php echo $image; ?>" style="width: 100px;" alt="<?php echo $image; ?>" /></li><?php
            }
            if($slider[ 'paginationstyle' ]=='iTunes') {
            ?><li style="width:<?php echo $itunewidth; ?>px; height:<?php echo$ituneheight; ?>px;"><img src="<?php echo WP_PLUGIN_URL; ?>/premium-slider/scripts/timthumb.php?src=<?php echo $image; ?>&h=<?php echo $ituneheight; ?>&zc=1" alt="<?php echo $image; ?>" /></li><?php
            }
        } endwhile; wp_reset_query(); ?>
        
<?php } else if($slider[ 'source' ] == 'custom') {
  if ($slider[ 'paginationstyle' ] == 'icons') { 
    if ($slider[ 'img1' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img2' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img3' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img4' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img5' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img6' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img7' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img8' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img9' ]) {
      echo '<li><span>.</span></li>'; }
    if ($slider[ 'img10' ]) {
      echo '<li><span>.</span></li>'; }
  }
  if ($slider[ 'paginationstyle' ] == 'images') {
    if ($slider[ 'img1' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img1' ].'" alt="'.$slider[ 'img1' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img2' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img2' ].'" alt="'.$slider[ 'img2' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img3' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img3' ].'" alt="'.$slider[ 'img3' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img4' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img4' ].'" alt="'.$slider[ 'img4' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img5' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img5' ].'" alt="'.$slider[ 'img5' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img6' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img6' ].'" alt="'.$slider[ 'img6' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img7' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img7' ].'" alt="'.$slider[ 'img7' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img8' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img8' ].'" alt="'.$slider[ 'img8' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img9' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img9' ].'" alt="'.$slider[ 'img9' ].'" style="width: 100px;" /></li>'; }
    if ($slider[ 'img10' ]) {
      echo '<li style="width: 110px; height: 40px;"><img src="'.$slider[ 'img10' ].'" alt="'.$slider[ 'img10' ].'" style="width: 100px;" /></li>'; }
   }
}

	?>             </ul>
                </div>
              </div>
              
<?php  }
	
	elseif ($sPagination=='no') {
    echo ''; } ?>
            </div>
          </div><?php

	if ($slider[ 'shadow' ]=='')
	echo '<img src="'.WP_PLUGIN_URL.'/premium-slider/images/shadow_'.$slider[ 'shadowstyle' ].'.png" style="width:'.$slider[ 'width' ].'px; padding-left:'.$slider[ 'padleft' ].'px;padding-bottom:'.$padding.'px;padding-top:'.$padtop.'px;margin-left:'.$slider[ 'bwidth' ].'px;" alt="" />'; ?><!-- End of Easing Slider --><?php

  } 
  
}