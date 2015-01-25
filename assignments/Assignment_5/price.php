<?php

	include "../../connection.php";
	
	if(isset($_GET['product_name']) && isset($_GET['product_size'])){
		
		$sql = "SELECT product_price FROM apple_product WHERE product_name = :product_name AND product_size = :product_size";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":product_name" => $_GET['product_name'] , ":product_size" => $_GET['product_size']));
		$result = $stmt -> fetchAll();
		
		$product = array();
		
		foreach($result as $size){
			
			$product['price'] = $size['product_price'];
			
		}
		
		echo json_encode($product);	
		
	}
	
?>