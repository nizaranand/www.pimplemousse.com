<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//if (is_admin ()) {
add_action('admin_init', 'tt_admin_default_scripts_init');
add_action('admin_print_scripts', 'tt_admin_default_scripts');

//add_action('admin_init', 'tt_admin_default_scripts_init');
//}

function tt_admin_default_scripts_init() {
    wp_register_script('admin-default', get_bloginfo('template_url') . '/framework/js/admin/default.js');
    wp_register_script('admin-default-options', get_bloginfo('template_url') . '/framework/js/admin/admin_options.js');
    wp_register_script('admin-font-uploader', get_bloginfo('template_url') . '/framework/js/admin/font_uploader_plugin.js');
    wp_register_script('admin-colorpicker', get_bloginfo('template_url') . '/framework/js/colorpicker.js');
    wp_register_script('tt-slider-script', get_bloginfo('template_url') . '/framework/js/jquery.slider-min.js');
    wp_register_script('tt-checkbox-iphonestyle', get_bloginfo('template_url') . '/framework/js/iphone-style-checkboxes.js');
    wp_register_script('tt-dynamic-count', get_bloginfo('template_url') . '/framework/js/admin/slide_image_plugin.js');
    wp_register_script('tt-dynamic-accordion', get_bloginfo('template_url') . '/framework/js/admin/dynamic_accordion.js');


    wp_register_style('tt-checkbox-iphonestyle', get_bloginfo('template_url') . '/framework/css/iphone-checkbox.css');
}

function tt_admin_default_scripts() {
    
}

?>
