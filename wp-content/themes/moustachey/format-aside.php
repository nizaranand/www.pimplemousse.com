<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>


        <article class="article-archive format-aside" id="post-<?php the_ID(); ?>" >
        	<div class="hgroup">
        		<div class="icon aside"></div>
	        	<p class="aside"><?php echo get_the_content(); ?></p>
        		<div class="meta">
        				<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
        					<?php the_time(get_option('date_format')); ?>
        				<?php } else { ?>
        					<?php the_time('jS F Y') ?>
        				<?php } ?></time>
        				</p>
        		  </div>
        	</div>	
        	</article>
		<?php comments_template( '', true ); ?>
