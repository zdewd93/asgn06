<!DOCTYPE html>
<!--	Author: 
		Date:	
		File:	raises.php
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
$userQuery = "select firstName, lastName, empID, hourlyWage from personnel where hourlyWage<10.00"; // ADD THE QUERY

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
	print("<h1>LIST OF EMPLOYEES WHO NEED A RAISE</h1>");

	while($row = mysqli_fetch_assoc($result))
    {
      print("<p>".$row['firstName']." ".$row['lastName']." needs a raise!</p>");
    }

}

mysqli_close($connect);   // close the connection
 
?>

</body>
</html>
