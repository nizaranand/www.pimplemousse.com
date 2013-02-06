<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php current_title(); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php global $tt_framework, $shortname; ?>
		<?php favicon(); ?>
        <?php blog_keywords(); ?>
		<?php blog_description(); ?>
        <?php meta_robots(); ?>
        
        <!-- IMPORTING STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/framework/css/grid.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/prettyPhoto.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui-1.8.6.custom.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/superfish.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/superfish-vertical.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/custom.css"/>
        
		<!-- IMPORTING SCRIPTS -->
        <?php
        wp_enqueue_script('jquery');
        wp_enqueue_script('cufon-yui');
        wp_register_script('theme-jquery-ui', get_template_directory_uri() . '/framework/js/jquery-ui.js');
        wp_enqueue_script('theme-jquery-ui');
		if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
        wp_head();
        ?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cycle.all.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.anchor.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/video.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.preloader.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/fonts/greyscale.font.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.hoverIntent.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/superfish.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/css_browser_selector.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/contactForm.js"></script>
                
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
        <?php if($tt_framework->getOption('stonking_font_cufon') == 'true') { 
		$customFnts = get_option('custom_cufon_fonts');

            if ($customFnts['fonts'] != '')
                foreach ($customFnts['fonts'] as $customFnt) {
                print '<script type="text/javascript" src="'.$customFnt['file'].'"></script>';
                
            }
            ?>
		
        <script type="text/javascript">
		jQuery(document).ready(function(){
					if(jQuery(window).height()<jQuery('.sidebars-container').height()){
						jQuery('.sidebars-container').css('position','absolute');
					}
                    var custonCufons=[];            
                    custonCufons['H1']='<?php print get_the_option('stonking_fonttype_h1'); ?>';
                    custonCufons['H2']='<?php print get_the_option('stonking_fonttype_h2'); ?>';
                    custonCufons['H3']='<?php print get_the_option('stonking_fonttype_h3'); ?>';
                    custonCufons['H4']='<?php print get_the_option('stonking_fonttype_h4'); ?>';
                    custonCufons['H5']='<?php print get_the_option('stonking_fonttype_h5'); ?>';
                    custonCufons['H6']='<?php print get_the_option('stonking_fonttype_h6'); ?>';
                    jQuery('h1,h2,h3,h4,h5,h6').each(function(){
						if(!jQuery(this).is('.site-name, .site-desc, .navigation > ul > li > a, .teaser-text, .article-title'))
                        if(jQuery(this).hasClass('customCufon')){
							if(jQuery(this).attr('rel')!="none")
                            Cufon.replace(this,{            
                                fontFamily:jQuery(this).attr('rel'),            
                                hover:true            
                            });            
                        }else{  
							if(custonCufons[jQuery(this)[0].tagName]!="none")
                            Cufon.replace(this, {            
                                fontFamily: custonCufons[jQuery(this)[0].tagName],            
                                hover: true            
                            });            
                        }            
                    });
					Cufon.replace('.site-name', {
                          fontFamily: '<?php print get_the_option('stonking_fonttype_logo'); ?>',
                          hover: true
                      });
					Cufon.replace('.site-desc', {
                          fontFamily: '<?php print get_the_option('stonking_fonttype_logodesc'); ?>',
                          hover: true
                      });
					  Cufon.replace('.navigation > ul > li > a,.navigation .portfolio-filter a', {
                          fontFamily: '<?php print get_the_option('stonking_fonttype_menu'); ?>',
                          hover: true
                      });
					  Cufon.replace('.teaser-text', {
                          fontFamily: '<?php print get_the_option('stonking_fonttype_teaser'); ?>',
                          hover: true
                      });
					  Cufon.replace('.article-title', {
                          fontFamily: '<?php print get_the_option('stonking_fonttype_articletitle'); ?>',
                          hover: true
                      });
                });   
            
        </script>
        <?php } ?>
    </head>
		<body id="top" <?php body_class( '' ); ?>>