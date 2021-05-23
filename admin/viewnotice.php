<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<div class='container mt-3'>
<?php require 'header.php';?>
<?php require 'navigation.php';?>
<center>
<table border="10" bgcolor="white" class="table table-striped table-bordered table-condensed">
	<tr>
		<th>SN</th>
		<th>Title</th>
		<th>Description</th>
			<th>Action</th>
	</tr>


<?php
require '../dbcon.php';
$select_query="select *from notices order by id desc";
$data=$con->query($select_query);
$count=1;
while($row=$data->fetch_assoc())
{
	?>
	<tr>
		<td><?php echo $count++; ?></td>
		<td><?php echo $row['title']; ?></td>
		<td><?php echo $row['description']; ?></td>
						<td><a href="deletenews.php?id=<?php echo $row['id']?>" class="btn">remove</a>
			<a href="updatenews.php?id=<?php echo $row['id']?>" class="btn">change</a>
		</td>
	</tr>
<?php } ?>
</table>
</center>

<?php require 'footer.php';?>
</div>
</body>
</html>