<?php if (have_posts ()) {
    while (have_posts ()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('article-block'); ?>>
    <?php
        $format = get_post_format();
        get_template_part('format', $format);
    ?>
        <div class="clearfix"></div>
    </div>
<?php endwhile; 
}?>