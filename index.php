<!doctype html>
<html lang='en'>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body class='home'>
	<?php
	require 'dbcon.php';
	$select_query="select title, description, image from home order by id desc limit 0,1";
	$result=$con->query($select_query);
	$row=$result->fetch_assoc();
	?>
	<div class='container mt-3'>
		<div class='row'>
			<div class='col-sm-12 pb-3'>
				<?php require 'navigation.php'?>
			</div>
		</div>
		<div class='row'>
			<div style='background-color:#ffffcc' class='col-sm-3 rounded-box'>
				<?php require 'header.php';?>
				<img style='border-radius:50%' src='admin/img/<?php echo $row['image'];?>' height='275' width='255'>
				
			</div>
			
			<div class='col-sm-9 home rounded-box'>
				<h1 class='container' style='color:#000066;'><?php echo $row['title'];?></h1>
				<hr>
				<p align='justify' class='container'><?php echo $row['description'];?></p>
			</div>
		</div>
		<div>
			<?php require 'footer.php' ?>
		</div>
	</div>
</body>
</html>