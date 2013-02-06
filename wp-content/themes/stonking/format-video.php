<div class="article with-meta">
    <?php 
		global $pageType;
		if (isset($pageType) && $pageType == "masonry")
			postSlideImage();
		else
			echo get_post_meta($post->ID, 'video-embed', true); ?>
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
            <a href="<?php echo get_post_format_link(get_post_format()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-tumblog-video.png" width="80" height="80" alt="Video"/></a>
        </div>
    </div>
</div>
<?php }?>