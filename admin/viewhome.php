<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
	<div class='container' mt=3>
		<?php require 'header.php';?>
		<?php require 'navigation.php';?>
		<center>
			<table border="10" bgcolor="white" class="table table-striped table-bordered table-condensed">
				<tr>
					<th>SN</th>
					<th>Title</th>
					<th>Description</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
				<?php
				require '../dbcon.php';
				$select_query="select *from home order by id desc";
				$data=$con->query($select_query);
				$count=1;
				while($row=$data->fetch_assoc())
				{
					?>
					<tr>
						<td><?php echo $count++; ?></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td><?php echo $row['image']; ?></td>
						<td><a href="deletehome.php?id=<?php echo $row['id']?>" class="btn">remove</a>
							<a href="updatehome.php?id=<?php echo $row['id'] ?>&old_image=<?php echo $row['image'] ?>" class="btn">change</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</center>
		<?php require 'footer.php';?>
	</div>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
</body>
</html>