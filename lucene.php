<?php
	//computes frequency of word from document
	function tf($term, $document){
		return substr_count($document, $term);
	}

	//computes frequency of word from all documents
	function idf($numDocs, $docFreq){
		return log($numDocs/($docFreq+1))+1;
	}

	//field-length norm
	function norm($document){
		$numTerms = sizeof(tokenize($document));
        return 1/sqrt($numTerms);
	}

	//computes existence of terms in document
	//greater existence of tokens == higher relevance
	function coord($tokens, $document, $token_weight){
		$numTerms = sizeof($tokens);
		$ctr = 0; 
		$score = 0;
		$term_count = 0;
		while($ctr != $numTerms){
			$score += $token_weight[$tokens[$ctr]] * tf($tokens[$ctr], $document);
			//$term_count += tf($tokens[$ctr], $document);
			$ctr++;
		}

		return $score /$numTerms;
	}

	function queryNorm($idf_array, $tokens){
		$ctr = 0;
		$qn = 0;
		while ($ctr != sizeof($idf_array)) {
			$qn += $idf_array[$tokens[$ctr]]*$idf_array[$tokens[$ctr]];
			$ctr++;
		}

		return 1/sqrt($qn);
	}
?>