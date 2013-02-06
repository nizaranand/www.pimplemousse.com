/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var maswall;

jQuery(document).ready(function(){
    var masonrySpeed=750;
    maswall = jQuery('.masonry-content');
    maswall.masonry({
        itemSelector: '.article-block',
        animate: true,
        columnWidth: 10,
        animationOptions: {
            duration: masonrySpeed,
            easing: 'linear',
            queue: false
        }
    });
    jQuery(window).resize( function () {
        loadMoreWidth();
    });
    function loadMoreWidth() {
        var loadMoreLink = jQuery('.pagination');
        var masonryWrap = jQuery('.masonry-content').width();
		
		if(masonryWrap < 391) {
			animateWidth(loadMoreLink, 370);
		} else if(masonryWrap > 391 && masonryWrap < 781) {
            animateWidth(loadMoreLink, 370);
        } else if(masonryWrap > 781 && masonryWrap < 1171) {
            animateWidth(loadMoreLink, 760);
        } else if(masonryWrap > 1171 && masonryWrap < 1561) {
            animateWidth(loadMoreLink, 1150);
        } else if(masonryWrap > 1561 && masonryWrap < 1951) {
            animateWidth(loadMoreLink, 1540);
        } else {
			animateWidth(loadMoreLink, 1930);
		}
    }
    function animateWidth(elem, size) {
        elem.stop().animate({
            width: size
        }, 200);
    }
    loadMoreWidth(); 
    
});