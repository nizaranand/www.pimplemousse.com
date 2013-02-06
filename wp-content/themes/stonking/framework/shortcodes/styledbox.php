<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'styledbox_shortcode_filter');
add_action('tt_shortcode_generator', 'styledbox_shortcode_generator');

function styledbox_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Styled Box', 'id' => 'styledbox');
    return $shortcodes;
}

function styledbox_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'styledbox', 'styledbox_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Styledbox",
        "options" => array(array("name" => "styles", "desc" => "Choose your box style", "options" => array('black', 'gray', 'white', 'orange', 'red', 'blue', 'rosy', 'green', 'pink'))
        ),
    );
    default_shortcode_render($option);
?>
    <div>
        <div class="styledbox">
            <div class="styledboxContent">
                <fieldset>
                    <div class="s-title"><label>Title</label></div>
                    <div class="s-element"><input type="text" id="shortcode_styledbox_title" /></div>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><textarea id="shortcode_styledbox_content" ></textarea></div>
                </fieldset>
            </div>
        </div>
    </div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_styledbox_shortcode();"></p>
    <script type="text/javascript">
        function insert_styledbox_shortcode(){
            shortcod='[styledbox style="'+jQuery('#style_shortcodeStyledbox0').val()+'" title="'+jQuery('#shortcode_styledbox_title').val()+'"] '+jQuery('#shortcode_styledbox_content').val()+' [/styledbox]';
            send_to_editor( shortcod);
        }
    </script>
<?php
    print $after_shortcode;
}

function styledbox_func($atts, $content = null) {
    extract($atts);
    $content = str_replace("<br />", " ", $content);
    $html = "<div class=\"box\"><div class=\"box-header " . $style . "\"><h5>" . $title . "</h5></div>";
    $html.= "<div class=\"box-content " . $style . "\"><p>" . do_shortcode($content) . "</p></div></div>";
    return $html;
}

add_shortcode('styledbox', 'styledbox_func');
?>
