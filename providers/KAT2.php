<?php

$search = 'mom Nl subs';
$cat = 'tv'; 

rss_kickass_search($search,$cat) ; 

function rss_kickass_search($search,$cat){
	$search = rawurlencode($search) ; 
	if($cat!=''){
		$cat = rawurlencode(' category:'.$cat) ; 
		}	
$rss = simplexml_load_file('http://kickass.so/usearch/'.$search.$cat.'/?rss=1');
	
foreach ($rss->channel->item as $item) {
   $title = $item->title ; 	
	//   echo $item->link.'<br>';
	$date = $item->pubDate;
	$date = date("Y-m-d", $date) ; 
//	if($item->description!=''){
//		echo $item->description.'<br>';
//	}
	$cat = $item->category;
//	echo $item->author.'<br>';
	foreach($item->enclosure->attributes() as $a => $b) {
	if($a=='url'){
		$torrent = $b ;
		}
	}

	//enter data in DB
	echo $title.'-'.$date.'-'.$cat.'-'.$torrent.'<br>' ; 
	
}
	
	
}
?>