<?php
	include('session.php');
	
	$id=$_GET['id'];


	
	mysqli_query($conn,"UPDATE final_purchase set status=3 where purchase_id='$id'");
	
	?>
		<script>
			window.alert('Cancel ordered successfully!');
			window.history.back();
		</script>
	<?php

?>