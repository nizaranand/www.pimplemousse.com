<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_action('tt_admin_init', 'stonking_font_option_init');
global $st_font_option1, $st_font_option2, $st_font_option3,$shortname;
$st_font_option1 = Array(
    'title' => 'General',
    'name' => $shortname . '_font_general',
    'function' => $shortname . '_font_tab1',
    'items' => Array(
        array(
            "name" => "General font",
            "desc" => "These fonts are included both of MS and Mac OS.",
            "id" => $shortname . "_font_default",
            "options" => array('Andale Mono', 'Arial', 'Arial Black', 'Comic Sans MS', 'Verdana', 'Courier New', 'Tahoma', 'Times New Roman', 'Lucida', 'Symbol', 'Impact', 'Trebuchet MS', 'Webdings'),
            "std" => "Arial",
            "type" => "select"),
        array(
            "name" => "Cufon on/off",
            "desc" => "",
            "id" => $shortname . "_font_cufon",
            "std" => "false",
            "type" => "checkbox"),
        array(
            "name" => "Line height",
            "desc" => "Please set the line height of the whole site.",
            "id" => $shortname . "_fontsize_lineheight",
            "std" => "18",
            "type" => "font_size"),
        array(
            "name" => "Link underline",
            "desc" => "Please select link type.",
            "id" => $shortname . "_font_linkunderline",
            "options" => array("blink", "inherit", "line-through", "none", "overline", "underline"),
            "std" => "none",
            "type" => "select")
    )
);
$st_font_option2 = Array(
    'title' => 'Custom cufon fonts',
    'name' => $shortname . '_custom_cufons',
    'function' => $shortname . 'font_options_tab2',
    'reset'=>'none',
    'items' => Array(
        array(
            'custom_save'=>'tt_custom_cufon_save',
            "name" => "Another fonts",
            "desc" => "If yes, <span style='color:red'>logo will</span> be show your selected logo image.",
            "id" => $shortname . "_custom_fonts",
            "std" => "false",
            "font" => 'Andika Basic',
            "fnt_url" => get_template_directory_uri() . "/fonts/Andika_Basic_400.font.js",
            "type" => "custom_fonts"))
);
$st_font_option3 = array(
    'title' => 'Font sizes',
    'name' => $shortname . 'font_sizes',
    'function' => $shortname . 'font_options_tab3',
    'items' => Array(
        array(
            "name" => "Logo text",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_logo",
            "std" => "30",
            "type" => "font_size"),
        array(
            "name" => "Logo description",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_logodesc",
            "std" => "14",
            "type" => "font_size"),
        array(
            "name" => "Top level menu text",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_menu",
            "std" => "14",
            "type" => "font_size"),
        array(
            "name" => "Sub level menu text",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_submenu",
            "std" => "11",
            "type" => "font_size"),
        array(
            "name" => "Portfolio filter",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_portfilter",
            "std" => "12",
            "type" => "font_size"),
        array(
            "name" => "Teaser text",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_teaser",
            "std" => "12",
            "type" => "font_size"),
        array(
            "name" => "Text",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_pagetext",
            "std" => "12",
            "type" => "font_size"),
        array(
            "name" => "Article title size",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_articletitle",
            "std" => "14",
            "type" => "font_size"),
        array(
            "name" => "Post meta",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_postmeta",
            "std" => "10",
            "type" => "font_size"),
        array(
            "name" => "H1",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_h1",
            "std" => "38",
            "type" => "font_size"),
        array(
            "name" => "H2",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_h2",
            "std" => "30",
            "type" => "font_size"),
        array(
            "name" => "H3",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_h3",
            "std" => "26",
            "type" => "font_size"),
        array(
            "name" => "H4",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_h4",
            "std" => "22",
            "type" => "font_size"),
        array(
            "name" => "H5",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_h5",
            "std" => "20",
            "type" => "font_size"),
        array(
            "name" => "H6",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_h6",
            "std" => "16",
            "type" => "font_size"),
        array(
            "name" => "Sidebar title",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_sidebartitle",
            "std" => "14",
            "type" => "font_size"),
        array(
            "name" => "Sidebar text",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_sidebartext",
            "std" => "12",
            "type" => "font_size"),
        array(
            "name" => "Copyright text",
            "desc" => "Please, set the text size.",
            "id" => $shortname . "_fontsize_copyright",
            "std" => "12",
            "type" => "font_size"),
    )
);
global $st_font_option4;
$st_font_option4 = Array(
    'title' => 'Cufon font types',
    'name' => $shortname . 'cufon_types',
    'function' => $shortname . 'font_options_tab4',
    'items' => Array(
        array(
            "name" => "Logo text",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_logo",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
        array(
            "name" => "Logo description",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_logodesc",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
        array(
            "name" => "Top level menu text",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_menu",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
//        array(
//            "name" => "Sub level menu text",
//            "desc" => "Please, set the font type.",
//            "id" => $shortname . "_fonttype_submenu",
//            "std" => "Greyscale Basic",
//            "type" => "font_type"),
        array(
            "name" => "Teaser text",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_teaser",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
//        array(
//            "name" => "Text",
//            "desc" => "Please, set the font type.",
//            "id" => $shortname . "_fonttype_pagetext",
//            "std" => "Greyscale Basic",
//            "type" => "font_type"),
        array(
            "name" => "Article title",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_articletitle",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
//        array(
//            "name" => "Article footer titles",
//            "desc" => "Please, set the font type.",
//            "id" => $shortname . "_fonttype_articlefootertitle",
//            "std" => "Greyscale Basic",
//            "type" => "font_type"),
        array(
            "name" => "H1",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_h1",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
        array(
            "name" => "H2",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_h2",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
        array(
            "name" => "H3",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_h3",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
        array(
            "name" => "H4",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_h4",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
        array(
            "name" => "H5",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_h5",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
        array(
            "name" => "H6",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_h6",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
//        array(
//            "name" => "Post meta text",
//            "desc" => "Please, set the font type.",
//            "id" => $shortname . "_fonttype_postmeta",
//            "std" => "Greyscale Basic",
//            "type" => "font_type"),
        array(
            "name" => "Sidebar title",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_sidebartitle",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
//        array(
//            "name" => "Sidebar text",
//            "desc" => "Please, set the font type.",
//            "id" => $shortname . "_fonttype_sidebartext",
//            "std" => "Greyscale Basic",
//            "type" => "font_type"),
        array(
            "name" => "Footer title",
            "desc" => "Please, set the font type.",
            "id" => $shortname . "_fonttype_footertitle",
            "std" => "Greyscale Basic",
            "type" => "font_type"),
//        array(
//            "name" => "Footer text",
//            "desc" => "Please, set the font type.",
//            "id" => $shortname . "_fonttype_footertext",
//            "std" => "Greyscale Basic",
//            "type" => "font_type"),
//        array(
//            "name" => "Copyright text",
//            "desc" => "Please, set the font type.",
//            "id" => $shortname . "_fonttype_copyright",
//            "std" => "Greyscale Basic",
//            "type" => "font_type"),
//        array(
//            "name" => "Footer menu text",
//            "desc" => "Please, set the font type.",
//            "id" => $shortname . "_fonttype_footermenu",
//            "std" => "Greyscale Basic",
//            "type" => "font_type"),
        array(
            "name" => "Other cufon elements",
            "desc" => "Read more, Date of post meta, Dropcap and navigation of slider shortcode ... ",
            "id" => $shortname . "_fonttype_others",
            "std" => "Greyscale Basic",
            "type" => "font_type")
    )
);
add_filter('tt_option_load', 'stonking_font_option_load');

function stonking_font_option_load($filtered_options) {
    global $st_font_option1, $st_font_option2,$st_font_option3,$st_font_option4;
    return array_merge($filtered_options, $st_font_option1['items'], $st_font_option2['items'], $st_font_option3['items'], $st_font_option4['items']);
}
function stonking_font_option_init() {
    global $themename, $shortname, $st_font_option1, $tt_admin_options, $st_font_option2, $st_font_option3, $st_font_option4;
    $font_options = Array('page_title' => 'Font options', 'option_icon' => 'icon32-color-options', 'option_items' => Array('font_options1' => $st_font_option1,'font_options2' => $st_font_option2, 'font_options3' => $st_font_option3, 'font_options4' => $st_font_option4));
    $tt_admin_options['themeton_stonking_font_options'] = $font_options;
}

?>
