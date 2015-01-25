 <?php

require '../../connection.php';

    function getStadiumInfo($stadiumId){
    global $dbConn;
    
    $sql = "SELECT *
            FROM nfl_stadium
            WHERE stadiumId = :stadiumId";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute(array(":stadiumId"=>$stadiumId));
    
    return $stmt->fetch();        
    }

   
   if (isset($_POST['save'])){ //checking whether it's coming from form submission
       
       $sql = "UPDATE nfl_stadium
               SET stadiumName = :stadiumName,
                   city = :city,
                   street = :street
                WHERE stadiumId = :stadiumId";
     $stmt = $dbConn -> prepare($sql);
    $stmt -> execute(array(":stadiumName" => $_POST['stadiumName'],
                           ":street" => $_POST['street'],
                           ":city" => $_POST['city'],
                           ":stadiumId" => $_POST['stadiumId']                           
                           ));
    echo "INFORMATION HAS BEEN UPDATED! <br />";    
   
   }//endIf isset

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Nelson Lee | Lab 6</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <div>
   <div class = "title">
   <h3> Updating Stadium Info </h3>
   </div>
   
   <div class = "article">
   <?php
   
     $stadiumInfo = getStadiumInfo($_REQUEST['stadiumId']);
   
     echo $stadiumInfo['stadiumName'] . "<br>";
     echo $stadiumInfo['street'] . "<br>"  ;    
   ?>
   
   <form method="post">
   
   Name:   <input type="text" name="stadiumName" value="<?=$stadiumInfo['stadiumName']?>" /> <br />
   Street: <input type="text" name="street"      value="<?=$stadiumInfo['street']?>" /> <br />
   City:   <input type="text" name="city"      value="<?=$stadiumInfo['city']?>" /> <br />
   <input type="hidden" name="stadiumId" value="<?=$stadiumInfo['stadiumId']?>" /><br /><br />
   <input type="submit" name="save" value="Save!" />
    
       
   </form>
   
   
   <br /><br />
   <a href="index.php"> Go back to list</a>
   </div>
  </div>
</body>
</html>
