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
							</div>
						</div>
			        	<div class="tab-pane fade" id="edit">
			          
			        	</div>

			        	<div class="tab-pane fade" id="delete">

						</div>
			   
					</div>


					<br><br><br><br>
					</p>
				</div>

				<div class="border col-sm-3" style="background-color:lavenderblush;">
					<p>mysqlDB
					<br><br><br><br><br><br><br>
					</p>
				</div>

				<div class="border col-sm-3" style="background-color:lightcyan;">
					<p>mongoDB
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
