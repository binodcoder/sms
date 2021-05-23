<?php
// Start the session
session_start();
?>
<!doctype html>
<html>
<head><title>Login page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src='bootstrap.js'></script>
</head>
<body>
	<div class='container mt-3'>
		<center>
			<form action="" method="post">
				<fieldset>
					<table>
						<tr>
							<div class='form-group'>
							<th>Phone</th>
							<td><input class='form-control' type="text" name="username" placeholder="Phone Number" required></td>
						</div>
						</tr>
						<tr>
							<div class='form-group'>
							<th>Password</th>
							<td><input type="Password" name="password" placeholder="Password" required class='form-control'></td>
						</div>
						</tr>
						<tr>
							<div class='form-group'>
							<td><input type="submit" name="loginbtn" value="Login" class='btn btn-info form-control'></td>
						</div>
						</tr>
					</table>
				</fieldset>
			</form>
		</center>

		<?php
		if (isset ($_POST['loginbtn']))
		{
			require 'dbcon.php';
			$userName = $_POST['username'];
			$password = $_POST['password'];



			$select_query = "select * from studentinfo where parentscontact = '$userName' and password= '$password' ";

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
				echo "<script>window.location = 'studentinfo.php'</script>";

			}
		}
		?>
	</div>
</body>
</html>


