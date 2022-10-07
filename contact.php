<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	
	<style type="text/css">
		nav
		{
			/*position: fixed;*/
			background-color: skyblue;
			height: 70px;
			width: 100%;
			z-index: 1;
		}

		.logo
		{
			font-size: 25px;
			position: relative;
			left: 5%;
			color: black;
			font-weight: bold;
			line-height: 70px;

			box-sizing: border-box;
			font-family: "Poppins", sans-serif;
		}

		ul{
			position: relative;
			float: right;
			margin-right: 20px;
		}

		ul li{
			display: inline-block;
			line-height: 70px;
			margin: 0 5px;
		}

		ul li a
		{
			text-decoration: none;
			color: white;
			font-size: 17px;
		}

		.adm_int
			{
				padding-top: 10px; 
			}
		.label_text
		{
			display: inline-block;
			width: 100px;
			text-align: right;
			padding: 10px;
		}
		.input_deg
		{
			width: 30%;
			height: 40px;
			border-radius: 15px;
			border: 1px solid blue;
		}

		.adm_int
		{
			padding-top: 10px; 
		}
		/*. is used for class*/
		.input_txt
		{
			width: 30%;
			height: 120px;
			border-radius: 15px;
			border: 1px solid blue;
		}


		/*# is used for id*/
		#submit
		{
			position: relative;
			width: 15%;
			left: 5%;
		}

		form {
			margin-top: 50px;
		}

		

	</style>

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<nav>
		<label class="logo">Smart Pension</label>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="apply.php">Applications</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
			<li><a href="Register.php" class="btn btn-success">Register</a></li>
		</ul>
	</nav>
	<div align="center" class="admission_form">
		<form action="adm_from_data_check.php" method="POST">
			<div class="adm_int">
				<label class="label_text">Name</label>
				<input class="input_deg" type="text" name="name_input">
			</div>
			<div class="adm_int">
				<label class="label_text">Email</label>
				<input class="input_deg" type="text" name="email_input">
			</div>
			<div class="adm_int">
				<label class="label_text">Phone</label>
				<input class="input_deg" type="text" name="phone_input">
			</div>
			<div class="adm_int">
				<label class="label_text">Message</label>
				<textarea class="input_txt" name="message_input"></textarea>
			</div>
			<div class="adm_int">
				<input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply_btn">
			</div>
		</form>
	</div>
</body>
</html>