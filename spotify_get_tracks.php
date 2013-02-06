<?php
	$con = mysql_connect("mysql.pimplemousse.com","pimpword","PIMP4Wordpress");
	
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	}
	$db_selected=mysql_select_db("pimplemoussecom1", $con);
	
	if (!$db_selected){
	  die ("Can\'t use database_name : " . mysql_error());
	}
	
	$sql = "SELECT trackAlbumTitle, trackAlbumUri, trackArtistName, trackArtistUri, trackTrackTitle, trackTrackUri FROM wp_spotify ORDER BY trackAdded DESC LIMIT 32"; 
	$result = mysql_query($sql);
	$search_results=array(); 
	while($row = mysql_fetch_array($result)){
	  //add data from $row into $search_results
	  	$search_results[] = $row;
	}
	
	shuffle($search_results);
	echo json_encode($search_results);
?>