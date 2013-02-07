<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>


        <article class="article-archive format-status" id="post-<?php the_ID(); ?>" >
        	<div class="hgroup">
        	<div class="icon update"></div>
        	<h2>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        		<div class="meta">
        				<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
        					<?php the_time(get_option('date_format')); ?>
        				<?php } else { ?>
        					<?php the_time('jS F Y') ?>
        				<?php } ?></time>
        				<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
        					<?php } ?>
        				</p>
        		  </div>
        	</div>	
        	
        	</article>
		<?php comments_template( '', true ); ?>
