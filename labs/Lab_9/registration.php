<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="utf-8">
  <title>registration</title>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  
</head>

<body>
	
  <div class = "article">

	<h2>Registration Form</h2>
	
	<form action = "catalog.php">
		
		First Name:
		<input type = "text" name="firstname"><br><br>
		Last Name:
		<input type = "text" name="lastname"><br><br>
		Email:
		<input type = "text" name="email"><br><br>
		Zip Code:
		<input id = "zip" type = "text" name="zip"><br><br>
		City:
		<span id = "city" ></span>
		Longitude:
		<span id = "longitude" ></span>
		Latitude:
		<span id = "latitude" ></span>
		<br><br>
		State:
		<select id = "state">
			
			<option value = "">Select One</option>
			<option value = "AZ">Arizona</option>
			<option value = "CA">California</option>
			<option value = "IL">Illonois</option>
			<option value = "NY">New York</option>
			<option value = "TX">Texas</option>
		</select>
		
		<br><br>
		
		County:
		<select id = "county">
			
			<option value = "">Select One</option>
			
		</select>
		
		<br><br>
		
		Username:
		<input type = "text" id = "username" name = "username"><span id = "username_check"></span>
		<br>
		Password:
		<input type = "text" id = "password" name = "password">
		<br><br>
		
		<input type="submit" value = "Sign Up!">
		
	</form>

  </div>
  
  <script>
  	
  	$("#zip").change(function(){
  		
  		$.ajax({
  			type: "get",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/zip.php",
            dataType: "json",
            data: { "zip_code": $(this).val() },
            success: function(data,status) {
                 $("#city").html(data['city']);
                 $("#longitude").html(data['longitude']);
                 $("#latitude").html(data['latitude']);
              },
              complete: function(data,status) { //optional, used for debugging purposes
                  //alert(status);
              }
        });

  	});
  	
  	$("#state").change(function(){
  		$.ajax({
  			type: "get",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/countyList.php",
            dataType: "json",
            data: { "state": $(this).val() },
            success: function(data,status) {
                 for (var i=0; i< data['counties'].length; i++){
                     $("#county").append("<option>" + data["counties"][i].county + "</option>" );
                }

              },
              complete: function(data,status) { //optional, used for debugging purposes
                  //alert(status);
              }
        });
  	});
  	
  	$("#username").change(function(){
  		$.ajax({
  			type: "get",
            url: "usernameLookup.php",
            dataType: "json",
            data: { "username": $(this).val() },
            success: function(data,status) {

				if(data['exist'] == "false"){
					
					$("#username_check").html("Available");
					
				}else{
					
					$("#username_check").html("UnAvailable");
					
				}

              },
              complete: function(data,status) { //optional, used for debugging purposes
                  //alert(status);
              }
        });
  	});
  	
  </script>
  
</body>
</html>
