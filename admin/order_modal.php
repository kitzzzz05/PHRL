<!-- Delete Order -->
<div class="modal fade" id="delorder_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete Order Purchase</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from purchase_final where id='$pid'");
						$b=mysqli_fetch_array($a);
					?>
                    <div class="container-fluid">
					    <h5><center>Purchase Order#: <strong><?php echo $pid; ?></strong></center></h5> 
                    </div>
					<form role="form" method="POST" action="deleteorder.php<?php echo '?id='.$pid; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit Order -->
<div class="modal fade" id="editorder_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Order</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from purchase_final left join product on product.productid=purchase_final.product_id left join supplier on supplier.userid=purchase_final.supplier_id where id='$pid'");
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_order.php<?php echo '?id='.$pid; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Product Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['product_name']); ?>" class="form-control" name="name" disabled>
                        </div>
						<div style="height:10px;"></div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Supplier:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['company_name']); ?>" class="form-control" name="company_name" disabled>
                        </div>
						<div style="height:10px;"></div>
						
                        <?php if($_SESSION['id'] == 1){ ?>
                            <div style="height:10px;"></div>
                            <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Selling Price:</span>
                            <input type="text" style="width:400px;" class="form-control" name="sellprice" value="<?php echo $b['product_price'] ?>"required>
                        </div>
                      <?php }?>
                      <?php if($_SESSION['id']  <>1){ ?>
                            <div style="height:10px;"></div>
                            <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Selling Price:</span>
                            <input type="text" style="width:400px;" class="form-control" name="sellprice" value="<?php echo $b['product_price'] ?>" readonly>
                        </div>
                      <?php }?>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Quantity Purchase:</span>
                            <input type="number" style="width:400px;" value="<?php echo $b['quantity_purchase'] ?>" class="form-control" name="qty">
                        </div>
						<div style="height:10px;"></div>					
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">SUbTotal:</span>
                            <input type="text" style="width:400px;" class="form-control" name="subtotal" value="<?php echo number_format($b['total_purchase'], 2) ?>" disabled>
                        </div>
						<div style="height:10px;"></div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->





