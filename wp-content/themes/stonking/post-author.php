<?php 

$showmeta = false;
if(is_single()) {if(get_the_option('stonking_single_postauthor')=='true' && get_the_author() != "admin") { $showmeta = true; }}
else if(is_page()) {if(get_the_option('stonking_page_postauthor')=='true' && get_the_author() != "admin") { $showmeta = true; }}
?>
<?php if($showmeta) { ?>
<div class="clearfix"></div>
<?php if (get_post_meta($post->ID, "pimp_link", true) == 1) { ?>
<div class="albumInfosWrapper">
	<?php // $albumCover = get_post_meta($post->ID, "pimp_album_cover", true);
	$albumCover = wp_get_attachment_image_src(get_field('pimp_album_cover'), "large");
	if ($albumCover[0] != "") { ?>
	<div class="albumCover">
		<img src="<?php echo $albumCover[0]; ?>" alt="" />
	</div>
	<?php } ?>
	<div class="albumInfosRight">
		<?php
			$albumArtiste = get_post_meta($post->ID, "pimp_album_artiste", true);
			$albumName = get_post_meta($post->ID, "pimp_album_name", true);
			$albumLabel = get_post_meta($post->ID, "pimp_album_label", true);
			$filmTitre = get_post_meta($post->ID, "pimp_film_serie_titre", true);
			$filmActeurs = get_post_meta($post->ID, "pimp_film_serie_acteurs", true);
			$filmRealisateur = get_post_meta($post->ID, "pimp_film_serie_realisateur", true);
			$livreTitre = get_post_meta($post->ID, "pimp_livre_titre", true);
			$livreAuteur = get_post_meta($post->ID, "pimp_livre_auteur", true);
			$livreEditeur = get_post_meta($post->ID, "pimp_livre_editeur", true);
			$appEditeur = get_post_meta($post->ID, "pimp_app_editeur", true);
			$appDevices = get_post_meta($post->ID, "pimp_app_devices", true);
			$appOS = get_post_meta($post->ID, "pimp_app_os", true);
			$albumSortie = get_post_meta($post->ID, "pimp_album_sortie", true);
			if ($albumArtiste != "" || $albumName != "" || $albumLabel != "" || $albumSortie != "" || $filmTitre != "" || $filmActeurs != "" || $filmRealisateur != "" || $livreTitre != "" || $livreAuteur != "" || $livreEditeur != "" || $appEditeur != "" || $appDevices != "" || $appOS != "") {
		?>
		<div class="albumInfos">
			<h3>Informations</h3>
			<!-- Musique -->
			<?php if ($albumArtiste != "") { ?>
				Artiste: <?php echo $albumArtiste; ?><br />
			<?php } ?>
			<?php if ($albumName != "") { ?>
				Album: <?php echo $albumName; ?><br />
			<?php } ?>
			<?php if ($albumLabel != "") { ?>
				Label: <?php echo $albumLabel; ?><br />
			<?php } ?>
			<!-- Films, TV Shows -->
			<?php if ($filmTitre != "") { ?>
				Titre: <?php echo $filmTitre; ?><br />
			<?php } ?>
			<?php if ($filmActeurs != "") { ?>
				Acteurs: <?php echo $filmActeurs; ?><br />
			<?php } ?>
			<?php if ($filmRealisateur != "") { ?>
				R&eacute;alisateur: <?php echo $filmRealisateur; ?><br />
			<?php } ?>
			<!-- Livres -->
			<?php if ($livreTitre != "") { ?>
				Titre: <?php echo $livreTitre; ?><br />
			<?php } ?>
			<?php if ($livreAuteur != "") { ?>
				Auteur: <?php echo $livreAuteur; ?><br />
			<?php } ?>
			<?php if ($livreEditeur != "") { ?>
				Editeur: <?php echo $livreEditeur; ?><br />
			<?php } ?>
			<!-- App -->
			<?php if ($appEditeur != "") { ?>
				Editeur: <?php echo $appEditeur; ?><br />
			<?php } ?>
			<?php if ($appDevices != "") { ?>
				Sur: <?php echo $appDevices; ?><br />
			<?php } ?>
			<?php if ($appOS != "") { ?>
				OS: <?php echo $appOS; ?><br />
			<?php } ?>
			<?php if ($albumSortie != "") { ?>
				Sortie: <?php echo $albumSortie; ?><br />
			<?php } ?>
		</div>
		<?php } ?>
		<div class="albumLinks">
			<?php
				$linkWebsite = get_post_meta($post->ID, "pimp_link_website", true);
				$linkAmazon = get_post_meta($post->ID, "pimp_link_amazon", true);
				$linkDribbble = get_post_meta($post->ID, "pimp_link_dribbble", true);
				$linkFlickr = get_post_meta($post->ID, "pimp_link_flickr", true);
				$linkFacebook = get_post_meta($post->ID, "pimp_link_facebook", true);
				$linkTwitter = get_post_meta($post->ID, "pimp_link_twitter", true);
				$linkGooglePlus = get_post_meta($post->ID, "pimp_link_googleplus", true);
				$linkBandcamp = get_post_meta($post->ID, "pimp_link_bandcamp", true);
				$linkSpotify = get_post_meta($post->ID, "pimp_link_spotify", true);
				$linkDeezer = get_post_meta($post->ID, "pimp_link_deezer", true);
				$linkMyspace = get_post_meta($post->ID, "pimp_link_myspace", true);
				$linkLastfm = get_post_meta($post->ID, "pimp_link_lastfm", true);
				$linkGrooveshark = get_post_meta($post->ID, "pimp_link_grooveshark", true);
				$linkPandora = get_post_meta($post->ID, "pimp_link_pandora", true);
				$linkRdio = get_post_meta($post->ID, "pimp_link_rdio", true);
				$linkImdb = get_post_meta($post->ID, "pimp_link_imdb", true);
				$linkItunes = get_post_meta($post->ID, "pimp_link_itunes", true);
			?>
			<h3>Liens</h3>
			<?php if ($linkWebsite != "") { ?>
				<a href="<?php echo $linkWebsite; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/website-32x32.png" alt="Website" /></a>&nbsp;
			<?php } ?>
			<!-- Social -->
			<?php if ($linkFacebook != "") { ?>
				<a href="<?php echo $linkFacebook; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/facebook-32x32.png" alt="Facebook" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkTwitter != "") { ?>
				<a href="<?php echo $linkTwitter; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/twitter-32x32.png" alt="Twitter" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkGooglePlus != "") { ?>
				<a href="<?php echo $linkGooglePlus; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/google+-32x32.png" alt="Google Plus" /></a>&nbsp;
			<?php } ?>
			<!-- Musique -->
			<?php if ($linkSpotify != "") { ?>
				<a href="<?php echo $linkSpotify; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/spotify-32x32.png" alt="Spotify" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkMyspace != "") { ?>
				<a href="<?php echo $linkMyspace; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/myspace-32x32.png" alt="MySpace" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkLastfm != "") { ?>
				<a href="<?php echo $linkLastfm; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/lastfm-32x32.png" alt="LastFM" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkGrooveshark != "") { ?>
				<a href="<?php echo $linkGrooveshark; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/smbp/icons/32/grooveshark.png" alt="Grooveshark" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkPandora != "") { ?>
				<a href="<?php echo $linkPandora; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/social_networking_iconpack/pandora_32.png" alt="Pandora" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkRdio != "") { ?>
				<a href="<?php echo $linkRdio; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/rdio-32x32.png" alt="Rdio" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkDeezer != "") { ?>
				<a href="<?php echo $linkDeezer; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/smbp/icons/32/deezer.png" alt="Deezer" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkBandcamp != "") { ?>
				<a href="<?php echo $linkBandcamp; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/smbp/icons/32/bandcamp.png" alt="Bandcamp" /></a>&nbsp;
			<?php } ?>
			<!-- Design / Photo -->
			<?php if ($linkFlickr != "") { ?>
				<a href="<?php echo $linkFlickr; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/flickr-32x32.png" alt="Flickr" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkDribbble != "") { ?>
				<a href="<?php echo $linkDribbble; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/dribbble-32x32.png" alt="Dribbble" /></a>&nbsp;
			<?php } ?>
			<!-- Films -->
			<?php if ($linkImdb != "") { ?>
				<a href="<?php echo $linkImdb; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/imdb-32x32.png" alt="IMdb" /></a>&nbsp;
			<?php } ?>
			<!-- Achats -->
			<?php if ($linkItunes != "") { ?>
				<a href="<?php echo $linkItunes; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/itunes-32x32.png" alt="iTunes" /></a>&nbsp;
			<?php } ?>
			<?php if ($linkAmazon != "") { ?>
				<a href="<?php echo $linkAmazon; ?>" target="_blank"><img src="/wp-content/themes/stonking/images/links/amazon-32x32.png" alt="Amazon" /></a>&nbsp;
			<?php } ?>
		</div>
	</div>
	<div class="cleared"></div>
</div>
<div class="clearfix"></div>
<?php } ?>
<div class="post-about-author">
	<div class="post-author-image preload">
		<?php $author_email =  get_the_author_meta('email'); echo get_avatar( $author_email, $size = '60'); ?>
	</div>
	<div class="post-author-info">
		<h3><?php echo get_the_option('stonking_trans_postauthor', 'Author'); ?> : <?php the_author_posts_link(); ?></h3>
		<p><?php
		$description = get_the_author_meta('description');
		if ($description != '') echo $description;
		else echo get_the_option('stonking_trans_postauthordesc');
		?></p>
	</div>
    <div class="clearfix"></div>
</div>
<div class="prevNextWrapper">
	
		<?php
			previous_post_link('%link', '<div class="prevWrapper">
		<div class="prevTitle">Article pr&eacute;c&eacute;dent</div>
		<div class="prevLink">%title</div>
	</div>');
		?>
		
	
		<?php
			next_post_link('%link', '<div class="nextWrapper">
		<div class="nextTitle">Article suivant</div>
		<div class="nextLink">%title</div>
	</div>');
		?>
		
	<div class="cleared"></div>
</div>
<div class="related_posts">
	<?php get_related_posts_thumbnails(); ?>
</div>
<?php } ?>