<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php


	if(isset($_POST['Register']) && $_POST['password_confirmation']==$_POST['password']){
		$Fname=$_POST['first_name'];
		$Lname=$_POST['last_name'];
		$Dname=$_POST['display_name'];
		$E_mail=$_POST['email'];
		$Password=sha1($_POST['password']);
		$confirmPassword=$_POST['password_confirmation'];


		$con = mysqli_connect("localhost","root","");
		if(!$con)
		{
			echo "Localhost is not connected.<br>";
		}
		else
		{
			echo "Localhost is connected.<br>";
		}
		$dbSelect = mysqli_select_db($con,"codearchivedb");
		if(!$dbSelect)
		{
			echo "DB is not selected.<br>";
		}
		else
		{
			echo "DB is selected.<br>";
		}

		$stmt = $con->prepare("INSERT INTO RegistrationTable (FirstName,LastName,DisplayName,Email,Password) VALUES (?, ?, ?, ?,?)");
		$stmt->bind_param("sssss", $Fname, $Lname,$Dname, $E_mail,$Password);
		if(!$stmt->execute())
		{
			echo "Invalid sign up.<br>";
		}
			else
		{
			$sql = "create table `$Dname` (ArticleName varchar(50) NOT NULL PRIMARY KEY,
			ArticleTitle varchar(300) NOT NULL,
			TimeDate varchar(20) NOT NULL,
			Article varchar(10000) NOT NULL)";
			if(mysqli_query($con,$sql))
			{
				echo "Table is Created.<br>";			echo "Thank you for sign up.<br>";
			header("location:Home.php");

			}
			else
			{
				echo "table is not Created.<br>";
			}

		}
	}
	?>
</body>
</html>