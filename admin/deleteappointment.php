<?php
	include('session.php');
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from appointment where scheduleId='$id'");
	mysqli_query($conn,"delete from adminschedule  where scheduleId='$id'");
 
	header('location:appointmentlist.php');

?>