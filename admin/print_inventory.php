<?php include('session.php'); ?>


<?php

$from = $_POST['from'];
$to = $_POST['to'];

$query = mysqli_query($conn, "select * from user where userid='" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($query);

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
					<center><b>Invetory Report <?php echo strtoupper("(".$_GET['status'].")")?></b></center>
					<table width="100%" cellpadding="5">
						<tr>
							<td width="65%">
								Employee Name : <?php echo $row['fullname']; ?><br />
								Sales Date :<?php echo $from ?> - <?php echo $to ?><br />
							</td>
							<td width="35%">
								Date: <?php echo $datenow; ?><br />
								Employee Role: <?php echo $_SESSION['username'] . "- " . $_SESSION['fullname']; ?><br />
							</td>
						</tr>
					</table>
					<br />
					<table width="100%" cellpadding="5" cellspacing="0">
						<tr>
							<th align="center">Date</th>
							<th align="center">Product Name</th>
							<th align="center">Supplier Price</th>
							<th align="center">Selling Price</th>
							<th align="center">Quantity</th>
							<th align="center">Total Purchase</th>
							<tbody>

								<?php
								$total= 0;
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
											<center><?php echo $iqrow['product_qty']; ?></center>
										</td>
										<td align="right">
											<center><?php echo number_format($iqrow['product_price'] * $iqrow['product_qty'] , 2) ?></center>
										</td>
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

						<!-- <tr>
							
							<td colspan="4"><span class="pull-right"><strong>Grand Total</strong></span></td>
							<td><strong><span id="total"><?php echo number_format($total, 2); ?></span><strong></td>
						</tr> -->
						<!-- <tr>
							<td colspan="4"><span class="pull-right"><strong>Payment Amount</strong></span></td>
							<td><strong><span id="total"><?php echo number_format($_GET['prodid'], 2); ?></span><strong></td>
						</tr>
						<tr>
							<td colspan="4"><span class="pull-right"><strong></strong></span></td>
							<td><strong><span id="total"><?php echo '-------------'; ?></span><strong></td>
						</tr>
						<tr>
							<td colspan="4"><span class="pull-right"><strong>Change</strong></span></td>
							<td><strong><span id="total"><?php echo number_format($_GET['price'], 2) ?></span><strong></td>
						</tr> -->
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