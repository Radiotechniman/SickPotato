<?php

//needs to be updated 
$url = 'http://www.omdbapi.com/?t=Sliders&y=' ; 


function omdbapi($url){
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
$data = json_decode($result, true) ; 
// Will dump a beauty json :3
echo "<pre>" ; 
var_dump($data);
echo "</pre>" ; 

$Title = $data['Title'] ; 
$Plot = $data['Plot'] ;
$Poster = $data['Poster'] ;
$Rating = $data['Rating'] ;
$Votes = $data['imdbVotes'] ;
$Genre = $data['Genre'] ;
$Released = $data['Released'] ; 
$Year = $data['Year'] ; 
$imdbRating = $data['imdbRating'] ;
$Awards = $data['Awards'] ;
$ID = $data['imdbID'] ;
$Type = $data['series'] ;

}

?>