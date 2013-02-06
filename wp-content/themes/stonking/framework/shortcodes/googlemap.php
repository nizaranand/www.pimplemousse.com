<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'map_shortcode_filter');
add_action('tt_shortcode_generator', 'map_shortcode_generator');

function map_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'GoogleMap', 'id' => 'map', 'desc' => 'You need to put here embed code of google maps. <a href="http://maps.google.com" target="_blank">Google map</a>');
    return $shortcodes;
}
function map_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'map', 'map_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "GoogleMap",
    );
    default_shortcode_render($option);
?>
	<div class="s-title"><label>Map embed</label></div>
        <div class="s-element"><textarea id="style_shortcode_map" ></textarea></div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_map_shortcode();"></p>
    <script type="text/javascript">
       
        function insert_map_shortcode(){					
			var str = jQuery('#style_shortcode_map').val();
			item = str.replace("<iframe ", "[map ");
			item = item.replace("></iframe>", "][/map]");
			item = '[GoogleMap]'+item+'[/GoogleMap]';
            send_to_editor( item);
        }
    </script>
<?php
    print $after_shortcode;
}
//[accordion]
function map_func($atts, $content = null) {
	$content = str_replace("[map ", "<iframe ", $content);
	$content = str_replace("][/map]", "></iframe>", $content);
    return "<div class=\"border\">".$content."</div>";
}
add_shortcode('GoogleMap', 'map_func');
?>