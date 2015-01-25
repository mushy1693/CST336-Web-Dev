<?php

	function Sentence_Mixer(){
		
		$Pronoun=array("I","You","He","She","It","We","They");
		$Feelings=array("like","hate","love","want","need","despise","crave","adore","idolize");
		$Things=array("Volvo","BMW","Toyota","cake","sleep","icecream","pizza","chair","eyeglasses","dinner plates","conditioner","computer","gum","strawberry");
		
		$My_Pronoun = "";
		$My_Feelings = "";
		$My_Things = "";
		
		for($a = 0 ; $a < 10 ; $a+=1){
		
			echo "<tr>";
			
			for($x = 0 ; $x < 3 ; $x+=1){
					
				if($x == 0){
						
					$random_number = rand(0,6);
					$My_Pronoun = $Pronoun[$random_number];
						
				}else if($x == 1){
						
					$random_number = rand(0,8);
					$My_Feelings = $Feelings[$random_number];
						
						
				}else if($x == 2){
						
					$random_number = rand(0,13);
					$My_Things = $Things[$random_number];
						
				}
						
			}
			
			echo "<td>" . $My_Pronoun . " ". $My_Feelings . " " . $My_Things . "." . "</td>";
				 
			echo "</tr>";
		
		}
	
	}

?>