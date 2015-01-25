<!DOCTYPE html>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>Nelson Lee | Lab 4</title>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	
	</head>

	<body>
		
	  <div>
	  	
	  	<h1 class = "title">PHP Array Function</h1>
	  	
	  	<table border = "1">
	  		
	  		<tr class = "green">
	  			
	  			<th class = "table_box">Code</th>
	  			<th>Description</th>
	  			<th>Output</th>
	  			
	  		</tr>
	  		
	  		<tr class = "table_row">
	  			
	  			<td class = "table_box">$states = array(10,2,7,3,6,1,2,4);</td>
	  			
	  			<td class = "table_box">Initializes an array with five elements</td>
	  			
	  			<td class = "table_box">
	  				
	  				<?php
	  				
	  					$states = array(10,2,7,3,6,1,2,4);
	  				
	  				?>
	  				
	  			</td>
	  			
	  		</tr>
	  		
	  		<tr class = "table_row">
	  			
	  			<td class = "table_box">echo count($states);</td>
	  			
	  			<td class = "table_box">Returns number of elements in array</td>
	  			
	  			<td class = "table_box">
	  				
	  				<?php
	  				
	  					echo count($states);
	  				
	  				?>
	  				
	  			</td>
	  			
	  		</tr>
	  		
	  		<tr class = "table_row">
	  			
	  			<td class = "table_box">

					foreach($states as $each_state){<br>
	  				
	  					echo $each_state . ", ";<br>
							
					}

				</td>
				
	  			<td class = "table_box">Loops though array and display all values</td>
	  			
	  			<td class = "table_box">
	  				
	  				<?php
	  				
	  					foreach($states as $each_state){
	  				
	  						echo $each_state . ", ";
							
						}
	  				
	  			?>
	  				
	  			</td>
	  			
	  		</tr>
	  		
	  		<tr class = "table_row">
	  			
	  			<td class = "table_box">

					echo is_array($states);

				</td>
				
	  			<td class = "table_box">Returns TRUE if the variable passed is an array</td>
	  			
	  			<td class = "table_box">
	  				
	  				<?php
	  				
	  					echo is_array($states);
	  				
	  				?>
	  				
	  			</td>
	  			
	  		</tr>
	  		
	  		<tr class = "table_row">
	  			
	  			<td class = "table_box">

					rsort($states);<br>
						
					foreach($states as $each_state){<br>
	  				
	  					echo $each_state . ", ";<br>
							
					}

				</td>
				
	  			<td class = "table_box">Reverses the order of the elements</td>
	  			
	  			<td class = "table_box">
	  				
	  				<?php
	  				
	  					rsort($states);
						
						foreach($states as $each_state){
	  				
	  						echo $each_state . ", ";
							
						}
	  				
	  				?>
	  				
	  			</td>
	  			
	  		</tr>
	  		
	  		<tr class = "table_row">
	  			
	  			<td class = "table_box">

					echo array_rand($states);

				</td>
				
	  			<td class = "table_box">Selects a random index from the array</td>
	  			
	  			<td class = "table_box">
	  				
	  				<?php
	  				
	  					echo array_rand($states);
	  				
	  				?>
	  				
	  			</td>
	  			
	  		</tr>
	  		
	  		<tr class = "table_row">
	  			
	  			<td class = "table_box">

					sort($states);<br>
						
					foreach($states as $each_state){<br>
	  				
	  					echo $each_state . ", ";<br>
							
					}

				</td>
				
	  			<td class = "table_box">Orders the elements in the array (from lower to higher)</td>
	  			
	  			<td class = "table_box">
	  				
	  				<?php
	 		
	  					sort($states);
						
						foreach($states as $each_state){
	  				
	  						echo $each_state . ", ";
							
						}
	  				
	  				?>
	  				
	  			</td>
	  			
	  		</tr>
	  		
	  		<tr class = "table_row">
	  			
	  			<td class = "table_box">
	  				
	  				echo array_sum($states);
	  				
				</td class = "table_box">
				
	  			<td class = "table_box">Calculates the sum of values in an array</td>
	  			
	  			<td class = "table_box">
	  				
	  				<?php
	 
	  					echo array_sum($states);
	  				
	  				?>
	  				
	  			</td>
	  			
	  		</tr>
	  		
	  	</table>
		
	  </div>
	  
	</body>

</html>
