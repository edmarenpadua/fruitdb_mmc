<?php

	$row1 = [];
    $row2 = [];

    //Change the last parameter to "fruit_db"
    $con = mysqli_connect("localhost", "root", "", "fruit_db");
    
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

			if($searchResult==NULL){

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
		}

		//[== For Data Editing ==]
		if(isset($_POST['edit'])){
			//var_dump($_POST);
			
			$fruitname = $_POST["name"];
			$quantity = $_POST["quantity"];
			$distributor = $_POST["distributor"];
			$price = $_POST["price"];
			$referenceFruit = $_POST["record_id"];
			$date = $_POST["date"];

			$update = "UPDATE `fruit` SET fruitname='$fruitname', qty=$quantity, distributor='$distributor' WHERE `fruitname`='$referenceFruit';";
			$update2 = "UPDATE `fruit_price` SET fruit_id='$fruitname' WHERE `fruit_id`='$referenceFruit';";
			
			$checkDate = "SELECT CURDATE();";

			$retval = mysqli_query( $con, $update );
			if($retval){
				echo "Success update fruit!";
			}
			else echo "Mysql Error";

			$retval = mysqli_query( $con, $update2 );
			if($retval){
				echo "Success update fruit price";
			}
			else echo "Mysql Error";

			$retval2 = mysqli_query( $con, $checkDate );
			if($retval2){
				echo "Success checkDate";
			}
			else echo "Mysql Error";

/*
			if($retval2 != NULL){
	        	$r1 = mysqli_fetch_array($result1);
	        	
	        }*/

			//if('$r1' == '$date'){
				$updatePrice = "UPDATE `fruit_price` SET price=$price WHERE `fruit_id`='$fruitname' AND `date`='$date';";
				$retval2 = mysqli_query( $con, $updatePrice );
				if($retval2){
					echo "Success updatePrice";
				}
				else echo "Mysql Error";
			//}

			/*
			else{
				$insertPrice = "INSERT INTO `fruit_price` (`fruit_id`, `price`) ".
				"VALUES('$fruitName',$price)";
				$retval2 = mysqli_query( $con, $insertPrice );
				if($retval2){
					echo "Success insert Price";
				}
				else echo "Mysql Error";
			}
			*/
		}	

		//[== For Data Deletion ==]
		if(isset($_POST['delete'])){
			//Get the id reference of the fruit
			$fruitname = $_POST['record_id'];

			$delete = "DELETE FROM `fruit` WHERE `fruitname`='$fruitname';";
			$delete2 = "DELETE FROM `fruit_price` WHERE `fruit_id`='$fruitname';";
			
			$retval = mysqli_query( $con, $delete );
			$retval2 = mysqli_query( $con, $delete2 );
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
			    //$sql2 = "SELECT price, date FROM fruit_price WHERE fruit_id='".$row1[$ctr1]['fruitname']."' order by date desc";
			 
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
