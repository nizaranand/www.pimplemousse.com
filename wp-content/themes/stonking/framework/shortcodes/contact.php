<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'contact_shortcode_filter');
add_action('tt_shortcode_generator', 'contact_shortcode_generator');

function contact_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Contact', 'id' => 'contact');
    return $shortcodes;
}

function contact_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'contact', 'contact_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Contact",
    );
    default_shortcode_render($option);
?>
	<div class="s-title"><label>Receive email</label></div>
        <div class="s-element"><input type="text" id="style_shortcode_contact" /></div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_contact_shortcode();"></p>
    <script type="text/javascript">
        function insert_contact_shortcode(){
            item =" [contact email=\""+jQuery('#style_shortcode_contact').val()+"\"]";
            send_to_editor( item);
        }
    </script>
<?php
    print $after_shortcode;
}

function contact_func($atts, $content = null) {
    extract(shortcode_atts(array(
                'email' => '',
                    ), $atts));
    $out = contact_form($email);
    return $out;
}

add_shortcode('contact', 'contact_func');
?>