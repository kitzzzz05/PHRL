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
            <h1 class="page-header">Void Order
		
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="cusTable">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Product</th>
						<th>Quantity</th>
                        <th>Amount</th>
						<th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"SELECT a.*, b.* from cart_final a JOIN product b 
                    ON a.productid = b.productid Order By a.cart_id asc");
					while($cqrow=mysqli_fetch_array($cq)){
						$pid=$cqrow['id']
					?>
					<tr>
							<td><center><?php echo $cqrow['cart_id']; ?></center></td>
							<td><center><?php echo $cqrow['product_name']; ?></center></td>
							<td><center><?php echo $cqrow['quantity']; ?></center></td>
                            <td><center><?php echo number_format($cqrow['amount'], 2);  ?></center></td>
							<td><center><?php echo $cqrow['date']; ?></center></td>
                            <td><center> <?php if( $cqrow['status'] == 'Sucess'){ ?>
                            <span class='badge badge-pill' style='background:green'><?php echo $cqrow['status']; ?></span></center></td>
                         <?php   }
                         else{ ?>
                            <span class='badge badge-pill' style='background:red'><?php echo $cqrow['status']; ?></span></center></td>
                    <?php     }?>
                                
							<td><center>
                                <?php 
                               if($cqrow['status'] <> 'Voided'){
                                   ?>  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#void_<?php echo $pid; ?>"><i class="fa fa-remove"></i> Void</button>
                            	<?php   }  include('remove_modal_void.php'); ?>
							
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
<script src="custom.js"></script>
</body>
</html>