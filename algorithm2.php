<?php
	function compute_weight($tokens, $con){
        $token_weight = [];
        $ctr = 0;
        while ($ctr != sizeof($tokens)) {
            $sql = "SELECT weight from scorealgo where word like '".$tokens[$ctr]."'";
            $result = mysqli_fetch_array(mysqli_query($con, $sql));  
            $token_weight[$tokens[$ctr]] = $result[0];
            $ctr++;
        }
        return $token_weight;
	}

	function tokenize($input){
		$token_array = [];
		$token = strtok($input, " ");

		while ($token != false){
			if(strlen($token)>=3)
				array_push($token_array, $token);
			$token = strtok(" ");
		} 

		return $token_array;
	}

	function orderBy($data){
		$code = "return strnatcmp(\$a['score'], \$b['score']);";
		usort($data, create_function('$b, $a', $code));
		return $data;
	}

	function highlight_words($var, $tokens){
		$ctr = 0;

		while($ctr != sizeof($tokens)){
			$var = preg_replace("/\s".$tokens[$ctr]."/i", "<b> ".$tokens[$ctr]." </b>", $var);
		 	$ctr++;
		}
		return $var;
	}

?>
