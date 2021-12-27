<?php
	include('session.php');
	$pid=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from return_trans where return_id='$pid'");
	$b=mysqli_fetch_array($a);
	
	mysqli_query($conn,"delete from return_trans where return_id='$pid'");
	
	header('location:return.php');

?>