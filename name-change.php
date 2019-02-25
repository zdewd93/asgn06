<!DOCTYPE html>
<!--	Author: 
		Date:	
		File:	name-change.php
		Purpose:MySQL Exercise
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>
<?php

include('include.php');

if( !$connect) 
{
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$userQuery = "update personnel set lastName='Jackson', jobTitle='Manager' where empID='12353'"; // ADD QUERY
$userQuery = "select firstName, lastName, jobTitle from personnel where empID = '12353'" ; 

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}
else
{
	print("	<h1>UPDATE</h1>");
    
    while($row = mysqli_fetch_assoc($result))
    { 
      print("<p>".$row['firstName']." ".$row['lastName']." is now ".$row['jobTitle']."</p>");
    }
	
}


mysqli_close($connect);   // close the connection
 
?>

</body>
</html>
