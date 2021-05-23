<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class='container mt=3'>
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

	 
	require '../dbcon.php';

	$insert_query="insert into notices(title, description)values('$title', '$description')";
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
</body>
</html>