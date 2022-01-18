<?php include('session.php'); ?>


<?php

$from = $_POST['from'];
$to = $_POST['to'];

$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
$row=mysqli_fetch_array($query);

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
				<center><b>Invetory Report</b></center>
					<table width="100%" cellpadding="5">
						<tr>
							<td width="65%">
								Employee Name : <?php echo $row['fullname']; ?><br />
								Inventory Date :<?php echo $from ?> - <?php echo $to ?><br />
							</td>
							<td width="35%">
								Date:  <?php echo $datenow; ?><br />
								Employee Role: <?php echo $_SESSION['username']."- ".$_SESSION['fullname']; ?><br />
							</td>
						</tr>
					</table>
					<br />
					<table width="100%" cellpadding="5" cellspacing="0">
						<tr>
							<th align="center">Sales Date</th>
                            <th align="center">Customer</th>
							<th align="center">Product Name</th>
							<th align="center">Sales Type</th>
							<th align="center">Total Purchase</th>
							<tbody>

                            <?php
							$total=0;
								$iq = mysqli_query($conn, "SELECT * FROM sales  WHERE DATE(sales_date) BETWEEN '$from' AND '$to' ORDER by sales_date asc");
                                while ($sqrow = mysqli_fetch_array($iq)) {

								?>
										<tr>
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
											<td align="right"><?php echo number_format($sqrow['sales_total'], 2);
																$total += $sqrow['sales_total']; ?></td>
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