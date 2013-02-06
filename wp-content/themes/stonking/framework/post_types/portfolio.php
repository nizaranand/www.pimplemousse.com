<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_action('init', 'portfolio_register');

function portfolio_register() {
    $args = array(
        'label' => __('Portfolios'),
        'singular_label' => __('Portfolios'),
        'public' => true,
	'_builtin' => false,
       // 'show_ui' => true,
        'capability_type' => 'post',
        'menu_icon' => get_template_directory_uri() . '/framework/images/portfolio.png',
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'portfolio'),
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('portfolio', $args);
    flush_rewrite_rules();
}

register_taxonomy("catalog", array("portfolio"), array("hierarchical" => true, "label" => "Catalogs", "singular_label" => "Catalog", "rewrite" => true));
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
add_action("manage_posts_custom_column", "portfolio_custom_columns");
function portfolio_edit_columns($columns) {
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Portfolio Title",
        "catalog" => "Catalog",
        "date" => "date",
    );
    return $columns;
}

function portfolio_custom_columns($column) {
    global $post;
    switch ($column) {
        case "description":
            the_excerpt();
            break;
        case "catalog":
            echo get_the_term_list($post->ID, 'catalog', '', ', ', '');
            break;
    }
}

?>
