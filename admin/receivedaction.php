<?php
include('session.php');

$id = $_GET['id'];

$p = mysqli_query($conn, "select * from purchase_final where id='$id'");
$prow = mysqli_fetch_array($p);

$purchaseQuantity = $prow['quantity_purchase'];
$prodId = $prow['product_id'];
$purchaseid = $prow['purchase_id'];
$suppid = $prow['supplier_id'];


$count = $_POST['quantity'];
$price = $_POST['price'];

if ($count < $purchaseQuantity) {
	//INSERT BACK ORDER

	mysqli_query($conn, "INSERT into backorder (purchase_id,product_id,supplier_id,quantity,date,status) 
	values 
	( '$purchaseid','$prodId','$suppid',($purchaseQuantity -$count),NOW(),'Pending')");

	mysqli_query($conn, "UPDATE product set product_qty= product_qty+$count,product_price = '$price' 
	where productid='$prodId'");

	mysqli_query($conn, "INSERT into inventory (userid,user,action,productid,quantity,inventory_date)  
	values ('" . $_SESSION['id'] . "','".$_SESSION['fullname']."','Received Order  Added', '$prodId', '$count', NOW())");
} else {
	mysqli_query($conn, "UPDATE purchase_final set status = 1 WHERE id='$id' ");
	mysqli_query($conn, "UPDATE product set product_qty= product_qty+$purchaseQuantity,product_price = '$price' 
	 where productid='$prodId'");

	mysqli_query($conn, "INSERT into inventory (userid,user,raction,productid,quantity,inventory_date)  
	values ('" . $_SESSION['id'] . "','".$_SESSION['fullname']."','Received Order  Added', '$prodId', '$count', NOW())");
}

?>
<script>
	window.alert('Updated successfully!');
	window.history.back();
</script>
<?php
?>