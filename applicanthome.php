<?php

session_start();

$username = $_SESSION['Username'];


//get the username from login page that was sent to applicanthome
if (!isset($_SESSION['Username']))
{
	//always check if there is no user name sent to here ie student home, then resirect to login.php
	header("location:login.php");
}
//else if user is a admin, redirect to login.php
elseif ($_SESSION['UserType']=='admin') {
	header("location:login.php");
}

//if one clicks Update button, take him/her to update_profile.php
if (isset($_POST['update_btn'])) {
	header("location:update_profile.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width", initital-scale-1.0>
	<title>Smart Pension</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<nav>
		<label class="logo">W-School</label>
		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="">Applications</a></li>
			<li><a href="update_profile.php">Update Profile</a></li>
			<li><a href="login.php" class="btn btn-success">Logout</a></li>
		</ul>
	</nav>

	<?php
		include 'myslider.php';
	?>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="welcome_img" src="images/House.jpg">
			</div>
			<div class="col-md-8">
				<h1>Welcome to Smart Pension</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>

	<center>
		<h1>Our Founders</h1>
	</center>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img class="welcome_img" src="images/Founder1.jpg">
				<h2> Mr. John</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
			<div class="col-md-3">
				<img class="welcome_img" src="images/Founder2.jpg">
				<h2> Ms. Peace</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. </p>
			</div>
			<div class="col-md-3">
				<img class="welcome_img" src="images/Founder3.jpg">
				<h2> Mr. David</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
			<div class="col-md-3">
				<img class="welcome_img" src="images/Founder4.jpg">
				<h2> Ms. Stacy</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
		</div>
	</div>
</body>
</html>