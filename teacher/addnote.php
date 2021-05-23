	<?php
	require '../dbcon.php';
	if(isset($_POST['insertbtn'])){
		$title=$_POST['title'];
		$class=$_POST['class'];
		$note=$_POST['note'];
		$insert_query="insert into notes(title, class, note)values('$title','$class','$note')";
		if($con->query($insert_query)){
			echo "<script> alert ('New data has been added'); </script>";
			echo "<script> window.location='../teacherinfo.php'</script>";
		}else{
			$message=$con->error."has been occured";
			echo "<script> alert(\"$message\");</script>";
		}
	}
	?>
