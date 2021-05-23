<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src=../js/bootstrap.js></script>
</head>
<body>
	<div class='container mt-3'> 
		<?php
		require 'header.php';
		?>
		<?php require 'navigation.php';?>
		<form action='' method='post'>
			<input type='text' name='phone' placeholder='Phone No' class='form-control'>
			<input type='submit' name='search' value='search' class='btn btn-info'>
		</form>
		<center>
			<table border="10" bgcolor="white" class="table table-striped table-bordered table-condensed">
				<tr>
					<th>SN</th>
					<th>Roll No</th>
					<th>Name</th>
					<th>City</th>
					<th>Parents Contact</th>
					<th>Standard</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
				<?php
				require '../dbcon.php';
				if(isset($_POST['search'])){
				$phone=$_POST['phone'];
				$select_query="select * from studentinfo where parentscontact='$phone' order by id desc";
				$data=$con->query($select_query);
				$count=1;
				while($row=$data->fetch_assoc())
				{
					?>
					<tr>
						<td><?php echo $count++; ?></td>
						<td><?php echo $row['rollno']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['city']; ?></td>
						<td><?php echo $row['parentscontact']; ?></td>
						<td><?php echo $row['standard']; ?></td>
						<td><?php echo $row['image']; ?></td>
						<td><a href="deletestudent.php?id=<?php echo $row['id']?>" class="btn">remove</a>
							<a href="updatestudent.php?id=<?php echo $row['id']?>" class="btn">change</a>
						</td>
					</tr>
				<?php }}?>
			</table>
		</center>
		<div>
			<?php require 'footer.php';?>

		</div>
	</body>
	</html>