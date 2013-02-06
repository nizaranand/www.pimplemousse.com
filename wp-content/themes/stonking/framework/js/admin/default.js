/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function sendMessage(msg){
    jQuery('#tt-message').html(msg);
    jQuery('#tt-message').show('slow');
    setTimeout(function(){
        jQuery('#tt-message').hide('slow');
    }, 4000)
}
jQuery(document).ready(function(){
    jQuery('#themeton_custom_post_slider_images').sliderClone({

        });
    jQuery('#shortcode_generator_list > div').css('display','none');
    jQuery('#shortcode_selector').change(function(){
        jQuery('#shortcode_generator_list > div').css('display','none');
        jQuery('#shortcode_'+jQuery(this).val()).css('display','block');
    });

    jQuery('#poststuff').each(function(){
        var selector0 = "#page_template";
        var dondogmaa="#themeton_additional_options .tt_meta_rowitem";
        

        var container = jQuery(this),
        superselector = container.find(selector0);
        var template = superselector.val();
        if(template!=undefined){
            jQuery(dondogmaa).fadeOut();
            jQuery(dondogmaa+'[rel*="'+template+'"]').fadeIn();

            jQuery(selector0).bind('change', function(){
                var template = jQuery(selector0).val();
                jQuery(dondogmaa).fadeOut();
                jQuery(dondogmaa+'[rel*="'+template+'"]').fadeIn();                
            });
        }
    });

});
function browseMediaWindow(param)
{
    window.original_send_to_editor = window.send_to_editor;
    window.custom_editor = true;
    var pID = jQuery('#post_ID').val();
    if(pID==undefined){
        pID=1;
    }
    window.send_to_editor = function(html){
        imgurl = jQuery('img',html).attr('src');
        if (elementId != undefined) {
            jQuery('#'+elementId).val(imgurl);
        } else {
            window.original_send_to_editor(html);
        }
        elementId = undefined;
        tb_remove();
    };
    elementId = param;
    formfield = jQuery('#'+param).attr('name');
    tb_show('Upload', 'media-upload.php?post_id=' + pID + '&type=image&TB_iframe=true',false);
}

window.original_send_to_editor = window.send_to_editor;
window.custom_editor = true;