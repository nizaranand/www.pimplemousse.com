jQuery(document).ready(function() {



        // Upload button functionality
        jQuery('#upload_image_button').click(function() {
            formfield = jQuery('#upload_image').attr('name');
            tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
            return false;
        });
           
        window.send_to_editor = function(html) {
            imgurl = jQuery('img',html).attr('src');
            jQuery('#upload_image').val(imgurl);
            tb_remove();
        }
        
        jQuery.tabs = function(id) {
            jQuery('.tab-content').hide();
            jQuery('#premium-tabs ul li.selected').removeClass('selected');
            jQuery('#'+ id).show();
            jQuery('.'+ id).addClass('selected');
        }
        
        
        
})
