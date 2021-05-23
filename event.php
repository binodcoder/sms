<!doctype html>
<html lang='en'>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body class='home'>
	<div class='container mt-3'>
		<div class='pb-3'>
			<?php require 'navigation.php'?>
		</div>
		<?php
		require 'dbcon.php';
		$select_query="select title, description, image from events order by id desc limit 0,1";
		$result=$con->query($select_query);
		$row=$result->fetch_assoc();
		?>
		<div class="row">
			<div class='col-12 home rounded-box'>
				<h1><?php echo $row['title'];?></h1>
				<hr>
				<div class='row'>
					<div class='col-9'>
						<p align='justify'><?php echo $row['description'];?></p>
					</div>
					<div class='col-3'>
						<img src='admin/img/<?php echo $row['image'];?>' height='200' width='180' align='right'> 
					</div>
				</div>
			</div>
		</div>
		<div>
			<?php require 'footer.php' ?>
		</div>
	</body>
	</html>