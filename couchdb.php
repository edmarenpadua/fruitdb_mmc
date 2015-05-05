<?php
    require_once("couchdb/couchdb_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fruit_mmc.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/fonts.css" rel="stylesheet" type="text/css">

    <title>CMSC 191 Mysqldb</title>
    <link rel="shortcut icon" href="img/portfolio/couchlogo.png">


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

                <div class="modal-body">
                    <form name="" id="" validate method="post" action="">
                            <div class="form-group">Name:<input class="form-control" type="text" placeholder="e.g. Mango" name="name" required="required"/></div>
                            <div class="form-group">Quantity:<input class="form-control" type="text" placeholder="e.g. 5" name="quantity" required="required"/></div>
                            <div class="form-group">Distributor:<input class="form-control" type="text" placeholder="e.g. Yeah" name="distributor" required="required"/></div>
                            <div class="form-group">Price:<input class="form-control" type="text" placeholder="e.g. 10.00" name="price" required="required"/></div>
                            <br>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

            </div>
        </div>
    </div>

    <div id="delete_fruit" class="modal fade">
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
                    <form name="del_fruit" id="" validate method="POST" action="couchdb.php">
                        <input type="hidden" id= "record_id" name = "record_id" value = "">
                        <input type="submit" id= "delete" name = "delete" class="btn btn-danger" value ="Yes, delete"/>
                    </form>
                </div>

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
                <span>
                    <img id="logo" src="img/portfolio/couchlogo.png" alt="logo" aria-label="Right Align">
                    <a class="navbar-brand"  href="#page-top">CouchDB Fruit MMC</a>
                </span> 
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="mysqldb.php">MySQLDB</a>
                    </li>
                    <li class="page-scroll">
                        <a href="mongodb.php">MongoDB</a>
                    </li>
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
                    <div class="border col-sm-3 text-center" style="background-color:lavender;">
                        <h3>ADD FRUIT</h3>
                        <!-- <hr class="star-primary"> -->
                        <div class="control-group">

                            <form name="" id="" validate method="post" action="">
                            <div class="form-group">Name:<input class="form-control" type="text" placeholder="e.g. Mango" name="name" required="required"/></div>
                            <div class="form-group">Quantity:<input class="form-control" type="text" placeholder="e.g. 5" name="quantity" required="required"/></div>
                            <div class="form-group">Distributor:<input class="form-control" type="text" placeholder="e.g. Yeah" name="distributor" required="required"/></div>
                            <div class="form-group">Price:<input class="form-control" type="text" placeholder="e.g. 10.00" name="price" required="required"/></div>
                            <br>
                            <div style="float:right;"><input type = "submit" name="submit" value="Add fruit data"  class="btn btn-default" /></div>
                            <br>

                        </div>
                    </div>
                    <div class="border col-sm-9 text-center" style="background-color:lavenderblush;">
                        <h3>FRUIT DETAILS</h3>
                        <div class="control-group col-sm-12" style="float:right;">
                        <table class="table table-striped table-hover">
                            <?php
                                $i = 0; $j = 0;
                                $size = count($couchdb);
                                if ($size==0)
                                    echo "<label><h4>Nothing to display</h4></label>";
                                else
                                    echo "<th class = 'text-center'>Name</th><th class = 'text-center'>Quantity</th><th class = 'text-center'>Distributor</th>";
                                    echo "<th class = 'text-center'>Price</th><th class = 'text-center'>Date</th>";
                                    echo "<th class = 'text-center'>Edit</th><th class = 'text-center'>Delete</th>";
                                while ($i != $size){
                                    $fruit = $client->getDoc($couchdb[$i]->id);
                                    echo "<tr class = 'success'>";
                                    echo "<td>".$fruit->name."</td>";
                                    echo "<td>".$fruit->quantity."</td>";
                                    echo "<td>".$fruit->distributor."</td>";

                                    $price_list = $fruit->price_list;
                                    $latest = count($price_list)-1;
                                    echo "<td>".$price_list[$latest]->price."</td>";
                                    echo "<td>".$price_list[$latest]->date."</td>";

/*                                    while($j != count($mongodb[$i]['price_date']) && count($mongodb[$i]['price_date']) > 0){
                                        echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                                     //echo "<td>".$mongodb[$i]['price_date'][$j]['date']."</td>";
                                     //echo "<td>".$mongodb[$i]['price_date'][$j]['price']."</td>";
                                     $j++;
                                    }*/

                                echo "<td><a href='#myModal' class='btn btn-info' data-toggle='modal' aria-label='Left Align'>";
                                    echo "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>";
                                echo "</a></td>";
                                echo "<td><a href='#delete_fruit' class='open-delete_fruit btn btn-danger' data-toggle='modal' aria-label='Left Align' data-id='".$fruit->_id."'>";
                                    echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
                                echo "</a></td>";
                                    //echo "<input type='hidden' name='record_id' class='btn btn-default' value='".$mongodb[$i]['id']."'/>";
                                    //echo "<td><input type='submit' name='edit' value='Edit'  class='btn btn-default' /></td>";
                                    //echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-default' /></td>";
                                    //echo "<td><a class='open-delete_fruit btn btn-danger' data-toggle='modal' href='#delete_fruit' data-id='".$mongodb[$i]['id']."'>Delete</a></td>";
                                   
                                   echo "</tr>";
                                                         
                                    if (count($price_list) > 1){
                                        while($j != count($price_list)){
                                             echo "<tr class = 'active'>";
                                             echo "<td></td><td></td>";
                                             if($j == 0) 
                                                echo "<td>Previous Prices:</td>";
                                             else
                                                echo "<td></td>";
                                                echo "<td>".$price_list[$j]->price."</td>";
                                                echo "<td>".$price_list[$j]->date."</td>";
                                             $j++;
                                             echo "<td></td><td></td>";
                                             echo "</tr>";
                                        }
                                    }
                                    else{
                                         echo "<tr class = 'active'>";
                                         echo "<td></td><td></td><td></td><td>";
                                         echo "</tr>";                                     
                                    }
                                    $i++;
                                    $j = 0;
                                    
                                
                                }
                            ?>


                        </table>
                     
                        </div>
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
    <script src="js/couchdb_js.js"></script>

</body>

</html>
