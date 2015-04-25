<?php

// Config
$dbhost = 'localhost';
$dbname = 'fruit';
 
$db = new MongoClient('mongodb://localhost', array());

$c1 = $db->selectCollection($dbname, "fruit");
$c2 = $db->selectCollection($dbname, "fruit_price");


/*
	SEARCH on fruit DB
*/
$cursor = $c1->find();

foreach ($cursor as $doc) {
    //for every fruit
    $id = (string)$doc['_id'];
	$name = $doc['name'];
	$quantity = $doc['quantity'];
	$distributor = $doc['distributor'];
	echo 'Fruit Name: '.$id.'<br>Fruit Quantity: '.$quantity.'<br>Distributor: '.$distributor."<br/>";

	//find the price changes using referencing bu fruit_id
	$fruit_price_query = array('fruit_id' => $id);
	$cursor2 = $c2->find($fruit_price_query);

	foreach ($cursor2 as $doc2) {
	    // do something to each document
		$id = $doc2['fruit_id'];
		$price = $doc2['price'];
		$date = $doc2['date'];
		echo '<br>Fruit ID: '.$id.'<br>Price: '.$price.'<br>Date: '.$date."<br/>";
	}
}

?>
