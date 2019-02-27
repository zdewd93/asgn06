<!DOCTYPE html>
<!--	Author: 
		Date:	
		File:	add-sale-person.php
		Purpose:MySQL Exercise
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>

<?php

include ('include.php');

if( !$connect) 
{
	die("ERROR: Cannot connect to database ".DB." on server ".SERVER." 
	using user name ".USER." (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}
$empID = $_POST['empID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

$userQuery = "insert into personnel  values ('$empID', '$firstName', '$lastName', 'Sales', '8.25')"; // ADD THE QUERY

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from ".DB.": " .	
		mysqli_error($connect) );
}
else
{
	print("	<h1>ADD A NEW PERSONNEL RECORD</h1>");
	print ("<p>The following record was added to the personnel table:</p>");
	print("<table border='0'>
			<tr><td>EMPLOYEE ID</td><td>$empID</td></tr>
			<tr><td>FIRST NAME</td><td>$firstName</td></tr>
			<tr><td>LAST NAME</td><td>$lastName</td></tr>		
			<tr><td>JOB TITLE</td><td>sales</td></tr>
			<tr><td>HOURLY WAGE</td><td>8.25</td></tr>
			</table>");
}

mysqli_close($connect);   // close the connection
 
?>
</body>
</html>
