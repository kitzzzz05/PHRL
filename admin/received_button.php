<!-- Delete Product -->
<div class="modal fade" id="receivedreturn_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    $a = mysqli_query($conn, "SELECT * from purchase_final a join product b 
                        on a.product_id = b.productid where id='$pid'");
                    $b = mysqli_fetch_array($a);
                    ?>
                    <form role="form" method="POST" action="receivedaction.php<?php echo '?id=' .$b['id']; ?>" enctype="multipart/form-data">
                        <h5>
                            <center>Purchase ID: <strong><?php echo $b['purchase_id']; ?></strong></center>
                        </h5>
                        <h5>
                            <center>Product name: <strong><?php echo $b['product_name']; ?></strong></center>
                        </h5>
                        <h5>
                            <center>Quantity : <input type="number" style="width:50px;" class="no-outline" name="quantity" min="1" max="<?= $b['quantity_purchase'] ?>" required><strong><?php echo '/ ' . $b['quantity_purchase']; ?></strong></center>
                        </h5>
                        <h5>
                            <center>Selling Price : <input type="text" style="width:70px;" class="no-outline" name="price" value="<?php echo number_format($b['product_price'], 2);?>" required></center>
                        </h5>
                       
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-success"></i> Received</button>
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