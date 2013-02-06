<?php 

/*
Plugin Name: Auto link best tags
Plugin URI: http://www.woodymood-dev.net/cms/wordpress/fr/2009/11/22/ajout-automatique-lien-mots-cles/
Description: This plugin adds html links to words in post's text, words that match all tags' names in use in the blog, and only a few tags, randomly, from 1 to 4 depending the content's length, and only the most used tags in the entire blog 
Version: 1.1
Author: Anthony Dubois
Author URI: http://www.woodymood-dev.net/cms/wordpress/en/lauteur/
*/


/*  Copyright 2009-2010-2011  ANTHONY DUBOIS  (email : dev@woodymood-dev.net)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/////////////////////////////////////////////////////////////////////
// init
add_action( "init", "albt_init" );

function albt_init() {

	load_plugin_textdomain('albt', PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)) . '/lang');
}



//////////////////////////////////////////////////////////////////////////////
// config
// nombre minimal de fois qu'un tag doit avoir été utilisé pour être repris
function albt_tag_frequency_threshod() {

	$albt_tag_frequency_threshod = get_option('albt_tag_frequency_threshod');

	if ( $albt_tag_frequency_threshod === FALSE ) {
		add_option('albt_tag_frequency_threshod', 2);
		$albt_tag_frequency_threshod = 2;
	}
	else if ( !is_numeric($albt_tag_frequency_threshod) || $albt_tag_frequency_threshod < 1 ) {
		update_option('albt_tag_frequency_threshod', 2);
		$albt_tag_frequency_threshod = 2;
	}
	
	return $albt_tag_frequency_threshod;
}

// pour favoriser les tags qui ont un nombre moyen d'utilisations
// on met une limite supérieure
function albt_tag_frequency_limit() {

	$albt_tag_frequency_limit = get_option('albt_tag_frequency_limit');

	if ( $albt_tag_frequency_limit === FALSE ) {
		add_option('albt_tag_frequency_limit', 20);
		$albt_tag_frequency_limit = 20;
	}
	else if ( !is_numeric($albt_tag_frequency_limit) || $albt_tag_frequency_limit < albt_tag_frequency_threshod() ) {
		update_option('albt_tag_frequency_limit', 20);
		$albt_tag_frequency_limit = 20;
	}
	
	return $albt_tag_frequency_limit;
}

// nombre minimal de tags, qui vont être linkés, dans l'article
// ceci est necessaire car le nombre de tags est "propotionnel" à la longueur de l'article
// et donc c'est pour éviter que les articles très courts n'aient aucun lien
function albt_min_tag_count() {

	$albt_min_tag_count = get_option('albt_min_tag_count');

	if ( $albt_min_tag_count === FALSE ) {
		add_option('albt_min_tag_count', 2);
		$albt_min_tag_count = 2;
	}
	else if ( !is_numeric($albt_min_tag_count) || $albt_min_tag_count < 1 ) {
		update_option('albt_min_tag_count', 2);
		$albt_min_tag_count = 2;
	}
	
	return $albt_min_tag_count;

}

// nombre maximal de tags linkés, dans l'article
// pour pas trop en mettre
function albt_max_tag_count() {

	$albt_max_tag_count = get_option('albt_max_tag_count');

	if ( $albt_max_tag_count === FALSE ) {
		add_option('albt_max_tag_count', 6);
		$albt_max_tag_count = 6;
	}
	else if ( !is_numeric($albt_max_tag_count) || $albt_max_tag_count < albt_min_tag_count() ) {
		update_option('albt_max_tag_count', 6);
		$albt_max_tag_count = 6;
	}
	
	return $albt_max_tag_count;

}


/////////////////////////////////////////////////////////////////////
// admin 
// page d'option du plugin 
add_action('admin_menu','albt_menu');

function albt_menu() { 
 
	add_options_page('Auto link best tags', 'Auto link best tags', 8, __FILE__, 'ad_automatik_link_tag_options');

}



function ad_automatik_link_tag_options() {

	?>
	<div class="wrap">
	<h2>Auto link best tags</h2>
	
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	
	<table class="form-table">
	
	<tr valign="top">
	<th scope="row"><?php _e('Frequency threshold for the tags: a tag should have been used MORE than ... in order to be kept', 'albt'); ?></th>
	<td><input type="text" name="albt_tag_frequency_threshod" value="<?php echo albt_tag_frequency_threshod(); ?>" /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><?php _e('Frequency limit for the tags: a tag should have been used LESS than ... in order to be kept', 'albt'); ?></th>
	<td><input type="text" name="albt_tag_frequency_limit" value="<?php echo albt_tag_frequency_limit(); ?>" /></td>
	</tr>
	 
	<tr valign="top">
	<th scope="row"><?php _e('Min tags count: at less, you wish that ... tags links appear in a post', 'albt'); ?></th>
	<td><input type="text" name="albt_min_tag_count" value="<?php echo albt_min_tag_count(); ?>" /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row"><?php _e('Max tags count: at most, you wish that ... tags links appear in a post', 'albt'); ?></th>
	<td><input type="text" name="albt_max_tag_count" value="<?php echo albt_max_tag_count(); ?>" /></td>
	</tr>
	
	</table>
	
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="albt_tag_frequency_threshod,albt_tag_frequency_limit,albt_min_tag_count,albt_max_tag_count" />
	
	<p class="submit">
	<input type="submit" class="button-primary" value="<?php _e('Save Changes', 'albt') ?>" />
	</p>
	
	</form>
	</div>

<?php 

}


// ajout de la feuille de styles 
add_action('wp_head', 'albt_head' );

function albt_head() {

	?>
	<link rel="stylesheet" href="<?php echo get_option('siteurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)) . '/css/styles.css'; ?>" type="text/css" />
	<?php 
}



/////////////////////////////////////////////////////////////////////
// content filter
add_filter( 'the_content', 'ad_automatik_link_tag' , 100);

// fonction principal qui filtre le contenu de l'article
function ad_automatik_link_tag($content) { 

	global $post, $wpdb;
	
	// dans tous ces cas on ne fait rien
	// on ne fait marcher le plugin que sur les articles
	if ( !is_single() || !isset($wpdb) || !isset($post) || $post->post_type!='post' || !isset($post->ID) || !preg_match("`[0-9]+`", $post->ID) ) return $content;
	
	// chronometrage de la fonction
	$ad_start = microtime(true);
	
	// tables qui vont etre sqlées
	$tr = $wpdb->prefix . 'term_relationships';
	$tt = $wpdb->prefix . 'term_taxonomy';
	$t = $wpdb->prefix . 'terms';
	$p = $wpdb->prefix . 'posts';	
	
	// ..................................................
	
	//			étape 1: les tags du blog
	
	// ..................................................
	
	
	// nombre de fois minimal qu'un tag du blog doit avoir été attribué pour être retenu
	// option wordpress, cf options du plugin 
	$limit_inf = albt_tag_frequency_threshod();
	$limit_sup = albt_tag_frequency_limit();
	
	// la liste de tous les tags qui ont été appliqués au moins $limit fois à des articles
	static $tous_les_tags = array();
	
	if ( empty($tous_les_tags) ) { 

		$sql = 
			"
			SELECT t.term_id, t.name, t.slug, count(p.ID) as 'count' 
			FROM $tr tr, $tt tt, $t t, $p p
			WHERE p.post_type = 'post'
			AND p.post_status = 'publish'
			AND tr.object_id = p.ID
			AND tr.term_taxonomy_id = tt.term_taxonomy_id
			AND tt.taxonomy = 'post_tag'
			AND tt.term_id = t.term_id 
			GROUP BY t.slug 
			HAVING ( (count( p.ID ) >= $limit_inf) AND (count( p.ID ) <= $limit_sup)  ) 
			ORDER BY `t`.`slug` ASC
			";
			
		$rows = $wpdb->get_results($sql, ARRAY_A);
		
		foreach ( $rows as $i => $tag ) { 
			// les name des tags sont purgés, pour pouvoir être comparé avec les mots du texte, purgés aussi de la même façon
			// est ce que c'est une bonne idée finalement ? 
			$tous_les_tags[ad_purge_mot($tag['name'])] = array(
					'slug' => $tag['slug'], 
					'count' => $tag['count'], 
					'term_id' =>  $tag['term_id']
				);		
		}
	}
	
	// die(print_r($tous_les_tags, true));
	
	// ............................................................
	
	//			étape 2: decoupage du texte de l'article en cours
	
	// ............................................................
	
		
	// cette fonction peut servir pour tout autre plugin qui doit analyser la syntaxe d'un texte
	// est elle optimisée ?
	$decoupe = array();
	ad_decoupe_texte($decoupe, $content);	
	// echo "<!-- " . print_r($decoupe, true) . " -->";	
	
	

	// ..............................................................................................
	
	//			étape 3: chercher si y'a bien des mots dans le texte de l'article pour tous nos tags 
	
	// ..............................................................................................
	
	$tags_du_texte = ad_cherche_tags_du_texte($decoupe, $tous_les_tags);
	

	// en reste t'il ? 	
	$n = count($tags_du_texte);
	
	if ( $n == 0 ) { 
		return $content;
	}
	
	
	// reformer le tableau avec des indices numeriques
	// j'en ai seulement besoin pour faire des pioches aléatoires
	// à améliorer...
	$tags_du_texte2 = array();
	foreach ( $tags_du_texte as $name => $tag ) {
		$tags_du_texte2[] = array('name' => $name, 'slug' => $tag['slug'], 'count' => $tag['count'], 'term_id' =>  $tag['term_id']);
	}


	// ..............................................................................................
	
	//			étape 4: garder un nombre minimal et maximal de tags, et aléatoire
	
	// ..............................................................................................
	
	// le tableau des tags gardés
	$tags_gardes = array();
	
	// nombre minimal de tags gardés, dépend de la longueur du texte
	// devrait faire entre 2 et 3 en général
	$garde = round((log(mb_strlen($content), 16)), 0);
	
	// si jamais le log en trouve moins que le minimum, on reprend le minimum			
	$garde = ($garde < albt_min_tag_count()) ? albt_min_tag_count() : $garde;
	
	// si jamais le log en trouve plus que le maximum, on reprend le maximum			
	$garde = ($garde > albt_max_tag_count()) ? albt_max_tag_count() : $garde;
	
	// si jamais au final on en veut plus qu'on en a, on reprend le n
	$garde = ($garde > $n) ? $n : $garde;
	
	// bon là le choix est vite vu :O) 
	if ( $n <= $garde ) {
	
		$tags_gardes = $tags_du_texte2;

	}
	else {  
		// y'en a plus mais on en garde que $garde, au hasard
		$count_tags = 0;
		
		while ( $count_tags < $garde ) {	
		
			$key_random = mt_rand(0, $n-1); // un indice au hasard
			
			if ( !array_key_exists($key_random, $tags_gardes) ) { 				
				$tags_gardes[$key_random] = $tags_du_texte2[$key_random];
				$count_tags++;
			}
			
		}

	}
	
	// ..............................................................................................
	
	//			étape 4: recomposer le texte avec les liens
	
	// ..............................................................................................
	
	// recomposer le tableau avec les noms des tags comme clé pour revenir en normal
	$tags_du_texte3 = array();
	foreach ( $tags_gardes as $i => $tag ) {
		$tags_du_texte3[$tag['name']] = array('slug' => $tag['slug'], 'count' => $tag['count'], 'term_id' =>  $tag['term_id']);
	}
	
	$recompose = ad_recompose_texte($decoupe, $tags_du_texte3);
					 
	return "
	
	<!-- ad_automatik_link_tag START $ad_start -->	

	" . $recompose . "
	
	<!-- ad_automatik_link_tag STOP after " . round((microtime(true) - $ad_start),6) . " secs -->\n";	

}

// fonction appelée par le filtre principal
// fonction qui retourne un tableau en découpant le texte en différentes trançons: 
// html < >, balise wordpress [], texte normal, lien http
// prend en paramètre le tableau $decoupe qui contiendra le résultat de la découpe 
// les delimiteurs des balises, la première fois par défaut on cherche les balises html avec < et >
function ad_decoupe_texte(&$decoupe, $texte = '', $limiteur1 = '<', $limiteur2 = '>', $type = 'html' ) {


	if ( !is_string($texte) || $texte == '' ) return array();
	
	$texte = trim($texte);
	
	$longueur_texte = mb_strlen($texte, 'UTF-8');
	
	if ( $longueur_texte == 0 ) return array();
	
	
	$curseur = 0;
	
	$tronçon_actuel = '';
	
	$balise_en_cours = '';
	$inside_tag = false;
	$stop_balise = false;
	
	$nl = utf8_encode("\n");
	$ta = utf8_encode("\t");
	$rc = utf8_encode("\r");

	
	$exclusions = array(
		'<param', '<script', '<object', '<embed', '<style', '<span', '<label', '<form', '<code', '<pre', '<h2', '<h3', '<h4', '<a');
		
	$exclusions_toutes = array(
		'<param', '<script', '<object', '<embed', '<style', '<span', '<label', '<form', '<code', '<pre', '<h2', '<h3', '<h4', '<a',
		'</param', '</script', '</object', '</embed', '</style', '</span', '</label', '</form', '</code', '</pre', '</h2', '</h3', '</h4', '</a'
		);
	
	while ( $curseur < $longueur_texte ) { // on parcout le texte caractère par caractère 
	
		// obligé de faire comme ça à cause utf-8
		$car_courant = mb_substr($texte, $curseur, 1, 'UTF-8');
		
		
		// je cherche à mémoriser dans quel balise on est 
		if ( $inside_tag == true ) {
			if ( $car_courant == ' ' ) { 
				$stop_balise = true;
			}
			
			if ( !$stop_balise && $car_courant != '>' ) $balise_en_cours .= $car_courant;
		}
		
		

		if ( $car_courant == $limiteur1 ) {	// on est sur un debut de balise 
		
			if ( $inside_tag == true ) { // on était dans une balise, ceci est très bizarre .... !!! 
			
				// ne devrait jamais arriver
				
				$tronçon_actuel .= $car_courant;	
			
			}
			
			else { // on n'était pas dans un tag 
				
				if ( trim($tronçon_actuel) != '' ) { // sauver le texte en cours, qui est déjà terminé		
					
					// le texte normal contient des balises de plugin, on va encore le découper pour ne pas s'introduire dans ces balises 
					if ( $type == 'html' && preg_match("`\[[^\]]+\]`i", $tronçon_actuel) ) {
						// appel recursif pour la balise wordpress
						ad_decoupe_texte($decoupe, $tronçon_actuel, '[', ']', 'plugin'); 
					}					
					
					// j'essaye de mettre de coté les textes dans certaines balises
					// pour ne pas mettre des liens n'importe où
					else if ( in_array($balise_en_cours, $exclusions) == true ) { 
						// sauver le texte normal comme du html pour qu'il ne soit pas traité par la suite
						$decoupe[] = array('contenu_dans_balise_speciale' => $tronçon_actuel); 
					}
					
					// c'est une adresse de site, vaut mieux la mettre de coté pour qu'elle ne soit pas modifiée par la suite 
					else if ( mb_strpos($tronçon_actuel, 'http://', 0, 'UTF-8') !== false ) { 
						$decoupe[] = array('lien' => $tronçon_actuel);
					}
					
					
					else { // c'est que du texte normal 
						
						// le texte normal va encore être découpé par sa ponctuation
						$decoupe[] = array('texte' => ad_mots_correspondances($tronçon_actuel)); // sauver le texte normal
					}
				}
				
				$inside_tag = true; // on est maintenance dans une balise 
				
				$stop_balise = false; // on dit qu'on peut commencer à mémoriser la balise 
				
				// on débute une nouvelle balise 
				$balise_en_cours = $tronçon_actuel = $car_courant; // le < ou le [ 
					
			}
			
		}
		
		else if ( $car_courant == $limiteur2 ) { // fermeture d'une balise 
							
			if ( $inside_tag == true ) { // on était dans une balise 
			
				$tronçon_actuel .= $car_courant;	// sauver le > ou le ] 
			
				if ( $tronçon_actuel != '' ) { // sauver la balise 
				
					if ( in_array($balise_en_cours, $exclusions_toutes) == true ) { 
						$decoupe[] = array('balise_speciale' => $tronçon_actuel); 
					}
					else { 
						$decoupe[] = array($type => $tronçon_actuel); 
					}
				
				} 
			
				$tronçon_actuel = ''; // on repart de zéro
				
				$inside_tag = false; // on n'est plus dans une balise 
				
				// echo "\n<!-- debug $balise_en_cours -->";
			}
			
			else { // on était dans du texte, prenons ça comme un caractère normal 
				$tronçon_actuel .= $car_courant;	
			}
			
		}
		
		// dernier caractère
		else if ( $curseur == ($longueur_texte-1) ) { // on est sur le dernier caractère 
			
			$tronçon_actuel .= $car_courant; // on prend ce dernier caractère 
			
			// il faudrait se demander si on était dans du texte ou dans une balise... 
			if ( $inside_tag == true ) { // on était dans une balise 
				$decoupe[] = array($type => $tronçon_actuel); 
			}
			else { // on était dans du texte 
				$decoupe[] = array('texte' => ad_mots_correspondances($tronçon_actuel)); // sauver le texte normal
			}
		
		}
		
		else if ( $car_courant == $nl ) {
			$decoupe[] = array('hidden_car' => "\n"); 
			$tronçon_actuel .= $car_courant;	
		}
		
		else if ( $car_courant == $rc ) {
			$decoupe[] = array('hidden_car' => "\r"); 
			$tronçon_actuel .= $car_courant;	
		}
		
		else if ( $car_courant == $ta ) {
			$decoupe[] = array('hidden_car' => "\t");
			$tronçon_actuel .= $car_courant;	 
		}
		
		// continuer ce texte ou cette balise 
		else { 
			$tronçon_actuel .= $car_courant;	
		} 
		
		$curseur++;	
		
		
	}
	

}

// fonction appelée par ad_decoupe_texte
// retourne un tableaux avec plusieurs tronçons: les mots, la ponctuation
// prend en paramètre un texte normal sans balise
function ad_mots_correspondances($contenu = '') { 

	if ( !is_string($contenu) || $contenu == '' ) return array();
	
	$contenu = html_entity_decode($contenu, ENT_QUOTES, 'UTF-8'); // sans entités
	
	$len = mb_strlen($contenu);
	
	if ( $len == 0 ) return array();
	
	$curseur = 0;
	
	$correspondances = array();
	
	$nouveau_mot = '';
	
	while ( $curseur < $len ) {
	
	
		$car_courant = mb_substr($contenu, $curseur, 1, 'UTF-8');
		
		
		if ( in_array($car_courant, array(' ', '’', '(', ')', ',', '.', ':', ';', '_', '?', '!', "'", '"', '/', '\\', '+', '*') ) ) {
		
			// on sauve le mot précédent
			if ( $nouveau_mot != '' ) {
				$correspondances[] = array(
											'type' => 'mot', 
											'original' => htmlentities($nouveau_mot, ENT_QUOTES, 'UTF-8'), 
											'purge' => ad_purge_mot($nouveau_mot)
										);
			}
			
			// on enregistre cette ponctuation
			$correspondances[] = array(
										'type' => 'ponctuation', 
										'original' => htmlentities($car_courant, ENT_QUOTES, 'UTF-8'), 
										'purge' => $car_courant
									);
		
			
			
			// on se prépare pour enregistrer un nouveau mot
			$nouveau_mot = '';
		
		}
		
		// il faut penser à enregistrer le dernier mot
		else if ( $curseur == ($len-1) ) {
			$nouveau_mot .= $car_courant;
			$correspondances[] = array(
										'type' => 'mot', 
										'original' => htmlentities($nouveau_mot, ENT_QUOTES, 'UTF-8'), 
										'purge' => ad_purge_mot($nouveau_mot)
									);
		}
		
		else {
		
			$nouveau_mot .= $car_courant;			
		
		}
		
		$curseur++;	
	
	}
	
	return $correspondances;

}

// fonction appelée par ad_mots_correspondances
// retourne un mot avec que des caractères [a-z]
// prend en paramètre un mot quelconque
function ad_purge_mot($texte) { 

	$texte = html_entity_decode($texte, ENT_QUOTES, 'UTF-8'); 

	// passage en ISO
	$texte = utf8_decode($texte); 
	
	$texte = trim($texte);
	
	// sans accents
	$texte = strtr($texte, utf8_decode("ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ"), "AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy");
	
	// en minuscules 
	$texte = strtolower($texte); 
	
	// retour en UTF-8
	return utf8_encode($texte);
	

}

// fonction appelé par le filtre de contenu
// prend en paramètre le tableau $decoupe qui contient le texte de l'article découpé
// et un tableau $tags_blog avec tous les tags du blog selectionnés
// retourne un tableau avec les tags en commun, extrait de $tags 
function ad_cherche_tags_du_texte($decoupe, $tags_blog) {

	$tags_communs = array(); 
	
	foreach ( $decoupe as $i => $segment ) {
	
		foreach ( $segment as $type => $content ) {
		
			if ( $type == 'texte' ) { // on ne cherche que dans les segments de type texte 
			
				foreach ( $content as $word ) {
					// si c'est un mot (et pas une ponctuation)
					// et qu'il fait partie des tags du blog
					// et qu'il n'est pas encore enregistré
					if ( $word['type'] == 'mot' && array_key_exists($word['purge'], $tags_blog) && !array_key_exists($word['purge'], $tags_communs) ) { 
						$tags_communs[$word['purge']] = $tags_blog[$word['purge']];
					} 
				}
			
			}
		}	
	}
	
	return $tags_communs;

}

// fonction appelé par le filtre principal
// son but est de recomposer le texte de l'article avec les liens vers les tags
// prend en paramètre le tableau $decoupe du texte découpé
// et les tags selectionnés dans le tableau $tags
function ad_recompose_texte($decoupe, $tags) {

	$recompose = '';
	
	$stop = count($tags);
	
	$cptr = 0;
	
	$last = '';
	
	foreach ( $decoupe as $i => $segment ) {
	
		foreach ( $segment as $type => $content ) {

			if ( $type == 'texte' ) {
			
				foreach ( $content as $word ) {
					
					$original = $word['original'];
					$purge = $word['purge'];
					
					if ( $word['type'] == 'ponctuation' ) {
						$recompose .= $original;
					}
				
					else if ( $cptr < $stop && array_key_exists($purge, $tags) ) { 
					
						$cptr++;
					
						// met le lien
						$recompose .= '<a title="' . __('See the tag', 'albt') . ': ' . $purge . ' (' . $tags[$purge]['count'] . ' ' . ($tags[$purge]['count']>1 ? __('posts', 'albt') : __('post', 'albt')) . ')" class="autobesttag" rel="nofollow" href="' . get_tag_link($tags[$purge]['term_id']) . '">' . $original . '</a>';
					
						// pour ne pas le reprendre une deuxième fois
						unset($tags[$purge]);
					} 
					else {
						$recompose .= $original;
					}
					
				}			
			}
			else if ( $type == 'plugin' ) {
				// il me semble que je dois rajouter un espace ici qui a été perdu ?
				$recompose .= $content . ' ';
			}
			else if ( $type == 'lien' ) {
				$recompose .= $content;
			}
			else if ( $type == 'html' ) { 
				$recompose .= $content;
			}
			else {
				$recompose .= $content;
			}
		}	
	}

	
	return $recompose;

}


?>