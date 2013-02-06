<div class="article with-meta">
    <?php postSlideImage(); ?>
    <div class="article-content">
        <?php get_template_part('post', 'title'); ?>
        <?php get_template_part('post','meta'); ?>
        <?php get_template_part('post', 'content'); ?>
		<?php get_template_part('post', 'author'); ?>
		<?php get_template_part('post', 'comment'); ?>
    </div>
</div>
<?php global $use_tumb;  if($use_tumb){?>
<div class="article-fixed-meta tubmlog">
    <div class="tumblog-head">
        <div class="tumblog-icon">
            <a href="<?php echo get_post_format_link(get_post_format()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-tumblog-image.png" width="80" height="80" alt="Image"/></a>
        </div>
    </div>
</div>
<?php } ?>