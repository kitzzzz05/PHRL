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
						<span style="color:lightgreen">&nbsp;&nbsp;&nbsp;&nbsp;&#9724; 10-15 pieces </span>

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
				<button class="btn btn-default" id="print">
					<i class="fa fa-print"></i> Print
				</button></a>
				<br>

				</br>

				<div class="row">

					<div class="col-lg-12">

						<table width="100%" class="table table-striped table-bordered table-hover" id="invTable">
							<thead>
								<tr>

									<th class="hidden"></th>
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
									$iq = mysqli_query($conn, "SELECT * FROM product  WHERE date BETWEEN '$from' AND '$to' ORDER by product_qty asc");
									while ($iqrow = mysqli_fetch_array($iq)) {

								?>
										<tr <?php if ($iqrow['product_qty'] >= 10 && $iqrow['product_qty'] <= 15) {
												echo 'style="background-color : lightgreen"; ';
											} else if ($iqrow['product_qty'] <= 9 && $iqrow['product_qty'] >= 3) {
												echo 'style="background-color : #ff4d4d"; ';
											} else if ($iqrow['product_qty'] == 0) {
												echo 'style="background-color : gray"; ';
											}
											?>>
											<td class="hidden"></td>
											<td><?php echo date('M d, Y h:i A', strtotime($iqrow['date'])); ?></td>
											<td align="right"><?php echo $iqrow['product_name']; ?></td>
											<td align="right"><?php echo $iqrow['price']; ?></td>
											<td align="right"><?php echo $iqrow['product_price']; ?></td>
											<td align="right"><?php echo $iqrow['product_qty']; ?></td>
										</tr>
									<?php
									}
								} else {
									$iq = mysqli_query($conn, "SELECT * FROM product  WHERE date BETWEEN '$from' AND '$to' ORDER by product_qty asc");
									while ($iqrow = mysqli_fetch_array($iq)) {

									?>
										<tr <?php if ($iqrow['product_qty'] >= 10 && $iqrow['product_qty'] <= 15) {
												echo 'style="background-color : lightgreen"; ';
											} else if ($iqrow['product_qty'] <= 9 && $iqrow['product_qty'] >= 3) {
												echo 'style="background-color : #ff4d4d"; ';
											} else if ($iqrow['product_qty'] == 0) {
												echo 'style="background-color : gray"; ';
											}
											?>>
											<td class="hidden"></td>
											<td><?php echo date('M d, Y h:i A', strtotime($iqrow['date'])); ?></td>
											<td align="right"><?php echo $iqrow['product_name']; ?></td>
											<td align="right"><?php echo $iqrow['price']; ?></td>
											<td align="right"><?php echo $iqrow['product_price']; ?></td>
											<td align="right"><?php echo $iqrow['product_qty']; ?></td>

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