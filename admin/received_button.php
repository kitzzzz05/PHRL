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
                    <form role="form" method="POST" action="receivedaction.php<?php echo '?id=' . $b['id']; ?>" enctype="multipart/form-data">
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
                            <center>Mark Up : <input type="text" style="width:70px;" class="no-outline" oninput="getMarkUp(<?php echo $b['product_price'] ?>, <?php echo  $b['purchase_id'] ?>)" id="price_<?php echo $b['purchase_id']; ?>" name="price" value="<?php echo $b['product_price']; ?>" required></center>

                        </h5>
                        <h5>
                            <span id="message_<?php echo  $b['purchase_id'] ?>" style="color:red"> 
                        <?php
                            $markUpVal = round(($b['product_price']-$b['price'])/$b['price'] * 100);
                         echo "Mark up %: ".$markUpVal;  ?> 
                        </span><br>
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


<div class="modal fade" id="delreturn_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Cancel Order</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                    $a = mysqli_query($conn, "SELECT * from purchase_final a join product b 
                        on a.product_id = b.productid where id='$pid'");
                    $b = mysqli_fetch_array($a);
                    ?>
                    <form role="form" method="POST" action="cancelorder.php<?php echo '?id=' . $b['id']; ?>" enctype="multipart/form-data">
                        <h5>
                            <center>Purchase ID: <strong><?php echo $b['purchase_id']; ?></strong></center>
                        </h5>
                        <h5>
                            <center>Product name: <strong><?php echo $b['product_name']; ?></strong></center>
                        </h5>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-success"></i> Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>

                </form>
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

<script type="text/javascript">
    function getMarkUp(prodprice,id) {
        var price = document.getElementById("price_"+id).value;

        markUpVal = (price - prodprice) / prodprice * 100;
        document.getElementById("message_"+id).innerHTML = "Mark up %: " + Math.round(markUpVal);
        console.log(markUpVal);

    }
</script>
<!-- /.modal -->