<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	session_start();
if (isset ($_POST['logout'])){

if (isset($_SESSION['stname'])){
setcookie("stname","123", time() - (86400 * 30), "/");
	session_destroy();

	header('location: sessiontest1.php');
}
else{
header('location: sessiontest1.php');
setcookie("stname","125" , time() - (86400 * 30) , "/");
	header('location: sessiontest1.php');
}
}
	
?>

</body>
</html>