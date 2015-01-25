<?php
		
		function card_game_generate(){
			
			$hearts = array(1,2,3,4,5,6,7,8,9,10,11,12,13);
			$clubs = array(14,15,16,17,18,19,20,21,22,23,24,25,26);
			$diamonds = array(27,28,29,30,31,32,33,34,35,36,37,38,39);
			$spades = array(40,41,42,43,44,45,46,47,48,49,50,51,52);
			
			$hearts_holder = array();
			$clubs_holder = array();
			$diamonds_holder = array();
			$spades_holder = array();
			
			$cards_removed = array();
			$ace_check = false;
			$player_victory = "";
			$ace_of_heart = rand(1,4);
			
			//---create 4 heart cards
			
			for($x = 0 ; $x < 4 ; $x++){
				
				$random = rand(0,12);
				
				if(count($cards_removed) === 0){
					
					array_push($hearts_holder, $hearts[$random]);
					array_push($cards_removed, $hearts[$random]);
					
				}else{
					
					$check = true;
				
					for($y = 0 ; $y < count($cards_removed) ; $y++){
						
						if($cards_removed[$y] == $hearts[$random]){
							
							$check = false;
							break;
						
						}	
							
					}
					
					if($check){
						
						array_push($hearts_holder, $hearts[$random]);
						array_push($cards_removed, $hearts[$random]);
						
					}else{
						
						$x--;
						
					}
				
				}	
						
			}

			//---create 4 club cards
			
			$cards_removed = array();
			
			for($x = 0 ; $x < 4 ; $x++){
				
				$random = rand(0,12);
				
				if(count($cards_removed) === 0){
					
					array_push($clubs_holder, $clubs[$random]);
					array_push($cards_removed, $clubs[$random]);
					
				}else{
					
					$check = true;
				
					for($y = 0 ; $y < count($cards_removed) ; $y++){
						
						if($cards_removed[$y] == $clubs[$random]){
							
							$check = false;
							break;
						
						}	
							
					}
					
					if($check){
						
						array_push($clubs_holder, $clubs[$random]);
						array_push($cards_removed, $clubs[$random]);
						
					}else{
						
						$x--;
						
					}
				
				}	
						
			}
			
			//create 4 diamond cards

			$cards_removed = array();
			
			for($x = 0 ; $x < 4 ; $x++){
				
				$random = rand(0,12);
				
				if(count($cards_removed) === 0){
					
					array_push($diamonds_holder, $diamonds[$random]);
					array_push($cards_removed, $diamonds[$random]);
					
				}else{
					
					$check = true;
				
					for($y = 0 ; $y < count($cards_removed) ; $y++){
						
						if($cards_removed[$y] == $diamonds[$random]){
							
							$check = false;
							break;
						
						}	
							
					}
					
					if($check){
						
						array_push($diamonds_holder, $diamonds[$random]);
						array_push($cards_removed, $diamonds[$random]);
						
					}else{
						
						$x--;
						
					}
				
				}
							
			}		
			
			//create 4 spade cards
			
			$cards_removed = array();
			
			for($x = 0 ; $x < 4 ; $x++){
				
				$random = rand(0,12);
				
				if(count($cards_removed) === 0){
					
					array_push($spades_holder, $spades[$random]);
					array_push($cards_removed, $spades[$random]);
					
				}else{
					
					$check = true;
				
					for($y = 0 ; $y < count($cards_removed) ; $y++){
						
						if($cards_removed[$y] == $spades[$random]){
							
							$check = false;
							break;
						
						}	
							
					}
					
					if($check){
						
						array_push($spades_holder, $spades[$random]);
						array_push($cards_removed, $spades[$random]);
						
					}else{
						
						$x--;
						
					}
				
				}
							
			}
			
			//combine array togehter and shuffle it
			
			$combination = array_merge($hearts_holder,$clubs_holder,$diamonds_holder,$spades_holder);
			shuffle($combination);
			
			//clear the card holder arrays
			
			$hearts_holder = array();
			$clubs_holder = array();
			$diamonds_holder = array();
			$spades_holder = array();
			
			//merge them back into each section
			
			$hearts_holder = array_merge($hearts_holder, array_slice($combination,0,4));
			$clubs_holder = array_merge($clubs_holder, array_slice($combination,4,4));
			$diamonds_holder = array_merge($diamonds_holder, array_slice($combination,8,4));
			$spades_holder = array_merge($spades_holder, array_slice($combination,12,4));
			
			//checks who won and got a Ace
			
			for($x = 0 ; $x < count($hearts_holder) ; $x++){
				
				if($hearts_holder[$x] == 1){
					
					$ace_check = true;
					$player_victory = "Joe Wins!";
					
				}
				
				if($clubs_holder[$x] == 1){
					
					$ace_check = true;
					$player_victory = "Jessie Wins!";
					
				}
				
				if($diamonds_holder[$x] == 1){
					
					$ace_check = true;
					$player_victory = "Jim Wins!";
					
				}
				
				if($spades_holder[$x] == 1){
					
					$ace_check = true;
					$player_victory = "Jane Wins!";
					
				}
				
			}
			
			//add Ace randomly into the table and declare the winner
			
			if($ace_check == false){
				
				$random = rand(0,3);
				
				if($ace_of_heart == 1){
					
					$hearts_holder[$random] = 1;
					$player_victory = "Joe Wins!";
					
				}
				if($ace_of_heart == 2){
					
					$clubs_holder[$random] = 1;
					$player_victory = "Jessie Wins!";
					
				}
				if($ace_of_heart == 3){
					
					$diamonds_holder[$random] = 1;
					$player_victory = "Jim Wins!";
					
				}
				if($ace_of_heart == 4){
					
					$spades_holder[$random] = 1;
					$player_victory = "Jane Wins!";
					
				}
				
			}
			
//print the cards out on the table
			
			//print Jane hand
			
			echo "<table>";
			echo "<tr>";
			echo "<td>Joe</td>";
			
			foreach($hearts_holder as $heart){
				
				if($heart == 1){
				
					echo "<td><img  class = 'ace_image' src = \"../img/" . $heart . ".png\"</img></td>";
					
				}else{
					
					echo "<td><img src = \"../img/" . $heart . ".png\"</img></td>";
					
				}
				
			}
			
			if($player_victory === "Joe Wins!"){
			
				echo "<td>" . $player_victory . "</td>";
				
			}
			
			echo "</tr>";
			
			//print Jane hand
			
			echo "<tr>";
			echo "<td>Jessie</td>";
			
			foreach($clubs_holder as $club){
				
				if($club == 1){
				
					echo "<td><img class = 'ace_image' src = \"../img/" . $club . ".png\"</img></td>";
					
				}else{
					
					echo "<td><img src = \"../img/" . $club . ".png\"</img></td>";
					
				}
				
			}
			
			if($player_victory === "Jessie Wins!"){
			
				echo "<td>". $player_victory . "</td>";
				
			}
			
			echo "</tr>";
			
			//print Jane hand
			
			echo "<tr>";
			echo "<td>Jim</td>";
			
			foreach($diamonds_holder as $diamond){
				
				if($diamond == 1){
				
					echo "<td><img class = 'ace_image' src = \"../img/" . $diamond . ".png\"</img></td>";
					
				}else{
					
					echo "<td><img src = \"../img/" . $diamond . ".png\"</img></td>";
					
				}
				
			}	
			
			if($player_victory === "Jim Wins!"){
			
				echo "<td>" . $player_victory . "</td>";
				
			}
			
			echo "</tr>";
			
			//print Jane hand
			
			echo "<tr>";	
			echo "<td>Jane</td>";
					
			foreach($spades_holder as $spade){
				
				if($spade == 1){
				
					echo "<td><img class = 'ace_image' src = \"../img/" . $spade . ".png\"</img></td>";
					
				}else{
					
					echo "<td><img src = \"../img/" . $spade . ".png\"</img></td>";
					
				}
				
			}
			
			if($player_victory === "Jane Wins!"){
			
				echo "<td>" . $player_victory . "</td>";
				
			}
			
			echo "</tr>";
			echo "</table>";
			
			
		}
		
?>
	
<!DOCTYPE html>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>program1</title>
	  <link rel="stylesheet" type="text/css" href="../css/program1_style.css">
	  
	</head>
	
	<body>
		
		<div class = "title">
			
			<h2>Ace of Hearts </h2>
			
		</div>
		
		<div class = "article">
		
			<?php
	
				card_game_generate();
			
			?>
			
			<div class = "form">
		
				<form>
					
					<button>Deal Again!</button>
					
				</form>
		
			</div>
		
		</div>
	
	</body>
	
</html>
