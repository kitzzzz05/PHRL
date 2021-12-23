<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "pos");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "SELECT product_name FROM product
UNION
SELECT product_name FROM services
WHERE product_name LIKE '%" . $request . "%' ORDER BY product_name";

$result = mysqli_query($connect, $query);

$data = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row["product_name"];
    }
    echo json_encode($data);
}
