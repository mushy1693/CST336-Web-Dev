<?php

	include "../../../connection.php";

	$sql = "SELECT MIN(c.earning) min
			FROM people_info a
			JOIN people_address b ON b.people_info_id = a.people_info_id
			JOIN people_money c ON c.people_info_id = a.people_info_id
			JOIN people_email d ON d.people_info_id = a.people_info_id
			WHERE a.sex = 'male'";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	$records = $stmt -> fetch();
	
	$min_earning_male = array();	
	$min_earning_male['earning'] = $records['min']; 
	echo json_encode($min_earning_male);

?>
