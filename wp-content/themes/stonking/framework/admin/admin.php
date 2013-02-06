<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
global $tt_admin_options;
$tt_admin_options = Array();

class wp_tt_admin {

    var $myFramework;

    function init() {

        require_once TEMPLATEPATH . '/framework/admin/admin_options.php';
        require_once TEMPLATEPATH . '/framework/js/admin/default_scripts.php';
        require_once TEMPLATEPATH . '/framework/includes/admin/post_format.php';
        require_once TEMPLATEPATH . '/framework/includes/metaboxes/slide_meta.php';
		require_once TEMPLATEPATH . '/framework/includes/metaboxes/head_slide_meta.php';
        require_once TEMPLATEPATH . '/framework/includes/metaboxes/default_meta_boxes.php';
        //print 'sdfsdf';
        add_action('admin_menu', array(&$this, 'admin_menu'));
        if (isset($_REQUEST['page'])) {
            //  print 'eee';
            $pp = $_REQUEST['page'];
            // print $pp;
            if (strpos($pp, 'themeton_') !== false) {
                // $this->adminScripts();

                add_action('admin_print_scripts', array(&$this, 'adminOptionScripts'));
                add_action('admin_print_styles', array(&$this, 'adminOptionStyles'));
            }
        }
        wp_register_style('tt_slider', get_template_directory_uri() . '/framework/css/slider/jslider.css');
        wp_register_style('tt_admin_style', get_template_directory_uri() . '/framework/css/admin/style.css');
        add_action('admin_print_styles', array(&$this, 'adminStyles'));
        add_action('admin_print_scripts', array(&$this, 'adminScripts'));
        add_action('wp_ajax_tt_admin_options_save', array(&$this, 'saveOptions'));
        add_action('wp_ajax_tt_admin_options_reset', array(&$this, 'resetOptions'));
        do_action('tt_admin_init');
		$pageSlide=new TTHeadSlideMetaBox();
		$pageSlideOptions=Array(
			'name' => 'Full width slide',
        'id' => 'full_meta_box1',
        'type' => 'page',
        'crop' => false
		);
		$pageSlide->construct($pageSlideOptions);
    }

    function addSlideMeta($options) {
        $post_meta = new TTSlideMetaBox();
        $post_meta->construct($options);
    }

    function addMeta($options) {
        $defaultMeta = new XacDefaultMetabox();
        $defaultMeta->construct($options);
    }

    function admin_menu($icon_url=null) {
        global $themename, $shortname, $tt_admin_options;
        $icon_url = get_template_directory_uri() . '/framework/images/settings.png';
        add_menu_page($themename . " Options", //page title
                $themename . " Options", //menu title
                'manage_options', //capability
                'themeton_' . $shortname . '_options', //slug
                array(&$this, 'adminOptionsView'), //function
                $icon_url, //icon url
                100
        );
        foreach ($tt_admin_options as $key => $val) {
            add_submenu_page('themeton_' . $shortname . '_options', //parent_slug
                    $val['page_title'], //page title
                    $val['page_title'], //menu title
                    'manage_options', //capability
                    $key, //menu_slug
                    array(&$this, 'adminOptionsView')//function
            );
        }
    }

    function adminOptionsView() {
        global $tt_admin_options;
        if ($tt_admin_options[$_REQUEST['page']])
            tt_theme_options_render($tt_admin_options[$_REQUEST['page']], 'title');
    }

    function adminStyles() {
        wp_enqueue_style('tt_slider');
        wp_enqueue_style('jcrop');
        wp_enqueue_style('tt-checkbox-iphonestyle');
        wp_enqueue_style('tt_admin_style');
    }

    function adminScripts() {
        wp_enqueue_script('tt-slider-script');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('tt-checkbox-iphonestyle');
        wp_enqueue_script('tt-dynamic-count');
        wp_enqueue_script('jcrop');
        wp_enqueue_script('tt-dynamic-accordion');
        wp_enqueue_script('admin-default');
    }

    function adminOptionScripts() {
        wp_enqueue_script('theme-colorpicker');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('admin-font-uploader');
        wp_enqueue_script('admin-default-options');
    }

    function adminOptionStyles() {
        wp_enqueue_style('theme-colorpicker');
        wp_enqueue_style('thickbox');
    }

    function saveOptions() {
        $array = Array();
        global $tt_admin_options;
        $options = $tt_admin_options[$_REQUEST['themeton_admin_page']]['option_items'][$_REQUEST['themeton_admin_tab']];
        foreach ($options['items'] as $option) {
            if (isset($option['custom_save'] ) && function_exists($option['custom_save'])) {
                $this->myFramework->setOption($option['id'], call_user_func($option['custom_save'], $option));
            } else
            if ($option['type'] == 'checkbox') {
                if (isset($_REQUEST[$option['id']])) {
                    $this->myFramework->setOption($option['id'], 'true');
                } else {
                    $this->myFramework->setOption($option['id'], 'false');
                }
            } else {
                if (isset($_REQUEST[$option['id']])) {
                    $val = $_REQUEST[$option['id']];
                    $this->myFramework->setOption($option['id'], $val);
                }
            }
        }
        $this->myFramework->saveOption();
        save_custom_style();
        die('1');
    }

    function resetOptions() {
        global $tt_admin_options;
        $options = $tt_admin_options[$_REQUEST['tt_admin_reset_page']]['option_items'][$_REQUEST['tt_admin_reset_tab']];
        // print_r($options);
        foreach ($options['items'] as $option) {
            $this->myFramework->setOption($option['id'], $option['std']);
        }
        $this->myFramework->saveOption();
        tt_theme_options_after_reset($options, $_REQUEST['tt_admin_reset_page'], $_REQUEST['tt_admin_reset_tab']);
        save_custom_style();
		die;
    }

    function init_more($more_init) {

    }

}

function tt_custom_cufon_save($option) {
    $defaultCustomFonts = Array(
        'count' => '0',
        'fonts' => ''
    );
    if ($_POST['custom_fonts_count'] != '0') {
        $fnts = Array();
        for ($i = 0; $i < intval($_POST['custom_fonts_count']); $i++) {
            if ($_POST['custom_cufon'][$i]['name'] != '' && $_POST['custom_cufon'][$i]['file'] != '') {
                $fnt = Array(
                    'name' => $_POST['custom_cufon'][$i]['name'],
                    'file' => $_POST['custom_cufon'][$i]['file']
                );
                $fnts[] = $fnt;
            }
        }
        $defaultCustomFonts['fonts'] = $fnts;
    } else {
        $defaultCustomFonts['count'] = '0';
    }
    update_option('custom_cufon_fonts', $defaultCustomFonts);
}

add_action('wp_ajax_theme_data_export', 'export_theme_options');

function export_theme_options() {
    global $tt_framework, $shortname;
    get_the_option('');

    $eol = "\r\n";
    $string = "/**SERIALIZED DATA, DO NOT HAND EDIT!**$eol";
    $string .= "Web site: " . home_url() . $eol;
    $string .= "Web site name: " . get_option('blogname') . $eol;
    $string .= "Backup date: " . date_i18n(get_option('date_format') . ' ' . get_option('time_format'), time()) . "$eol*/$eol";
    $string .= "@@@@SPLIT@@@@";
    $skin = '';
    
    $string.=serialize($tt_framework->themeOptions);
    echo $string;
    //print_r($backUpArray);
    die;
}

add_action('wp_ajax_theme_data_import', 'import_theme_options');

function import_theme_options() {
    global $shortname,$tt_framework;
    $val = $_REQUEST['import_values'];
    if ($val != '') {
        //$val=str_replace("\r\n", '',$val);
        $codes = split("@@@@SPLIT@@@@", $val);
        $vals = $codes[count($codes) - 1];
        // ini_set('unserialize_callback_func', 'ddddoooo');
        $kk = unserialize(stripslashes($vals));
        if ($kk) {
            $tt_framework->themeOptions=$kk;
            $tt_framework->saveOption();
            die('complete');
        }
        //$kk=false;

        die('error');
    }
    die('error');
}

?>
