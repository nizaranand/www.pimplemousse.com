<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>


        <article class="article-archive format-link" id="post-<?php the_ID(); ?>" >
        	<div class="hgroup">
        		<div class="icon link"></div>
        	<h2><a href="<?php echo esc_url(get_post_meta($post->ID, 'single_format_link_url', true)); ?>" title="<?php echo get_post_meta($post->ID, 'single_format_link_text', true); ?>"><?php echo get_post_meta($post->ID, 'single_format_link_text', true); ?></a></h2>
        	<p>
        	<?php the_title(); ?></p>
        	</div>	
        	</article>
		<?php comments_template( '', true ); ?>
