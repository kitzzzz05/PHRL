<?php
	include('session.php');
	$pid=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from purchase_final where id='$pid'");
	$b=mysqli_fetch_array($a);
	
	mysqli_query($conn,"delete from purchase_final where id='$pid'");
	
	header('location:order.php');

?>