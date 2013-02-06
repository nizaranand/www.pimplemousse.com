/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


(function($){
    jQuery.fn.customFontPlugin=function(options){
        var defaultValues={
            removeButton:'.removeButton',
            addButton:'#post_slide_image_add_button'
        },
        clonedTemplate,
        clonerSlide=$(this);
        cloneTemplate();
        $('#custom_font_add_button').click(addItem);
        initOptions();
        function cloneTemplate(){
            clonedTemplate=clonerSlide.children(':first-child').clone();
            clonerSlide.children(':first-child').remove();
        // alert(clonerSlide.attr('class'));
        }
        function removeItem(){
            jQuery(this).hide();
            jQuery(this).parent().slideUp(500, function(){
                jQuery(this).remove();
                jQuery('#post_slide_image_count_value').val(clonerSlide.children().size());
                reOrder();
            });
        }
        function reOrder(){
            clonerSlide.children().each(reOrderIndex);
        }
        function reOrderIndex(index){
            jQuery(this).children(defaultValues.removeButton).click(removeItem);
            jQuery(this).find('input').each(function(){
                if(jQuery(this).attr('type')=='button'){
                    jQuery(this).attr('attr',jQuery(this).attr('rel').replace('#index#',index));
                }else{
                    args=(jQuery(this).attr('rel')+'').split(',');
                    //jQuery(this).attr('rel',jQuery(this).attr('name')+','+jQuery(this).attr('id'));
                    jQuery(this).attr('name',(args[0]+'').replace('#index#',index));
                    jQuery(this).attr('id',(args[1]+'').replace('#index#',index));
                }

            });
        }
        function browseFontMediaWindow()
        {
            window.original_send_to_editor = window.send_to_editor;
            window.custom_editor = true;
            var pID = jQuery('#post_ID').val();
            if(pID==undefined){
                pID=1;
            }
            window.send_to_editor = function(html){                
                imgurl = jQuery(html).attr('href');                
                if (elementId != undefined) {
                    jQuery('#'+elementId).val(imgurl);
                } else {
                    window.original_send_to_editor(html);
                }
                elementId = undefined;
                tb_remove();
            };
            elementId = jQuery(this).attr('attr');
            formfield = jQuery('#'+jQuery(this).attr('attr')).attr('name');
            tb_show('Upload', 'media-upload.php?post_id=' + 0 + '&type=file&TB_iframe=true',false);
        }
        function addItem(){
            newItem=clonedTemplate.clone();
            //newItem.children(defaultValues.removeButton).click(removeItem);
            newItem.css('display','none');
            initAfterAdd(newItem);
            clonerSlide.append(newItem);
            newItem.slideDown();
        }
        function initAfterAdd(itm){
            index=clonerSlide.children().size();
            jQuery('#custom_fonts_count').val(index+1);
            itm.children(defaultValues.removeButton).click(removeItem);
            jQuery(itm).find('input').each(function(){
                if(jQuery(this).attr('type')=='button'){
                    jQuery(this).click(browseFontMediaWindow);
                    jQuery(this).attr('attr',jQuery(this).attr('rel').replace('#index#',index));
                }else{
                    jQuery(this).attr('rel',jQuery(this).attr('name')+','+jQuery(this).attr('id'));
                    jQuery(this).attr('name',jQuery(this).attr('name').replace('#index#',index));
                    jQuery(this).attr('id',jQuery(this).attr('id').replace('#index#',index));
                }
            });
        }
        function initOptions(){
            clonerSlide.children().each(initOption);
            jQuery('#custom_fonts_count').val(clonerSlide.children().size());
        }
        function initOption(index){
            jQuery(this).children(defaultValues.removeButton).click(removeItem);
            jQuery(this).find('input').each(function(){
                if(jQuery(this).attr('type')=='button'){
                    jQuery(this).click(browseFontMediaWindow);
                    jQuery(this).attr('attr',jQuery(this).attr('rel').replace('#index#',index));
                }else{
                    jQuery(this).attr('rel',jQuery(this).attr('name')+','+jQuery(this).attr('id'));
                    jQuery(this).attr('name',jQuery(this).attr('name').replace('#index#',index));
                    jQuery(this).attr('id',jQuery(this).attr('id').replace('#index#',index));
                }
            });
        }
    };
})(jQuery);