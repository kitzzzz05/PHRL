
<?php
						$a=mysqli_query($conn,"SELECT a.*, b.* from cart_final a JOIN product b 
                        ON a.productid = b.productid where id='$pid'");
						$b=mysqli_fetch_array($a);  
					?>
<div class="modal fade" id="void_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Void Item</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">

                    <h5><center>Order Id: <strong><?php echo $b['cart_id']; ?></strong></center></h5>
                    <h5><center>Product: <strong><?php echo $b['product_name']; ?></strong></center></h5>
                    <h5><center>Quantity: <strong><?php echo $b['quantity']; ?></strong></center></h5>
					<form role="form" method="POST" action="deletevoid.php<?php echo '?id='.$pid; ?>&quantity=<?php echo $b['quantity']?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i ></i> Confirm</button>
					</form>
                </div>
            </div>
        </div>
    </div>