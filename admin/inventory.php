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
            <h1 class="page-header">Inventory Logs Report</h1>
        </div>
    </div>
	<button class="btn btn-default" id ="print" onclick="printPage()">
		<i class="fa fa-print"></i> Print
	</button></a>
	<br></br>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="invTable">
                <thead>
                    <tr>
						<th class="hidden"></th>
                        <th>Date</th>
						<th>User</th>
                        <th>Action</th>
						<th>Product Name</th>
						<th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$iq=mysqli_query($conn,"select * from inventory left join product on product.productid=inventory.productid order by inventory_date desc");
					while($iqrow=mysqli_fetch_array($iq)){
					?>
						<tr>
							<td class="hidden"></td>
							<td><center><?php echo date('M d, Y h:i A',strtotime($iqrow['inventory_date'])); ?></center></td>
							<td>
							<?php 
								$u=mysqli_query($conn,"select * from `user` left join customer on customer.userid=user.userid left join supplier on supplier.userid=user.userid where user.userid='".$iqrow['userid']."'");
								$urow=mysqli_fetch_array($u);
								if($urow['access']==1){
									echo "Admin";
								}
								
							?>
							</td>
							<td align="right"><center><?php echo $iqrow['action']; ?></center></td>
							<td align="right"><center><?php echo $iqrow['product_name']; ?></center></td>
							<td align="right"><center><?php echo $iqrow['quantity']; ?></center></td>
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
<script>
    function printPage() {
        window.print();
    }
</script>
</body>
</html>