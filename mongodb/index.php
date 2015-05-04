<?php
require_once("mongodb_connect.php");

?>


<!DOCTYPE html>
<html lang="en">
	<head>
	<title>FruitDB MMC</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/mongodb_js.js"></script>

	</head>
	
	<body>

		<div class="container-fluid">
			<h1>CSMC 191</h1>
			<p>Management and Trends</p>
			<p>MySQL, MongoDB, CouchDB</p>

			<h3>FRUIT DB MMC</h3>

			<div class="border row">
				<div class="border col-sm-3" style="background-color:lavender;">
					<p>ADD FRUIT DATA
						<div class="control-group">
							<form name="" id="" validate method="post" action="">
							<div class="form-group">Name:<input class="form-control" type="text" placeholder="e.g. Mango" name="name" required="required"/></div>
							<div class="form-group">Quantity:<input class="form-control" type="text" placeholder="e.g. 5" name="quantity" required="required"/></div>
							<div class="form-group">Distributor:<input class="form-control" type="text" placeholder="e.g. Yeah" name="distributor" required="required"/></div>
							<div class="form-group">Price:<input class="form-control" type="text" placeholder="e.g. 10.00" name="price" required="required"/></div>
							
							<br>
							<div style="float:right;"><input type = "submit" name="submit" value="Add fruit data"  class="btn btn-default" /></div>
							</form>
						</div>
				</div>

				<div class="border col-sm-9" style="background-color:lightcyan;">
					<h4>mongoDB</h4>
					<table class="table table-striped table-hover">
						<?php
						//var_dump($mongodb);
							$i = 0; $j = 0;
							if (count($mongodb)==0)
								echo "<label><h4>Nothing to display</h4></label>";
							else
								echo "<th>Name</th><th>Quantity</th><th>Distributor</th>";
								echo "<th>Price</th><th>Date</th><th>View Price History</th>";
								echo "<th>Edit</th><th>Delete</th>";
							while ($i != count($mongodb)){
								$name = $mongodb[$i]['name'];
								echo "<tr class = 'active'>";
								echo "<td>".$mongodb[$i]['name']."</td>";
								echo "<td>".$mongodb[$i]['quantity']."</td>";
								echo "<td>".$mongodb[$i]['distributor']."</td>";
								$latest = count($mongodb[$i]['price_date']);
								echo "<td>".$mongodb[$i]['price_date'][$latest-1]['price']."</td>";
								echo "<td>".$mongodb[$i]['price_date'][$latest-1]['date']."</td>";
								echo "<td>".$mongodb[$i]['id']."</td>";

						echo "<form action='' validate method='post'>";
								//echo "<input type='hidden' name='record_id' class='btn btn-default' value='".$mongodb[$i]['id']."'/>";
								echo "<td><input type='submit' name='edit' value='Edit'  class='btn btn-default' /></td>";
								//echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-default' /></td>";
								echo "<td><a class='open-delete_fruit btn btn-danger' data-toggle='modal' href='#delete_fruit' data-id='".$mongodb[$i]['id']."'>Delete</a></td>";
								//var_dump($mongodb[$i]['price_date']);
								// while($j != count($mongodb[$i]['price_date']) && count($mongodb[$i]['price_date']) > 0){
								// 	echo "<td>".$mongodb[$i]['price_date'][$j]['date']."</td>";
								// 	echo "<td>".$mongodb[$i]['price_date'][$j]['price']."</td>";
								// 	$j++;
								// }
								echo "</tr>";
								$i++;
								$j = 0;
						?>

						<!-- DELETE MODAL -->
						<div id="delete_fruit" class="modal fade" tabindex="-1" >
						    <div class="modal-dialog modal-sm">
						        <div class="modal-content">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                <h4 class="modal-title">DELETE FRUIT DATA</h4>
						            </div>
						            <div class="modal-body">
						                <p>Are you sure you want to delete this fruit?</p>
						            </div>
						            <div class="modal-footer">
						                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						                <input type='text' name='record_id' id='record_id' value=''/>
						                <input type='submit' name='delete' value='Delete' class='btn btn-danger' />
						            </div>
						        </div>
						    </div>
						</div>


						<?php
						echo "</form>";
							}
							//var_dump($mongodb);
						?>


					</table>
				</div>



			</div>
			
		</div>

	</body>
</html>
