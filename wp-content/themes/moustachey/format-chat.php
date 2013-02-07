<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php $blogFull = $general_options[ 'show_blog_full' ]; ?>
      
              <article class="article-archive format-chat" id="post-<?php the_ID(); ?>" >
              	
              	<?php if(has_post_thumbnail()) { ?>
              	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><span class="post-thumb">
              		<?php the_post_thumbnail("archive-thumb"); ?></span></a>
              	
              		
              		<div class="hgroup">
              		<div class="icon chat"></div>
              		<h2>
              		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>">
              		<?php the_title(); ?></a></h2>
              			<div class="meta top">
              					<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
              						<?php the_time(get_option('date_format')); ?>
              					<?php } else { ?>
              						<?php the_time('jS F Y') ?>
              					<?php } ?></time>
              					<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
              						<?php } ?>
              					</p>
              					<p><?php if($general_options[ 'comments_off' ] ) { ?>
              					<?php } else { ?>
              					<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?><?php _e( ' | ','meanthemes' ); ?></span>
              					<?php } ?>
              					<a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
              			  </div>
              		</div>	
              		<div class="archive-excerpt">
              		
              				<?php if($blogFull) { ?>
              					<?php global $more; $more = 0; ?>
              					<?php the_content('',FALSE,''); ?>
              				<?php } else { ?>
              					<?php global $more; $more = 0; ?>
              					<?php
              					$ismore = @strpos( $post->post_content, '<!--more-->');
              					if($ismore) : the_content('',FALSE,'');
              					else : the_excerpt();
              					endif;
              					?>
              				<?php } ?>	
              		</div>
              		<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
              	<?php } else { ?>
              			
              		<div class="hgroup">
              		<div class="icon chat"></div>
              		<h2>
              		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>">
              		<?php the_title(); ?></a></h2>
              			<div class="meta top">
              					<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
              						<?php the_time(get_option('date_format')); ?>
              					<?php } else { ?>
              						<?php the_time('jS F Y') ?>
              					<?php } ?></time>
              					</p>
              					<p>
              					<?php if($general_options[ 'comments_off' ] ) { ?>
              					<?php } else { ?>
              					<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?><?php _e( ' | ','meanthemes' ); ?></span>
              					<?php } ?>
              					<a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
              			  </div>
              		</div>	
              		<div class="archive-excerpt nothumb">
              			
              					<?php if($blogFull) { ?>
              						<?php global $more; $more = 0; ?>
              						<?php the_content('',FALSE,''); ?>
              					<?php } else { ?>
              						<?php global $more; $more = 0; ?>
              						<?php
              						$ismore = @strpos( $post->post_content, '<!--more-->');
              						if($ismore) : the_content('',FALSE,'');
              						else : the_excerpt();
              						endif;
              						?>
              					<?php } ?>	
              		
              			</div>
              				
              			<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
              		
              	<?php } ?>
              	</article>
      		<?php comments_template( '', true ); ?>
      