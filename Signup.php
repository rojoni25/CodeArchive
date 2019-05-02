<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php

session_start();
	if(isset($_POST['Register']) && $_POST['password_confirmation']==$_POST['password']){
		$UserId=rand();
		$Fname=$_POST['first_name'];
		$Lname=$_POST['last_name'];
		$Dname=$_POST['Username'];
		$E_mail=$_POST['email'];
		$Role=$_POST['Role'];
		$Password=sha1($_POST['password']);
		$confirmPassword=$_POST['password_confirmation'];
		$Filepath="Uploads/".$Dname."/";
		date_default_timezone_set("Asia/Dhaka");
		$JoinDate= date("D M d, Y h:i:s A ");
echo $JoinDate;

		$con = mysqli_connect("localhost","root","");
		if(!$con)
		{
			echo "Localhost is not connected.<br>";
		}
		else
		{
			echo "Localhost is connected.<br>";
		}
		$dbSelect = mysqli_select_db($con,"codearchivebetadb");
		if(!$dbSelect)
		{
			echo "DB is not selected.<br>";
		}
		else
		{
			echo "DB is selected.<br>";
		}

		$stmt = $con->prepare("INSERT INTO users (UserId,UserName,FirstName,LastName,Email,Role,FileFolder,Password,JoinDate) VALUES (?, ?, ?, ?,?,?,?,?,?)");
		$stmt->bind_param("sssssssss",$UserId,$Dname, $Fname, $Lname, $E_mail,$Role,$Filepath,$Password,$JoinDate);
		if(!$stmt->execute())
		{
			echo "Invalid sign up.<br>";
		}
			else
		{
			$_SESSION['caemail']=$E_mail;
			$_SESSION['capassword']=$Password;

			//if(!mkdir($Filepath))
			//{header("location:../codearchive");}

			header("location:../codearchive");



		}
	}
	?>
</body>
</html>