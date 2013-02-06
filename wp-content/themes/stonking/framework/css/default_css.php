<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//if (is_admin ()) {
add_action('admin_init', 'tt_admin_default_css_init');
add_action('admin_print_scripts', 'tt_admin_default_css');

//add_action('admin_init', 'tt_admin_default_scripts_init');
//}

function tt_admin_default_css_init() {
    wp_register_script('admin-colorpicker', get_bloginfo('template_url') . '/framework/css/colorpicker.css');
    
}

function tt_admin_default_css() {

}

?>
