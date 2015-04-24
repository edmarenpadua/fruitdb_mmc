<?php

// Config
$dbhost = 'localhost';
$dbname = 'zipcoll';
 
$db = new MongoClient('mongodb://localhost', array());

$c1 = $db->selectCollection("test", "zipcoll");

echo $c1;

$cursor = $c1->find();

foreach ($cursor as $doc) {
    // do something to each document
	$population = $doc['pop'];
	$city = $doc['city'];
	$state = $doc['state'];
	echo 'City: '.$city.' State: '.$state.' Pop: '.$population."<br/>";
}
 echo "hello";
?>
