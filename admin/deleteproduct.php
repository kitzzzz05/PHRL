<?php
	include('session.php');
	$pid=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from product where productid='$pid'");
	$b=mysqli_fetch_array($a);

	mysqli_query($conn,"INSERT into inventory (userid, user, action, productid, quantity, inventory_date)
	 values ('".$_SESSION['id']."','".$_SESSION['fullname']."','Delete Product', '$pid', '0', NOW())");
	
	mysqli_query($conn,"delete from product where productid='$pid'");

	header('location:product.php');

?>