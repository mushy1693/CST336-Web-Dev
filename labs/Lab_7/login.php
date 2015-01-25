<?php
session_start();

if (isset($_POST['loginForm'])) {
	require '../../connection.php';
	$sql = "select * from nfl_admin
	where username = :username
	and password = :password";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":username" => $_POST['username'], ":password" => hash('sha1', $_POST['password'])));
	$record = $stmt -> fetch();

	if (empty($record)) {
		echo "Wrong username/password!";
	} else {
		$_SESSION['username'] = $record['username'];
		$_SESSION['name'] = $record['firstName'] . " ". $record['lastName'];
		header("Location: index.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Nelson Lee | Lab 7</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div class = "article">
            <h2>Admin Login</h2>
            <form method="post">
                Username:
                <input type="text" name="username" style="border-radius:5px"/>
                <br/>
                <br/>
                Password:
                <input type="password" name="password" style="border-radius:5px"/>
                <br/>
                <br>
                <input type="submit" name="loginForm" value="Submit!!!" style="border-radius:5px"/>
            </form>
            (username:ninja1693 pass: secret)
        </div>
    </body>
</html>
