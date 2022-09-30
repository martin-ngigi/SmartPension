<?php

session_start();

	//get the username from login page that was sent 
	if (!isset($_SESSION['Username']))
	{
		//always check if there is no user name sent to here ie applicant home, then residect to login.php
		header("location:login.php");
	}
	//else if user is a applicant, redirect to login.php
	elseif ($_SESSION['UserType']=='applicant') {
		header("location:login.php");
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

		<?php 

	include 'applicant_css.php';

	 ?>
	
</head>
<body>
	<?php 

	include 'admin_sidebar.php';

	 ?>
</body>
</html>