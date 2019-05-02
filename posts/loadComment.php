   
    <?php
    session_start();

    $con = mysqli_connect("localhost", "root", "");
    $dbSelect = mysqli_select_db($con, "codearchivebetadb");
    $postcounter = 0;
    $postId = $_SESSION['postid'];
    $sqlcomment = "SELECT * FROM `commenttbl` where PostId = $postId ORDER BY Sl asc";
    $resultcomment = mysqli_query($con, $sqlcomment);
    echo "<p><span class='badge'>";
		countComment($postId);
		echo "</span> Comments:</p>";

    while ($rowcmt = mysqli_fetch_array($resultcomment)) {
        $sqlusercmt = "SELECT * FROM `users` where UserId= " . $rowcmt['UserId'];
        $resultusercmt = mysqli_query($con, $sqlusercmt);
        $rowusercmt = mysqli_fetch_assoc($resultusercmt);

        echo "
        <div class='row' id='comments'>
	<div class='col-sm-2 text-center'>
	<img src='http://localhost/codearchive/faceless-businessman-avatar-man-suit-blue-tie-human-profile-userpic-face-features-web-picture-gentlemen-85824471.jpg' class='img-circle' height='40' width='40' alt='Avatar'>
	</div>
	<div class='col-sm-10'>
	<p><b>" . $rowusercmt['UserName'] . " </b><small>" . $rowcmt['CommentDate'] . "</small></p>
	<div class= 'container' style='word-wrap:break-word; white-space: pre-line;'><p>" . $rowcmt['Comment'] . "</p></div>
	<br>
		
	</div>
	</div>
	
	
	";
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
    ?> 