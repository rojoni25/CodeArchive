<html>
	<body>
		<?php
			
			session_start();
			$con = mysqli_connect("localhost","root","");
			mysqli_close($con);
			setcookie("camail","",time() - (86400 * 30), "/"); //86400 is 1 day
			setcookie("capassword","",time() -(86400 * 30), "/"); //86400 is 1 day
			session_destroy(); //session is destroyed here
			
			header('location:http://localhost/codearchive/');
			
		
		?>
	</body>
</html>