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
	
	<script>
		
function chkit(){

var x = document.getElementById('pref_lang').value;
x= '.'+x;
document.getElementById('Upload').accept = x ;


}

	</script>


	<title>Post something new</title>
</head>
<body>
	<div class="col-xs-12 col-sm-12 col-md-12 container" style="margin-bottom: 10%;">
		<form role="form" action="http://localhost/codearchive/#file" method="post" enctype="multipart/form-data">
			<h2>Post here</h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<input type="text" name="code_name" id="code_name" class="form-control input-lg" placeholder="Name your code" tabindex="1" required="required">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<input type="text" name="descriptive_name" id="descriptive_name" class="form-control input-lg" placeholder="Sort descriptive name" tabindex="2" required="required">
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
      <input type="radio" name="optradio" onclick="document.getElementById('Upload').style.display='block';document.getElementById('Code_here').style.display='none';document.getElementById('Upload').required = true; document.getElementById('Code_here').required = false; document.getElementById('postbtn').name = 'postfile'; return chkit();" required="required">Upload file
    </label>
    Or
    <label class="radio-inline">
      <input type="radio" name="optradio" onclick="document.getElementById('Code_here').style.display='block';document.getElementById('Upload').style.display='none'; document.getElementById('Code_here').required = true; document.getElementById('Upload').required = false; document.getElementById('postbtn').name = 'posttxt';" required="required">Write here
    </label>

			</div>
			<div class="form-group">
				<input type="file" name="Upload" id="Upload" onchange="return chkit()" style="display: none; " />
				<textarea class="form-control" rows="20" name="Code_here" id="Code_here" style="display: none;" class="form-control input-lg" placeholder="Write your code here" tabindex="3" ></textarea>
			</div>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-10" style="margin: auto;"><input type="submit" name="postbtn" id="postbtn"  value="Submit Your Code" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
		</form>
	</div>

	<?php



function chkfile() {

	alert("chkfile has been executed");
			$name= $_FILES['Upload']['name'];
			$tmp_name= $_FILES['Upload']['tmp_name'];
			$position= strpos($name, "."); 
			$fileextension= substr($name, $position + 1);
			$fileextension= strtolower($fileextension);

			if ($fileextension !== $_POST['pref_lang']) {

				alert('file extension not allowed');
			}


		}

	?>

	
		

	
	
</body>
</html>