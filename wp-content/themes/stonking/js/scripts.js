/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function initScripts(parentHtml){
    jQuery(parentHtml).find('.preload').preloadImages({
        showSpeed: 2000,   // length of fade-in animation, 500 is default
        easing: 'easeOutQuad'   // optional easing, if you don't have any easing scripts - delete this option
    });

    jQuery(parentHtml).find('.article-image-slide').each(function(index){
        myPager=jQuery('<ul id="jcycle-pager" class="jcycle-pager nav-item'+index+'">');
        jQuery(this).after(myPager);
        jQuery(this).cycle({
            pager:  myPager,
            fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
            delay: 1000,
            random: 1,
            easing: 'easeInOutExpo',
            pause: true,
            // pager:  '.nav-item'+index,
            pagerAnchorBuilder: function(idx, slide) {
                return '<li><a href="#">*</a></li>';
            }
        });
    });
    jQuery(parentHtml).find(".zoom:first a[rel^='prettyPhoto']").prettyPhoto({
        animationSpeed:'slow',
        theme:'light_square',
        slideshow:2000,
        autoplay_slideshow: false
    });
    jQuery(parentHtml).find(".zoom:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
        animationSpeed:'fast',
        slideshow:10000
    });
    jQuery(parentHtml).find('.tabs').each(function(tabid){
        var tabTitles=jQuery(this).children('h3').remove();
        var myTab=tabid;
        jQuery(this).children().each(function(index){
            jQuery(this).attr('id', 'tab-'+myTab+'-'+index);
        });
        var tabTitleContainer=jQuery('<ul class="'+jQuery(this).attr('rel')+'"></ul>');
        tabTitles.each(function(index){
            jQuery(this).children('a').attr('href', '#tab-'+myTab+'-'+index);
            tabTitleContainer.append(jQuery('<li></li>').append(jQuery(this)));
        });
        jQuery(this).prepend(tabTitleContainer);

    //jQuery(this).append(titles);
    });
    jQuery(parentHtml).find('.tabs').tabs(
    {
        fx: {
            opacity: 'toggle',
            speed: 100
        }
    },

    {
        click: function() {
            Cufon.refresh();
        },
        hide: function() {
            Cufon.refresh();
        },
        show: function() {
            Cufon.refresh();
        },
        load:function(){
			
        }
    });
   
    jQuery(parentHtml).find(".toggle_title").toggle(
        function(){
            jQuery(this).addClass('toggle_active');
            jQuery(this).siblings('.toggle_content').slideDown("fast");
        },
        function(){
            jQuery(this).removeClass('toggle_active');
            jQuery(this).siblings('.toggle_content').slideUp("fast");
        }
        );
    jQuery(parentHtml).find('.accordion').accordion();
    jQuery(parentHtml).find('.testiominals').each(function(index){
        desNext=jQuery('<a href="#" class="tnext">&gt;</a>');
        desPrev=jQuery('<a href="#" class="tprev">&lt;</a>');
        desPager=jQuery('<div class="fp-pager"></div>');

        desPager.append(desPrev);
        desPager.append(desNext);
        jQuery(this).before(desPager);
        jQuery(this).cycle({
            fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
            easing: 'easeInOutExpo',
            delay: 10,
            speed: 500,
            prev:    desPrev,
            next:    desNext
        });
    });
    imgIconOverlay(jQuery,parentHtml);
    Cufon.refresh();
}
jQuery(document).ready(function(){

    //  IMAGE PRELOADER
    
    
    jQuery("#menu-list").superfish({
        animation: {
            height:'show'
        },   // slide-down effect without fade-in
        delay:     0               // 1.2 second delay on mouseout
    });
    initScripts('body');
    
    VideoJS.setupAllWhenReady();
    function n(){
        jQuery(".article-block").each(function(){
            var a=0;//jQuery(this).offset().top-10,b=jQuery(this).outerHeight(),d=jQuery(window).scrollTop(),p=jQuery(this).find(".article-fixed-meta").outerHeight(true),q=jQuery(this).find(".article-fixed-meta").offset().left;
            d=0;
            if(a-d<0&&a-d>-b&&
                a-d<10+p-b)jQuery(this).find(".article-fixed-meta").data("fixed","false").css({
                position:"absolute",
                //right:"0px",
                marginLeft:650+"px",
                bottom:"10px",
                top:"auto"
            });else a-d<0&&a-d>-b?jQuery(this).find(".article-fixed-meta").data("fixed","true").css({
                position:"fixed",
                marginLeft:650+"px",
                bottom:"auto",
                top:"10px"
            }):jQuery(this).find(".article-fixed-meta").data("fixed","false").css({
                position:"absolute",
                //right:"0px",
                marginLeft:650+"px",
                bottom:"auto",
                top:"0px"
            });
            if(jQuery(this).find(".article-fixed-meta").data("fixed")=="true"){
                a=jQuery(this).offset().left+jQuery(this).find(".entry").outerWidth(false)-
                jQuery(window).scrollLeft();
                jQuery(this).find(".article-fixed-meta").css({
                    marginLeft:550+"px"
                });
                console.log(jQuery(window).scrollLeft()+" and "+a)
            }
        })
    }
    jQuery(window).scroll(function(){
        n()
    });
    var o=16;
    jQuery(window).resize(function(){
        jQuery(".article-block").each(function(){
            if(jQuery(this).find(".article-fixed-meta").data("fixed")=="true"){
                var a=jQuery(this).offset().left+jQuery(this).find(".article").outerWidth(false)-jQuery(window).scrollLeft();
                jQuery(this).find(".article-fixed-meta").css({
                    left:a+o+"px"
                });
                console.log(jQuery(window).scrollLeft()+" and "+a)
            }
        })
    });
    
});
function imgIconOverlay($,parentHtml) {
    // This will select the items which should include the image overlays
    $(parentHtml).find("div.hover-content").each(function(){
        var	ctnr = $(this).find('a.imgMedium');
        var cntrDiv=$(this);
        // insert the overlay image
        ctnr.each(function(){
            if ($(this).children('img')) {
                if ($(this).hasClass('iconPlay')) {
                    $(this).append($('<div class="imgOverlay"><div class="symbolPlay"></div></div>'));
                } else if  ($(this).hasClass('iconDoc')) {
                    $(this).append($('<div class="imgOverlay"><div class="symbolDoc"></div></div>'));
                } else if (ctnr.hasClass('iconZoom')){
                    $(this).append($('<div class="imgOverlay"><div class="symbolZoom"></div></div></div>'));
                }
            }
        })


        var overImg = ctnr.children('.imgOverlay');
        // var hoverInfo = ctnr.parent.next();

        if (jQuery.browser.msie && parseInt(jQuery.browser.version, 10) < 6) {
        // IE sucks at fading PNG's with gradients so just use show hide

        } else {
            // make sure it's not visible to start
            overImg.css('opacity',0);

            cntrDiv.hover(
                function(){
                    overImg.animate({
                        'opacity':'1'
                    },500,'swing');
                    $(this).children(':last-child').animate({
                        'opacity':'1'
                    },500,'swing');
                //                    $(this).children('.jcycle-pager').animate({
                //                        'opacity':'0'
                //                    },500,'swing');

                },		// mouseover
                function(){
                    overImg.animate({
                        'opacity':'0'
                    },500,'swing');
                    $(this).children(':last-child').animate({
                        'opacity':'0'
                    },500,'swing');
                //                    $(this).children('.jcycle-pager').animate({
                //                        'opacity':'1'
                //                    },500,'swing');

                }		// mouseout
                );
        }
    });
}