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
		header('location:teacherlogin.php');
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
				$select_query="SELECT `name`, `address`, `phone`, `faculty`, `image` FROM `teacherinfo` WHERE phone='$user' and password='$psd'";
				$data=$con->query($select_query);
				$row = $data->fetch_assoc();
				?>
				<h1 style='color:black'><b>Welcome <?php echo $row['name'];?></b></h1>
				<div class="table-responsive">
					<table bgcolor="white" border='1' class="table table-striped table-bordered table-condensed">
						<tr>
							<th>Full Name</th>
							<td><?php echo $row['name']; ?></td>
						</tr>
						<tr>
							<th>Address</th>
							<td><?php echo $row['address'];?></td>
						</tr>
						<tr>
							<th>Phone</th>
							<td><?php echo $row['phone'];?></td>
						</tr>
						<tr>
							<th>Faculty</th>
							<td><?php echo $row['faculty'];?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-3">
				<p align='right'><a href='teacherlogout.php'>Logout</a></p>
				<img src='admin/img/<?php echo $row['image'];?>' height='200' width='150' align='right'> 
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-6'>
				<h2>Add Assignment</h2><hr>
				<form action="teacher/addassignment.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<table bgcolor="white" border="10" class="table table-striped table-bordered table-condensed">
							<tr>
								<td><input type='text' name='title' class='form-control' placeholder="Enter Subject"></td>
							</tr>
							<tr>
								<td><input type='text' name='class' class='form-control' placeholder="Enter Class"></td>
							</tr>
							<tr>
								<td><input type='text' name='date' class='form-control' placeholder="Enter Date"></td>
							</tr>
							<tr>
								<td>
									<textarea type='textarea' name="hw" class="form-control" style='height:100px;'>
									</textarea>
								</td>
							</tr>
							<tr>
								<td><input type='submit' name='insertbtn' value='Save' class='btn btn-info'></td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
			<div class='col-sm-6'>
				<h2>View Assignment</h2><hr>
				<table border="10" bgcolor="white" class="table table-striped table-bordered table-condensed">
					<tr>
						<th>SN</th>
						<th>Subject</th>
						<th>Class</th>
						<th>Date</th>
						<th>Assignment</th>
						<th>Action</th>
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
							<td><a href="teacher/deletehw.php?id=<?php echo $row['id']?>" class="btn">remove</a>
								<a href="teacher/updatehw.php?id=<?php echo $row['id']?>" class="btn">change</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-6'>
				<h2>Add Notes</h2><hr>
				<form action="teacher/addnote.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<table bgcolor="white" border="10" class="table table-striped table-bordered table-condensed">
							<tr>
								<td><input type='text' name='title' class='form-control' placeholder="Enter Subject"></td>
							</tr>
							<tr>
								<td><input type='text' name='class' class='form-control' placeholder="Enter Class"></td>
							</tr>
							<tr>
								<td><input type="file" name="image" class="form-control"></td>
							</tr>
							<tr>
								<td><input type='submit' name='insertbtn' value='Save' class='btn btn-info'></td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
			<div class='col-sm-6'>
				<h2>View Notes</h2><hr>
				<table border="10" bgcolor="white" class="table table-striped table-bordered table-condensed">
					<tr>
						<th>SN</th>
						<th>Subject</th>
						<th>Class</th>
						<th>Notes</th>
						<th>Action</th>
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
							<td><a href="teacher/deletenote.php?id=<?php echo $row['id']?>" class="btn">remove</a>
								<a href="teacher/updatenote.php?id=<?php echo $row['id']?>" class="btn">change</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<h2>Add Marks</h2><hr>
				<form action="teacher/addmark.php" method="post" enctype="multipart/form-data">
					<input type='text' name='class' class='form-control' placeholder='Class'><br>
					<input type='text' name='roll' class='form-control' placeholder='Roll Number'><br>
					<input type='text' name='name' class='form-control' placeholder='Full Name'>
					<table bgcolor="white" border="10" class="table table-striped table-bordered table-condensed">
						<tr>
							<td><input type='text' name='title' class='form-control' placeholder="English"></td>
							<td><input type='text' name='title' class='form-control' placeholder="Nepali"></td>
						</tr>
						<tr>
							<td><input type='text' name='title' class='form-control' placeholder="Math"></td>
							<td><input type='text' name='title' class='form-control' placeholder="Science"></td>
						</tr>
						<tr>
							<td><input type='text' name='title' class='form-control' placeholder="Social"></td>
							<td><input type='text' name='title' class='form-control' placeholder="EPH"></td>
						</tr>
						<tr>
							<td><input type='text' name='title' class='form-control' placeholder="OPT Math"></td>
							<td><input type='text' name='title' class='form-control' placeholder="Computer"></td>
						</tr>
						<tr>
							<td><input type='submit' name='insertbtn' value='Save' class='btn btn-info'></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-12'>
				<h2>Add Attendance</h2><hr>
				<form action="teacher/addassignment.php" method="post" enctype="multipart/form-data">
					<table bgcolor="white" border="10" class="table table-striped table-bordered table-condensed">
						<tr>
							<td><input type='text' name='title' class='form-control' placeholder="Enter Date"></td>
						</tr>
						<tr>
							<td><input type='text' name='date' class='form-control' placeholder="Enter Attendance"></td>
						</tr>
						<tr>
							<td><input type='submit' name='insertbtn' value='Save' class='btn btn-info'></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div>
			<?php require 'footer.php' ?>
		</div>
	</div>
</body>
</html>