<?php
/*
 * @package Stonking
 */

get_header();
$single = true;
?>
<?php get_sidebar(); ?>
<div class="center-content">
    <?php get_sidebar('right-single'); ?>
    <div class="content-fixed-sidebar">
        <?php get_template_part('loop', 'tumblog'); ?>
    </div>
</div>
<?php get_footer(); ?>