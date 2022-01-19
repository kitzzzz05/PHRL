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
            <h1 class="page-header">Slow Moving Report</h1>
        </div>
    </div>
	<form method="post" action="print_slow.php" target="_new" class="form-inline">
		<div class="form-group">
			<button class="submit" id="print" >
				<i class="fa fa-print"></i> Print
			</button></a>
		</div>
	</form>
	<br></br>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="invTable">
                <thead>
                    <tr>
						
                        <th><center>Date</center></th>
						<th><center>Product Name</center></th>
						<th><center>Quantity Sold</center></th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$query = mysqli_query($conn, "SELECT SUM(a.quantity) as quantity, b.product_name, a.date  FROM cart_final a JOIN product b on
                    a.productid = b.productid WHERE status <> 'Voided'GROUP BY a.productid");
                    while ($row = mysqli_fetch_array($query)) {
                        if ($row['quantity'] <30) {
					?>
						<tr>
							
							<td align="right"><center><?php echo    $row['date']; ?></center></td>
							<td align="right"><center><?php echo $row['product_name']; ?></center></td>
							<td align="right"><center><?php echo $row['quantity']; ?></center></td>
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
<script>
    function printPage() {
        window.print();
    }
</script>
</body>
</html>