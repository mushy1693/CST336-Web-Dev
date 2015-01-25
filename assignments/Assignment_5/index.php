<?php
	
	include "../../connection.php";
	
	function get_Product_Name(){
		
		global $dbConn;
		
		$sql = "SELECT product_name FROM apple_product";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute();
		return $stmt -> fetchAll();
		
	}
			
?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>Apple Product</title>
	  <link rel="stylesheet" type="text/css" href="style.css">
	
	</head>

	<body>
		
		<div class = "title">Apple Product Price Check</div>
		
	  <div class = "article">
	  	
	  	Product Name:
		
		<select id = "product_name" name = "product_name">
			
			<?php 
				
				$products = get_Product_Name(); 
				foreach($products as $product){
					echo "<option value = '" . $product["product_name"] . "'>" . $product["product_name"] . "</option>";
				}
					
			?>
			
		</select>
		
		<br><br>
		
		Product Size:
		
		<select id = "size">
			
			<option>Select One</option>
			
		</select>
		
		<br>
		
		<p id = "price">Product price: $0</p>
		
	  </div>
	  
	  <script src = "//code.jquery.com/jquery-1.11.0.min.js"></script>
	  <script src = "product_select.js" ></script>
	  
	</body>

</html>
