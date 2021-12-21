<?php
include('session.php');

$id=$_GET['id'];
$price =$_GET['price'];
$quantity = $_GET['quant'];
$prodId = $_GET['prodid'];

mysqli_query($conn, "UPDATE purchase set subtotal = $price * $quantity, purchase_quantity = '$quantity' where purcase_id = '$id'");
mysqli_query($conn, "UPDATE product set price = $price  where productid = '$prodId '");

header("location:purchase_order.php");

?>