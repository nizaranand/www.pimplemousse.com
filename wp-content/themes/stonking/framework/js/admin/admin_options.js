/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var definedTtUserFunctions=[];
function addThemeOptionUserFunc(fn,parentHtml){
    definedTtUserFunctions.push(fn);
    fn(parentHtml);
}
function callThemeOptionUserFunc(parentHtml){
    for(i=0;i<definedTtUserFunctions.length;i++){
        definedTtUserFunctions[i](parentHtml);
    }
}
jQuery(document).ready(function(){
    jQuery('.custom_cufon_fonts').customFontPlugin({});
    jQuery('.cufon_options').each(function(){
        if(jQuery(this).attr('rel')){
            jQuery.include(jQuery(this).attr('rel'),initCufons,this);
        }
    });
    jQuery('.tt_option_reset_button').live('click',function(){
        jQuery(this).parent().children('.ajax-loading').css('visibility','visible');
        var data = {
            'action':'tt_admin_options_reset',
            'tt_admin_reset_page':jQuery('#'+jQuery(this).attr('rel')+' .tt_admin_page').val()+'',
            'tt_admin_reset_tab':jQuery('#'+jQuery(this).attr('rel')+' .tt_admin_tab').val()+''
        };
        var kk = this;
        jQuery.post(ajaxurl, data, function(response) {
            if(response=='0'||response==''||response==''||response=='-1'){
                sendMessage('<p>Reset error</p>');
            }else{
                resetParent='#'+jQuery(kk).attr('rel')+' form ';
                jQuery(resetParent).html(response);
                callThemeOptionUserFunc(resetParent);
                sendMessage('<p>Reset success</p>');
            }
            jQuery('.ajax-loading').css('visibility','hidden');
        });
    });
    jQuery('.themeton_option_form').submit(function() {
        jQuery('.ajax-loading').css('visibility','visible');
        var data = jQuery(this).serialize();
        jQuery.post(ajaxurl, data, function(response) {
            //alert(response);
            if(response == 1) {
                sendMessage('<p>Save success!</>');
            } else {
			alert(response);
                sendMessage('<p>Save error!</>');
            }
            jQuery('.ajax-loading').css('visibility','hidden');
        });
        return false;
    });
    
    
    jQuery('.tt_tab_content').tabs();
    addThemeOptionUserFunc(defaultThemeOptionInit, '');
    jQuery('.export_button').click(function(){
        jQuery('.ajax-loading').css('visibility','visible');
        var data = {
            'action':'theme_data_export'
        };
        var kk = this;
        //alert(data);
        //alert(ajaxurl);
        jQuery.post(ajaxurl, data, function(response) {
            jQuery('#theme_date_export_area').val(response);
            //alert(jQuery(kk).attr('rel'));
            //alert(response);

            jQuery('.ajax-loading').css('visibility','hidden');
        });
    });
    jQuery('.import_button').click(function(){
        jQuery('.ajax-loading').css('visibility','visible');
        //alert(jQuery('theme_date_import_area').value);
        var data = {
            'action':'theme_data_import',
            'import_values':jQuery('#theme_date_import_area').val()
        };
        var kk = this;
        //alert(data);
        //alert(ajaxurl);
        jQuery.post(ajaxurl, data, function(response) {
            alert(response);
            //jQuery('#theme_date_export_area').val(response);
            //alert(jQuery(kk).attr('rel'));
            //alert(response);

            jQuery('.ajax-loading').css('visibility','hidden');
        });
    });
    
});
function defaultThemeOptionInit(parentHtml){
    jQuery(parentHtml+' .theme_check').iphoneStyle({
        defaultOffWidth:41,
        defaultOnWidth:33
    });
    var colors=jQuery(parentHtml+'input.tt_colorpicker');

    colors.each(function(index){

        //  alert($(this).after("<span><div>haha</div></span>").html());
        //alert($('div'));
        var picker=jQuery('<div class="myColorPicker" rel='+jQuery(this).attr('id')+'></div>');

        jQuery(picker).ColorPicker({
            color: jQuery(this).val(),
            onShow: function (colpkr) {
                //alert('haha');
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb,el) {
                jQuery('#'+jQuery(el).attr('rel')).css('backgroundColor', '#' + hex);
                jQuery('#'+jQuery(el).attr('rel')).val('#' +hex);
            }
        });
        jQuery(this).after(picker);
    //alert($(this).after().html());
    });
    var sliders=jQuery('input').filter(function(index){
        return this.getAttribute("type") == 'slider';
    });
    sliders.each(function(){
        jQuery('.slider').slider({
            from: parseInt(jQuery(this).attr('slidermin')),
            to: parseInt(jQuery(this).attr('slidermax')),
            step: parseInt(jQuery(this).attr('sliderstep')),
            round: parseInt(jQuery(this).attr('sliderround')),
            dimension: jQuery(this).attr('sliderdimension')
        });
    });
    var logo_selector = parentHtml+'#stonking_logo_show';
    var logo_classes = '.stonking_logo_image, .stonking_logo_width, .stonking_logo_height';
    var logo_text_classes = '.stonking_logo_text';
    if(jQuery(logo_selector).is(':checked')){
        jQuery(logo_classes).slideDown();
        jQuery(logo_text_classes).slideUp();
    }else{
        jQuery(logo_text_classes).slideDown();
        jQuery(logo_classes).slideUp();
    }
    jQuery(logo_selector).change(function(){
        if(jQuery(logo_selector).is(':checked')){
            jQuery(logo_classes).slideDown();
            jQuery(logo_text_classes).slideUp();
        }else{
            jQuery(logo_text_classes).slideDown();
            jQuery(logo_classes).slideUp();
        }
    });
    var site_desc = parentHtml+'#stonking_site_desc';
    var curtom_desc = '.stonking_logo_description';
    if(jQuery(site_desc).is(':checked')){
        jQuery(curtom_desc).slideDown();
    }else{
        jQuery(curtom_desc).slideUp();
    }
    jQuery(site_desc).change(function(){
        if(jQuery(site_desc).is(':checked')){
            jQuery(curtom_desc).slideDown();
        }else{
            jQuery(curtom_desc).slideUp();
        }
    });

    //Facebook comments selection
    jQuery(parentHtml+'#stonking_facebook_comment').change(function(){
        if(jQuery('#stonking_facebook_comment').is(':checked')){
            jQuery('.stonking_facebook_appid').slideDown();
			jQuery('.stonking_comment_perpage').slideDown();
        }else{
            jQuery('.stonking_facebook_appid').slideUp();
			jQuery('.stonking_comment_perpage').slideUp();
        }
    });
	if(!jQuery(parentHtml+'#stonking_facebook_comment').is(':checked')){
		jQuery(parentHtml+'.stonking_facebook_appid').hide();
		jQuery(parentHtml+'.stonking_comment_perpage').hide();
	}
}