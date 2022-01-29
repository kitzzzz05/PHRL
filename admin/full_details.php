<?php include('session.php'); ?>


<?php
$query2 = mysqli_query($conn, "SELECT MAX(id) as id from cart_final");
$row2 = mysqli_fetch_array($query2);

date_default_timezone_set('Asia/Manila');

$date = date("Y-m-d H:i");
$datenow = date_format(new DateTime($date), "F d, Y H:i");
?>


<title>PHRL</title>

<body onload="window.print();">
	<center>
		<table width="90%" border="1" cellpadding="5" cellspacing="0">

			<tr>
				<td colspan="2" align="center" style="font-size:18px"> <img src="../LOGONAME.png" style="width:200px"></td>
			</tr>

			<tr>
				<td colspan="2">
					<center><b>Invoice</b></center>
					<table width="100%" cellpadding="5">
						<tr>
							<td width="65%">
								Name : POS Purchase<br />
								Address : None<br />
							</td>
							<td width="35%">
								Invoice Number: <?php echo "0000".$row2['id'] ?><br />
								Invoice Date : <?php echo $datenow ?><br />
								Served By : <?php echo $_SESSION['fullname'] ?><br />
							</td>
						</tr>
					</table>
					<br />
					<table width="100%" cellpadding="5" cellspacing="0">
						<tr>
							<th align="left">Sales Id</th>
							<th align="left">Item Code</th>
							<th align="left">Item Name</th>
							<th align="left">Price</th>
							<th align="left">Quantity</th>
							<th align="left">Actual Amt.</th>
							<tbody>

								<?php
								$total = 0;
								$query = mysqli_query($conn, "select * from dummy_cart");
								while ($row = mysqli_fetch_array($query)) {
								?>
									<tr>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['product_id']; ?></td>

										<td><?php echo $row['product_name']; ?></td>
										<td><?php echo number_format($row['product_price'], 2); ?></td>
										<td><?php echo $row['quantity']; ?>
										</td>
										<td><strong>
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
									<td colspan="4"><span class="pull-right"></td>
									<td></td>
								</tr>
								<tr>
								<tr>
									<td colspan="4"><span class="pull-right"></td>
									<td></td>
								</tr>
						</tr>

						<tr>

							<td colspan="4"><span class="pull-right"><strong>Grand Total</strong></span></td>
							<td><strong><span id="total"><?php echo "₱ " . number_format($total, 2); ?></span><strong></td>
						</tr>
						<tr>
							<td colspan="4"><span class="pull-right"><strong>Payment Amount</strong></span></td>
							<td><strong><span id="total"><?php echo "₱ " . number_format($_GET['prodid'], 2); ?></span><strong></td>
						</tr>
						<tr>
							<td colspan="4"><span class="pull-right"><strong></strong></span></td>
							<td><strong><span id="total"><?php echo '-------------'; ?></span><strong></td>
						</tr>
						<tr>
							<td colspan="4"><span class="pull-right"><strong>Change</strong></span></td>
							<td><strong><span id="total"><?php echo number_format($_GET['price'], 2) ?></span><strong></td>
						</tr>
				</td>
			</tr>
			<?php

			?>



			</tbody>
</body>

<style type="text/css">
	.body {
		font-family: Abel, serif;
	}
</style>