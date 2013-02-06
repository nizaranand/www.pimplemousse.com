<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_action('admin_menu', 'tt_slider_metabox');

//add_action('save_post', 'clean_save_meta_data');

function tt_slider_metabox() {
    global $theme_name;

    /* add_meta_box('post-meta-boxes', __('Additional Options'), 'post_meta_boxes', 'post', 'normal');
      add_meta_box('slider_meta_box', __('Slide images'), 'slider_meta_box', 'post', 'normal');
      add_meta_box('page-meta-boxes', __('Additional Options'), 'page_meta_boxes', 'page', 'normal');
      add_meta_box('port-meta-boxes', __('Additional Options'), 'port_meta_boxes', 'portfolio', 'normal');
      add_meta_box('slider-dmeta-boxes', __('Additional Options'), 'slider_meta_boxes', 'slider', 'normal');
      add_meta_box('slider-meta-boxes', __('Additional Options'), 'service_meta_boxes', 'service', 'normal'); */
    add_meta_box('slider_meta_box', __('Slide images'), 'slider_meta_box', 'post', 'normal');
}

function slider_meta_box() {
    global $post;
?>
    <div id="themeton_custom_post_slider_images" class="aaaa">
        <div class="post-slider-image">
            <div class="removeButton"></div>
            <table class="form-table" width="100%">
                <tr class="featured_image rowitem">
                    <th style="width:10%;">
                        <label for="featured_image">Featured image</label>
                    </th>
                    <td>
                        <input type="text" name="post_slide[#index#][image]" id="post_slide_#index#_image" value="" size="30" tabindex="30">
                        <input class="button" rel="post_slide_#index#_image" type="button" value="Upload" >
                        <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_imagebtn" class=" thickbox button " onclick="browseMediaWindow('featured_image');">Upload image</a>-->
                        <small>Please select featured image of this post</small>
                    </td>
                </tr>
                <tr class="featured_image_link rowitem">
                    <th style="width:10%;">
                        <label for="featured_image_link">Linked media</label>
                    </th>
                    <td>
                        <input type="text" name="post_slide[#index#][media]" id="post_slide_#index#_media" value="" size="30" tabindex="30">
                        <input class="button" rel="post_slide_#index#_media" type="button" value="Upload" >
                        <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_image_linkbtn" class=" thickbox button " onclick="browseMediaWindow('featured_image_link');">Upload image</a>-->
                        <small>It is provides your media when click on your featured image.</small>
                    </td>
                </tr>
            </table>
        </div>
    <?php
    $imgs = get_post_meta($post->ID, 'post_slide_images', true);
    if ($imgs != '')
        foreach ($imgs as $img) {
    ?>
            <div class="post-slider-image">
                <div class="removeButton"></div>
                <table class="form-table" width="100%">
                    <tr class="featured_image rowitem">
                        <th style="width:10%;">
                            <label for="featured_image">Featured image</label>
                        </th>
                        <td>
                            <input type="text" name="post_slide[#index#][image]" id="post_slide_#index#_image" value="<?php print $img['image']; ?>" size="30" tabindex="30">
                            <input class="button" rel="post_slide_#index#_image" type="button" value="Upload" >
                            <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_imagebtn" class=" thickbox button " onclick="browseMediaWindow('featured_image');">Upload image</a>-->
                            <small>Please select featured image of this post</small>
                        </td>
                    </tr>
                    <tr class="featured_image_link rowitem">
                        <th style="width:10%;">
                            <label for="featured_image_link">Linked media</label>
                        </th>
                        <td>
                            <input type="text" name="post_slide[#index#][media]" id="post_slide_#index#_media" value="<?php print $img['media']; ?>" size="30" tabindex="30">
                            <input class="button" rel="post_slide_#index#_media" type="button" value="Upload" >
                            <!--<a href="media-upload.php?post_id=4&#038;type=file&#038;TB_iframe=1" name="featured_image_linkbtn" class=" thickbox button " onclick="browseMediaWindow('featured_image_link');">Upload image</a>-->
                            <small>Provides your media when click on your featured image.</small>
                        </td>
                    </tr>
                </table>
            </div>
<?php } ?>
</div>
<input type="hidden" id="post_slide_image_count_value" name="post_slide_image_count_value">
<?php
    wp_nonce_field(plugin_basename(__FILE__), 'post_slide_noncename');
?>
    <input type="button" id="post_slide_image_add_button" name="addmeta" class="add:the-list:newmeta button" tabindex="9" value="Add another image"/>
<?php
}

add_action('save_post', 'save_slider_meta_box');

function save_slider_meta_box($post_id) {
    global $post;
    if (!wp_verify_nonce($_POST['post_slide_noncename'], plugin_basename(__FILE__)))
        return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    if (!current_user_can('edit_post', $post_id))
        return $post_id;
    if ('post' == $_POST['post_type']) {

        if (get_post_meta($post_id, 'post_slide_image_count') == '') {
            add_post_meta($post_id, 'post_slide_image_count', stripslashes($_POST['post_slide_image_count_value']), true);
        } else {
            update_post_meta($post_id, 'post_slide_image_count', stripslashes($_POST['post_slide_image_count_value']));
        }
        if ($_POST['post_slide_image_count_value'] != '0') {
            $imgs = '';
            $medias = '';
            $strp = '';
            $customSliderMeta = Array();
            for ($i = 0; $i < intval($_POST['post_slide_image_count_value']); $i++) {
                if ($_POST['post_slide'][$i]['image'] != '') {
                    $customSliderMeta[] = Array('image' => stripslashes($_POST['post_slide'][$i]['image']), 'media' => stripslashes($_POST['post_slide'][$i]['media']));
                }
            }

            // $imgs=stripslashes($_POST['post_slide'][0]['image']).',sd';
            if (get_post_meta($post_id, 'post_slide_images') == '') {
                add_post_meta($post_id, 'post_slide_images', $customSliderMeta, true);
            } else {
                update_post_meta($post_id, 'post_slide_images', $customSliderMeta);
            }
        } else {
            delete_post_meta($post_id, 'post_slide_images');
        }
    }
}
?>
