<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$themename = 'Stonking';
$shortname = 'stonking';
$use_tumb = false;
$notifier_link="http://themeton.com/themes/stk/notifier.xml";
require_once TEMPLATEPATH . '/framework/framework.php';
require_once TEMPLATEPATH . '/includes/stonking.php';
$tt_framework = new wp_tt_framework();
$tt_framework->init();

function get_post_image() {
    global $post, $posts;
    $first_img = '';
   $slide_imgs=get_post_meta($post->ID,'tt_slide_images',true);
	if($slide_imgs != ''&&count($slide_imgs)>0){
		return $slide_imgs[0]['image'];
	}
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if (empty($first_img)) { //Defines a default image
        if (get_option('doma_default_avatar') != '')
                                return get_option('doma_default_avatar');
                            else
                                return get_template_directory_uri() . "/images/avatar.jpg";
    }
    return $first_img;
}

function theme_formatter($content) {
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

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

add_filter('widget_text', 'do_shortcode');
add_filter('the_content', 'theme_formatter', 99);

if ($tt_framework->admin) {
    $portfolio_image_height=(int)get_the_option('stonking_port_imgheight1col');
    $postSlide = Array(
        'name' => 'Themeton featured image',
        'id' => 'post_slider',
        'type' => 'post',
        'crop' => false,
        
    );
    //print $postSlide['size']['ratio']['full']['ratio'];
    $tt_framework->admin->addSlideMeta($postSlide);
	
    $pageSlide = Array(
        'name' => 'Themeton featured image',
        'id' => 'post_slider',
        'type' => 'page',
        'crop' => false,
        
    );
    //print $postSlide['size']['ratio']['full']['ratio'];
    $tt_framework->admin->addSlideMeta($pageSlide);
    $portfolioSlide = Array(
        'name' => 'Porfolio Image',
        'id' => 'portfolio_slider',
        'type' => 'portfolio',
        'crop' => true,
        'size' => Array('type' => 'static', 'values' => Array(
                'full' => Array('ratio' => 760/$portfolio_image_height,'value'=>3),
                '1/3' => Array('ratio' => 240/$portfolio_image_height,'value'=>1),
                '3/2' => Array('ratio' => 500/$portfolio_image_height,'value'=>2)
        )),
	'use_embed_video'=>true
    );
    $tt_framework->admin->addSlideMeta($portfolioSlide);
    $tt_framework->admin->addMeta(Array(
        'meta_boxes' => Array(
            'teaser_text' => Array('name' => 'teaser_text','rel'=>'page-blog.php', 'type' => 'text', 'description' => 'Please enter your text on bottom of your page title.', 'title' => 'Teaser text'),
            'robot_meta' => Array('name' => 'meta_robots', 'rel'=>'page-blog.php', 'type' => 'select', 'description' => 'Please select robots meta settings. By default, Googlebot will index a page and follow links to it.', 'options' => Array('default', 'noindex', 'nofollow', 'noarchive', 'noindex, nofollow', 'nofollow, noarchive', 'noindex, noarchive'), 'title' => 'Robot meta', 'std' => 'default'),
            'blog_categories' => Array('name' => 'blog_categories', 'rel'=>'page-blog.php,page-meta.php,page-tumblog.php,page-masonry.php', 'title' => 'Including blog categories', 'type' => 'terms', 'term' => 'category', 'std' => '', 'description' => 'Checked categories will include of your page. If you are not selected anything from those categories, your page will show from all categories.'),
            'port_sortable' => Array('name' => 'portfolio_sortable', 'rel'=>'page-portfolio.php', 'title' => 'Portfolio sortable?', 'type' => 'checkbox', 'std' => 'checked', 'description' => 'If checked, this portfolio page will can sort by catalog of your portfolio posts.'),
            'port_categories' => Array('name' => 'port_categories', 'rel'=>'page-portfolio.php', 'title' => 'Including portfolio categories', 'type' => 'terms', 'term' => 'catalog', 'std' => '', 'description' => 'Checked categories will include of your portfolio page. If you are not selected anyone from these categories, portfolio page will show from all categories.'),
            'port_controws' => Array('name' => 'port_controws', 'rel'=>'page-portfolio.php', 'title' => 'Content rows', 'type' => 'select', 'std' => '3', 'options' => Array('no text', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Full'), 'description' => 'Set your content rows on this portfolio page. If you are don\'t like to cut your content, you need to select option "Full".'),
            //'port_showtitle' => Array('name' => 'port_showtitle', 'rel'=>'page-portfolio.php', 'title' => 'Show title', 'type' => 'checkbox', 'std' => '', 'description' => 'Do you want to show your page title on above of your page? ??????'),
            //'port_showcontent' => Array('name' => 'port_showcontent', 'rel'=>'page-portfolio.php', 'title' => 'Show content', 'type' => 'checkbox', 'std' => '', 'description' => 'Do you want to show your page content on above of your page? ??????'),
			'home_content_latest' => Array('name' => 'home_content_latest', 'rel'=>'page-home.php', 'title' => 'Select Latest Posts', 'type' => 'checkbox', 'std' => 'checked', 'description' => 'If you are not select this, you need to select following 3 selections.'),
			'home_content1' => Array('name' => 'home_content1', 'rel'=>'page-home.php', 'title' => 'First Content', 'type' => 'postselect', 'description' => 'Select your first post content.'),
			'home_content2' => Array('name' => 'home_content2', 'rel'=>'page-home.php', 'title' => 'Second Content', 'type' => 'postselect', 'description' => 'Select your first post content.'),
			'home_content3' => Array('name' => 'home_content3', 'rel'=>'page-home.php', 'title' => 'Third Content', 'type' => 'postselect', 'description' => 'Select your first post content.'),
        )
    ));
    $portfolioImage = Array(
        'type' => 'portfolio',
        'title' => 'Portfolio Options',
        'id' => 'portfolio_additional_options',
        'meta_boxes' => Array(
            'portfolio_featured' => Array('name' => 'portfolio_featured', 'type' => 'select', 'title' => 'Ribbon of featured image', 'options' => Array('Standard', 'new', 'hot', 'featured'), 'description' => 'Option "Standard" will not show any ribbons.')
        )
    );
    $tt_framework->admin->addMeta($portfolioImage);
    $tt_framework->admin->addMeta(Array(
        'type' => 'post',
        'meta_boxes' => Array(
            'teaser_text' => Array('name' => 'teaser_text', 'type' => 'text', 'description' => 'Please enter your text on your page title.', 'title' => 'Teaser text'),
            'robot_meta' => Array('name' => 'meta_robots', 'type' => 'select', 'description' => 'Please select robots meta settings. By default, Googlebot will index a page and follow links to it.', 'options' => Array('default', 'noindex', 'nofollow', 'noarchive', 'noindex, nofollow', 'nofollow, noarchive', 'noindex, noarchive'), 'title' => 'Robot meta', 'std' => 'default'),
        )
    ));
}
$tt_framework->usePostType('portfolio');
register_nav_menus(array(
    'primary-menu' => __($themename . ' Navigation', $themename . '_admin')
        //'footer-menu' => __($themename . ' Footer Menu', $themename . '_admin')
));
add_theme_support('post-thumbnails');
add_image_size('premium-slider-thumb', 760, 350, true);
add_image_size('masonry-thumb', 370, 250, true);
add_image_size('sidebar-thumb', 160, 102, true);
add_image_size('sidebar-thumb-little', 40, 40, true);
add_image_size('post-top-thumb', 650, 250, true);
add_theme_support('post-formats', array('image', 'video', 'audio', 'link', 'quote'));
add_theme_support('themeton_setup');
if ( ! function_exists( 'themeton_setup' ) ){
	function themeton_setup() {
		add_theme_support( 'automatic-feed-links' );
	}
}
function navigation() {
    wp_nav_menu(array('theme_location' => 'primary-menu',
        'menu' => 'primary-menu',
        'menu_id' => 'menu-list',
        'container' => false,
        'menu_class' => 'main-nav sf-menu sf-vertical',
        'echo' => true,
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'depth' => 0));
}

function widgets_init() {
    // Default sidebar.
    register_sidebar(array(
        'name' => __('Sidebar right', 'stonking'),
        'id' => 'sidebarright',
        'description' => __('The default sidebar widget area', 'stonking'),
        'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));
	
	// Right sidebar.
    register_sidebar(array(
        'name' => __('Sidebar right 2', 'stonking'),
        'id' => 'sidebarright2',
        'description' => __('The right sidebar widget area', 'stonking'),
        'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));
    
    register_sidebar(array(
        'name' => __('Sidebar right single', 'stonking'),
        'id' => 'sidebarright3',
        'description' => __('The right sidebar widget area', 'stonking'),
        'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'widgets_init');

function copyright_text() {
    print '<div class="copyrights">' . stripslashes(get_the_option('stonking_copyrighttext')) . '</div>';
}

function showBrief($str, $length) {
    $str = strip_tags($str);
    $str = explode(" ", $str);
    return implode(" ", array_slice($str, 0, $length));
}

function current_title() {
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title('|', true, 'right');

    // Add the blog name.
    bloginfo('name');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        echo " | $site_description";

    // Add a page number if necessary:
    if ($paged >= 2 || $page >= 2)
        echo ' | ' . sprintf(__('Page %s', 'clean'), max($paged, $page));
}

function logo_init() {
    global $tt_framework;
    echo '<a class="logo-link" href="' . get_bloginfo('url') . '">';
    if ($tt_framework->getOption('stonking_logo_show') != 'true') {
        echo '<h1 class="site-name">' . $tt_framework->getOption('stonking_logo_text') . '</h1>';
    } else {
        echo '<img class="site-name" src="' . $tt_framework->getOption('stonking_logo_image') . '" alt=""/>';
    }
    echo '</a><div class="clearfix"></div>';
    if ($tt_framework->getOption('stonking_site_desc') == 'true') {
        echo '<div class="site-desc">' . $tt_framework->getOption('stonking_logo_description') . '</div>';
    }
}

function favicon() {
    if (get_the_option('stonking_favicon') != '') {
        echo '<link rel="shortcut icon" href="' . get_the_option('stonking_favicon') . '"/>';
    }
}

function blog_keywords() {
    global $tt_framework;
    echo '<meta name="keywords" content="' . get_bloginfo('description') . ', ' . $tt_framework->getOption('stonking_meta_keyword') . '" />';
}

function blog_description() {
    global $tt_framework;
    echo '<meta name="description" content="' . get_bloginfo('description') . ', ' . $tt_framework->getOption('stonking_meta_description') . '" />';
}

function meta_robots() {
    $robots = "";
    global $post, $tt_framework;
    if (is_page() || is_single()) {
        if (get_post_meta($post->ID, 'stonking_meta_robots', true) != 'default') {
            $robots = get_post_meta($post->ID, 'stonking_meta_robots', true);
        }
    } else {
        if ($tt_framework->getOption('stonking_meta_robots') != 'default') {
            $robots = $tt_framework->getOption('stonking_meta_robots');
        }
    }
?>
    <meta name="robots" content="<?php echo $robots; ?>" />
<?php
}

require_once(TEMPLATEPATH . '/includes/breadcrumb.php');

//breadcrumb
function the_breadcrumb() {

    if (get_the_option('stonking_breadcrumbs') == 'true') {
        if (class_exists('simple_breadcrumb')) {
            $bc = new simple_breadcrumb;
        }
    }
}

//blog pagination
function pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class='pagination'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link(1) . "'><span class='pagination-number'>" . get_the_option('stonking_trans_pgstart', '&laquo;') . "</span></a>";
        if ($paged > 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged - 1) . "'><span class='pagination-number'>" . get_the_option('stonking_trans_pgforward', '&lsaquo;') . "</span></a>";
            $nextPager="";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                if ($paged == $i){
                    echo "<span class='pagination-number active'>" . $i . "</span>" ;
                    $nextPager="next-page";
                }else{
                    echo "<a href='" . get_pagenum_link($i) . "' class='inactive ".$nextPager."' ><span class='pagination-number'>" . $i . "</span></a>";
                    $nextPager="";
                }
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged + 1) . "'><span class='pagination-number'>" . get_the_option('stonking_trans_pgnext', '&rsaquo;') . "</span></a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($pages) . "'><span class='pagination-number'>" . get_the_option('stonking_trans_pgend', '&raquo;') . "</span></a>";
        echo "</div>\n";
    }
}
if ( ! function_exists( 'themeton_comment' ) ) :
function themeton_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
?>
    <div class="post-comments">

        <div class="post-commenter-image">
        <?php echo get_avatar($comment, $size = '60', $default = '<path_to_url>', $class = 'avatar avatar-60 photo'); ?>
    </div>
    <!--<div class="post-comment">-->
    <?php
        if ($comment->comment_parent == 0)
            echo "<div class=\"post-comment\">";
        else {
            $comment_id = get_comment($comment->comment_parent);
            if ($comment_id->comment_parent == 0)
                echo "<div class=\"post-comment replay1\">";
            else {
                $comment_ids = get_comment($comment_id->comment_parent);
                if ($comment_ids->comment_parent == 0)
                    echo "<div class=\"post-comment replay2\">";
                else
                    echo "<div class=\"post-comment replay3\">";
            }
        }
    ?>
        <h3><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?></h3>
    <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.') ?></em>
            <br />
    <?php endif; ?>
            <span class="comment-date"><?php printf(__('%1$s'), get_comment_date()) ?><?php edit_comment_link(__('(Edit)'), '  ', '') ?></span>
            <span class="author"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
    <?php comment_text() ?>
            <span class="separator"><!--end of separator --></span>

        </div><!-- end post-comment -->
<?php
	}
endif;

function tt_ajax_pagenation($dondog=null,$nextSelector="div.pagination .next-page",$navSelector="div.pagination",$contentSelector=".content-fixed-sidebar",$itemSelector=".content-fixed-sidebar  div.article-block") {
?>
            
            <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.infinitescroll.js"></script>
            <script type="text/javascript">

                (window.INFSCR_jQ ? jQuery.noConflict() : jQuery)(function($){

                    // Infinite Scroll jQuery+Wordpress plugin
                    $('.content-fixed-sidebar').infinitescroll({
                        debug           : false,
                        nextSelector    : "<?php print $nextSelector; ?>",                        
                        loadingText     : "<em>Loading the next set of posts...</em>",
                        donetext        : "<em>Congratulations, you've reached the end of the internet.</em>",
                        navSelector     : "<?php print  $navSelector;?>",
                        contentSelector : "<?php print $contentSelector; ?>",
                        itemSelector    : "<?php print  $itemSelector;?>",
						loadMsgSelector:'body'
                    },function(dondog){
					
                        initScripts(dondog);
						 
                        
						if(typeof maswall!="undefined"){
						jQuery(window).unbind('smartresize.masonry');
						newElements=dondog;
						 jQuery(newElements).css('opacity', "0.0");
        var thisMasonry = jQuery(this);
        thisMasonry.addClass('notransition').masonry({
            // your masonry options
            appendedContent: $(newElements)
        }, function() {
            jQuery(newElements).animate({opacity: 1.0}, 200, 'swing');
            thisMasonry.removeClass('notransition');
            })
       
						}
					

                    });
                });	            
            </script>
<?php
        }
	if(get_the_option('stonking_blog_ajaxpagination')=='true') {
        add_action('wp_footer', 'tt_ajax_pagenation');
	}

        function reset_the_date() {
            global $previousday;
            $previousday = '';
        }
		
if ( ! isset( $content_width ) ) $content_width = 900;
?>