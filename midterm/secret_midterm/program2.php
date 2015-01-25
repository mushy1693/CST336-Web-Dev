<?php

$host = "localhost";
$dbname = "lee5043";
$username = "lee5043";
$password = "secret";

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//creates db connection
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function all_female_student() {
	global $dbConn, $stmt;
	$sql = "SELECT firstName, lastName
			FROM m_students
			WHERE gender = 'F'
			ORDER BY lastName";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function student_assignment_grade() {
	global $dbConn, $stmt;
	$sql = "SELECT x.firstName,x.lastName,y.grade
			FROM m_students x
			JOIN m_gradebook y ON x.studentId = y.studentId
			WHERE y.grade < 50
			ORDER BY y.grade";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function assignment_not_graded() {
	global $dbConn, $stmt;
	$sql = "SELECT title, dueDate
			FROM m_assignments x
			LEFT JOIN m_gradebook y ON x.assignmentId = y.assignmentId
			WHERE y.assignmentId IS NULL";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function gradebook() {
	global $dbConn, $stmt;
	$sql = "SELECT x.firstName, x.lastName, z.title, y.grade
			FROM m_students x
			JOIN m_gradebook y ON x.studentId = y.studentId
			JOIN m_assignments z ON y.assignmentId = z.assignmentId
			ORDER BY x.lastName";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

function average() {
	global $dbConn, $stmt;
	$sql = "SELECT x.studentId, x.firstName, x.lastName, AVG(y.grade) average
			FROM m_students x
			JOIN m_gradebook y ON x.studentId = y.studentId
			GROUP BY x.studentId
			ORDER BY average DESC";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();
}

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
		
		<meta charset="utf-8">
		<title>Program 2</title>
		<link rel="stylesheet" type="text/css" href="../css/mp_reports_style.css">
	
	</head>
	
	<body>
		
		<div class = "article">
		
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong> List of all female students</strong>
				<br/>
				
				<?php 
				
					$records = all_female_student();
					foreach ($records as $record)
					echo "First Name: " .  $record['firstName'] . " Last Name: " . $record['lastName'] . "<br/>"; 
				?>
				
			</div>
			
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong> List of students that have assignments with a grade lower than 50</strong>
				<br/>
				
				<?php 
				
					$records = student_assignment_grade();
					foreach ($records as $record)
					echo "First Name: " .  $record['firstName'] . " Last Name: " . $record['lastName'] . " Grade: " . $record['grade'] . "<br/>"; 
				?>
				
			</div>
			
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong> List of assignments that have not been graded</strong>
				<br/>
				
				<?php 
				
					$records = assignment_not_graded();
					foreach ($records as $record)
					echo "Title: " .  $record['title'] . " Due Date: " . $record['dueDate'] . "<br/>"; 
				?>
				
			</div>
			
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong> Gradebook</strong>
				<br/>
				
				<?php 
				
					$records = gradebook();
					foreach ($records as $record)
					echo "First Name: " .  $record['firstName'] . " Last Name: " . $record['lastName'] . "Title: " .  $record['title'] . " Grade: " . $record['grade'] . "<br/>"; 
				?>
				
			</div>
		
			<div class = "all_team_and_stadium and score">
				
				<br/>
				<strong> List of average grade per student</strong>
				<br/>
				
				<?php 
				
					$records = average();
					foreach ($records as $record)
					echo "Student ID: " .  $record['studentId'] . "First Name: " .  $record['firstName'] . " Last Name: " . $record['lastName'] . "Average: " .  $record['average'] . "<br/>"; 
				?>
				
			</div>
		
		</div>

	</body>
	
</html>
