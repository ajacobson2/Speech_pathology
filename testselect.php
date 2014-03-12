<?php
session_start();
// Open database and do some error checking.
$con = mysqli_connect("localhost", "ajacobson", "changeme", "speech_pathology");

if(mysqli_connect_errno())
{
	echo "Database connection failed " . mysqli_connect_error();
}
// Grab the session value to check who is logged on, then query the login table to check which account that is.
$val = $_SESSION['logged_on'];
$result = mysqli_query($con, "SELECT * FROM vocab_users WHERE id='$val'");

$row = mysqli_fetch_array($result);

// Query the database to grab data to output to the screen.
$display = mysqli_query($con, "SELECT * FROM vocab_words");
//$displayVal = mysqli_fetch_array($display);

mysqli_close($con);

$val2 = $row['username'];
// Print the html page to display all the words in the database with a checkbox next to it, TODO: make the submit button send back the values checked to the server and add a section to input the name of the test. 
echo "<!DOCTYPE html>
	<html>
		<body>";
	echo "	Hello $val2";	
	echo "<form action=\"\" method=\"post\">";
	//Loops through the data from the query of the words table.
	while ($displayVal = mysqli_fetch_array($display))
	{
		$temp = $displayVal['name'];
		echo "<input type=\"checkbox\" name=\"list\" value=\"$temp\">$temp</br>";
	}	
	echo "<input type=\"submit\" value=\"Save\">";
	echo "</form>";




echo "		</body>
	</html>";
?>
