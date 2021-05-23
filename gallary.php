<!doctype html>
<html lang='en'>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body class='home'>
	<div class='container mt-3'>
		<div class='pb-4'>
			<?php require 'navigation.php'?>
		</div>
		<div class="row">
			<?php
			require 'dbcon.php';
			$select_query="select title, image from gallary order by id desc";
			$result=$con->query($select_query);
			while($row=$result->fetch_assoc()){
				?>

				<div class="col-sm-3 home rounded-box pb-3 pr-4">
					<h1><?php echo $row['title'];?></h1>
					<hr>
					<img src='admin/img/<?php echo $row['image'];?>' height='220' width='200' align='right'> 

				</div>
			<?php }?>
		</div>
		<div>
			<?php require 'footer.php' ?>
		</div>
	</body>
	</html>
