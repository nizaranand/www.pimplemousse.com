<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'testiominals_shortcode_filter');
add_action('tt_shortcode_generator', 'testiominals_shortcode_generator');

function testiominals_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Testiominals', 'id' => 'testiominals');
    return $shortcodes;
}

function testiominals_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'testiominals', 'testiominals_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "testiominals"
    );
    default_shortcode_render($option);
?>
    <div>
        <div class="s-title"><label>Width</label></div>
        <div class="s-element"><input type="text" id="testiominals_slider_width" value="300"/></div>
        <div class="tt-cleared"></div>
        <div class="s-title"><label>Height</label></div>
        <div class="s-element"><input type="text" id="testiominals_slider_height" value="176"/></div>
        <div class="tt-cleared"></div>
    </div>
    <div id="testiominals_shortcode" class="testiominals_shortcode">
        <div class="post-slider-image">
            <div class="removeButton"></div>
            <table class="form-table" width="100%">
                <tr class="featured_image rowitem">
                    <th style="width:10%;">
                        <label for="featured_image">Name:</label>
                    </th>
                    <td>
                        <input type="text" name="testiominals_shortcode[#index#][name]" id="testiominals_shortcode_#index#_name" value="" size="30" tabindex="30">
                        <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_imagebtn" class=" thickbox button " onclick="browseMediaWindow('featured_image');">Upload image</a>-->
                        <small>Please select slide image of this shortcode</small>
                    </td>
                </tr>
                <tr class="featured_image rowitem">
                    <th style="width:10%;">
                        <label for="featured_image">Content:</label>
                    </th>
                    <td>
                        <textarea  name="testiominals_shortcode[#index#][content]" id="testiominals_shortcode_#index#_content"  COLS="40" ROWS="3"></textarea>
                        <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_imagebtn" class=" thickbox button " onclick="browseMediaWindow('featured_image');">Upload image</a>-->
                        <small>Please select slide image of this shortcode</small>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    <div>
        <input type="hidden" id="shordcode_testiominals_count_value" >
        <input type="button" id="shordcode_testiominals_add_button" tabindex="9" value="Add another testiominals"/>
    </div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_testiominals_shortcode();"></p>
    <script>
        function insert_testiominals_shortcode(){
            shortcod='[testiominalscontainer] ';//+jQuery('#shortcode_styledbox_content').val()+' [/imageslide]';
            scounter=parseInt(jQuery('#shordcode_testiominals_count_value').val());
            for(i=0;i<scounter;i++){
                name=""+jQuery('#testiominals_shortcode_'+i+'_name').val();
                cont=""+jQuery('#testiominals_shortcode_'+i+'_content').val();
                shortcod+='<br/>[testiominals name="'+name+'" width="'+jQuery('#testiominals_slider_width').val()+'" height="'+jQuery('#testiominals_slider_height').val()+']';
                shortcod+=cont;
                shortcod+='<br/>[/testiominals]'
            }
            shortcod+="<br/>[/testiominalscontainer]";
            send_to_editor( shortcod);
        }
        jQuery(document).ready(function(){
            jQuery('#testiominals_shortcode').sliderClone({
                addButton:'#shordcode_testiominals_add_button',
                slideCounter:'#shordcode_testiominals_count_value'
            });
        });
    </script>
<?php
    print $after_shortcode;
}

function testiominals_container_shortcode_func($atts, $content = null) {
    $content = str_replace("<br />", " ", $content);
    $html = "<div class='content-testiominals'><div class=\"testiominals\">" . do_shortcode($content) . "</div></div>";
    return $html;
}

function testiominals_shortcode_func($atts, $content = null) {
    $content = str_replace("<br />", " ", $content);
    $html = '<div class="testiominals-item">';
    $html .='<span>' . do_shortcode($content) . '</span>';
    $html .='<div class="testiominals-name">' . $atts['name'] . '</div></div>';
    return $html;
}

add_shortcode('testiominalscontainer', 'testiominals_container_shortcode_func');
add_shortcode('testiominals', 'testiominals_shortcode_func');
?>
