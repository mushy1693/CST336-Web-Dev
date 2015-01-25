<!DOCTYPE html>

<?php

	include "php/Even_Odd_Function.php";

?>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>Nelson Lee | Lab 2</title>
	  
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	  
	</head>
	
	<body>
		
		<div class = "body">
	  	
		  	<div class = "title">
		  	
		  		<h1>Even & Odd Table Generator</h1>
		  	
		  	</div>
		  	
		  	<div class = "data">
		  	
			  	<table border = "1">
			
					<?php
					
						display_Even_Odd_List(10,10);
					
					?>
				
				</table>
			
			</div>
		
		</div>
	  
	</body>
	
</html>
