<?php

	session_start();

	include '../connection.php';
	
	if(isset($_POST['email']) && isset($_POST['password'])){
	
		$sql = "SELECT * FROM people_login WHERE email = :email AND password = :password";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":email" => $_POST['email'], ":password" => hash('sha1', $_POST['password'])));
		$records = $stmt -> fetch();
		
		if(!empty($records)){
			
			if($records['email'] == "admin@live.com" && $records['password'] ==  hash('sha1', $_POST['password'])){
				
				$_SESSION['admin_email'] = $records['email'];
				header("Location: admin.php");
				
			}else{
				
				//header("Location: admin.php");
				
			}
			
		}

	}

?>