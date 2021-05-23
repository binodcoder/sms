<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body bgcolor='#FFC300'>
	<div class='container mt-3'>
	<?php 
require 'header.php';
require '../dbcon.php';
$id = $_GET['id'];

$select_query = "select * from teacherinfo where id = $id";
$result =  $con->query ($select_query);
$row = $result->fetch_assoc ();
?>
<?php require 'navigation.php';?>


	<div style="font-size:20px;" align="center">
		<form action='' method='post'>
			<fieldset>
				<legend><h1 style='color:black'><b>Update the following information</b></h1></legend>
				<table bgcolor='white' class="table table-striped table-bordered table-condensed">
					<tr>
						<td>Full Name</td>
						<td><input type='text' name='name' value="<?php echo $row['name']; ?>" class='form-control'></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type='text' name='address' value="<?php echo $row['address']; ?>" class='form-control'></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><input type='text' name='phone' value="<?php echo $row['phone']; ?>" class='form-control'></td>
					</tr>
					<tr>
						<td>Faculty</td>
						<td><input type='text' name='faculty' value="<?php echo $row['faculty']; ?>" class='form-control'></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type='password' name='password' value='<?php echo $row['password'];?>' class='form-control'></td>
					</tr>
					<tr>
						<td>Image</td>
						<td><input type='text' name='image' value="<?php echo $row['image']; ?>" class='form-control'></td>
					</tr>
					<tr>
						<td><input type='submit' name='updatebtn' value='Update Teacher' class='btn btn-info'></td>
					</tr>

				</table>
			</fieldset>
		</form>
	</div>
<?php 
if(isset($_POST['updatebtn']))
{

	$name=$_POST['name'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$faculty=$_POST['faculty'];
	$password=$_POST['password'];
	$image=$_POST['image'];

	require '../dbcon.php';

	$update_query="update teacherinfo set name='$name', address='$address', phone='$phone', faculty='$faculty', password='$password', image='$image' where id=$id ";

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
include('footer.php');
?>
</div>
</body>
</html>