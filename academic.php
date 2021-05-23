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
		$select_query="select title, description from academics order by id desc limit 0,1";
		$result=$con->query($select_query);
		$row=$result->fetch_assoc();
		?>
		<div class="row">
			<div class="col-sm-12 home rounded-box">
				<h1><?php echo $row['title'];?></h1>
				<hr>
				<p align='justify'><?php echo $row['description'];?></p>
			</div>
		</div>





		<?php require 'footer.php' ?>
	</div>
</body>
</html>