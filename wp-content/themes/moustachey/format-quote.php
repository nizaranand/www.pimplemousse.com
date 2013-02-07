<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>


        <article class="article-archive format-quote" id="post-<?php the_ID(); ?>" >
        	<div class="hgroup">
        	<div class="icon quote"></div>
        	<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo get_the_content(); ?></a></h2>
        	<p class="quote"><?php echo get_post_meta($post->ID, 'single_format_quote', true); ?></p>
        	</div>	
        	</article>
		<?php comments_template( '', true ); ?>
