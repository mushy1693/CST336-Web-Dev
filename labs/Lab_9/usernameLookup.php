<?php

	include "../../connection.php";
	
	if(isset($_GET['username'])){
		
		$sql = "SELECT username FROM lab9_user WHERE username = :username";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":username" => $_GET['username']));
		$result = $stmt -> fetch();
		
		$output = array();
		
		if(empty($result)){
			
			$output["exist"] = "false";
			
		}else{
			
			$output["exist"] = "true";
			
		}
	
	}
	
	echo json_encode($output);
	
?>