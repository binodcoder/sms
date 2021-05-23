<?php
// Start the session
session_start();
/*if(isset($_SESSION[1])){
	header('location:studentinfo.php');
}*/
?>
<!doctype html>
<html>
<head><title>Login page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src='js/bootstrap.js'></script>
</head>
<body>
	<div class='container mt-3'>
	<center>
	<form action="" method="post">
		
			
	<table>
		<tr>
			<th>Phone</th>
			<td><input type="text" name="username" placeholder="Phone Number" required class='form-control'></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="Password" name="password" placeholder="Password" required class='form-control'></td>
		</tr>
		<tr>
			<td><input type="submit" name="loginbtn" value="Login" class='btn btn-info'></td>
			
		</tr>
	</table>

</form>
</center>

<?php
if (isset ($_POST['loginbtn']))
{
  require 'dbcon.php';
  $userName = $_POST['username'];
  $password = $_POST['password'];


  
  $select_query = "select * from teacherinfo where phone = '$userName' and password= '$password' ";

  $result = $con->query($select_query);
  $count = $result->num_rows;

  if ($count == 0)
  {
    echo "<script>alert ('sorry invalid username or password');</script>";
    
  }
  else
  {
  	$_SESSION['user_name']=$userName;
  	$_SESSION['password']=$password;
    echo "<script>window.location = 'teacherinfo.php'</script>";
     
  }
}
?>
</div>
</body>
</html>

