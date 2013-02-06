<?php
	class Spotify{
		var $plugin_url;
		var $options;
		var $key;
		
		function Spotify(){
			$this->__construct();
		}
		
		function __construct(){
			$this->plugin_url = defined('WP_PLUGIN_URL') ? 
								trailingslashit(WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__))) : 
								trailingslashit(get_bloginfo('wpurl')) . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__));
			$this->key = 'wp-spotify';
			$this->options = get_option($this->key);
			$this->add_filters_and_hooks();
		}
		
		function add_filters_and_hooks(){
			add_filter('the_content', 			array($this, 'checkForSong'));
			add_action('wp_head', 				array($this, 'addstylesheet'));
			add_action('wp_insert_post', 		array($this, 'check'));
			add_action('wp_update_post', 		array($this, 'check'));
			add_action("plugins_loaded", 		array($this, 'install'));
			register_activation_hook(__FILE__,  array($this, 'install'));
		}

		function addstylesheet(){
			echo "<link rel='stylesheet' href='".$this->plugin_url."wp-spotify.style.css' type='text/css' />\n";
		}
		
		
		function install(){
			if (function_exists('register_sidebar_widget')){
				register_sidebar_widget('WP-Spotify', array($this, 'widget'));
			}    
			if (function_exists('register_widget_control')){    
				register_widget_control('WP-Spotify', array($this, 'widget_control'));
			}
			global $wpdb;
			$table = $wpdb->prefix."spotify";
			$structure = "CREATE TABLE $table (
				trackAlbumTitle varchar(255) NOT NULL,
				trackAlbumUri varchar(255) NOT NULL,
				trackAlbumCover varchar(255) NOT NULL,
				trackArtistName varchar(255) NOT NULL,
				trackArtistUri varchar(255) NOT NULL,
				trackTrackTitle varchar(255) NOT NULL,
				trackTrackUri varchar(255) NOT NULL,
				trackAdded datetime NOT NULL,
				UNIQUE KEY trackTrackUri (trackTrackUri)
				);";
			$wpdb->query($structure);
			$wpdb->query("ALTER TABLE $table MODIFY trackAlbumTitle varchar(255);");
			$wpdb->query("ALTER TABLE $table MODIFY trackAlbumUri	varchar(255);");
			$wpdb->query("ALTER TABLE $table MODIFY trackAlbumCover varchar(255);");
			$wpdb->query("ALTER TABLE $table MODIFY trackArtistName varchar(255);");
			$wpdb->query("ALTER TABLE $table MODIFY trackArtistUri	varchar(255);");
			$wpdb->query("ALTER TABLE $table MODIFY trackTrackTitle varchar(255);");
			$wpdb->query("ALTER TABLE $table MODIFY trackTrackUri	varchar(255);");

			$widget_options = array();
			$widget_options['count'] = 5;
			$widget_options['credits'] = 1;	
			$widget_options['title'] = 'Mina Spotify-favoriter';
			add_option($this->key, $widget_options, 'WP-Spotify');
		}
		
		function testa($text){
			echo '<pre>';
			print_r($text);
			echo '</pre>';
		}

		function getTrackAttributes($uri){
			$url = 'http://ws.spotify.com/lookup/1/.json?uri='.$uri;
			$request = new WP_Http;
			$result = $request->request($url);
			if ($result['response']['code'] == 200) {

				$result = utf8_encode($result['body']); 
				$result = json_decode($result);
				$coverUri = str_replace('spotify:track:', '', $uri);
				$coverUrl = 'http://open.spotify.com/track/' . $coverUri;
				$coverRequest = new WP_Http;
				$coverResults = $coverRequest->request($coverUrl);
				if($coverResults['response']['code'] == 200){
					$parser = xml_parser_create();
					$vals   = array();
					$index  = array();
					$nomoreartist = false;
					xml_parse_into_struct($parser, $coverResults['body'], $vals, $index);
					xml_parser_free($parser);
					if(count($vals)){
						foreach($vals as $val){
							if($val['tag'] == 'META' && substr($val['attributes']['PROPERTY'], 0, 14) == 'og:image') {
								$coverImage = $val['attributes']['CONTENT'];
							}
						}
					}
				}
				$cover = str_replace('thumb', 'image', $coverImage);
				$album = array("href" => $result->track->album->href, "name" => $result->track->album->name, "cover" => $cover);
				$artist= array("href" => $result->track->artists[0]->href, "name" => $result->track->artists[0]->name);
				$track = array("href" => $result->track->href, "name" => $result->track->name);
				return array("album" => $album, "artist" => $artist, "track" => $track);
			}
		}
		
		function addToDb($trackUri){
			global $wpdb;
			$table = $wpdb->prefix."spotify";
			$trackAdded	= get_the_time("Y-m-d H:i:s");
			$the_count	= mysql_query("SELECT COUNT(*) FROM $table WHERE trackTrackUri='$trackUri'");
			$the_count	= mysql_result($the_count, 0);
			if($the_count==0){
				$trackInfo		= $this->getTrackAttributes($trackUri);
				$result = mysql_query("INSERT INTO $table(trackAlbumTitle,trackAlbumUri,trackAlbumCover,trackArtistName,trackArtistUri,trackTrackTitle,trackTrackUri,trackAdded) VALUES('".mysql_escape_string($trackInfo['album']['name'])."','".$trackInfo['album']['href']."','".$trackInfo['album']['cover']."','".mysql_escape_string($trackInfo['artist']['name'])."','".$trackInfo['artist']['href']."','".mysql_escape_string($trackInfo['track']['name'])."','".$trackInfo['track']['href']."','".$trackAdded."')");
				if (!$result)
					die(mysql_error());
			}
			else{
				$result = mysql_query("UPDATE $table SET trackAdded='$trackAdded' WHERE trackTrackUri='$trackUri'");
				if (!$result)
					die(mysql_error());
			}
		}
		
		function check($post){
			$post = get_post($post);
			$the_content = $post->post_content;
			if (strpos($the_content, "spotify:")!==false){
				$char_codes = array('&#215;', '&#8211;');
				$replacements = array("x", "--");
				$the_content = str_replace($char_codes, $replacements, $the_content);
				preg_match_all("/\[(spotify:track:[a-zA-Z0-9]{22})\]/", $the_content, $matches, PREG_SET_ORDER);
				foreach($matches as $match){
					$this->addToDb($match[1]);
				}
			}
		}
		
		function checkForSong($the_content){
			if (strpos($the_content, "spotify:")!==false){
				global $wpdb;
				$table = $wpdb->prefix."spotify";
				$char_codes = array('&#215;', '&#8211;');
				$replacements = array("x", "--");
				$the_content = str_replace($char_codes, $replacements, $the_content);
				preg_match_all("/\[(spotify:track:[a-zA-Z0-9]{22})\]/", $the_content, $matches, PREG_SET_ORDER);
				if(sizeof($matches)>1){
					$songs = array();
					foreach ($matches as $match){
						array_push($songs, $match[1]);
						$the_content= str_replace($match[0], '', $the_content);
					}
					$the_content= $the_content.$this->embedSpotifySongs($songs);
				}
				else{
					foreach ($matches as $match){
						$the_content= str_replace($match[0], $this->embedSpotifySong($match[1]), $the_content);
					}
				}
			}
			return $the_content;
		}
		
		function embedSpotifySongs($the_songs){
			$songs = implode("','", $the_songs);
			global $wpdb;
			$table = $wpdb->prefix."spotify";
			$sql = "SELECT * FROM $table WHERE trackTrackUri IN('$songs')";
			$the_uri = mysql_query($sql);
			if (!$the_uri) {
				die(mysql_error());
			}
			$out = "\n";
			$out = $out."<div class=\"spotify\">";
			$out = $out."<ul>";
			while ($track = mysql_fetch_assoc($the_uri)) {
				$uri = $track['trackTrackUri'];
				$das_uri = str_replace('spotify:track:', '', $track['trackTrackUri']);
				$out = $out . "<li ondblclick=\"location='$uri';\" class=\"track\" title=\"Doubleclick to play on Spotify\">";
				$out = $out . "<ul><li class=\"share\"><img src=\"".$this->plugin_url."img/share.png\" onmouseup=\"window.open('http://www.facebook.com/sharer.php?u=http://open.spotify.com/track/$das_uri','','width=660,height=340');\" /></li><li class=\"tracktitle\">".$track['trackTrackTitle']."</li><li class=\"artistname\">".$track['trackArtistName']."</li><li class=\"albumtitle\">".$track['trackAlbumTitle']."</li></ul>";
				$out = $out . "</li>";
			}
			$out = $out."</ul>";
			$out = $out."<a href=\"http://wordpress.org/extend/plugins/wp-spotify/\" style=\"float:right;\"><img src=\"".$this->plugin_url."img/logo.png\" style=\"border:0px none;\" /></a>";
			$out = $out."</div>";
			return $out;
		}
		
		function embedSpotifySong($the_song){
			global $wpdb;
			$table = $wpdb->prefix."spotify";
			$the_uri = mysql_query("SELECT * FROM ".$table." WHERE trackTrackUri='".$the_song."' LIMIT 1");
			if (!$the_uri) {
				die(mysql_error());
			}
			while ($track = mysql_fetch_assoc($the_uri)) {
				$shareUri = str_replace('spotify:track:', '', $track['trackTrackUri']);
				$out = "\n";
				$out = $out."<div class=\"spotify\">";
				$out = $out."<div class=\"meta\">";
				$out = $out."<a class=\"play\" title=\"Open in Spotify\" href=\"".$track['trackTrackUri']."\">&nbsp;</a>";
				if($this->options['credits']=="1"){
					$out = $out."<a href=\"http://wordpress.org/extend/plugins/wp-spotify/\"><img src=\"".$this->plugin_url."img/logo.png\" style=\"width:64px;border:0px none;\" /></a>";
				}
				$out = $out."</div>";
				$out = $out."<div class=\"albumcover\">";
				$out = $out."<a href=\"spotify:album:".$track['trackAlbumUri']."\"><img src=\"".$track['trackAlbumCover']."\" /></a>";
				$out = $out."</div>";
				$out = $out."<div class=\"trackinfo\">";
				$out = $out."<a href=\"".$track['trackTrackUri']."\" id=\"track\" class=\"stylish\">".$track['trackTrackTitle']."</a>";
				$out = $out."<a href=\"".$track['trackArtistUri']."\" id=\"artist\" class=\"stylish\"><span></span>".$track['trackArtistName']."</a>";
				$out = $out."<a href=\"".$track['trackAlbumUri']."\" id=\"album\" class=\"stylish\"><span></span>".$track['trackAlbumTitle']."</a>";
				$out = $out."</div>";
				$out = $out."<iframe src=\"http://www.facebook.com/plugins/like.php?href=http://open.spotify.com/".$shareUri."&amp;layout=standard&amp;show_faces=false&amp;action=like&amp;colorscheme=dark\" width=\"100%\" scrolling=\"no\" frameborder=\"0\"  onload=\"this.style.display='inline-block';\" allowTransparency=\"true\"></iframe>";
				$out = $out."</div>";
			}
			return $out;
		}
		
		function widget($args = array()){
			extract ($args);
			global $wpdb;
			$table = $wpdb->prefix.'spotify';
			$wpsql = mysql_query("SELECT trackTrackUri, trackArtistName, trackTrackTitle FROM $table ORDER BY trackAdded DESC LIMIT {$this->options['count']}");
    	    echo $before_widget;
			if($this->options['credits']=="1"){
				echo $before_title, "<a href=\"http://wordpress.org/extend/plugins/wp-spotify/\" style=\"float:right;\"><img src=\"".$this->plugin_url."img/logo.png\" style=\"height:24px;border:0px none;\" /></a>".$this->options['title'], $after_title;
			}
			else{
				echo $before_title, $this->options['title'], $after_title;
			}
			echo "<ul>";
			while($Song=mysql_fetch_assoc($wpsql)){
				$x++;
				echo "<li style=\"padding:2px;margin-bottom:0px;\"><img src=\"".$this->plugin_url."img/track.png\" style=\"margin-right:5px;float:left;\" /><a href=\"{$Song['trackTrackUri']}\">{$Song['trackArtistName']} - {$Song['trackTrackTitle']}</a></li>";
			}
			echo "</ul>";
			echo $after_widget;
		}
		
		function widget_control(){
			if($_REQUEST['submit']){
				$this->options['count'] = stripslashes($_REQUEST['count']);
				$this->options['credits'] = stripslashes($_REQUEST['credits']);
				$this->options['title'] = stripslashes($_REQUEST['title']);
			}
			update_option($this->key, $this->options);
			$count = wp_specialchars($this->options['count']);
			$credits = wp_specialchars($this->options['credits']);
			$title = wp_specialchars($this->options['title']);
			echo "<p><label for=\"title\">" . __('Title:') . "</label><input class=\"widefat\" type=\"text\" id=\"title\" name=\"title\" value=\"{$title}\" /></p>";
			echo "<p><label for=\"count\">" . __('Number of posts to show:') . "</label><input class=\"widefat\" type=\"text\" id=\"count\" name=\"count\" value=\"{$count}\" /></p>";
			echo "<input type=\"checkbox\" class=\"checkbox\" id=\"credits\" name=\"credits\"".($credits=="1" ? " checked=\"checked\"" : "")." value=\"1\" /> <label for=\"credits\">" . __('Credits') . "</label></p>";
			echo "<input type=\"hidden\" id=\"submit\" name=\"submit\" value=\"1\" />";
		}
	}
?>