<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
	<div id="wrapper">
		<?php include('navbar.php'); ?>
		<div style="height:50px;"></div>
		<div id="page-wrapper">

			<div class="container-fluid">
				<?php $to = date("Y-m-d");
				$from = "2021-11-23";
				$total = 0;
				?>
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Sales Report</h1>

						<div align="right">
							<form method="POST">
								<span>FROM: </span>
								<input type="date" name="from">
								<span>TO: </span>
								<input type="date" name="to">
								<input type="submit" name="Submit1" value="submit" />
							</form>
						</div>
						<form method="post" action="print_sales.php" target="_new" class="form-inline">
							<div class="form-group">
							<?php
								if (isset($_POST["Submit1"])) {
									$from = $_POST['from'];
									$to = $_POST['to'];
								}
							?>
								<input type="hidden" name="from" value="<?php echo $from; ?>">
								<input type="hidden" name="to" value="<?php echo $to; ?>">
								<button class="submit" id="print" >
									<i class="fa fa-print"></i> Print
								</button></a>
							</div>
						</form>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12">
						<table width="100%" class="table table-striped table-bordered table-hover" id="salesTable">
							<thead>
								<tr>
									<th class="hidden"></th>
									<th>Sales Id</th>
									<th>Order Id</th>
									<th>Sales Date</th>
									<th>Customer</th>
									<th>Product Name</th>
									<th>Sales Type</th>
									<th>Status</th>
									<th>Total Purchase</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_POST["Submit1"])) {
									$from = $_POST['from'];
									$to = $_POST['to'];
									$iq = mysqli_query($conn, "SELECT * FROM sales  WHERE DATE(sales_date) BETWEEN '$from' AND '$to' ORDER by sales_date asc");
									while ($sqrow = mysqli_fetch_array($iq)) {
								?>
										<tr>
											<td class="hidden"></td>
											<td>
												<center><?php echo $sqrow['salesid']; ?></center>
											</td>
											<td>
												<center><?php echo $sqrow['cartid']; ?></center>
											</td>
											<td>
												<center><?php echo date('M d, Y h:i A', strtotime($sqrow['sales_date'])); ?></center>
											</td>
											
											<td>
												<center><?php echo $sqrow['customer_name']; ?></center>
											</td>

											<td>
												<center>
													<?php echo $sqrow['product_name']; ?></center>
											</td>
											<td>
												<center>
													<?php echo $sqrow['sales_type']; ?></center>
											</td>

											<td>
												<center> <?php if ($sqrow['status'] == 'Voided') { ?>
														<span class='badge badge-pill' style='background:red'><?php echo $sqrow['status']; ?></span>
												</center>
											</td>
										<?php   } else { ?>
											<span class='badge badge-pill' style='background:green'><?php echo 'Sucess' ?></span></center>
											</td>
										<?php     } ?>
										<td align="right"><?php echo number_format($sqrow['sales_total'], 2);
															$total += $sqrow['sales_total']; ?></td>

										</tr>						$total += $sqrow['sales_total']; ?></td>
										</tr>
									<?php	} ?>
									<tr>
										<td colspan="7"><strong>Grand Total</strong></span></td>
										<td><strong><span class="pull-right"><?php echo number_format($total, 2) ?></span><strong></td>
									</tr>
									<?php

								} else {
									$sq = mysqli_query($conn, "SELECT * FROM sales  ORDER by sales_date asc");
									while ($sqrow = mysqli_fetch_array($sq)) {
									?>
										<tr>
											<td class="hidden"></td>
											<td>
												<center><?php echo $sqrow['salesid']; ?></center>
											</td>
											<td>
												<center><?php echo $sqrow['cartid']; ?></center>
											</td>
											<td>
												<center><?php echo date('M d, Y h:i A', strtotime($sqrow['sales_date'])); ?></center>
											</td>
											
											<td>
												<center><?php echo $sqrow['customer_name']; ?></center>
											</td>

											<td>
												<center>
													<?php echo $sqrow['product_name']; ?></center>
											</td>
											<td>
												<center>
													<?php echo $sqrow['sales_type']; ?></center>
											</td>

											<td>
												<center> <?php if ($sqrow['status'] == 'Voided') { ?>
														<span class='badge badge-pill' style='background:red'><?php echo $sqrow['status']; ?></span>
												</center>
											</td>
										<?php   } else { ?>
											<span class='badge badge-pill' style='background:green'><?php echo 'Sucess' ?></span></center>
											</td>
										<?php     } ?>
										<td align="right"><?php echo number_format($sqrow['sales_total'], 2);
															$total += $sqrow['sales_total']; ?></td>

										</tr>
									<?php
									}
									?>
									<tr>
										<td colspan="7"><strong>Grand Total</strong></span></td>
										<td><strong><span class="pull-right"><?php echo number_format($total, 2) ?></span><strong></td>
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
	<?php include('add_modal.php'); ?>
	<script src="custom.js"></script>
</body>

</html>