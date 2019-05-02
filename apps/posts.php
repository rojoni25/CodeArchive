<?php
$con = mysqli_connect("localhost", "root", "");
$dbSelect = mysqli_select_db($con, "codearchivebetadb");

function recentPost()
{

	global $con;
	global $dbSelect;
	$postcounter = 0;
	$sql = "SELECT * FROM `poststbl` ORDER BY PostDate DESC";
	$result = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($result)) {
		$sqluser = "SELECT * FROM `users` where UserId= ".$row['UserId'];
		$resultuser = mysqli_query($con, $sqluser);
		$rowuser = mysqli_fetch_assoc($resultuser);

		
		echo "

		<div class='col-sm-9' style='margin-bottom:60px;'>
		<div class='row'>
		<div class='col-sm-0 text-center'>
		<img src='faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='img-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-0 text-center'>
		<a href='http://localhost/codearchive/User/?userid=".$row['PostId']."'><h4><small>" . $rowuser['UserName'] . "</small></h4></a>
		</div>
		</div>
		<a href='http://localhost/codearchive/posts/?postid=".$row['PostId']."'><h3> " . $row['Title'] . " </h3></a>
		<h5><span class='glyphicon glyphicon-time'></span> " . $row['PostDate'] . ".</h5>
		<h5><span class='badge badge-pill badge-success'>" . $row['Language'] . "</span></h5><br>
		<p>" . $row['ShortDescription'] . "</p>
		<textarea class='form-control' name='post".$postcounter++."' rows='20' disabled>" . $row['Code'] . "</textarea>
		<br><br>
		<p><span class='badge'>"; countComment($row['PostId']); echo"</span> Comments:</p><br>";
		viewComment($row['PostId']);

		echo "<h4>Leave a Comment:</h4>
		<form role='form' id= 'commentform' method='post' >
		<div class='form-group'>
		<textarea class='form-control' name='txtcomment' id='txtcomment' rows='3' required ></textarea>
		</div>
		<input type='text' name='postid' id='postid' value='".$row['PostId']."' required hidden>
		
		<button type='submit' class='btn btn-success' name='commentbtn'  id= 'commentbtn' >Submit</button>
		</form>
		</div>
		";



	}
}		//recentPost()



function recentProblem()
{


	global $con;
	global $dbSelect;
	$sql = "SELECT * FROM `problemtable` ORDER BY ID DESC";
	$result = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($result)) {

		echo "<div class='col-sm-9' style='margin-bottom:60px'>
		<h4><small>RECENT POSTS</small></h4>
		<hr>
		<h2> " . $row['Title'] . " </h2>
		<h5><span class='glyphicon glyphicon-time'></span>Problem Id: " . $row['ProblemId'] . ", Date: " . $row['Date'] . ".</h5>
		<h5><span class='badge badge-pill badge-success'>" . $row['Language'] . "</span></h5><br>
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
	$sql = "SELECT * FROM `posttable` WHERE Language = '$cats' ORDER BY ID DESC";
	$result = mysqli_query($con, $sql);

	if (!mysqli_fetch_assoc($result)) {

		echo "<div class='col-sm-9' style='text-align:center;'> <h3 style='color: blue;'>no uploads yet</h3></div>";
	} else {
		$result = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_array($result)) {
            $sqluser = "SELECT * FROM `users` where UserId= ".$row['UserId'];
		    $resultuser = mysqli_query($con, $sqluser);
		    $rowuser = mysqli_fetch_assoc($resultuser);

			echo "

		<div class='col-sm-9' style='margin-bottom:60px;'>
		<div class='row'>
		<div class='col-sm-0 text-center'>
		<img src='faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='img-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-0 text-center'>
		<a href=><h4><small>" . $rowuser['UserName'] . "</small></h4></a>
		</div>
		</div>
		<button onclick='html.clear();'><h2> " . $row['Title'] . " </h2></button>
		<h5><span class='glyphicon glyphicon-time'></span> " . $row['PostDate'] . ".</h5>
		<h5><span class='badge badge-pill badge-success'>" . $row['Language'] . "</span></h5><br>
		<p>" . $row['ShortDescription'] . "</p>
		<textarea class='form-control' name='post".$postcounter++."' rows='20' disabled>" . $row['Code'] . "</textarea>
		<br><br>
		<p><span class='badge'>"; countComment($row['PostId']); echo"</span> Comments:</p><br>";
		viewComment($row['PostId']);

		echo "<h4>Leave a Comment:</h4>
		<form role='form' id= 'commentform' method='post' >
		<div class='form-group'>
		<textarea class='form-control' name='txtcomment' id='txtcomment' rows='3' required ></textarea>
		</div>
		<input type='text' name='postid' id='postid' value='".$row['PostId']."' required hidden>
		
		<button type='submit' class='btn btn-success' name='commentbtn'  id= 'commentbtn' >Submit</button>
		</form>
		</div>
		";



		}

	}
}       //postByCat()







?>