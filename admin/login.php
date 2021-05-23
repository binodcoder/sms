<?php
session_start();
?>
<!doctype html>
<html>
<head><title>Login page</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class='container mt-3'>
		<center>
			<form onsubmit="return validate()" action=""  method="post">
				<table>
					<tr>
						<th>Username</th>
						<td><input id="username" type="text" name="username" placeholder="Username" class='form-control' autofocus></td>
					</tr>
					<tr>
						<th>Password</th>
						<td><input id='password' type="Password" name="password" placeholder="Password" class='form-control'><span id="message"></span></td>
					</tr>
					<tr>
						<td><button type="submit" name="loginbtn"  class='btn btn-info'>Login</button></td>
					</tr>
				</table>
			</form>
		</center>
		<?php
		if (isset ($_POST['loginbtn']))
		{
			require '../dbcon.php';
			$userName = $_POST['username'];
			$password = $_POST['password'];
			$select_query = "select * from admin where username = '$userName' and password= '$password' ";
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
				echo "<script>window.location = 'admindash.php'</script>";
			}
		}
		?>
	</div>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript">
		function validate(){
			var username=document.getElementById("username");
			var password=document.getElementById("password");
			if (username.value.trim()==""||password.value.trim()==""){
				document.getElementById("message").innerHTML="No blank values allowed";
				return false;
			}else{
			return true;
		}
	}
</script>
</body>
</html>


