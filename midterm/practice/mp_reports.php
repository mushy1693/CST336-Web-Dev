<?php

$host = "localhost";
$dbname = "lee5043";
$username = "lee5043";
$password = "secret";

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//creates db connection
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function town_population() {
	global $dbConn, $stmt;
	$sql = "SELECT town_name, population
			FROM mp_town
			WHERE population > 50000 AND population < 80000";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function town_countyname__order_population() {
	global $dbConn, $stmt;
	$sql = "SELECT y.town_name, x.county_name, y.population 
			FROM mp_county x
			JOIN mp_town y ON x.county_id = y.county_id
			ORDER BY population
			DESC";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function total_population_county() {
	global $dbConn, $stmt;
	$sql = "SELECT x.county_name, SUM(y.population) population
			FROM mp_county x
			JOIN mp_town y ON x.county_id = y.county_id
			GROUP BY x.county_name";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function total_population_state() {
	global $dbConn, $stmt;
	$sql = "SELECT x.state_name, SUM(z.population)population
			FROM mp_state x
			JOIN mp_county y ON x.state_id = y.state_id
			JOIN mp_town z ON y.county_id = z.county_id
			GROUP BY x.state_name";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function three_least_population_town() {
	global $dbConn, $stmt;
	$sql = "SELECT town_name, population
			FROM mp_town
			ORDER BY population
			LIMIT 3";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function no_town() {
	global $dbConn, $stmt;
	$sql = "SELECT x.county_name 
			FROM mp_county x
			LEFT JOIN mp_town y ON x.county_id = y.county_id
			WHERE y.town_name IS NULL";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
		
		<meta charset="utf-8">
		<title>mp_reports</title>
		<link rel="stylesheet" type="text/css" href="../css/mp_reports_style.css">
	
	</head>
	
	<body>
		
		<div class = "article">
			
			<h1>Mp Reports</h1>
		
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong>List all cities/towns that have a population between 50,000 and 80,000</strong>
				<br/>
				
				<?php 
				
					$records = town_population();
					foreach ($records as $record)
					echo "City/Town: " .  $record['town_name'] . " Population: " . $record['population'] . "<br/>"; 
				?>
				
			</div>
			
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong>List all towns along with their county name ordered by population</strong>
				<br/>
				
				<?php 
				
					$records = town_countyname__order_population();
					foreach ($records as $record)
					echo "City/Town: -" .  $record['town_name'] . " County Name: -" . $record['county_name'] . " Population: -" . $record['population'] . "<br/>"; 
				?>
				
			</div>
			
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong>List the total population per county</strong>
				<br/>
				
				<?php 
				
					$records = total_population_county();
					foreach ($records as $record)
					echo "County Name: -" . $record['county_name'] . " Population: -" . $record['population'] . "<br/>"; 
				?>
				
			</div>
			
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong>List the total population per state</strong>
				<br/>
				
				<?php 
				
					$records = total_population_state();
					foreach ($records as $record)
					echo "State Name: -" . $record['state_name'] . " Population: -" . $record['population'] . "<br/>"; 
				?>
				
			</div>
			
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong>List the three least populated towns</strong>
				<br/>
				
				<?php 
				
					$records = three_least_population_town();
					foreach ($records as $record)
					echo "Town Name: -" . $record['town_name'] . " Population: -" . $record['population'] . "<br/>"; 
				?>
				
			</div>
			
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong>List the counties that do not have a town in the "town" table</strong>
				<br/>
				
				<?php 
				
					$records = no_town();
					foreach ($records as $record)
					echo "County Name: -" . $record['county_name'] . "<br/>"; 
				?>
				
			</div>
		
		</div>

	</body>
	
</html>
