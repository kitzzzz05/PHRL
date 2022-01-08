<!-- Delete Product -->
<div class="modal fade" id="backorder_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Received Product</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                    $a = mysqli_query($conn, "SELECT * from backorder bc join purchase_final a on a.purchase_id = bc.purchase_id join product b 
                        on bc.product_id = b.productid where backid='$pid'");
                    $b = mysqli_fetch_array($a);
                    ?>
                    <form role="form" method="POST" action="backordered_action.php<?php echo '?id=' .$b['id']; ?>" enctype="multipart/form-data">
                        <h5>
                            <center>Purchase ID: <strong><?php echo $b['purchase_id']; ?></strong></center>
                            <input type="hidden" name="backid" value="<?php echo $b['backid'];?>">
                        </h5>
                        <h5>
                            <center>Product name: <strong><?php echo $b['product_name']; ?></strong></center>
                        </h5>
                        <h5>
                            <center>Quantity : <input type="number" style="width:50px;" class="no-outline" name="quantity" min="1" max="<?= $b['quantity'] ?>" required><strong><?php echo '/ ' . $b['quantity']; ?></strong></center>
                        </h5>
                        <h5>
                            <center>Selling Price : <input type="text" style="width:70px;" class="no-outline" name="price" value="<?php echo number_format($b['product_price'], 2);?>" required></center>
                        </h5>
                       
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-success"></i> Back Order</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    input {
        border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;

    }

    .no-outline:focus {
        outline: none;
    }
</style>
<!-- /.modal -->