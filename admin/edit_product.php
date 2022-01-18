<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	$p=mysqli_query($conn,"select * from product where productid='$id'");
	$prow=mysqli_fetch_array($p);
	
	$name=$_POST['name'];
	$category=$_POST['category'];
	$supplier=$_POST['supplier'];
	$prodprice=$_POST['prodprice'];
	$sellprice=$_POST['sellprice'];
	$qty=$_POST['qty'];
	
	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location=$prow['photo'];
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location=$prow['photo'];
			?>
				<script>
					window.alert('Photo not updated. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	
	mysqli_query($conn,"update product set product_name='$name',product_price='$sellprice', supplierid='$supplier', categoryid='$category', price='$prodprice', photo='$location', product_qty='$qty' where productid='$id'");
	
	if($qty!=$prow['product_qty']){
		mysqli_query($conn,"insert into inventory (userid,user,action,productid,quantity,inventory_date) values ('".$_SESSION['id']."','".$_SESSION['fullname']."','Update Quantity', '$id', '$qty', NOW())");
	}
	?>
		<script>
			window.alert('Product updated successfully!');
			window.history.back();
		</script>
	<?php

?>