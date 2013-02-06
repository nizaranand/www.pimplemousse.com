<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'seperator_shortcode_filter');
add_action('tt_shortcode_generator', 'seperator_shortcode_generator');

function seperator_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Seperator', 'id' => 'seperator');
    return $shortcodes;
}

function seperator_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'seperator', 'seperator_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Seperator",
        "options" => array(array("name" => "seperator", "desc" => "Seperator width", "options" => array('simple', 'top')),
        ),
    );
    default_shortcode_render($option);
?>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_seperator_shortcode();"></p>
    <script type="text/javascript">
        function insert_seperator_shortcode(){
            item =" [seperator type=\""+jQuery('#style_shortcodeSeperator0').val()+"\"]";
            send_to_editor( item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[accordion]
function seperator_func($atts, $content = null) {
    extract($atts);
	$hr = "<hr />";
	if($type=='top')
		$hr='<div class="hr"><a class="anchorLink" href="#top">'.get_the_option("stonking_trans_toptext").'</a></div>';
	return $hr;
}

add_shortcode('seperator', 'seperator_func');

/*
  <div><a href="#">First header</a></div>
  <div>
  <p>Mauris ultricies. Nam feugiat egestas nulla. Donec augue dui, molestie sed, tristique sit amet, blandit eu, turpis. Mauris hendrerit, nisi et sodales tempor, orci tellus laoreet elit, sed molestie dui quam vitae dui.</p>
  </div>

 */

?>