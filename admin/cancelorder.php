<?php
	include('session.php');
	
	$id=$_GET['id'];

    mysqli_query($conn,"update purchase_final set status='2', total_purchase = '0' where id='$id'");

	?>
		<script>
			window.alert('Cancel ordered successfully!');
			window.history.back();
		</script>
	<?php

?>