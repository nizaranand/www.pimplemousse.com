<?php 
	$optionss = get_post_meta($post->ID, 'themeton_additional_options', true);
	print isset($optionss['teaser_text']) ? '<p><span class="teaser-text">'.$optionss['teaser_text'].'</span></p>' : ''; 
?>