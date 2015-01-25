<?php
$host = "localhost";
$dbname = "lee5043";
$username = "lee5043";
$password ="secret";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// displays all database connection errors
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//check if the page just loaded and have all empty data
//it will display picture and opening text
if(!isset($_GET['type1']) && !isset($_GET['data']) && !isset($_GET['asc']) && !isset($_GET['desc']) && !isset($_GET['ma']) && !isset($_GET['mh'])){

	$all_empty = true;

}else{
	
	$all_empty = false;
	
}

//check what is chosen from the type1
if(isset($_GET['type1'])){
	
	if($_GET['type1'] == "None"){
	
		$type_1 = "";
		
	}else{
	
		$type_1 = " WHERE type1 = \"" . $_GET['type1'] . "\"";			
		
	}
	
}else{
	
	$type_1 = "";	
	
}

//check what is chosen from the data
if(isset($_GET['data'])){
	
	$data = $_GET['data'];
	
}else{
	
	$data = "";	
	
}

//check if asc is checked or not 
$isAsc = true;


//order in ASC
if(isset($_GET['asc'])){
	
	$order = " ORDER BY name " . $_GET['asc'];
	$isAsc = false;
	
}else{
	
	$order = "";
	
}

//order in DESC
if($isAsc){
	
	if(isset($_GET['desc'])){
		
		$order = " ORDER BY name " . $_GET['desc'];
		
	}else{
		
		$order = "";
		
	}
}

//default page info
function default_info(){

    global $dbConn;
	
	global $order;
    global $type_1;
	
    $sql = "SELECT y.pokemonId, y.name, y.type1, y.type2, x.hp, x.attack, x.defense, x.specialAttack, x.specialDefense, x.speed, x.totalStats, x.averageStats 
			FROM pokemon_table_2 x
			JOIN pokemon_table_1 y ON x.pokemonId = y.pokemonId" . $type_1 . $order;
			
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
	
}

//grab all the pokemon and thier name
function getName(){
    global $dbConn;
	
	global $order;
	global $type_1;
    
    $sql = "SELECT pokemonId, name FROM pokemon_table_1" . $type_1 . $order;
	
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

//grab all the pokemon and the type
function getName_Type1_Type2(){
    global $dbConn;
	
	global $order;
	global $type_1;
    
    $sql = "SELECT pokemonId, name, type1, type2 FROM pokemon_table_1" . $type_1 . $order;
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    return $stmt->fetchAll();
}

function maxAttack(){
	global $dbConn, $stmt;
	
	$sql = "SELECT pokemon_table_2.attack, pokemon_table_1.name, pokemon_table_2.pokemonId
			FROM pokemon_table_2
			JOIN pokemon_table_1 ON pokemon_table_2.pokemonId = pokemon_table_1.pokemonId
			GROUP BY pokemonId
			ORDER BY max( attack ) DESC
			LIMIT 0 , 10";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchALL();
}

function minHealth(){
	global $dbConn, $stmt;
	
	$sql = "SELECT pokemon_table_2.hp, pokemon_table_1.name, pokemon_table_2.pokemonId
			FROM pokemon_table_2
			JOIN pokemon_table_1 ON pokemon_table_2.pokemonId = pokemon_table_1.pokemonId
			GROUP BY pokemonId
			ORDER BY min( hp ) ASC
			LIMIT 0 , 10";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchALL();
}

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>Team Project</title>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
      <link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
	
	</head>
	
	<body>
    <div id="wrapper">
		
	  <div class = "title">
	  	
	  		<h1>Pokedex</h1>
	  	
	  </div>
      
      
	  
	  <div class = "button">
	  	
	  	<hr>
	  	
	  	<form method = "get">
	  	
		  	<select name = "data" class = "data">
		  		<option value="all_data">All Pokemon Data</option>
		  		<option value="name">All Pokemon Name</option>
		  		<option value="name_type1_type2"> All Pokemon Name, Type1, Type2</option>
		  	</select> 
		  	
		  	<select name = "type1" class = "type1">
		  		<option value="None">Filter by Type</option>
		  		<option value="Grass">Grass</option>
		  		<option value="Fire">Fire</option>
		  		<option value="Electric">Electric</option>
		  		<option value="Normal">Normal</option>
		  		<option value="Psychic">Psychic</option>
		  		<option value="Ground">Ground</option>
		  		<option value="Bug">Bug</option>
		  		<option value="Rock">Rock</option>
		  		<option value="Steel">Steel</option>
		  		<option value="Ice">Ice</option>
		  		<option value="Dragon">Dragon</option>
		  		<option value="Fighting">Fighting</option>
		  		<option value="Dark">Dark</option>
		  		<option value="Ghost">Ghost</option>
		  		<option value="Fairy">Fairy</option>
		  		<option value="Flying">Flying</option>
		  		<option value="Poison">Poison</option>
		  	</select> 
		  	
		  	Sort Results:
		  	<input type="radio" name="asc" value="ASC">Ascending
		  	<input type="radio" name="desc" value="DESC">Desceding 
		  	
		  	<input type = "submit" value = "Show me!">
	  	
	  	</form>
	  	
	  	<hr>
	  	
	  	<form>
    	
    		Display the Top 10 Pokemon with the Highest Attack Points?
    		<input type = "submit" name = "ma" value="Yes">
    		
    	</form>
	  	<br>
	  	<form>
	  		
	  		Display the Top 10 Pokemon with the Lowest Health Points?
	  		<input type = "submit" name = "mh" value="Yes">
	  		
	  	</form>
	  	
	  	<hr>
	  	
	  </div>
	  
	  <div class = "article">
	  	
	  	<?
	  	
    		if(isset($_GET['ma'])){
				
				
				echo "<br><h1 class='phpheader'>Top 10 Pokemon with Highest Attack</h1><br>";
				
	  				
	  			echo "<center><table>";
    			$records = maxAttack();
				
				echo"<tr style='font-weight:bold'>";
					
		  			echo "<td>Pokemon</td>";
					echo "<td>Name</td>";
		  			echo "<td>Attack</td>"; 
						
				echo"</tr>";
				
				foreach ($records as $record){
	  					
	  				echo"<tr>";
						
						echo "<td>" . "<img src='img/" . $record['pokemonId'] . ".png'" . "/></td>";
		  				echo "<td>" . "<a href = 'http://pokemondb.net/pokedex/" . $record['name'] . "' target='_blank'>" . $record['name'] . "</a></td>";
		  				echo "<td>" . $record['attack'] . "</td>"; 
						
					echo"</tr>";
					
				}
				
    		}
    		
    	?>
	  	
	  	<?
	  	
	  		if(isset($_GET['mh'])){
	  			
				echo "<br><h1 class='phpheader'>Top 10 Pokemon with Lowest Health Points</h1><br>";
	  				
	  			echo "<center><table>";
    			$records = minHealth();
				
				echo"<tr style='font-weight:bold'>";
					
		  			echo "<td>Pokemon</td>";
					echo "<td>Name</td>";
		  			echo "<td>HP</td>"; 
						
				echo"</tr>";
				
				foreach ($records as $record){
	  					
	  				echo"<tr>";
						
						echo "<td>" . "<img src='img/" . $record['pokemonId'] . ".png'" . "/></td>";
		  				echo "<td>" . "<a href = 'http://pokemondb.net/pokedex/" . $record['name'] . "' target='_blank'>" . $record['name'] . "</a></td>";
						echo "<td>" . $record['hp'] . "</td>"; 
							
					echo"</tr>";
					
				}
					
				echo "</table></center>";
				
    		}
    		
    	?>
	  	
        	
	  	<?php 
	  		
	  		//no record
	  		
	  		if($all_empty == true){
	  			echo "<img id='pikachu' src='img/pikachu.png'/>";
				echo "<br><h1 class='phpheader'>Choose some options above to display Pokedex data!</h1><br>";
				
			}
			
			//first record
	  		if($data == "all_data"){
	  				
					
				echo "<br><h1 class='phpheader'>List of All Pokemon's Data</h1><br>";
	  				
	  			echo "<center><table>";
	  			$records = default_info();
					
				echo"<tr style='font-weight:bold'>";
					
					echo "<td>Pokemon</td>";
		  			echo "<td>Name</td>";
		  			echo "<td>Type1</td>"; 
		  			echo "<td>Type2</td>";
		  			echo "<td>Hp</td>"; 
		  			echo "<td>Attack</td>"; 
		  			echo "<td>Defense</td>"; 
		  			echo "<td>Special Attack</td>"; 
		  			echo "<td>Special Defense</td>"; 
					echo "<td>Speed</td>";
					echo "<td>Total Stats</td>";
					echo "<td>Average Stats</td>";
						
				echo"</tr>";
					
	  			foreach ($records as $record){
	  					
	  				echo"<tr>";
						
						echo "<td>" . "<img src='img/" . $record['pokemonId'] . ".png'" . "/></td>";
		  				echo "<td>" . "<a href = 'http://pokemondb.net/pokedex/" . $record['name'] . "' target='_blank'>" . $record['name'] . "</a></td>";
		  				echo "<td>" . "<img src='img/" . $record['type1'] . ".png'" . "/></td>";
						if($record['type2'] != ""){
							echo "<td>" . "<img src='img/" . $record['type2'] . ".png'" . "/></td>";
						}else{
							echo "<td></td>";
						}
						echo "<td>" . $record['hp'] . "</td>"; 
		  				echo "<td>" . $record['attack'] . "</td>"; 
		  				echo "<td>" . $record['defense'] . "</td>"; 
		  				echo "<td>" . $record['specialAttack'] . "</td>"; 
		  				echo "<td>" . $record['specialDefense'] . "</td>"; 
						echo "<td>" . $record['speed'] . "</td>";
						echo "<td>" . $record['totalStats'] . "</td>";
						echo "<td>" . $record['averageStats'] . "</td>";
							
					echo"</tr>";
					
				}
					
				echo "</table></center>";
					
			}
	  		
			//second record
	  		if($data == "name"){
	  				
				echo "<br><h1 class='phpheader'>List of All Pokemon's Name</h1><br>";
	  				
	  			echo "<center><table>";
	  			$records = getName();
					
				echo"<tr style='font-weight:bold'>";
					
					echo "<td>Pokemon</td>";
		  			echo "<td>name</td>";
						
				echo"</tr>";
					
	  			foreach ($records as $record){
	  					
	  				echo"<tr>";
	  				
						echo "<td>" . "<img src='img/" . $record['pokemonId'] . ".png'" . "/></td>";
	  					echo "<td>" . "<a href = 'http://pokemondb.net/pokedex/" . $record['name'] . "' target='_blank'>" . $record['name'] . "</a></td>"; 
					
	  				echo"</tr>";
						
				}
					
				echo "</center></table>";
					
			}
					
			//third record
	  		if($data == "name_type1_type2"){
	  				
				echo "<br><h1 class='phpheader'>List of All Pokemon with Their Types</h1><br>";
	  				
	  			echo "<center><table>";
	  			$records = getName_Type1_Type2();
					
				echo"<tr style='font-weight:bold'>";
					
		  			echo "<td>Pokemon</td>";
					echo "<td>name</td>";
		  			echo "<td>type1</td>"; 
		  			echo "<td>type2</td>";
						
				echo"</tr>";
					
	  			foreach ($records as $record){
	  					
	  				echo"<tr>";
						
						echo "<td>" . "<img src='img/" . $record['pokemonId'] . ".png'" . "/></td>";
	  					echo "<td>" . "<a href = 'http://pokemondb.net/pokedex/" . $record['name'] . "' target='_blank'>" . $record['name'] . "</a></td>"; 
	  					echo "<td>" . "<img src='img/" . $record['type1'] . ".png'" . "/></td>";
		  				if($record['type2'] != ""){
							echo "<td>" . "<img src='img/" . $record['type2'] . ".png'" . "/></td>";
						}else{
							echo "<td></td>";
						}
					
					echo"</tr>";
						
	  			}
					
				echo "</center></table>";
					
			}
				
	  	?>
	  	
	  </div>
	
    </div> 
	</body>

</html>
