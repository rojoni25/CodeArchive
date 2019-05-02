<!DOCTYPE html>
<html>
<head>
	<title>Navigation.php</title>
</head>
<body>
<?php 
echo"
<!--Navigation Bar-->
	<nav class='navbar navbar-expand-md bg-dark navbar-dark fixed-top'>
		<a class='navbar-brand' style='color: orange;' href='#'>Code Archive</a>
		<!--<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#collapsibleNavbar'>
			<span class='navbar-toggler-icon'></span>
		</button>-->

		<!-- Navbar links -->
		<div class='col-sm-4'>
			<ul class='navbar-nav'>
				<li class='nav-item'>
					<a class='linkcolor' href='#'>C</a>
				</li>
				<li class='nav-item'>
					<a class='linkcolor' href='#'>C++</a>
				</li>
				<li class='nav-item'>
					<a class='linkcolor' href='#'>Java</a>
				</li>
				<li class='nav-item'>
					<a class='linkcolor' href='#'>Python</a>
				</li>
				<li class='nav-item'>
					<a class='linkcolor' href='#'>PHP</a>
				</li>
				<li class='nav-item'>
					<a class='linkcolor' href='#'>Assembly</a>
				</li>
			</ul>
		</div>
		<div class='col-sm-4' >
		<form class='navbar-form form-inline' action='#'>
			<input class='form-control mr-sm-2 col-sm-8' type='text' placeholder='Search'>
			<button class='btn btn-success' type='submit' >Search</button>
		</form>
	</div>
	<div class='col-sm-2'>
		<ul class='nav navbar-nav'>
			<li class='nav-item'>
				<a class='linkcolor' href='#' data-toggle='modal' data-target='#User'>$Dname</a>
			</li>
			
			</ul>
			</div>
		</nav>
		<!--Navigation Bar end-->";
?>
</body>
</html>