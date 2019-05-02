<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	echo "<div class='modal fade' id='User' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='margin-top: 80px'>
			<div class='modal-dialog modal-lg'>
				<div class='modal-content'>
					<div class='modal-header'>
					<h4 class='modal-title' id='myModalLabel'>$Dname</h4>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button>
						
					</div>
					<div class='modal-body'>
						<div class='row '>
							<div class='col-xs-12 col-sm-8 col-md-6 container'>
								<form role='form' action='http://localhost/codearchive/logout.php' method='post'>
									<h2>Logout</h2>
									<hr class='colorgraph'>
									<h4><b>Name: $Fname $Lname</b></h4>
									<h4><b>User Name: $Dname</b></h4>
									<h4><b>Email: $Email</b></h4>

									<hr class='colorgraph'>
									<div class='row'>
										<div class='col-xs-12 col-md-6'><input type='submit' name='Logout' value='Logout' class='btn btn-primary btn-block btn-lg' tabindex='7'></div>
								</form>
							</div>
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->"

	?>

</body>
</html>