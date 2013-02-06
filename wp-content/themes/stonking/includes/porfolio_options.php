<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_action('admin_menu', 'portfolio_metabox');

function portfolio_metabox() {
add_meta_box('portfolio-meta-boxes', __('Portfolio Options'), 'portfolio_meta_boxes', 'portfolio', 'normal');
}

function portfolio_meta_boxes() {

?>
<table class="form-table">
    <tbody><tr>
            <th><label>Portfolio type</label></th>
            <td>
                <select name="portfolio_item_type" >
                    <option value="none">Standard</option>
                    <option  value="featured">Featured</option>
                    <option  value="new">New</option>
                    <option value="hot">Hot</option>
                </select>
<?php
wp_nonce_field(plugin_basename(__FILE__), 'portfolio_custom_options_noncename');
?>
            </td>
        </tr>
    </tbody></table>
<?php
}
add_action('save_post', 'save_portfolio_custom_options');

function save_portfolio_custom_options($post_id) {
    if (!wp_verify_nonce($_POST['portfolio_custom_options_noncename'], plugin_basename(__FILE__)))
        return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    if (!current_user_can('edit_post', $post_id))
        return $post_id;
    if ('portfolio' == $_POST['post_type']) {
        
            if (get_post_meta($post_id, 'tt_portfolio_type') == '') {
                add_post_meta($post_id, 'tt_portfolio_type', $_REQUEST['portfolio_item_type'], true);
            } else {
                update_post_meta($post_id, 'tt_portfolio_type', $_REQUEST['portfolio_item_type']);
            }        
    }
}
?>
