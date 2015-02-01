<?php
#Search on shows and check status through sickrage



function search_existing(){
#location sickbeard db, below defaulted for testing
	$dblocation = './sickbeard.db' ;

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

}

?>