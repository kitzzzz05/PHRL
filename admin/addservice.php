<?php
	include('session.php');
	
	$name=$_POST['name'];
	$price=$_POST['price'];
	
	mysqli_query($conn,"insert into services (product_name, price) values ( '$name', '$price')");
	
	?>
		<script>
			window.alert('Services added successfully!');
			window.history.back();
		</script>
	<?php
?>