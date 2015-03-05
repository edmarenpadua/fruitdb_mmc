<?php
    header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
    header( 'Cache-Control: post-check=0, pre-check=0', false ); 
    header( 'Pragma: no-cache' );
    require_once("lucene.php");
    require_once("algorithm2.php");
?>

<?php
    $row1 = [];
    $row2 = [];
    $search_word = false;
    if(isset($_POST["submit"])) {
        $con = mysqli_connect("localhost", "root", "", "searchengine");
        
        if(mysqli_connect_error()) echo "Connection Fail";
        else {
            $search_word = true;
            $input = $_POST["s_input"];

            // tokenize input
            $tokens = tokenize($input);
           
            //compute weight of every token
            $token_weight = compute_weight($tokens, $con);

            $sql1 = "SELECT *, match(coursedesc) against('". $input ."') as score FROM course where match(coursedesc) against('".$input."') order by score desc";
            $sql2 = "SELECT *, match(coursedesc) against('". $input ."') as score FROM course where match(coursedesc) against('".$input."') order by score desc";

            $result1 = mysqli_query($con, $sql1);          
            $result2 = mysqli_query($con, $sql2);

            $ctr = 0;               
            while($r1 = mysqli_fetch_array($result1)){
                $row1[$ctr]['coursecode'] = $r1['coursecode'];
                $row1[$ctr]['coursename'] = $r1['coursename'];
                $row1[$ctr]['coursedesc'] = $r1['coursedesc'];
                $row1[$ctr]['coursecredit'] = $r1['coursecredit'];
                $row1[$ctr]['score'] = $r1['score'];
                $ctr++;
            }

            /*
                desc score = number of word ocurrences * weight + match_against weight
                                + 2(if exact words occur) 
            */
            $ctr = 0;               
            while($r2 = mysqli_fetch_array($result2)){
                $row2[$ctr]['coursecode'] = $r2['coursecode'];
                $row2[$ctr]['coursename'] = $r2['coursename'];
                $row2[$ctr]['coursedesc'] = highlight_words($r2['coursedesc'], $tokens);
                $row2[$ctr]['coursecredit'] = $r2['coursecredit'];

                $desc = strtolower($row2[$ctr]['coursedesc']);
                $ctr2 = 0;
                $total_weight = 0;
                $flag = 0;
                while ($ctr2 != sizeof($tokens)) {
                    $weight = substr_count($desc, $tokens[$ctr2]) * $token_weight[$tokens[$ctr2]];
                    if ($weight == 0)
                        $flag++;
                    $total_weight += $weight;
                    $ctr2++;
                }

                //occurence of exact word * weight * 2
                $exact_word_weight = substr_count($desc, $input) * $total_weight * 5;

                $total_weight += $flag;
                $row2[$ctr]['score'] = $r2['score'] + $total_weight + $exact_word_weight;
                $ctr++;
            }
            $row2 = orderBy($row2);

        }
        mysqli_close($con); 
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CMSC191: Search Engine</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/freelancer.css" rel="stylesheet">
		<link href="css/design.css" rel="stylesheet">

		<link rel="shortcut icon" type="image/x-icon" href="img/search.png" />
	</head>

	<body id="page-top" class="index">

        <div class="container">
            <div class="row">
                <!-- start of form-->
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="search_form" id="search_form" validate method="post">
                        <br>
                        <div class="row control-group">
                            <div class="form-group col-xs-9 floating-label-form-group controls">
                                <label>Search keyword</label>
                                <input type="text" class="form-control" placeholder="Search keyword" id="obj_function" name="s_input">
                                <p class="help-block text-danger" name="warning"></p>
                            </div>
                            <div class="form-group col-xs-3">
                            	<br>
                                <button type="submit" class="btn btn-info pull-right" id="submit" name="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="row">
	    	<?php
	    		if ($search_word==true)
	    			echo "Showing results for '{$input}'.";
	    	?>
	    	</div>
        </div>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
					<table class="table table-striped table-hover">
						<?php
							$ctr = 0;
							if (count($row1)>0)
								echo "<label><h4>Algorithm 1</h4></label>";
							while ($ctr != count($row1)){
								echo "<tr class = 'active'><td><b>".strtoupper($row1[$ctr]['coursecode'])."</b> - ".$row1[$ctr]['coursename']." (" .$row1[$ctr]['coursecredit'].")</td><td>".round($row1[$ctr]['score'], 3)."</td></tr>";
								echo "<tr class = 'active'><td>"."<b>Description: </b>".($row1[$ctr]['coursedesc']."</td><td></td></tr>"); 
								echo "<tr><td><br></br></td><td></td></tr>";
								$ctr++;
							}
						?>
					</table>
                </div>
                <div class="col-lg-6">
					<table class="table table-striped table-hover">
						<?php
							$ctr = 0;
							if (count($row2)>0)
								echo "<label><h4>Algorithm 2</h4></label>";
							while ($ctr != count($row2)){
								echo "<tr class = 'active'><td><b>".strtoupper($row2[$ctr]['coursecode'])."</b> - ".$row2[$ctr]['coursename']." (" .$row2[$ctr]['coursecredit'].")</td><td>".round($row2[$ctr]['score'], 3)."</td></tr>";
								echo "<tr class = 'active'><td>"."<b>Description: </b>".($row2[$ctr]['coursedesc']."</td><td></td></tr>"); 
								echo "<tr><td><br></br></td><td></td></tr>";
								$ctr++;
							}

						?>
					</table>
                </div>
            </div>
        </div>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Solve Simplex JavaScript -->
    	<script src="js/validation.js"></script>


    <body>
</html>

