<!doctype html> 
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="javascript" type="script" href="../css/bootstrap.js">
</head>
<body>
	<?php
	session_start();
	$userprofile=$_SESSION['user_name'];
	if($userprofile==true){

	}else{
		header('location:login.php');
	}
	?>
	<div class='container mt-3'>
		<?php require'header.php';?>
		<?php require 'navigation.php';?>
		<?php require 'footer.php';?>
	</div>
</body>
</html>




