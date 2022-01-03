<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	$p=mysqli_query($conn,"select * from purchase_final where id='$id'");
	$prow=mysqli_fetch_array($p);
	
	$name=$_POST['name'];
	$supplier=$_POST['company_name'];
	$sellprice=$_POST['sellprice'];
	$qty=$_POST['qty'];
    $total_purchase = $sellprice * $qty;
	
	
	mysqli_query($conn,"update purchase_final set quantity_purchase='$qty', total_purchase='$total_purchase' where id='$id'");
	
	?>
		<script>
			window.alert('Order updated successfully!');
			window.history.back();
		</script>
	<?php

?>