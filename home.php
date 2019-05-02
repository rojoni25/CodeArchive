<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://localhost/codearchive/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/codearchive/js/popper.js"></script>
	
	<script src="http://localhost/codearchive/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://localhost/codearchive/bootstrap-4.0.0-dist/css/bootstrap.css" type = "text/css"/>
	<link rel="stylesheet" href="http://localhost/codearchive/css/extracss.css" type ="text/css"/>

	
	<title>Code Archive</title>
</head>
<body>

	<?php

	session_start();
	
	include($_SERVER['DOCUMENT_ROOT']."/Codearchive/allscripts.php");

	if(isset($_POST['login'])){	
		
		$E_mail=$_POST['email'];
		$Password=sha1($_POST['password']);
		$con = mysqli_connect("localhost","root","");
		$dbSelect = mysqli_select_db($con,"codearchivebetadb");
		$sql="select Email,Password from Users where Email='$E_mail' and Password='$Password'";
		$result = mysqli_query($con,$sql);
		if(!$var = mysqli_fetch_array($result))
		{
			echo "No user found";
		}
		else
		{
			if (isset($_SESSION['id']))
				$_SESSION['id'] = $_SESSION['id'];
			$_SESSION['caemail']=$E_mail;
			
			$_SESSION['capassword']=$Password;
			setcookie("caEmail",$E_mail,time() + (86400 * 30), "/"); //86400 is 1 day
			setcookie("caPassword",$Password,time() + (86400 * 30), "/"); //86400 is 1 day
			$sql2="select * from Users where Email='$E_mail' and Password='$Password'";
			$result2 = mysqli_query($con,$sql2);
			$row= mysqli_fetch_assoc($result2);
			$Dname=$row['UserName'];
			$Fname=$row['FirstName'];
			$Lname=$row['LastName'];
			$Email=$row['Email'];
			$Filepath=$row['FileFolder'];
			$_SESSION['username'] = $Dname;
			$_SESSION['userId'] = $row['UserId'];

			echo "

			<div>
			<div class='fixed-top'>";
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/Views/Shared/HomeNavigation.php");
			echo "</div>";
			echo "<div class='row'>";
			echo "<div class='col-sm-2'>";			
			//include($_SERVER['DOCUMENT_ROOT']."/Codearchive/leftsidebar.php");
			echo "</div>";
			echo "<div class='col-sm-9'  style='margin-top:60px;'>";

			echo "<div id='recentPost'>";
			recentPost();
			echo $_SERVER['DOCUMENT_ROOT'];
			echo "</div>";

			echo "<div id='PostForm' style='display:none;'>";
			PostForm();
			echo "</div>";

			echo "<div id='PostProblem' style='display:none;'>";
			PostProblem();
			echo "</div>";

			echo "<div id='RecentProblem' style='display:none;'>";
			recentProblem();
			echo "</div>";

			echo "<div id='postbyC' style='display:none;'>";
			postbyCat("c");
			echo "</div>";

			echo "<div id='postbyCpp' style='display:none;'>";
			postbyCat('cpp');
			echo "</div>";

			echo "<div id='postbyJava' style='display:none;'>";
			postbyCat('java');
			echo "</div>";

			echo "<div id='postbyPy' style='display:none;'>";
			postbyCat('py');
			echo "</div>";

			echo "<div id='postbyPhp' style='display:none;'>";
			postbyCat('php');
			echo "</div>";

			echo "<div id='postbyAsm' style='display:none;'>";
			postbyCat('asm');
			echo "</div>";

			echo "</div>";
			echo "</div>";
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/footer.php");
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/UserModal.php");




		}

	}
	

elseif (isset($_SESSION['caemail']) ) {

		
		$E_mail=$_SESSION['caemail'];
		$Password=$_SESSION['capassword'];
		$con = mysqli_connect("localhost","root","");
		$dbSelect = mysqli_select_db($con,"codearchivebetadb");
		$sql="select Email,Password from Users where Email='$E_mail' and Password='$Password'";
		$result = mysqli_query($con,$sql);
		if(!$var = mysqli_fetch_array($result))
		{
			echo "No user found";
		}
		else
		{
			if (isset($_POST['postfile']) || isset($_POST['posttxt'])) {
				echo "<div style='margin-top:80px;'></div>";
				postit();
			}

			elseif (isset($_POST['postpbtn']) || isset($_POST['postptxt'])) {
				echo "<div style='margin-top:80px;'></div>";
				PostProblem();
			}

			
			setcookie("caEmail",$E_mail,time() + (86400 * 30), "/"); //86400 is 1 day
			setcookie("caPassword",$Password,time() + (86400 * 30), "/"); //86400 is 1 day
			$sql2="select * from Users where Email='$E_mail' and Password='$Password'";
			$result2 = mysqli_query($con,$sql2);
			$row= mysqli_fetch_assoc($result2);
			$Dname=$row['UserName'];
			$Fname=$row['FirstName'];
			$Lname=$row['LastName'];
			$Email=$row['Email'];
			$Filepath=$row['FileFolder'];
			$_SESSION['username'] = $Dname;
			$_SESSION['userId'] = $row['UserId'];

			echo "

			<div>
			<div class='fixed-top'>";
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/Views/Shared/HomeNavigation.php");
			echo "</div>";

			echo "<div class='row'>";
			echo "<div class='col-sm-2'>";			
			//include($_SERVER['DOCUMENT_ROOT']."/Codearchive/leftsidebar.php");
			echo "</div>";
			echo "<div class='col-sm-9'  style='margin-top:60px;'>";


			echo "<div id='recentPost'>";
			if (isset($_POST['Searchbtn'])) {
				$_SESSION['casearch']= $_POST['Searchqry'];			
			searchpost();}
			else {recentPost();}
			echo "</div>";

			echo "<div id='PostForm' style='display:none;'>";
			PostForm();
			echo "</div>";

			echo "<div id='PostProblem' style='display:none;'>";
			PostProblem();
			echo "</div>";

			echo "<div id='RecentProblem' style='display:none;'>";
			recentProblem();
			echo "</div>";

			echo "<div id='postbyC' style='display:none;'>";
			postbyCat("c");
			echo "</div>";

			echo "<div id='postbyCpp' style='display:none;'>";
			postbyCat('cpp');
			echo "</div>";

			echo "<div id='postbyJava' style='display:none;'>";
			postbyCat('java');
			echo "</div>";

			echo "<div id='postbyPy' style='display:none;'>";
			postbyCat('py');
			echo "</div>";

			echo "<div id='postbyPhp' style='display:none;'>";
			postbyCat('php');
			echo "</div>";

			echo "<div id='postbyAsm' style='display:none;'>";
			postbyCat('asm');
			echo "</div>";


			echo "</div>";
			echo "</div>";
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/footer.php"); 
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/UserModal.php");
			          	

			
		}

	}

	
else
	{


		echo "

			<div>
			<div class='fixed-top'>";
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/Views/Shared/HomeNavigation.php");
			
			echo "</div>";
			echo "<div class='row'>";
			echo "<div class='col-sm-2'>";			
			//include($_SERVER['DOCUMENT_ROOT']."/Codearchive/leftsidebar.php");
			echo "</div>";
			echo "<div class='col-sm-9' style='margin-top:60px;'>";
			echo $_SERVER['DOCUMENT_ROOT'];
			echo "<div id='recentPost'>";
			if (isset($_POST['Searchbtn'])) {
				$_SESSION['casearch']= $_POST['Searchqry'];			
			searchpost();}
			else {recentPost();}
			echo "</div>";

			echo "<div id='PostForm' style='display:none;'>";
			PostForm();
			echo "</div>";

			echo "<div id='PostProblem' style='display:none;'>";
			PostProblem();
			echo "</div>";

			echo "<div id='RecentProblem' style='display:none;'>";
			recentProblem();
			echo "</div>";

			echo "<div id='postbyC' style='display:none;'>";
			postbyCat("c");
			echo "</div>";

			echo "<div id='postbyCpp' style='display:none;'>";
			postbyCat('cpp');
			echo "</div>";

			echo "<div id='postbyJava' style='display:none;'>";
			postbyCat('java');
			echo "</div>";

			echo "<div id='postbyPy' style='display:none;'>";
			postbyCat('py');
			echo "</div>";

			echo "<div id='postbyPhp' style='display:none;'>";
			postbyCat('php');
			echo "</div>";

			echo "<div id='postbyAsm' style='display:none;'>";
			postbyCat('asm');
			echo "</div>";

			echo "</div>";
			echo "</div>";
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/FormModal.php");
			include($_SERVER['DOCUMENT_ROOT']."/Codearchive/footer.php");
		

	}
	?>


</body>
</html>