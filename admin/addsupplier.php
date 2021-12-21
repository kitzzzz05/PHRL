<?php
	include('session.php');
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];

	
	mysqli_query($conn,"insert into supplier (company_name, company_address, contact) values ( '$name', '$address', '$contact')");
	
	?>
		<script>
			window.alert('Supplier added successfully!');
			window.history.back();
		</script>
	<?php
?>