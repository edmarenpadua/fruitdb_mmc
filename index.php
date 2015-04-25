<?php
//require_once("mongodb/mongodb_connect.php");

?>


<!DOCTYPE html>
<html lang="en">
	<head>
	<title>CMSC 191</title>
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

			<div class="border row">
				<div class="border col-sm-3" style="background-color:lavender;">
					<p>Modify Data
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
								<div class="form-group">Fruit Name:<input class="form-control" type="text" placeholder="e.g. Mango" /></div>
								<div class="form-group">Fruit Quantity:<input class="form-control" type="text" placeholder="e.g. 5" /></div>
								<div class="form-group">Fruit Distributor:<input class="form-control" type="text" placeholder="e.g. Yeah" /></div>
								<div class="form-group">Fruit Prize:<input class="form-control" type="text" placeholder="e.g. 10.00" /></div>
								
								<br>
								<div style="float:right;"><input type = "submit" name="submit" value="add fruit data"  class="btn btn-default" /></div>
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
