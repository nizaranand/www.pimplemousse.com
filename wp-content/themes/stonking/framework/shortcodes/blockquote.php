<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'blockquote_shortcode_filter');
add_action('tt_shortcode_generator', 'blockquote_shortcode_generator');

function blockquote_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Blockquote', 'id' => 'blockquote');
    return $shortcodes;
}

function blockquote_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'blockquote', 'blockquote_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "blockquote",
    );
    default_shortcode_render($option);
?>
    <div>
        <div class="blockquote">
            <div class="blockquoteContent">
                <fieldset>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><textarea id="shortcode_blockquote_content" ></textarea></div>
                </fieldset>
            </div>
        </div>
    </div>
<p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_blockquote_shortcode()"></p>
    <script type="text/javascript">
        function insert_blockquote_shortcode(){            
            shortcod='[blockquote] '+jQuery('#shortcode_blockquote_content').val()+' [/blockquote]';
            send_to_editor(shortcod);
        }
    </script>    
<?php

    print $after_shortcode;
}
function blockquote_func($atts, $content = null) {
    $class = 'quote-text';
    return "<span class=\"" . $class . "\">" . do_shortcode($content) . "</span>";
}

add_shortcode('blockquote', 'blockquote_func');
?>
