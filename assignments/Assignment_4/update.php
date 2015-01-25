<?php

	session_start();
	$error = "";
	require '../../connection.php';
	
	if(!isset($_SESSION['username'])){
	
		header("Location: login.php");
	
	}
	
	if(isset($_POST['password'])){
		
			if($_POST['password'] != ""){
		
			$sql = "UPDATE pokemon_login
					SET password = :password
					WHERE username= '" . $_SESSION['username'] . "'";
		
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":password" => $_POST['password']));
			header("Location: logout.php");
			
			}else{
				
				$error = "Please Enter a password";
				
			}
	
	}
	
?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
		
		<meta charset="utf-8">
		<title>Pokedex App</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		
	</head>

	<body>
		
		<div class = "article">
			
			<h2>Update Password</h2>
			
			<form method="post">
				
				Password:
				<input type="password" name="password" style="border-radius:5px"/><br/><br>
				<input type="submit" name="loginForm" value="Submit!!!" style="border-radius:5px"/>
				
			</form>
			
			<br>
				<?php if($error != ""){echo $error . "<br>";} ?>
			<br>
			
		</div>
		
	</body>

</html>