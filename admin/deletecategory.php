<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete from category where categoryid='$id'");
	
	header('location:category.php');

?>