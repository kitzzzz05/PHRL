<?php
	include('session.php');

		$id=$_GET['id'];

		mysqli_query($conn, "update dummy_cart set quantity = quantity - 1 where id = '$id'");
		header("location:pos.php");
	
?>