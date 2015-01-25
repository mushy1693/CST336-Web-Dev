<?php

	include "../../connection.php";
	
	if(isset($_GET['product_name'])){
		
		$sql = "SELECT product_size FROM apple_product WHERE product_name = :product_name";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":product_name" => $_GET['product_name']));
		$result = $stmt -> fetchAll();
		
		$product = array();
		
		foreach($result as $size){

			$product['size'] = $size["product_size"];
			
		}
		
		echo json_encode($product);	
		
	}

?>