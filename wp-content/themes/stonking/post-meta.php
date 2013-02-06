<?php 
$showmeta = false;
if(is_single() && get_the_option('stonking_single_postmeta')=='true') { $showmeta = true; }
else if(is_page() && get_the_option('stonking_page_postmeta')=='true') { $showmeta = true; }
else if(get_the_option('stonking_blog_postmeta')=='true') { $showmeta = true; }
?>
<?php if($showmeta) { ?>
<div class="tumblog-meta">
    <ul class="tumblog-meta-list">
        <li class="date-icon"><a href="#"> <?php reset_the_date(); the_date(); ?></a></li>
        <li class="comment-icon"><a href="<?php comments_link(); ?>"><?php comments_number(get_the_option('stonking_trans_nocomments'),get_the_option('stonking_trans_onecomment'),'% '.get_the_option('stonking_trans_comments')); ?></a></li>
        <li class="category-icon"><?php printf(get_the_category_list( ', ' ) ); ?></li>
    </ul>
</div>
<?php } ?>