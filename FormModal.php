<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
echo "<div class='modal fade' id='Register' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='margin-top: 80px'>
			<div class='modal-dialog modal-lg'>
				<div class='modal-content'>
					<div class='modal-header'>
					<h4 class='modal-title' id='myModalLabel'>Registration Form</h4>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button>
					</div>
					<div class='modal-body'>
						<div class='row '>
							<div class='col-xs-12 col-sm-8 col-md-6 container'>
								<form role='form' action='Signup.php' method='post'>
									<h2>Sign Up to Code Archive</h2>
									<hr class='colorgraph'>
									<div class='row'>
										<div class='col-xs-12 col-sm-6 col-md-6'>
											<div class='form-group'>
												<input type='text' name='first_name' id='first_name' class='form-control input-lg' placeholder='First Name' tabindex='1' required='required'>
											</div>
										</div>
										<div class='col-xs-12 col-sm-6 col-md-6'>
											<div class='form-group'>
												<input type='text' name='last_name' id='last_name' class='form-control input-lg' placeholder='Last Name' tabindex='2' required='required'>
											</div>
										</div>
									</div>
									<div class='form-group'>
										<input type='text' name='Username' id='Username' class='form-control input-lg' placeholder='Username' tabindex='3' required='required' onchange=''>
									</div>
									<div class='form-group'>
										<input type='email' name='email' id='email' class='form-control input-lg' placeholder='Email Address' tabindex='4' required='required'>
									</div>
									<div class='form-group'>
										<label for='Role'>Role</label>
      									<select name='Role' id='Role' class='form-control' required ='required'>
        									<option value='Learner'>Learner</option>
        									<option value='Teaccher'>Teaccher</option>
        									<option value='Developer'>Developer</option>
        									<option value='Starter'>Starter</option>
     									 </select>
									</div>
									<div class='row'>
										<div class='col-xs-12 col-sm-6 col-md-6'>
											<div class='form-group'>
												<input type='password' name='password' id='password' class='form-control input-lg' placeholder='Password' tabindex='5' required='required'>
											</div>
										</div>
										<div class='col-xs-12 col-sm-6 col-md-6'>
											<div class='form-group'>
												<input type='password' name='password_confirmation' id='password_confirmation' class='form-control input-lg' placeholder='Confirm Password' tabindex='6' required='required' onchange=''>
											</div>
										</div>
									</div>


									<hr class='colorgraph'>
									<div class='row'>
										<div class='col-xs-12 col-md-6'><input type='submit' name='Register' value='Register' class='btn btn-primary btn-block btn-lg' tabindex='7'></div>
										<div class='col-xs-12 col-md-6'><a href='#' data-dismiss='modal' data-toggle='modal' data-target='#Login' class='btn btn-success btn-block btn-lg'>Login</a></div>
									</div>
								</form>
							</div>
						</div>

					</div>
					
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<div class='modal fade' id='Login' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='margin-top: 80px'>
			<div class='modal-dialog modal-lg'>
				<div class='modal-content'>
					<div class='modal-header'>
					<h4 class='modal-title' id='myModalLabel'>Login Form</h4>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button>
						
					</div>
					<div class='modal-body'>
						<div class='row '>
							<div class='col-xs-12 col-sm-8 col-md-6 container'>
								<form role='form' action='#' method='post'>
									<h2>Login to Code Archive</h2>
									<hr class='colorgraph'>
									<div class='form-group'>
										<input type='email' name='email' id='email' class='form-control input-lg' placeholder='Email Address' tabindex='4'>
									</div>
																				<div class='form-group'>
												<input type='password' name='password' id='password' class='form-control input-lg' placeholder='Password' tabindex='5'>
											</div>


									<hr class='colorgraph'>
									<div class='row'>
										<div class='col-xs-12 col-md-6'><a href='#' data-dismiss='modal' data-toggle='modal' data-target='#Register' class='btn btn-success btn-block btn-lg'>Register</a></div>
										<div class='col-xs-12 col-md-6'><input type='submit' name='login' value='Login' class='btn btn-primary btn-block btn-lg' tabindex='7'></div>
										
									</div>
								</form>
							</div>
						</div>

					</div>
					
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->";
	?>

</body>
</html>