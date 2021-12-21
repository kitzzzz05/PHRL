<?php
include('session.php');
	
$prodid = $_POST['prodid'];

$query = mysqli_query($conn, "SELECT * from product WHERE productid = '$prodid'");
$row = mysqli_fetch_array($query);
$prodName = $row['product_name'];
$price =  $row['product_price'];

mysqli_query($conn, "INSERT into dummy_cart (product_id, product_name, product_price, quantity)
 VALUES ('$prodid','$prodName','$price','1')"); 

?>
