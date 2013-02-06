<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'accordion_shortcode_filter');
add_action('tt_shortcode_generator', 'accordion_shortcode_generator');

function accordion_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Accordion tab', 'id' => 'accordion');
    return $shortcodes;
}

function accordion_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'accordion', 'columns_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Accordion",
        "options" => array(array("name" => "tabscount", "desc" => "Tab count", "options" => array('1', '2', '3', '4', '5', '6', '7', '8')),
            array("name" => "styles", "desc" => "Tab style", "options" => array('black', 'gray', 'white', 'orange', 'red', 'blue', 'rosy', 'green', 'pink')),
        ),
    );
    default_shortcode_render($option);
?>
    <div id="dynamic_accordion_values">
        <div class="accord">
            <div class="accordTitle">Tab1</div>
            <div class="accordContent">
                <fieldset>
                    <div class="s-title"><label>Title</label></div>
                    <div class="s-element"><input type="text" rel="shortcode_accordion_title_#"></div>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><textarea rel="shortcode_accordion_content_#" ></textarea></div>
                </fieldset>
            </div>
        </div>
    </div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_accordion_shortcode();"></p>
    <script type="text/javascript">
        var accordionTemplate;
        jQuery(document).ready(function(){
            accordionTemplate=jQuery('#dynamic_accordion_values > div').clone();
            jQuery('#dynamic_accordion_values').html('');
            count=parseInt(jQuery('#style_shortcodeAccordion0').val());			
            jQuery('#dynamic_accordion_values').changeDynamic_count(count,accordionTemplate,'Accordion ','accordTitle');
            jQuery('#style_shortcodeAccordion0').change(function(){
                count=parseInt(jQuery('#style_shortcodeAccordion0').val());
                jQuery('#dynamic_accordion_values').changeDynamic_count(count,accordionTemplate,'Accordion ','accordTitle');
                //changeAccordion_count(count);
            });
        });
        
        function insert_accordion_shortcode(){
            item =" [accordion style=\""+jQuery('#style_shortcodeAccordion1').val()+"\"]<br />";
            count=parseInt(jQuery('#style_shortcodeAccordion0').val()); //(int)(jQuery('#style_shortcodeAccordion0').val()).parseInt(string, radix);
            for ( i=1; i<=count; i++)
            {
                item +=" [a_tab title=\""+jQuery('#shortcode_accordion_title_'+i).val()+"\"]"+jQuery('#shortcode_accordion_content_'+i).val()+"[/a_tab]<br>";
            }
            item +="[/accordion]";
            send_to_editor(item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[accordion]
function accordion_func($atts, $content = null) {
    extract($atts);
    $content = str_replace("<br />", " ", $content);
    return "<div class=\"accordion " . $style . "\">" . do_shortcode($content) . "</div>";
}

add_shortcode('accordion', 'accordion_func');

/*
  <div><a href="#">First header</a></div>
  <div>
  <p>Mauris ultricies. Nam feugiat egestas nulla. Donec augue dui, molestie sed, tristique sit amet, blandit eu, turpis. Mauris hendrerit, nisi et sodales tempor, orci tellus laoreet elit, sed molestie dui quam vitae dui.</p>
  </div>

 */

//[acc container]
function a_tab_func($atts, $content = null) {
    extract($atts);
    $content = str_replace("<br />", " ", $content);
    return "<h3><a href=\"#\">" . $title . "</a></h3><div><p>" . do_shortcode($content) . "</p></div>";
}

add_shortcode('a_tab', 'a_tab_func');
?>