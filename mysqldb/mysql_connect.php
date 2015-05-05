<?php

	$row1 = [];
    $row2 = [];

    //Change the last parameter to "fruit_db"
    $con = mysqli_connect("localhost", "root", "", "cmsc191");
    
    if(mysqli_connect_error()) echo "Connection Fail";
    else {

    	//[== For Data Insertion ==]
        if (isset($_POST['name'])) {
			$fruitName = strtolower($_POST['name']);
			$price = $_POST['price'];
			$quantity = $_POST['quantity'];
			$distributor = $_POST['distributor'];
			
			$search = "SELECT * FROM fruit WHERE `fruitname`='$fruitName';";
			$searchResult = mysqli_query($con, $search);

			if($searchResult!=NULL){

				echo "<p>Mysql Error</p></b>";
			}
			else{
				
				//Insert price into fruit table
				$sql3 = "INSERT INTO `fruit` (`fruitname`, `qty`, `distributor`) ".
				"VALUES('$fruitName',$quantity,'$distributor')";

				//Insert price into fruit_price table
				$sql4 = "INSERT INTO `fruit_price` (`fruit_id`, `price`) ".
				"VALUES('$fruitName',$price)";

				$retval = mysqli_query( $con, $sql3 );
				$retval2 = mysqli_query( $con, $sql4 );
				
			}
			
/*	//For testing purpose
			if($retval){
				echo "succes";
			}
			else echo "Mysql Error";
			
			if($retval2){
				echo "succes";
			}
			else echo "Mysql Error";
*/
		}


		//[== For Data Editing ==]
		if(isset($_POST['edit'])){
			$fruitname = $_POST["record_id"];

/*
			$fruit = array();
		 	$fruit_price = array();
		 	$fruit['name'] = "Mangosteen";//$_POST['name_edit'];
		 	$fruit['quantity']  = "1000";//$_POST['quantity_edit'];
		 	$fruit['distributor']  = "Summer Love";//$_POST['distributor_edit'];

		 	$c1->remove(array('_id' => new MongoId($id)));
			//add to fruit collection
			$c1->update(
			    array("_id" => new MongoId($id)),
			    $fruit,
			    array("upsert" => true)
			);
*/
			//var_dump($fruit);
			//var_dump($c1->findOne(array("name" => "Mangosteen")));
			//header("location: index.php");
		}	



		//[== For Data Deletion ==]
		if(isset($_POST['delete'])){
			//Get the id reference of the fruit
			$fruitname = $_POST['record_id'];

			$delete = "DELETE FROM `fruit` WHERE `fruitname`='$fruitname';";
			$delete = "DELETE FROM `fruit_price` WHERE `fruit_id`='$fruitname';";
			
			$retval = mysqli_query( $con, $delete );
			$retval2 = mysqli_query( $con, $delete );

/* For testing purpose
			if($retval){
				echo "Success";
			}
			else echo "Mysql Error";
			if($retval){
				echo "Success";
			}
			else echo "Mysql Error";
*/

		}


		//[== For Data Viewing ==]
		$sql1 = "SELECT * from fruit order by fruitname"; 
	    $result1 = mysqli_query($con, $sql1);
	    if($result1 != NULL){
	        $ctr1 = 0;               
	        while($r1 = mysqli_fetch_array($result1)){
	        	$row1[$ctr1]['id'] =  $r1['id'];
	        	$row1[$ctr1]['fruitname'] = $r1['fruitname'];
	            $row1[$ctr1]['qty'] = $r1['qty'];
	            $row1[$ctr1]['distributor'] = $r1['distributor'];

			    $sql2 = "SELECT price, DATE(date) AS datePrice FROM fruit_price WHERE fruit_id='".$row1[$ctr1]['fruitname']."' order by date desc";
			    
			    $result2 = mysqli_query($con, $sql2);
			    
			    $ctr2=0;
			    while($r2 = mysqli_fetch_array($result2)){
			        $row2[$row1[$ctr1]['fruitname']][$ctr2]['price'] = $r2['price'];
			        $row2[$row1[$ctr1]['fruitname']][$ctr2]['date'] = $r2['datePrice'];
			        $ctr2++;
			    }

			    $ctr1++;
   			}
   		}
    }//end else

    mysqli_close($con);
?>
