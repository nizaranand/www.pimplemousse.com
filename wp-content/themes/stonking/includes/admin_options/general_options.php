<?php
add_action('tt_admin_init', 'stonking_general_option_init');
global $st_general_option1, $st_general_option2;
$st_general_option1=Array(
    'title'=>'General options',
    'name' => $shortname . '_general_options',
    'function' => $shortname.'_general_options_tab1',
    'items' => Array(
        array(
            "name" => "Logo image",
            "desc" => "If yes, logo will be show your selected logo image.",
            "id" => $shortname . "_logo_show",
            "std" => "false",
            "type" => "checkbox"),
        array(
            "name" => "Logo image",
            "desc" => "Include your logo image.",
            "id" => $shortname . "_logo_image",
            "std" => get_template_directory_uri(). "/images/logo.png",
            "type" => "file"),
        array(
            "name" => "Logo width",
            "desc" => "Set your logo width.",
            "id" => $shortname . "_logo_width",
            "std" => "150",
            "type" => "size"),
        array(
            "name" => "Logo height",
            "desc" => "Set your logo height. Remember, much appriciate value is a lower than header height.",
            "id" => $shortname . "_logo_height",
            "std" => "120",
            "type" => "size"),
        array(
            "name" => "Logo text",
            "desc" => "Enter your logo text.",
            "id" => $shortname . "_logo_text",
            "std" => "stonking",
            "type" => "text"),
        array(
            "name" => "Site description",
            "desc" => "Do you wanna use site description?",
            "id" => $shortname . "_site_desc",
            "std" => "false",
            "type" => "checkbox"),
        array(
            "name" => "Site description text",
            "desc" => "Enter your custom description. It will show bottom of your logo.",
            "id" => $shortname . "_logo_description",
            "std" => "My custom description",
            "type" => "text"),
        array(
            "name" => "Logo top",
            "desc" => "Please set above value of your logo.",
            "id" => $shortname . "_logo_topmargin",
            "std" => "30",
            "type" => "size"),
        array(
            "name" => "Menu top",
            "desc" => "Please set above value of your MENU.",
            "id" => $shortname . "_menu_topmargin",
            "std" => "30",
            "type" => "size"),
        array(
            "name" => "Favicon image",
            "desc" => "Choose your favicon. Much agreeable size: 15x15px).",
            "id" => $shortname . "_favicon",
            "std" => get_template_directory_uri(). "/images/favicon.ico",
            "type" => "file"),
//        array(
//            "name" => "Breadcrumbs",
//            "desc" => "If yes, breadcrumbs will be show your whole site.",
//            "id" => $shortname . "_breadcrumbs",
//            "std" => "false",
//            "type" => "checkbox"),
//        array(
//            "name" => "Sidebar scrollable",
//            "desc" => "If yes, sidebar will be able to scroll down go through page.",
//            "id" => $shortname . "_sidebar_scrillable",
//            "std" => "false",
//            "type" => "checkbox"),
        array(
            "name" => "Copyright text",
            "desc" => "Please insert your own copyright text here",
            "id" => $shortname . "_copyrighttext",
            "std" => 'Copyright &copy; 2011 <a href="http://themeton.com" target="_blank">Themeton</a>. Powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.',
            "type" => "textarea"),
    )
);
$st_general_option2=Array(
    'title'=>'Additional options',
    'name' => $shortname . '_general_options2',
    'function' => $shortname.'_general_options_tab2',
    'items' => Array(
        array(
            "name" => "Comment receiving settings",
            "desc" => "Select your receiving types. Selection None will block all site comments.",
            "id" => $shortname . "_comment_receive",
            "options" => array('Only posts','Only pages','Posts/pages','None'),
            "std" => "Only posts",
            "type" => "select"),
        array(
            "name" => "Use facebook comment?",
            "desc" => "If yes, site comment will show by facebook comments",
            "id" => $shortname . "_facebook_comment",
            "std" => "false",
            "type" => "checkbox"),
        array(
            "name" => "Facebook App ID",
            "desc" => "Please include your facebook App ID. You can get your appid from <a href='http://developers.facebook.com/docs/' target='_blank'>here</a>.",
            "id" => $shortname . "_facebook_appid",
            "std" => "",
            "type" => "text"),
        array(
            "name" => "Comments per page",
            "desc" => "Please select comment count pagination of facebook comments.",
            "id" => $shortname . "_comment_perpage",
            "std" => "8",
            "type" => "text"),
        array(
            "name" => "Google analytics",
            "desc" => "Please include your google analytics code",
            "id" => $shortname . "_google_analytics",
            "std" => "",
            "type" => "textarea"),
//        array(
//            "name" => "Google maps",
//            "desc" => "If on, comment ni facebookees awna",
//            "id" => $shortname . "_google_maps",
//            "std" => "",
//            "type" => "textarea"),
        array(
            "name" => "Robot meta settings",
            "desc" => "Robots are the little guys that search engines send out to crawl over your pages for information. With each of these settings, you control what the Robots see, or don't. By default, Googlebot will index a page and follow links to it. For more information <a href='http://www.seoconsultants.com/meta-tags/robots/' target='_blank'>about robots</a>",
            "id" => $shortname . "_meta_robots",
            "options" => array('default','noindex','nofollow','noarchive', 'noindex, nofollow', 'nofollow, noarchive', 'noindex, noarchive'),
            "std" => "default",
            "type" => "select"),
        array(
            "name" => "Keyword meta settings",
            "desc" => "A meta keywords tag is supposed to be a brief and concise list of the most important themes of your page.",
            "id" => $shortname . "_meta_keyword",
            "std" => "",
            "type" => "textarea"),
        array(
            "name" => "Description meta settings",
            "desc" => "It will include and print together your site description meta tag on header.",
            "id" => $shortname . "_meta_description",
            "std" => "",
            "type" => "textarea"),
        array(
            "name" => "Custom CSS",
            "desc" => "If you have advanced style changes, you can include here your custom CSS.",
            "id" => $shortname . "_custom_css",
            "std" => "",
            "type" => "textarea")
    )
);
add_filter('tt_option_load', 'stonking_general_option_load');

function stonking_general_option_load($filtered_options) {
    global $st_general_option1, $st_general_option2;
    return array_merge($filtered_options, $st_general_option1['items'], $st_general_option2['items']);
}
function stonking_general_option_init(){
    global $themename, $shortname, $st_general_option1, $tt_admin_options,$st_general_option2;
    $font_options = Array('page_title' => 'General options', 'option_icon' => 'icon32-color-options', 'option_items' => Array('general_options1' => $st_general_option1,'general_options2' => $st_general_option2));
    $tt_admin_options['themeton_stonking_options'] = $font_options;
}
