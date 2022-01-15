<?php
  
// Get the user id 
$user_id = $_REQUEST['user_id'];
  
// Database connection
$con = mysqli_connect("localhost", "root", "", "pos");
  
if ($user_id !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT productid, 
    product_price,barcode_id FROM product WHERE product_name='$user_id'");
  
    $row = mysqli_fetch_array($query);
  
    // Get the first name
    $first_name = $row["productid"];
  
    // Get the first name
    $last_name = $row["product_price"];

    if(empty($row['barcode_id'])){
        $barcodeid = mt_rand(1000000000,9999999999);
    }else{
        $barcodeid=$row['barcode_id'];
    }
}


// Store it in a array
$result = array("$first_name", "$last_name" , "$barcodeid");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>