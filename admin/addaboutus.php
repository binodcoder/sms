<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class='container mt-3'>
		<?php require 'header.php';?>
		<?php require 'navigation.php';?>
		<div style="font-size:20px;" align="center">
			<form action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend><h3 style='color:black'><b>Please fill the following information</b></h3></legend>
					<table bgcolor="white" border="10" class="table table-striped table-bordered table-condensed">
						<tr>
							<td><input type='text' name='title' class='form-control' placeholder="Enter Title"></td>
						</tr>
						<tr>
							<td>
								<textarea type='textarea' name="description" class="form-control" style='height:200px;'>
								</textarea>
							</td>
						</tr>
						<tr>
							<td><input type="file" name="image" class="form-control"></td>
						</tr>
						<tr>
							<td><input type='submit' name='insertbtn' value='Save' class='btn btn-info'></td>
						</tr>
					</table>
				</fieldset>
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

			$insert_query="insert into aboutus(title, description, image)values('$title', '$description','$image_old_name')";
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
		<div class='row'>
			<div class='col-6'>
			</div>
		</div>
	</div>
</body>
</html>