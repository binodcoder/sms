<?php 
require '../dbcon.php';
$id=$_GET['id'];
$delete_query="delete from aboutus where id=$id";

if($con->query($delete_query))
{
	echo "<script>alert('Data has been removed');</script>";
	echo "<script>window.location='viewaboutus.php';</script>";
}else{
	$message=$con->error."has been occured";
	echo "<script> alert(\"$message\");</script>";
}
?>