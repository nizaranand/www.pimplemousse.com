/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var maswall;

jQuery(document).ready(function(){
    var masonrySpeed=750;
    maswall = jQuery('.masonry-content');
    maswall.masonry({
        itemSelector: '.masonry:not(.invis)',
        animate: true,
        columnWidth: 260,
        animationOptions: {
            duration: masonrySpeed,
            easing: 'linear',
            queue: false
        }
    });
    jQuery('.portfolio-filter a').live('click',function(){
        maswall = jQuery('.masonry-content');
        jQuery('.portfolio-filter a').removeClass('filtered');
        jQuery(this).addClass('filtered');
        filteredType=jQuery(this).attr('href')+'';
        filteredType=filteredType.replace('#','');        
        if(filteredType=='all'){
            maswall.children('.invis')
            .toggleClass('invis').fadeIn(masonrySpeed);
        }else{
            maswall.children().not('.masonry-'+filteredType+'').not('.invis')
            .toggleClass('invis').fadeOut(masonrySpeed);
            maswall.children('.masonry-'+filteredType).each(function(){

                if(jQuery(this).hasClass('invis')){
                    jQuery(this).toggleClass('invis').fadeIn(masonrySpeed);
                }
            });

        }
        maswall.masonry();
        return false;
    });

    jQuery(window).resize( function () {
        loadMoreWidth();
    });
    function loadMoreWidth() {
        var loadMoreLink = jQuery('.pagination');
        var masonryWrap = jQuery('.masonry-content').width();
		if(masonryWrap < 261) {
			animateWidth(loadMoreLink, 240);
		} else if(masonryWrap > 261 && masonryWrap < 521) {
            animateWidth(loadMoreLink, 240);
		} else if(masonryWrap > 521 && masonryWrap < 781) {
            animateWidth(loadMoreLink, 500);
		} else if(masonryWrap > 781 && masonryWrap < 1041) {
            animateWidth(loadMoreLink, 760);
		} else if(masonryWrap > 1041 && masonryWrap < 1301) {
            animateWidth(loadMoreLink, 1020);
		} else if(masonryWrap > 1301 && masonryWrap < 1561) {
            animateWidth(loadMoreLink, 1280);
		} else if(masonryWrap > 1561 && masonryWrap < 1821) {
            animateWidth(loadMoreLink, 1540);
		} else {
			animateWidth(loadMoreLink, 1800);
		}
    }
    function animateWidth(elem, size) {
        elem.stop().animate({
            width: size
        }, 200);
    }
    loadMoreWidth();
});