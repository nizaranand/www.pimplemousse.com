<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'slider_shortcode_filter');
add_action('tt_shortcode_generator', 'slider_shortcode_generator');

function slider_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Image Slider', 'id' => 'slider');
    return $shortcodes;
}

function slider_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'slider', 'slider_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Slider"
    );
    default_shortcode_render($option);
?>
    <div>
        <div class="s-title"><label>Width</label></div>
        <div class="s-element"><input type="text" id="shortcode_slider_width" value="300"/></div>
        <div class="s-title"><label>Height</label></div>
        <div class="s-element"><input type="text" id="shortcode_slider_height" value="176"/></div>
        <div class="tt-cleared"></div>
    </div>
    <div id="slider_shortcode_images" class="slider_shortcode">
        <div class="post-slider-image">
            <div class="removeButton"></div>
            <table class="form-table" width="100%">
                <tr class="featured_image rowitem">
                    <th style="width:10%;">
                        <label for="featured_image">Featured image</label>
                    </th>
                    <td>
                        <input type="text" name="shortcode_slide[#index#][image]" id="shortcode_slide_#index#_image" value="" size="30" tabindex="30">
                        <input class="button" rel="shortcode_slide_#index#_image" type="button" value="Upload" >
                        <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_imagebtn" class=" thickbox button " onclick="browseMediaWindow('featured_image');">Upload image</a>-->
                        <small>Please select slide image of this shortcode</small>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    <div>
        <input type="hidden" id="shordcode_slide_image_count_value" >
        <input type="button" id="shordcode_slide_image_add_button" tabindex="9" value="Add another image"/>
    </div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_slider_shortcode();"></p>
    <script>
        function insert_slider_shortcode(){
            shortcod='[slideimagecontainer] ';//+jQuery('#shortcode_styledbox_content').val()+' [/imageslide]';
            scounter=parseInt(jQuery('#shordcode_slide_image_count_value').val());
            for(i=0;i<scounter;i++){
                simg=""+jQuery('#shortcode_slide_'+i+'_image').val();
                if(simg!=""){
                    shortcod+='<br/>[slideimage width="'+jQuery('#shortcode_slider_width').val()+'" height="'+jQuery('#shortcode_slider_height').val()+'" img="'+simg+'"]';
                }
            }
            shortcod+="<br/>[/slideimagecontainer]";
			//alert(shortcod);
            send_to_editor( shortcod);
        }
        jQuery(document).ready(function(){
            jQuery('#slider_shortcode_images').sliderClone({
                addButton:'#shordcode_slide_image_add_button',
                slideCounter:'#shordcode_slide_image_count_value'
            });    
        });
    </script>
<?php
    print $after_shortcode;
}

function slider_container_shortcode_func($atts, $content = null) {
    $content = str_replace("<br />", " ", $content);
    $html = "<div class='content-slider'><div class=\"article-image-slide\">" . do_shortcode($content) . "</div></div>";
    return $html;
}

function slider_shortcode_func($atts, $content = null) {
    $html = '<div style="width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;" class="featured-works-image preload">';
    $html .='<img style="width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px;" src="' . $atts['img'] . '" /></div>';
    return $html;
}

add_shortcode('slideimagecontainer', 'slider_container_shortcode_func');
add_shortcode('slideimage', 'slider_shortcode_func');
?>
