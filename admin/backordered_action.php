<?php
include('session.php');

$id = $_POST['backid'];
echo $id;

$p = mysqli_query($conn, "select * from backorder where backid='$id'");
$prow = mysqli_fetch_array($p);

$purchaseQuantity = $prow['quantity'];
$prodId = $prow['product_id'];
$purchaseid = $prow['purchase_id'];
$suppid = $prow['supplier_id'];


$count = $_POST['quantity'];
$price = $_POST['price'];

if ($count < $purchaseQuantity) {
	//Update BACK ORDER

    mysqli_query($conn, "UPDATE backorder set quantity= quantity-$count where backid='$id'");

	mysqli_query($conn, "UPDATE product set product_qty= product_qty+$count where productid='$prodId'");

} else {
	// mysqli_query($conn, "UPDATE purchase_final set status = 1 WHERE id='$id' ");
	mysqli_query($conn, "UPDATE product set product_qty= product_qty+$purchaseQuantity where productid='$prodId'");
}

?>
<script>
	window.alert('Updated successfully!');
	window.history.back();
</script>
<?php
?>