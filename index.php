<?php
require_once("mongodb/mongodb_connect.php");

?>


<!DOCTYPE html>
<html lang="en">
	<head>
	<title>FruitDB MMC</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	</head>
	
	<body>

		<div class="container-fluid">
			<h1>CSMC 191</h1>
			<p>Management and Trends</p>
			<p>MySQL, MongoDB, CouchDB</p>

			<h3>FRUIT DB MMC</h3>

			<div class="border row">
				<div class="border col-sm-3" style="background-color:lavender;">
					<p>Modify Fruit Data
					<br>
					<ul id="myTab" class="nav nav-tabs">
						<li class="active"><a href="#add" data-toggle="tab">Add</a></li>
						<li><a href="#edit" data-toggle="tab">Edit</a></li>
						<li><a href="#delete" data-toggle="tab">Delete</a></li>
					</ul>


 					<div id="myTabContent" class="tab-content">
			        	<div class="tab-pane fade in active" id="add">
			        		<br>
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
			        	<div class="tab-pane fade" id="edit">
			          


							<div class="bs-example">
							    <div class="panel-group" id="accordion">
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Fruit Data 1</a>
							                </h4>
							            </div>
							            <div id="collapseOne" class="panel-collapse collapse in">
							                <div class="panel-body">
							                    <p>form</p>
							                    <div style="float:right;"><input type = "submit" name="submit" value="edit fruit data"  class="btn btn-default" /></div>

							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Fruit Data 2</a>
							                </h4>
							            </div>
							            <div id="collapseTwo" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <p>form</p>
							                    <div style="float:right;"><input type = "submit" name="submit" value="edit fruit data"  class="btn btn-default" /></div>

							                </div>
							            </div>
							        </div>
							        <div class="panel panel-default">
							            <div class="panel-heading">
							                <h4 class="panel-title">
							                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Fruit Data 3</a>
							                </h4>
							            </div>
							            <div id="collapseThree" class="panel-collapse collapse">
							                <div class="panel-body">
							                    <p>form</p>
							                    <div style="float:right;"><input type = "submit" name="submit" value="edit fruit data"  class="btn btn-default" /></div>

							                </div>
							            </div>
							        </div>
							    </div>
							</div>














			        	</div>

			        	<div class="tab-pane fade" id="delete">

						</div>
			   
					</div>


					<br><br><br><br>
					</p>
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
								echo "<tr class = 'active'>";
								echo "<td>".$mongodb[$i]['id']."</td>";
								echo "<td>".$mongodb[$i]['name']."</td>";
								echo "<td>".$mongodb[$i]['quantity']."</td>";
								echo "<td>".$mongodb[$i]['distributor']."</td>";
								$latest = count($mongodb[$i]['price_date']);
								echo "<td>".$mongodb[$i]['price_date'][$latest-1]['price']."</td>";
								echo "<td>".$mongodb[$i]['price_date'][$latest-1]['date']."</td>";
								echo "<td>".$mongodb[$i]['id']."</td>";

						echo "<form action='' validate method='get'>";
								echo "<input type='hidden' name='record_id' class='btn btn-default' value='".$mongodb[$i]['id']."'/>";
								echo "<td><input type='submit' name='edit' value='Edit'  class='btn btn-default' /></td>";
								echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-default' /></td>";
								//var_dump($mongodb[$i]['price_date']);
								// while($j != count($mongodb[$i]['price_date']) && count($mongodb[$i]['price_date']) > 0){
								// 	echo "<td>".$mongodb[$i]['price_date'][$j]['date']."</td>";
								// 	echo "<td>".$mongodb[$i]['price_date'][$j]['price']."</td>";
								// 	$j++;
								// }
								echo "</tr>";
								$i++;
								$j = 0;
							}
							var_dump($mongodb);
						?>
					</form>
					</table>
					<?php
					//var_dump($mongodb);



					?>
				</div>

				<div class="border col-sm-3" style="background-color:lavenderblush;">
					<p>mysqlDB
					<br><br><br><br><br><br><br>
					</p>
				</div>

				<div class="border col-sm-3" style="background-color:pink;">
					<p>couchDB
					<br><br><br><br><br><br><br>
					</p>
				</div>

			</div>
			
		</div>

	</body>
</html>
