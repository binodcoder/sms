<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body bgcolor='#FFC300'>
	<div class='container mt-3'>
		<?php 
		require '../dbcon.php';
		$id = $_GET['id'];
		$select_query = "select * from notes where id = $id";
		$result =  $con->query ($select_query);
		$row = $result->fetch_assoc ();
		?>
		<div style="font-size:20px;" align="center">
			<form action='' method='post'>
				<fieldset>
					<legend><h1 style='color:black'><b>Modify Notes</b></h1></legend>
					<table bgcolor='white' class="table table-striped table-bordered table-condensed">
						<tr>
							<td>Subject</td>
							<td><input type='text' name='subject' value="<?php echo $row['title']; ?>" class='form-control'></td>
						</tr>
						<tr>
							<td>Class</td>
							<td><input type='text' name='class' value="<?php echo $row['class']; ?>" class='form-control'></td>
						</tr>
						<tr>
							<td>Note</td>
							<td><input type='file' name='note' value="<?php echo $row['note']; ?>" class='form-control'></td>
						</tr>
						<tr>
							<td><input type='submit' name='updatebtn' value='Modify' class='btn btn-info'></td>
						</tr>
					</table>
				</fieldset>
			</form>
		</div>
		<?php 
		if(isset($_POST['updatebtn']))
		{
			$subject=$_POST['subject'];
			$class=$_POST['class'];
			$note=$_POST['note'];
			require '../dbcon.php';
			$update_query="update notes set title='$subject', class='$class', note='$note' where id=$id ";
			if($con->query($update_query))
			{
				echo "<script>alert('data has been updated');</script>";
				echo "<script>window.location = '../teacherinfo.php'</script>";
			}
			else
			{
				$message=$con->error."has been occured";
				echo "<script>alert(\"$message\");</script>";
			}
		}
		?>
	</div>
	<script type="text/javascript" src='../js/bootstrap.css'></script>
</body>
</html>