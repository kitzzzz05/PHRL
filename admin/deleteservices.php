<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from services where id='$id'");
	
	header('location:services.php');

?>