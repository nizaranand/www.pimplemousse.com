<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>
<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<section class="wrapper main">
			<div class="content">
			    <article role="main" class="content blog-single" id="post-<?php the_ID(); ?>">
			         
			          <?php
			          
			          if (has_post_format('aside')) { ?>
			               <div class="aside">
			              	<div class="single-hold">	 
			              		<?php the_content(); ?>
			              							<div class="meta">
								<p class="tag"><?php the_category(', '); ?></p>
								<?php if( get_the_tags() ) { ?>
									<p class="tag-mini"><?php the_tags('', ', ', ''); ?></p>
								<?php } ?>
								<?php if( (is_single()) || (is_page()) ) { ?>
													<?php if( (isset($general_options[ 'show_social_share' ])) && ($general_options[ 'show_social_share' ])) { ?>
								              		<p class="post-share">
								              			<?php echo sanitize_text_field( $content_options['share_on'] ); ?> 
														<a target="blank" title="<?php the_title(); ?>" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-twitter"><?php _e('Twitter' , 'meanthemes'); ?></a>
														
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
														
														<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-google"><?php _e('Google+' , 'meanthemes'); ?></a>
								
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
								
														<a target="blank" title="<?php the_title(); ?>" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-facebook"><?php _e('Facebook' , 'meanthemes'); ?></a>
													</p>
													<?php } ?>
								              	<?php } ?>
								              	
							</div>
							
			              	</div>
			               </div>
			          <?php } elseif (has_post_format('chat')) { ?>
			          <div class="hgroup single-hold">   
			          	   <?php
			          		   if ( (has_post_format('aside')) ) {
			          		   } else { ?>
			          		       <h1><?php the_title(); ?></h1>
			          		<?php  }  ?>
			          	   <div class="meta">
			          	   		<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
			          	   			<?php the_time(get_option('date_format')); ?>
			          	   		<?php } else { ?>
			          	   			<?php the_time('jS F Y') ?>
			          	   		<?php } ?></time>
			          	   		<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
			          	   			<?php } ?>
			          	   		<?php if($general_options[ 'comments_off' ] ) { ?>
			          	   		<?php } else { ?>
			          	   		<?php _e( ' | ','meanthemes' ); ?>
			          	   		<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?>
			          	   		<?php } ?>
			          	   		</p>
			             	  </div>
			             	  
			           </div>
			          <div class="single-hold chat">
			          	 
			              <?php the_content(); ?>
			            						<div class="meta">
								<p class="tag"><?php the_category(', '); ?></p>
								<?php if( get_the_tags() ) { ?>
									<p class="tag-mini"><?php the_tags('', ', ', ''); ?></p>
								<?php } ?>
								<?php if( (is_single()) || (is_page()) ) { ?>
													<?php if( (isset($general_options[ 'show_social_share' ])) && ($general_options[ 'show_social_share' ])) { ?>
								              		<p class="post-share">
								              			<?php echo sanitize_text_field( $content_options['share_on'] ); ?> 
														<a target="blank" title="<?php the_title(); ?>" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-twitter"><?php _e('Twitter' , 'meanthemes'); ?></a>
														
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
														
														<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-google"><?php _e('Google+' , 'meanthemes'); ?></a>
								
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
								
														<a target="blank" title="<?php the_title(); ?>" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-facebook"><?php _e('Facebook' , 'meanthemes'); ?></a>
													</p>
													<?php } ?>
								              	<?php } ?>
							</div>
							
			             </div>
			          <?php } elseif (has_post_format('gallery')) { ?>
			          		
			         	<div class="flexslider">
				         	<ul class="slides">
				         	<?php
				         	if(!has_post_thumbnail()) { ?>
				         		
				         		<?php } else {?>
				         		<?php if( ($general_options[ 'no_thumbnail_gallery' ]) ) { ?>
					         		<?php } else { ?>
					         			<li>
						         			<?php if($general_options[ 'no_nav' ] ) { ?>
						         				<?php the_post_thumbnail("archive-thumb"); ?>
						         			<?php } else { ?>
						         				<?php the_post_thumbnail("single-thumb"); ?>
						         			<?php } ?>
					         			</li>			         			
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
				         			        echo "<li><img src='$src[0]' alt='$alt' title='$caption' /></li>";
				         			        $i++;
				         			    }
				         			}			
				         						
				         					?>	
				         	</ul>
				         	
				         </div>				
			         				<div class="flex-container"></div>	
			         				
			         				<script>
			         				jQuery(window).load(function() {
			         				  jQuery('.single .flexslider').flexslider({
			         				    controlsContainer: '.single .flex-container',
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
			         						
			         				<div class="hgroup single-hold">   
			         					   
			         						       <h1><?php the_title(); ?></h1>
			         						
			         					   <div class="meta">
			         					   		<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
			         					   			<?php the_time(get_option('date_format')); ?>
			         					   		<?php } else { ?>
			         					   			<?php the_time('jS F Y') ?>
			         					   		<?php } ?></time>
			         					   		<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
			         					   			<?php } ?>
			         					   		<?php if($general_options[ 'comments_off' ] ) { ?>
			         					   		<?php } else { ?>
			         					   		<?php _e( ' | ','meanthemes' ); ?>
			         					   		<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?>
			         					   		<?php } ?>
			         					   		</p>
			         					   	
			         				   	  </div>
			         				   	  
			         				 </div>
			         				 <div class="single-hold">	 
			         				 	<?php the_content(); ?>
			         										<div class="meta">
								<p class="tag"><?php the_category(', '); ?></p>
								<?php if( get_the_tags() ) { ?>
									<p class="tag-mini"><?php the_tags('', ', ', ''); ?></p>
								<?php } ?>
								<?php if( (is_single()) || (is_page()) ) { ?>
													<?php if( (isset($general_options[ 'show_social_share' ])) && ($general_options[ 'show_social_share' ])) { ?>
								              		<p class="post-share">
								              			<?php echo sanitize_text_field( $content_options['share_on'] ); ?> 
														<a target="blank" title="<?php the_title(); ?>" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-twitter"><?php _e('Twitter' , 'meanthemes'); ?></a>
														
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
														
														<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-google"><?php _e('Google+' , 'meanthemes'); ?></a>
								
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
								
														<a target="blank" title="<?php the_title(); ?>" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-facebook"><?php _e('Facebook' , 'meanthemes'); ?></a>
													</p>
													<?php } ?>
								              	<?php } ?>
							</div>
							
			         				 </div>
			         						
			          <?php } elseif (has_post_format('image')) { ?>
			               <?php if(!has_post_thumbnail()) { ?>
			               	
			               	<?php } else { ?>
			               	<?php if( ($general_options[ 'no_thumbnail' ]) ) { ?>
			               		<?php } else { ?>
			               		<span class="post-thumb">
			               		<?php if($general_options[ 'no_nav' ] ) { ?>
			               			<?php the_post_thumbnail("archive-thumb"); ?>
			               		<?php } else { ?>
			               			<?php the_post_thumbnail("single-thumb"); ?>
			               		<?php } ?></span>
			               		<?php } ?>
			               		<div class="hgroup single-hold">   
			               			  
			               				       <h1><?php the_title(); ?></h1>
			               				
			               			   <div class="meta">
			               			   		<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
			               			   			<?php the_time(get_option('date_format')); ?>
			               			   		<?php } else { ?>
			               			   			<?php the_time('jS F Y') ?>
			               			   		<?php } ?></time>
			               			   		<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
			               			   			<?php } ?>
			               			   		<?php if($general_options[ 'comments_off' ] ) { ?>
			               			   		<?php } else { ?>
			               			   		<?php _e( ' | ','meanthemes' ); ?>
			               			   		<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?>
			               			   		<?php } ?>
			               			   		</p>
			               			   	
			               		   	  </div>
			               		   	  
			               		 </div>
			               		 
			               		 <div class="single-hold">	 
			               		 	<?php the_content(); ?>
			               		 						<div class="meta">
			               		 		<p class="tag"><?php the_category(', '); ?></p>
			               		 		<?php if( get_the_tags() ) { ?>
			               		 			<p class="tag-mini"><?php the_tags('', ', ', ''); ?></p>
			               		 		<?php } ?>
			               		 		<?php if( (is_single()) || (is_page()) ) { ?>
			               		 							<?php if( (isset($general_options[ 'show_social_share' ])) && ($general_options[ 'show_social_share' ])) { ?>
			               		 		              		<p class="post-share">
			               		 		              			<?php echo sanitize_text_field( $content_options['share_on'] ); ?> 
			               		 								<a target="blank" title="<?php the_title(); ?>" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-twitter"><?php _e('Twitter' , 'meanthemes'); ?></a>
			               		 								
			               		 								 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
			               		 								
			               		 								<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-google"><?php _e('Google+' , 'meanthemes'); ?></a>
			               		 		
			               		 								 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
			               		 		
			               		 								<a target="blank" title="<?php the_title(); ?>" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-facebook"><?php _e('Facebook' , 'meanthemes'); ?></a>
			               		 							</p>
			               		 							<?php } ?>
			               		 		              	<?php } ?>
			               		 	</div>
			               		 	
			               		 </div>
			               		
			               	<?php } 
			          } elseif (has_post_format('link')) { ?>
			             <!-- //  custom meta for link and link title -->
			             
			             <div class="hgroup single-hold border">   
			             	   
			             		       <h1><a href="<?php echo get_post_meta($post->ID, 'single_format_link_url', true); ?>" title="<?php echo get_post_meta($post->ID, 'single_format_link_text', true); ?>"><?php echo get_post_meta($post->ID, 'single_format_link_text', true); ?></a></h1>
			             	   
			                	  
			              </div>
			             
			         <?php      
			          } elseif (has_post_format('quote')) {
			               //display quote post ?>
			               <div class="hgroup single-hold">   
			               	  
			               		       <h1><?php the_title(); ?></h1>
			               		
			               	   <div class="meta">
			               	   		<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
			               	   			<?php the_time(get_option('date_format')); ?>
			               	   		<?php } else { ?>
			               	   			<?php the_time('jS F Y') ?>
			               	   		<?php } ?></time>
			               	   		<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
			               	   			<?php } ?>
			               	   		<?php if($general_options[ 'comments_off' ] ) { ?>
			               	   		<?php } else { ?>
			               	   		<?php _e( ' | ','meanthemes' ); ?>
			               	   		<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?>
			               	   		<?php } ?>
			               	   		</p>
			               	   	
			                  	  </div>
			                  	  
			                </div>
			               <div class="single-quote">
				              <div class="single-hold">	 
				              	<?php the_content(); ?>
				             
				               <p class="quote">
				               		<?php echo get_post_meta($post->ID, 'single_format_quote', true); ?>
				               </p>
				           		
				           		 				<div class="meta">
								<p class="tag"><?php the_category(', '); ?></p>
								<?php if( get_the_tags() ) { ?>
									<p class="tag-mini"><?php the_tags('', ', ', ''); ?></p>
								<?php } ?>
								<?php if( (is_single()) || (is_page()) ) { ?>
													<?php if( (isset($general_options[ 'show_social_share' ])) && ($general_options[ 'show_social_share' ])) { ?>
								              		<p class="post-share">
								              			<?php echo sanitize_text_field( $content_options['share_on'] ); ?> 
														<a target="blank" title="<?php the_title(); ?>" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-twitter"><?php _e('Twitter' , 'meanthemes'); ?></a>
														
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
														
														<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-google"><?php _e('Google+' , 'meanthemes'); ?></a>
								
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
								
														<a target="blank" title="<?php the_title(); ?>" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-facebook"><?php _e('Facebook' , 'meanthemes'); ?></a>
													</p>
													<?php } ?>
								              	<?php } ?>
							</div>
							
				           </div>    
			                </div> 
			                
			          <?php } elseif (has_post_format('status')) { ?>
			               <div class="hgroup single-hold">   
			               	   
			               		       <h1><?php the_title(); ?></h1>
			               		
			               	   <div class="meta">
			               	   		<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
			               	   			<?php the_time(get_option('date_format')); ?>
			               	   		<?php } else { ?>
			               	   			<?php the_time('jS F Y') ?>
			               	   		<?php } ?></time>
			               	   		<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
			               	   			<?php } ?>
			               	   		<?php if($general_options[ 'comments_off' ] ) { ?>
			               	   		<?php } else { ?>
			               	   		<?php _e( ' | ','meanthemes' ); ?>
			               	   		<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?>
			               	   		<?php } ?>
			               	   		</p>
			               	   	
			                  	  </div>
			                  	  
			                </div>		          <?php } elseif (has_post_format('video')) { ?>
			               
			               <span class="post-thumb video">
			               	<?php echo get_post_meta($post->ID, 'single_format_video', true); ?>
			              </span> 
			              <div class="hgroup single-hold">   
			              	   
			              		       <h1><?php the_title(); ?></h1>
			              		
			              	   <div class="meta">
			              	   		<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
			              	   			<?php the_time(get_option('date_format')); ?>
			              	   		<?php } else { ?>
			              	   			<?php the_time('jS F Y') ?>
			              	   		<?php } ?></time>
			              	   		<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
			              	   			<?php } ?>
			              	   		<?php if($general_options[ 'comments_off' ] ) { ?>
			              	   		<?php } else { ?>
			              	   		<?php _e( ' | ','meanthemes' ); ?>
			              	   		<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?>
			              	   		<?php } ?>
			              	   		</p>
			              	   	
			                 	  </div>
			                 	  
			               </div>
			              <div class="single-hold">	 
			              	<?php the_content(); ?>
			             						<div class="meta">
								<p class="tag"><?php the_category(', '); ?></p>
								<?php if( get_the_tags() ) { ?>
									<p class="tag-mini"><?php the_tags('', ', ', ''); ?></p>
								<?php } ?>
								<?php if( (is_single()) || (is_page()) ) { ?>
													<?php if( (isset($general_options[ 'show_social_share' ])) && ($general_options[ 'show_social_share' ])) { ?>
								              		<p class="post-share">
								              			<?php echo sanitize_text_field( $content_options['share_on'] ); ?> 
														<a target="blank" title="<?php the_title(); ?>" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-twitter"><?php _e('Twitter' , 'meanthemes'); ?></a>
														
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
														
														<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-google"><?php _e('Google+' , 'meanthemes'); ?></a>
								
														 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
								
														<a target="blank" title="<?php the_title(); ?>" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-facebook"><?php _e('Facebook' , 'meanthemes'); ?></a>
													</p>
													<?php } ?>
								              	<?php } ?>
							</div>
							
			              </div>
			              
			          <?php } elseif (has_post_format('audio')) { ?>
			                
			                <?php if(!has_post_thumbnail()) { ?>
			                	
			                	<?php } else {?>
			                	<?php if( ($general_options[ 'no_thumbnail' ]) ) { ?>
			                		<?php } else { ?>
			                		<span class="post-thumb"><?php if($general_options[ 'no_nav' ] ) { ?>
			                			<?php the_post_thumbnail("archive-thumb"); ?>
			                		<?php } else { ?>
			                			<?php the_post_thumbnail("single-thumb"); ?>
			                		<?php } ?></span>
			                	<?php } ?> 
			                	<?php } ?>
			                
			           
			             
			             <div class="hgroup single-hold">   
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
			             	   
			             		       <h1><?php the_title(); ?></h1>
			             		
			             	   <div class="meta">
			             	   		<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
			             	   			<?php the_time(get_option('date_format')); ?>
			             	   		<?php } else { ?>
			             	   			<?php the_time('jS F Y') ?>
			             	   		<?php } ?></time>
			             	   		<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
			             	   			<?php } ?>
			             	   		<?php if($general_options[ 'comments_off' ] ) { ?>
			             	   		<?php } else { ?>
			             	   		<?php _e( ' | ','meanthemes' ); ?>
			             	   		<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?>
			             	   		<?php } ?>
			             	   		</p>
			             	   	
			                	  </div>
			                	  
			              </div>
			             <div class="single-hold">	 
			             	<?php the_content(); ?>
			             						<div class="meta">
			             		<p class="tag"><?php the_category(', '); ?></p>
			             		<?php if( get_the_tags() ) { ?>
			             			<p class="tag-mini"><?php the_tags('', ', ', ''); ?></p>
			             		<?php } ?>
			             		<?php if( (is_single()) || (is_page()) ) { ?>
			             							<?php if( (isset($general_options[ 'show_social_share' ])) && ($general_options[ 'show_social_share' ])) { ?>
			             		              		<p class="post-share">
			             		              			<?php echo sanitize_text_field( $content_options['share_on'] ); ?> 
			             								<a target="blank" title="<?php the_title(); ?>" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-twitter"><?php _e('Twitter' , 'meanthemes'); ?></a>
			             								
			             								 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
			             								
			             								<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-google"><?php _e('Google+' , 'meanthemes'); ?></a>
			             		
			             								 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
			             		
			             								<a target="blank" title="<?php the_title(); ?>" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-facebook"><?php _e('Facebook' , 'meanthemes'); ?></a>
			             							</p>
			             							<?php } ?>
			             		              	<?php } ?>
			             	</div>
			             	
			             </div>
			             
			               
			         <?php } else { ?>
	
						<?php if(!has_post_thumbnail()) { ?>
							
							<?php } else {?>
							<?php if( ($general_options[ 'no_thumbnail' ]) ) { ?>
								<?php } else { ?>
								<span class="post-thumb"><?php if($general_options[ 'no_nav' ] ) { ?>
									<?php the_post_thumbnail("archive-thumb"); ?>
								<?php } else { ?>
									<?php the_post_thumbnail("single-thumb"); ?>
								<?php } ?></span>
							<?php } ?> 
							<?php } ?>
							<div class="hgroup single-hold">   
								   
									       <h1><?php the_title(); ?></h1>
									
								   <div class="meta">
								   		<p><time class="time" datetime="<?php the_date('Y-m-d', '', ''); ?> " ><?php if($general_options[ 'use_admin_date' ] ) { ?>
								   			<?php the_time(get_option('date_format')); ?>
								   		<?php } else { ?>
								   			<?php the_time('jS F Y') ?>
								   		<?php } ?></time>
								   		<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?><span class="author"><?php echo sanitize_text_field( $content_options['written_by'] ); ?> <?php the_author_posts_link(); ?></span>
								   			<?php } ?>
								   		<?php if($general_options[ 'comments_off' ] ) { ?>
								   		<?php } else { ?>
								   		<?php _e( ' | ','meanthemes' ); ?>
								   		<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?>
								   		<?php } ?>
								   		</p>
								   	
							   	  </div>
							   	  
							 </div>
							 
						<div class="single-hold">	 
							<?php the_content(); ?>
							<div class="meta">
								<p class="tag"><?php the_category(', '); ?></p> 
							<?php if( get_the_tags() ) { ?>
								<p class="tag-mini"><?php the_tags('', ', ', ''); ?></p>
							<?php } ?>
							
							<?php if( (is_single()) || (is_page()) ) { ?>
												<?php if( (isset($general_options[ 'show_social_share' ])) && ($general_options[ 'show_social_share' ])) { ?>
							              		<p class="post-share">
							              			<?php echo sanitize_text_field( $content_options['share_on'] ); ?> 
													<a target="blank" title="<?php the_title(); ?>" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-twitter"><?php _e('Twitter' , 'meanthemes'); ?></a>
													
													 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
													
													<a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="share-google"><?php _e('Google+' , 'meanthemes'); ?></a>
							
													 <?php echo sanitize_text_field( $content_options['separator'] ); ?> 
							
													<a target="blank" title="<?php the_title(); ?>" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" class="share-facebook"><?php _e('Facebook' , 'meanthemes'); ?></a>
												</p>
												<?php } ?>
							              	<?php } ?>
						</div>
						
						</div>	
	
			         <?php } ?>
			          
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'meanthemes' ), 'after' => '</div>' ) ); ?>
			          
			        <?php endwhile; ?>
			        
			        <?php if( is_single() ) { ?>
			        	<?php if( (isset($general_options[ 'show_author' ])) && ($general_options[ 'show_author' ])) { ?>
			        		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
			        							<div class="author-meta single-hold">
			        									<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 70 ) ); ?>
			        								<div class="author-info">
			        									<h6><?php echo sanitize_text_field( $content_options['written_by'] ); ?> 
			        									
			        									<a href="<?php the_author_meta('user_url'); ?>" title="<?php the_author_meta('display_name'); ?>"><?php the_author_meta('display_name'); ?></a>
			        									
			        									</h6>
			        									<p><?php the_author_meta( 'description' ); ?></p>
			        									<p><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo sanitize_text_field( $content_options['author_more'] ); ?> </a></p>
			        								</div>	
			        							</div>
			        		<?php endif; ?>
			        	<?php } ?>	
			        <?php } ?>
			        
			        	    <?php comments_template( '', true ); ?>
			        
					</article>
					<div class="navigation">
					    <div class="nav-previous"><?php previous_post_link( '%link', __("&lt; Prev.","meanthemes") ); ?></div>
					    <div class="nav-next"><?php next_post_link( '%link', __("Next &gt;","meanthemes") ); ?></div>
					</div>
				</div>
				<?php if($general_options[ 'no_nav' ] ) { ?>
		    	<?php } else { ?>
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
		    
		    </section> 
  
<?php get_footer(); ?>