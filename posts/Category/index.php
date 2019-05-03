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

$con = mysqli_connect("localhost", "root", "");
$dbSelect = mysqli_select_db($con, "codearchivebetadb");





if (isset($_GET['cat'])) {
	$_SESSION['cat'] = $_GET['cat'];
	if (isset($_POST['login']) || isset($_SESSION['caemail'])) {
		if (isset($_POST['login'])) {

			$E_mail = $_POST['email'];
			$Password = sha1($_POST['password']);
		} elseif (isset($_SESSION['caemail'])) {


			$E_mail = $_SESSION['caemail'];
			$Password = $_SESSION['capassword'];
		}

		$sql = "select Email,Password from Users where Email='$E_mail' and Password='$Password'";
		$result = mysqli_query($con, $sql);
		if (!$var = mysqli_fetch_array($result)) {
			echo "No user found";
		} else {
			if (isset($_SESSION['id']))
				$_SESSION['id'] = $_SESSION['id'];
			$_SESSION['caemail'] = $E_mail;

			$_SESSION['capassword'] = $Password;
			setcookie("caEmail", $E_mail, time() + (86400 * 30), "/"); //86400 is 1 day
			setcookie("caPassword", $Password, time() + (86400 * 30), "/"); //86400 is 1 day
			$sql2 = "select * from Users where Email='$E_mail' and Password='$Password'";
			$result2 = mysqli_query($con, $sql2);
			$row = mysqli_fetch_assoc($result2);
			$Dname = $row['UserName'];
			$Fname = $row['FirstName'];
			$Lname = $row['LastName'];
			$Email = $row['Email'];
			$Filepath = $row['FileFolder'];
			$_SESSION['username'] = $Dname;
			$_SESSION['userId'] = $row['UserId'];
		}

		echo "<div class='row'>";
		echo "<div class='col-sm-2'>";
		//include($_SERVER['DOCUMENT_ROOT']."/Codearchive/leftsidebar.php");
		echo "</div>";
		echo "


			<div class='fixed-top'>";
		include($_SESSION['cadirectory']."/Views/Shared/HomeNavigation.php");
		echo "</div>";
		echo "<div class='col-sm-9' style='margin-top:60px;'>";

		postbyCat($_GET['cat']);

		echo "</div>";
		echo "</div>";

		include($_SESSION['cadirectory']."/footer.php");
		include($_SESSION['cadirectory']."/UserModal.php");
	} else {
		include($_SESSION['cadirectory']."/FormModal.php");

		echo "<div class='row'>";
		echo "<div class='col-sm-2'>";
		//include($_SERVER['DOCUMENT_ROOT']."/Codearchive/leftsidebar.php");
		echo "</div>";
		echo "


			<div class='fixed-top'>";
		include($_SESSION['cadirectory']."/Views/Shared/HomeNavigation.php");
		echo "</div>";
		echo "<div class='col-sm-9' style='margin-top:60px;'>";

		postbyCat($_GET['cat']);

		echo "</div>";
		echo "</div>";

		include($_SESSION['cadirectory']."/footer.php");
	}
}


?> 