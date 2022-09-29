<?php

session_start();

	//get the username from login page that was sent to applicanthome.php
	if (!isset($_SESSION['Username']))
	{
		//always check if there is no user name sent to here ie applicant home, then residect to login.php
		header("location:login.php");
	}
	//else if user is a admin, redirect to login.php
	elseif ($_SESSION['UserType']=='admin') {
		header("location:login.php");
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Applicant Dashboard</title>

		<?php 

	include 'applicant_css.php';

	 ?>
	
</head>
<body>
	<?php 

	include 'applicant_sidebar.php';

	 ?>
</body>
</html>