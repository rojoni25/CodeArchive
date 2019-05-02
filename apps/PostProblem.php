<?php
session_start();
if (isset($_POST['postpfile'])) {
    $Email = $_SESSION['caemail'];
    $UserId = $_SESSION['userId'];
    $Title = $_POST['Title'];
    $DetailedDescription = $_POST['detailed_description'];
    $PrefLang = $_POST['pref_lang'];
    //$CodeHere=$_POST['Code_here'];
    date_default_timezone_set("Asia/Dhaka");
    $date = date("D M d, Y h:i:s A ");

    echo $date;

    $Filepath = $_SESSION['cadirectory']."/Uploads/PostProblem";
    $name = $_FILES['Uploadp']['name'];
    $tmp_name = $_FILES['Uploadp']['tmp_name'];
    $position = strpos($name, ".");
    $fileextension = substr($name, $position + 1);
    $fileextension = strtolower($fileextension);
    $problemId = rand();


    if (isset($name)) {

        $name = $problemId . "." . $fileextension;
        $Filename = $Filepath . "/" . $name;


        $path = $Filepath;

        if (!empty($name) && $fileextension == $PrefLang) {
            if (move_uploaded_file($tmp_name, $Filename)) {
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
                } else { {
                        echo "Table is Created.<br>";
                        echo "Thank you for sign up.<br>";
                        header("location:http://localhost/codearchive");
                    }
                }
            }
        } else {
            echo 'Invalid File. Please upload ' . $PrefLang . ' file.';
        }
    }
} elseif (isset($_POST['postptxt'])) {


    $Email = $_SESSION['caemail'];
    $UserId = $_SESSION['userId'];
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

        $Filepath = $_SESSION['cadirectory']."/Uploads/PostProblem";
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

    $stmt = $con->prepare("INSERT INTO ProblemTbl (ProblemId,UserId,Title,Description,Language,AttachmentCode,AttachmentFile,ProblemDate) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssssssss", $problemId, $UserId, $Title, $DetailedDescription, $PrefLang, $CodeHere, $Filename, $date);
    if (!$stmt->execute()) {
        echo "Invalid sign up.<br>";
    } else { {
            echo "Table is Created.<br>";
            echo "Thank you for sign up.<br>";
            header("location:http://localhost/codearchive");
        }
    }
}


unset($_POST['postpfile']);
unset($_POST['postptxt']);
