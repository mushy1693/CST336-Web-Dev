<?php

	function display_Even_Odd_List($row, $column){
		
		$even_total = 0;
		$odd_total = 0;
		
		for($x = 1 ; $x <= $row ; $x+=1){
				
			echo "<tr>";
			
			for($y = 1 ; $y <= $column ; $y+=1){
				
				$random_number = rand(1,100);
				
				if($random_number % 2 != 0){
				
					echo "<td class = 'odd'>" . $random_number . "</td>";
					$odd_total++;
				
				}else{
					
					echo "<td class = 'even'>" . $random_number . "</td>";
					$even_total++;
					
				}
				
			}
			
			echo "</tr>";
					
		}
		
		$percent = 100 / ($row * $column);
		
		echo "Total # of Even: " . ($even_total * $percent) . "%<br>";
		echo "Total # of Odd: " . ($odd_total * $percent) . "%<br>";
	
	}

?>