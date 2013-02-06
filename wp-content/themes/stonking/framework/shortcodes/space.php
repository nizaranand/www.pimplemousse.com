<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'space_shortcode_filter');
add_action('tt_shortcode_generator', 'space_shortcode_generator');

function space_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Space', 'id' => 'space');
    return $shortcodes;
}

function space_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'space', 'space_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Space",
    );
    default_shortcode_render($option);
?>
    <div class="s-title"><label>Space height by pixels</label></div>
    <div class="s-element"><input type="text" id="style_shortcode_space" /></div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_space_shortcode();"></p>
    <script type="text/javascript">

        function insert_space_shortcode(){
            item =" [space height=\""+jQuery('#style_shortcode_space').val()+"\"]";
            send_to_editor( item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[accordion]
function space_func($atts, $content = null) {
    extract($atts);
    return "<div style=\"margin-top:" . $height . "px;\"></div>";
}

add_shortcode('space', 'space_func');

/*
  <div><a href="#">First header</a></div>
  <div>
  <p>Mauris ultricies. Nam feugiat egestas nulla. Donec augue dui, molestie sed, tristique sit amet, blandit eu, turpis. Mauris hendrerit, nisi et sodales tempor, orci tellus laoreet elit, sed molestie dui quam vitae dui.</p>
  </div>

 */
?>