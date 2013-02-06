<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// start baagii
require_once TEMPLATEPATH . '/framework/shortcodes/accordion.php';
require_once TEMPLATEPATH . '/framework/shortcodes/blockquote.php';
require_once TEMPLATEPATH . '/framework/shortcodes/button.php';
require_once TEMPLATEPATH . '/framework/shortcodes/columns.php';
require_once TEMPLATEPATH . '/framework/shortcodes/contact.php';
require_once TEMPLATEPATH . '/framework/shortcodes/contact-form.php';
require_once TEMPLATEPATH . '/framework/shortcodes/contact-submit.php';
require_once TEMPLATEPATH . '/framework/shortcodes/dropcap.php';
require_once TEMPLATEPATH . '/framework/shortcodes/googlemap.php';
require_once TEMPLATEPATH . '/framework/shortcodes/heading.php';
require_once TEMPLATEPATH . '/framework/shortcodes/lightbox.php';
require_once TEMPLATEPATH . '/framework/shortcodes/list.php';
//require_once TEMPLATEPATH . '/framework/shortcodes/princing.php';
require_once TEMPLATEPATH . '/framework/shortcodes/space.php';
require_once TEMPLATEPATH . '/framework/shortcodes/seperator.php';
require_once TEMPLATEPATH . '/framework/shortcodes/styledbox.php';
require_once TEMPLATEPATH . '/framework/shortcodes/tabs.php';
require_once TEMPLATEPATH . '/framework/shortcodes/table.php';
require_once TEMPLATEPATH . '/framework/shortcodes/toggle.php';
//require_once TEMPLATEPATH . '/framework/shortcodes/video.php';
require_once TEMPLATEPATH . '/framework/shortcodes/slider.php';
require_once TEMPLATEPATH . '/framework/shortcodes/testiominals.php';
require_once TEMPLATEPATH . '/framework/shortcodes/code.php';


//end baagii
//start baljka
//end baljka
add_action('add_meta_boxes', 'shortcode_custom_metabox');

function shortcode_custom_metabox() {
    add_meta_box(
            'Shortcodes',
            __('Sortcode generator', 'myplugin_textdomain'),
            'tt_metabox_custom_view',
            'post',
            'normal',
            'high'
    );
    add_meta_box(
            'Shortcodes',
            __('Sortcode generator', 'myplugin_textdomain'),
            'tt_metabox_custom_view',
            'page',
            'normal',
            'high'
    );
     add_meta_box(
            'Shortcodes',
            __('Sortcode generator', 'myplugin_textdomain'),
            'tt_metabox_custom_view',
            'portfolio',
            'normal',
            'high'
    );
}

function tt_metabox_custom_view() {
    $shortcodeSelectors = Array(Array('name' => 'Select shortcode', 'id' => ''));
    $shortcodeSelectors = apply_filters('tt_shortcode_list_init', $shortcodeSelectors);
?>
    <table class="form-table">
        <tr>
            <th style="width: 10%"><label for="ss">Shortcode</label>
            </th>
            <td class="code-selector">
                <select id="shortcode_selector">
                <?php
                foreach ($shortcodeSelectors as $shortCode) {
                ?>
                    <option value="<?php print $shortCode['id'] ?>"><?php print $shortCode['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
</table>
<?php
                $args = Array(
                    'before_shortcode' => '<div id="shortcode_%1$s" class="shortcode_wrapper %2$s">',
                    'after_shortcode' => '</div>'
                );
?>
                <div id="shortcode_generator_list">
    <?php
                do_action('tt_shortcode_generator', $args);
    ?>
            </div>
<?php
            }

            function default_shortcode_render($meta) {
?>
                <table>
    <?php
                if (isset($meta['options']) && $meta['options'] != "") {
                    $items = $meta['options'];
                    $args = "";
                    $count = 0;
                    foreach ($items as $item) { ?>
                        <tr class="postform <?php echo $meta['name']; if($meta['name'] == 'Columns')  echo $count;?> ">
                            <td class="s-title"><div class="code-desc"><?php echo $item['desc']; ?></div></td>
                <td class="s-element">
                    <div class="code-option"><select id="style_shortcode<?php echo $meta['name'] . $count; ?>" name="<?php echo $item['name']; ?>">
                    <?php
                        foreach ($item as $itemz) {
                            foreach ($itemz as $opt) {
                    ?>
                                <option value="<?php echo $opt; ?>"><?php echo $opt; ?></option>
                    <?php
                            }
                        } ?>
                    </select></div>
            </td></tr>
    <?php
                        $count++;
                    }
                }
    ?>
            </table>
<?php
            }
?>
