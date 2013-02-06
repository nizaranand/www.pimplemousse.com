<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'button_shortcode_filter');
add_action('tt_shortcode_generator', 'button_shortcode_generator');

function button_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Button', 'id' => 'button');
    return $shortcodes;
}

function button_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'button', 'columns_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Button",
        "options" => array(
            array("name" => "buttoncolor", "desc" => "Choose button color", "options" => array('black', 'gray', 'white', 'orange', 'red', 'blue', 'rosy', 'green', 'pink')),
            array("name" => "buttonstyle", "desc" => "Choose button style", "options" => array('rectangle', 'rounded', 'medium', 'small')),
            array("name" => "target", "desc" => "Link target", "options" => array('self', 'blank', 'parent', 'top'))
        ),
    );
    default_shortcode_render($option);
?>
    <div class="s-title"><label>Content</label></div>
    <div class="s-element"><input type="text" id="shortcode_button_title" /></div>
    <div class="s-title"><label>Link</label></div>
    <div class="s-element"><input type="text" id="shortcode_button_link" /></div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_button_shortcode();"></p>
    <script type="text/javascript">

        function insert_button_shortcode(){
            item ="[button color=\""+jQuery('#style_shortcodeButton0').val()+"\" style=\""+jQuery('#style_shortcodeButton1').val()+"\" target=\""+jQuery('#style_shortcodeButton2').val()+"\" link=\""+jQuery('#shortcode_button_link').val()+"\"]";
            item += jQuery('#shortcode_button_title').val()+"[/button]";
            send_to_editor( item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[button]
function button_func($atts, $content = null) {
    extract($atts);
	$target = '';
    $content = str_replace("<br />", " ", $content);
    return "<a href=\"" . $link . "\" class=\"button " . $style . " " . $color . "\" target=\"_".$target."\">" . do_shortcode($content) . "</a>";
}

add_shortcode('button', 'button_func');
?>