<?php
	include('session.php');
	
	$id=$_GET['id'];

	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$person =$_POST['person'];
	
	mysqli_query($conn,"update supplier set company_name='$name', company_address='$address', contact='$contact', person= '$person' where userid='$id'");
	
	?>
		<script>
			window.alert('Supplier updated successfully!');
			window.history.back();
		</script>
	<?php

?>