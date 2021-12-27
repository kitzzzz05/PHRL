<?php
	include('session.php');
	
	$purchase=$_POST['order_num'];
	$quantity=$_POST['quantity'];
	$type=$_POST['type'];
	$about = $_POST['remark'];
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
    $pq = mysqli_query($conn, "select * from  purchase_final 
                                left join product on product.productid=purchase_final.product_id
                                where id=$purchase");
    while ($pqrow = mysqli_fetch_array($pq)) {
        $id = $pqrow['productid'];
        $purchaseid = $pqrow['id'];
        $total_purchase = $pqrow['total_purchase'];
        $quantity_purchase = $pqrow['quantity_purchase'];
        $product_quantity = $pqrow['product_qty'];
        $product_price = $pqrow['product_price'];
        $damage_quantity = $pqrow['damage_qty'];
    }

    if((int)$quantity_purchase < (int)$quantity) {

        $location="";
        ?>
            <script>
                window.alert('Quantity is greater than available return quantity!');
                window.history.back();
            </script>
        <?php
        return false;
    } 

    $new_total_quantity = (int)$product_quantity - (int)$quantity;
    $remaining_quantity = (int)$quantity_purchase - (int)$quantity;
    $new_total_damage_qty = (int)$damage_quantity + (int)$quantity;
    $new_total_purchase = (int)$total_purchase / (int)$quantity;

    if((int)$remaining_quantity < 1) {

        $location="";
        ?>
            <script>
                window.alert('There is no remaining quantity for this return transactions.');
                window.history.back();
            </script>
        <?php
        return false;

    }

    if($type == 2) {
        
        $refund_qty = (int)$product_quantity + (int)$quantity;

          /*inventories*/
        mysqli_query($conn,"update product set product_qty='$refund_qty' where productid='$id'");

        /*purchase final*/
        mysqli_query($conn,"update purchase_final set total_purchase='$new_total_purchase', quantity_purchase='$remaining_quantity' where id='$purchaseid'");

    }else {

        /*inventories*/
        mysqli_query($conn,"update product set product_qty='$new_total_quantity', damage_qty='$new_total_damage_qty' where productid='$id'");

        /*purchase final*/
        mysqli_query($conn,"update purchase_final set total_purchase='$new_total_purchase', quantity_purchase='$remaining_quantity' where id='$purchaseid'");
                 
    }

    /*insert return item*/
	mysqli_query($conn,"INSERT into return_trans (purchase_id,quantity,remarks,return_type) VALUES ('$purchase','$quantity','$about','$type')");
	$pid=mysqli_insert_id($conn);

	
	?>
		<script>
			window.alert('Successfully return Item(s)!');
			window.history.back();
		</script>
	<?php
?>