<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
add_filter('tt_shortcode_list_init', 'list_shortcode_filter');
add_action('tt_shortcode_generator', 'list_shortcode_generator');

function list_shortcode_filter($shortcodes) {
    $shortcodes[] = Array('name' => 'List', 'id' => 'list');
    return $shortcodes;
}

function list_shortcode_generator($args) {
    extract($args);
    $before_shortcode = sprintf($before_shortcode, 'list', 'list_wrapper');
    print $before_shortcode;
    $option = array(
        "name" => "List",
        "options" => array(array("name" => "list count", "desc" => "How many list item", "options" => array('1', '2', '3', '4', '5', '6', '7', '8')),)
    );
    default_shortcode_render($option);
?>
    <div id="dynamic_list_values">
        <div class="list">
            <div class="listTitle">List 1</div>
            <div class="listContent">
                <fieldset>
                    <div class="s-title"><label>Content</label></div>
                    <div class="s-element"><textarea rel="shortcode_list_content_#" ></textarea></div>
                </fieldset>
            </div>
        </div>
    </div>
    <table>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowdown"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_down_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowdown1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_down_alt1_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowdown2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_down_alt2_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowleft"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_left_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowleft1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_left_alt1_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowleft2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_left_alt2_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowright"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_right_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowright1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_right_alt1_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowright2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_right_alt2_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowup"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_up_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowup1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_up_alt1_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="arrowup2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/arrow_up_alt2_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="article-icon"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/article_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="at"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/at_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="bolt"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/bolt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="book"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/book_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="book1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/book_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="box-icon"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/box_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="calendar"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/calendar_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="calendar1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/calendar_alt_fill_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="calendar2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/calendar_alt_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="cd"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/cd_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="chat"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/chat_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="chat1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/chat_alt_fill_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="chat2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/chat_alt_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="check"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/check_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="clock"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/clock_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="cog1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/cog_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="cog2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/cog_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="comment1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/comment_alt1_fill_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="comment2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/comment_alt1_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="compass"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/compass_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="cursor"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/cursor_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="denied1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/denied_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="denied2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/denied_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="dial"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/dial_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="document1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/document_fill_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="document2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/document_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="eject"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/eject_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="eaualizer"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/equalizer_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="eyedropper"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/eyedropper_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="first"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/first_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="folder1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/folder_fill_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="folder2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/folder_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="fullscreen1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/fullscreen_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="fullscreen2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/fullscreen_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="fullscreen3"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/fullscreen_exit_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="fullscreen4"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/fullscreen_exit_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="home"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/home_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="image-icon"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/image_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="key1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/key_fill_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="key2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/key_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="last-icon"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/last_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="left-icon1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/left_quote_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="left-icon2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/left_quote_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="link-icon"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/link_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="loop"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/loop_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="minus"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/minus_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="map2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/map_pin_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="map1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/map_pin_fill_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="moon1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/moon_fill_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="moon2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/moon_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="move1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/move_horizontal_alt2_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="move2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/move_vertical_alt2_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="move3"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/move_alt1_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="move4"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/move_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="newwindow"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/new_window_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="movie"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/movie_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="pen1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/pen_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="pen2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/pen_alt_fill_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="pen3"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/pen_alt_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="pin"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/pin_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="play"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/play_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="plus1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/plus_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="plus2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/plus_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="readmore-icon"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/read_more_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="rightquote1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/right_quote_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="rightquote2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/right_quote_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="rss1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/rss_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="rss2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/rss_alt_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="spin"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/spin_alt_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="star"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/star_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="stop"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/stop_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="sun"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/sun_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="tag1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/tag_fill_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="tag2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/tag_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="trash1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/trash_fill_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="trash2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/trash_stroke_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="undo"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/undo_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="x"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/x_alt_12x12.png" alt=""/></td>
        </tr>
        <tr>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="magnifying1"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/magnifying_glass_12x12.png" alt=""/></td>
            <td class="shortcode_list_radio"><input type="radio" name="list" onclick="displayResult(this.value)"  value="magnifying2"></td>
            <td class="shortcode_list_img"><img src="<?php echo get_template_directory_uri(); ?>/images/list-icons/magnifying_glass_alt_12x12.png" alt=""/></td>
        </tr>
    </table>
    <input type="hidden" id="result" />
    <p><input type="button" value="Shortcode to Editor" class="button" onclick="insert_list_shortcode()"></p>
    <script type="text/javascript">
        var listTemplate;
        jQuery(document).ready(function(){
            listTemplate=jQuery('#dynamic_list_values > div').clone();
            jQuery('#dynamic_list_values').html('');
            count=parseInt(jQuery('#style_shortcodeList0').val());
            jQuery('#dynamic_list_values').changeDynamic_count(count,listTemplate,'List ','listTitle');
            jQuery('#style_shortcodeList0').change(function(){
                count=parseInt(jQuery('#style_shortcodeList0').val());
                jQuery('#dynamic_list_values').changeDynamic_count(count,listTemplate,'List ','listTitle');
                //changeAccordion_count(count);
            });
        });

        function displayResult(list)
        {
            document.getElementById("result").value=list;
        }
        function insert_list_shortcode()
        {
            item ='[list style="'+ jQuery('#result').val() +'"]<br />';
            count=parseInt(jQuery('#style_shortcodeList0').val()); //(int)(jQuery('#style_shortcodeAccordion0').val()).parseInt(string, radix);
            for ( i=1; i<=count; i++)
            {
                item +=' [li]'+jQuery('#shortcode_list_content_'+i).val()+'[/li]<br />';
            }
            item +='[/list]';
            send_to_editor(item);
        }
    </script>
<?php
    print $after_shortcode;
}

//[lis_item]
function li_func($atts, $content = null) {
    $content = str_replace("<br />", " ", $content);
    return "<li>" . do_shortcode($content) . "</li>";
}

add_shortcode('li', 'li_func');

//[list]
function list_func($atts, $content = null) {
    extract($atts);
    $content = str_replace("<br />", " ", $content);
    $return = " <ul class='styled-list " . $style . "'>" . do_shortcode($content) . "</ul>";
    return $return;
}

add_shortcode('list', 'list_func');
?>
