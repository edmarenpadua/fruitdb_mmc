<?php
	function findweight($word){
		# code...
	}

	function tokenize($input){
		$token_array = [];
		$token = strtok($input, " ");

		while ($token !== false){
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

?>
