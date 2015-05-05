<?php 
    require_once("mysqldb/mysql_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fruit_mmc.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/fonts.css" rel="stylesheet" type="text/css">

    <title>CMSC 191 Mysqldb</title>
    <link rel="shortcut icon" href="img/portfolio/mysqllogo.png">
    <!--Script for delete confirmation-->
    <script type="text/javascript">
        function ConfirmDelete(){
            var d = confirm('Do you really want to delete data?');
            if(d == false){
                return false;
            }
        }
    </script>
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

                <form name="" id="" validate method="post" action="mysqldb.php">
                    <div class="modal-body">
                        <input type='hidden' id='hiddenId' name='record_id' class='btn btn-default'/>
                        <input type='hidden' id='editDate' name='date' class='btn btn-default'/>
                        <div class="form-group">Name:<input class="form-control" id="editId" type="text" placeholder="e.g. Mango" name="name" required="required"/></div>
                        <div class="form-group">Quantity:<input class="form-control" id="editQuantity" type="text" placeholder="e.g. 5" name="quantity" required="required"/></div>
                        <div class="form-group">Distributor:<input class="form-control" id="editDistributor" type="text" placeholder="e.g. Yeah" name="distributor" required="required"/></div>
                        <div class="form-group">Current Price:<input class="form-control" id="editPrice" type="text" placeholder="e.g. 10.00" name="price" required="required"/></div>
                        <br>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" name="edit" value="Save changes" class="btn btn-primary name"/>
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
                <div>
                    <span>
                        <img id="logo" src="img/portfolio/mysqllogo.png" alt="logo">
                    </span>
                    <span>
                        <a class="navbar-brand" href="#page-top">MysqlDB Fruit MMC</a>
                    </span>
                </div> 
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="couchdb.php">CouchDB</a>
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
                        <br>
                        <h3>ADD FRUIT</h3>
                        <!-- <hr class="star-primary"> -->
                        <div class="control-group">
                            <form name="" id="" validate method="post" action="mysqldb.php">
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

                        <br>
                        <h3>FRUIT DETAILS</h3>
                        <div class="control-group col-sm-12" style="float:right;">
                        <table class="table table-striped table-hover col-sm-10">
                            <?php
                                $ctr = 0;
                                if (count($row1)==0)
                                    echo "<label><h4>Nothing to display</h4></label>";
                                else{
                                    echo "<tr>";
                                    echo "<th class = 'text-center'>Name</th><th class = 'text-center'>Quantity</th><th class = 'text-center'>Distributor</th>";
                                    echo "<th class = 'text-center'>Price</th><th class = 'text-center'>Date</th>";
                                    echo "<th class = 'text-center'>Edit</th><th class = 'text-center'>Delete</th>";
                                    echo "</tr>";
                                
                                    while ($ctr != count($row1)){
                                        $ctr2 = 0;
                                        echo "<tr class = 'success' >";
                                        echo "<td><b>".strtoupper($row1[$ctr]['fruitname'])."</b></td>";
                                        echo "<td>".$row1[$ctr]['qty']."</td>";
                                        echo "<td>".$row1[$ctr]['distributor']."</td>";
                                        echo "<td>".$row2[$row1[$ctr]['fruitname']][$ctr2]['price']."</td>";
                                        echo "<td class='col-lg-5'>".$row2[$row1[$ctr]['fruitname']][$ctr2++]['date']."</td>";

                                        //Nested table for prices
                                        echo "<form action='mysqldb.php' validate method='POST' onSubmit='return ConfirmDelete();'>";
                                            // Hidden  for id storage
                                            echo "<input type='hidden' name='record_id' class='btn btn-default' id='".$row1[$ctr]["fruitname"]."' value='".$row1[$ctr]["fruitname"]."'/>";
                                          
                                            //echo "   <input type='submit' class='btn btn-default' value='Edit' aria-label='Left Align'/>";
                                            echo "<td><a class='btn btn-default editClass' data-toggle='modal' aria-label='Left Align'";
                                                echo " data-id='".$row1[$ctr]["fruitname"]."' data-quantity='".$row1[$ctr]["qty"]."' data-distributor='".$row1[$ctr]["distributor"]."' data-cprice='".$row2[$row1[$ctr]["fruitname"]][$ctr2-1]["price"]."' data-cdate='".$row2[$row1[$ctr]["fruitname"]][$ctr2-1]["date"]."'>";
                                            echo "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>";
                                            echo "</a></td>";

                                            echo "<td><button type='submit' name='delete' class='btn btn-default' value='Delete' aria-label='Left Align' id=''/>";
                                            echo "  <span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
                                            echo "</button></td>";
                                        echo "</form>";

                                        echo "</tr>";

                                        if (count($row2)>1){
                                            while ($ctr2 != count($row2[$row1[$ctr]['fruitname']])){
                                                echo "<tr class = 'active'>";
                                                if($ctr2==1)
                                                    echo "<td><b>Previous prices:</b></td>";
                                                else
                                                    echo "<td></td>";
                                                echo "<td></td><td></td>";
                                                echo "<td>".$row2[$row1[$ctr]['fruitname']][$ctr2]['price']."</td>";
                                                echo "<td>".$row2[$row1[$ctr]['fruitname']][$ctr2]['date']."</td>";
                                                echo "<td><p></p></td> <td> </td>";
                                                echo "</tr>";
                                                $ctr2++;
                                            }
                                            
                                        }
                                        $ctr++;
                                    }
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
                         <!-- DELETE MODAL -->
                        <div id="delete_fruit" class="modal fade" tabindex="-1" role="dialog">
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
                                        <form action='mysqldb.php' validate method='post'>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type='submit' name='delete' value='Delete' class='btn btn-danger' />
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


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
    
    <!--Change to <script src="js/mysql.js"></script> -->
    <script src="js/mysql.js"></script>

   

</body>

</html>
