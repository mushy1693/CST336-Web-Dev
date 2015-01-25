<?php

	session_start();
	include "../connection.php";
	
	//check if the user is logged in
	if(!isset($_SESSION['admin_email'])){
		
		header("Location: index.html");
		
	}
	
	//check if the user clicked logout
	if(isset($_GET['logout'])){
	
		header("Location: logout.php");
		
	}
	
	//check if new contact is clicked
	if(isset($_POST['new_contact'])){
				
		$sql = "INSERT INTO people_info (fname,lname,age,sex)
				VALUES (:fname,:lname,:age,:sex);";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":fname" => $_POST['fname'],":lname" => $_POST['lname'],":age" => $_POST['age'],":sex" => $_POST['sex']));

		$sql = "SELECT people_info_id FROM people_info
				ORDER BY people_info_id DESC
				LIMIT 1;";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute();
		$records = $stmt -> fetch();
		
		$total_record = $records['people_info_id'];

		$sql = "INSERT INTO people_address (address,city,state,zip,people_info_id)
				VALUES (:address,:city,:state,:zip," . $total_record . ");";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":address" => $_POST['address'],":city" => $_POST['city'],":state" => $_POST['state'],":zip" => $_POST['zip']));
		
		$sql = "INSERT INTO people_money (earning,saving,expense,people_info_id)
				VALUES (:earning,:saving,:expense," . $total_record . ");";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":earning" => $_POST['earning'],":saving" => $_POST['saving'],":expense" => $_POST['expense']));
		
		$sql = "INSERT INTO people_email (email,people_info_id)
				VALUES (:email," . $total_record . ");";
		
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":email" => $_POST['email']));
	
	}
	
	//check if delete contact is clicked
	if(isset($_POST['delete_contact'])){
		
		$sql = "SELECT d.people_info_id, d.email
				FROM people_info a
				JOIN people_address b ON b.people_info_id = a.people_info_id
				JOIN people_money c ON c.people_info_id = a.people_info_id
				JOIN people_email d ON d.people_info_id = a.people_info_id
				WHERE d.email = :email";
				
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute(array(":email" => $_POST['email']));
		$records = $stmt -> fetch();
		
		$sql = "DELETE FROM people_info
				WHERE people_info_id=" . $records['people_info_id'] . ";";
				
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute();
		
		$sql = "DELETE FROM people_email
				WHERE people_info_id=" . $records['people_info_id'] . ";";
				
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute();
		
		$sql = "DELETE FROM people_address
				WHERE people_info_id=" . $records['people_info_id'] . ";";
				
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute();
		
		$sql = "DELETE FROM people_money
				WHERE people_info_id=" . $records['people_info_id'] . ";";
				
		$stmt = $dbConn -> prepare($sql);
		$stmt -> execute();
		
	}
	
	//check if info update contact is clicked
	if(isset($_POST['info_update_contact'])){
			
		if(isset($_POST['email'])){
			
			$sql = "SELECT a.fname , a.lname, a.age, a.sex, b.address, b.city, b.state, b.zip, c.earning, c.saving, c.expense, d.people_info_id, d.email
					FROM people_info a
					JOIN people_address b ON b.people_info_id = a.people_info_id
					JOIN people_money c ON c.people_info_id = a.people_info_id
					JOIN people_email d ON d.people_info_id = a.people_info_id
					WHERE d.email = :email";
					
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":email" => $_POST['email']));
			$records = $stmt -> fetch();
			
						
			$sql = "UPDATE people_info
					SET fname=:fname,lname=:lname,age=:age,sex=:sex
					WHERE people_info_id=" . $records['people_info_id'] . ";";

			//Choose what field to Update

			if($_POST['fname'] != ""){
				
				$fname = $_POST['fname'];
				
			}else{
					
				$fname = $records['fname'];
				
			}
			
			if($_POST['lname'] != ""){
				
				$lname = $_POST['lname'];
				
			}else{
					
				$lname = $records['lname'];
				
			}
			
			if($_POST['age'] != ""){
				
				$age = $_POST['age'];
				
			}else{
					
				$age = $records['age'];
				
			}

			if($_POST['sex'] != ""){
				
				$sex = $_POST['sex'];
				
			}else{
					
				$sex = $records['sex'];
				
			}
					
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":fname" => $fname, ":lname" => $lname, ":age" => $age, ":sex" => $sex));
				
		}
			
	}
	
	//check if address update contact is clicked
	if(isset($_POST['address_update_contact'])){

		if(isset($_POST['email'])){
			
			$sql = "SELECT a.fname , a.lname, a.age, a.sex, b.address, b.city, b.state, b.zip, c.earning, c.saving, c.expense, d.people_info_id, d.email
					FROM people_info a
					JOIN people_address b ON b.people_info_id = a.people_info_id
					JOIN people_money c ON c.people_info_id = a.people_info_id
					JOIN people_email d ON d.people_info_id = a.people_info_id
					WHERE d.email = :email";
					
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":email" => $_POST['email']));
			$records = $stmt -> fetch();
			
						
			$sql = "UPDATE people_address
					SET address=:address,city=:city,state=:state,zip=:zip
					WHERE people_info_id=" . $records['people_info_id'] . ";";

			//Choose what field to Update

			if($_POST['address'] != ""){
				
				$address = $_POST['address'];
				
			}else{
					
				$address = $records['address'];
				
			}
			
			if($_POST['city'] != ""){
				
				$city = $_POST['city'];
				
			}else{
					
				$city = $records['city'];
				
			}
			
			if($_POST['state'] != ""){
				
				$state = $_POST['state'];
				
			}else{
					
				$state = $records['state'];
				
			}

			if($_POST['zip'] != ""){
				
				$zip = $_POST['zip'];
				
			}else{
					
				$zip = $records['zip'];
				
			}
					
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":address" => $address, ":city" => $city, ":state" => $state, ":zip" => $zip));
				
		}	
			
	}
	
	//check if money update contact is clicked
	if(isset($_POST['money_update_contact'])){
		
		if(isset($_POST['email'])){
			
			$sql = "SELECT a.fname , a.lname, a.age, a.sex, b.address, b.city, b.state, b.zip, c.earning, c.saving, c.expense, d.people_info_id, d.email
					FROM people_info a
					JOIN people_address b ON b.people_info_id = a.people_info_id
					JOIN people_money c ON c.people_info_id = a.people_info_id
					JOIN people_email d ON d.people_info_id = a.people_info_id
					WHERE d.email = :email";
					
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":email" => $_POST['email']));
			$records = $stmt -> fetch();
			
						
			$sql = "UPDATE people_money
					SET earning=:earning,saving=:saving,expense=:expense
					WHERE people_info_id=" . $records['people_info_id'] . ";";

			//Choose what field to Update

			if($_POST['earning'] != ""){
				
				$earning = $_POST['earning'];
				
			}else{
					
				$earning = $records['earning'];
				
			}
			
			if($_POST['saving'] != ""){
				
				$saving = $_POST['saving'];
				
			}else{
					
				$saving = $records['saving'];
				
			}
			
			if($_POST['expense'] != ""){
				
				$expense = $_POST['expense'];
				
			}else{
					
				$expense = $records['expense'];
				
			}
					
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":earning" => $earning, ":saving" => $saving, ":expense" => $expense));
				
		}			
			
	}
	
	//check if email update contact is clicked
	if(isset($_POST['email_update_contact'])){
				
		if(isset($_POST['old_email']) && isset($_POST['new_email'])){
			
			$sql = "SELECT a.fname , a.lname, a.age, a.sex, b.address, b.city, b.state, b.zip, c.earning, c.saving, c.expense, d.people_info_id, d.email
					FROM people_info a
					JOIN people_address b ON b.people_info_id = a.people_info_id
					JOIN people_money c ON c.people_info_id = a.people_info_id
					JOIN people_email d ON d.people_info_id = a.people_info_id
					WHERE d.email = :email";
					
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":email" => $_POST['old_email']));
			$records = $stmt -> fetch();
			
						
			$sql = "UPDATE people_email
					SET email=:email
					WHERE people_info_id=" . $records['people_info_id'] . ";";

			//Choose what field to Update
			
			if($_POST['old_email'] != $records['email']){
				
				$email = $records['email'];
				
			}else{
				
				$email = $_POST['new_email'];
				
			}
			
			echo $email;
					
			$stmt = $dbConn -> prepare($sql);
			$stmt -> execute(array(":email" => $email));
				
		}
			
	}

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>Admin</title>
	  <link rel="stylesheet" type="text/css" href="style.css">
	  
	</head>
	
	<body>
		
		<div class = "nav">
		
			<form method = "get">
			
				<button name = "logout">Logout</button>
				
			</form>
			
		</div>
		
		<div class = "article">
	  	
	  		<h1>Admin Panel</h1>
			
			<ul>
				
				<li value="all_info">All Info</li>
				
				<li>
					Find By
					<ul>
						<li value="avg_male">Average Earning of Male</li>
						<li value="avg_female">Average Earning of Female</li>
						<li value="max_male">Max Earning of Male</li>
						<li value="max_female">Max Earning of Female</li>
						<li value="min_male">Min Earning of Male</li>
						<li value="min_female">Min Earning of Female</li>
					</ul>
					
				</li>
				
				<li>
					Edit Info
					<ul>
						<li value="new_contact">New Contact</li>
						<li value="update_contact">Update Contact</li>
						<li value="delete_contact">Delete Contact</li>
					</ul>	
				</li>
				
			</ul>
			
			<div id = "data">
				
				
				
			</div>
	  	
	  	</div>
	  	
	  	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	  	
	  	<script>
	  		
	  		$(document).ready(function(){
	  			
	  			//load up all the data when document is ready
	  			$.ajax({
	  				
	  				type : "get",
	  				url : "admin/all.php",
	  				dataType : "json",
	  				success : function(data){
	  					
	  					var info = "";

	  					info += "<center><table cellpadding='10' class = 'table'>";
	  					
	  					info += "<tr class = 'th'><td></td><td>First Name</td><td>Last Name</td><td>Age</td><td>Sex</td><td>Address</td><td>City</td><td>State</td><td>Zip</td><td>Earning</td><td>Saving</td><td>Expense</td><td>Email</td></tr>";
	  					
	  					for(var i = 0; i < data['people'].length; i++){
	  						
	  						info += "<tr><td>" + (i+1) + "." + "</td>";
	  						
	  						for(var x = 0; x < data['people'][i].length; x++){

	  							info += "<td>" + data['people'][i][x] + "</td>";
	  						
	  						}
	  						
	  						info += "</tr>";
	  					
	  					}
	  					
	  					info += "</table></center>";
	  					
	  					$("#data").html(info);
	  				}
	  				
	  			});
	  			
	  			//load when button all info is clicked
	  			$("li[value='all_info']").click(function(){
	  				
		  			$.ajax({
		  				
		  				type : "get",
		  				url : "admin/all.php",
		  				dataType : "json",
		  				success : function(data){
		  					
		  					var info = "";
	
		  					info += "<center><table cellpadding='10' class = 'table'>";
		  					
		  					info += "<tr class = 'th'><td></td><td>First Name</td><td>Last Name</td><td>Age</td><td>Sex</td><td>Address</td><td>City</td><td>State</td><td>Zip</td><td>Earning</td><td>Saving</td><td>Expense</td><td>Email</td></tr>";
		  					
		  					for(var i = 0; i < data['people'].length; i++){
		  						
		  						info += "<tr><td>" + (i+1) + "." + "</td>";
		  						
		  						for(var x = 0; x < data['people'][i].length; x++){
	
		  							info += "<td>" + data['people'][i][x] + "</td>";
		  						
		  						}
		  						
		  						info += "</tr>";
		  					
		  					}
		  					
		  					info += "</table></center>";
		  					
		  					$("#data").html(info);
		  				}
		  				
		  			});
	  			
	  			});
	  			
	  			//load when average male button is clicked
	  			$("li[value='avg_male']").click(function(){
	  				
	  				$.ajax({
	  					
	  					url : "admin/find_by/average_earning_male.php",
	  					dataType : "json",
	  					success : function(data){
	  						
	  						$("#data").html("");
	  						$("#data").html("<center><table cellpadding='10' class = 'table'><tr><th>Average Earning of Male</th></tr>" + "<tr><td>$" + data['earning'] + "</td></tr></table></center>");
	  						
	  					}
	  					
	  				});
	  				
	  			});
	  			
	  			//load when average female button is clicked
	  			$("li[value='avg_female']").click(function(){
	  				
	  				$.ajax({
	  					
	  					url : "admin/find_by/average_earning_female.php",
	  					dataType : "json",
	  					success : function(data){
	  						
	  						$("#data").html("");
	  						$("#data").html("<center><table cellpadding='10' class = 'table'><tr><th>Average Earning of Female</th></tr>" + "<tr><td>$" + data['earning'] + "</td></tr></table></center>");
	  						
	  					}
	  					
	  				});
	  				
	  			});
	  			
	  			//load when max male button is clicked
	  			$("li[value='max_male']").click(function(){
	  				
	  				$.ajax({
	  					
	  					url : "admin/find_by/max_earning_male.php",
	  					dataType : "json",
	  					success : function(data){
	  						
	  						$("#data").html("");
	  						$("#data").html("<center><table cellpadding='10' class = 'table'><tr><th>Max Earning of Male</th></tr>" + "<tr><td>$" + data['earning'] + "</td></tr></table></center>");
	  						
	  					}
	  					
	  				});
	  				
	  			});
	  			
	  			//load when max female button is clicked
	  			$("li[value='max_female']").click(function(){
	  				
	  				$.ajax({
	  					
	  					url : "admin/find_by/max_earning_female.php",
	  					dataType : "json",
	  					success : function(data){
	  						
	  						$("#data").html("");
	  						$("#data").html("<center><table cellpadding='10' class = 'table'><tr><th>Max Earning of Female</th></tr>" + "<tr><td>$" + data['earning'] + "</td></tr></table></center>");
	  						
	  					}
	  					
	  				});
	  				
	  			});
	  			
	  			//load when min male button is clicked
	  			$("li[value='min_male']").click(function(){
	  				
	  				$.ajax({
	  					
	  					url : "admin/find_by/min_earning_male.php",
	  					dataType : "json",
	  					success : function(data){
	  						
	  						$("#data").html("");
	  						$("#data").html("<center><table cellpadding='10' class = 'table'><tr><th>Min Earning of Male</th></tr>" + "<tr><td>$" + data['earning'] + "</td></tr></table></center>");
	  						
	  					}
	  					
	  				});
	  				
	  			});
	  			
	  			//load when min female button is clicked
	  			$("li[value='min_female']").click(function(){
	  				
	  				$.ajax({
	  					
	  					url : "admin/find_by/min_earning_female.php",
	  					dataType : "json",
	  					success : function(data){
	  						
	  						$("#data").html("");
	  						$("#data").html("<center><table cellpadding='10' class = 'table'><tr><th>Min Earning of Female</th></tr>" + "<tr><td>$" + data['earning'] + "</td></tr></table></center>");
	  						
	  					}
	  					
	  				});
	  				
	  			});
	  			
	  			
	  			//load when button new contact is clicked
	  			$("li[value='new_contact']").click(function(){
	  				
	  				$("#data").html("");
	  				$("#data").html("<h2>New Contact</h2>"
	  				
	  					+ "<form id='new_contact' method='post'><center><table>"
	  					
	  						+"<tr><td>First Name: </td><td><input type='text' name='fname'></td><td></td></tr>"
	  						+"<tr><td>Last Name: </td><td><input type='text' name='lname'></td><td></td></tr>"
	  						+"<tr><td>Age: </td><td><input type='number' name='age'></td><td></td></tr>"
	  						+"<tr><td>Sex: </td><td><input type='text' name='sex'></td><td></td></tr>"
	  						+"<tr><td>Address: </td><td><input type='text' name='address'></td><td></td></tr>"
	  						+"<tr><td>City: </td><td><input type='text' name='city'></td><td></td></tr>"
	  						+"<tr><td>State: </td><td><input type='text' name='state'></td><td></td></tr>"
	  						+"<tr><td>Zip: </td><td><input type='number' name='zip'></td><td></td></tr>"
	  						+"<tr><td>Earning: </td><td><input type='number' name='earning'></td><td></td></tr>"
	  						+"<tr><td>Saving: </td><td><input type='number' name='saving'></td><td></td></tr>"
	  						+"<tr><td>Expense: </td><td><input type='number' name='expense'></td><td></td></tr>"
	  						+"<tr><td>Email: </td><td><input type='email' name='email'></td><td></td></tr>"
	  						+"<tr><td></td><td><input type='submit' name='new_contact' value='Submit'></td><td></td></tr>"
	  					
	  					+"</table></center></form>"
	  				
	  				);
	  				
	  				$("#new_contact input").keyup(function(){
	  					
	  					var input = $(this).val();
	  					
	  					if(input == ""){
	  						
	  						$(this).css({border:'2px solid red'});
	  						
	  					}else{
	  						
	  						$(this).css({border:''});
	  						
	  					}
	  					
	  				});
	  				
	  			});
	  			
	  			//load when button update contact is clicked
	  			$("li[value='update_contact']").click(function(){
	  				
	  				$("#data").html("");
	  				$("#data").html("<h2>Update Contact</h2>"
	  				
	  					+ "<form id='update_contact' method='post'><center><table>"
	  						
	  						+"<tr colspan='2'>Info Change</tr>"
	  						+"<tr><td>Email: </td><td><input type='email' name='email'></td><td></td></tr>"
	  						+"<tr><td></td><td>And</td><td></td></tr>"
	  						+"<tr><td>First Name: </td><td><input type='text' name='fname'></td><td></td></tr>"
	  						+"<tr><td>Last Name: </td><td><input type='text' name='lname'></td><td></td></tr>"
	  						+"<tr><td>Age: </td><td><input type='number' name='age'></td><td></td></tr>"
	  						+"<tr><td>Sex: </td><td><input type='text' name='sex'></td><td></td></tr>"
	  						+"<tr><td></td><td><input type='submit' name='info_update_contact' value='Submit'></td><td></td></tr>"
	  					
	  					+"</table></center></form>"
	  					
	  					+ "<form id='update_contact' method='post'><center><table>"
	  						
	  						+"<tr colspan='2'>Address Change</tr>"
	  						+"<tr><td>Email: </td><td><input type='email' name='email'></td><td></td></tr>"
	  						+"<tr><td></td><td>And</td><td></td></tr>"
	  						+"<tr><td>Address: </td><td><input type='text' name='address'></td><td></td></tr>"
	  						+"<tr><td>City: </td><td><input type='text' name='city'></td><td></td></tr>"
	  						+"<tr><td>State: </td><td><input type='text' name='state'></td><td></td></tr>"
	  						+"<tr><td>Zip: </td><td><input type='number' name='zip'></td><td></td></tr>"
	  						+"<tr><td></td><td><input type='submit' name='address_update_contact' value='Submit'></td><td></td></tr>"
	  					
	  					+"</table></center></form>"
	  				
	  					+ "<form id='update_contact' method='post'><center><table>"
	  				
	  						+"<tr colspan='2'>Money Change</tr>"
	  						+"<tr><td>Email: </td><td><input type='email' name='email'></td><td></td></tr>"
	  						+"<tr><td></td><td>And</td><td></td></tr>"
	  						+"<tr><td>Earning: </td><td><input type='number' name='earning'></td><td></td></tr>"
	  						+"<tr><td>Saving: </td><td><input type='number' name='saving'></td><td></td></tr>"
	  						+"<tr><td>Expense: </td><td><input type='number' name='expense'></td><td></td></tr>"
	  						+"<tr><td></td><td><input type='submit' name='money_update_contact' value='Submit'></td><td></td></tr>"
	  					
	  					+"</table></center></form>"
	  					
	  					+ "<form id='update_contact' method='post'><center><table>"
	  				
	  						+"<tr colspan='2'>Email Change</tr>"
	  						+"<tr><td>Old Email: </td><td><input type='email' name='old_email'></td><td></td></tr>"
	  						+"<tr><td>New Email: </td><td><input type='email' name='new_email'></td><td></td></tr>"
	  						+"<tr><td></td><td><input type='submit' name='email_update_contact' value='Submit'></td><td></td></tr>"
	  					
	  					+"</table></center></form>"
	  				
	  				);
	  				
	  				$("#data form").css({float: "left"});
	  				
	  			});
	  			
	  			//load when button delete contact is clicked
	  			$("li[value='delete_contact']").click(function(){
	  				
	  				$("#data").html("");
	  				$("#data").html("<h2>Delete Contact</h2>"
	  				
	  					+ "<form id='delete_contact' method='post'><center><table>"
	  
	  						+"<tr><td>Email: </td><td><input type='email' name='email'></td><td></td></tr>"
	  						+"<tr><td></td><td><input type='submit' name='delete_contact' value='Submit'></td><td></td></tr>"
	  					
	  					+"</table></center></form>"
	  				
	  				);
	  				
	  				$("#delete_contact input").keyup(function(){
	  					
	  					var input = $(this).val();
	  					
	  					if(input == ""){
	  						
	  						$(this).css({border:'2px solid red'});
	  						
	  					}else{
	  						
	  						$(this).css({border:''});
	  						
	  					}
	  					
	  				});
	  				
	  			});
	  			
	  		});
	  		
	  	</script>
	  
	</body>

</html>
