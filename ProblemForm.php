<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://localhost/codearchive/js/jquery-3.3.1.min.js"></script>
	<script src="http://localhost/codearchive/js/popper.js"></script>
	<script src="http://localhost/codearchive/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://localhost/codearchive/bootstrap-4.0.0-dist/css/bootstrap.css" type = "text/css"/>
	<link rel="stylesheet" href="http://localhost/codearchive/css/extracss.css" type ="text/css"/>
	<script>		
function chkit(){

var x = document.getElementById('pref_lang').value;
x= '.'+x;
document.getElementById('Upload').accept = x ;

}

	</script>
</head>

<body>
<?php 
session_start();
include($_SESSION['cadirectory'] . "/allscripts.php");
include($_SESSION['cadirectory'] . "/apps/load_var.php");
 ?>
<div>
        <div class='fixed-top'>";
            <?php include($_SESSION['cadirectory'] . "/Views/Shared/HomeNavigation.php"); ?>
        </div>

        <div class='row'>
            <div class='col-sm-2'>
            </div>
            <div class='col-sm-9' style='margin-top:60px;'>
                <div>
				<div class="col-xs-12 col-sm-12 col-md-12 container" style="margin-bottom: 10%;">
				<?php if (isset($_SESSION['caemail'])){
                    ?>
		<form role="form" action="http://localhost/codearchive/Apps/PostProblem.php" method="post" enctype="multipart/form-data">
			<h2>Ask A question</h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<input type="text" name="Title" id="Title" class="form-control input-lg" placeholder="Ask your Question" tabindex="1" required="required">
					</div>
				</div>
				
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="3" name="detailed_description" id="detailed_description" class="form-control input-lg" placeholder="Give a detailed description about the problem" tabindex="3" required="required"></textarea>
			</div>
			<div class="form-group">
				<label for="pref_lang">Select prefered language:</label>
				<select class="form-control" name="pref_lang" id="pref_lang" onchange="return chkit()">
					<option value="c">C</option>
					<option value="cpp">C++</option>
					<option value="java">Java</option>
					<option value="Py">Python</option>
					<option value="php">PHP</option>
					<option value="asm">Assembly</option>
				</select>
			</div>
			<div class="radio">
				 <label class="radio-inline">
      <input type="radio" name="optradio" onclick="document.getElementById('Uploadp').style.display='block';document.getElementById('Code_herep').style.display='none';document.getElementById('Uploadp').required = true; document.getElementById('Code_herep').required = false; document.getElementById('postbtn').name = 'postpfile'; return chkit();" required="required">Upload file
    </label>
    Or
    <label class="radio-inline">
      <input type="radio" name="optradio" onclick="document.getElementById('Code_herep').style.display='block';document.getElementById('Uploadp').style.display='none'; document.getElementById('Code_herep').required = true; document.getElementById('Uploadp').required = false; document.getElementById('postbtn').name = 'postptxt';" required="required">Write here
    </label>

			</div>
			<div class="form-group">
				<input type="file" name="Uploadp" id="Uploadp" onchange="return chkit()" style="display: none; " />
				<textarea class="form-control" rows="20" name="Code_herep" id="Code_herep" style="display: none;" class="form-control input-lg" placeholder="Write your code here" tabindex="3" ></textarea>
			</div>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-10" style="margin: auto;"><input type="submit" name="postbtn" id="postbtn"  value="Submit Your Question" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
		</form>
		<?php
				}
				else{
                    ?>
					<div class='col-sm-9'  style='margin:25%;'>
					<h4>Please <a class = "btn btn-success" href="#" data-toggle="modal" data-target="#Login">Login</a> or <a class = "btn btn-success" href="#" data-toggle="modal" data-target="#Register">Register</a> to ask a question </h4>
					</div>

				<?php
				} 
				?>
	</div>
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