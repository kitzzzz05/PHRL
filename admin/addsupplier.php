<?php
	include('session.php');
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$person=$_POST['person'];


	
	mysqli_query($conn,"insert into supplier (company_name, company_address, contact,person) values ( '$name', '$address', '$contact','$person')");
	
	?>
		<script>
			window.alert('Supplier added successfully!');
			window.history.back();
		</script>
	<?php
?>