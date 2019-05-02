<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="#file" method='post' enctype="multipart/form-data">
Description of File: <input type="text" name="description_entered"/><br><br>
<input type="file" name="Code"/><br><br>
	
<input type="submit" name="submit" value="Upload"/>

</form>

<?php 

$name= $_FILES['Code']['name'];

$tmp_name= $_FILES['Code']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];
mkdir("Uploads/file/");

if (isset($name)) {

$path= 'Uploads/file/';

if (!empty($name)){
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';

}
}
}
?>


</body>
</html>