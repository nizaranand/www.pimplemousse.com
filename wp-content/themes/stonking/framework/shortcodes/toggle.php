<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'toggle_shortcode_filter');
add_action('tt_shortcode_generator', 'toggle_shortcode_generator');

function toggle_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Toggle tab', 'id' => 'toggle');
    return $shortcodes;
}

function toggle_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'toggle', 'columns_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Toggle",
        "options" => array(
            array("name" => "styles", "desc" => "Style", "options" => array('none', 'black', 'gray', 'white', 'orange', 'red', 'blue', 'rosy', 'green', 'pink'))
        ),
    );
    default_shortcode_render($option);
?>
    <div id="toggle_value">
        <div class="toggle">
            <div class="toggleContent">
                <fieldset>
                    <div class="s-title"><label>Title</label></div>
                    <div class="s-element"><input type="text" id="shortcode_toggle_title"></div>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><textarea id="shortcode_toggle_content" ></textarea></div>
                </fieldset>
            </div>
        </div>
    </div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_toggle_shortcode();"></p>
    <script type="text/javascript">

        function insert_toggle_shortcode(){
            item =" [toggle style=\""+jQuery('#style_shortcodeToggle0').val()+"\" title=\""+jQuery('#shortcode_toggle_title').val()+"\"]<br />";
            item += jQuery('#shortcode_toggle_content').val()+"<br />[/toggle]";
            send_to_editor( item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[accordion]
function toggle_func($atts, $content = null) {
    extract($atts);
    $content = str_replace("<br />", " ", $content);
    if ($style == 'none')
        $klass = 'toggle';
    else
        $klass = 'toggle-styled ' . $style;
    $html = "<div class=\"$klass\">";
    $html.= "<h5 class=\"toggle_title\">$title</h5>";
    $html.= "<div class=\"toggle_content\"><p>" . do_shortcode($content) . "</p></div></div>";
    return $html;
}

add_shortcode('toggle', 'toggle_func');

/*
  <div><a href="#">First header</a></div>
  <div>
  <p>Mauris ultricies. Nam feugiat egestas nulla. Donec augue dui, molestie sed, tristique sit amet, blandit eu, turpis. Mauris hendrerit, nisi et sodales tempor, orci tellus laoreet elit, sed molestie dui quam vitae dui.</p>
  </div>

 */
?>