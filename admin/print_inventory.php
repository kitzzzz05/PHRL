<?php include('session.php'); ?>


<?php

$from = $_POST['from'];
$to = $_POST['to'];

$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
$row=mysqli_fetch_array($query);

$date = date("Y-m-d H:i");
$datenow = date_format(new DateTime($date), "F d, Y");
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
				<center><b>Invetory Report</b></center>
					<table width="100%" cellpadding="5">
						<tr>
							<td width="65%">
								Employee Name : <?php echo $row['fullname']; ?><br />
								Inventory Date : From: <?php echo $from ?> - To: <?php echo $to ?><br />
							</td>
							<td width="35%">
								Employee Role: <?php echo $row['username']; ?><br />
							</td>
						</tr>
					</table>
					<br />
					<table width="100%" cellpadding="5" cellspacing="0">
						<tr>
							<th align="center">Date</th>
							<th align="center">Product Name</th>
							<th align="center">Original Price</th>
							<th align="center">Selling Price</th>
							<th align="center">Quantity</th>
							<tbody>

                            <?php
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
											<td><center><?php echo date('M d, Y h:i A', strtotime($iqrow['date'])); ?></center></td>
											<td align="right"><center><?php echo $iqrow['product_name']; ?></center></td>
											<td align="right"><center><?php echo number_format( $iqrow['price'], 2); ?></center></td>
											<td align="right"><center><?php echo number_format( $iqrow['product_price'], 2); ?></center></td>
											<td align="right"><center><?php echo $iqrow['product_qty']; ?></center></td>
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
							<td><strong><span id="total"><?php  echo number_format($_GET['price'], 2)?></span><strong></td>
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