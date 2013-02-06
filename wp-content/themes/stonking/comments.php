<?php
$faceBookDefaultOption = Array(
    'use' => 'false',
    'appId' => '',
    'per_page' => '5'
);
// Do not delete these lines
if (comments_open ())
    if (get_the_option('stonking_facebook_comment')=='true') {
?>
<div id="fb-root"></div><script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#appId=<?php print get_the_option('stonking_facebook_appid');?>&amp;xfbml=1"></script>
<div class="facebook-comment">
<fb:comments  xid="<?php the_ID();?>" numposts="<?php print get_the_option('stonking_comment_perpage');?>" width="610" publish_feed="true"></fb:comments>
</div>
<?php
    } else {
        if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
            die('Please do not load this page directly. Thanks!');

        if (post_password_required ()) {
?>
            <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.'); ?></p>
<?php
            return;
        }
?>

        <!-- You can start editing here. -->

<?php if (have_comments ()) : ?>
            <!--<h1 class="comment-box-title"><?php printf(_n(get_the_option('stonking_trans_onecomment', 'One Response to').' %2$s', '%1$s '.get_the_option('stonking_trans_commentsto','Responses to').' %2$s', get_comments_number()),
                    number_format_i18n(get_comments_number()), '&#8220;' . get_the_title() . '&#8221;'); ?></h1>-->
                   

        <div class="post-comments-list">
        	<h3 class="comment-head-title">Commentaires</h3>
    <?php wp_list_comments(array('style' => 'div', 'callback' => 'themeton_comment')); ?>
        </div><!-- post-comments -->

        <div class="navigation">
            <div class="alignleft"><?php previous_comments_link() ?></div>
            <div class="alignright"><?php next_comments_link() ?></div>
        </div>
<?php else : // this is displayed if there are no comments so far  ?>

<?php if (comments_open ()) : ?>
                    <!-- If comments are open, but there are no comments. -->

<?php else : // comments are closed  ?>
                        <!-- If comments are closed. -->
                        <!--<p class="nocomments"><?php _e('Comments are closed.'); ?></p>-->

<?php endif; ?>
<?php endif; ?>


<?php if (comments_open ()) : ?>

		<div class="comment-box">
<?php 
comment_form(array('fields' => array('author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'))); ?>
		</div><!-- comment-box -->

<?php endif; // if you delete this the sky will fall on your head  ?>

<?php
}