<?php
	include('session.php');

    $price = "";
    $name= "Customer in POS";
    $query = mysqli_query($conn, "select * from dummy_cart");
	while ($row = mysqli_fetch_array($query)) {
        //INSERT INTO SALES
        $price = $row['product_price'] * $row['quantity'];
        $prodName = $row['product_name'];
        $prodId = $row['product_id'];
        $quantity = $row['quantity'];
        $id = $row['id'];
        
        mysqli_query($conn,"INSERT into sales (customer_name, sales_total, sales_date, sales_type, product_name)
         values ('Customer in POS', '$price', NOW(), 'POS Purchase', '$prodName')");

         //UPDATE PRODUCT QUANTITY
         mysqli_query($conn,"UPDATE product set product_qty= product_qty-$quantity where productid='$prodId'");

         //DELETE FROM DUMMY CART
         mysqli_query($conn,"DELETE from dummy_cart WHERE id = '$id'");

         mysqli_query($conn,"INSERT into inventory (userid,action,productid,quantity,inventory_date) 
         values ('".$_SESSION['id']."','Purchase POS', '$prodId', '$quantity', NOW())");
         
    }	

    header('location:pos.php');

?>