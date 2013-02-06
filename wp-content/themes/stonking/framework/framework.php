<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class wp_tt_framework {

    var $admin = null;
    var $themeOptions;
    var $optionInited = false;

    function init() {
        $this->admin();
        require_once TEMPLATEPATH . '/framework/shortcodes/shortcode.php';
        require_once TEMPLATEPATH . '/framework/widgets/resent_posts_widget.php';
        require_once TEMPLATEPATH . '/framework/widgets/widget_custom_options.php';
		require_once TEMPLATEPATH . '/framework/widgets/social_links_widget.php';
        add_action('init', array(&$this, 'scriptAndStyles'));
    }

    function scriptAndStyles() {
        wp_register_script('cufon-yui', get_bloginfo('template_url') . '/framework/js/cufon-yui.js');
        wp_register_script('theme-colorpicker', get_bloginfo('template_url') . '/framework/js/colorpicker.js');


        wp_register_style('theme-colorpicker', get_bloginfo('template_url') . '/framework/css/colorpicker.css');
    }

    function usePostType($type) {
        require_once TEMPLATEPATH . '/framework/post_types/' . $type . '.php';
    }

    function getOption($optionName) {
        global $shortname;
        if (!$this->optionInited) {
            $theme_standard_options = Array();
            $this->themeOptions = Array();
            $theme_standard_options = apply_filters('tt_option_load', $theme_standard_options);
            foreach ($theme_standard_options as $theme_standard_option) {
                $this->themeOptions[$theme_standard_option['id']] = $theme_standard_option['std'];
            }
            $this->themeOptions = array_merge($this->themeOptions, (array) get_option('themeton_' . $shortname . '_options'));
            $this->optionInited = true;
        }
        return $this->themeOptions[$optionName];
    }

    function setOption($optionName, $value) {
        if (!$this->optionInited) {
            $this->getOption('');
        }
        $this->themeOptions[$optionName] = $value;
    }

    function saveOption() {
        global $shortname;
        update_option('themeton_' . $shortname . '_options', $this->themeOptions);
        do_action('tt_admin_option_changed');
    }

    function admin() {
        if (is_admin ()) {
            require_once TEMPLATEPATH . '/framework/admin/admin.php';
            $this->admin = new wp_tt_admin();
            $this->admin->init();
            $this->admin->myFramework = &$this;
        }
    }

}

function get_the_option($name = null, $std = null) {
    global $tt_framework;
    if ($name != NULL) {
        return $tt_framework->getOption($name);
    }
    return 10;
}

?>
