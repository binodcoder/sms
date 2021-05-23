<?php
$con=mysqli_connect('localhost','root','','sms');

if($con==false){
echo "<script>alert('connection failed');</script>";
}else{
echo "";
}
?>