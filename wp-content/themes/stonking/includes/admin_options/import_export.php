<?php

add_action('tt_admin_init', 'stonking_importexport_option_init');
global $st_import, $st_export;
$st_export = Array(
    'title' => 'Export theme configs',
    'name' => $shortname . '_general_export',
    'function' => $shortname . '_importexport_options_tab1',
    'reset'=>'none',
    'save'=>'none',
    'items' => Array(
        array(
            "name" => "Add new skin",
            "desc" => "Enable or disable slider on Home page.",
            "id" => $shortname . "_theme_data",
            "std" => "true",
            "type" => "export_data")
    )
);
$st_import = Array(
    'title' => 'Import theme configs',
    'name' => $shortname . '_general_import',
    'function' => $shortname . '_importexport_options_tab2',
    'reset'=>'none',
    'save'=>'none',
    'items' => Array(
        array(
            "name" => "Add new skin",
            "desc" => "Enable or disable slider on Home page.",
            "id" => $shortname . "_theme_data",
            "std" => "true",
            "type" => "import_data")
    )
);


function stonking_importexport_option_init() {
    global $themename, $shortname, $st_import, $tt_admin_options, $st_export;
    $font_options = Array('page_title' => 'Export & Import', 'option_icon' => 'icon32-color-options', 'option_items' => Array('importexport_options1' => $st_export, 'importexport_options2' => $st_import));
    $tt_admin_options['themeton_stonking_importexport'] = $font_options;
}
