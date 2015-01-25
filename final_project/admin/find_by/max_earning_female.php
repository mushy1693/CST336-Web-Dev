<?php

	include "../../../connection.php";

	$sql = "SELECT MAX(c.earning) max
			FROM people_info a
			JOIN people_address b ON b.people_info_id = a.people_info_id
			JOIN people_money c ON c.people_info_id = a.people_info_id
			JOIN people_email d ON d.people_info_id = a.people_info_id
			WHERE a.sex = 'female'";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	$records = $stmt -> fetch();
	
	$max_earning_female = array();	
	$max_earning_female['earning'] = $records['max']; 
	echo json_encode($max_earning_female);

?>
