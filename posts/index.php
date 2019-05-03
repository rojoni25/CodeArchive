<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://localhost/codearchive/js/jquery-3.3.1.min.js"></script>
    <script src="http://localhost/codearchive/js/popper.js"></script>

    <script src="http://localhost/codearchive/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://localhost/codearchive/bootstrap-4.0.0-dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="http://localhost/codearchive/css/extracss.css" type="text/css" />

    <script type="text/javascript">
        function submitdata() {
            var txtcomment = document.getElementById('txtcomment').value;
            var postid = document.getElementById('postid').value;
            var commentbtn = document.getElementById('commentbtn').value;

            $.ajax({
                type: 'post',
                url: 'http://localhost/codearchive/postcomment.php',
                data: {
                    txtcomment: txtcomment,
                    postid: postid,
                    commentbtn: commentbtn
                },
                success: function(response) {
                    //('#loadcomment').html("");
                    //alert("Comment is Submitted");
					$("#loadcomment").load("loadComment.php");
					document.getElementById('txtcomment').value = "";                   

                }
            });

            return false;
		}
		
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            function load() {


                $.ajax({ //create an ajax request to load_page.php
                    type: "GET",
                    url: "loadComment.php",
                    dataType: "html", //expect html to be returned                
                    success: function(response) {
						
                        $("#loadcomment").html(response);
                        setTimeout(load, 5000);
                    }
                });
            }

            load(); 
        });
    </script>


    <title>Code Archive</title>
</head>






<?php 
session_start();
include($_SESSION['cadirectory']."/allscripts.php");
include($_SESSION['cadirectory']."/apps/load_var.php");

$con = mysqli_connect("localhost", "root", "");
$dbSelect = mysqli_select_db($con, "codearchivebetadb");





		echo "<div class='row'>";
		echo "<div class='col-sm-2'>";
		//include($_SERVER['DOCUMENT_ROOT']."/Codearchive/leftsidebar.php");
		echo "</div>";
		echo "
			<div class='fixed-top'>";
		include($_SESSION['cadirectory']."/Views/Shared/HomeNavigation.php");
		echo "</div>";
		echo "<div class='col-sm-9' style='margin-top:60px;'>";
		if (isset($_GET['postid'])) {
			$_SESSION['postid'] = $_GET['postid'];
		selectedPost($_GET['postid']);
		}
		else if (isset($_GET['newpost'])){
			if(isset($_POST['login'])||isset($_SESSION['caemail'])){
				include($_SESSION['cadirectory']."/apps/newpost.php");	 
			}
			else{
				echo "<div class='col-sm-9'  style='margin:25%;'>
				<h4>Please <a class = 'btn btn-success' href='#' data-toggle='modal' data-target='#Login'>Login</a> or <a class = 'btn btn-success' href='#' data-toggle='modal' data-target='#Register'>Register</a> to ask a question </h4>
				</div>";
			}
		}

		else{
			recentPost();

		}


		echo "</div>";
		echo "</div>";
		include($_SESSION['cadirectory']."/footer.php");
		if(isset($_POST['login'])||isset($_SESSION['caemail'])){
			include($_SESSION['cadirectory']."/UserModal.php");	 
		}
		else{
			include($_SESSION['cadirectory']."/FormModal.php");
		}
		

function selectedPost($postid)
{

	global $con;
	global $dbSelect;
	$postcounter = 0;
	$sql = "SELECT * FROM `poststbl` where PostId = $postid ";
	$result = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($result)) {
		$sqluser = "SELECT * FROM `users` where UserId= " . $row['UserId'];
		$resultuser = mysqli_query($con, $sqluser);
		$rowuser = mysqli_fetch_assoc($resultuser);
		$count = count(explode("\n", $row['Code']));


		echo "

		<div class='col-sm-9 shadow-lg' style='margin-bottom:60px; padding:20px; background-color:#e1e6ef;'>
		<div class='row'>
		<div class='col-sm-0 text-center' style='padding-right:5px;'>
		<img src='http://localhost/codearchive/faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='rounded-circle' height='40' width='40' alt='Avatar'>
		</div>
		<div class='col-sm-0 text-center'>
		<a href='http://localhost/codearchive/User/?userid=".$row['UserId']."'><h4><small>" . $rowuser['UserName'] . "</small></h4></a>
		</div>
		<div class='col-sm-6 text-vertical-center'><span class='badge badge-pill badge-info'>" . $rowuser['Role'] . "</span></div>
		</div>
		<a href='http://localhost/codearchive/posts/?postid=".$row['PostId']."'><h5> " . $row['Title'] . " </h5></a>
		<h6><span class='glyphicon glyphicon-time'></span> " . $row['PostDate'] . ".</h6>
		<h5><span class='badge badge-pill badge-success'>" . $row['Language'] . "</span></h5><br>
		<p>" . $row['ShortDescription'] . "</p>
		<textarea class='form-control' name='post".$postcounter++."' rows='".$count."' disabled>" . $row['Code'] . "</textarea>
		<br><br>
		<p><span class='badge'>"; countComment($row['PostId']); echo"</span> Comments:</p><br>";
		viewComment($row['PostId']);


		echo "<h4 id='smit'>Leave a Comment:</h4>
		<form role='form' id= 'commentform' method='post' onsubmit='return submitdata();' >
		<div class='form-group'>
		<textarea class='form-control' name='txtcomment' id='txtcomment' rows='3' required ></textarea>
		</div>
		<input type='text' name='postid' id='postid' value='" . $row['PostId'] . "' required hidden>
		
		<button type='submit' class='btn btn-success' name='commentbtn'  id= 'commentbtn' >Submit</button>
		</form>
		</div>
		";
	}
}

/*function countComment($PostId)
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
	<h4>".$rowusercmt['UserName']." <small>".$rowcmt['CommentDate']."</small></h4>
	<p>".$rowcmt['Comment']."</p>
	<br>
	<p><span class='badge'>1</span> Comment:</p><br>
	<div class='row'>
	<div class='col-sm-2 text-center'>
	<img src='faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='img-circle' height='40' width='40' alt='Avatar'>
	</div>
	<div class='col-xs-10'>
	<h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
	<p>Me too! WOW!</p>
	<br>
	
	</div>
	</div>
	
	</div>
	</div>
	";


	}
	
	
}*/

?> 