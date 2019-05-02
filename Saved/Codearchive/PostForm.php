<!DOCTYPE html>
<html>
<head>
	<title>Submit a solution</title>
</head>
<body>
	<div class="col-xs-12 col-sm-6 col-md-10 container" style="margin-bottom: 10%;">
		<form role="form" action="#" method="post">
			<h2>Submit a solution</h2>
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
				<select class="form-control" name="pref_lang" id="pref_lang">
					<option value="C">C</option>
					<option value="CPP">C++</option>
					<option value="Java">Java</option>
					<option value="Python">Python</option>
					<option value="PHP">PHP</option>
					<option value="Assembly">Assembly</option>
				</select>
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="20" name="Code_here" id="Code_here" class="form-control input-lg" placeholder="Write your code here" tabindex="3" required="required"></textarea>
			</div>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-10" style="margin: auto;"><input type="submit" name="postbtn" id="postbtn" value="Submit Your Code" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
		</form>
	</div>

	<?php

	if(isset($_POST['postbtn'])){
		$User=$Dname;
		$CodeName=$_POST['code_name'];
		$DescriptiveName=$_POST['descriptive_name'];
		$DetailedDescription=$_POST['detailed_description'];
		$PrefLang=$_POST['pref_lang'];
		$CodeHere=$_POST['Code_here'];


		$con = mysqli_connect("localhost","root","");
		if(!$con)
		{
			echo "Localhost is not connected.<br>";
		}
		else
		{
			echo "Localhost is connected.<br>";
		}
		$dbSelect = mysqli_select_db($con,"codearchivedb");
		if(!$dbSelect)
		{
			echo "DB is not selected.<br>";
		}
		else
		{
			echo "DB is selected.<br>";
		}

		$stmt = $con->prepare("INSERT INTO PostTable (User,CodeName,DescriptiveName,Description,Language,Code) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $User,$CodeName,$DescriptiveName,$DetailedDescription,$PrefLang,$CodeHere);
		if(!$stmt->execute())
		{
			echo "Invalid sign up.<br>";
		}
		else
		{
			{
				echo "Table is Created.<br>";			echo "Thank you for sign up.<br>";
				header("location:Home2.php");
					}

			

		}
	}


	?>
	
</body>
</html>