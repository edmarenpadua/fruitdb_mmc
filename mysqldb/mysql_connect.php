<?php
/*
Do stuff
*/
	$row1 = [];
    $row2 = [];

    //Change the last parameter to "fruit_db"
    $con = mysqli_connect("localhost", "root", "", "fruit_db");
    
    if(mysqli_connect_error()) echo "Connection Fail";
    else {

    	//[== For Data Insertion ==]
        if (isset($_POST['name'])) {
			$fruitName = $_POST['name'];
			$price = $_POST['price'];
			$quantity = $_POST['quantity'];
			$distributor = $_POST['distributor'];
			
			$sql3 = "INSERT INTO `fruit` (`fruitname`, `qty`, `distributor`) ".
			"VALUES('$fruitName',$quantity,'$distributor')";
			$sql4 = "INSERT INTO `fruit_price` (`fruit_id`, `price`) ".
			"VALUES('$fruitName',$price)";
			$retval = mysqli_query( $con, $sql3 );
			if($retval){
				echo "succes";
			}
			else echo "Mysql Error";

			$retval = mysqli_query( $con, $sql4 );
			if($retval){
				echo "succes";
			}
			else echo "Mysql Error";
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
			header("location: index.php");
		}	



		//[== For Data Deletion ==]
		if(isset($_POST['delete'])){
		var_dump($_POST);
/*
			$fruitname = $_POST['record_id'];

			$delete = "DELETE FROM `fruit` WHERE `fruitname`='$fruitname';";

			$retval = mysqli_query( $con, $delete );
			if($retval){
				echo "Success";
			}
			else echo "Mysql Error";

			$delete = "DELETE FROM `fruit_price` WHERE `fruit_id`='$fruitname';";

			$retval = mysqli_query( $con, $delete );
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

			    //$sql2 = "SELECT id,fruit_id,  price, DATE(date) AS date FROM fruit_price WHERE fruit_id='".$row1[$ctr1]['fruitname']."'";
			    $sql2 = "SELECT * FROM fruit_price WHERE fruit_id='".$row1[$ctr1]['fruitname']."' order by date desc";
			    
			    $result2 = mysqli_query($con, $sql2);
			    
			    $ctr2=0;
			    while($r2 = mysqli_fetch_array($result2)){
			        $row2[$row1[$ctr1]['fruitname']][$ctr2]['price'] = $r2['price'];
			        $row2[$row1[$ctr1]['fruitname']][$ctr2]['date'] = $r2['date'];
			        $ctr2++;
			    }

			    $ctr1++;
   			}
   		}



    }
    mysqli_close($con);
?>
