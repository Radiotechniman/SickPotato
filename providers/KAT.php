<?php

$query = 'Castle S06E36' ; 
$team = 'Dutchreleaseteam' ; 
$category = 'category:tv' ; 

$search = $team.' '.$query.' '.$category ; 
$search = rawurlencode($search) ;

$url = 'http://kickass.to/usearch/'.$search.'/?rss=1' ; 
// echo $url."<br>" ; 

$feed = implode(file($url));
$xml = simplexml_load_string($feed);
$json = json_encode($xml);

$array = json_decode($json,TRUE);
echo "<pre>" ; 
var_dump($array);
echo "</pre>" ; 
$Title = $array['channel']['item']['title'] ; 
$Cat = $array['channel']['item']['category'] ; 
$Link = $array['channel']['item']['enclosure']['@attributes']['url']  ; 
$Link_size = $array['channel']['item']['enclosure']['@attributes']['length']  ; 

echo $Title . "<br>" . $Cat  . "<br>" . $Link . "<br>" . $Link_size . "<br>" ; 
//todo : save file to specified location 

?>