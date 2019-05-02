<?php  	
	if(isset($_POST['adminRegister']) && $_POST['password_confirmation']==$_POST['password']){
		$UserId=rand();
		$Fname=$_POST['first_name'];
		$Lname=$_POST['last_name'];
		$Dname=$_POST['Username'];
		$E_mail=$_POST['email'];
		$Role=$_POST['Role'];
		$Password=sha1($_POST['password']);
		$confirmPassword=$_POST['password_confirmation'];
		$Filepath="Uploads/".$Dname."/";
		date_default_timezone_set("Asia/Dhaka");
		$JoinDate= date("D M d, Y h:i:s A ");
echo $JoinDate;

		$con = mysqli_connect("localhost","root","");
		if(!$con)
		{
			echo "Localhost is not connected.<br>";
		}
		else
		{
			echo "Localhost is connected.<br>";
		}
		$dbSelect = mysqli_select_db($con,"codearchivebetadb");
		if(!$dbSelect)
		{
			echo "DB is not selected.<br>";
		}
		else
		{
			echo "DB is selected.<br>";
		}

		$stmt = $con->prepare("INSERT INTO users (UserId,UserName,FirstName,LastName,Email,Role,FileFolder,Password,JoinDate) VALUES (?, ?, ?, ?,?,?,?,?,?)");
		$stmt->bind_param("sssssssss",$UserId,$Dname, $Fname, $Lname, $E_mail,$Role,$Filepath,$Password,$JoinDate);
		if(!$stmt->execute())
		{
			echo "Invalid sign up.<br>";
		}
			else
		{
			$_SESSION['caemail']=$E_mail;
			$_SESSION['capassword']=$Password;

			//if(!mkdir($Filepath))
			//{header("location:../codearchive");}

			header("location:../codearchive");



		}
	}

       else
       {
        echo "

<div class='row '>
							<div class='col-xs-12 col-sm-8 col-md-6 container'>
								<form role='form' action='#' method='post'>
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
										<div class='col-xs-12 col-md-6'><input type='submit' name='adminRegister' value='adminRegister' class='btn btn-primary btn-block btn-lg' tabindex='7'></div>
										<div class='col-xs-12 col-md-6'><a href='#' data-dismiss='modal' data-toggle='modal' data-target='#Login' class='btn btn-success btn-block btn-lg'>Login</a></div>
									</div>
								</form>
							</div>
						</div>

                    </div>";

	    }
