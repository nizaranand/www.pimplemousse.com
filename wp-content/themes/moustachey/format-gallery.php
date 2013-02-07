<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php $blogFull = $general_options[ 'show_blog_full' ]; ?>

        <article class="article-archive format-gallery" id="post-<?php the_ID(); ?>" >
        	
        	<div class="flexslider">
        		<ul class="slides">
        		<?php
        		if(!has_post_thumbnail()) { ?>
        			
        			<?php } else { ?>
        			<?php if( ($general_options[ 'no_thumbnail_gallery' ]) ) { ?>
        			<?php } else { ?>
        			    
        				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><span class="post-thumb"><?php the_post_thumbnail("single-thumb"); ?></span></a></li>			         			
        			<?php } 
        			}	
        		// strip attachments and add into gallery rotator
        				
        				$args = array(
        				    'orderby' => 'menu_order',
        				    'order' => 'ASC',
        				    'post_type' => 'attachment',
        				    'post_parent' => $post->ID,
        				    'post_mime_type' => 'image',
        				    'post_status' => null,
        				    'numberposts' => -1
        				);
        				$attachments = get_posts($args);
        				if( !empty($attachments) ) {
        				    $i = 0;
        				    foreach( $attachments as $attachment ) {
        				        if( $attachment->ID == $thumbid ) continue;
        				        $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
        				        $caption = $attachment->post_excerpt;
        				        $caption = ($caption) ? $caption : $posttitle;
        				        $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
        				        echo "<li><img class='img-width' src='$src[0]' alt='$alt' /></li>";
        				        $i++;
        				    }
        				}			
        							
        						?>	
        		</ul>
        		
        	</div>				
        				<div class="flex-container"></div>	
        				<div class="hgroup">
        				<div class="icon gallery"></div>
        				<h2>
        				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>">
        				<?php the_title(); ?></a></h2>
        					<div class="meta top">
        							<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " >
        							<?php if($general_options[ 'use_admin_date' ] ) { ?>
        								<?php the_time(get_option('date_format')); ?>
        							<?php } else { ?>
        								<?php the_time('jS F Y') ?>
        							<?php } ?>
        							</time>
        							<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
        								<?php } ?>
        							</p>
        							<p>
        							<?php if($general_options[ 'comments_off' ] ) { ?>
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
        		
        		<div class="meta">
        				<span class="tag"><?php the_category(', '); ?></span>
        		  </div>
        		<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
        		</div>	
        		
        	
        	</article>
        	<script>
	        	jQuery(window).load(function() {
	        	  jQuery('#post-<?php the_ID(); ?> .flexslider').flexslider({
	        	    controlsContainer: '#post-<?php the_ID(); ?> .flex-container',
	        	    smoothHeight: true,
	        	    animation: "slide",
	        	    slideshow: false,
	        	    directionNav: true, 
	        	    controlNav: false,
	        	    prevText: "<?php _e('< Previous','meanthemes'); ?>",
	        	    nextText: "<?php _e('Next >','meanthemes'); ?>" 
	        	  });
	        	});
        	</script>
		<?php comments_template( '', true ); ?>
