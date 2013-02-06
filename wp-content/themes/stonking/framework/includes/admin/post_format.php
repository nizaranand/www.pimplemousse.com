<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_action('admin_menu', 'tt_custom_post_formats');

function tt_custom_post_formats() {
    add_meta_box('tt_post_format', __('Post format fields'), 'tt_custom_post_format_box', 'post', 'normal');
}

function tt_custom_post_format_box() {
    global $post;
    $post_id = $post->ID;
?>
    <div id="themeton_custom_post_format">
        <div class="themeton_format_video themeton_post_format">
            <div class="themeton_format_inside">
                <table class="form-table">
                    <tr>
                        <th><label>Post format video embeded code here</label></th>
                        <td>
                            <textarea name="tt_format_video" cols="80" rows="5"><?php print get_post_meta($post_id, 'video-embed', true); ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="themeton_format_audio themeton_post_format">
            <div class="themeton_format_inside">
                <table class="form-table">
                    <tr>
                        <th><label>Post format audio url here</label></th>
                        <td>
                            <input name="tt_format_audio" value="<?php print get_post_meta($post_id, 'tt-audio-link', true); ?>" type="text" size="30">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="themeton_format_link themeton_post_format">
            <div class="themeton_format_inside">
                <table class="form-table">
                    <tr>
                        <th><label>Post format your link here</label></th>
                        <td>
                            <input name="tt_format_link" value="<?php print_r(get_post_meta($post_id, 'link-url', true)); ?>" type="text" size="30">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="themeton_format_quote themeton_post_format">
            <div class="themeton_format_inside">
                <table class="form-table">
                    <tr>
                        <th><label>Quote author</label></th>
                        <td>
                            <input name="tt_quote_author" value="<?php print_r(get_post_meta($post_id, 'tt_quote_author', true)); ?>" type="text" size="30">
                        </td>
                    </tr>
                    <tr>
                        <th><label>Link</label></th>
                        <td>
                            <input name="tt_quote_link" value="<?php print_r(get_post_meta($post_id, 'tt_quote_link', true)); ?>" type="text" size="30">
                        </td>
                    </tr>
                    <tr>
                        <th><label>Quote text</label></th>
                        <td>
                            <textarea name="tt_quote_text" style="width:100%;" rows="4" ><?php print_r(get_post_meta($post_id, 'tt_quote_text', true)); ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php
    wp_nonce_field(plugin_basename(__FILE__), 'tt_post_format_noncename');
?>
    <script>
        jQuery(document).ready(function(){
            showHidePostFormatField();
            jQuery('#post-formats-select input:radio').click(showHidePostFormatField);
        });
        function showHidePostFormatField(){
            selectedFrmt=(''+jQuery('#post-formats-select input:radio:checked').val());
            jQuery('#themeton_custom_post_format > div').each(function(){
                if(jQuery(this).hasClass('themeton_format_'+jQuery('#post-formats-select input:radio:checked').val())){
                    jQuery(this).show('slow');
                }else{
                    jQuery(this).hide('slow');
                }
            });
        }
    </script>
<?php
}

add_action('save_post', 'save_post_format_meta');

function save_post_format_meta($post_id) {
    global $post;
    if (isset($_POST['tt_post_format_noncename']) && !wp_verify_nonce($_POST['tt_post_format_noncename'], plugin_basename(__FILE__)))
        return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    if (!current_user_can('edit_post', $post_id))
        return $post_id;
    if (isset($_POST['post_type']) && 'post' == $_POST['post_type']) {
        $frmt = get_post_format($post_id);
        //$frmt='link';
        switch ($frmt) {
            case 'video':
                if (get_post_meta($post_id, 'video-embed') == '') {
                    add_post_meta($post_id, 'video-embed', stripslashes($_POST['tt_format_video']));
                } else {
					if(isset($_POST['tt_format_video']))
						update_post_meta($post_id, 'video-embed', stripslashes($_POST['tt_format_video']));
                }
                break;
            case 'quote':
                if (get_post_meta($post_id, 'tt_quote_link') == '') {
                    add_post_meta($post_id, 'tt_quote_link', stripslashes($_POST['tt_quote_link']));
                } else {
                    update_post_meta($post_id, 'tt_quote_link', stripslashes($_POST['tt_quote_link']));
                }
                if (get_post_meta($post_id, 'tt_quote_text') == '') {
                    add_post_meta($post_id, 'tt_quote_text', stripslashes($_POST['tt_quote_text']));
                } else {
                    update_post_meta($post_id, 'tt_quote_text', stripslashes($_POST['tt_quote_text']));
                }
                if (get_post_meta($post_id, 'tt_quote_author') == '') {
                    add_post_meta($post_id, 'tt_quote_author', stripslashes($_POST['tt_quote_author']));
                } else {
                    update_post_meta($post_id, 'tt_quote_author', stripslashes($_POST['tt_quote_author']));
                }
                break;
            case 'audio':
                if (get_post_meta($post_id, 'tt-audio-link') == '') {
                    add_post_meta($post_id, 'tt-audio-link', stripslashes($_POST['tt_format_audio']));
                } else {
                    update_post_meta($post_id, 'tt-audio-link', stripslashes($_POST['tt_format_audio']));
                }
                break;
            case 'link':
                if (get_post_meta($post_id, 'link-url') == '') {
                    add_post_meta($post_id, 'link-url', stripslashes($_POST['tt_format_link']));
                } else {
                    update_post_meta($post_id, 'link-url', stripslashes($_POST['tt_format_link']));
                }
                break;
        }
    }
}
?>
