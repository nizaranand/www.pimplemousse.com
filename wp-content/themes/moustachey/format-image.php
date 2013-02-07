<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php $content_options = get_option ( 'meanthemes_theme_content_options_moustachey' ); ?>


        <article class="article-archive format-image" id="post-<?php the_ID(); ?>" >
        	
        	<?php if(has_post_thumbnail()) { ?>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><span class="post-thumb">
        		<?php the_post_thumbnail("archive-thumb"); ?></span></a>
        	
        		
        	<?php } else { ?>
        		
        	<?php } ?>
        	<div class="hgroup">
        		<div class="icon image"></div>
        	<h2>
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>">
        	<?php the_title(); ?></a></h2>
        		<div class="meta top">
        				<p>
        				
        				<?php if($general_options[ 'comments_off' ] ) { ?>
        				<?php } else { ?>
        				<span class="comment"><?php comments_popup_link( __( '0 Comments','meanthemes' ), __( '1 Comment','meanthemes' ), __( '% Comments','meanthemes' ) ); ?><?php _e( ' | ','meanthemes' ); ?></span>
        				<?php } ?>
        				
        				<a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?> - <?php echo sanitize_text_field( $content_options['read_more'] ); ?>"><?php echo sanitize_text_field( $content_options['read_more'] ); ?></a></p>
        		  </div>
        	</div>	
        	
        	</article>
		<?php comments_template( '', true ); ?>
