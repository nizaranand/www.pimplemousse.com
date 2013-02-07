<?php $general_options = get_option( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $social_options = get_option ( 'meanthemes_theme_social_options_moustachey' ); ?>
<?php $styling_options = get_option( 'meanthemes_theme_styling_options_moustachey'); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php 
if( (isset($general_options[ 'switch_nav' ])) && ($general_options[ 'switch_nav' ])) {
	$switchNav = " left";
} else {
	$switchNav = "";
}
if( (isset($general_options[ 'no_nav' ])) && ($general_options[ 'no_nav' ])) {
	$fullWidth = " full-content";
} else {
	$fullWidth = "";
}
if( (isset($general_options[ 'blocked_body' ])) && ($general_options[ 'blocked_body' ])) {
	$blockedBody = " blocked";
} else {
	$blockedBody = "";
}
$meanThemesGoogleFontHeading = "";
$meanThemesGoogleFontBody = "";
$meanThemesGoogleFontHeading = sanitize_text_field( $styling_options['google_heading_font'] );
$meanThemesGoogleFontBody = sanitize_text_field( $styling_options['google_body_font'] );
 ?>
<!doctype html>
<!--[if lt IE 7 ]> 
<html class="no-js ie6 oldie <?php page_bodyclass(); ?><?php echo $blockedBody; ?><?php echo $switchNav; ?><?php echo $fullWidth; ?>" <?php language_attributes(); ?>> 
<![endif]-->
<!--[if IE 7 ]>    
<html class="no-js ie7 oldie <?php page_bodyclass(); ?><?php echo $blockedBody; ?><?php echo $switchNav; ?><?php echo $fullWidth; ?>" <?php language_attributes(); ?>> 
<![endif]-->
<!--[if IE 8 ]>    
<html class="no-js ie8 oldie <?php page_bodyclass(); ?><?php echo $blockedBody; ?><?php echo $switchNav; ?><?php echo $fullWidth; ?>" <?php language_attributes(); ?>> 
<![endif]-->
<!--[if IE 9 ]>    
<html class="no-js ie9 <?php page_bodyclass(); ?><?php echo $blockedBody; ?><?php echo $switchNav; ?><?php echo $fullWidth; ?>" <?php language_attributes(); ?>> 
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js <?php page_bodyclass(); ?><?php echo $blockedBody; ?><?php echo $switchNav; ?><?php echo $fullWidth; ?>" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<title><?php
global $page, $paged;
wp_title( '|', true, 'right' );
bloginfo( 'name' );
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'meanthemes' ), max( $paged, $page ) );
?>
</title>
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true);
} else {
	bloginfo('name'); echo " - "; bloginfo('description');
}
?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="icon" type="image/png" href="<?php echo $general_options['faviconupload'] ? esc_url( $general_options['faviconupload'] ) : ''; ?>" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo $general_options['appletouchupload'] ? esc_url( $general_options['appletouchupload'] ) : ''; ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=1-2-9" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

<?php if( $general_options[ 'google_analytics' ] ) { ?>	
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo sanitize_text_field( $general_options['google_analytics'] ); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php } ?>
<?php if( $styling_options[ 'typekit_id' ] ) { ?>	
	<script src="//use.typekit.net/<?php echo sanitize_text_field( $styling_options['typekit_id'] ); ?>.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
<?php } ?>		
<?php if( $styling_options[ 'adobe_heading_font' ] ) { ?>	
	<script src="//use.edgefonts.net/<?php echo sanitize_text_field( $styling_options['adobe_heading_font'] ); ?>.js"></script>
<?php } ?>	
<?php if( $styling_options[ 'googlefonts_advanced' ] ) { ?>	
	<script>
		<?php echo ( $styling_options['googlefonts_advanced'] ); ?>
	</script>	
<?php } ?>		
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<?php
	// display retina image
	$retinaLogo = "";
	$retinaLogo = esc_url( $general_options['logo_2x_upload'] );
	
	function get_attachment_id_from_src ($link) {
	    global $wpdb;
	        $link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);
	        return $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");
	}
	
	$attachment_id = get_attachment_id_from_src( $retinaLogo );
	$full_im = wp_get_attachment_image_src( $attachment_id, 'full');
	$imgWidth = round(($full_im[1])/2);
	$imgHeight = round(($full_im[2])/2);
	
?>
<div id="block-wrapper">
	<div id="content-wrapper">
		<header>
			<div class="wrapper">
					<div class="logo">
					<?php if( (isset($general_options[ 'show_strapline' ])) && ($general_options[ 'show_strapline' ])) { ?>
						<span class="strap-enabled">
					<?php } ?>
						<?php if( (isset($general_options[ 'logo_text' ])) && ($general_options[ 'logo_text' ])) { ?>
								<?php if( is_front_page() ) { ?>
										<span class="site-title">
											<a href="<?php echo get_home_url(); ?>/" title="<?php _e('Go to Home', 'meanthemes'); ?>"><span><?php bloginfo('name'); ?></span></a>
											</span>
								<?php } else { ?>
									<span class="site-title">
										<a href="<?php echo get_home_url(); ?>/" title="<?php _e('Go to Home', 'meanthemes'); ?>"><span><?php bloginfo('name'); ?></span></a>
									</span>	
								<?php } ?>
							<?php } else { ?>
								<?php if( is_front_page() ) { ?>
									<span class="site-title">
										<a href="<?php echo get_home_url(); ?>/" title="<?php _e('Go to Home', 'meanthemes'); ?>">									
									<?php if($retinaLogo) {  ?>
										<?php echo $general_options['logoupload'] ? '<img src="' . esc_url( $general_options['logoupload'] ) . '" class="standard" alt=" " />' : ''; ?>
										<img src="<?php echo esc_url( $general_options['logo_2x_upload'] ); ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>" class="retina" alt="<?php bloginfo('name'); ?>" />
									<?php } else {	?>
										<?php echo $general_options['logoupload'] ? '<img src="' . esc_url( $general_options['logoupload'] ) . '" class="standard" alt=" " />' : ''; ?>
									<?php } ?>
										</a>		
									</span>
								<?php } else { ?>
									<span class="site-title">	
									<a href="<?php echo get_home_url(); ?>/" title="<?php _e('Go to Home', 'meanthemes'); ?>">
									<?php if($retinaLogo) {  ?>
										<?php echo $general_options['logoupload'] ? '<img src="' . esc_url( $general_options['logoupload'] ) . '" class="standard" alt=" "  />' : ''; ?>
										<img src="<?php echo esc_url( $general_options['logo_2x_upload'] ); ?>" width="<?php echo $imgWidth; ?>" height="<?php echo $imgHeight; ?>" class="retina" alt="<?php bloginfo('name'); ?>" />
									<?php } else {	?>
										<?php echo $general_options['logoupload'] ? '<img src="' . esc_url( $general_options['logoupload'] ) . '" class="standard" alt=" "  />' : ''; ?>
									<?php } ?>											
										</a>
									</span>
								<?php } ?>
							<?php } ?>
						<?php if( (isset($general_options[ 'show_strapline' ])) && ($general_options[ 'show_strapline' ])) { ?>
							<span class="strap"><?php bloginfo('description'); ?></span>
						<?php } ?>	
						<?php if( (isset($general_options[ 'show_strapline' ])) && ($general_options[ 'show_strapline' ])) { ?>
							</span>
						<?php } ?>
					</div><!-- /logo -->
				<nav>
					<?php wp_nav_menu( array( 'menu' =>  __('Main Menu', 'meanthemes'), 'theme_location' => 'primary', 'container' => false, 'menu_id' => false, 'menu_class' => false ) ); ?>
				</nav><!-- /nav -->
			</div>	
		</header><!-- /header -->
		<div class="gutter">