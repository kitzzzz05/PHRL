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


    //DELETE FROM DUMMY CART
    mysqli_query($conn, "DELETE from purchase WHERE purcase_id = '$id'");

    mysqli_query($conn, "INSERT into inventory (userid,user,action,productid,quantity,inventory_date)  
         values ('" . $_SESSION['id'] . "','".$_SESSION['fullname']."','Buy Stock', '$prodId', '$quant', NOW())");
}
header('location:purchase_order.php');
?>