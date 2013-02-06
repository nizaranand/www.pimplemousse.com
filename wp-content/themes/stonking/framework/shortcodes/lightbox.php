<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'lightbox_shortcode_filter');
add_action('tt_shortcode_generator', 'lightbox_shortcode_generator');

function lightbox_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Lightbox', 'id' => 'lightbox');
    return $shortcodes;
}

function lightbox_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'lightbox', 'lightbox_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Lightbox",
    );
    default_shortcode_render($option);
?>
	<div class="s-title"><label>lightbox url</label></div>
        <div class="s-element"><input type="text" id="style_shortcode_lightbox" /></div>
	<div class="s-title"><label>Content</label></div>
        <div class="s-element"><input type="text" id="style_shortcode_lightbox_content" /></div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_lightbox_shortcode();"></p>
    <script type="text/javascript">
       
        function insert_lightbox_shortcode(){
            item =" [lightbox link=\""+jQuery('#style_shortcode_lightbox').val()+"\"]"+jQuery('#style_shortcode_lightbox_content').val()+"[/lightbox]";
            send_to_editor(item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[accordion]
function lightbox_func($atts, $content = null) {
    extract($atts);
    return "<span class='zoom'><a rel='prettyPhoto' title='' href=\"" . $link . "\">" . do_shortcode($content) . "</a></span>";
}

add_shortcode('lightbox', 'lightbox_func');

/*
  <div><a href="#">First header</a></div>
  <div>
  <p>Mauris ultricies. Nam feugiat egestas nulla. Donec augue dui, molestie sed, tristique sit amet, blandit eu, turpis. Mauris hendrerit, nisi et sodales tempor, orci tellus laoreet elit, sed molestie dui quam vitae dui.</p>
  </div>

 */

?>