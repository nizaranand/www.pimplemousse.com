<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'pricing_shortcode_filter');
add_action('tt_shortcode_generator', 'pricing_shortcode_generator');

function pricing_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'Pricing', 'id' => 'pricing');
    return $shortcodes;
}

function pricing_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'pricing', 'pricing_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "Pricing",
        "options" => array(
            array("name" => "column count", "desc" => "Choose princing column count", "options" => array('3', '4', '5')),
            array("name" => "styles", "desc" => "Choose your pricing style", "options" => array('style1', 'style2'))
        ),
    );
    default_shortcode_render($option);
?>
    <div id="dynamic_pricing_values">
        <div class="pricing">
            <div class="pricingTitle">Tab1</div>
            <div class="tabContent">
                <fieldset>
                    <div class="s-title"><label>Is featured</label></div>
                    <div class="s-element"><input type="radio" name="featured_redio_group" rel="shortcode_pricing_feature_#"></div>
                    <div class="tt-cleared"></div>
                    <div class="s-title"><label>Title</label></div>
                    <div class="s-element"><input type="text" rel="shortcode_pricing_title_#"></div>
                    <div class="tt-cleared"></div>
                    <div class="s-title"><label>Sign up text</label></div>
                    <div class="s-element"><input type="text" rel="shortcode_pricing_signup_#"></div>
                    <div class="tt-cleared"></div>
                    <div class="s-title"><label>Sign up link</label></div>
                    <div class="s-element"><input type="text" rel="shortcode_pricing_link_#"></div>
                    <div class="tt-cleared"></div>
                    <div class="s-title"><label>Price</label></div>
                    <div class="s-element"><input type="text" rel="shortcode_pricing_price_#"></div>
                    <div class="tt-cleared"></div>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><textarea rel="shortcode_pricing_content_#" ></textarea></div>
                    <div class="tt-cleared"></div>
                </fieldset>
            </div>
        </div>
    </div>
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_pricing_shortcode()"></p>
    <script type="text/javascript">
        var pricingTemplate;
        jQuery(document).ready(function(){
            pricingTemplate=jQuery('#dynamic_pricing_values > div').clone();
            jQuery('#dynamic_pricing_values').html('');
            count=parseInt(jQuery('#style_shortcodePricing0').val());
            jQuery('#dynamic_pricing_values').changeDynamic_count(count,pricingTemplate,'Pricing ','pricingTitle');
            jQuery('#style_shortcodePricing0').change(function(){
                count=parseInt(jQuery('#style_shortcodePricing0').val());
                jQuery('#dynamic_pricing_values').changeDynamic_count(count,pricingTemplate,'Pricing ','pricingTitle');
                //changeAccordion_count(count);
            });
        });
        function insert_pricing_shortcode(){
            item =" [pricing_container style=\""+jQuery('#style_shortcodePricing1').val()+"\"]<br />";
            count=parseInt(jQuery('#style_shortcodePricing0').val()); //(int)(jQuery('#style_shortcodeAccordion0').val()).parseInt(string, radix);
            for ( i=1; i<=count; i++)
            {
                isFature='';
                if(jQuery('#shortcode_pricing_feature_'+i).is(':checked')){
                    isFature=' featured="1" ';
                }
                aa=jQuery('#shortcode_pricing_content_'+i).val()+"";
                aa=aa.replace('\n','||');
                //alert(aa);
                item +=" [pricing"+isFature+" title=\""+jQuery('#shortcode_pricing_title_'+i).val()+"\" signup=\""+jQuery('#shortcode_pricing_signup_'+i).val()+"\" link=\""+jQuery('#shortcode_pricing_link_'+i).val()+"\" price=\""+jQuery('#shortcode_pricing_price_'+i).val()+"\" count=\""+jQuery('#style_shortcodePricing0').val()+"\" style=\""+jQuery('#style_shortcodePricing1').val()+"\"]"+aa+"[/pricing]<br>";
            }
            item +="[/pricing_container]";
            send_to_editor(item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[tab]
$index = 1;

function pricing_func($atts, $content = '') {
    $content = str_replace("<br />", " ", $content);
    $pricingItems = split('\|\|', $content . '');

    global $index;
    $rw_count = '4';
    switch ($atts['count']) {
        case 5:
            $rw_count = '25';
            break;
        case 4:
            $rw_count = '3';
            break;
        case 3:
            $rw_count = '4';
            break;
    }
    if ($atts['style'] != 'style2') {
        $feature = '';
        if ($atts['featured'] == '1') {
            $feature = ' big-price';
        }
        $html = '<div class="grid_' . $rw_count . '_no_margin' . $feature . '">';
        $html .='<div class="price">';
        $html .='<div class="price-head">';
        $html .='<h1>' . $atts['title'] . '</h1>';
        $html .='</div>';
        $html .='<h2>' . $atts['price'] . '</h2>';
        $html .='<ul class="price-list">';
        foreach ($pricingItems as $pricingItem) {
            $html .='<li>' . do_shortcode($pricingItem) . '</li>';
        }
        $html .= '</ul>';
        $html .='<a href="' . $atts['link'] . '" class="button">' . $atts['signup'] . '</a>';
        $html .='</div>';
        $html .='</div>';
        $index++;
    } else {
        $feature = '';
        if ($atts['featured'] == '1') {
            $feature = ' featured-price';
        }
        $html = '<div class="grid_' . $rw_count . $feature . '">';
        $html .='<div class="head-pricing-box">';
        $html .='<div class="head-pricing-box-top">';
        $html .='<h1>' . $atts['title'] . '</h1>';
        $html .='</div>';
        $html .='<div class="head-pricing-box-middle">';
        $html .='<ul class="price-list">';
        foreach ($pricingItems as $pricingItem) {
            $html .='<li>' . do_shortcode($pricingItem) . '</li>';
        }
        $html .= '</ul>';
        $html .='</div>';
        $html .='<div class="head-pricing-box-bottom">';
        $html .='<span class="head-pricing-signup"><a href="' . $atts['link'] . '">' . $atts['signup'] . '</a></span>';
        $html .='<span class="head-pricing-price">' . $atts['price'] . '</span>';
        $html .='</div>';
        $html .='</div>';
        $html .='</div>';
    }
    return $html;
}

add_shortcode('pricing', 'pricing_func');

//[tab container]
function pricing_container_func($atts, $content = null) {
    $content = str_replace("<br />", " ", $content);
    if ($atts['style'] != 'style2')
        return "<div class=\"price-box\">" . $html . do_shortcode($content) . "<div class='clearfix'></div></div>";
    else
        return "<div class=\"head-pricing\">" . $html . do_shortcode($content) . "<div class='clearfix'></div></div>";
}

add_shortcode('pricing_container', 'pricing_container_func');
?>