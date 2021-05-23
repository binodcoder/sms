<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
	<div class='container mt-3'>
	<?php require 'header.php';?>
<?php require 'navigation.php';?>
	<div style="font-size:20px;" align="center">
		<form action="" method="post" enctype="multipart/form-data">
						<input type='text' name='title' placeholder="Enter Title">
							<textarea type='textarea' name="description" style='height:200px;'>
							</textarea>
											<input type="file" name="image">
					<input type='submit' name='insertbtn' value='Save' class='btn btn-info'>
					</form>
	</div>
<?php 
if(isset($_POST['insertbtn']))
{
	$title=$_POST['title'];
	$description=$_POST['description'];

	 #upload image steps
	$image_old_name = $_FILES['image']['name'];
	$image_temp_name = $_FILES['image']['tmp_name'];
	move_uploaded_file($image_temp_name, "img/$image_old_name");
	require '../dbcon.php';

	$insert_query="insert into home(title, description, image)values('$title', '$description','$image_old_name')";
	if($con->query($insert_query))
	{
		echo "<script>alert('New data has been added');</script>";
	}
	else
	{
		$message=$con->error."has been occured";
		echo "<script>alert(\"$message\");</script>";
	}
}

?>
<?php include('footer.php');?>
</div>
<script type="text/javascript" src=../js/bootstrap.js></script>
</body>
</html>