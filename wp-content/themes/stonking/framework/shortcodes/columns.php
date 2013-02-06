<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'columns_shortcode_filter');
add_action('tt_shortcode_generator', 'columns_shortcode_generator');

function columns_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Columns', 'id' => 'columns');
    return $shortcodes;
}

function columns_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'columns', 'columns_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Columns",
        "options" => array(array("name" => "type", "desc" => "Choose column type", "options" => array('1/2', '1/3', '2/3', '1/4', '3/4')),
							array("name" => "last", "desc" => "Is this last column ?", "options" => array('no', 'yes')),
        ),
    );
    default_shortcode_render($option);
?>
    <div class="s-title"><label>Content</label></div>    
    <div class="s-element"><textarea id="shortcode_column_content" ></textarea></div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_columns_shortcode()"></p>
    <script type="text/javascript">
        function insert_columns_shortcode(){
			shortcod='[columns type="'+jQuery('#style_shortcodeColumns0').val()+'" last="'+jQuery('#style_shortcodeColumns1').val()+'"]'+jQuery('#shortcode_column_content').val()+'[/columns]';
            send_to_editor( shortcod);
        }
    </script>
<?php
    print $after_shortcode;
}

function columns_func($atts, $content = null) {
	$last = '';
    extract($atts);
    $content = str_replace("<br />", "", $content);
	switch ($type) {
		case "1/2": $class = "col_1_2";
			break;
		case "1/3": $class = "col_1_3";
			break;
		case "2/3": $class = "col_2_3";
			break;
		case "1/4": $class = "col_1_4";
			break;
		case "3/4": $class = "col_3_4";
			break;
		default: $class = "col_1_2";
			break;
	}
	if ($last == "yes")
		$class = $class.' last';
    return "<div class=\"" . $class . "\">" . do_shortcode($content) . "</div>";
}

add_shortcode('columns', 'columns_func');
?>
