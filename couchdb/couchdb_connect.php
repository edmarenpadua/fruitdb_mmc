<?php
	### ANON DSN
	$couch_dsn = "http://localhost:5984/";
	### AUTHENTICATED DSN
	### $couch_dsn = "http://user:password@localhost:5984/"
	//$couch_db = "fruit_db";
	$couch_db = "fruit_db";


	/**
	* include the library
	*/

	require_once "/lib/couch.php";
	require_once "/lib/couchClient.php";
	require_once "/lib/couchDocument.php";


	/*
	Do stuff here
	*/

	$client = new couchClient($couch_dsn, $couch_db);


	/*function addFruit($var){
		$id;
		//getting database information
		try {
			$info = $client->getDatabaseInfos();
			$id = (($client->getDatabaseInfos()->doc_count)+($client->getDatabaseInfos()->doc_del_count))."";
		} catch (Exception $e) {
			echo "Error:".$e->getMessage()." (errcode=".$e->getCode().")\n";
			exit(1);
		}
		print_r($info);

		$name = "mango";
		$quantity = 5;
		$distributor = "kara";
		$price = 20.5;
		$date = date("m/d/Y");
		$price_list = array(
				array(
					'price' => $price,
					'date' => $date
				)
			);
				
		//create new document
		$fruit = new stdClass();
		$fruit->_id = $id;
		$fruit->name = $name;
		$fruit->quantity = $quantity;
		$fruit->distributor = $distributor;
		$fruit->price_list = $price_list;
		
		try {
			$response = $client->storeDoc($fruit);
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
			exit(1);
		}
		
	}
	*/

	//function updateFruit($var){
		$id = "0";
		//getting database information
		try {
			$info = $client->getDatabaseInfos();
		} catch (Exception $e) {
			echo "Error:".$e->getMessage()." (errcode=".$e->getCode().")\n";
			exit(1);
		}
		print_r($info);

		$name = "mango";
		$quantity = 6;
		$distributor = "gabby";
		$price = 11.5;
		$date = "04/24/2015";
		
		$fruit = $client->getDoc($id);
		
		$price_list = $fruit->price_list;
		$size = count($price_list);
		$index = -1;
		for($i=0; $i<$size; $i++){
			if($price_list[$i]->date == $date){
				$index = $i;
				break;
			}
		}

		if($index >= 0){
			$price_list[$index]->price = $price;

		}
		
		//updating document
		$fruit->name = $name;
		$fruit->quantity = $quantity;
		$fruit->distributor = $distributor;
		$fruit->price_list = $price_list;
		
		try {
		        $response = $client->storeDoc($fruit);
		} catch (Exception $e) {
		        echo "Error: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
		        exit(1);
		}
		
	//}
	/*
	//getting database information
	try {
		$info = $client->getDatabaseInfos();
	} catch (Exception $e) {
		echo "Error:".$e->getMessage()." (errcode=".$e->getCode().")\n";
		exit(1);
	}
	print_r($info);
	*/
	/*
	//retrieving entity information
	try {
		$doc = $client->getDoc('in_the_meantime');
	} catch (Exception $e) {
		if ( $e->code() == 404 ) {
			echo "Document not found\n";
		} else {
			echo "Error: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
		}
		exit(1);
	}
	print_r($doc);
	*/
	/*
	//updating document
	$doc = $client->getDoc('in_the_meantime');
	$doc->genre = 'hip-hop';
	$doc->year = 2008;
	try {
	        $response = $client->storeDoc($doc);
	} catch (Exception $e) {
	        echo "Error: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
	        exit(1);
	}
	*/
	/*
	//create new document
	$song = new stdClass();
	$song->_id = "in_the_meantime";
	$song->title = "In the Meantime";
	$song->album = "Resident Alien";
	$song->artist = "Space Hog";
	$song->genre = "Alternative";
	$song->year = 1995;

	try {
		$response = $client->storeDoc($song);
	} catch (Exception $e) {
		echo "Error: ".$e->getMessage()." (errcode=".$e->getCode().")\n";
		exit(1);
	}
	print_r($response);
	*/
?>