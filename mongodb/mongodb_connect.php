<?php

// Config
$dbhost = 'localhost';
$dbname = 'fruit_db';
 
$db = new MongoClient('mongodb://localhost', array());

/*$c1 = $db->selectCollection("test", "zipcoll");

$cursor = $c1->find();

foreach ($cursor as $doc) {
    // do something to each document
	$population = $doc['pop'];
	$city = $doc['city'];
	$state = $doc['state'];
	echo 'City: '.$city.' State: '.$state.' Pop: '.$population."<br/>";
}*/
 
?>
