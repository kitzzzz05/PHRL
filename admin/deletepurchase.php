<?php
	include('session.php');
	$pid=$_GET['id'];
	
	mysqli_query($conn,"delete from purchase where purcase_id='$pid'");
	
	header('location:purchase_order.php');

?>