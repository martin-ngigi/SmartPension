
<?php

session_start();
error_reporting(0);

//connect to db
$data=mysqli_connect('localhost', 'root', '', 'SmartPension');

// if register_btn is clicked
if (isset($_POST['register_btn'])) {
	//get data
	$username=$_POST['user_name_input'];
	$email=$_POST['email_input'];
	$phone=$_POST['phone_input'];
	$birth_date = $_POST['birth_date_input'];
	$age = $_POST['age_input'];
	$county = $_POST['county_input'];
	$nationality = $_POST['nationality_input'];
	$gender = htmlspecialchars($_POST['genderDD']);
	$id_nu = $_POST['id_input'];
	$bank = htmlspecialchars($_POST['bankDD']);
	$account_nu = $_POST['account_nu_input'];
	$kra_pin = $_POST['kra_pin_input'];
	$employed =htmlspecialchars($_POST['employedDD']); 
	$pension_beneficiary = htmlspecialchars($_POST['pensionDD']);
	$password = $_POST['password_input'];
	$nk_name = $_POST['nk_name_input'];
	$nk_id = $_POST['nk_id_input'];
	$nk_relationship = $_POST['nk_relationship_input'];
	$nk_phone = $_POST['nk_phone_input'];
	$nk_email = $_POST['nk_email_input'];
	$usertype="applicant";

	// echo "Gender : ".htmlspecialchars($_POST['genderDD']);
	// echo "Bank : ".htmlspecialchars($_POST['bankDD']);
	// echo "Employed : ".htmlspecialchars($_POST['employedDD']); 
	// echo "Pension : ".htmlspecialchars($_POST['pensionDD']);
	


	//before saving, first check whether there is another student with the same username so as to avoid corrission of usernames
	$check="SELECT * FROM user WHERE username='$username'";
	$check_user=mysqli_query($data,$check);
	//check if there is multiple users
	$row_count=mysqli_num_rows($check_user);
	//if there is an existing user with the same username
	if ($row_count==1) 
	{
		echo "<script type='text/javascript'>
			alert('Username already exists. Try another username');
			</script>";
	}
	else
	{
			//sql statement to save data to db
		$sql="INSERT INTO user(username, Date_of_birth, Phone, Age, County, Nationality, Gender, ID_Nu, Bank, Account_Nu, KRA_Pin, Employed, Pension_Beneficiary, Password, NK_Name, NK_ID, NK_Relationship, NK_Phone, NK_Email, UserType, Email) VALUES('$username', '$birth_date', '$phone', '$age', '$county', '$nationality', '$gender', '$id_nu', '$bank', '$account_nu', '$kra_pin', '$employed', '$pension_beneficiary', '$password', '$nk_name', '$nk_id', '$nk_relationship', '$nk_phone', '$nk_email', '$usertype', '$email')";

		$result=mysqli_query($data, $sql);
		if ($result)
		{
			echo "<script type='text/javascript'>
			alert('data uploaded successfully');
			</script>";
			//after savind data successfully, redirect to Home Page
			header("location:home.php");
		}
		else
		{
			echo "upload failed";
		}
	}


	
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- style the labels and the UI -->
<style type="text/css">
	label
	{
		display: inline-block;
		text-align: right;
		width: 100px;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.div_deg
	{
		background-color: skyblue;
		width: 800px;
		padding-bottom: 70px;
		padding-top: 70px;

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
		width: 50%;
		height: 40px;
		border-radius: 15px;
		border: 1px solid blue;
	}

</style>


</head>
<body>


<div class="content">
	<center>
		<h1>Register</h1>
		<div class="div_deg">
			<!-- # means we are going to add some code in the same same file so as to save/insert/upload -->
			<form action="#" method="POST" id="s">
				<div class="adm_int">
					<label class="label_text">Username</label>
					<input class="input_deg" type="text" name="user_name_input">
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
					<label class="label_text">Date Of Birth</label>
					<input class="input_deg" type="text" name="birth_date_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Age</label>
					<input class="input_deg" type="number" name="age_input">
				</div>
				<div class="adm_int">
					<label class="label_text">County</label>
					<input class="input_deg" type="text" name="county_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Nationality</label>
					<input class="input_deg" type="text" name="nationality_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Gender</label>
					<select name="genderDD" class="input_deg">
					    <option value="male">Male</option>
					    <option value="Female">Female</option>
					    <option value="Other">Other</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">ID</label>
					<input class="input_deg" type="number" name="id_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Bank</label>
					<select name="bankDD" class="input_deg">
					    <option value="KCB">KCB</option>
					    <option value="Equity">Equity</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Account Nu.</label>
					<input class="input_deg" type="text" name="account_nu_input">
				</div>
				<div class="adm_int">
					<label class="label_text">KRA Pin.</label>
					<input class="input_deg" type="text" name="kra_pin_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Employed</label>
					<select name="employedDD" class="input_deg">
					    <option value="Yes">Yes</option>
					    <option value="No">No</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Pension Beneficiary</label>
					<select name="pensionDD" class="input_deg">
					    <option value="Yes">Yes</option>
					    <option value="No">No</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Password</label>
					<input class="input_deg" type="text" name="password_input">
				</div>
				<div>
					<h3>Next Of Kin</h3>
				</div>
				<div class="adm_int">
					<label class="label_text">Name</label>
					<input class="input_deg" type="text" name="nk_name_input">
				</div>
				<div class="adm_int">
					<label class="label_text">ID</label>
					<input class="input_deg" type="number" name="nk_id_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Relationship</label>
					<input class="input_deg" type="text" name="nk_relationship_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Phone</label>
					<input class="input_deg" type="number" name="nk_phone_input">
				</div>
					<div class="adm_int">
					<label class="label_text">Email</label>
					<input class="input_deg" type="text" name="nk_email_input">
				</div>
				<div>
					<input class="btn btn-success" type="submit" name="register_btn" value="Register">
				</div>
				
			</form>
	</div>
</div>
	</center>
</body>
</html>