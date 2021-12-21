<?php
	include('session.php');

		$id=$_GET['id'];
		mysqli_query($conn,"delete from dummy_cart where id='$id'");
		header("location:pos.php");
	
?>