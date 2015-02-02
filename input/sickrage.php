<?php
#Search on shows and check status through sickrage
$dblocation = './sickbeard.db' ;
function search_existing(){
#location sickbeard db, below defaulted for testing
	global $dblocation ; 

	if(file_exists($dblocation)) {
		echo "ok next <br>" ; 

	}
	$show_name =  '' ; 
	$tv_season = '' ; 
	$tv_episode = ''; 

$sqlite_text = ¨SELECT tv_episodes.season, tv_episodes.episode, tv_episodes.status FROM tv_episodes WHERE tv_episodes.showid = (SELECT tv_shows.indexer_id FROM tv_shows
WHERE tv_shows.show_name LIKE '".$show_name"' ) AND tv_episodes.season = '".$tv_season."' AND tv_episodes.episode = '8' ; ";

$sqlite_tvdb_id = "SELECT tv_episodes.season, tv_episodes.episode, tv_episodes.status FROM tv_episodes WHERE tv_episodes.showid = '248835' 
AND tv_episodes.season = '2' AND tv_episodes.episode = '8' ; "

//include 'settings.php' ; 
//$db = new SQLite3($dblocation);
//$results = $db->query("SELECT show_name FROM tv_shows WHERE  1 = 1;");
//while ($row = $results->fetchArray()) {
//    echo "<pre>" ; 
//    var_dump($row);
//    echo "</pre>" ; 
//}
}

function MissingEpisodes($showname){
	
	global $dblocation ; 
	$db = new SQLite3($dblocation);
	$results = $db->query("SELECT tv_shows.show_name, substr('00' || tv_episodes.season,-2,2)  ,  substr('00' || tv_episodes.episode,-2,2) 
		FROM tv_episodes LEFT JOIN tv_shows ON tv_episodes.showid = tv_shows.indexer_id 
		WHERE tv_episodes.showid = (SELECT tv_shows.indexer_id FROM tv_shows WHERE tv_shows.show_name LIKE '%".$showname."%' ) 
		AND tv_episodes.status = '3' AND tv_episodes.season > 0 ; ");



}


?>