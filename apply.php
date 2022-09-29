<?php
//dont show unecessary errors
error_reporting(0);
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


	//connect to db
	$data=mysqli_connect('localhost', 'root', '', 'smartpension');
	//check if connection succeeeded
	if ($data -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $data -> connect_error;
	  exit();
	}

	$name =$_SESSION['Username'];
	
	//get data from db for personal details such as names...
	$sql="SELECT * FROM user WHERE Username='$name'";

	$result=mysqli_query($data, $sql);

	$info= mysqli_fetch_assoc($result);

	//$name = "{$info['username']}";
	$id_nu = "{$info['ID_Nu']}";
	$age = "{$info['Age']}";
	$phone = "{$info['Phone']}";
	$nationality = "{$info['Nationality']}";
	$pension_beneficiary = "{$info['Pension_Beneficiary']}";
	$employed = "{$info['Employed']}";
	
	$application_date ="".date("d/m/Y");
	$time = date("h:i:sa d/m/Y");;
	$amount = "2000";
	$status ="Pending";
	$served_by = "";
	$disbursed_date ="";
	

		// if apply_button is clicked
	if (isset($_POST['apply_button'])) {

		//a user can apply for pension funds only once a moth. first check whether user has applied for pensions before
		$month_year =  date("m/Y"); //ie month/Year

		$check="SELECT * FROM applications WHERE Name='$name' AND Application_Date  LIKE '%$month_year' "; // * or % is used to check whether a a string starts or ends with that cut string
		$check_user=mysqli_query($data,$check);
		//check if there is multiple users
		$row_count=mysqli_num_rows($check_user);

		//if there is an existing transaction for this month.
		if ( ($row_count ==1) || ($row_count >1)  ) //row count equals to 1 or greater than 1 
		{
			// echo "<script type='text/javascript'>
			// 	alert('Username already exists. Try another username');
			// 	</script>";

			//Set error message
			$message="Not Eligible. You already have a pending or completed pension transaction, please check previous applications and try again next month. Thank you.";
			$_SESSION['application_message']=$message; //store error message 

			//clear the success message incase it still there
			$message_success =""; //empty
			$_SESSION['application_message_success']=$message_success;
		}

		else{ 

			//if age is less than 70, show error message
			if ($age < 70) {
				//echo "Age less than 70";
				$message="Not Eligible. Age less than 70";
				$_SESSION['application_message']=$message; //store error message 

				//clear the success message incase it still there
				$message_success =""; //empty
				$_SESSION['application_message_success']=$message_success;

			}

			//nationality not kenya or kenyan
			elseif (($nationality != "Kenyan") && ($nationality != "Kenya") ) {
				$message="Not Eligible. Nationality not Kenyan";
				$_SESSION['application_message']=$message; //store error message 

				//clear the success message incase it still there
				$message_success =""; //empty
				$_SESSION['application_message_success']=$message_success;
			}

			//pension_beneficiary is yess, show error message
			elseif ($pension_beneficiary == "Yes") {
				$message="Not Eligible. You are a pension beneficiary";
				$_SESSION['application_message']=$message; //store error message 

				//clear the success message incase it still there
				$message_success =""; //empty
				$_SESSION['application_message_success']=$message_success;
			}
			//employed is yess, show error message
			elseif ($employed == "Yes") {
				$message="Not Eligible. You are employed";
				$_SESSION['application_message']=$message; //store error message 

				//clear the success message incase it still there
				$message_success =""; //empty
				$_SESSION['application_message_success']=$message_success;
			}

			else{ //Now he/she is eligible

				//save data to db:
				$sql2="INSERT INTO applications(Name, Id_Number, Application_Date, Application_Time, Amount, Status, Served_By, Disbursed_Date, Phone) VALUES('$name', '$id_nu', '$application_date', '$time', '$amount', '$status', '$served_by', '$disbursed_date', '$phone')";

				$result=mysqli_query($data, $sql2);
				if ($result){
					// echo "<script type='text/javascript'>
					// alert('data uploaded successfully');
					// </script>";
								//message to be displayed
					
					$message="Eligible: You application has been received successfully at ".$time.". We will notify you once the funds are disbursed. Thank You. ";
					$_SESSION['application_message_success']=$message; //store error message 
					
					//clear error message if still there
					$message2 ="";
					$_SESSION['application_message']=$message2; //store error message 
				}
				else{
					$message="upload failed";
					$_SESSION['application_message']=$message; //store error message 

					//clear the success message incase it still there
					$message_success =""; //empty
					$_SESSION['application_message_success']=$message_success;
				}

			}
		}

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
	 <style type="text/css">
	 	#apply_btn
	 	{
	 		width: 100px;
	 		height: 30px;
	 	}
	 	#success_msg{
	 		margin-left: 230px;
	 		margin-right: 50px;
	 	}
	 	#error_msg{
	 		margin-left: 230px;
	 		margin-right: 50px;
	 	}
	 </style>
	
</head>
<body>
	<?php 

	include 'applicant_sidebar.php';

	 ?>
	 <center>
	 	<h3>Application Page</h3>
	 	<p>Click the button below to apply</p>
		<form action="#" method="POST" class="login_form"> <!-- # means after clicking, stay on this page -->
		 	<div >
				<input class="btn-primary" type="submit" name="apply_button" value="APPLY" id="apply_btn">
			</div>
			<!-- show error message -->
			<h4 id="error_msg" style="color: red">
				<?php
				//dont show warnings and uncessary errors
				error_reporting(0); 
				session_start(); //show the message
				//session_destroy();
				echo $_SESSION['application_message'];
				?>
			</h4>

			<!-- show success message -->
			<h4 id="success_msg" style="color: green">
				<?php
				//dont show warnings and uncessary errors
				error_reporting(0); 
				session_start(); //show the message
				//session_destroy();
				echo $_SESSION['application_message_success'];
				?>
			</h4>
		</form>
	 </center>
</body>
</html>