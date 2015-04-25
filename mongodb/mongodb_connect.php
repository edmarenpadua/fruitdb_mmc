<?php

// Config
$dbhost = 'localhost';
$dbname = 'fruit';
 
$conn = new MongoClient('mongodb://localhost', array());
$select_db = $conn->selectDB($dbname);

$c1 = $conn->$select_db->selectCollection("fruit");
$c2 = $conn->$select_db->selectCollection("fruit_price");

/*
	INSERT on fruit DB
*/
 if(isset($_POST["save"])) {
 	$fruit = array();
 	$fruit_price = array();

 	$fruit['name'] = $_POST['name'];
 	$fruit['quantity']  = $_POST['quantity'];
 	$fruit['distributor']  = $_POST['distributor'];

	//add to fruit collection
	$c1->insert($fruit);

	echo $fruit['_id'];

 	$fruit_price['fruit_id'] = (string)$fruit['_id'];
 	$fruit_price['price']  = $_POST['price'];
 	$fruit_price['date']  = date("Y-m-d");
	//add to fruit_price collection
	$c2->insert($fruit_price);
}


/*
	VIEW on fruit DB
*/
$cursor = $c1->find();

foreach ($cursor as $doc) {
    //for every fruit
    $id = (string)$doc['_id'];
	$name = $doc['name'];
	$qty = $doc['quantity'];
	$distributor = $doc['distributor'];
	echo 'Fruit Name: '.$id.'<br>Fruit Quantity: '.$qty.'<br>Distributor: '.$distributor."<br/>";

	//find the price changes using referencing bu fruit_id
	$fruit_price_query = array('fruit_id' => $id);
	$cursor2 = $c2->find($fruit_price_query);

	foreach ($cursor2 as $doc2) {
	    // do something to each document
		$id = $doc2['fruit_id'];
		$price = $doc2['price'];
		$date = $doc2['date'];
		echo '<br>Price: '.$price.'<br>Date: '.$date."<br/>";
	}

	echo "###################<br>";
}



?>
