<?php
add_action('tt_admin_init', 'stonking_trans_option_init');
global $shortname, $themename, $st_trans_option1, $st_trans_option2, $st_trans_option3;
$st_trans_option1 = Array(
    'title' => 'Content',
    'name' => $shortname . '_trans_content',
    'function' => $shortname . '_trans_tab1',
    'items' => Array(
        array(
            "name" => "Read more text",
            "desc" => "",
            "id" => $shortname . "_trans_readmore",
            "std" => "READ MORE",
            "type" => "text"),
//        array(
//            "name" => "Posted by text of post meta",
//            "desc" => "",
//            "id" => $shortname . "_trans_postedby",
//            "std" => "Posted by",
//            "type" => "text"),
//        array(
//            "name" => "Tags text of post meta",
//            "desc" => "",
//            "id" => $shortname . "_trans_tags",
//            "std" => "Tags:",
//            "type" => "text"),
//        array(
//            "name" => "In text of post meta",
//            "desc" => "",
//            "id" => $shortname . "_trans_in",
//            "std" => "In",
//            "type" => "text"),
        array(
            "name" => "Top text of seperator",
            "desc" => "",
            "id" => $shortname . "_trans_toptext",
            "std" => "top",
            "type" => "text"),
        array(
            "name" => "Pagination start",
            "desc" => "",
            "id" => $shortname . "_trans_pgstart",
            "std" => "&laquo;",
            "type" => "text"),
        array(
            "name" => "Pagination forward",
            "desc" => "",
            "id" => $shortname . "_trans_pgforward",
            "std" => "&lsaquo;",
            "type" => "text"),
        array(
            "name" => "Pagination next",
            "desc" => "",
            "id" => $shortname . "_trans_pgnext",
            "std" => "&rsaquo;",
            "type" => "text"),
        array(
            "name" => "Pagination end",
            "desc" => "",
            "id" => $shortname . "_trans_pgend",
            "std" => "&raquo;",
            "type" => "text"),
//        array(
//            "name" => "Portfolio 'Filter by type' text",
//            "desc" => "",
//            "id" => $shortname . "_trans_filterbytype",
//            "std" => "Filter by type",
//            "type" => "text"),
//        array(
//            "name" => "Portfolio 'Sort by' text",
//            "desc" => "",
//            "id" => $shortname . "_trans_sortby",
//            "std" => "Sort by ",
//            "type" => "text"),
        array(
            "name" => "Post author text",
            "desc" => "",
            "id" => $shortname . "_trans_postauthor",
            "std" => "Author",
            "type" => "text"),
        array(
            "name" => "Post author info not found text",
            "desc" => "",
            "id" => $shortname . "_trans_postauthordesc",
            "std" => "The author didnt add any Information to his profile yet",
            "type" => "text"),
    )
);

$st_trans_option2 = Array(
    'title' => 'Comment',
    'name' => $shortname . '_trans_comment',
    'function' => $shortname . '_trans_tab2',
    'items' => Array(
        array(
            "name" => "No comments text",
            "desc" => "",
            "id" => $shortname . "_trans_nocomments",
            "std" => "No comments",
            "type" => "text"),
        array(
            "name" => "One comment text",
            "desc" => "",
            "id" => $shortname . "_trans_onecomment",
            "std" => "One comment",
            "type" => "text"),
        array(
            "name" => "Comments text",
            "desc" => "",
            "id" => $shortname . "_trans_comments",
            "std" => "Comments",
            "type" => "text"),
        array(
            "name" => "Comments to text",
            "desc" => "",
            "id" => $shortname . "_trans_commentsto",
            "std" => "Comments to",
            "type" => "text"),
        array(
            "name" => "Leave a comment text",
            "desc" => "",
            "id" => $shortname . "_trans_leaveacomment",
            "std" => "Leave a reply",
            "type" => "text"),
        array(
            "name" => "Name text",
            "desc" => "",
            "id" => $shortname . "_trans_name",
            "std" => "Name",
            "type" => "text"),
        array(
            "name" => "Email text",
            "desc" => "",
            "id" => $shortname . "_trans_email",
            "std" => "E-mail",
            "type" => "text"),
        array(
            "name" => "Website text",
            "desc" => "",
            "id" => $shortname . "_trans_website",
            "std" => "Website",
            "type" => "text"),
        array(
            "name" => "Your comment text",
            "desc" => "",
            "id" => $shortname . "_trans_yourcomment",
            "std" => "Your comment",
            "type" => "text"),
        array(
            "name" => "Submit comment text",
            "desc" => "",
            "id" => $shortname . "_trans_submitcomment",
            "std" => "Submit Comment",
            "type" => "text"),
    )
);
$st_trans_option3 = Array(
    'title' => 'Other',
    'name' => $shortname . '_trans_other',
    'function' => $shortname . '_trans_tab3',
    'items' => Array(
        array(
            "name" => "Search result for text",
            "desc" => "",
            "id" => $shortname . "_trans_searchresult",
            "std" => "Search result for",
            "type" => "text"),
        array(
            "name" => "Nothing found title of search results",
            "desc" => "",
            "id" => $shortname . "_trans_nothingfound",
            "std" => "Nothing found",
            "type" => "text"),
        array(
            "name" => "Nothing found text of search results",
            "desc" => "",
            "id" => $shortname . "_trans_nothingfoundtext",
            "std" => "Sorry, but nothing matched your search criteria. Please try again with some different keywords.",
            "type" => "text"),
        array(
            "name" => "Daily Archives text",
            "desc" => "",
            "id" => $shortname . "_trans_dailyarchives",
            "std" => "Daily Archives",
            "type" => "text"),
        array(
            "name" => "Monthly Archives text",
            "desc" => "",
            "id" => $shortname . "_trans_monthlyarchives",
            "std" => "Monthly Archives",
            "type" => "text"),
        array(
            "name" => "Yearly Archives text",
            "desc" => "",
            "id" => $shortname . "_trans_yearlyarchives",
            "std" => "Yearly Archives",
            "type" => "text"),
        array(
            "name" => "Blog Archives text",
            "desc" => "",
            "id" => $shortname . "_trans_blogarchives",
            "std" => "Blog Archives",
            "type" => "text"),
        array(
            "name" => "404 page title text",
            "desc" => "",
            "id" => $shortname . "_trans_404title",
            "std" => "Nothing found",
            "type" => "text"),
        array(
            "name" => "404 page not found text",
            "desc" => "",
            "id" => $shortname . "_trans_404text",
            "std" => "Apologies, but the page you requested could not be found. Perhaps searching will help.",
            "type" => "text"),
    )
);


add_filter('tt_option_load', 'stonking_trans_option_load');

function stonking_trans_option_load($filtered_options) {
    global $st_trans_option1, $st_trans_option2,$st_trans_option3;
    return array_merge($filtered_options, $st_trans_option1['items'], $st_trans_option2['items'], $st_trans_option3['items']);
}
function stonking_trans_option_init() {
    global $themename, $shortname, $st_trans_option1, $tt_admin_options, $st_trans_option2, $st_trans_option3;
    $trans_options = Array('page_title' => 'Translations', 'option_icon' => 'icon32-color-options', 'option_items' => Array('trans_options1' => $st_trans_option1,'trans_options2' => $st_trans_option2, 'trans_options3' => $st_trans_option3));
    $tt_admin_options['themeton_stonking_trans_options'] = $trans_options;
}

?>