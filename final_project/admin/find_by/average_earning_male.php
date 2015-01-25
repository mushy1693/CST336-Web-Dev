<?php

	include "../../../connection.php";

	$sql = "SELECT AVG(c.earning) average
			FROM people_info a
			JOIN people_address b ON b.people_info_id = a.people_info_id
			JOIN people_money c ON c.people_info_id = a.people_info_id
			JOIN people_email d ON d.people_info_id = a.people_info_id
			WHERE a.sex = 'male'";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	$records = $stmt -> fetch();
	
	$average_earning_male = array();	
	$average_earning_male['earning'] = $records['average']; 
	echo json_encode($average_earning_male);

?>
