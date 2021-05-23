<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body bgcolor='#FFC300'>
	<div class='container mt-3'>
		<?php 
		require 'header.php';
		require '../dbcon.php';
		$id = $_GET['id'];
		$image = $_GET['old_image'];
		$select_query = "select * from events where id = $id";
		$result =  $con->query ($select_query);
		$row = $result->fetch_assoc ();
		?>
		<?php require 'navigation.php';?>
		<div style="font-size:20px;" align="center">
			<form 
			action='updateevent.php?id=<?php echo $row['id']?>&old_image=<?php echo $row['image'] ?>'
			method='post'
			enctype='multipart/form-data'
			>
			<fieldset>
				<legend><h1 style='color:black'><b>Update the following information</b></h1></legend>
				<table bgcolor='white' class="table table-striped table-bordered table-condensed">
					<tr>
						<td><input type='text' name='title' value="<?php echo $row['title']; ?>" class='form-control'></td>
					</tr>
					<tr>
						<td>
							<textarea type='textarea' name='description'  class="form-control" style='height:200px;'>
								<?php echo $row['description'];?>
							</textarea>
						</td>
					</tr>
					<tr>
						<td>
							<img src="img/<?php echo $row['image'] ?>" style="height: 100px;width:150px;">
							<br>
							<input type="file" name="image" class="form-control">
						</td>
					</tr>
					<tr>
						<td><input type='submit' name='updatebtn' value='Save' class='btn btn-info'></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
	<?php 
	if(isset($_POST['updatebtn']))
	{
		$title=$_POST['title'];
		$description=$_POST['description'];
		$old_image_name =  $_GET['old_image'];
		$new_image_name = $_FILES['image']['name'];
		# if user wamt to upload new image keep new and remove old image 
		if (!empty($new_image_name))
		{
			$image_temp_name = $_FILES['image']['tmp_name'];
			move_uploaded_file($image_temp_name, "img/$new_image_name");
			if (file_exists("img/$old_image_name"))
			{
				unlink("img/$old_image_name");
			}
			$image= $new_image_name;
		}
			# if user doesnot choose new image mean he want old image as it is before
		else
		{
			$image = $old_image_name;
		}
		require '../dbcon.php';
		$update_query="update events set title='$title', description='$description', image='$image' where id=$id ";
		if($con->query($update_query))
		{
			echo "<script>alert('data has been updated');</script>";
			echo "<script>window.location = 'admindash.php'</script>";
		}
		else
		{
			$message=$con->error."has been occured";
			echo "<script>alert(\"$message\");</script>";
		}
	}
	?>
	<?php 
	require 'footer.php';?>
</div>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</body>
</html>