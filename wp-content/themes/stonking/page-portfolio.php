<?php
/*
 * Template name: Portfolio
 */
wp_register_script('theme-masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js');
//wp_register_script('theme-portfolio', get_template_directory_uri() . '/js/portfolio_scripts.js');
wp_enqueue_script('jquery');
wp_enqueue_script('theme-masonry');
add_action('wp_footer', 'portfolio_script');

function portfolio_script() {
?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/portfolio_scripts.js"></script>
<?php
}

wp_enqueue_script('theme-portfolio');
get_header();

$taxonomy = 'catalog';
$myPageId = $post->ID;

$optionss = get_post_meta($myPageId, 'themeton_additional_options', true);
$rows = $optionss['port_controws'] ? $optionss['port_controws'] : 3;

$col_1_3 = 35;
$col_2_3 = 80;
$col_3_3 = 110;
$col_1_3_title = 25;
$col_2_3_title = 60;
$col_3_3_title = 80;
$aa = $optionss['port_categories'];

$number = get_the_option('stonking_port_postnumber');
if (get_query_var('paged')) {

    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {

    $paged = get_query_var('page');
} else {

    $paged = 1;
}

$portfolioQuery = Array(
    'post_type' => 'portfolio',
    'posts_per_page' => $number,
	'paged'=>$paged
);
//global $paged;


if ($aa) {
    $portfolioQuery['tax_query'] = Array(Array(
	    'taxonomy' => 'catalog',
	    'terms' => $aa,
	    'field' => 'slug'
	)
    );
    // print_r($portfolioQuery);
    //$portfolioQuery['terms'] =$;
    //$typ='terms';
}
?>
<?php get_sidebar(); ?>
<div class="center-content">
    <div class="masonry-content masoned">
	<?php
//wp_reset_query();
//$wp_query = new WP_Query();
//$wp_query->query($portfolioQuery);
	query_posts($portfolioQuery);
	global $more;
	$mymore = $more;
	$more = false;
	?>
	<?php
	if (have_posts ())
	    while (have_posts ()) : the_post();
		$portfolio_col = get_post_meta($post->ID, 'tt_slide_size', true);
		$portfolio_embed = get_post_meta($post->ID, 'tt_slide_embed', true);
		
		if ($portfolio_embed == '')
		    $portfolio_images = get_post_meta($post->ID, 'tt_slide_images', true);
		else
		    $portfolio_images='';
		if ($portfolio_col == '') {
		    $portfolio_col = 1;
		}
		$portfolio_additionals = get_post_meta($post->ID, 'portfolio_additional_options', true);
		$args = array('orderby' => 'none');
		$cats = wp_get_post_terms($post->ID, $taxonomy, $args);
		$filters = "";
		foreach ($cats as $catalog) {
		    $filters .= "masonry-" . $catalog->slug . " ";
		}
	?>
		<div class="masonry col-<?php print $portfolio_col . ' ' . $filters; ?> ">
		    <div class="masoned-article">
		<?php
		
		if ($portfolio_embed != '') {
		?>
			<div class="article-image">
			    <?php
			    print $portfolio_embed;
			    ?>
			</div>
		<?php
		}
		?>

		<?php if ($portfolio_images != '' && count($portfolio_images) > 0) {
		?>
		<?php
		    if ($portfolio_additionals['portfolio_featured'] && $portfolio_additionals['portfolio_featured'] != 'Standard') {
			$portfolio_featured_pre = $portfolio_additionals['portfolio_featured'];
		?>

			<div class="ribbon"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php print $portfolio_featured_pre; ?>-item.png" alt="featured"/></div>
		<?php } ?>

		<?php print count($portfolio_images) > 1 ? '<div class="hover-content"><div class="article-image-slide zoom">' : '<div class="article-image zoom"><div class="hover-content">' ?>

		<?php foreach ($portfolio_images as $portfolio_image) {
			$icomZP = $portfolio_image['media'] ? 'iconPlay' : 'iconZoom';
			$relll = 'rel="prettyPhoto['. $post->ID .']"';
			$linkkk = $portfolio_image['media'] ? $portfolio_image['media'] : $portfolio_image['image'];
			if(get_the_option("stonking_port_featuredimage_link") != 'true') {
				$linkkk = get_permalink();
				$relll = '';
				$icomZP = '';
			}
 ?>
			<a class="preload imgMedium item-preview <?php print $icomZP; ?>" href="<?php print $linkkk; ?>" <?php print $relll; ?>>
			    <img src="<?php print $portfolio_image['image_thumb'] ? $portfolio_image['image_thumb'] : $portfolio_image['image']; ?>" alt=""/>
			</a>
<?php } ?>

<?php print count($portfolio_images) > 1 ? '</div>' : ''; ?>
    		<div class="hover-info">
    		    <ul class="hover-share">
			<?php
			if (get_the_option('stonking_port_socialtwitter') == 'true')
			    print '<li><a href="http://twitter.com/share?url=' . urlencode(get_permalink($post->ID)) . '&text=' . get_the_title($post->ID) . '" target="blank"><img src="' . get_template_directory_uri() . '/images/twitter.png"  alt="Tweet this"/></a></li>';
			if (get_the_option('stonking_port_socialfacebook') == 'true')
			    print '<li><a href="http://www.facebook.com/sharer.php?u=' . urlencode(get_permalink($post->ID)) . '&t=' . get_the_title($post->ID) . '" target="blank"><img src="' . get_template_directory_uri() . '/images/facebook.png" alt="Tweet this"/></a></li>';
			if (get_the_option('stonking_port_socialdigg') == 'true')
			    print '<li><a href="http://digg.com/submit?url' . urlencode(get_permalink($post->ID)) . '&title=' . get_the_title($post->ID) . '" target="blank"><img src="' . get_template_directory_uri() . '/images/digg.png" alt="Tweet this"/></a></li>';
			if (get_the_option('stonking_port_socialdelicios') == 'true')
			    print '<li><a href="http://del.icio.us/post?url=' . urlencode(get_permalink($post->ID)) . '&t=' . get_the_title($post->ID) . '" target="blank"><img src="' . get_template_directory_uri() . '/images/delicious.png" alt="Tweet this"/></a></li>';
			?>
                    </ul>
                </div>
		<?php
			print count($portfolio_images) > 1 ? '' : '</div>';
			print '</div>';
		?>

<?php } ?>
    		<div class="article-content">
		    <?php
		    if ($rows != 'Full') {
				$title_length = $col_1_3_title;
				$content_length = $col_1_3 * $rows;
				if ($portfolio_col == '2') {
					$content_length = $col_2_3 * $rows;
					$title_length = $col_2_3_title;
				} else if ($portfolio_col == '3') {
					$content_length = $col_3_3 * $rows;
					$title_length = $col_3_3_title;
				}
				$p_title = substr(get_the_title(), 0, $title_length);
		    } else {
				$p_title = get_the_title();
		    }
		    ?>
		    <a href="<?php the_permalink(); ?>"><h1 class="article-title"><?php print $p_title; ?></h1></a>
                    <div class="portfolio-content single-sidebar-box">
			<?php
			if ($rows == 'no text') {}
			else if ($rows != 'Full') {
			    print '<p>' . substr(get_the_content(), 0, $content_length);
			    if (get_the_option('stonking_port_readmore') != 'true')
				print ' <a href="' . get_permalink() . '">' . get_the_option('stonking_trans_readmore') . '</a>';
			    print '</p>';
			} else {
				the_content(__(get_the_option('stonking_trans_readmore', 'Read more'), 'stonking'));
			}
			?>
                    </div>
                </div>
            </div>
        </div>
	<?php
			endwhile;
		    if (isset($optionss['port_categories'])) {
			$catalogs = $optionss['port_categories'];
		    }else
			$catalogs = get_terms($taxonomy);
	?>
	        </div>
    <?php if ($optionss['portfolio_sortable'] == 'true') { ?>
		        <script language="javascript">
		    	jQuery(document).ready(function(){
		    	    jQuery('.navigation li.current_page_item').append('<div class="portfolio-filter">'+
<?php
			print "'<div class=\"portfolio-filter-item\"><a class=\"filtered\" href=\"#" . 'all' . "\">" . 'All' . "</a></div>'+";
			foreach ($catalogs as $catalog) {
			    $catl = $catalog;
			    if (isset($optionss['port_categories'])) {
					$catl = get_term_by('slug', $catl, 'catalog');
			    }
			    print "'<div class=\"portfolio-filter-item\"><a href=\"#" . $catl->slug . "\">" . $catl->name . "</a></div>'+";
			}
?>
		    '</div>');
		    Cufon.refresh();
		    });
		        </script>


		        <div class="page-masonry">
	<?php
		    }
		    pagination();
	?>
	        </div>

	    </div>
<?php
		    if (has_action('wp_footer', 'tt_ajax_pagenation')) {
			remove_action('wp_footer', 'tt_ajax_pagenation');
			tt_ajax_pagenation('', "div.pagination .next-page", "div.pagination", ".masonry-content", ".masonry-content  div.masonry");
		    };
		    get_footer(); ?>