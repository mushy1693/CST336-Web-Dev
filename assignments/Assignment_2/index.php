<!DOCTYPE html>

<?php

	include "php/Sentence_Mixer.php";

?>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>Sentence Mixer</title>
	  
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	  
	</head>
	
	<body>
		
		<div class = "body">
	  	
		  	<div class = "title">
		  	
		  		<h1>Sentence Mixer</h1>
		  	
		  	</div>
		  	
		  	<div class = "data">
		  	
			  	<table border = "1">
			
					<?php
					
						Sentence_Mixer();
					
					?>
		
				</table>
			
			</div>
		
		</div>
	  
	</body>
	
</html>
