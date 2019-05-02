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
                    <?php recentProblem(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include($_SESSION['cadirectory'] . "/footer.php");
    include($_SESSION['cadirectory'] . "/FormModal.php");

    if (isset($_SESSION['id']) || isset($_POST['login'])||isset($_SESSION['caemail'])) {
        include($_SESSION['cadirectory'] . "/UserModal.php");
    }

    ?>
</body>
</html>