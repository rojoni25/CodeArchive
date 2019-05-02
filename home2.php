<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css\extracss.css"type="text/css"/>
	<link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.css"type="text/css"/>
	<title>Code Archive</title>
</head>
<body>
	<?php
	session_start();

	if(isset($_POST['login'])){	
		
		$E_mail=$_POST['email'];
		$Password=sha1($_POST['password']);
		$con = mysqli_connect("localhost","root","");
		$dbSelect = mysqli_select_db($con,"codearchivedb");
		$sql="select Email,Password from registrationtable where Email='$E_mail' and Password='$Password'";
		$result = mysqli_query($con,$sql);
		if(!$var = mysqli_fetch_array($result))
		{
			echo "No user found";
		}
		else
		{
			if (isset($_SESSION['id']))
				$_SESSION['id'] = $_SESSION['id'];
			$_SESSION['caemail']=$_POST['email'];
			$_SESSION['capassword']=sha1($_POST['password']);
			setcookie("caEmail",$E_mail,time() + (86400 * 30), "/"); //86400 is 1 day
			setcookie("caPassword",$Password,time() + (86400 * 30), "/"); //86400 is 1 day
			$sql2="select * from registrationtable where Email='$E_mail' and Password='$Password'";
			$result2 = mysqli_query($con,$sql2);
			$row= mysqli_fetch_assoc($result2);
			$Dname=$row['DisplayName'];
			$Fname=$row['FirstName'];
			$Lname=$row['LastName'];
			$Email=$row['Email'];
			$Filepath=$row['Filepath'];
			echo "	<div class='container' style='margin-top: 80px;'>";				
				include('PostForm.php');
			echo "</div>";

			include("UserNavigation.php");
			include("UserModal.php");           	



		}

	}
	elseif (isset($_SESSION['caemail'])) {

		$E_mail=$_SESSION['caemail'];
		$Password=$_SESSION['capassword'];
		$con = mysqli_connect("localhost","root","");
		$dbSelect = mysqli_select_db($con,"codearchivedb");
		$sql="select Email,Password from registrationtable where Email='$E_mail' and Password='$Password'";
		$result = mysqli_query($con,$sql);
		if(!$var = mysqli_fetch_array($result))
		{
			echo "No user found";
		}
		else
		{

			setcookie("caEmail",$E_mail,time() + (86400 * 30), "/"); //86400 is 1 day
			setcookie("caPassword",$Password,time() + (86400 * 30), "/"); //86400 is 1 day
			$sql2="select * from registrationtable where Email='$E_mail' and Password='$Password'";
			$result2 = mysqli_query($con,$sql2);
			$row= mysqli_fetch_assoc($result2);
			$Dname=$row['DisplayName'];
			$Fname=$row['FirstName'];
			$Lname=$row['LastName'];
			$Email=$row['Email'];
			$Filepath=$row['Filepath'];

			echo "	<div class='container' style='margin-top: 80px;'>";				
				include('PostForm.php');
			echo "</div>";
			include("UserNavigation.php");
			include("UserModal.php");           	

			
		}

	}
	else
	{
		include("HomeNavigation.php");
		include("FormModal.php");

		echo "	<div class='container' style='margin-top: 80px;'>";				
				//include('PostForm.php');
			echo "</div>";}
		?>


	</body>
	</html>