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
		<div>
			<form id='form' action="" method="post" enctype="multipart/form-data">
				<input type='text' name='name' placeholder='Full Name' autofocus>
				<p>Full Name must be alphanumeric and contain 5-12 characters</p>
				<input type='text' name='address' placeholder='Address'>
				<p>Address must be alphanumeric and contain 5-25 characters</p>
				<input type='text' name='email' placeholder='Email'>
				<p>Email must be valid address, eg, me@mydomain.com</p>
				<input type='text' name='phone' placeholder='Phone Number'>
				<p>Phone Number must be valid Nepal phone number (10 digit)</p>
				<input type='text' name='faculty' placeholder='Faculty'>
				<p>Address must be alphanumeric and contain 5-25 characters</p>
				<input type='password' name='password' placeholder="Password">
				<p>Password must be alphanumeric (@,_ and -are also allowed) and be 8-20 characters</p>
				<input type="file" name="image" placeholder="Image"><br><br>
				<input type='submit' name='insertbtn' value='Add Teacher' class='btn btn-info'>
			</form>
		</div>
		<?php 
		if(isset($_POST['insertbtn']))
		{
			$name=$_POST['name'];
			$address=$_POST['address'];
			$phone=$_POST['phone'];
			$faculty=$_POST['faculty'];
			$password=$_POST['password'];
	 		#upload image steps
			$image_old_name = $_FILES['image']['name'];
			$image_temp_name = $_FILES['image']['tmp_name'];
			move_uploaded_file($image_temp_name, "img/$image_old_name");
			require '../dbcon.php';
			$insert_query="insert into teacherinfo(name, address, phone, faculty, password, image)values('$name', '$address','$phone','$faculty','$password','$image_old_name')";
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
		<?php require('footer.php');?>
	</div>
	<script type="text/javascript" src='../js/bootstrap.js'></script>
	<script type="text/javascript" src='../js/validation.js'></script>
</body>
</html>