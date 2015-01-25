<?php
	
	//include database connection
	include '../connection.php';
		
	//check if first name, last name, and email is set
	if(isset($_GET['email'])){
		
		//grab the user info
		$sql = "SELECT a.fname , a.lname, a.age, a.sex, b.address, b.city, b.state, b.zip, c.earning, c.saving, c.expense, d.email
				FROM people_info a
				JOIN people_address b ON b.people_info_id = a.people_info_id
				JOIN people_money c ON c.people_info_id = a.people_info_id
				JOIN people_email d ON d.people_info_id = a.people_info_id
				WHERE d.email = :email";
				
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":email" => $_GET['email']));
		$records = $stmt -> fetch();
		
		//array to hold the info of the person
			
		$info = array();
	
		if(!empty($records)){
			
			$info["person"][] = $records['fname'];
			$info["person"][] = $records['lname'];
			$info["person"][] = $records['age'];
			$info["person"][] = $records['sex'];
			$info["person"][] = $records['address'];
			$info["person"][] = $records['city'];
			$info["person"][] = $records['state'];
			$info["person"][] = $records['zip'];
			$info["person"][] = $records['earning'];
			$info["person"][] = $records['saving'];
			$info["person"][] = $records['expense'];
			$info["person"][] = $records['email'];
		
			echo json_encode($info);
		
		}else{
					
			$info["person"][] = "";
			echo json_encode($info);
			
		}
	
	}

?>