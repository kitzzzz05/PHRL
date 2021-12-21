<?php
  
// Get the user id 
$user_id = $_REQUEST['user_id'];
  
// Database connection
$con = mysqli_connect("localhost", "root", "", "pos");
  
if ($user_id !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT product_name, 
    product_price FROM product WHERE productid='$user_id'");
  
    $row = mysqli_fetch_array($query);
  
    // Get the first name
    $first_name = $row["product_name"];
  
    // Get the first name
    $last_name = $row["product_price"];
}
  
// Store it in a array
$result = array("$first_name", "$last_name");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>