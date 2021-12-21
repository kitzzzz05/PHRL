<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from user where userid='$id'");
	
	header('location:user.php');

?>