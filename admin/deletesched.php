<?php
	include('session.php');
	$pid=$_GET['id'];
	
	mysqli_query($conn,"delete from adminschedule where scheduleId='$pid'");
	
	header('location:mechanic.php');

?>