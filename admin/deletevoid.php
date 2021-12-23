<?php
	include('session.php');
	
	$id=$_GET['id'];
    $quantity= $_GET['quantity'];

    $query = mysqli_query($conn, "SELECT * from cart_final WHERE id ='$id'");
    $row = mysqli_fetch_array($query);
    $prodId= $row['productid'];
    $cartid= $row['cart_id'];
	
    mysqli_query($conn, "UPDATE product set product_qty= product_qty+$quantity where productid='$prodId'");
	mysqli_query($conn,"UPDATE cart_final set status='Voided' where id='$id'");
    mysqli_query($conn,"UPDATE sales set status='Voided', sales_total = 0 where cartid='$cartid'");
	
	header('location:void.php');

?>