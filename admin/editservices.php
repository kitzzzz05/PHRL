<?php
	include('session.php');
	
	$id=$_GET['id'];

	$name=$_POST['name'];
	$price=$_POST['price'];
	
	
	mysqli_query($conn,"update services set product_name='$name', price='$price' where id='$id'");
	
	?>
		<script>
			window.alert('Services updated successfully!');
			window.history.back();
		</script>
	<?php

?>