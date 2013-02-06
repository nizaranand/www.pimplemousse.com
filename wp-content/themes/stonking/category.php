<?php 
get_header();
?>
<?php get_sidebar(); ?>
<div class="center-content">
    <div class="content-fixed-sidebar">
	<?php get_template_part('loop', 'tumblog'); ?>
	</div>
	<div class="page-width">
        <?php
        pagination();
        ?>
    </div>
</div>
<?php get_footer(); ?>
