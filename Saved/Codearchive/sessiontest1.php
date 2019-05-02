<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
session_start();
$counter=$_SESSION['stcounter'];
//$_SESSION['stname']="yoyo";

if (isset ($_POST['button']) && isset($_SESSION['stname'])) {
	
	echo "A button is pressed ";
	echo $_SESSION['stname']." ";
	$counter++;
	$_SESSION['stcounter']=$counter;
	echo $counter;

}

elseif (isset($_SESSION['stname'])) {
	echo "you are in a session";
}
elseif (isset ($_COOKIE['stname'])) {
	echo "you are in a cookie ";
	echo $_COOKIE['stname'];
	print_r($_COOKIE);
}

else{
	echo "Operation failed";
	print_r($_COOKIE);
}
?>

<form  action="#?nonsense=1" method="post"><button type="submit" name="button" value="buttom">button</button></form>
<form type="button" action="stout.php" method="post"><button type="submit" name="logout" value="logout">logout</button>

</body>
</html>