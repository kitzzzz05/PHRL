<?php
include('session.php');


$barcodeid = $_POST['search'];

$query2 = mysqli_query($conn, "SELECT * from services WHERE product_name = '$barcodeid'");
$row2 = mysqli_fetch_array($query2);
if ($row2 > 0) {
	$prodName = $row2['product_name'];
	$price =  $row2['price'];
	$prodid = $row2['id'];

	mysqli_query($conn, "INSERT into dummy_cart (product_id, product_name, product_price, quantity)
		VALUES ('$prodid','$prodName','$price',1)");

} else {
	$query = mysqli_query($conn, "SELECT * from product WHERE product_name = '$barcodeid'");
	$row = mysqli_fetch_array($query);
	$prodName = $row['product_name'];
	$price =  $row['product_price'];
	$prodid = $row['productid'];
	$quantity = $_POST['quantity'];

	$query2 = mysqli_query($conn, "SELECT * from dummy_cart WHERE product_id = '$prodid'");
	$row2 = mysqli_fetch_array($query2);

	if ($row2 > 0) {

		mysqli_query($conn, "update dummy_cart set quantity = quantity +'$quantity' where product_id = '$prodid'");
	} else {
		mysqli_query($conn, "INSERT into dummy_cart (product_id, product_name, product_price, quantity)
		VALUES ('$prodid','$prodName','$price','$quantity')");
	}
}




header('location:pos.php');
