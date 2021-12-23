<!-- Delete user -->
<div class="modal fade" id="del_<?php echo $cqrow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Delete Services</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                    $a = mysqli_query($conn, "select * from services where services='" . $cqrow['services'] . "'");
                    $b = mysqli_fetch_array($a);
                    ?>
                    <h5>
                        <center>Service Name: <strong><?php echo ucwords($b['services']); ?></strong></center>
                    </h5>
                    <form role="form" method="POST" action="deleteservices.php<?php echo '?id=' . $cqrow['id']; ?>">
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

<!-- Edit User -->
<div class="modal fade" id="edit_<?php echo $cqrow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Edit Services</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                    $a = mysqli_query($conn, "select * from services where id='" . $cqrow['id'] . "'");
                    $b = mysqli_fetch_array($a);
                    ?>
                    <div style="height:10px;"></div>
                    <form role="form" method="POST" action="editservices.php<?php echo '?id=' . $cqrow['id']; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Service Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['services']); ?>" class="form-control" name="name">
                        </div>

                        <div style="height:10px;"></div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Price:</span>
                            <input type="text" style="width:400px;" class="form-control" value="<?php echo $b['price']; ?>" name="price">
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->