<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'code_shortcode_filter');
add_action('tt_shortcode_generator', 'code_shortcode_generator');

function code_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'code', 'id' => 'code');
    return $shortcodes;
}

function code_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'code', 'code_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "code",
    );
    default_shortcode_render($option);
?>
    <div>
        <div class="code">
            <div class="codeContent">
                <fieldset>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><textarea id="shortcode_code_content" ></textarea></div>
                </fieldset>
            </div>
        </div>
    </div>
<p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_code_shortcode()"></p>
    <script type="text/javascript">
        function insert_code_shortcode(){            
            shortcod='[code] '+jQuery('#shortcode_code_content').val()+' [/code]';
            send_to_editor(shortcod);
        }
    </script>    
<?php

    print $after_shortcode;
}
function code_func($atts, $content = null) {
    return "<code>" . $content . "</code>";
}

add_shortcode('code', 'code_func');
?>
