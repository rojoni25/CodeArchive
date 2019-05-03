<?php
//session_start();
$con = mysqli_connect("localhost","root","");
$dbSelect = mysqli_select_db($con, "codearchivebetadb");
$sqlcuser= "select COUNT(*) from Users";
$sqlccomment = "select COUNT(*) from commenttbl";
$sqlcproblem = "select COUNT(*) from problemtbl";
$sqlcpost = "select COUNT(*) from poststbl";
	$result = mysqli_query($con, $sqlcuser);
  $user = mysqli_fetch_array($result);
  $result = mysqli_query($con, $sqlccomment);
  $comment = mysqli_fetch_array($result);
  $result = mysqli_query($con, $sqlcpost);
  $post = mysqli_fetch_array($result);
  $result = mysqli_query($con, $sqlcproblem);
    $problem = mysqli_fetch_array($result);

?>