	<?php
	require '../dbcon.php';
	if(isset($_POST['insertbtn'])){
		$title=$_POST['title'];
		$class=$_POST['class'];
		$date=$_POST['date'];
		$hw=$_POST['hw'];
		$insert_query="insert into studenthw(subject,class, date, hw)values('$title','$class','$date','$hw')";
		if($con->query($insert_query)){
			echo "<script> alert ('New data has been added'); </script>";
			echo "<script> window.location='../teacherinfo.php'</script>";
		}else{
			$message=$con->error."has been occured";
			echo "<script> alert(\"$message\");</script>";
		}
	}
	?>
