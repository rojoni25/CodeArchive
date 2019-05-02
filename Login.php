<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
session_start();  	
	if(isset($_POST['login'])){
	           	
        $_SESSION['username']=$_POST['email'];
		$_SESSION['password']=$_POST['password'];

		$E_mail=$_POST['email'];
		$Password=$_POST['password'];
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
           	header('location:../codearchive');

           }
           
       }
	?>
</body>
</html>