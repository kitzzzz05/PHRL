<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	$p=mysqli_query($conn,"select * from purchase_final where id='$id'");
	$prow=mysqli_fetch_array($p);
	
	$status=$_POST['status'];
	$sellprice=$_POST['sellprice'];
	$qty=$_POST['qty'];
	$prodId = $prow['product_id'];
    $total_purchase = $sellprice * $qty;
	
	
	mysqli_query($conn,"update purchase_final set quantity_purchase='$qty', total_purchase='$total_purchase', status='$status' where id='$id'");

    //UPDATE PRODUCT QUANTITY
//     mysqli_query($conn, "UPDATE product set product_qty= product_qty+$quant where productid='$prodId'"); move to order data
	if($status == '2'){

    mysqli_query($conn, "UPDATE product set product_qty= product_qty+$qty where productid='$prodId'"); 
	}
	
	?>
		<script>
			window.alert('Order updated successfully!');
			window.history.back();
		</script>
	<?php

?>