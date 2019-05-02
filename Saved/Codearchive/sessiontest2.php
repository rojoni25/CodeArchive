<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
session_start();
$_SESSION['stname']="yoyo";
$_SESSION['stcounter']=0;
setcookie("stname", $_SESSION['stname'], time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<form action="sessiontest1.php" method="post"><input type="submit" name="st1" value="st1"></form>

</body>
</html>