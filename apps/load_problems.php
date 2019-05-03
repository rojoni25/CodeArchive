<?php
//session_start();
include($_SESSION['cadirectory'] . "/allscripts.php");
include($_SESSION['cadirectory'] . "/apps/load_var.php");
?>

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


    <title>Code Archive</title>
</head>

<body>
    <div>
        <div class='fixed-top'>";
            <?php include($_SESSION['cadirectory'] . "/Views/Shared/HomeNavigation.php"); ?>
        </div>

        <div class='row'>
            <div class='col-sm-2'>
            </div>
            <div class='col-sm-9' style='margin-top:60px;'>
                <div>

                    <?php if (isset($_GET['problemid'])) {

                        selectedProblem($_GET['problemid']);
                    }
                    else{
                        recentProblem();
                    }
                     ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include($_SESSION['cadirectory'] . "/footer.php");
    include($_SESSION['cadirectory'] . "/FormModal.php");

    if (isset($_SESSION['id']) || isset($_POST['login']) || isset($_SESSION['caemail'])) {
        include($_SESSION['cadirectory'] . "/UserModal.php");
    }

    ?>
</body>

</html>

<?php
function selectedProblem($problemid){
    global $con;
	global $dbSelect;
	$sql = "SELECT * FROM problemtbl where ProblemId = $problemid  ORDER BY Sl desc";
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
}
?>