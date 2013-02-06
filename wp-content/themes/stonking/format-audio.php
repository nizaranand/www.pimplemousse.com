<div class="article with-meta">
    <?php
        postSlideImage();
    ?>
    <div class="audio_player"><embed width="650" height="32" flashvars="skin=<?php echo get_template_directory_uri() ?>/framework/includes/player/skin.swf&amp;file=<?php echo get_post_meta($post->ID, 'tt-audio-link',true); ?>&amp;backcolor=000000&amp;frontcolor=FFFFFF" wmode="opaque" allowscriptaccess="always" allowfullscreen="true" quality="high" name="mpl" id="mpl" style="undefined" src="<?php echo get_template_directory_uri() ?>/framework/includes/player/player.swf" type="application/x-shockwave-flash"></div>
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
            <a href="<?php echo get_post_format_link(get_post_format()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-tumblog-audio.png" width="80" height="80" alt="Video"/></a>
        </div>
    </div>
</div>
<?php }?>