<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php $blogFull = $general_options[ 'show_blog_full' ]; ?>


        <article class="article-archive format-audio" id="post-<?php the_ID(); ?>" >
        	<div class="hgroup">
        	<div class="icon audio"></div>
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
        				<p>
        				<?php if($general_options[ 'comments_off' ] ) { ?>
        				<?php } else { ?>
        				<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?><?php _e( ' | ','meanthemes' ); ?></span>
        				<?php } ?>
        				
        				<a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
        		  </div>
        	</div>	
        	<?php if(has_post_thumbnail()) { ?>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><span class="post-thumb">
        		<?php the_post_thumbnail("archive-thumb"); ?></span></a>
        	<div class="archive-excerpt">
     <div class="post-audio">
        	 <script>
        	 jQuery(document).ready(function(){
        	 
        	 	jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
        	 		ready: function (event) {
        	 			jQuery(this).jPlayer("setMedia", {
        	 				mp3:"<?php echo get_post_meta($post->ID, 'single_format_audio', true); ?>",
        	 				oga:"<?php echo get_post_meta($post->ID, 'single_format_audio_oga', true); ?>"
        	 			});
        	 		},
        	 		swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js/plugins",
        	 		supplied: "mp3, oga",
        	 		wmode: "window",
        	 		cssSelectorAncestor: "#jp-audio-container-<?php the_ID(); ?>"
        	 	});
        	 });
        	 </script>
        	 
        	 		
        	 	<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
        	 	
        	 	<div id="jp-audio-container-<?php the_ID(); ?>" class="jp-audio">
        	 		<div class="jp-type-playlist">
        	 			<div class="jp-gui jp-interface">
        	 				<ul class="jp-controls">
        	 					<li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
        	 					<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
        	 					<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
        	 					<li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
        	 					<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
        	 					<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
        	 					<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
        	 					<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        	 				</ul>
        	 				<div class="jp-progress">
        	 					<div class="jp-seek-bar">
        	 						<div class="jp-play-bar"></div>
        	 					</div>
        	 				</div>
        	 				<div class="jp-volume-bar">
        	 					<div class="jp-volume-bar-value"></div>
        	 				</div>
        	 				<div class="jp-time-holder">
        	 					<div class="jp-current-time"></div>
        	 					<div class="jp-duration"></div>
        	 				</div>
        	 				<ul class="jp-toggles">
        	 					<li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
        	 					<li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">shuffle off</a></li>
        	 					<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
        	 					<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
        	 				</ul>
        	 			</div>
        	 			
        	 			<div class="jp-no-solution">
        	 				<span>Update Required</span>
        	 				To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
        	 			</div>
        	 	</div><!-- .jp-audio -->
        	 	</div>
        	</div>
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
        	<?php } else { ?>
        		<div class="archive-excerpt nothumb">
        		<div class="post-audio">
        				 <script>
        				 jQuery(document).ready(function(){
        				 
        				 	jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
        				 		ready: function (event) {
        				 			jQuery(this).jPlayer("setMedia", {
        				 				mp3:"<?php echo get_post_meta($post->ID, 'single_format_audio', true); ?>",
        				 				oga:"<?php echo get_post_meta($post->ID, 'single_format_audio_oga', true); ?>"
        				 			});
        				 		},
        				 		swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js/plugins",
        				 		supplied: "mp3, oga",
        				 		wmode: "window",
        				 		cssSelectorAncestor: "#jp-audio-container-<?php the_ID(); ?>"
        				 	});
        				 });
        				 </script>
        				 
        				 		
        				 	<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
        				 	
        				 	<div id="jp-audio-container-<?php the_ID(); ?>" class="jp-audio">
        				 		<div class="jp-type-playlist">
        				 			<div class="jp-gui jp-interface">
        				 				<ul class="jp-controls">
        				 					<li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
        				 					<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
        				 					<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
        				 					<li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
        				 					<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
        				 					<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
        				 					<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
        				 					<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        				 				</ul>
        				 				<div class="jp-progress">
        				 					<div class="jp-seek-bar">
        				 						<div class="jp-play-bar"></div>
        				 					</div>
        				 				</div>
        				 				<div class="jp-volume-bar">
        				 					<div class="jp-volume-bar-value"></div>
        				 				</div>
        				 				<div class="jp-time-holder">
        				 					<div class="jp-current-time"></div>
        				 					<div class="jp-duration"></div>
        				 				</div>
        				 				<ul class="jp-toggles">
        				 					<li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
        				 					<li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">shuffle off</a></li>
        				 					<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
        				 					<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
        				 				</ul>
        				 			</div>
        				 			
        				 			<div class="jp-no-solution">
        				 				<span>Update Required</span>
        				 				To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
        				 			</div>
        				 	</div><!-- .jp-audio -->
        				 	</div>
        				 	</div>
        				<?php global $more; $more = 0; ?>
        				
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
        	<?php } ?>
        	</article>
		<?php comments_template( '', true ); ?>
