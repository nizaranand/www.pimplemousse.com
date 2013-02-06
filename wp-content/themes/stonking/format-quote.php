<div class="article with-meta">
    <div class="content-testiominals for-quote-format">
        <div class="testiominals-item" ><span><?php print get_post_meta($post->ID, 'tt_quote_text',true);?>
            </span>
            <div class="testiominals-name"><?php $quote_link=get_post_meta($post->ID, 'tt_quote_link',true); if($quote_link!='') print '<a href="'.$quote_link.'">';?><?php print get_post_meta($post->ID, 'tt_quote_author',true); if($quote_link!='') print '</a>'; ?></div>
        </div>
    </div>
    <div class="article-content">
        <?php get_template_part('post', 'title'); ?>
        <?php get_template_part('post', 'meta'); ?>
        <?php get_template_part('post', 'content'); ?>
		<?php get_template_part('post', 'author'); ?>
		<?php get_template_part('post', 'comment'); ?>
    </div>
</div>
<?php global $use_tumb;
        if ($use_tumb) { ?>
            <div class="article-fixed-meta tubmlog">
                <div class="tumblog-head">
                    <div class="tumblog-icon">
                        <a href="<?php echo get_post_format_link(get_post_format()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-tumblog-quote.png" width="80" height="80" alt="Quote"/></a>
                    </div>
                </div>
            </div>
<?php } ?>