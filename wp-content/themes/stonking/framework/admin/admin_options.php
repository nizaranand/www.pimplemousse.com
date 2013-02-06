<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function get_latest_xml_version($interval) {
    $notifier_file_url = "http://themeton.com/themes/stk/notifier.xml";
    $db_cache_field = 'stonkingsidebar-cache';
    $db_cache_field_last_updated = 'stonking-cache-last-updated';
    $last = get_option($db_cache_field_last_updated);
    $now = time();
    // check the cache
    if (!$last || (( $now - $last ) > $interval)) {
        // cache doesn't exist, or is old, so refresh it
        if (function_exists('curl_init')) { // if cURL is available, use it...
            $ch = curl_init($notifier_file_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 14400);
            $cache = curl_exec($ch);
            curl_close($ch);
        } else {
            $cache = file_get_contents($notifier_file_url); // ...if not, use the common file_get_contents()
        }

        if ($cache) {
            // we got good results
            update_option($db_cache_field, $cache);
            update_option($db_cache_field_last_updated, time());
        }
        // read from the cache file
        $notifier_data = get_option($db_cache_field);
    } else {
        // cache file is fresh enough, so read from it
        $notifier_data = get_option($db_cache_field);
    }

    // Let's see if the $xml data was returned as we expected it to.
    // If it didn't, use the default 1.0 as the latest version so that we don't have problems when the remote server hosting the XML file is down
    if (strpos((string) $notifier_data, '<notifier>') === false) {
        $notifier_data = '<?xml version="1.0" encoding="UTF-8"?><notifier><latest>1.0</latest><changelog></changelog></notifier>';
    }

    // Load the remote XML data into a variable and return it
    $xml = simplexml_load_string($notifier_data);

    return $xml;
}

define('NOTIFIER_CACHE_INTERVAL', 36000);
require_once TEMPLATEPATH . '/framework/admin/default_options_theme.php';

function tt_theme_options_after_reset($options, $page, $tab, $showSave=true, $showReset=true) {
?>
    <input type="hidden"  name="action" value="tt_admin_options_save" />
    <input type="hidden" class="tt_admin_page" name="themeton_admin_page" value="<?php print $page ?>"/>
    <input type="hidden" class="tt_admin_tab" name="themeton_admin_tab" value="<?php print $tab ?>"/>
<?php tt_print_option_items($options['items']); ?>
    <div class="option-save">
        <img src="<?php echo get_template_directory_uri(); ?>/framework/images/ajax-loader.gif" class="ajax-loading">
    <?php
    if ($showSave) {
    ?>
        <input type="submit" name="save" class="button-primary" value="Save changes">
    <?php
    }
    ?>
    <?php
    if ($showReset) {
    ?>
        <input type="button" rel="tabs-<?php print $i + 1 ?>" name="reset" class="button-primary tt_option_reset_button" value="Reset changes">
    <?php
    }
    ?>
</div><?php
}

function tt_theme_options_render($theme_options, $option_title, $showSave=true, $showReset=true) {
    extract($theme_options);
    $xml = get_latest_xml_version(NOTIFIER_CACHE_INTERVAL); // Get the latest remote XML file on our server
    $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
    ?>
    <div class="wrap">
        <div class="icon32 <?php print $option_icon; ?>"><br></div>
        <h2><?php print $page_title; ?></h2>
        <div id="tt-message" class="updated"><p>Saved</p></div>
        <div class="metabox-holder has-right-sidebar">
            <div class="inner-sidebar">
            <?php if ((float) $xml->latest > (float) $theme_data['Version']) {
 ?>
                <div class="postbox">
                    <h3 class="hndle"><span><?php print $xml->title; ?></span></h3>
                    <div class="inside">
                        <div class="tt_yellow_box">
<?php print $xml->changelog; ?>
                    </div>
                </div>
            </div>
            <?php } ?>

<?php
$iik=0;
if ($xml->customdata)
    while($xml->customdata[$iik]){
    ?>
                <div class="postbox">
                    <h3 class="hndle"><span><?php print $xml->customdata[$iik]->title; ?></span></h3>
                    <div class="inside">
                        <div class="tt_yellow_box">
<?php print $xml->customdata[$iik]->content; ?>
                    </div>
                </div>
            </div>
<?php
$iik++;

} ?>
        </div>
        <div id="post-body">
            <div id="post-body-content">
                <div class="tt_tab_content">
                    <ul>
                        <?php
                        $i = 0;
                        foreach ($option_items as $option_key => $option_value) {
                        ?>
                            <li><a href="#tabs-<?php print $i + 1; ?>"><?php print $option_value['title'] ?></a></li>
                        <?php
                            $i++;
                        }
                        ?>
                    </ul>
                    <?php
                        $i = 0;
                        foreach ($option_items as $option_key => $option_value) {
                    ?>
                            <div id="tabs-<?php print $i + 1 ?>">
                                <form action="/" class="themeton_option_form" >
                                    <input type="hidden"  name="action" value="tt_admin_options_save" />
                                    <input type="hidden" class="tt_admin_page" name="themeton_admin_page" value="<?php print $_REQUEST['page'] ?>"/>
                                    <input type="hidden" class="tt_admin_tab" name="themeton_admin_tab" value="<?php print $option_key ?>"/>
<?php tt_print_option_items($option_value['items']); ?>
                            <div class="option-save">
                                <img src="<?php echo get_template_directory_uri(); ?>/framework/images/ajax-loader.gif" class="ajax-loading">
                                <?php
                                if (!isset($option_value['save']) || $option_value['save'] != 'none') {
                                ?>
                                    <input type="submit" name="save" class="button-primary" value="Save changes">
                                <?php
                                }
                                ?>
                                <?php
                                if (!isset($option_value['reset']) || $option_value['reset'] != 'none') {
                                ?>
                                    <input type="button" rel="tabs-<?php print $i + 1 ?>" name="reset" class="button-primary tt_option_reset_button" value="Reset changes">
                                <?php
                                }
                                ?>
                            </div>
                        </form>

                        <input type="hidden" name="actionbtn" value="<?php print $theme_options[$i]['function']; ?>_reset">
                    </div>
                    <?php
                                $i++;
                            }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
                        }

                        function tt_print_option_items($items) {
                            foreach ($items as $item) {
                                if (function_exists('tt_render_' . $item['type'] . '_option')) {
                                    call_user_func('tt_render_' . $item['type'] . '_option', $item);
                                } else {
                                    echo $item['type'];
                                }
                            }
                        }
?>
<?php
                        $theme_options;

                        function save_custom_style() {
                            if (is_writable(TEMPLATEPATH . "/css")) {
                                $fhandle = @fopen(TEMPLATEPATH . '/css/custom.css', 'w+');
                                $content = include(TEMPLATEPATH . '/includes/custom_css.php');
                                if ($fhandle)
                                    fwrite($fhandle, $content, strlen($content));
                            }
                            return false;
                        }

                        function get_theme_options() {
                            global $theme_options, $shortname;
                            $skin = '';
                            //$skin = '_' . get_option($shortname.'_current_skin', get_option($shortname.'_default_skin));
                            $theme_options = array();
                            $option_names = array(
                                array($shortname . $skin . '_general', 'general_1'),
                                array($shortname . $skin . '_general_additional', 'general_2'),
                                array($shortname . $skin . '_general_advanced', 'general_3'),
                                array($shortname . $skin . '_page_home', 'page_1'),
                                array($shortname . $skin . '_page_blog', 'page_2'),
                                array($shortname . $skin . '_page_single', 'page_3'),
                                array($shortname . $skin . '_page_page', 'page_4'),
                                array($shortname . $skin . '_page_portfolio', 'page_5'),
                                array($shortname . $skin . '_slider_jcycle', 'slider_1'),
                                array($shortname . $skin . '_slider_kwicks', 'slider_2'),
                                array($shortname . $skin . '_slider_roundabout', 'slider_3'),
                                array($shortname . $skin . '_slider_nivo', 'slider_4'),
                                array($shortname . $skin . '_slider_piecemaker', 'slider_5'),
                                array($shortname . $skin . '_slider_contentjcycle', 'slider_6'),
                                array($shortname . $skin . '_color_backgrounds', 'color_1'),
                                array($shortname . $skin . '_color_header', 'color_2'),
                                array($shortname . $skin . '_color_feature', 'color_3'),
                                array($shortname . $skin . '_color_pagecontent', 'color_4'),
                                array($shortname . $skin . '_color_sidebar', 'color_5'),
                                array($shortname . $skin . '_color_footer', 'color_6'),
                                array($shortname . $skin . '_footer', 'footer_1'),
                                array($shortname . $skin . '_font_general', 'font_1'),
                                array($shortname . $skin . '_font_cufon', 'font_2'),
                                array($shortname . $skin . '_font_sizes', 'font_3'),
                                array($shortname . $skin . '_trans_content', 'trans_1'),
                                array($shortname . $skin . '_trans_comment', 'trans_2'),
                                array($shortname . $skin . '_trans_other', 'trans_3'),
                            );
                            foreach ($option_names as $option) {
                                global $$option[1];
                                $array = $$option[1];
                                foreach ($array['items'] as $item) {
                                    $theme_options[$item['id']] = $item['std'];
                                }
                                $theme_options = array_merge((array) $theme_options, (array) get_option($option[0]));
                            }
                        }

