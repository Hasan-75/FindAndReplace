<?php
	
	$text = "";
	$searchText = "";
	$replaceText = "";

	function findAndReplace(&$finalTxt){
		global $text;
		global $searchText;
		global $replaceText;
		if(isset($_POST["text"]) && isset($_POST["searchText"]) && isset($_POST["replaceText"])){
			 if(empty($_POST["text"]) || empty($_POST["searchText"]) || empty($_POST["replaceText"])){
					 
			 	return '<span style="color:red">Complete all fields <br>';
			}

			$text = $_POST["text"];
			$text = strrev(strrev($text)." ");
			$searchText = $_POST["searchText"];
			$replaceText = $_POST["replaceText"];

			$offset = 0;
			$searchTextLen = strlen($searchText);

			while ($pos = strpos($text, $searchText, $offset)) {
			    $offset = $pos + $searchTextLen;
			    $text = substr_replace($text, $replaceText, $pos, $searchTextLen);
			}
			$finalTxt = trim($text);
			return '<span style="color:forestgreen">Done!</span>';
		}
	}



?>