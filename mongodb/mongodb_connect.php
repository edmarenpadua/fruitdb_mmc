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
 	$b = time();

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

	$a = time();

	echo "<br><br><br><br><br><br><br>";
	echo $a;
	echo "<br>";
	echo $b;
	echo $a-$b;
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

if(isset($_POST["edit"])) {
	$id = $_POST["edit_this"];
	//$id_query = array('_id' => new MongoId($id));

	echo "<br><br><br><br><br><br><br><br><br><br>";
	echo $id;

 	$fruit = array();
 	$fruit_price = array();
 	$fruit['name'] = $_POST['name'];
 	$fruit['quantity']  = $_POST['quantity'];
 	$fruit['distributor']  = $_POST['distributor'];
 	//$fruit_price['date']  = date("m-d-Y");

 	$c1->remove(array('_id' => new MongoId($id)));
	//add to fruit collection
	$c1->update(
	    array("_id" => new MongoId($id)),
	    $fruit,
	    array("upsert" => true)
	);

	//var_dump($fruit);
	//var_dump($c1->findOne(array("name" => "Mangosteen")));
	//header("location: mongodb.php");
}



/*
	DELETE on fruit DB
*/

if(isset($_POST["delete"])) {
	$id = $_POST["delete_this"];
	$id_query = array('_id' => new MongoId($id));

	$c1->remove(array('_id' => new MongoId($id)));
	header("location: mongodb.php");
}

?>
