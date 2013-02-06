<?php
/*
 * @package Stonking
 */

get_header();
$home = true;
?>
<?php get_sidebar(); ?>
<div class="center-content">
    <div class="content-fixed-sidebar">
        <?php		
        get_template_part('loop', 'tumblog');
        ?>
    </div>
</div>


<?php get_footer(); ?>