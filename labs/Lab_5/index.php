<?php

$host = "localhost";
$dbname = "lee5043";
$username = "lee5043";
$password = "secret";

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//creates db connection
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//displays connection errors
$sql = "select teamName, stadiumId from nfl_team";
$stmt = $dbConn -> prepare($sql);
$stmt -> execute();
$results = $stmt -> fetchAll();

if (isset($_GET['stadiumId'])) {
	$stadiumId = $_GET['stadiumId'];
	$sql = "select * from nfl_stadium where stadiumId = :stadiumId";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":stadiumId" => $stadiumId));
	$stadiumInfo = $stmt -> fetch();
	//expecting only 1 value
}

function largestCombinedCapacity() {
	global $dbConn, $stmt;
	$sql = "select state, sum(capacity) combinedCapacity from nfl_stadium group by state order by combinedCapacity desc limit 5";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

//nfl teams and their stadiums
function teamsAndStadiums() {
	global $dbConn, $stmt;
	$sql = "select teamName, stadiumName, state 
	from nfl_team t 
	join nfl_stadium s on t.stadiumId = s.stadiumId
	order by teamName";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}
function team_played() {
	global $dbConn, $stmt;
	$sql = "SELECT t1.teamName team1, m.team1_id, t2.teamName team2, m.team2_id
			FROM nfl_match m
			JOIN nfl_team t1 ON t1.teamId = m.team1_id
			JOIN nfl_team t2 ON t2.teamId = m.team2_id
			LIMIT 0 , 30";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}
function team_score() {
	global $dbConn, $stmt;
	$sql = "SELECT t1.teamName team1, m.team1_id, m.team1_score team1scores, t2.teamName team2, m.team2_id, m.team2_score team2scores
			FROM nfl_match m 
			JOIN nfl_team t1 on t1.teamId = m.team1_id 
			JOIN nfl_team t2 on t2.teamId = m.team2_id";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Nelson Lee | Lab 5</title>
    </head>

    <body>
    	<link rel="stylesheet" type="text/css" href="css/style.css">
        <div class = "article">
            <form>
                <h3>NFL Stadiums</h3>
                <select name="stadiumId">
                    Select Team to display Home Stadium:
                    <?php
					foreach ($results as $result)
						echo "<option value='" . $result['stadiumId'] . "'>" . $result['teamName'] . "</option>";
                    ?>
                </select>
                <input type="submit" value="Get Home Stadium">
            </form>
            
            <div class = "stadium_name">
	            <?php
				if (isset($stadiumInfo))
					echo $stadiumInfo['stadiumName'];
	            ?>
            </div>
            
            <div class = "top_5">
	            <br/>
	            <strong>Top 5 states with the largest combined number of seats in NFL stadiums</strong>
	            <br/>
	            <?php
				$records = largestCombinedCapacity();
				foreach ($records as $record)
					echo $record['state'] . " - " . $record['combinedCapacity'] . "<br/>";
	            ?>
     		</div>
     		
     		<div class = "all_team_and_stadium">
	            <br/>
	            <strong>List of all teams and their home stadiums</strong>
	            <br/>
	            <?php 
	            $records = teamsAndStadiums();
				foreach ($records as $record)
					echo $record['teamName'] . " - " . $record['stadiumName'] . " - " . $record['state'] . "<br/>"; 
	            ?>
            </div>
            
            <div class = "all_team_and_stadium">
	            <br/>
	            <strong>List of all teams playing</strong>
	            <br/>
	            <?php 
	            $records = team_played();
				foreach ($records as $record)
					echo $record['team1'] . " - " . $record['team1_id'] . " VS " . $record['team2'] . " - " . $record['team2_id'] . "<br/>"; 
	            ?>
            </div>
            
            <div class = "all_team_and_stadium and score">
	            <br/>
	            <strong>List of all teams and the scores</strong>
	            <br/>
	            <?php 
	            $records = team_score();
				foreach ($records as $record)
					echo $record['team1'] . " - " . $record['team1scores'] . " and " . $record['team2'] ." - " . $record['team2scores'] . "<br/>"; 
	            ?>
            </div>
            
        </div>
    </body>
</html>

