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
						<h1 class="page-header">Return Order
							<span class="pull-right">
								<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addReturnproduct"><i class="fa fa-minus-circle"></i> Return Item</button>
							</span>
						</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
							<thead>
								<tr>
									<th>Order #</th>
									<th>Product Name</th>
									<th>Supplier</th>
									<th>Quantity</th>
                                    <th>Return Type</th>
									<th>Remark</th>
									<th>Photo</th>
									<th>Action</th>
								</tr>
							</thead>
							 <tbody>
								<?php
								$pq = mysqli_query($conn, "select * from return_trans
                                                            left join purchase_final on purchase_final.id=return_trans.purchase_id 
                                                            left join product on product.productid=purchase_final.product_id
                                                            left join supplier on supplier.userid=product.supplierid");
								while ($pqrow = mysqli_fetch_array($pq)) {
									$pid = $pqrow['return_id'];
								?>
									<tr>
                                        <td><center><?php echo $pqrow['purchase_id']; ?></center></td>
										<td><center><?php echo $pqrow['product_name']; ?></center></td>
										<td><center><?php echo $pqrow['company_name']; ?></center></td>
										<td><center><?php echo $pqrow['quantity']; ?></center></td>
                                        <td><center>
                                            <?php if($pqrow['return_type'] == 1):?>
                                                <span class='badge badge-pill' style='background:#c76949 '>Damage</span>
                                            <?php elseif($pqrow['return_type'] == 2):?>
                                                <span class='badge badge-pill' style='background:#49C769'>Refund</span>
                                            <?php endif;?>
                                        </center></td>
										<td><center><?php echo $pqrow['remarks']; ?></center></td>
                                        <td><center>photo</center></td>
                                        <td><center>
											<!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editprod_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Edit</button> -->
											<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delreturn_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Delete</button>
											<?php include('return_button.php'); ?>
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
	<?php include('add_modal_return_item.php'); ?>
	<script src="custom.js"></script>
</body>

</html>