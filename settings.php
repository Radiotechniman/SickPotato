<?php
#settings

#should be set to your sickbeard.db
$dblocation = './sickbeard.db' ;

# validations etc. 
$die='' ;  
if(!file_exists($dblocation)) {
	$die .= '@Please enter the db location in the settings' ; 
}


#if there are any errors show them 
if($die!=""){
	echo "There were some errors :".str_replace("@", "<br>", $die) ; 
	exit ; 
}


?>

