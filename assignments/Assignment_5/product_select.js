$("#product_name").change(function(){
	
	$.ajax({
		
		type : "get" , 
		url : "size.php",
		dataType : "json",
		data : {"product_name" : $(this).val()},
		success : function(data, status){		
			$("#size option").remove();
			$("#size").append("<option>" + "Select One" + "</option>");
			$("#size").append("<option>" + data['size'] + "</option>");
			$("#price").html("Product price: $0");
			
		}
		
	});
	
});

$("#size").change(function(){
	
	$.ajax({
		
		type : "get" , 
		url : "price.php",
		dataType : "json",
		data : {"product_name" : $("#product_name").val() , "product_size" : $(this).val()},
		success : function(data, status){		
			
			$("#price").html("Product price: $" + data['price']);
			
		}
		
	});
	
});