<?php
require '../../connection.php';
global $dbConn;
function getStadiumInfo($stadiumId) {
	global $dbConn;
	$sql = "select *
	from nfl_stadium
	where stadiumId = :stadiumId";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":stadiumId" => $stadiumId));
	return $stmt -> fetch();
}

if (isset($_POST['save'])) {
	$sql = "update nfl_stadium
	set stadiumName =:stadiumName,
	city=:city,
	street=:street,
	state=:state,
	zip=:zip,
	phone=:phone,
	capacity=:capacity
	where stadiumId=:stadiumId;";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":stadiumName" => $_POST['stadiumName'], ":street" => $_POST['street'], ":city" => $_POST['city'], ":state" => $_POST['state'], ":zip" => $_POST['zip'], ":phone" => $_POST['phone'], ":capacity" => $_POST['capacity'], ":stadiumId" => $_POST['stadiumId']));
}
	?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>updateStadium</title>
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">

        <body>
            <div class = "article">
                <h3>Updating stadium Info</h3>
                <?php
				$stadiumInfo = getStadiumInfo($_GET['stadiumId']);
                ?>

                <form method="post">
                    Name:
                    <input type="text" name="stadiumName" value="<?=$stadiumInfo['stadiumName'] ?>"/>
                    <br/>
                    Street:
                    <input type="text" name="street" value="<?=$stadiumInfo['street'] ?>"/>
                    <br/>
                    City:
                    <input type="text" name="city" value="<?=$stadiumInfo['city'] ?>"/>
                    <br/>
                    State:
                    <input type="text" name="state" value="<?=$stadiumInfo['state'] ?>"/>
                    <br/>
                    Zip:
                    <input type="text" name="zip" value="<?=$stadiumInfo['zip'] ?>"/>
                    <br/>
                    Phone:
                    <input type="text" name="phone" value="<?=$stadiumInfo['phone'] ?>"/>
                    <br/>
                    Capacity:
                    <input type="text" name="capacity" value="<?=$stadiumInfo['capacity'] ?>"/>
                    <br/>
                    <input type="hidden" name="stadiumId" value="<?=$stadiumInfo['stadiumId'] ?>"/>
                    <br/>
                    <input type="submit" name="save" value="Save"/>
                </form>

                <a href="index.php">Go back to list</a>
            </div>
        </body>
</html>
