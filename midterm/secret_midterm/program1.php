<?php

	function generate_random_letter(){
		
		echo "<hr>";
		
		if (isset ($_GET['find_letter']) && isset ($_GET['range']) && isset ($_GET['exclude']) ) {
		
		$find_letter = $_GET['find_letter'];
		$range = $_GET['range'];
		$exclude = $_GET['exclude'];
		
		$letters = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",);
		
		echo "<h1>Find the letter " . $find_letter . "</h1>";
		
		switch($range){
			
			case "36":
				
				echo "<center><table>";
					
				for($x = 0 ; $x < 6 ; $x++){
					
					echo "<tr>";
					
					for($y = 0 ; $y < 6 ; $y++){
						
						$rand = rand(0,25);
						
						switch($letters[$rand]){
							case 'A':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	
							case 'B':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;							
							case 'C':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'D':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'E':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'F':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'G':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	

							case 'H':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'I':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;							
							case 'J':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'K':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'L':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'M':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'N':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'O':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;																	
																																						
							default:
								echo "<td style='color:green'>" . $letters[$rand] . "</td>";
								break;
						}
							
						
					}
					
					echo "</tr>";
					
				}
				
				echo "<table></center>";
				
	    		break;
				
			case "49":
				
				echo "<center><table>";
					
				for($x = 0 ; $x < 7 ; $x++){
					
					echo "<tr>";
					
					for($y = 0 ; $y < 7 ; $y++){
						
						$rand = rand(0,25);
						
						switch($letters[$rand]){
							case 'A':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	
							case 'B':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;							
							case 'C':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'D':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'E':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'F':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'G':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	

							case 'H':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'I':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;							
							case 'J':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'K':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'L':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'M':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'N':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'O':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;																	
																																						
							default:
								echo "<td style='color:green'>" . $letters[$rand] . "</td>";
								break;
						}
						
					}
					
					echo "</tr>";
					
				}
				
				echo "<table></center>";
				
	    		break;
				
			case "64":
				
				echo "<table>";
					
				for($x = 0 ; $x < 8 ; $x++){
					
					echo "<center><tr>";
					
					for($y = 0 ; $y < 8 ; $y++){
						
						$rand = rand(0,25);
						
						switch($letters[$rand]){
							case 'A':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	
							case 'B':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;							
							case 'C':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'D':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'E':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'F':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'G':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	

							case 'H':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'I':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;							
							case 'J':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'K':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'L':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'M':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'N':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'O':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;																	
																																						
							default:
								echo "<td style='color:green'>" . $letters[$rand] . "</td>";
								break;
						}
						
					}
					
					echo "</tr>";
					
				}
				
				echo "<table></center>";
				
	    		break;
				
			case "81":
				
				echo "<center><table>";
					
				for($x = 0 ; $x < 9 ; $x++){
					
					echo "<tr>";
					
					for($y = 0 ; $y < 9 ; $y++){
						
						$rand = rand(0,25);
						
						switch($letters[$rand]){
							case 'A':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	
							case 'B':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;							
							case 'C':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'D':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'E':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'F':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'G':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	

							case 'H':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'I':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;							
							case 'J':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'K':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'L':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'M':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'N':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'O':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;																	
																																						
							default:
								echo "<td style='color:green'>" . $letters[$rand] . "</td>";
								break;
						}
						
					}
					
					echo "</tr>";
					
				}
				
				echo "<table></center>";
				
	    		break;
				
			case "100":
				
				echo "<center><table>";
					
				for($x = 0 ; $x < 10 ; $x++){
					
					echo "<tr>";
					
					for($y = 0 ; $y < 10 ; $y++){
						
						$rand = rand(0,25);
						
						switch($letters[$rand]){
							case 'A':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	
							case 'B':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;							
							case 'C':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'D':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'E':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'F':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'G':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	

							case 'H':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'I':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;							
							case 'J':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'K':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'L':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'M':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'N':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'O':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;																	
																																						
							default:
								echo "<td style='color:green'>" . $letters[$rand] . "</td>";
								break;
						}
						
					}
					
					echo "</tr>";
					
				}
				
				echo "<table></center>";
				
	    		break;
				
			default:
	
				echo "<center><table>";
					
				for($x = 0 ; $x < 10 ; $x++){
					
					echo "<tr>";
					
					for($y = 0 ; $y < 10 ; $y++){
						
						$rand = rand(0,25);
						
						switch($letters[$rand]){
							case 'A':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	
							case 'B':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;							
							case 'C':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'D':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'E':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'F':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;
							case 'G':
								echo "<td style='color:red'>" . $letters[$rand] . "</td>";
								break;	

							case 'H':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'I':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;							
							case 'J':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'K':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'L':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'M':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;
							case 'N':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;	
							case 'O':
								echo "<td style='color:blue'>" . $letters[$rand] . "</td>";
								break;																	
																																						
							default:
								echo "<td style='color:green'>" . $letters[$rand] . "</td>";
								break;
						}
						
					}
					
					echo "</tr>";
					
				}
				
				echo "<table></center>";
				
	    		break;
			
		}
		
		}else{
			
			echo "error";
			
		}
		
	}

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>Program 1</title>
	  <link rel="stylesheet" type="text/css" href="css/program1_style.css">
	
	</head>
	
	<body>
		
		<div class = "article">
			
			<div class = "form">
		
				<form method = "get">
					
					<p>1. Select a letter to find:
				
					<select name = "find_letter">
						
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
						<option value="E">E</option>
						<option value="F">F</option>
						
					</select> 
					
					</p>
					
					<p>2. Select the number of letters to display:</p>
					
					<input type="radio" name="range" value="36">36
					<input type="radio" name="range" value="49">49
					<input type="radio" name="range" value="64">64
					<input type="radio" name="range" value="81">81
					<input type="radio" name="range" value="100">100
					
					<br>
					
					<p>3. Select a letter to exclude:
					
					<select name = "exclude">
						
						<option value="V">V</option>
						<option value="W">W</option>
						<option value="X">X</option>
						<option value="Y">Y</option>
						<option value="Z">Z</option>
						
					</select>
					
					</p>
					
					<input class = "button" type="submit" value="Find Letter!">
					
				</form>
		
			</div>
			
			<?php
			
				generate_random_letter();
			
			?>
		
		</div>
		
	</body>
	
</html>
