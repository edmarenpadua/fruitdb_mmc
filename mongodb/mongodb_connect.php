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
$fruit_ctr = 0;
$fp_ctr = 0;

$cursor = $c1->find();
foreach ($cursor as $doc) {
    //for every fruit
    $id = (string)$doc['_id'];
    $mongodb[$fruit_ctr]['id'] = $id;
	$mongodb[$fruit_ctr]['name'] = $doc['name'];
	$mongodb[$fruit_ctr]['quantity'] = $doc['quantity'];
	$mongodb[$fruit_ctr]['distributor'] = $doc['distributor'];

	//find the price changes using referencing through fruit_id
	$fruit_price_query = array('fruit_id' => $id);
	$cursor2 = $c2->find($fruit_price_query);

	foreach ($cursor2 as $doc2) {
	    // do something to each document
	    $mongodb[$fruit_ctr]['price_date'][$fp_ctr]['pd_id'] = (string)$doc2['_id'];
		$mongodb[$fruit_ctr]['price_date'][$fp_ctr]['price'] = $doc2['price'];
		$mongodb[$fruit_ctr]['price_date'][$fp_ctr]['date'] = $doc2['date'];
		$fp_ctr++;
	}
	$fruit_ctr++;
	$fp_ctr = 0;
}

/*
	EDIT on fruit DB
*/

//if(isset($_POST["edit"])) {
/*	$id_query = array('name' => 'Apple');

	//echo $id_query;

	$cursor = $c1->find($id_query);

	foreach ($cursor as $doc) {
	    var_dump($doc['_id']);
	}*/

	echo "string";

	//echo $cursor;

 	/*$fruit = array();
 	$fruit_price = array();

 	$fruit['name'] = $_POST['name'];
 	$fruit['quantity']  = $_POST['quantity'];
 	$fruit['distributor']  = $_POST['distributor'];

	//add to fruit collection
	$c1->insert($fruit);

 	$fruit_price['fruit_id'] = (string)$fruit['_id'];
 	$fruit_price['price']  = $_POST['price'];
 	$fruit_price['date']  = date("m-d-Y");*/
	//add to fruit_price collection
	//$c2->insert($fruit_price);
//}

//var_dump($mongodb);


/*
	DELETE on fruit DB
*/

if(isset($_GET["delete"])) {
	$id = $_GET["record_id"];
	$id_query = array('_id' => new MongoId($id));

	//$cursor = $c1->find($id_query);
	$c1->remove($id_query);
	//var_dump($_GET["record_id"]);
}

?>
