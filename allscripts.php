<?php
$con = mysqli_connect("localhost","root","");
$dbSelect = mysqli_select_db($con, "codearchivebetadb");


function recentPost()
{

	global $con;
	global $dbSelect;
	$postcounter = 0;
	$sql = "SELECT * FROM `poststbl` ORDER BY DBPostDate DESC";
	$result = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($result)) {
		$sqluser = "SELECT * FROM `users` where UserId= ".$row['UserId'];
		$resultuser = mysqli_query($con, $sqluser);
		$rowuser = mysqli_fetch_assoc($resultuser);
		$count = count(explode("\n", $row['Code'])); 			if($count>15){ 				$count=15; 			}

		echo "
		

		<div class='col-sm-9 shadow-lg' style='margin-bottom:60px; padding:20px; background-color:#e1e6ef;'>
		<div class='row'>
		<div class='col-sm-0 text-center' >
		<img src='http://localhost/codearchive/faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='rounded-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-0 text-center'>
		<a href='http://localhost/codearchive/User/?userid=".$row['UserId']."'><h4><small>" . $rowuser['UserName'] . "</small></h4></a>
		</div>
		<div class='col-sm-6 text-vertical-center'><h5><small><span class='badge badge-pill badge-info'>" . $rowuser['Role'] . "</small></h5></span></div>
		</div>
		<a href='http://localhost/codearchive/posts/?postid=".$row['PostId']."'><h5> " . $row['Title'] . " </h5></a>
		<h6><span class='glyphicon glyphicon-time'></span> " . $row['PostDate'] . ".</h6>
		<h5><span class='badge badge-pill badge-success' style='margin-right:5px;'>" . $row['Language'] . "</span><span class='badge badge-pill badge-primary'>Post</span></h5><br>
		<p>" . $row['ShortDescription'] . "</p>
		<textarea class='form-control' name='post".$postcounter++."' rows='".$count."' disabled>" . $row['Code'] . "</textarea>
		<br><br>
		<p><span class='badge'>"; countComment($row['PostId']); echo"</span> Comments:</p><br>";
		viewComment($row['PostId']);

		echo "
		</div>
		";



	}
}		//recentPost()

function PostForm()
{

	if (isset($_SESSION['caemail'])) {
		include 'PostForm.php';
	} else {

		echo "
		<div class='col-sm-5' style='margin-bottom:60px'>
		<form role='form' action='Home.php' method='post'>
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

		";

	}
} //PostForm()


function PostProblem()
{


	if (isset($_POST['postpfile'])) {
		//$User=$Dname;
		$Email = $_SESSION['caemail'];
		$UserId = $_SESSION['userId'];
		$Title = $_POST['Title'];
		$DetailedDescription = $_POST['detailed_description'];
		$PrefLang = $_POST['pref_lang'];
		//$CodeHere=$_POST['Code_here'];
		date_default_timezone_set("Asia/Dhaka");
		$date = date("D M d, Y h:i:s A ");

		echo $date;

		$Filepath = "Uploads/PostProblem";
		$name = $_FILES['Upload']['name'];
		$tmp_name = $_FILES['Upload']['tmp_name'];
		$position = strpos($name, ".");
		$fileextension = substr($name, $position + 1);
		$fileextension = strtolower($fileextension);
		$problemId = rand();


		if (isset($name)) {

			$name = $problemId . "." . $fileextension;
			$Filename = $Filepath . "/" . $name;


			$path = $Filepath;

			if (!empty($name) && $fileextension == $PrefLang) {
				if (move_uploaded_file($tmp_name, $path . $name)) {
					echo 'Uploaded!';
					$nfile = fopen($Filename, "rb");
					$CodeHere = fread($nfile, filesize($Filename));
					fclose($nfile);
					$con = mysqli_connect("localhost", "root", "");
					if (!$con) {
						echo "Localhost is not connected.<br>";
					} else {
						echo "Localhost is connected.<br>";
					}
					$dbSelect = mysqli_select_db($con, "codearchivebetadb");
					if (!$dbSelect) {
						echo "DB is not selected.<br>";
					} else {
						echo "DB is selected.<br>";
					}

					$stmt = $con->prepare("INSERT INTO ProblemTbl (ProblemId,UserId,Title,Description,Language,AttachmentCode,AttachmentFile,ProblemDate) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
					$stmt->bind_param("ssssssss", $problemId, $UserId, $Title, $DetailedDescription, $PrefLang, $CodeHere, $Filename, $date);
					if (!$stmt->execute()) {
						echo "Invalid sign up.<br>";
					} else {
						{
							echo "Table is Created.<br>";
							echo "Thank you for sign up.<br>";
							header("location:..");
						}

					}

				}
			} else {
				echo 'Invalid File. Please upload ' . $PrefLang . ' file.';
			}
		}

	} elseif (isset($_POST['postptxt'])) {


		$Email = $_SESSION['caemail'];
		$Title = $_POST['Title'];
		$DetailedDescription = $_POST['detailed_description'];
		$PrefLang = $_POST['pref_lang'];
		if (isset($_POST['postptxt'])) {
			$CodeHere = $_POST['Code_herep'];
		}
		date_default_timezone_set("Asia/Dhaka");
		$date = date("D M d, Y h:i:s A ");
		$problemId = rand();
		echo $date;

		if (isset($_POST['postptxt'])) {

			$Filepath = "Uploads/PostProblem";
			$Filename = $Filepath . "/" . $problemId . "." . $PrefLang;

			if (isset($Filename)) {

				$nfile = fopen($Filename, "w");
				fwrite($nfile, $CodeHere);
				fclose($nfile);
			}
		}

		$con = mysqli_connect("localhost", "root", "");
		if (!$con) {
			echo "Localhost is not connected.<br>";
		} else {
			echo "Localhost is connected.<br>";
		}
		$dbSelect = mysqli_select_db($con, "codearchivebetadb");
		if (!$dbSelect) {
			echo "DB is not selected.<br>";
		} else {
			echo "DB is selected.<br>";
		}

		$stmt = $con->prepare("INSERT INTO ProblemTbl (ProblemId,Email,Title,Description,Language,Code,File,Date) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("ssssssss", $problemId, $Email, $Title, $DetailedDescription, $PrefLang, $CodeHere, $Filename, $date);
		if (!$stmt->execute()) {
			echo "Invalid sign up.<br>";
		} else {
			{
				echo "Table is Created.<br>";
				echo "Thank you for sign up.<br>";
				//header("location:Home.php");
			}

		}


	}


	unset($_POST['postpfile']);
	unset($_POST['postptxt']);





}	//PostProblem()

function postit()
{

	$E_mail = $_SESSION['caemail'];
	$Password = $_SESSION['capassword'];

	$con = mysqli_connect("localhost", "root", "");
	$dbSelect = mysqli_select_db($con, "codearchivebetadb");
	$sql2 = "select * from users where Email='$E_mail' and Password='$Password'";
	$result2 = mysqli_query($con, $sql2);
	$row = mysqli_fetch_assoc($result2);
	$UserId = $row['UserId'];
	$Dname = $row['UserName'];
	$Fname = $row['FirstName'];
	$Lname = $row['LastName'];
	$Email = $row['Email'];
	$Filepath = $row['FileFolder'];
	mysqli_close($con);

	if (isset($_POST['postfile'])) {
		$User = $Dname;
		$PostId = rand();
		$CodeName = $_POST['code_name'];
		$DescriptiveName = $_POST['descriptive_name'];
		$DetailedDescription = $_POST['detailed_description'];
		$PrefLang = $_POST['pref_lang'];
		//$CodeHere=$_POST['Code_here'];
		date_default_timezone_set("Asia/Dhaka");
		$date = date("D M d, Y h:i:s A ");

		echo $date;

		$name = $_FILES['Upload']['name'];
		$tmp_name = $_FILES['Upload']['tmp_name'];
		$position = strpos($name, ".");
		$fileextension = substr($name, $position + 1);
		$fileextension = strtolower($fileextension);


		if (isset($name)) {

			$name = rand() . "." . $fileextension;
			$Filename = $Filepath . "/" . $name;


			$path = $Filepath;

			if (!empty($name) && $fileextension == $PrefLang) {
				if (move_uploaded_file($tmp_name, $path . $name)) {
					echo 'Uploaded!';
					$nfile = fopen($Filename, "rb");
					$CodeHere = fread($nfile, filesize($Filename));
					fclose($nfile);
					$con = mysqli_connect("localhost", "root", "");
					if (!$con) {
						echo "Localhost is not connected.<br>";
					} else {
						echo "Localhost is connected.<br>";
					}
					$dbSelect = mysqli_select_db($con, "codearchivebetadb");
					if (!$dbSelect) {
						echo "DB is not selected.<br>";
					} else {
						echo "DB is selected.<br>";
					}

					$stmt = $con->prepare("INSERT INTO Poststbl(PostId,UserId,Title,ShortDescription,Description,Language,File,Code,PostDate) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");
					$stmt->bind_param("sssssssss", $PostId, $UserId, $CodeName, $DescriptiveName, $DetailedDescription, $PrefLang, $Filename, $CodeHere, $date);
					if (!$stmt->execute()) {
						echo "Invalid sign up.<br>";
					} else {
						{
							echo "Table is Created.<br>";
							echo "Thank you for sign up.<br>";
							header("location:Home.php");
						}

					}

				}
			} else {
				echo 'Invalid File. Please upload ' . $PrefLang . ' file.';
			}
		}





	} elseif (isset($_POST['posttxt'])) {


		$User = $Dname;
		$PostId = rand();
		$CodeName = $_POST['code_name'];
		$DescriptiveName = $_POST['descriptive_name'];
		$DetailedDescription = $_POST['detailed_description'];
		$PrefLang = $_POST['pref_lang'];
		$CodeHere = $_POST['Code_here'];

		date_default_timezone_set("Asia/Dhaka");
		$date = date("D M d, Y h:i:s a");

		$Filename = $Filepath . "/" . rand() . "." . $PrefLang;

		$nfile = fopen($Filename, "w");
		fwrite($nfile, $CodeHere);
		fclose($nfile);


		$con = mysqli_connect("localhost", "root", "");
		if (!$con) {
			echo "Localhost is not connected.<br>";
		} else {
			echo "Localhost is connected.<br>";
		}
		$dbSelect = mysqli_select_db($con, "codearchivebetadb");
		if (!$dbSelect) {
			echo "DB is not selected.<br>";
		} else {
			echo "DB is selected.<br>";
		}

		$stmt = $con->prepare("INSERT INTO Poststbl(PostId,UserId,Title,ShortDescription,Description,Language,File,Code,PostDate) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");
					$stmt->bind_param("sssssssss", $PostId, $UserId, $CodeName, $DescriptiveName, $DetailedDescription, $PrefLang, $Filename, $CodeHere, $date);
		if (!$stmt->execute()) {
			echo "Invalid sign up.<br>";
		} else {
			{
				echo "Table is Created.<br>";
				echo "Thank you for sign up.<br>";
				header("location:http://localhost/codearchive/");
			}

		}

	}
}//postit()


function recentProblem()
{


	global $con;
	global $dbSelect;
	$sql = "SELECT * FROM problemtbl ORDER BY Sl desc";
	$result = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($result)) {
		$sqluser = "SELECT * FROM `users` where UserId= ".$row['UserId'];
		$resultuser = mysqli_query($con, $sqluser);
		$rowuser = mysqli_fetch_assoc($resultuser);
		$count = count(explode("\n", $row['AttachmentCode']));

		echo "<div class='col-sm-9 shadow-lg' style='margin-bottom:60px; padding:20px; background-color:#e1e6ef;'>
		<div class='row'>
		<div class='col-sm-0 text-center'>
		<img src='http://localhost/codearchive/faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='rounded-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-0 text-center'>
		<a href='http://localhost/codearchive/User/?userid=".$row['UserId']."'><h4><small>" . $rowuser['UserName'] . "</small></h4></a>
		</div>
		</div>
		<h5><a href='http://localhost/codearchive/problems/?problemid=".$row['ProblemId']."'> " . $row['Title'] . "</a> </h5>
		<h6><span class='glyphicon glyphicon-time'></span>Problem Id: " . $row['ProblemId'] . ", Date: " . $row['ProblemDate'] . ".</h6>
		<h5><span class='badge badge-pill badge-success' style='margin-right:5px;'>" . $row['Language'] . "</span><span class='badge badge-pill badge-danger'>Question</span></h5><br>
		<textarea class='form-control' rows='flexible' disabled>" . $row['Description'] . "</textarea>
		
		<br><br>

		<h4>Leave a Comment:</h4>
		<form role='form'>
		<div class='form-group'>
		<textarea class='form-control' rows='3' required></textarea>
		</div>
		<button type='submit' class='btn btn-success'>Submit</button>
		</form>
		<br><br>

		<p><span class='badge'>2</span> Comments:</p><br>

		<div class='row'>
		<div class='col-sm-2 text-center'>
		<img src='faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='img-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-10'>
		<h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
		<p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		<br>
		</div>
		<div class='col-sm-2 text-center'>
		<img src='bird.jpg' class='img-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-10'>
		<h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
		<p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		<br>
		<p><span class='badge'>1</span> Comment:</p><br>
		<div class='row'>
		<div class='col-sm-2 text-center'>
		<img src='bird.jpg' class='img-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-xs-10'>
		<h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
		<p>Me too! WOW!</p>
		<br>
		</div>
		</div>
		</div>
		</div>
		</div>
		";



	}
}		//recentProblem()

function postbyCat($cats)
{

	global $con;
	global $dbSelect;
	$sql = "SELECT * FROM `poststbl` WHERE Language = '$cats' ORDER BY Sl DESC";
	$result = mysqli_query($con, $sql);

	if (!mysqli_fetch_assoc($result)) {

		echo "<div class='col-sm-9' style='text-align:center;'> <h3 style='color: blue;'>no uploads yet</h3></div>";
	} else {
		$result = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_array($result)) {

			$sqluser = "SELECT * FROM `users` where UserId= ".$row['UserId'];
		$resultuser = mysqli_query($con, $sqluser);
		$rowuser = mysqli_fetch_assoc($resultuser);
		$count = count(explode("\n", $row['Code'])); 			if($count>15){ 				$count=15; 			}

		
		echo "

		<div class='col-sm-9 shadow-lg' style='margin-bottom:60px; padding:20px; background-color:#e1e6ef;'>
		<div class='row'>
		<div class='col-sm-0 text-center' >
		<img src='http://localhost/codearchive/faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='rounded-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-0 text-center'>
		<a href='http://localhost/codearchive/User/?userid=".$row['UserId']."'><h4><small>" . $rowuser['UserName'] . "</small></h4></a>
		</div>
		<div class='col-sm-6 text-vertical-center'><h5><small><span class='badge badge-pill badge-info'>" . $rowuser['Role'] . "</small></h5></span></div>
		</div>
		<a href='http://localhost/codearchive/posts/?postid=".$row['PostId']."'><h5> " . $row['Title'] . " </h5></a>
		<h6><span class='glyphicon glyphicon-time'></span> " . $row['PostDate'] . ".</h6>
		<h5><span class='badge badge-pill badge-success' style='margin-right:5px;'>" . $row['Language'] . "</span><span class='badge badge-pill badge-primary'>Post</span></h5><br>
		<p>" . $row['ShortDescription'] . "</p>
		<textarea class='form-control' name='post' rows='".$count."' disabled>" . $row['Code'] . "</textarea>
		<br><br>
		<p><span class='badge'>"; countComment($row['PostId']); echo"</span> Comments:</p><br>";
		viewComment($row['PostId']);

		echo "
		</div>
		";



		}

	}
}

function searchpost($searchqry)
{
	//$searchqry = $_SESSION['casearch'];
	global $con;
	global $dbSelect;
	$sql = "SELECT * FROM `poststbl` WHERE Title LIKE '%$searchqry%' ORDER BY Title asc";
	$result = mysqli_query($con, $sql);

	if (!mysqli_fetch_assoc($result)) {

		echo "<div class='col-sm-9' style='text-align:center;'> <h3 style='color: blue;'>no uploads yet</h3></div>";
	} else {
		$result = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_array($result)) {
			$sqluser = "SELECT * FROM `users` where UserId= ".$row['UserId'];
			$resultuser = mysqli_query($con, $sqluser);
			$rowuser = mysqli_fetch_assoc($resultuser);
			$count = count(explode("\n", $row['Code']));
			if($count>15){
				$count=15;
			}
	
			
			echo "
	
			<div class='col-sm-9 shadow-lg' style='margin-bottom:60px; padding:20px; background-color:#e1e6ef;'>
		<div class='row'>
		<div class='col-sm-0 text-center' >
		<img src='http://localhost/codearchive/faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='rounded-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-0 text-center'>
		<a href='http://localhost/codearchive/User/?userid=".$row['UserId']."'><h4><small>" . $rowuser['UserName'] . "</small></h4></a>
		</div>
		<div class='col-sm-6 text-vertical-center'><h5><small><span class='badge badge-pill badge-info'>" . $rowuser['Role'] . "</small></h5></span></div>
		</div>
		<a href='http://localhost/codearchive/posts/?postid=".$row['PostId']."'><h5> " . $row['Title'] . " </h5></a>
		<h6><span class='glyphicon glyphicon-time'></span> " . $row['PostDate'] . ".</h6>
		<h5><span class='badge badge-pill badge-success'>" . $row['Language'] . "</span></h5><br>
		<p>" . $row['ShortDescription'] . "</p>
		<textarea class='form-control' name='post' rows='".$count."' disabled>" . $row['Code'] . "</textarea>
		<br><br>
		<p><span class='badge'>"; countComment($row['PostId']); echo"</span> Comments:</p><br>";
		viewComment($row['PostId']);

		echo "
		</div>
		";



		}

	}

}

function countbycat($cats)
{

	global $con;
	global $dbSelect;
	$countquery = "SELECT COUNT(*) FROM `poststbl` WHERE language='$cats'";
	$result = mysqli_query($con, $countquery);
	$row = mysqli_fetch_array($result);
	echo $row['COUNT(*)'];



}
function countComment($PostId)
{
	global $con;
	global $dbSelect;
	$countquery = "SELECT COUNT(*) FROM `commenttbl` WHERE PostId='$PostId'";
	$result = mysqli_query($con, $countquery);
	$row = mysqli_fetch_array($result);
	echo $row['COUNT(*)'];
}

function viewComment($postId)
{
	global $con;
	global $dbSelect;
	$postcounter = 0;
	$sqlcomment = "SELECT * FROM `commenttbl` where PostId = $postId ORDER BY Sl asc";
	$resultcomment = mysqli_query($con, $sqlcomment);

	while ($rowcmt = mysqli_fetch_array($resultcomment)) {
		$sqlusercmt = "SELECT * FROM `users` where UserId= ".$rowcmt['UserId'];
		$resultusercmt = mysqli_query($con, $sqlusercmt);
		$rowusercmt = mysqli_fetch_assoc($resultusercmt);
		
	echo "<div class='row' id='comments'>
	<div class='col-sm-2 text-center'>
	<img src='faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='img-circle' height='40' width='40' alt='Avatar'>
	</div>
	<div class='col-sm-10'>
	<p><b>".$rowusercmt['UserName']."</b> <small>".$rowcmt['CommentDate']."</small></p>
	<div class= 'container-fluid'><p>".$rowcmt['Comment']."</p></div>
	<br>
	
	
	</div>
	</div>
	";


	}
	
	
}

function catchComment(){

	header('location:jsallscripts.php');
}

function postComment()
	{
		$con = mysqli_connect("localhost", "root", "");
		$dbSelect = mysqli_select_db($con, "codearchivebetadb");



	}

?>