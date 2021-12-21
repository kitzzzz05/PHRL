<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	
	$use=mysqli_query($conn,"select * from user where userid='id'");
	$urow=mysqli_fetch_array($use);

	mysqli_query($conn,"update customer set customer_name='$name', email ='$email', address='$address', contact='$contact' where userid='$id'");
	
	?>
		<script>
			window.alert('Customer updated successfully!');
			window.history.back();
		</script>
	<?php

?>