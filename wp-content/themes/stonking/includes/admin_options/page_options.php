<?php

add_action('tt_admin_init', 'stonking_page_option_init');
global $shortname, $themename, $st_page_2, $st_page_3, $st_page_4, $st_page_5;
$st_page_2 = Array(
    'title' => 'Blog',
    'name' => $shortname . '_page_blog',
    'function' => $shortname . '_page_tab2',
    'items' => Array(
        array(
            "name" => "Post meta",
            "desc" => "Enable or disable post meta info on Blog page.",
            "id" => $shortname . "_blog_postmeta",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Post featured image/slide",
            "desc" => "Enable or disable featured image of posts",
            "id" => $shortname . "_blog_featuredimage",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Link of Post featured image/slide",
            "desc" => "If NO, link will be permalink of your post. If YES, it will show prettyPhoto when you clicked image/slider.",
            "id" => $shortname . "_blog_featuredimage_link",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Gap between posts",
            "desc" => "Please set the size number between the posts. (By pixels)",
            "id" => $shortname . "_blog_gapposts",
            "std" => "20",
            "type" => "text"),
        array(
            "name" => "Number of posts per page",
            "desc" => "Please, set the number of posts per page on whole blog pages.",
            "id" => $shortname . "_blog_postnumber",
            "std" => "5",
            "type" => "text"),
        array(
            "name" => "Ajax loading pagination",
            "desc" => "Do you wanna use ajax pagination? If no, your blog will show standard numbered pagination.",
            "id" => $shortname . "_blog_ajaxpagination",
            "std" => "false",
            "type" => "checkbox"),
    )
);
$st_page_3 = Array(
    'title' => 'Single',
    'name' => $shortname . '_page_single',
    'function' => $shortname . '_page_tab3',
    'items' => Array(
        array(
            "name" => "Post featured image",
            "desc" => "Enable or disable post featured image.",
            "id" => $shortname . "_single_featuredimage",
            "std" => "false",
            "type" => "checkbox"),
        array(
            "name" => "Post meta",
            "desc" => "Enable or disable post meta info.",
            "id" => $shortname . "_single_postmeta",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Post author",
            "desc" => "Enable or disable post author info.",
            "id" => $shortname . "_single_postauthor",
            "std" => "true",
            "type" => "checkbox"),
    )
);
$st_page_4 = Array(
    'title' => 'Page',
    'name' => $shortname . '_page_page',
    'function' => $shortname . '_page_tab4',
    'items' => Array(
        array(
            "name" => "Post featured image",
            "desc" => "Enable or disable post featured image.",
            "id" => $shortname . "_page_featuredimage",
            "std" => "false",
            "type" => "checkbox"),
//        array(
//            "name" => "Page meta",
//            "desc" => "Enable or disable post meta info.",
//            "id" => $shortname . "_page_postmeta",
//            "std" => "true",
//            "type" => "checkbox"),
        array(
            "name" => "Page author",
            "desc" => "Enable or disable post author info.",
            "id" => $shortname . "_page_postauthor",
            "std" => "false",
            "type" => "checkbox"),
    )
);
$st_page_5 = Array(
    'title' => 'Portfolio',
    'name' => $shortname . '_page_portfolio',
    'function' => $shortname . '_page_tab5',
    'items' => Array(
        array(
            "name" => "Image height",
            "desc" => "Please, set the size of portfolio image.",
            "id" => $shortname . "_port_imgheight1col",
            "std" => "300",
            "type" => "size"),
        array(
            "name" => "Link of Portfolio featured image/slide",
            "desc" => "If NO, link will be permalink of your post. If YES, it will show prettyPhoto when you clicked image/slider.",
            "id" => $shortname . "_port_featuredimage_link",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Add content read more link",
            "desc" => "When your post portfolio ",
            "id" => $shortname . "_port_readmore",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Number of portfolios per page",
            "desc" => "Please, set the number of posts per page on portfolio pages.",
            "id" => $shortname . "_port_postnumber",
            "std" => "12",
            "type" => "text"),
        array(
            "name" => "Social share Twitter",
            "desc" => "When your post portfolio ",
            "id" => $shortname . "_port_socialtwitter",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Social share Facebook",
            "desc" => "When your post portfolio ",
            "id" => $shortname . "_port_socialfacebook",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Social share Digg",
            "desc" => "When your post portfolio ",
            "id" => $shortname . "_port_socialdigg",
            "std" => "true",
            "type" => "checkbox"),
        array(
            "name" => "Social share Delicios",
            "desc" => "When your post portfolio ",
            "id" => $shortname . "_port_socialdelicios",
            "std" => "true",
            "type" => "checkbox"),
    )
);
add_filter('tt_option_load', 'stonking_page_option_load');

function stonking_page_option_load($filtered_options) {
    global $st_page_2, $st_page_3, $st_page_4, $st_page_5;
    return array_merge($filtered_options, $st_page_2['items'], $st_page_3['items'], $st_page_4['items'], $st_page_5['items']);
}
function stonking_page_option_init() {
    global $themename, $shortname, $st_page_2, $st_page_3, $st_page_4, $st_page_5,$tt_admin_options;	
    $st_page_options = Array('page_title' => 'Page options', 'option_icon' => 'icon32-color-options', 'option_items' => Array('page_2' => $st_page_2,'page_3' => $st_page_3,'page_4' => $st_page_4,'page_5' => $st_page_5));
    $tt_admin_options['themeton_stonking_page_options'] = $st_page_options;
}


?>
