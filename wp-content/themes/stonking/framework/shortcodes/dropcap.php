<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'dropcap_shortcode_filter');
add_action('tt_shortcode_generator', 'dropcap_shortcode_generator');

function dropcap_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Dropcap', 'id' => 'dropcap');
    return $shortcodes;
}

function dropcap_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'dropcap', 'dropcap_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "dropcap",
    );
    default_shortcode_render($option);
?>
    <div>
        <div class="dropcap">
            <div class="dropcapContent">
                <fieldset>
                <div class="s-title"><label>Style</label></div>
				<div class="s-element"><select type="text" id="shortcode_dropcap_icon"><option>1</option><option>2</option></select></div>
                <div class="s-title"><label>Content</label></div>
				<div class="s-element"><input type="text" id="shortcode_dropcap_content" /></div>
                </fieldset>
            </div>
        </div>
    </div>
<p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_dropcap_shortcode()"></p>
    <script type="text/javascript">
        function insert_dropcap_shortcode(){            
            shortcod='[dropcap style="'+jQuery('#shortcode_dropcap_icon').val()+'"] '+jQuery('#shortcode_dropcap_content').val()+' [/dropcap]';
            send_to_editor(shortcod);
        }
    </script>    
<?php
    print $after_shortcode;
}
function dropcap_func($atts, $content = null) {
	$style=1;
	extract((array)$atts);
    $class = 'dropcap'.$style;
    return "<span class=\"" . $class . "\">" . do_shortcode($content) . "</span>";
}
add_shortcode('dropcap', 'dropcap_func');
?>
