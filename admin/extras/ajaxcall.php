<?php

include('../../conn.php');

if (isset($_GET['addpurchase'])) {
    $suppid =  $_POST['id'];
?>

    <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                        <thead>
                            <tr>
                                <th>Product Id </th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pq = mysqli_query($conn, "select * from product left join category on category.categoryid=product.categoryid left join supplier on supplier.userid=product.supplierid left join purchase on purchase.product_id = product.productid
                         WHERE supplier.userid = '$suppid' 
                         AND product.productid not IN (SELECT product_id from purchase)");
                            while ($pqrow = mysqli_fetch_array($pq)) {
                                $pid = $pqrow['productid'];
                            ?>
                                <tr>
                                    <td>
                                        <center><?php echo $pid; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $pqrow['product_name']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $pqrow['product_qty']; ?></center>
                                    </td>
                                    <td>

                                        <input type="hidden" name="prodid" id="prodid" value="<?= $pid ?>">
                                        <center>
                                            <button type="submit" class="btn btn-success btn-sm" name="add"><i class="fa fa-add"></i>add</button>

                                        </center>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include('../script.php'); ?>
        <script src="../custom.js"></script>
    <?php }

// insert new products 
if (isset($_GET["submitpurchase"])) {
    $prodid = $_POST['prodid'];

    mysqli_query($conn, "INSERT into purchase (product_id, date,purchase_quantity)
		VALUES ('$prodid',now(),1)");

    header("location: ../purchase_order.php");
}



    ?>