<?php

session_start();

if(!isset($_SESSION['username'])) {
	header("Location:login.php");
}

require '../../connection.php';

function getStadiums() {
	global $dbConn;
	$sql = "select stadiumId, stadiumName
from nfl_stadium
order by stadiumName";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function getTeamNames() {
	global $dbConn;
	$sql = "select teamName, teamId
	from nfl_team
	order by teamName";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

if (isset($_POST['delete'])) {//checks if delete was pushed
	$sql = "delete from nfl_stadium 
	where stadiumId = :stadiumId";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":stadiumId" => $_POST['stadiumId']));
	echo "Stadium exterminated! <br/><br/>";
}

if (isset($_POST['addMatch'])) {//checks if addmatch was clicked
	$sql = "insert into nfl_match
	(team1_id, team2_id, date, team1_score, team2_score, time)
	values(:team1_id, :team2_id, :date, :team1_score, :team2_score, :time)";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":team1_id" => $_POST['team1'], ":team2_id" => $_POST['team2'], ":date" => $_POST['date'], "time" => $_POST['time'], ":team1_score" => $_POST['team1_score'], ":team2_score" => $_POST['team2_score']));
	$matchId = $dbConn -> lastInsertId();
	$sql = "insert into nfl_recap
	(matchId, recap)
	values(:matchId, :recap)";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":matchId" => $matchId, ":recap" => $_POST['recap']));
	//stadium, scores, time

	echo "Record was added!";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Nelson Lee | Lab 7</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <script>
			function confirmDelete(stadiumName) {
				var remove = confirm("Are you sure you want to delete " + stadiumName + "?");
				if (!remove) {
					event.preventDefault(event);
					return true;
				}
			}
			function confirmLogout() {
				var logout = confirm("Are you sure you want to logout?");
				if (!logout) {
					event.preventDefault(event);
					return true;
				}
			}
        </script>

        <style>
			form {
				display: inline;
			}
        </style>
    </head>

    <body>
        <div class = "article">
        	<?php
        	
        		echo "Welcome " . $_SESSION['name'] . "!";
        	
        	?>
        	<form action="logout.php" onsubmit="confirmLogout()">
        		<input type="submit" value="Logout"/>
        	</form>
            <h3>NFL Matches</h3>
            Select Team 1:
            <form method="post">
                <select name="team1" style="border-radius:5px">
                    <?php
					$teamNames = getTeamNames();

					foreach ($teamNames as $team) {
						echo "<option value='" . $team['teamId'] . "'>" . $team['teamName'] . "</option>";
					}
                    ?>
                </select>
                <br/>
                Select Team 2:
                <select name="team2" style="border-radius:5px">
                    <?php
					$teamNames = getTeamNames();

					foreach ($teamNames as $team) {
						echo "<option value='" . $team['teamId'] . "'>" . $team['teamName'] . "</option>";
					}
                    ?>
                </select>
                <br/>
                Select stadium name: 
            	<select name="stadium" style="border-radius:5px">
            		
            		<?php
            		$stadiumList = getStadiums();
                    foreach ($stadiumList as $stadium) {
                    	echo "<option value='" . $stadium['stadiumId'] . "'>" . $stadium['stadiumName'] . "</option>";
                    }
					?>
            	</select>
                <br/>
                Date:
                <input type="date" name="date" placeholder="yyyy-mm-dd" style="border-radius:5px">
                <br/>
                Team 1 score:
                <input type="team1_score" name="team1_score" placeholder="" style="border-radius:5px">
                <br/>
                Team 2 score:
                <input type="team2_score" name="team2_score" placeholder="" style="border-radius:5px">
                <br/>
                Time:
                <input type="time" name="time" placeholder="hh:mm:ss" style="border-radius:5px">
                <br/>
                <textarea name="recap" rows="15" cols="60" placeholder="Match Recap" style="border-radius:5px"></textarea>
                <input type="submit" name="addMatch" style="border-radius:5px">
            </form>

            <h3>NFL Stadiums</h3>
            <?php
            $stadiumList = getStadiums();
            foreach ($stadiumList as $stadium) {
            ?>

            <?=$stadium['stadiumName'] ?>
            <form action="updateStadium.php">
                <input type="hidden" name="stadiumId" value="<?=$stadium['stadiumId'] ?>">
                <input type="submit" name="update" value="Update">
            </form>
            <form method="post" onsubmit="confirmDelete('<?=$stadium['stadiumName'] ?>')">
                <input type="hidden" name="stadiumId" value="<?=$stadium['stadiumId'] ?>">
                <input type="submit" name="delete" value="Delete">
            </form>
            <br/>

            <?
			}
            ?>
        </div>
    </body>
</html>
