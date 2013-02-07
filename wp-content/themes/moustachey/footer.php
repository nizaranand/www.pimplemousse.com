<?php $general_options = get_option( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $social_options = get_option ( 'meanthemes_theme_social_options_moustachey' ); ?>
<?php $styling_options = get_option( 'meanthemes_theme_styling_options_moustachey'); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>

		
	

</div>
<footer>
	<div class="wrapper">
	
	
	<div class="widgets<?php if( isset($general_options[ 'show_widget_footer' ]) ) { echo(" widgets-on"); }?>">
	
				<?php if( $general_options[ 'show_twitter' ]  ) {
					// Get twitter handle
					$twitterurl = sanitize_text_field( $social_options['twitter'] );
					$twitterhandle = preg_replace("/^.*\//","",$twitterurl);
				?>
					<div class="footer-widget">	
						<div id="tweets">
							
						</div>
					</div>
					<?php if(sanitize_text_field( $general_options['tweet_count'] ))
							{
							$tweetCount = sanitize_text_field( $general_options['tweet_count'] );
							}
							else 
							{
							$tweetCount = 1;
							}
						?>
						<script>
							twitterusername = "<?php echo $twitterhandle; ?>";
							twitterloadingtext = "<?php _e('Loading tweets...', 'meanthemes') ?>";	
							jQuery(window).load(function () {
							    // load twitter
							    jQuery(function ($) {
							        jQuery("#tweets").tweet({
							            template: "{join}{text}",
							            count: <?php echo $tweetCount; ?>,
							            fetch: 20,
							            loading_text: twitterloadingtext,
							            username: twitterusername
							        });
							    });
							});	
						</script>
						
					<?php } ?>	
				
					
						<?php if( isset($general_options[ 'show_widget_footer' ]) ) { ?>
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget Area')) : ?>
						<?php endif; ?>
						<?php } ?>
		
			</div>	
	
	
	<p class="right"><?php echo sanitize_text_field( $content_options['contact_us_phone'] ); ?></p>
	 	<p class="right"><a href="mailto:<?php echo sanitize_text_field( $content_options['contact_us_email'] ); ?>" title="<?php _e("Contact us by email" , "meanthemes"); ?>"><?php echo sanitize_text_field( $content_options['contact_us_email'] ); ?></a></p>
	<small class="right"><?php _e('&copy;', 'meanthemes') ?> <?php echo date("Y"); ?> <?php bloginfo('name'); ?>.</small>
	<?php if (isset( $general_options[ 'show_social_footer' ] ) ) {
		
		/* Setup links... */
		$twitter = esc_url( $social_options['twitter'] );
		$facebook = esc_url( $social_options['facebook'] );
		$linkedIn = esc_url( $social_options['linkedin'] );
		$googlePlus = esc_url( $social_options['googleplus'] );
		$vimeo = esc_url( $social_options['vimeo'] );
		$youTube = esc_url( $social_options['youtube'] );
		$pinterest = esc_url( $social_options['pinterest'] );
		$zerply = esc_url( $social_options['zerply'] );
		$dribbble = esc_url( $social_options['dribbble'] );
		$github = esc_url( $social_options['github'] );
		$instagram = esc_url( $social_options['instagram'] );
		$flickr = esc_url( $social_options['flickr'] );
		$rss = esc_url( $social_options['rss'] );
		if($twitter) {
			$twitter = '<a class="social twitter" href="'. esc_url( $social_options['twitter'] ) .'" title="'. __('Twitter', 'meanthemes') .'"><span>'. __('Twitter', 'meanthemes') .'</span></a>';
		}
		if($facebook) {
			$facebook = '<a class="social facebook" href="'. esc_url( $social_options['facebook'] ) .'" title="'. __('Facebook', 'meanthemes') .'"><span>'. __('Facebook', 'meanthemes') .'</span></a>';
		}
		if($googlePlus) {
			$googlePlus = '<a class="social googleplus" href="'. esc_url( $social_options['googleplus'] ) .'" title="'. __('Google +', 'meanthemes') .'"><span>'. __('Google +', 'meanthemes') .'</span></a>';
		}
		if($linkedIn) {
			$linkedIn = '<a class="social linkedin" href="'. esc_url( $social_options['linkedin'] ) .'" title="'. __('Linked In', 'meanthemes') .'"><span>'. __('Linked In', 'meanthemes') .'</span></a>';
		}
		if($vimeo) {
			$vimeo = '<a class="social vimeo" href="'. esc_url( $social_options['vimeo'] ) .'" title="'. __('Vimeo', 'meanthemes') .'"><span>'. __('Vimeo', 'meanthemes') .'</span></a>';
		}
		if($youTube) {
			$youTube = '<a class="social youtube" href="'. esc_url( $social_options['youtube'] ) .'" title="'. __('YouTube', 'meanthemes') .'"><span>'. __('YouTube', 'meanthemes') .'</span></a>';
		}
		if($pinterest) {
			$pinterest = '<a class="social pinterest" href="'. esc_url( $social_options['pinterest'] ) .'" title="'. __('Pinterest', 'meanthemes') .'"><span>'. __('Pinterest', 'meanthemes') .'</span></a>';
		}
		if($zerply) {
			$zerply = '<a class="social zerply" href="'. esc_url( $social_options['zerply'] ) .'" title="'. __('Zerply', 'meanthemes') .'"><span>'. __('Zerply', 'meanthemes') .'</span></a>';
		}
		if($dribbble) {
			$dribbble = '<a class="social dribbble" href="'. esc_url( $social_options['dribbble'] ) .'" title="'. __('Dribbble', 'meanthemes') .'"><span>'. __('Dribbble', 'meanthemes') .'</span></a>';
		}
		if($github) {
			$github = '<a class="social github" href="'. esc_url( $social_options['github'] ) .'" title="'. __('Github', 'meanthemes') .'"><span>'. __('Github', 'meanthemes') .'</span></a>';
		}
		if($instagram) {
			$instagram = '<a class="social instagram" href="'. esc_url( $social_options['instagram'] ) .'" title="'. __('Instagram', 'meanthemes') .'"><span>'. __('Instagram', 'meanthemes') .'</span></a>';
		}
		if($flickr) {
			$flickr = '<a class="social flickr" href="'. esc_url( $social_options['flickr'] ) .'" title="'. __('Flickr', 'meanthemes') .'"><span>'. __('Flickr', 'meanthemes') .'</span></a>';
		}
		if($rss) {
			$rss = '<a class="social rss" href="'. esc_url( $social_options['rss'] ) .'" title="'. __('RSS Feed', 'meanthemes') .'"><span>'. __('RSS Feed', 'meanthemes') .'</span></a>';
		}
	
	?>
		<div class="the-contact<?php if (isset( $general_options['social_white'] ) ) { echo(" social-white"); } ?>">
			<div class="social-links">
				<?php echo $twitter; ?>
				<?php echo $facebook; ?>
				<?php echo $googlePlus; ?>
				<?php echo $linkedIn; ?>
				<?php echo $zerply; ?>
				<?php echo $vimeo; ?>
				<?php echo $youTube; ?>
				<?php echo $pinterest; ?>
				<?php echo $dribbble; ?>
				<?php echo $github; ?>
				<?php echo $instagram; ?>
				<?php echo $flickr; ?>
				<?php echo $rss; ?>
			</div>
		</div>		
	<?php } ?>
	<?php if( $general_options[ 'show_footer_credit' ] ) { ?>
		<div class="full"><p class="credit"><a href="http://meanthemes.com/" title="MeanThemes - Another WordPress Theme website">A MeanThemes Theme.</a></p></div>
	<?php } ?>
	
	</div>
</footer>

</div>
</div>


<?php if( $general_options[ 'show_top_reveal' ] ) { ?>
<div class="donate-block">

<?php 
	$donateMessage = sanitize_text_field( $content_options['donate_message'] );
	$donateDetails = sanitize_text_field( $content_options['donate_details'] );
	$donateLinkText = sanitize_text_field( $content_options['donate_link_text'] );
	$donateLink = esc_url( $content_options['donate_link'] );
	$donatePulldown = sanitize_text_field( $content_options['donate_pulldown'] );
?>
	<div class="donate-message">
	<?php if($donateMessage) { ?>
		<span class="raised"><?php echo $donateMessage; ?></span>
	<?php } ?>
	<?php if($donateDetails) { ?>
		<span class="details"><?php echo $donateDetails; ?></span>
	<?php } ?>
	<?php if($donateLink) { ?>
		<span class="donate-more"><a class="btn" href="<?php echo $donateLink; ?>"><?php echo $donateLinkText; ?></a></span>
	<?php } ?>	
	</div>
	<div class="donate"></div>
	<div class="donate-widget"><a href="#" class="donate-trigger"><?php echo $donatePulldown; ?></a></div>
</div>	
<?php } ?>


<?php if( $general_options[ 'truncate_comment_links' ] ) { ?>
<script>
jQuery(document).ready(function () {
 //
 // Truncate links
 //
 if( jQuery('body').hasClass("mobile") ) {
 	jQuery('.comment-text a').truncate({
 					width: '150',
 					after: '&hellip;',
 					center: false,
 					addtitle: true,
 				});
 } else {
 	jQuery('.comment-text a').truncate({
 					width: '500',
 					after: '&hellip;',
 					center: false,
 					addtitle: true,
 				});
 }
});
</script>
<?php } ?>

<?php if ( is_singular() ) wp_print_scripts( 'comment-reply' ); ?>
<?php wp_footer(); ?>
</body>
</html>

