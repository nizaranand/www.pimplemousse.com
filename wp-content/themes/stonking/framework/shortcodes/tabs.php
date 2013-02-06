<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'tab_shortcode_filter');
add_action('tt_shortcode_generator', 'tab_shortcode_generator');

function tab_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Visual tabs', 'id' => 'tabs');
    return $shortcodes;
}

function tab_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'tabs', 'tabs_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Tabs",
        "options" => array(
            array("name" => "tabscount", "desc" => "Tab count", "options" => array('1', '2', '3', '4', '5', '6', '7', '8')),
            array("name" => "styles", "desc" => "Tab style", "options" => array('black', 'gray', 'white', 'orange', 'red', 'blue', 'rosy', 'green', 'pink'))
        ),
    );
    default_shortcode_render($option);
?>
    <div id="dynamic_tab_values">
        <div class="tab">
            <div class="tabTitle">Tab1</div>
            <div class="tabContent">
                <fieldset>
                    <div class="s-title"><label>Title</label></div>
                    <div class="s-element"><input type="text" rel="shortcode_tabs_title_#"></div>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><textarea rel="shortcode_tabs_content_#" ></textarea></div>
                </fieldset>
            </div>
        </div>
    </div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_tabs_shortcode();"></p>
    <script type="text/javascript">
        var tabsTemplate;
        jQuery(document).ready(function(){
            tabsTemplate=jQuery('#dynamic_tab_values > div').clone();
            jQuery('#dynamic_tab_values').html('');
            count=parseInt(jQuery('#style_shortcodeTabs0').val());
            jQuery('#dynamic_tab_values').changeDynamic_count(count,tabsTemplate,'Tab ','tabTitle');
            jQuery('#style_shortcodeTabs0').change(function(){
                count=parseInt(jQuery('#style_shortcodeTabs0').val());
                jQuery('#dynamic_tab_values').changeDynamic_count(count,tabsTemplate,'Tab ','tabTitle');
                //changeAccordion_count(count);
            });
        });
        function insert_tabs_shortcode(){
            item =" [tab_container style=\""+jQuery('#style_shortcodeAccordion1').val()+"\"]<br />";
            count=parseInt(jQuery('#style_shortcodeTabs0').val()); //(int)(jQuery('#style_shortcodeAccordion0').val()).parseInt(string, radix);
            for ( i=1; i<=count; i++)
            {
                item +=" [tab title=\""+jQuery('#shortcode_tabs_title_'+i).val()+"\"]"+jQuery('#shortcode_tabs_content_'+i).val()+"[/tab]<br>";
            }
            item +="[/tab_container]";
            send_to_editor( item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[tab]
$index = 1;

function tab_func($atts, $content = null) {
    $content = str_replace("<br />", " ", $content);
    global $index;
    $html = '<h3><a>' . $atts['title'] . '</a></h3>';
    $html .= " <div id=\"tabs-" . $index . "\">";
    $html .= "<p>" . do_shortcode($content) . "</p>";
    $html .= "</div>";
    $index++;
    return $html;
}

add_shortcode('tab', 'tab_func');

//[tab container]
function tab_container_func($atts, $content = null) {
    $content = str_replace("<br />", " ", $content);
    return "<div class=\"tabs " . $atts['style'] . ' tab-parent' . "\" rel='" . $atts['style'] . "'>" . do_shortcode($content) . "</div>";
}

add_shortcode('tab_container', 'tab_container_func');
?>