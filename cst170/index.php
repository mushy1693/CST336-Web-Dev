<?php

	$total = "";

	//check if the numbers are entered

	if(isset($_GET['num1']) && isset($_GET['num2'])){
		
		//store the 2 numbers
		$n = $_GET['num1'];
		$r = $_GET['num2'];
		
		//store the total
		$total = 1;

		//get the r-permutation with repetition
		for($i = 1 ; $i <= $r ; $i++){
			
			$total *= $n;
			
		}
		
	}

?>

<!DOCTYPE html>

<html lang="en">
	<head>
		
	  <meta charset="utf-8">
	  <title>R-Permutation Solver</title>
	  <meta name="viewport" content="width=device-width; initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <link rel="stylesheet" type="text/css" href="small_style.css" media="screen and (max-width: 480px)">
	  
	</head>
	
	<body>
		
		<h1 class = "title">R-Permutation Solver</h1>
		
		<div class = "article">
	  	
	  		<form method = "get">
	  		
	  			Integer n: <input type = "text" name = "num1">
	  			<br><br>
	  			Integer r: <input type = "text" name = "num2">
	  			<br><br>
	  			<input type = "submit" value = "nPr">
	  			
	  		</form>
	  	
	  		Number of Permutation: <?= $total ?><br><br>
	  		
	  		<hr>
	  		
	  		Program Info:<br> 
	  		<p>2. Given positive integers n and r, find the number of r-permutations when repetition is allowed of a set with n elements.</p>
	
	 	 </div>
	  
	</body>

</html>
