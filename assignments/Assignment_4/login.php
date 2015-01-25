<?php

	session_start();
	require '../../connection.php';
	$error ="";
	
	if(isset($_POST['loginForm'])){
		
		$sql ="SELECT * FROM pokemon_login WHERE username = :username AND password = :password";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":username" => $_POST['username'] , ":password" => $_POST['password']));
		$records = $stmt -> fetchAll();
		
		if(empty($records)){
			
			$error = "Wrong password or username";
			
		}else{
			
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			
			date_default_timezone_set('America/Los_Angeles');
			
			$sql = "INSERT INTO pokemon_log (date, time, username)
					VALUES ('" . date('Y-m-d') . "','" . date('H:i:s') . "','" . $_SESSION['username'] . "') ";
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute();
		
			header("Location: index.php");
			
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
		
		<h2>Pokedex App</h2>
		
		<form method="post">
			
			Username:<input type="text" name="username" style="border-radius:5px"/><br/><br/>
			Password:<input type="password" name="password" style="border-radius:5px"/><br/><br>
			<input type="submit" name="loginForm" value="Submit!!!" style="border-radius:5px"/>
			
		</form>
		
		<br>
			<?php if($error != ""){echo $error . "<br>";} ?>
		<br>
		
		(username: ninja1693 pass: secret)<br>
		(username: danlee pass: 1234)<br>
		(username: ben pass: password)
		
	</div>
	
</body>
</html>
