<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_action('tt_admin_init', 'stonking_color_option_init');
global $st_color_option1, $st_color_option2, $st_color_option3, $shortname, $st_color_option4;
$st_color_option1 = Array(
    'title' => 'Backgrounds',
    'name' => $shortname . '_color_backgrounds',
    'function' => $shortname . '_color_options_tab1',
    'items' => Array(
//        array(
//            "name" => "Default color scheme",
//            "desc" => "Choose site color from predefined skin",
//            "id" => $shortname . "_color_schema",
//            "options" => array('Custom', 'Black', 'Gray', 'Purple', 'Pink', 'Red', 'Light Green', 'Brown', 'Orange', 'Yellow', 'Dark Red', 'Green', 'Candy Pink', 'Ocean Blue', 'Business Blue', 'Blue'),
//            "std" => "Black",
//            "type" => "select"),
        array(
            "name" => "Pattern",
            "desc" => "Choose site background pattern",
            "id" => $shortname . "_color_pattern",
            "options" => array('pat1', 'pat2', 'pat3', 'pat4', 'pat5', 'pat6', 'pat7', 'pat8', 'pat9', 'pat10', 'pat11', 'pat12', 'pat13', 'pat14', 'pat15', 'pat16', 'pat17', 'pat18', 'pat19', 'pat20', 'pat21', 'pat22', 'pat23', 'pat24'),
            "std" => "pat3",
            "type" => "patternselect"),
        array(
            "name" => "Body background color",
            "desc" => "Pick your favourite color on body area area.",
            "id" => $shortname . "_color_bg",
            "std" => "#FFFFFF",
            "type" => "color"),
        array(
            "name" => "Background color of Main content",
            "desc" => "Pick your favourite color on Main content area.",
            "id" => $shortname . "_color_mainbg",
            "std" => "#FFFFFF",
            "type" => "color"),
        array(
            "name" => "Background color of Sidebar",
            "desc" => "Pick your favourite color on Sidebar area.",
            "id" => $shortname . "_color_sidebarbg",
            "std" => "#FFFFFF",
            "type" => "color"),
    )
);
$st_color_option2 = Array(
    'title' => 'Left area',
    'name' => $shortname . '_color_header',
    'function' => $shortname . '_color_options_tab2',
    'items' => Array(
        array(
            "name" => "Logo text color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_logotext",
            "std" => "#000000",
            "type" => "color"),
        array(
            "name" => "Logo description color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_logodesc",
            "std" => "#000000",
            "type" => "color"),
//Top menu
        array(
            "name" => "Top level menu color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_menu",
            "std" => "#000000",
            "type" => "color"),
        array(
            "name" => "Top level menu hover color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_menuhover",
            "std" => "#666666",
            "type" => "color"),
/*        array(
            "name" => "Top level menu hover background color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_menuhoverbg",
            "std" => "transparent",
            "type" => "color"),*/
        array(
            "name" => "Top level menu current color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_menucurrent",
            "std" => "#999999",
            "type" => "color"),
//Sub menu
        array(
            "name" => "Sub level Menu color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_submenu",
            "std" => "#FFFFFF",
            "type" => "color"),
        array(
            "name" => "Sub level Menu hover color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_submenuhover",
            "std" => "#FFFFFF",
            "type" => "color"),
        array(
            "name" => "Sub level menu background",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_submenubg",
            "std" => "#000000",
            "type" => "color"),
        array(
            "name" => "Sub level menu hover bg",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_submenubghover",
            "std" => "#191919",
            "type" => "color"),
//Portfolio menu
        array(
            "name" => "Portfolio filter Menu text color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_portmenu",
            "std" => "#999999",
            "type" => "color"),
        array(
            "name" => "Portfolio filter Menu hover color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_portmenuhover",
            "std" => "#333333",
            "type" => "color"),
/*        array(
            "name" => "Portfolio filter menu background",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_portmenubg",
            "std" => "#FFFFFF",
            "type" => "color"),
        array(
            "name" => "Portfolio filter menu hover bg",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_portmenubghover",
            "std" => "#FFFFFF",
            "type" => "color"), */
        array(
            "name" => "Copyright text",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_copyright",
            "std" => "#666666",
            "type" => "color")
    )
);
$st_color_option3 = array(
    'title' => 'Content',
    'name' => $shortname . '_color_content',
    'function' => $shortname . '_color_options_tab3',
    'items' => Array(
/*        array(
            "name" => "Breadcrumbs Text color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_breadcrumb",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "Breadcrumbs Link color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_breadcrumblink",
            "std" => "#00AEFF",
            "type" => "color"),
        array(
            "name" => "Breadcrumbs Link hover color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_breadcrumblinkhover",
            "std" => "#00AEFF",
            "type" => "color"),*/
        array(
            "name" => "Title color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_pagetitle",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "Text color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_pagetext",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "Teaser text color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_teasertext",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "H1 color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_h1",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "H2 color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_h2",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "H3 color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_h3",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "H4 color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_h4",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "H5 color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_h5",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "H6 color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_h6",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "Link color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_pagelink",
            "std" => "#999999",
            "type" => "color"),
        array(
            "name" => "Link hover color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_pagelinkhover",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "Post meta text color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_postmeta",
            "std" => "#999999",
            "type" => "color"),
        array(
            "name" => "Post meta date text color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_postmetadate",
            "std" => "#999999",
            "type" => "color"),
        array(
            "name" => "Read more link color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_readmorelink",
            "std" => "#999999",
            "type" => "color"),
        array(
            "name" => "Read more link hover color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_readmorelinkhover",
            "std" => "#666666",
            "type" => "color")
    )
);

$st_color_option4 = Array(
    'title' => 'Sidebar',
    'name' => $shortname . '_color_sidebar',
    'function' => $shortname . 'color_options_tab4',
    'items' => Array(
        array(
            "name" => "Title color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_sidebartitle",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "Text color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_sidebartext",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "Link color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_sidebarlink",
            "std" => "#666666",
            "type" => "color"),
        array(
            "name" => "Link hover color",
            "desc" => "Pick your favourite color.",
            "id" => $shortname . "_color_sidebarlinkhover",
            "std" => "#999999",
            "type" => "color")
    )
);
add_filter('tt_option_load', 'stonking_color_option_load');

function stonking_color_option_load($filtered_options) {
    global $themename, $shortname, $st_color_option1, $tt_admin_options, $st_color_option2, $st_color_option3, $st_color_option4;
    return array_merge($filtered_options, $st_color_option1['items'], $st_color_option2['items'], $st_color_option3['items'], $st_color_option4['items']);
}

function stonking_color_option_init() {
    global $themename, $shortname, $st_color_option1, $tt_admin_options, $st_color_option2, $st_color_option3, $st_color_option4;
    $color_options = Array('page_title' => 'Color options', 'option_icon' => 'icon32-color-options', 'option_items' => Array('color_options1' => $st_color_option1, 'color_options2' => $st_color_option2, 'color_options3' => $st_color_option3, 'color_options4' => $st_color_option4));
    $tt_admin_options['themeton_stonking_color_options'] = $color_options;
}

?>
