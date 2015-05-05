<?php 
    require_once("couchdb_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMSC 191 Couchdb</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fruit_mmc.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/fonts.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index">

    <!-- Modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Fruit Data</h4>
                </div>
                <form name="" id="" validate method="post" action="couchdb.php">
                                    
                     <div class="modal-body">
                        <div class="form-group">Name:<input class="form-control" type="text" placeholder="e.g. Mango" name="name" required="required"/></div>
                        <div class="form-group">Quantity:<input class="form-control" type="text" placeholder="e.g. 5" name="quantity" required="required"/></div>
                        <div class="form-group">Distributor:<input class="form-control" type="text" placeholder="e.g. Yeah" name="distributor" required="required"/></div>
                        <div class="form-group">Price:<input class="form-control" type="text" placeholder="e.g. 10.00" name="price" required="required"/></div>
                        <br>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name = "edit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">CouchDB Fruit MMC</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php">Home</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br>
                </div>
            </div>
            <div class="row row-centered">
                <div class="col-lg-12 text-center">
                    <div class="border col-sm-4 text-center" style="background-color:lavender;">
                        <br>
                        <h3>ADD FRUIT</h3>
                        <!-- <hr class="star-primary"> -->
                        <div class="control-group">
                            <form name="" id="" validate method="post" action="couchdb.php">
                            <div class="form-group">Name:<input class="form-control" type="text" placeholder="e.g. Mango" name="name" required="required"/></div>
                            <div class="form-group">Quantity:<input class="form-control" type="text" placeholder="e.g. 5" name="quantity" required="required"/></div>
                            <div class="form-group">Distributor:<input class="form-control" type="text" placeholder="e.g. Yeah" name="distributor" required="required"/></div>
                            <div class="form-group">Price:<input class="form-control" type="text" placeholder="e.g. 10.00" name="price" required="required"/></div>
                            <br>
                            <div style="float:right;"><input type = "submit" name="add" value="Add fruit data"  class="btn btn-default" /></div>
                        </div>
                    </div>
                    <div class="border col-sm-6 text-center" style="background-color:lavenderblush;">
                        <br>
                        <h3>EDIT OR DELETE FRUIT</h3>
                                                <table class="table table-striped table-hover">
                            <?php
                                //var_dump($row1);
                                //var_dump($row2);

                                
                                $size = count($couchdb);
                                $i = 0;
                                
                                if ($size>0)
                                    echo "<label><h4>CouchDB Result</h4></label>";
                                //Enter codes for the column heading; fruitname, qty, price/current price
                                echo "<tr class = 'active' >";
                                    echo "<th>Fruit Name </th> <th> Quantity </th> <th> Distributor </th> <th> Current Price </th> <th> Date </th><th></th><th></th>";
                                echo "</tr>";

                                
                                while ($i != $size){
                                    $fruit = $client->getDoc($couchdb[$i]->id);
                                    echo "<tr class = 'active' >";
                                    echo "<td><b>".strtoupper($fruit->name)."</b></td>";
                                    echo "<td>".$fruit->quantity."</td>";
                                    echo "<td>".$fruit->distributor."</td>";

                                    $price_list = $fruit->price_list;
                                    $j = count($price_list)-1;
                                    echo "<td>".$price_list[$j]->price."</td>";
                                    echo "<td>".$price_list[$j]->date."</td>";
                                    $j--;
                                        if ($j >= 0){
                                            echo "<td><a> See previous prices</a>";
                                            echo "<table>"; 
                                            echo "<tr><th>Price</th><th>Date</th></tr>";
                                            while ($j >= 0){

                                                echo "<tr>";
                                                echo "<td>".$price_list[$j]->price."</td>";
                                                echo "<td>".$price_list[$j]->date;
                                                echo "<tr>";
                                                
                                                $j--;
                                            }
                                            echo "</table>";
                                        }
                                    echo "</td>";

                                    echo "<td>";         
                                    echo "<form action='' validate method='post'>";
                                       
                                        echo "<div class='control-group' style='float:right;'>";
                                        echo "  <a href='#myModal' class='btn btn-default' data-toggle='modal' aria-label='Left Align'>";
                                        echo "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>";

                                        echo "<button type='button' class='btn btn-default'  data-toggle='modal' data-target='#delete_fruit' aria-label='Left Align' >";
                                        echo "  <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
                                        echo "</button>";
                                        echo "</div>";

                                        echo "</form></tr>";
                                    echo "</td>";
                                    $i++;
                                }
                            ?>      
                        </table>


                        <!-- <hr class="star-primary"> -->
                    </div>
               </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="text-center">
        
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                         Copyright &copy; CMSC 191 Fruit MMC 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/freelancer.js"></script>

</body>

</html>
