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
		
		$select_query = "select * from academics where id = $id";
		$result =  $con->query ($select_query);
		$row = $result->fetch_assoc ();
		?>
		<?php require 'navigation.php';?>
		<div style="font-size:20px;" align="center">
			<form 
			action='updateacademic.php?id=<?php echo $row['id']?>'
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
				require '../dbcon.php';
		$update_query="update academics set title='$title', description='$description' where id=$id ";
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