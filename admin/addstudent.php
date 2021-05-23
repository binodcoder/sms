<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class='container mt-3'>
		<?php require 'header.php';?>
		<?php require 'navigation.php';?>
		<div>
			<form action="" method="post" enctype="multipart/form-data">
				<input type='number' min="1" max="100" name='rollno' required autofocus placeholder='Roll Number'>
				<input type='text' name='name' minlength="5" pattern="^\D*$" required placeholder='Full Name'>
				<input type='text' name='city' required minlength="3" pattern="^\D*$" placeholder="City">
				<input type='number' name='contact' required placeholder="Phone Number">
				<input type='number' min="1" name='standard' required placeholder="Standard">
				<input type='password' name='password' required minlength="8" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password">
				<input type="file" name="image" accept="image/*" required placeholder="Photo">
				<input type='submit' name='insertbtn' value='Add Students' class='btn btn-info'>
			</form>
		</div>
		<?php 
		require '../dbcon.php';
		if(isset($_POST['insertbtn']))
		{
			$rollno=$_POST['rollno'];
			$fullName=$_POST['name'];
			$city=$_POST['city'];
			$parentContact=$_POST['contact'];
			$standard=$_POST['standard'];
			$password=$_POST['password'];
			if (strlen($parentContact)<>9 and strlen($parentsContact)<>10 and $parentContact<0){
				echo "<script> 
				alert ('Invalid Contact number');
				window.location='addstudent.php';
				</script>";
			}
			$check_dublicate="select rollno, standard from studentinfo where rollno='$rollno' and standard='$standard'";
			$result=mysqli_query($con, $check_dublicate);
			$count=mysqli_num_rows($result);
			if($count>0){
				echo "<script> alert ('roll number already exist of same class');</script>";
				return false;
			}
			$check_dublicate_contact="select parentscontact from studentinfo where parentscontact='$parentContact'";
			$result=mysqli_query($con, $check_dublicate_contact);
			$count=mysqli_num_rows($result);
			if($count>0){
				echo "<script> alert ('phone number already exist');</script>";
				return false;
			}
		 #upload image steps
			$image_old_name = $_FILES['image']['name'];
			$image_temp_name = $_FILES['image']['tmp_name'];
			move_uploaded_file($image_temp_name, "img/$image_old_name");
			$insert_query="insert into studentinfo(rollno, name, city, parentscontact, standard, password, image)values('$rollno', '$fullName','$city','$parentContact','$standard','$password','$image_old_name')";
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
		<div>
			<?php require ('footer.php');?>
		</div>
		<script type="text/javascript" src='../js/bootstrap.js'></script>
		<script type="text/javascrpt" src='../js/validation.js'></script>
	</body>
	</html>