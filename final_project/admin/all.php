<?php

	include "../../connection.php";
	
	$sql = "SELECT a.fname , a.lname, a.age, a.sex, b.address, b.city, b.state, b.zip, c.earning, c.saving, c.expense, d.email
			FROM people_info a
			JOIN people_address b ON b.people_info_id = a.people_info_id
			JOIN people_money c ON c.people_info_id = a.people_info_id
			JOIN people_email d ON d.people_info_id = a.people_info_id";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	$records = $stmt -> fetchAll();
	
	$info = array();
	
	$count = 0;
	
	foreach($records as $person){
		
		$info['people'][$count][] = $person['fname'];
		$info['people'][$count][] = $person['lname'];
		$info['people'][$count][] = $person['age'];
		$info['people'][$count][] = $person['sex'];
		$info['people'][$count][] = $person['address'];
		$info['people'][$count][] = $person['city'];
		$info['people'][$count][] = $person['state'];
		$info['people'][$count][] = $person['zip'];
		$info['people'][$count][] = $person['earning'];
		$info['people'][$count][] = $person['saving'];
		$info['people'][$count][] = $person['expense'];
		$info['people'][$count][] = $person['email'];
		
		$count++;
				
	}
	
	echo json_encode($info);

?>