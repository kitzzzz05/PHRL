<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php

if (isset($_POST['submit'])) {

	$barcodeid = $_POST['prodid'];

	$query = mysqli_query($conn, "SELECT * from product WHERE productid = '$barcodeid'");
	$row = mysqli_fetch_array($query);
	$prodName = $row['product_name'];
	$price =  $row['product_price'];
	$prodid = $row['productid'];
	$quantity = $_POST['quantity'];

	$query2 = mysqli_query($conn, "SELECT * from dummy_cart WHERE product_id = '$prodid'");
	$row2 = mysqli_fetch_array($query2);

	if ($row2 > 0) {

		mysqli_query($conn, "update dummy_cart set quantity = quantity +'$quantity' where product_id = '$prodid'");
	} else {
		mysqli_query($conn, "INSERT into dummy_cart (product_id, product_name, product_price, quantity)
		VALUES ('$prodid','$prodName','$price','$quantity')");
	}
}
?>

<head>


<body>
	<div id="wrapper">
		<?php include('navbar.php'); ?>
		<div style="height:50px;"></div>
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">POS
							<span class="pull-right">
								<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addschedule"><i class="fa fa-search"></i> Search Item</button>
							</span>
						</h1>
						</h1>
						<div class="col-lg-12 main-chart">
							<br>

							<div class="col-sm-4">
							</div>
							<div class="panel panel-primary" style="width:400px;">
								<div class="panel-heading">
									<h4><i></i> Item</h4>
								</div>
								<div class="panel-body">
									<form role="form" method="POST" action="#">
										<br>


										<div class="form-group input-group">
											<span style="width:120px;" class="input-group-addon">barcode:</span>
											<input type="text" class="form-control" name="prodid" required>

										</div>
										<div class="form-group input-group">
											<span style="width:120px;" class="input-group-addon">quantity:</span>
											<input class="form-control" type="number" style="width:100px;" value="1" name="quantity" min="0">
										</div>
										<input type="submit" name="submit" value="Add to Cart" class="btn btn-success" />
									</form>
								</div>
							</div>
						</div>


					</div>
					<div class="row">
						<div class="col-lg-12">
							<table style="width:85%" class="table">
								<thead>
									<th></th>
									<th>Order Id</th>	
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Purchase Qty</th>
									<th>SubTotal</th>
								</thead>
								<tbody>

									<?php
									$total = 0;
									$query = mysqli_query($conn, "select * from dummy_cart");
									while ($row = mysqli_fetch_array($query)) {
									?>
										<tr>
											<td><a class="btn btn-info btn-sm" href="del_product.php?id=<?php echo $row['id']; ?>">
													<span class="glyphicon glyphicon-trash"></span> Remove </a></td>
													<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['product_name']; ?></td>
											<td><?php echo number_format($row['product_price'], 2); ?></td>
											<td><a class="btn btn-warning btn-sm minus_qty2" href="minus_product.php?id=<?php echo $row['id']; ?>"><i class="fa fa-minus fa-fw"></i></a>
												<?php echo $row['quantity']; ?>
											</td>
											<td><strong><span class="subt">
														<?php
														$subtotal = $row['quantity'] * $row['product_price'];
														echo number_format($subtotal, 2);
														$total += $subtotal;
														?>
													</span></strong></td>
										</tr>
									<?php
									}
									?>
									<tr>
										<td colspan="5"><span class="pull-right"><strong>Grand Total</strong></span></td>
										<td><strong><span id="total"><?php echo number_format($total, 2); ?></span><strong></td>
									</tr>

									<td>Total</td>
									<td><input type="text" class="form-control" id="total_pay" value="<?php echo $total ?>" readonly></td>

									<td>Payment Amount</td>
									<form role="form" method="POST" action="payment.php">
										<td><input type="text" class="form-control" id="amount_pay" oninput="getChange()" required>
										</td>
										<td><button class="btn btn-success" id="paybutton" disabled><i class="fa fa-shopping-cart" disabled></i>Pay</button>
									</form>


									</td>
									</td>
									</tr>
									</form>
									<!-- aksi ke table nota -->
									<tr>
										<td>Change</td>
										<td><input type="text" class="form-control" id="change_pay" readonly></td>
										<td> <span id = "message" style="color:red"> </span></td>
										<td>
											<a onclick="getUrl(<?php echo $total ?>)">
												<button class="btn btn-default" id="print" disabled>
													<i class="fa fa-print"></i> Print
												</button></a>
										</td>

									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>


			</div>
			<script type="text/javascript">
				function getUrl(id) {

					var text1 = document.getElementById("change_pay");
					var text2 = document.getElementById("amount_pay");
					var price = parseFloat(text1.value);
					var quant = parseFloat(text2.value);
					window.open('full_details.php?id=' + id + '&prodid=' + quant + '&price=' + price + '', '_blank');
				}

				var text1 = document.getElementById("total_pay");
				var text2 = document.getElementById("amount_pay");

				function getChange() {
					document.getElementById("paybutton").disabled = true;
					var first_number = parseFloat(text1.value);
					if (isNaN(first_number)) first_number = 0;
					var second_number = parseFloat(text2.value);
					if (isNaN(second_number)) second_number = 0;
					var result = second_number - first_number;
					if(result < 0){
						result = "";
						document.getElementById("message").innerHTML = "Insufficient Pay";  
						document.getElementById("change_pay").value = result;
				
					}else{
						document.getElementById("message").innerHTML = "";  
						document.getElementById("change_pay").value = result;

						if (document.getElementById("change_pay").value =="") {
						
					}else{
						document.getElementById("paybutton").disabled = false;
						document.getElementById("print").disabled = false;
					}
					}

				
					

				}
			</script>

			<?php include('script.php'); ?>
			<script src="custom.js"></script>
			<?php include('add_modal_search.php'); ?>
</body>

</html>