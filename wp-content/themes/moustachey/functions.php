<?php

/* #######################################################################

	Theme Support & Content width

####################################################################### */

load_theme_textdomain( 'meanthemes', TEMPLATEPATH.'/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
	
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support('post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio'));
if ( ! isset( $content_width ) )
	$content_width = 540;


/* #######################################################################

	Custom Image Sizes

####################################################################### */

add_image_size( 'single-thumb', 660, 9999, false );
add_image_size( 'archive-thumb', 940, 9999, false );
add_image_size( 'standard-thumb', 940, 9999, false );
add_image_size( 'fullwidth-thumb', 940, 9999, false );
add_image_size( 'rss-thumb', 330, 9999, false );

/* #######################################################################

	Register Sidebars for Widgets

####################################################################### */

if ( function_exists('register_sidebar') )
	register_sidebar(array(
			'name' => __( 'Archive Widget Area', 'meanthemes' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
			'name' => __( 'Page Widget Area', 'meanthemes' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));
		
if ( function_exists('register_sidebar') )
	register_sidebar(array(
			'name' => __( 'Footer Widget Area', 'meanthemes' ),
			'before_widget' => '<div class="footer-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));
		


/* #######################################################################

	Register Widgets

####################################################################### */

 /**
 * Adds meanthemes_video_widget widget.
 */
class meanthemes_video_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'meanthemes_video_widget', // Base ID
			'Custom Video Widget', // Name
			array( 'description' => __( 'Choose a video to display in your sidebar', 'meanthemes' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$video = apply_filters( 'video', $instance['video'] );

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		?>
				<?php echo balanceTags( $video ); ?>
		<?php
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = esc_attr( $new_instance['title'] );
		$instance['video'] = balanceTags( $new_instance['video'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
			$video = $instance[ 'video' ];
		}
		else {
			$title = __( 'Video', 'meanthemes' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'meanthemes' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'video' ); ?>"><?php _e( 'Insert your embed code here, make sure you set width to 253px:' , 'meanthemes' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'video' ); ?>" name="<?php echo $this->get_field_name( 'video' ); ?>" value="<?php echo esc_attr( $video ); ?>"><?php echo esc_attr( $video ); ?></textarea>
		
		</p>
		<?php 
	}

} // class meanthemes_video_widget

add_action( 'widgets_init', create_function( '', 'register_widget( "meanthemes_video_widget" );' ) );

/* #######################################################################

	Register Menus

####################################################################### */

register_nav_menus( array(
	'primary' => 'Main Menu'
) );

/* #######################################################################

	Get the topmost ancestor of current page

####################################################################### */

if(!function_exists('get_post_top_ancestor_id')){
	/**
	 * @uses object $post
	 * @return int
	 */
	function get_post_top_ancestor_id(){
		global $post;

		if($post->post_parent){
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			return $ancestors[0];
		}

		return $post->ID;
	}}

/* #######################################################################

	Custom Meta for Single to deal with Post Formats

####################################################################### */

add_action("admin_init", "single_format_init");
add_action('save_post', 'save_single_format_meta');

	function single_format_init(){
		add_meta_box("single_format-meta", __("Post Formats:" , "meanthemes"), "single_format_meta_options", "post", "normal", "core");
	}

	function single_format_meta_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$single_format_link_url = $custom["single_format_link_url"][0];
		$single_format_link_text = $custom["single_format_link_text"][0];
		$single_format_video = $custom["single_format_video"][0];
		$single_format_audio = $custom["single_format_audio"][0];
		$single_format_audio_oga = $custom["single_format_audio_oga"][0];
		$single_format_quote = $custom["single_format_quote"][0];
		
?>
	<div>
		<div><i><?php _e("To keep things simple, please fill out the following below per post format, you must ensure you also choose the right post format from the 'Format' panel for the below to work" , "meanthemes"); ?></i></div>
		<h4><?php _e("Link Format" , "meanthemes"); ?></h4>
		<label><?php _e("URL (Web Address):" , "meanthemes"); ?></label><br /><input name="single_format_link_url" type="text" value="<?php echo $single_format_link_url; ?>" class="large-text" /><br />
		<label><?php _e("Link text" , "meanthemes"); ?></label><br /><input name="single_format_link_text" type="text" value="<?php echo $single_format_link_text; ?>" class="large-text" /><br />
		<h4><?php _e("Video Format:" , "meanthemes"); ?></h4>
		<label><?php _e("Video Embed Code:" , "meanthemes"); ?></label><br />
		<textarea class="large-text" name="single_format_video" rows="10" value="<?php echo esc_attr($single_format_video); ?>"><?php echo esc_attr($single_format_video); ?></textarea>
		<br />
<h4><?php _e("Audio Format (mp3):" , "meanthemes"); ?></h4>
<label><?php _e("Audio Web Address (URL - you can upload via WordPress and then copy link into here):" , "meanthemes"); ?></label><br />
<input name="single_format_audio" type="text" value="<?php echo $single_format_audio; ?>" class="large-text" /><br />
<h4><?php _e("Audio Format (oga):" , "meanthemes"); ?></h4>
<label><?php _e("Audio Web Address (URL - you can upload via WordPress and then copy link into here):" , "meanthemes"); ?></label><br />
<input name="single_format_audio_oga" type="text" value="<?php echo $single_format_audio_oga; ?>" class="large-text" /><br />
<br />
		<h4><?php _e("Quote Format" , "meanthemes"); ?></h4>
		<label><?php _e("Source:" , "meanthemes"); ?></label><br /><input name="single_format_quote" type="text" value="<?php echo $single_format_quote; ?>" class="large-text" /><br /><br />
		
		</div>
		
<?php
	}

function save_single_format_meta(){
	global $post;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	return $post->ID;
	} else {
	update_post_meta($post->ID, "single_format_link_url", $_POST["single_format_link_url"]);
	update_post_meta($post->ID, "single_format_link_text", $_POST["single_format_link_text"]);
	update_post_meta($post->ID, "single_format_video", balanceTags( $_POST["single_format_video"] ) );
	update_post_meta($post->ID, "single_format_audio", $_POST["single_format_audio"]);
	update_post_meta($post->ID, "single_format_audio_oga", $_POST["single_format_audio_oga"]);
	update_post_meta($post->ID, "single_format_quote", $_POST["single_format_quote"]);
	}
}

add_action("admin_init", "single_format_init");
add_action('save_post', 'save_single_format_meta');
	

/* #######################################################################

	Comments & Password Protect Setup

####################################################################### */

add_filter('the_password_form','my_password_form');
function my_password_form($text){
$text='<div class="password-protect">'.$text.'</div>';
return $text;
}

function post_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case '' :
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		
		<?php echo get_avatar( $comment, 50 ); ?>

		
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<div class="comment-body"><em><?php _e( 'Your comment is awaiting moderation.', 'meanthemes' ); ?></em></div>
		<?php endif; ?>
		
		<div class="comment-body">
			<p><?php comment_author_link(); ?>
			<a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php comment_date(); _e(' at ','meanthemes'); comment_time(); ?></a><?php edit_comment_link( __( '(Edit)', 'meanthemes' ), ' ' ); ?></p>
			<div class="comment-text"><?php comment_text(); ?></div>
			
		<div class="comment-reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
		</div>
	</div>
	<?php
	break;
case 'pingback'  :
case 'trackback' :
?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:','meanthemes' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'meanthemes' ), ' ' ); ?></p>
	<?php

	break;
	endswitch;
}

/* #######################################################################

	Alter Comment Form

####################################################################### */

function alter_comment_form_fields($fields){
	$fields['author'] = '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' . '<label for="author">' . __( 'Name','meanthemes' ) . '<span class="required"> *</span></label>'.  ( $req ? '' : '' ) .'</p>';
	$fields['email'] = '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_email'] ) . '" size="30"' . $aria_req . ' />' . '<label for="email">' . __( 'Email','meanthemes' ) . '<span class="required"> *</span></label>'. ( $req ? '' : '' ) .'</p>';
	$fields['url'] = '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_url'] ) . '" size="30"' . $aria_req . ' />' . '<label for="author">' . __( 'Website','meanthemes' ) . '</label>'. ( $req ? '' : '' ) .'</p>';
	return $fields;
}
add_filter('comment_form_default_fields','alter_comment_form_fields');

/* #######################################################################

	Add page type to <body> class

####################################################################### */

function page_bodyclass() {
	global $wp_query;
	$page = '';
	$page = $wp_query->query_vars["pagename"];
	echo $page;
}

/* #######################################################################

	Control size of excerpts

####################################################################### */


function excerpt_clip($string, $word_limit) {
 
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
 
	$words = explode(' ', $string);
 
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
 
	return implode(' ', array_slice($words, 0, $word_limit));
 
}


/* #######################################################################

	Shortcodes

####################################################################### */

function meanthemes_col_one_third( $atts, $content = null ) {
	return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'meanthemes_col_one_third');

function meanthemes_col_one_third_last( $atts, $content = null ) {
	return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'meanthemes_col_one_third_last');

function meanthemes_col_two_third( $atts, $content = null ) {
	return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'meanthemes_col_two_third');

function meanthemes_col_two_third_last( $atts, $content = null ) {
	return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'meanthemes_col_two_third_last');

function meanthemes_col_one_half( $atts, $content = null ) {
	return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'meanthemes_col_one_half');

function meanthemes_col_one_half_last( $atts, $content = null ) {
	return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'meanthemes_col_one_half_last');

function meanthemes_col_one_fourth( $atts, $content = null ) {
	return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'meanthemes_col_one_fourth');

function meanthemes_col_one_fourth_last( $atts, $content = null ) {
	return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'meanthemes_col_one_fourth_last');

function meanthemes_col_three_fourth( $atts, $content = null ) {
	return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'meanthemes_col_three_fourth');

function meanthemes_col_three_fourth_last( $atts, $content = null ) {
	return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'meanthemes_col_three_fourth_last');

function meanthemes_col_one_fifth( $atts, $content = null ) {
	return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'meanthemes_col_one_fifth');

function meanthemes_col_one_fifth_last( $atts, $content = null ) {
	return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'meanthemes_col_one_fifth_last');

function meanthemes_col_two_fifth( $atts, $content = null ) {
	return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'meanthemes_col_two_fifth');

function meanthemes_col_two_fifth_last( $atts, $content = null ) {
	return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'meanthemes_col_two_fifth_last');

function meanthemes_col_three_fifth( $atts, $content = null ) {
	return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'meanthemes_col_three_fifth');

function meanthemes_col_three_fifth_last( $atts, $content = null ) {
	return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'meanthemes_col_three_fifth_last');

function meanthemes_col_four_fifth( $atts, $content = null ) {
	return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'meanthemes_col_four_fifth');

function meanthemes_col_four_fifth_last( $atts, $content = null ) {
	return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'meanthemes_col_four_fifth_last');

function meanthemes_col_one_sixth( $atts, $content = null ) {
	return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'meanthemes_col_one_sixth');

function meanthemes_col_one_sixth_last( $atts, $content = null ) {
	return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'meanthemes_col_one_sixth_last');

function meanthemes_col_five_sixth( $atts, $content = null ) {
	return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'meanthemes_col_five_sixth');

function meanthemes_col_five_sixth_last( $atts, $content = null ) {
	return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'meanthemes_col_five_sixth_last');

function meanthemes_clear( $atts, $content = null ) {
	return '<div class="clear">' . do_shortcode($content) . '</div>';
}
add_shortcode('clear', 'meanthemes_clear');

function meanthemes_status_ok( $atts, $content = null ) {
	return '<div class="status ok">' . do_shortcode($content) . '</div>';
}
add_shortcode('status_ok', 'meanthemes_status_ok');

function meanthemes_status_oops( $atts, $content = null ) {
	return '<div class="status oops">' . do_shortcode($content) . '</div>';
}
add_shortcode('status_oops', 'meanthemes_status_oops');

function meanthemes_status_lessoops( $atts, $content = null ) {
	return '<div class="status less-oops">' . do_shortcode($content) . '</div>';
}
add_shortcode('status_lessoops', 'meanthemes_status_lessoops');

function meanthemes_amore( $atts, $content = null ) {
	return '<span class="more">' . do_shortcode($content) . '</span>';
}
add_shortcode('amore', 'meanthemes_amore');

function meanthemes_highlight( $atts, $content = null ) {
	return '<span class="highlight">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight', 'meanthemes_highlight');

function button( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'url' => '#',
	'target' => '_self',
	'style' => 'grey',
	'size' => 'small'
	), $atts));

	return '<a target="'.$target.'" class="button '.$size.' '.$style.'" href="'.$url.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'button');

function bullets( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'style' => 'green',
	'type' => 'tick'
	), $atts));

	return '<div class="bullets '.$type.' '.$style.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('bullets', 'bullets');

function toggle( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'title'    	 => 'Title goes here',
		'state'		 => 'open'
    ), $atts));

	return "<div data-id='".$state."' class=\"toggle\"><span class=\"toggle-title\">". $title ."</span><div class=\"toggle-inner\">". do_shortcode($content) ."</div></div>";
}
add_shortcode('toggle', 'toggle');


function tabs( $atts, $content = null ) {
	$defaults = array();
	extract( shortcode_atts( $defaults, $atts ) );
	
	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	
	$tab_titles = array();
	if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
	
	$output = '';
	
	if( count($tab_titles) ){
	    $output .= '<div id="tabs-'. rand(1, 100) .'" class="mt-tabs"><div class="tab-inner">';
		$output .= '<ul class="nav clearfix">';
		
		foreach( $tab_titles as $tab ){
			$output .= '<li><a href="#tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
		}
	    
	    $output .= '</ul>';
	    $output .= do_shortcode( $content );
	    $output .= '</div></div>';
	} else {
		$output .= do_shortcode( $content );
	}
	
	return $output;
}
add_shortcode( 'tabs', 'tabs' );

function tab( $atts, $content = null ) {
	$defaults = array( 'title' => 'Tab' );
	extract( shortcode_atts( $defaults, $atts ) );
	
	return '<div id="tab-'. sanitize_title( $title ) .'" class="tab">'. do_shortcode( $content ) .'</div>';
}
add_shortcode( 'tab', 'tab' );

function format_shortcodes($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}
	return $new_content;
}

add_filter('the_content', 'format_shortcodes', 99);
add_filter('widget_text', 'format_shortcodes', 99);

// Add these as drop down options too
function themeit_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );


function themeit_tiny_mce_before_init( $settings ) {
  $settings['theme_advanced_blockformats'] = 'p,a,div,span,h1,h2,h3,h4,h5,h6,tr,';

  $style_formats = array(
     array( 'title' => __('1 Third Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'one_third last' ),
     array( 'title' => __('2 Thirds Col.','meanthemes'), 'block'    => 'div',  'classes' => 'two_third' ),
     array( 'title' => __('2 Thirds Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'two_third last' ),
     array( 'title' => __('1 Half Col.','meanthemes'), 'block'    => 'div',  'classes' => 'one_half' ),
     array( 'title' => __('1 Half Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'one_half last' ),
     array( 'title' => __('1 Fourth Col.','meanthemes'), 'block'    => 'div',  'classes' => 'one_fourth' ),
     array( 'title' => __('1 Fourth Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'one_fourth last' ),
     array( 'title' => __('3 Fourths Col.','meanthemes'), 'block'    => 'div',  'classes' => 'three_fourth' ),
     array( 'title' => __('3 Fourths Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'three_fourth last' ),
     array( 'title' => __('1 Fifth Col.','meanthemes'), 'block'    => 'div',  'classes' => 'one_fifth' ),
     array( 'title' => __('1 Fifth Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'one_fifth last' ),
     array( 'title' => __('2 Fifths Col.','meanthemes'), 'block'    => 'div',  'classes' => 'two_fifth' ),
     array( 'title' => __('2 Fifths Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'two_fifth last' ),
     array( 'title' => __('3 Fifths Col.','meanthemes'), 'block'    => 'div',  'classes' => 'three_fifth' ),
     array( 'title' => __('3 Fifths Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'three_fifth last' ),
     array( 'title' => __('4 Fifths Col.','meanthemes'), 'block'    => 'div',  'classes' => 'four_fifth' ),
     array( 'title' => __('4 Fifths Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'four_fifth last' ),
     array( 'title' => __('1 Sixth Col.','meanthemes'), 'block'    => 'div',  'classes' => 'one_sixth' ),
     array( 'title' => __('1 Sixth Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'one_sixth last' ),
     array( 'title' => __('5 Sixths Col.','meanthemes'), 'block'    => 'div',  'classes' => 'five_sixth' ),
     array( 'title' => __('5 Sixths Col. Last','meanthemes'), 'block'    => 'div',  'classes' => 'five_sixth last' ),
     array( 'title' => __('Clear','meanthemes'), 'block'    => 'div',  'classes' => 'clear' ),
     array( 'title' => __('Status - OK','meanthemes'), 'block'    => 'div',  'classes' => 'status ok' ),
     array( 'title' => __('Status - Oops','meanthemes'), 'block'    => 'div',  'classes' => 'status oops' ),
     array( 'title' => __('Status - Less Oops','meanthemes'), 'block'    => 'div',  'classes' => 'status less-oops' ),
     array( 'title' => __('More link','meanthemes'), 'inline'    => 'span',  'classes' => 'more' ),
     
  );

  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}
add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );

/* include thumbnail in RSS feed */
function add_thumb_to_RSS($content) {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ){
	$content = '<div>' . get_the_post_thumbnail( $post->ID, 'rss-thumb' ) . '</div>' . $content;
	}
	if ( (get_post_meta($post->ID, 'single_format_audio', true)) || (get_post_meta($post->ID, 'single_format_audio_oga', true)) ) {
	$meta = '<p><strong>' . __('Audio Link(s): ', 'meanthemes'). '</strong><p>' . get_post_meta($post->ID, 'single_format_audio', true) . '</p><p>' . get_post_meta($post->ID, 'single_format_audio_oga', true) . '</p>';
	}
	if ( get_post_meta($post->ID, 'single_format_video', true) ) {
	$meta = '<p><strong>' . __('Video Post', 'meanthemes') . '</strong></p>';
	}
	if ( get_post_meta($post->ID, 'single_format_link_url', true) ) {
	$meta = '<p><strong>' . __('Link Post: ', 'meanthemes') . '</strong>' . get_post_meta($post->ID, 'single_format_link_url', true) . '</p><p>' . '<p><strong>' . __('Link Text: ', 'meanthemes') . '</strong>' . get_post_meta($post->ID, 'single_format_link_text', true) . '</p>';
	}
	if ( get_post_meta($post->ID, 'single_format_quote', true) ) {
	$meta = '<p><strong>' . __('Quote Source: ', 'meanthemes') . '</strong>' . get_post_meta($post->ID, 'single_format_quote', true) . '</p>';
	}
	return $content . $meta;
}
add_filter('the_excerpt_rss', 'add_thumb_to_RSS');
add_filter('the_content_feed', 'add_thumb_to_RSS');

/* #######################################################################

	Load MeanThemes framework files

####################################################################### */
?>
<?php
$basedir = get_template_directory() . '/framework/';
require_once($basedir .'meanthemes.php');
?>
