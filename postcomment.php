<?php
session_start();
extract($_POST);
$con = mysqli_connect("localhost", "root", "");
$dbSelect = mysqli_select_db($con, "codearchivebetadb");
if (isset($_POST['txtcomment'])){
$commentId = rand();
$userId = $_SESSION['userId'];
$txtComment = $_POST['txtcomment'];
$postId = $_POST['postid'];
date_default_timezone_set("Asia/Dhaka");
		$Date= date("D M d, Y h:i:s A ");

if(!$dbSelect)
		{
			echo "DB is not selected.<br>";
		}
		else
		{
			echo "DB is selected.<br>";
		}

		$stmt = $con->prepare("INSERT INTO commenttbl (CommentId,UserId,PostId,Comment,CommentDate) VALUES (?, ?, ?, ?,?)");
		$stmt->bind_param("sssss",$commentId,$userId,$postId,$txtComment,$Date);
		if(!$stmt->execute())
		{
			echo "Invalid Comment.<br>";
		}
			else
		{
			echo "Commented.<br>";

			//if(!mkdir($Filepath))
			//{header("location:../codearchive");}

			//header("location:../codearchive");



		}
    }
    else
    {
        echo "BAD!!! NO DATA SENT";
    }
   
	unset($_POST);
?>