<?php

	session_start();
	
	require '../../connection.php';

	if(isset($_POST['loginForm'])){
		
		$sql = "SELECT *
				FROM lab9_user
				WHERE username = :username
				AND password = :password";
				
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":username" => $_POST['username'] , ":password" => sha1($_POST['password'])));
		$record = $stmt -> fetch();
	
		if(empty($record)){
			
			echo "Wrong password";
			header('Location: login.php');
			
		}else{
		
			$_SESSION['username'] = $record['username'];
			echo "Welcome: " . $_SESSION['username'];
			
		}
	
	}
	
	if(!isset($_SESSION['username'])){
		
		header('Location: login.php');
		
	}

	if(isset($_POST['uploadForm'])){
		
		if(!file_exists($_SESSION['username'])){
			
			mkdir($_SESSION["username"]);	
			
		}

		move_uploaded_file($_FILES['fileName']['tmp_name'], $_SESSION['username'] . "/" . $_FILES['fileName']['name']);
		rename($_SESSION['username'] . "/" . $_FILES['fileName']['name'], $_SESSION['username'] . "/" . "profile.jpg");
	
	}
		
	if(isset($_POST['logout'])){
			
		session_destroy();
		header('Location: login.php');
			
	}

	if(isset($_POST['remove_pic'])){
			
		unlink($_SESSION['username'] . "/" . "profile.jpg");
			
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Nelson Lee | Lab 10</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="description" content="">
  <meta name="author" content="mushy">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div class = "article">
  	
  	<h1>Profile</h1>
  	
  	<?php
  	
  		if(!file_exists($_SESSION['username'] . "/" . "profile.jpg")){
  			
  			echo "<img height='400' width='400' src = 'img/default.png'>";
		
  		}else{
  	
  			echo "<img height='400' width='400' src= " . "'" . $_SESSION['username'] . "/" . "profile.jpg" . "'>";

		}
		
	?>

	<form method = "post" enctype = "multipart/form-data">
		<input type = "file" name = "fileName">
		<input type = "submit" name = "uploadForm" value = "Upload Picture!">
		
	</form>
	<form method = "post">
		<button name = "logout">Logout</button>
		<button name = "remove_pic">Remove Pic</button>
	</form>
  </div>
</body>
</html>
