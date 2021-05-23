<!doctype html>
<html lang='en'>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
		
		<?php require 'navigation.php'?>
		<hr>
		<div class="row">
			<div class='mt-2 col-9'>
				<?php 
				require 'dbcon.php';
				$user=$_SESSION['user_name'];
				$psd=$_SESSION['password'];
				$select_query="SELECT `rollno`, `name`, `city`, `parentscontact`, `standard`, `image` FROM `studentinfo` WHERE parentscontact='$user' and password='$psd'";
				$data=$con->query($select_query);
				$row = $data->fetch_assoc();
				?>
				<h1 style='color:black'><b>Welcome <?php echo $row['name'];?></b></h1>
				<div class="table-responsive">
					<table bgcolor="white" border='1' class="table table-striped table-bordered table-condensed">
						<tr>
							<th>Roll No</th>
							<td><?php echo $row['rollno']; ?></td>
						</tr>
						<tr>
							<th>Name</th>
							<td><?php echo $row['name'];?></td>
						</tr>
						<tr>
							<th>City</th>
							<td><?php echo $row['city'];?></td>
						</tr>
						<tr>
							<th>Contact</th>
							<td><?php echo $row['parentscontact'];?></td>
						</tr>
						<tr>
							<th>Standard</th>
							<td><?php echo $row['standard']; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-3">
				<p align='right' style='font-color:red'><a href='logout.php'>Logout</a></p>
				<img src='admin/img/<?php echo $row['image'];?>' height='200' width='150' align='right'> 
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<h2>View Assignment</h2><hr>
				<table border="10" bgcolor="white" class="table table-striped table-bordered table-condensed">
					<tr>
						<th>SN</th>
						<th>Subject</th>
						<th>Class</th>
						<th>Date</th>
						<th>Assignment</th>
					</tr>
					<?php
					require 'dbcon.php';
					$select_query="select *from studenthw order by id desc";
					$data=$con->query($select_query);
					$count=1;
					while($row=$data->fetch_assoc())
					{
						?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td><?php echo $row['subject']; ?></td>
							<td><?php echo $row['class']; ?></td>
							<td><?php echo $row['date']; ?></td>
							<td><?php echo $row['hw']; ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<h2>View Notes</h2><hr>
				<table border="10" bgcolor="white" class="table table-striped table-bordered table-condensed">
					<tr>
						<th>SN</th>
						<th>Subject</th>
						<th>Class</th>
						<th>Notes</th>
					</tr>
					<?php
					require 'dbcon.php';
					$select_query="select *from notes order by id desc";
					$data=$con->query($select_query);
					$count=1;
					while($row=$data->fetch_assoc())
					{
						?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['class']; ?></td>
							<td><?php echo $row['note']; ?></td>
							
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<div>
			<?php require 'footer.php' ?>
		</div>
	</div>
	<script type="text/javascript" src='js/bootstrap.js'></script>
	<script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>
</html>