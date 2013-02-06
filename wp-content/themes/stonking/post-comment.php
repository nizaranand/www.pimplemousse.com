<?php
global $tt_framework;
if (get_the_option('stonking_comment_receive') == 'Only posts' ||
		get_the_option('stonking_comment_receive') == 'Posts/pages') {
	comments_template('', true);
	if (is_single()) {
	?>
	<div class="rssSubscribeLink">
	<?php
	post_comments_feed_link("S'inscrire au flux RSS des commentaires");
	
	?>
	</div>
<?php
	}
}
?>
