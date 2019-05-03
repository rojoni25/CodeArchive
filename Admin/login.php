<?php  	
	if(isset($_POST['adminlogin'])){
	           	
        $_SESSION['caadminemail']=$_POST['email'];
		$_SESSION['caadminpassword']=sha1($_POST['password']);

		$E_mail=$_POST['email'];
		$Password=sha1($_POST['password']);
		$con = mysqli_connect("localhost","root","");
		$dbSelect = mysqli_select_db($con,"codearchivebetadb");
		$sql="select AdminEmail,AdminPassword,AdminId from admintbl where AdminEmail='$E_mail' and AdminPassword='$Password'";
		$result = mysqli_query($con,$sql);
		if(!$var = mysqli_fetch_array($result))
		{
			echo "No user found";
		}
		else
		{

           	if (isset($_SESSION['id']))
                   $_SESSION['id'] = $_SESSION['id'];
                   $_SESSION['caadmin']= $var['AdminEmail'];
           	header('location:http://localhost/codearchive/admin');

           }
           
       }

       else
       {
        echo "<div class='modal-body'>
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
                        <div class='col-xs-12 col-md-6'><input type='submit' name='adminlogin' value='Login' class='btn btn-primary btn-block btn-lg' tabindex='7'></div>
                        
                    </div>
                </form>
            </div>
        </div>

    </div>";
       }
	?>