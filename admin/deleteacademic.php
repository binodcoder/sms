<?php 
require '../dbcon.php';
$id=$_GET['id'];
$delete_query="delete from academics where id=$id";
if($con->query($delete_query))
{
	echo "<script>alert('Data has been removed');</script>";
	echo "<script>window.location='viewacademics.php';</script>";
}else{
	$message=$con->error."has been occured";
	echo "<script> alert(\"$message\");</script>";
}
?>