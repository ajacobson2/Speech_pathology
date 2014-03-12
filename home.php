<?php
// Get the login data from the login page.
$login = $_POST["user"];
$pass = $_POST["pass"];

//Connect to the database, TODO: add better Error checking.
$con = mysqli_connect("localhost", "ajacobson", "changeme", "speech_pathology");
if(mysqli_connect_errno())
{
	echo "Could not connect to the database.\n";
}

//escape characters that are in the typed user input from previous page.
$login2 = addslashes($login);
$pass2 = addslashes($pass);

//Query the database for the account with matching login information, then check if there is an account and pull the id value from the database to use as a session variable.
$result = mysqli_query($con, "SELECT * FROM vocab_users WHERE username = '$login2' AND password = '$pass2'");
mysqli_close($con);

$row = mysqli_fetch_array($result);
$sessionID = $row['id'];
// If there is no account for the entered information do this.
if (!$row)
{
	echo "<!DOCTYPE html>\n
		<html>\n
		Invalid information please hit back and retry.\n
		</html>\n";
}
//Start the session and store the value to check who is logged in on each other page.
else
{
session_start();
$_SESSION['logged_on'] = $sessionID;

echo "<!DOCTYPE html>\n
<html>\n
	<head>\n
		<link rel=\"stylesheet\" type=\"text/css\" href=\"homeCSS.css\">\n
	</head>\n
	<body>
	
	
	<!-- To Do:
		Login system needs security
	-->
	
	<!-- Top bar to push down the page to create a gap, will look into using the header section of html for this -->
	<div id=\"header\">
	</br>
	</br>
	</div>
	<!-- divide the screen up to make it look more organized -->
	<!-- menu half will be skinnier, also may want to add a division between menu and the frame screen. -->
	<!-- To Do:
		remove the style on the Div elements and put them into the CSS -->
	<div id=\"menu\" style=\"width:150px;float:Left\">	
		<menu id=\"list\">
		<li>
			<button id=\"select\" onclick=\"change('testselect.php')\" type=\"button\">Select Words</button>
			
		</li>
		<li>
			<button id=\"select\" onclick=\"change('viewtest.php')\" type=\"button\">View Saved Test</button>
		</li>	
		<li>
			<button id=\"select\" onclick=\"change('grade.php')\" type=\"button\">View Grading Page</button>
		</li>
		<li>
			<button id=\"select\" type=\"button\"> Select applicants</button>
		</li>
		<li>
			<button id=\"select\" type=\"button\"> Help!! </button>
		</li>
		</menu>	
	</div>
	<!-- Frame half of the screen, will be much wider-->
	<div id=\"frame\" style=\"float:Left\">
		<iframe id=\"iframe\" src=\"temp.html\">This is a frame</iframe>

	</div>
	<script>
		function change(val)
		// This function is used to change the viewing page in the iframe element by changing the src attribute to the specified value for the paramenter.
		{
			document.getElementById('iframe').src = val;
		}

	</script>	
	</body>


</html>";
}
?>
