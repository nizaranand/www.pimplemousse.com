<?php
get_header();
$post_format_filtering = false;
if (is_tax('post_format')) {
    $post_format_filtering = true;
    global $use_tumb;
    $use_tumb=true;
}else
?>
<?php get_sidebar(); ?>
<div class="center-content">
    <div class="content-fixed-sidebar">
        <?php
        if (have_posts ())
            the_post();
        if (is_day ()) :
            $title = __(get_the_option('stonking_trans_dailyarchives', 'Daily Archives')) . ' : <span>' . get_the_date() . '</span>';
        elseif (is_month ()) :
            $title = __(get_the_option('stonking_trans_monthlyarchives', 'Monthly Archives')) . ' : <span>' . get_the_date('F Y') . '</span>';
        elseif (is_year ()) :
            $title = __(get_the_option('stonking_trans_yearlyarchives', 'Yearly Archives')) . ' : <span>' . get_the_date('Y') . '</span>';
        elseif (is_category ()):
            $cat = get_query_var('cat');
            $tilte = "catname" . $cat;
            $title .= apply_filters('single_cat_title', get_the_category_by_ID($cat));
        else :
            $title = __(get_the_option('stonking_trans_blogarchives', 'Blog Archives'));
        endif;
        if(!$post_format_filtering){
        ?>
        <div class="standard-page-title">
            <h1 class="page-title"><?php print $title; ?></h1>
        </div>
<?php
        }
        rewind_posts();
        if ($post_format_filtering) {
            get_template_part('loop', 'tumblog');
        }else
            get_template_part('loop', 'archive');
?>
    </div>
    <div class="page-width">
        <?php
        pagination();
        ?>
    </div>
</div>
<?php get_footer(); ?>
