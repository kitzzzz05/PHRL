<!-- Add Product -->
<div class="modal fade" id="addReturnproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Return Item</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addreturnitem.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Item Name:</span>
                                <select style="width:400px;" class="form-control" name="order_num" id="order_num" required>
                                    <?php
                                    $pur = mysqli_query($conn, "SELECT * from purchase_final as a
                                                            left join product as b on b.productid=a.product_id WHERE a.status = '1' ");
                                    while ($purrow = mysqli_fetch_array($pur)) {
                                    ?>
                                        <option value="<?php echo $purrow['id']; ?>"><?php echo "(".$purrow['id'].") ". $purrow['product_name']; ?></option>
                                    <?php
                                     }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Quantity</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="quantity" autocomplete="off" required>
                            </div>

                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Return Type</span>
                                <select style="width:400px;" class="form-control" name="type" id="type">
                                    <option></option>
                                    <option value="1">Damage</option>
                                    <option value="2">Refund</option>
                                </select>
                            </div>

                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Remark:</span>
                                <textarea rows = "5" cols = "50" class="form-control" name="remark" name = "remark">
                                </textarea>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Photo:</span>
                                <input type="file" style="width:400px;" class="form-control" name="image" id="image">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
