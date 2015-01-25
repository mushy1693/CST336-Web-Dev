 <?php

require '../../connection.php';

function getStadiums(){
    global $dbConn;
    
    $sql = "SELECT stadiumId, stadiumName
            FROM nfl_stadium
            ORDER BY stadiumName";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}


function getTeamNames(){
    global $dbConn;
    
    $sql = "SELECT teamId, teamName
            FROM nfl_team
            ORDER BY teamName";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

 if (isset($_POST['delete'])) { //checks whether the delete button was clicked

   $sql = "DELETE FROM nfl_stadium
              WHERE stadiumId = :stadiumId";
   $stmt = $dbConn -> prepare($sql);
  // $stmt -> execute( array(":stadiumId"=> $_POST['stadiumId']));
   echo "Stadium Deleted! <br /><br />";      
 }
 
 
 if (isset ($_POST['addMatch'])) { //checks whether the "addMatch" button was clicked
     
     $sql = "INSERT INTO nfl_match
             (team1_id, team2_id, date,time,team1_score,team2_score,stadiumId)
             VALUES
             (:team1_id, :team2_id, :date, :time, :team1_score, :team2_score, :stadiumId)";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ( array (":team1_id" => $_POST['team1'],
                              ":team2_id" => $_POST['team2'],
                              ":date" => $_POST['date'],
							  ":time" => $_POST['time'],
							  ":team1_score" => $_POST['team1_score'],
							  ":team2_score" => $_POST['team2_score'],
							  ":stadiumId" => $_POST['stadiumId']));    
    
	$matchId = $dbConn->lastInsertId();
    $sql = "INSERT INTO nfl_recap
            (matchId, recap)
            VALUES
            (:matchId, :recap)";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ( array (":matchId" => $matchId,
                             ":recap"   => $_POST['recap']));
    
    echo "Record was added!";        
     
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Nelson Lee | Lab 6</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  
  <script>
    
    function confirmDelete(stadiumName) {

      var remove = confirm("Are you sure you want to delete " + stadiumName + "?");

      if (!remove){   // remove == false
          event.preventDefault();
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
  <div>
      <div class = "title">
      <h3> NFL Matches </h3>
      </div>
      
      <div class = "article">
      Select Team 1:
      <form method="post">
          
          <select name="team1">
              
              <?php
                
                $teamNames = getTeamNames();
                                          
              foreach ($teamNames as $team) {
                   echo "<option value='" . $team['teamId'] . "' >" . $team['teamName'] . "</option>";
              } 
              
              ?>
              
          </select>  <br />
          
          Select Team 2:
          <select name="team2">
              <?php
              foreach ($teamNames as $team) {
                   echo "<option value='" . $team['teamId'] . "' >" . $team['teamName'] . "</option>";
              }               
              ?>
          </select> <br />
        
        Date:    <input type="date" name="date"><br /><br />
        
        Time:    <input type="time" name="time"><br /><br />
        
        Team 1 Score:    <input type="number" name="team1_score"><br /><br />
        
        Team 2 Score:    <input type="number" name="team2_score"><br /><br />
        
        <select name="stadiumId">
              
              <?php
                
                $Stadiums = getStadiums();
                                          
              foreach ($Stadiums as $stadium) {
                   echo "<option value='" . $stadium['stadiumId'] . "' >" . $stadium['stadiumName'] . "</option>";
              } 
              
              ?>
              
          </select>  <br />
        
        <textarea name="recap" rows="15" cols="60" placeholder="Enter Match Recap"></textarea><br />
        

          <input type="submit" name="addMatch">
          
      </form>
      

    <h3> NFL Stadiums </h3>
    
    <?php
    
    $stadiumList = getStadiums();
    
    foreach ($stadiumList as $stadium) { ?>
        
        <?=$stadium['stadiumName']?>
        <form action="updateStadium.php">
            <input type="hidden" name="stadiumId" value="<?=$stadium['stadiumId']?>">
            <input type="submit" name="update" value="Update">
        </form>
        <form method="post" onsubmit="confirmDelete('<?=$stadium['stadiumName']?>')" >
            <input type="hidden" name="stadiumId" value="<?=$stadium['stadiumId']?>">            
            <input type="submit" name="delete" value="Delete">
        </form>
        <br />
                
        
   <?        
    } //end foreach
    ?>
    
   </div>

  </div>
</body>
</html>
