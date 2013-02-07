<?php
/**
 Template Name: Page - Contact
 *
 * @package WordPress
 * @subpackage Moustachey
 * @since Moustachey 1.0
 */

get_header(); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php $general_options = get_option( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $styling_options = get_option( 'meanthemes_theme_styling_options_moustachey' ); ?>
 <?php
 
$nameError = "";
$emailError = "";
$commentError = "";
 
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactname']) === '') {
		$nameError = __('Please enter your name.','meanthemes');
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}
	if(trim($_POST['email']) === '')  {
		$emailError = __('Please enter your email address.','meanthemes');
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
			$emailError = __('You entered an invalid email address.','meanthemes');
			$hasError = true;
		} else {
		$email = trim($_POST['email']);
	}
	if(trim($_POST['contactphone']) === '') {
		// do nothing as we need no validation
	} else {
		$phone = trim($_POST['contactphone']);
	}
	if(trim($_POST['comments']) === '') {
		$commentError = __('Please enter a message.','meanthemes');
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}
	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailAddress = sanitize_email( $general_options['emailaddress'] );
			if($emailAddress) {
				$emailTo = $emailAddress; // sender email address
			} else {
				$emailTo = get_option('admin_email'); // sender email address
			}
		}
		$sitename = get_option('blogname');
		$subject = $sitename. __(': Contact Form ', 'meanthemes').$name;
		$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<section class="wrapper full-page">
		    <article role="main" class="content" id="post-<?php the_ID(); ?>">
		       
		        <?php
		        $apiExist = sanitize_text_field( $general_options['googleapikey'] );
		        if($apiExist) { ?>
		       
		           
		           <script src="//maps.googleapis.com/maps/api/js?key=<?php echo sanitize_text_field( $general_options['googleapikey'] ); ?>&amp;sensor=false"></script>
		           	
		           	<script>
		           	  	// Google Maps API
		           	  	function initialize() {
		           	  		var latlng = new google.maps.LatLng(<?php echo sanitize_text_field( $general_options['googleapill'] ); ?>);
		           	  		var settings = {
		           	  			zoom: 13,
		           	  			center: latlng,
		           	  			scrollwheel: false,
		           	  			navigationControl: false,
		           	  			scaleControl: false,
		           	  			streetViewControl: false,
		           	  			draggable: true, 
		           	  			mapTypeControl: true,
		           	  			mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		           	  			navigationControl: true,
		           	  			navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
		           	  			mapTypeId: google.maps.MapTypeId.ROADMAP
		           	  	};
		           	  	
		           	  	var map = new google.maps.Map(document.getElementById("map"), settings);
		           	  	var point = new google.maps.LatLng(<?php echo sanitize_text_field( $general_options['googleapill'] ); ?>);
		           	  	  
		           	  	var image = new google.maps.MarkerImage(
		           	  	  '<?php echo sanitize_text_field( $general_options['pinupload'] ); ?>',
		           	  	  new google.maps.Size(42,62),
		           	  	  new google.maps.Point(0,0),
		           	  	  new google.maps.Point(21,62)
		           	  	);
		           	  	
		           	  	var shadow = new google.maps.MarkerImage(
		           	  	 
		           	  	);
		           	  	var shape = {
		           	  	  coord: [27,0,29,1,31,2,33,3,34,4,35,5,36,6,37,7,38,8,38,9,39,10,39,11,40,12,40,13,40,14,41,15,41,16,41,17,41,18,41,19,41,20,41,21,41,22,41,23,41,24,41,25,41,26,40,27,40,28,40,29,40,30,39,31,39,32,39,33,38,34,38,35,37,36,37,37,37,38,36,39,36,40,35,41,35,42,34,43,34,44,33,45,33,46,32,47,31,48,31,49,30,50,30,51,29,52,28,53,28,54,27,55,26,56,26,57,25,58,24,59,23,60,22,61,20,61,18,60,17,59,17,58,16,57,15,56,14,55,14,54,13,53,12,52,12,51,11,50,11,49,10,48,9,47,9,46,8,45,8,44,7,43,7,42,6,41,6,40,5,39,5,38,4,37,4,36,4,35,3,34,3,33,2,32,2,31,2,30,2,29,1,28,1,27,1,26,1,25,1,24,0,23,0,22,0,21,0,20,0,19,0,18,0,17,1,16,1,15,1,14,1,13,2,12,2,11,3,10,3,9,4,8,5,7,6,6,7,5,8,4,9,3,10,2,12,1,15,0,27,0],
		           	  	  type: 'poly'
		           	  	};
		           	  	var marker = new google.maps.Marker({
		           	  	  draggable: true,
		           	  	  raiseOnDrag: false,
		           	  	  icon: image,
		           	  	  shadow: shadow,
		           	  	  shape: shape,
		           	  	  map: map,
		           	  	  position: point
		           	  	});
		           	  	var road_styles = [
		           	  	  {
		           	  	    featureType: "road.arterial",
		           	  	    stylers: [
		           	  	      { hue: "<?php echo sanitize_text_field( $styling_options['google_map_colour'] );?>" },
		           	  	      { saturation: 100 }
		           	  	    ]
		           	  	  }
		           	  	];
		           	  	
		           	  	map.setOptions({styles: road_styles});
		           	  	}
		           	  	
		           	  	google.maps.event.addDomListener(window, 'load', initialize);
		           	  	
		           	  	
		           	   </script>
		           
		           
		           
		           
		           
		        <div id="map"></div>
		        <?php } else { ?>
		        
		        	<?php the_post_thumbnail('standard-thumb'); ?>
		        
		        <?php } ?>
		        
		        <div class="hgroup single-hold">
		        	    <h1><?php the_title(); ?></h1>
		        </div>
		        <div class="single-hold">
		        	<?php the_content(); ?>
		        </div>
		        
		        <?php if( $general_options[ 'show_contactform' ] ) { ?>
		        <script>
		        	jQuery(document).ready(function() {
		        		jQuery.extend(jQuery.validator.messages, {
		        			required: "<?php _e('This field is required.', 'meanthemes'); ?>",
		        			email: "<?php _e('Please enter a valid email address.', 'meanthemes'); ?>"
		        		});
		        		//validate contact form
		        			jQuery(".contact-form form").validate();
		        	});
		        </script>
		        	<div class="contact-form">
		        		<hgroup>
		        			<h2><?php echo balanceTags( $content_options['contact_us_tab'] ); ?></h2>
		        		</hgroup>
		        		<?php if(isset($emailSent) && $emailSent == true) { ?>
		        									<div class="status ok thanks">
		        										<p><?php _e('Thanks, your email was sent successfully.', 'meanthemes') ?></p>
		        									</div>
		        								<?php } else { ?>
		        									<?php if(isset($hasError) || isset($captchaError)) { ?>
		        										<div class="status oops"><label for="contactname"><?php _e('Sorry an error occurred, please try again.', 'meanthemes') ?></label></div>
		        									<?php } ?>
		        								<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
		        									<p>
		        										<input type="text" name="contactname" id="contactname" value="<?php if(isset($_POST['contactname'])) echo $_POST['contactname'];?>" class="required requiredfield" placeholder="<?php _e('Name *', 'meanthemes') ?>" />
		        										<?php if($nameError != '') { ?>
		        											<span class="error"><?php echo $nameError;?></span>
		        										<?php } ?>
		        									</p>
		        									<p>
		        										<input type="email" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredfield email" placeholder="<?php _e('Email *', 'meanthemes') ?>" />
		        										<?php if($emailError != '') { ?>
		        											<span class="error"><?php echo $emailError;?></span>
		        										<?php } ?>
		        									</p>
		        									<p>
		        										<input type="tel" name="contactphone" id="contactphone" value="<?php if(isset($_POST['contactphone'])) echo $_POST['contactphone'];?>" placeholder="<?php _e('Your Telephone Number', 'meanthemes') ?>" />
		        									</p>
		        									<p>
		        										<textarea name="comments" id="commentstext" rows="10" cols="60" class="required requiredfield" placeholder="<?php _e('Your Enquiry', 'meanthemes') ?>"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
		        										<?php if($commentError != '') { ?>
		        											<span class="error"><?php echo $commentError;?></span>
		        										<?php } ?>
		        									</p>
		        									<p class="form-submit">
		        										<button type="submit"><?php _e('Submit', 'meanthemes') ?></button>
		        									</p>
		        									<input type="hidden" name="submitted" id="submitted" value="true" />
		        									
		        							</form>
		        						<?php } ?>
		        		</div>
		        <?php } ?>
		       
		       
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'meanthemes' ), 'after' => '</div>' ) ); ?>
		        <?php endwhile; ?>
		         </article>
		    


</section>


<?php get_footer(); ?>