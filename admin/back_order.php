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
                        <h1 class="page-header">Back Order
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
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pq = mysqli_query($conn, "SELECT * FROM backorder a join product b on b.productid=a.product_id
                                join supplier c on c.userid=b.supplierid WHERE a.status = 'Pending' ");
                                while ($pqrow = mysqli_fetch_array($pq)) {
                                    $pid = $pqrow['backid'];
                                ?>
                                    <tr>
                                        <td class="hidden"></td>

                                        <td>
                                            <center><?php echo $pqrow['backid']; ?></center>
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
                                               <?php echo $pqrow['quantity'] ?>
                                                
                                            </center>
                                           
                                        </td>
                                       
                                        <td>
                                            <center><?php echo date('M d, Y h:i A', strtotime($pqrow['date'])); ?></center>
                                        </td>

                                        <td>
                                            <center><span class='badge badge-pill' style='background:#c78949 '>Pending</span>
                                            </center>
                                        </td>

                                        <td>

                                            <center>
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#backorder_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Receive</button>  </center>

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