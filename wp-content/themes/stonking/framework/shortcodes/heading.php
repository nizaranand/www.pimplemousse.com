<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'heading_shortcode_filter');
add_action('tt_shortcode_generator', 'heading_shortcode_generator');

function heading_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Heading', 'id' => 'heading');
    return $shortcodes;
}

function heading_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'heading', 'heading_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Heading",
        "options" => array(array("name" => "tabscount", "desc" => "Choose tab count", "options" => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')),
        ),
    );
    default_shortcode_render($option);
?>
    <div>
        <div class="heading">
            <div class="headingContent">
                <fieldset>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><input type="text" id="shortcode_heading_content" /></div>
                </fieldset>
            </div>
        </div>
    </div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_heading_shortcode()"></p>
    <script type="text/javascript">
        function insert_heading_shortcode(){
            shortcod='[heading type="'+jQuery('#style_shortcodeHeading0').val()+'"] '+jQuery('#shortcode_heading_content').val()+' [/heading]';
            send_to_editor( shortcod);
        }
    </script>
<?php
    print $after_shortcode;
}

function heading_func($atts, $content = null) {
    extract($atts);
    return "<" . $type . ">" . do_shortcode($content) . "</" . $type . ">";
}

add_shortcode('heading', 'heading_func');
?>
