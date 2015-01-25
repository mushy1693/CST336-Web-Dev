<?php

$host = "localhost";
$dbname = "lee5043";
$username = "lee5043";
$password = "******";

try{

	$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

}

catch(exception $e){
	
	echo "Database is down";
	exit();
	
}

?>