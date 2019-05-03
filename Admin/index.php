<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../bootstrap-4.0.0-dist/css/bootstrap.css" type = "text/css"/>
	<link rel="stylesheet" href="../css/extracss.css" type ="text/css"/>



	
	<title>Code Archive</title>
</head>
<body>

	<?php

	session_start();
	$_SESSION['cadirectory']=__DIR__."/../";
	echo "<div class='row'>";
		echo "<div class='col-sm-2'>";
		//include($_SERVER['DOCUMENT_ROOT']."/Codearchive/leftsidebar.php");
		echo "</div>";
		echo "
			<div class='fixed-top'>";
		include($_SESSION['cadirectory']."/Admin/HomeNavigation.php");
		echo "</div>";
		echo "<div class='col-sm-9' style='margin-top:80px;'>";
		if(isset($_SESSION['caadmin']))
	{
		include($_SESSION['cadirectory']."/Admin/Dashboard.php");
	}

	else
	{
		include("login.php");
	}


		echo "</div>";
		echo "</div>";
		include($_SESSION['cadirectory']."/footer.php");


	
	
?>


</body>
</html>