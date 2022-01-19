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
				?>
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Inventory Report</h1>
						<span> Legend of Quantity: </span>
						<span style="color:gray">&nbsp;&nbsp;&nbsp;&nbsp;&#9724; 0 piece </span>
						<span style="color:#ff4d4d">&nbsp;&nbsp;&nbsp;&nbsp;&#9724; 3-9 pieces </span>
						<span style="color:lightgreen">&nbsp;&nbsp;&nbsp;&nbsp;&#9724; 10-above </span>

						<div align="right">
							<form method="POST">
								<span>FROM: </span>
								<input type="date" name="from">
								<span>TO: </span>
								<input type="date" name="to">
								<input type="submit" name="Submit1" value="submit" />
							</form>
						</div>

					</div>

				</div>
				<div class="form-group">
					<?php
					$status= 'all';
					if(isset($_GET['status'])){
						$status = $_GET['status'];	
					} 
					
					?>	
				<form method="post" action="print_inventory.php?status=<?=$status?>" target="_new" class="form-inline">
				
						<?php
						if (isset($_POST["Submit1"])) {
							$from = $_POST['from'];
							$to = $_POST['to'];
						}
						?>
						<input type="hidden" name="from" value="<?php echo $from; ?>">
						<input type="hidden" name="to" value="<?php echo $to; ?>">
						<button class="submit" id="print">
							<i class="fa fa-print"></i> Print
						</button></a>
						</form>
						<br>
						
						<a href="inventory_report.php?status=negative" class='btn btn-default'>
							<i class="fa fa-battery-empty" style="color:gray"></i> Negative
						</button></a>
						<a href="inventory_report.php?status=critical" class='btn btn-default'>
							<i class="fa fa-battery-half" style="color:red"></i> Critical
						</button></a>

						<a href="inventory_report.php?status=good" class='btn btn-default'>
							<i class="fa fa-battery-full" style="color:lightgreen	"></i> Good
						</button></a>
						
					</div>
				
			
				<br>

				</br>

				<div class="row">

					<div class="col-lg-12">

						<table width="100%" class="table table-striped table-bordered table-hover" id="invTable">
							<thead>
								<tr>
									<th>Date</th>
									<th>Product Name</th>
									<th>Orinal Price</th>
									<th>Selling Price</th>
									<th>Quantity</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_POST["Submit1"])) {
									$from = $_POST['from'];
									$to = $_POST['to'];
									$iq = mysqli_query($conn, "SELECT * FROM product  WHERE date BETWEEN '$from' AND '$to'");
									while ($iqrow = mysqli_fetch_array($iq)) {

								?>
										<tr>
											<td class="hidden"></td>
											<td>
												<center><?php echo date('M d, Y h:i A', strtotime($iqrow['date'])); ?></center>
											</td>
											<td align="right">
												<center><?php echo $iqrow['product_name']; ?></center>
											</td>
											<td align="right">
												<center><?php echo number_format($iqrow['price'], 2); ?></center>
											</td>
											<td align="right">
												<center><?php echo number_format($iqrow['product_price'], 2); ?></center>
											</td>
											<td align="right">
												<center><?php if ($iqrow['product_qty'] >=10) {
															echo '<span class="badge badge-pill" style="background:lightgreen">' . $iqrow['product_qty'] . '</span> ';
														} else if ($iqrow['product_qty'] <= 9 && $iqrow['product_qty'] >= 3) {
																echo '<span class="badge badge-pill" style="background:red">' . $iqrow['product_qty'] . '</span> ';
														} else if ($iqrow['product_qty'] == 0) {
															echo '<span class="badge badge-pill" style="background:gray">' . $iqrow['product_qty'] . '</span> ';
														}
														?></center>
											</td>
										</tr>
									<?php
									}
								} else {
									$iq =  "SELECT * FROM product  WHERE date BETWEEN '$from' AND '$to'";
									if(isset($_GET['status'])){
										$status = $_GET['status'];
										if($status=='negative'){
											$iq  = $iq . " AND product_qty = 0";
										}
										if($status =='critical'){
											$iq  = $iq. " AND product_qty between 3 and 9";
										}
										if($status 	=='good'){
											$iq  = $iq . " AND product_qty >=10 ";
										}
									}
									$iq2  = mysqli_query($conn, $iq);
									while ($iqrow = mysqli_fetch_array($iq2)) {

									?>
										<tr>
											<td class="hidden"></td>
											<td>
												<center><?php echo date('M d, Y h:i A', strtotime($iqrow['date'])); ?></center>
											</td>
											<td align="right">
												<center><?php echo $iqrow['product_name']; ?></center>
											</td>
											<td align="right">
												<center><?php echo number_format($iqrow['price'], 2); ?></center>
											</td>
											<td align="right">
												<center><?php echo number_format($iqrow['product_price'], 2); ?></center>
											</td>
											<td align="right">
												<center><?php if ($iqrow['product_qty'] >= 10) {
															echo '<span class="badge badge-pill" style="background:lightgreen">' . $iqrow['product_qty'] . '</span> ';
														} else if ($iqrow['product_qty'] <= 9 && $iqrow['product_qty'] >= 3) {
																echo '<span class="badge badge-pill" style="background:red">' . $iqrow['product_qty'] . '</span> ';
														} else if ($iqrow['product_qty'] == 0) {
															echo '<span class="badge badge-pill" style="background:gray">' . $iqrow['product_qty'] . '</span> ';
														}
														
														?></center>
											</td>

										</tr>
								<?php
									}
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