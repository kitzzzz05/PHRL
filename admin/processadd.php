<?php
 include('session.php');    
$prodid = $_GET['id'];

  mysqli_query($conn, "INSERT into purchase (product_id, date,purchase_quantity)
		VALUES ('$prodid',now(),1)");

    header("location: purchase_order.php");

?>