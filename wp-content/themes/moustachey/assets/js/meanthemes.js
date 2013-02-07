jQuery.noConflict();
(function ($) {
    // Initialisations ..
    
    
    
    jQuery(document).ready(function () {
        if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Windows Phone/i)) || (navigator.userAgent.match(/Blackberry/i))) {
            jQuery("body").addClass("mobile");
            var isMobile = true;
        };
        jQuery(function () {
        	if( jQuery(window).width() > 770) {
	            jQuery('header nav ul').superfish({
	                autoArrows: false,
	                dropShadows: false
	            });
            }
        });
               
        //
        // MeanMenu (responsive menu)
        //
        jQuery('header nav').meanmenu({
	        meanScreenWidth: "770",
	        meanRevealPosition: "left"
        });
        
       
        //
        //  FitVids
        //
        jQuery(".content, .sidebar, .article-archive, .footer-widget").fitVids();
        
        //
        // Donate
        //
        var donateHeight = jQuery('.donate-block').outerHeight();
        jQuery('.donate-block').css("top","-"+donateHeight+"px");
        
        jQuery('.donate, a.donate-trigger').toggle(function(e) {
        	e.preventDefault();
          	jQuery('.donate-block').animate({'top': 0});
        }, function() {
          	jQuery('.donate-block').animate({'top': -donateHeight});
        });
        
        
        //
        // Shortcodes (tabs and accordions)
        //
        
    	// Tabs
    	jQuery(function () {
    		jQuery(".mt-tabs").each( function () {
    		    var tabContainers = jQuery('.tab-inner > div', this);
    		   
    		    jQuery(' ul a',this).click(function (e) {
    			   e.preventDefault();
    		        tabContainers.hide().filter(this.hash).show();
    		        
    		        jQuery(' ul li',this).removeClass('tab-active');
    		        jQuery(this).parent().addClass('tab-active');
    		        
    		        return false;
    		    }).filter(':first').click();
    	    });
    	});	
    	
    	// Toggles
    	jQuery(".toggle").each( function () {
    		if(jQuery(this).attr('data-id') == 'closed') {
    			jQuery(this).accordion({ header: '.toggle-title', collapsible: true, active: false  });
    		} else {
    			jQuery(this).accordion({ header: '.toggle-title', collapsible: true});
    		}
    	});
        
        // add a class so we know JavaScript is supported
        jQuery('html').addClass("js");
        jQuery('html').removeClass("no-js");
       
        // set features
         if (jQuery('html').hasClass("oldie")) {
         // first and last support
         		jQuery("footer .widgets .footer-widget").first().addClass("first");
         		jQuery("footer .widgets .footer-widget").last().addClass("last");
        }
        // polyfill placeholder text
        if ( (jQuery('html').hasClass("oldie")) || (jQuery('html').hasClass("ie9")) ) {
        	
        			
            jQuery('[placeholder]').focus(function () {
                var input = jQuery(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                    input.removeClass('placeholder');
                }
            }).blur(function () {
                var input = jQuery(this);
                if (input.val() == '' || input.val() == input.attr('placeholder')) {
                    input.addClass('placeholder');
                    input.val(input.attr('placeholder'));
                }
            }).blur().parents('form').submit(function () {
                jQuery(this).find('[placeholder]').each(function () {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                })
            });
        }
        //strip image size from content and flexsliders
        jQuery('img.wp-post-image, .content img, img.size-full, .flexslider img, .sidebar img').each(function () {
            jQuery(this).removeAttr('width')
            jQuery(this).removeAttr('height');
        });
        
        
        //remove style from captions
		jQuery('.wp-caption').each(function () {
		    jQuery(this).css('width','')
		});
        
       
    });
    // .. Initialisations
})(jQuery);