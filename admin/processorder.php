<?php
include('session.php');

$query = mysqli_query($conn, "SELECT a.*,b.* ,c.* from purchase a JOIN 
     product b on a.product_id = b.productid JOIN supplier c on b.supplierid = c.userid");
while ($row = mysqli_fetch_array($query)) {
    $id = $row['purcase_id'];
    $prodId = $row['product_id'];
    $total = $row['subtotal'];
    $quant =  $row['purchase_quantity'];
    $suppId = $row['userid'];
    $status = 0;


    mysqli_query($conn, "INSERT into purchase_final (purchase_id, product_id, total_purchase, quantity_purchase, date,supplier_id,status)
    values ('$id','$prodId','$total', '$quant',NOW(), '$suppId', '$status')");

    //UPDATE PRODUCT QUANTITY
//     mysqli_query($conn, "UPDATE product set product_qty= product_qty+$quant where productid='$prodId'"); move to order data

    //DELETE FROM DUMMY CART
    mysqli_query($conn, "DELETE from purchase WHERE purcase_id = '$id'");

    mysqli_query($conn, "INSERT into inventory (userid,action,productid,quantity,inventory_date)  
         values ('" . $_SESSION['id'] . "','Update Stock', '$prodId', '$quant', NOW())");
}
header('location:purchase_order.php');
?>