<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
	<div id="wrapper">
		<?php include('navbar.php'); ?>
		<div style="height:50px;"></div>
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Products
							<span class="pull-right">
								<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus-circle"></i> Add Product</button>
							</span>
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
							<thead>
								<tr>
									<th>Product Id </th>
									<th>Product Name</th>
									<th>Supplier</th>
									<th>Prod Price</th>
									<th>Selling Price</th>
									<th>Quantity</th>
									<th>Description</th>
									<th>Photo</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$pq = mysqli_query($conn, "SELECT * from product left join category on
								 category.categoryid=product.categoryid left join supplier on supplier.userid=product.supplierid 
								 ORDER BY supplier.userid");
								while ($pqrow = mysqli_fetch_array($pq)) {
									$pid = $pqrow['productid'];
								?>
									<tr>
									<td><center><?php echo $pid; ?></center></td>
										<td><center><?php echo $pqrow['product_name']; ?></center></td>
										<td><center><?php echo $pqrow['company_name']; ?></center></td>
										<td><center><?php echo number_format($pqrow['price'], 2) ?></center></td>
										<td><center><?php echo  number_format($pqrow['product_price'], 2) ?></center></td>
										<td><center><?php echo $pqrow['product_qty']; ?></center></td>
										<td><center><?php echo $pqrow['about']; ?></center></td>
										<td><center><img src="../<?php if (empty($pqrow['photo'])) {
																echo "upload/noimage.jpg";
															} else {
																echo $pqrow['photo'];
															} ?>" height="30px" width="30px;"></center></td>
										<td><center>
											<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editprod_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Edit</button>
											<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delproduct_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Delete</button>
											<?php include('product_button.php'); ?>
														</center></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('script.php'); ?>
	<?php include('modal.php'); ?>
	<?php include('add_modal_product.php'); ?>
	<script src="custom.js"></script>
</body>

</html>