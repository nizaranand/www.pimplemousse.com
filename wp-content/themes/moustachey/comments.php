<?php $general_options = get_option ( 'meanthemes_theme_general_options_moustachey' ); ?>
<?php if($general_options[ 'comments_off' ] ) { ?>
<?php } else { ?>
<div class="comment-system <?php if (has_post_format('status')) { echo " status"; } ?>">
	    <aside class="comments">
	<?php if ( post_password_required() ) : ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'meanthemes' ); ?></p>
</aside>
<?php
return; endif; ?>
<?php if ( have_comments() ) : ?>
<div id="comments">
		<hgroup>
            <h3><?php _e( 'Comments', 'meanthemes' ); ?></h3>
		</hgroup>
</div>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'meanthemes' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'meanthemes' ) ); ?></div>
			</div> 
<?php endif; ?>
			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'post_comments' ) ); ?>
			</ol>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'meanthemes' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'meanthemes' ) ); ?></div>
			</div>
<?php endif; ?>
<?php else : if ( ! comments_open() ) : ?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'meanthemes' ); ?></p>
<?php endif; ?>
<?php endif; ?>
<?php
$form_args = array( 'title_reply' => __( 'Leave a comment', 'meanthemes' ) ); comment_form( $form_args ); ?>
</div>	
<?php } ?>