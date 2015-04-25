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
 if(isset($_POST["submit"])) {
 	$fruit = array();
 	$fruit_price = array();

 	$fruit['name'] = $_POST['name'];
 	$fruit['quantity']  = $_POST['quantity'];
 	$fruit['distributor']  = $_POST['distributor'];

	//add to fruit collection
	$c1->insert($fruit);

 	$fruit_price['fruit_id'] = (string)$fruit['_id'];
 	$fruit_price['price']  = $_POST['price'];
 	$fruit_price['date']  = date("m-d-Y");
	//add to fruit_price collection
	$c2->insert($fruit_price);
}

/*
	VIEW on fruit DB
*/

$mongodb = array();
$mongodb_fp = array();

$fruit_ctr = 0;
$fp_ctr = 0;

$cursor = $c1->find();
foreach ($cursor as $doc) {
    //for every fruit
    $id = (string)$doc['_id'];
	$mongodb[$fruit_ctr]['name'] = $doc['name'];
	$mongodb[$fruit_ctr]['quantity'] = $doc['quantity'];
	$mongodb[$fruit_ctr]['distributor'] = $doc['distributor'];
	//echo 'Fruit Name: '.$name.'<br>Fruit Quantity: '.$qty.'<br>Distributor: '.$distributor."<br/>";

	//find the price changes using referencing through fruit_id
	$fruit_price_query = array('fruit_id' => $id);
	$cursor2 = $c2->find($fruit_price_query);

	foreach ($cursor2 as $doc2) {
	    // do something to each document
		$mongodb[$fruit_ctr]['price_date'][$fp_ctr]['price'] = $doc2['price'];
		$mongodb[$fruit_ctr]['price_date'][$fp_ctr]['date'] = $doc2['date'];
		//echo '<br>Price: '.$price.'<br>Date: '.$date."<br/>";

		$fp_ctr++;
	}
	//$mongodb[$fruit_ctr]['price_date']['hi'] = "hello";

	$fruit_ctr++;
	$fp_ctr = 0;
}

var_dump($mongodb);


?>
