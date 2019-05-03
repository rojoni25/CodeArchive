<?php
if (isset($_POST['login'])||isset($_SESSION['caemail'])) {
    if (isset($_POST['login'])) {

        $E_mail = $_POST['email'];
        $Password = sha1($_POST['password']);
    } 
    elseif (isset($_SESSION['caemail'])) {


        $E_mail = $_SESSION['caemail'];
        $Password = $_SESSION['capassword'];
    }

    $sql = "select Email,Password from Users where Email='$E_mail' and Password='$Password'";
    $result = mysqli_query($con, $sql);
    if (!$var = mysqli_fetch_array($result)) {
        echo "No user found";
    } 
    else {
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
}
?>