<?php

	session_start();

	require "../../connection.php";

	function get_teamNames(){
		
		global $dbConn;
		
		$sql = "SELECT teamName,teamId
				FROM nfl_team";
				
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute();
		return $stmt -> fetchAll();
	}
	
	if(isset($_POST["logout"])){
	
		session_destroy();
		header("location: registration.php");
		
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>catalog</title>
  <meta name="description" content="">
  <meta name="author" content="mushy">
  <link rel="stylesheet" type="text/css" href="style.css">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div class = "article">

	<h3>NFL HELMET POSTERS</h3>
	
	<form method = "post">
	
		<button name = "logout">logout</button>
	
	</form>
	
	<?php
	
		$nfl_teams = get_teamNames();
		
		echo "<center><table>";
		
		foreach($nfl_teams as $record){
			
			echo "<tr><td>" . $record['teamName'] . "</td><td><input id = '" . 
			$record['teamId'] . 
			"' type = 'button' name = 'buy' value = 'Buy'></td><td></td></tr>";
			
			
		}
		
		echo "</table></center>";
	
	?>

  </div>
  
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  
  <script>
  	
  	$(document).ready(function(){
  		
  		var $input = $("input");
  	
	  	$input.click(function(){
	  		
	  		$.ajax({
	  			
	  			type : "get",
	  			url : "cart.php",
	  			data : {"itemId" : $(this).attr("id")},
	  			context : this,
	  			success : function(data){
	  				
	  				$(this).parent().next().text("Added");
	  				$(this).parent().prev().css({color:"green"});
	  			}	
	  			
	  		});
	  		
	  	});
  	
  	});
  	
  	<?php
  	
  		if(isset($_SESSION['cart'])){
	
			foreach($_SESSION['cart'] as $item){
				
				echo "$('#" . $item .  "').parent().next().text('Added');";
				echo "$('#" . $item .  "').parent().prev().css({color:'green'});";
				
			}
	
		}
  	
  	?>
  	
  </script>
</body>
</html>
