<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php  ?>
	<?php if ( ! have_posts() ) : ?>
        <article id="post-0" class="post error404 not-found">
            <h1>
				<?php _e( 'Not Found', 'meanthemes' ); ?></h1>
                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'meanthemes' ); ?></p>
                <?php get_search_form(); ?>
        </article>
    <?php endif; ?>
    <?php ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php  ?>
        <article class="article-archive" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        	<?php if(has_post_thumbnail()) { ?>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><span class="post-thumb">
        		<?php the_post_thumbnail("archive-thumb"); ?></span></a>
        	
        			<div class="hgroup">
        			<h2>
        			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>">
        			<?php the_title(); ?></a></h2>
        				<div class="meta top">
        						<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php the_time('jS F Y') ?></time>
        						</p>
        						<p><span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?></span><?php _e( ' | ','meanthemes' ); ?><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
        				  </div>
        			</div>	
        			<div class="archive-excerpt">
        			<?php global $more; $more = 0; ?>
        			<?php
        			$ismore = @strpos( $post->post_content, '<!--more-->');
        			if($ismore) : the_content('',FALSE,'');
        			else : the_excerpt();
        			endif;
        			?>
        		
        		<div class="meta">
        				<span class="tag"><?php the_category(', '); ?></span>
        		  </div>
        		</div>	
        		<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
        		
        	<?php } else { ?>
        		<div class="hgroup">
        		<h2>
        		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>">
        		<?php the_title(); ?></a></h2>
        			<div class="meta top">
        					<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php the_time('jS F Y') ?></time>
        					</p>
        					<p><span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?></span><?php _e( ' | ','meanthemes' ); ?><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
        			  </div>
        		</div>	
        		<div class="archive-excerpt nothumb">
        		
        				<?php global $more; $more = 0; ?>
        				<?php
        				$ismore = @strpos( $post->post_content, '<!--more-->');
        				if($ismore) : the_content('',FALSE,'');
        				else : the_excerpt();
        				endif;
        				?>
        	
        		
        		<div class="meta">
        				<span class="tag"><?php the_category(', '); ?></span>
        		  </div>
        		</div>	  
        			<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
        		
        	<?php } ?>
        		
		<?php comments_template( '', true ); ?>
		</article>
<?php endwhile; ?>
<?php  ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
				<div class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'meanthemes' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'meanthemes' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>












