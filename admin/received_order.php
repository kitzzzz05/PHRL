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
                        <h1 class="page-header">Received Order
                            <span class="pull-right">

                            </span>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                            <thead>
                                <tr>
                                    <th class="hidden"></th>
                                    <th>Id</th>
                                    <th>Purchase ID</th>
                                    <th>Product Name</th>
                                    <th>Supplier</th>
                                    <th>Quantity</th>
                                    <th>Selling Price</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pq = mysqli_query($conn, "SELECT * FROM purchase_final a join product b on b.productid=a.product_id
                                join supplier c on c.userid=b.supplierid WHERE a.status = 0 
                                AND a.purchase_id not IN (SELECT purchase_id from backorder)");
                                while ($pqrow = mysqli_fetch_array($pq)) {
                                    $pid = $pqrow['id'];
                                ?>
                                    <tr>
                                        <td class="hidden"></td>

                                        <td>
                                            <center><?php echo $pqrow['id']; ?></center>
                                        </td>

                                        <td>
                                            <center>
                                                <?php echo $pqrow['purchase_id']; ?></center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $pqrow['product_name']; ?></center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $pqrow['company_name']; ?></center>
                                        </td>

                                        <td>
                                            <center>
                                               <?php echo $pqrow['quantity_purchase'] ?>
                                                
                                            </center>
                                           
                                        </td>
                                        <td>
                                            <center>
                                            <?php echo number_format($pqrow['price'], 2);  ?>
                                            
                                            </center>
                                           
                                        </td>
                                        <td>
                                            <center><?php echo date('M d, Y h:i A', strtotime($pqrow['date'])); ?></center>
                                        </td>

                                        <td>
                                            <center>
                                                <?php if ($pqrow['status'] == 0) : ?>
                                                    <span class='badge badge-pill' style='background:#c78949 '>Pending</span>
                                                <?php endif; ?>
                                            </center>
                                        </td>

                                        <td>

                                            <center>
                                                <?php if ($pqrow['status'] == 0) : ?>
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#receivedreturn_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Receive</button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delreturn_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Cancel</button>
                                                    <?php include('received_button.php'); ?>
                                                    <?php endif; ?>
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
            <?php include('script.php'); ?>

            <script src="custom.js"></script>
</body>

</html>