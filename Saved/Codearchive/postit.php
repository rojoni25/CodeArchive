<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

    if (isset($_POST['postbtn'])) {
        $User=$Dname;
        $CodeName=$_POST['code_name'];
        $DescriptiveName=$_POST['descriptive_name'];
        $DetailedDescription=$_POST['detailed_description'];
        $PrefLang=$_POST['pref_lang'];
        $CodeHere=$_POST['Code_here'];


        $con = mysqli_connect("localhost", "root", "");
        if (!$con) {
            echo "Localhost is not connected.<br>";
        } else {
            echo "Localhost is connected.<br>";
        }
        $dbSelect = mysqli_select_db($con, "codearchivedb");
        if (!$dbSelect) {
            echo "DB is not selected.<br>";
        } else {
            echo "DB is selected.<br>";
        }

        $stmt = $con->prepare("INSERT INTO PostTable (User,CodeName,DescriptiveName,Description,Language,Code) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $User, $CodeName, $DescriptiveName, $DetailedDescription, $PrefLang, $CodeHere);
        if (!$stmt->execute()) {
            echo "Invalid sign up.<br>";
        } else {
            {
                echo "Table is Created.<br>";			echo "Thank you for sign up.<br>";
                header("location:Home.php");

            

        }
        }
    }

	?>

</body>
</html>
