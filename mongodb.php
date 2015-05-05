<?php
    require_once("mongodb/mongodb_connect.php");
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

    <title>CMSC 191 Mongodb</title>
    <link rel="shortcut icon" href="img/portfolio/mongologo.png">


</head>

<body id="page-top" class="index">

    <!-- Modal -->
    <div id="edit_fruit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Fruit Data</h4>
                </div>

                <div class="modal-body">
                    <form name="" id="" validate method="post" action="">
                            <div class="form-group">Name:<input class="form-control" type="text" placeholder="e.g. Mango" name="name" id="name" required="required" value=""/></div>
                            <div class="form-group">Quantity:<input class="form-control" type="text" placeholder="e.g. 5" name="quantity" id="quantity" required="required" value=""/></div>
                            <div class="form-group">Distributor:<input class="form-control" type="text" placeholder="e.g. Yeah" name="distributor" id="distributor" required="required" value=""/></div>
                            <div class="form-group">Price:<input class="form-control" type="text" placeholder="e.g. 10.00" name="price" id="price" required="required" value=""/></div>
                            <br>
                    </form>
                </div>

                <div class="modal-footer">
                    <input type="hidden" id = "edit_this" name= "delete_this" value = "" >
                    <button type="button" class="btn btn-success">Save changes</button>
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
                    <form name="del_fruit" id="del_fruit" validate method="POST" action="">
                        <input type="hidden" id = "delete_this" name= "delete_this" value = "" >
                        <input type="submit" name= "delete" class="btn btn-danger" value ="Yes, delete"/>
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

                <div>
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <img id="logo" src="img/portfolio/mongologo.png" alt="logo">
                        </li>

                    </ul>
                    <a class="navbar-brand" href="#page-top">&nbsp;&nbsp;MongoDB Fruit MMC</a>
                </div> 

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="mysqldb.php">MySQLDB</a>
                    </li>
                    <li class="page-scroll">
                        <a href="couchdb.php">CouchDB</a>
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

                                <fieldset>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <label>Fruit name</label>
                                            <input class="form-control" type="text" placeholder="Fruit name" name="name" required="required"/>
                                        </div>
                                    </div>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <label>Quantity</label>
                                            <input class="form-control" type="text" placeholder="Quantity" name="quantity" required="required"/>
                                        </div>
                                    </div>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <label>Distributor</label>
                                            <input class="form-control" type="text" placeholder="Distributor" name="distributor" required="required"/>
                                        </div>
                                    </div>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <label>Price</label>
                                            <input class="form-control" type="text" placeholder="Price" name="price" required="required"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-11">
                                            <br>
                                            <button type="submit" class="btn btn-success btn-md pull-right" id="submit" name="submit">Submit</button>
                                        </div>
                                    </div>

                                </fieldset>
                            </form>

                        </div>
                    </div>
                    <div class="border col-sm-9 text-center" style="background-color:lavenderblush;">
                        <h3>FRUIT DETAILS</h3>
                        <div class="control-group col-sm-12" style="float:right;">
                        <table class="table table-striped table-hover">
                            <?php
                                $i = 0; $j = 0;
                                if (count($mongodb)==0)
                                    echo "<label><h4>Nothing to display</h4></label>";
                                else
                                    echo "<th class = 'text-center'>Name</th><th class = 'text-center'>Quantity</th><th class = 'text-center'>Distributor</th>";
                                    echo "<th class = 'text-center'>Price</th><th class = 'text-center'>Date</th>";
                                    echo "<th class = 'text-center'>Edit</th><th class = 'text-center'>Delete</th>";
                                while ($i != count($mongodb)){
                                    $name = $mongodb[$i]['name'];
                                    echo "<tr class = 'success'>";
                                    echo "<td>".$mongodb[$i]['name']."</td>";
                                    echo "<td>".$mongodb[$i]['quantity']."</td>";
                                    echo "<td>".$mongodb[$i]['distributor']."</td>";
                                    $latest = count($mongodb[$i]['price_date']);
                                    echo "<td>".$mongodb[$i]['price_date'][$latest-1]['price']."</td>";
                                    echo "<td>".$mongodb[$i]['price_date'][$latest-1]['date']."</td>";

/*                                    while($j != count($mongodb[$i]['price_date']) && count($mongodb[$i]['price_date']) > 0){
                                        echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
                                     //echo "<td>".$mongodb[$i]['price_date'][$j]['date']."</td>";
                                     //echo "<td>".$mongodb[$i]['price_date'][$j]['price']."</td>";
                                     $j++;
                                    }*/

                                echo "<td><a href='#edit_fruit' class='open-edit_fruit btn btn-info' data-toggle='modal' aria-label='Left Align' data-id='".$mongodb[$i]['id']."' data-name='".$mongodb[$i]['name']."' data-quantity='".$mongodb[$i]['quantity']."' data-distributor='".$mongodb[$i]['distributor']."' data-price='".$mongodb[$i]['price_date'][$latest-1]['price']."'>";
                                    echo "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>";
                                echo "</a></td>";
                                echo "<td><a href='#delete_fruit' class='open-delete_fruit btn btn-danger' data-toggle='modal' aria-label='Left Align' data-id='".$mongodb[$i]['id']."'>";
                                    echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
                                echo "</a></td>";
                                    //echo "<input type='hidden' name='record_id' class='btn btn-default' value='".$mongodb[$i]['id']."'/>";
                                    //echo "<td><input type='submit' name='edit' value='Edit'  class='btn btn-default' /></td>";
                                    //echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-default' /></td>";
                                    //echo "<td><a class='open-delete_fruit btn btn-danger' data-toggle='modal' href='#delete_fruit' data-id='".$mongodb[$i]['id']."'>Delete</a></td>";
                                   
                                   echo "</tr>";
                                                         
                                    if (count($mongodb[$i]['price_date']) > 1){
                                        while($j != count($mongodb[$i]['price_date'])){
                                             echo "<tr class = 'active'>";
                                             echo "<td></td><td></td>";
                                             if($j == 0) 
                                                echo "<td>Previous Prices:</td>";
                                             else
                                                echo "<td></td>";
                                             echo "<td>".$mongodb[$i]['price_date'][$j]['price']."</td>";
                                             echo "<td>".$mongodb[$i]['price_date'][$j]['date']."</td>";
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
                                    
                                
                                //var_dump($mongodb);
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
    <script src="js/mongodb_js.js"></script>

</body>

</html>
