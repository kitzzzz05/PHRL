<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
    <div id="wrapper">
        <?php include('navbar.php'); ?>
        <div style="height:50px;"></div>
        <div id="page-wrapper">

            <div class="container-fluid">
                <?php $to = date("Y-m-d");
                $from = "2021-11-23";
                $total = 0;
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order Data</h1>

                        <div align="right">
                            <form method="POST">
                                <span>FROM: </span>
                                <input type="date" name="from">
                                <span>TO: </span>
                                <input type="date" name="to">
                                <input type="submit" name="Submit1" value="submit" />
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="salesTable">
                            <thead>
                                <tr>
                                    <th class="hidden"></th>
                                    <th>Id</th>
                                    <th>Purchase ID</th>
                                    <th>Product Id</th>
                                    <th>Supplier Id</th>
                                    <th>Date</th>
                                    <th>Purchase Quantity</th>  
                                    <th>Purchase Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["Submit1"])) {
                                    $from = $_POST['from'];
                                    $to = $_POST['to'];
                                    $iq = mysqli_query($conn, "SELECT * FROM purchase_final  WHERE DATE(date) BETWEEN '$from' AND '$to' ORDER by date asc");
                                    while ($sqrow = mysqli_fetch_array($iq)) {
                                ?>
                                        <tr>
                                            <td class="hidden"></td>

                                            <td><?php echo $sqrow['id']; ?></td>

                                            <td>
                                                <?php echo $sqrow['purchase_id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $sqrow['product_id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $sqrow['supplier_id']; ?>
                                            </td>
                                            
                                          
                                            <td><?php echo date('M d, Y h:i A', strtotime($sqrow['date'])); ?></td>
                                            <td>
                                                <?php echo $sqrow['quantity_purchase']; ?>
                                            </td>
                                            <td align="right"><?php echo number_format($sqrow['total_purchase'], 2);
                                                                $total += $sqrow['total_purchase']; ?></td>
                                        </tr>
                                    <?php    } ?>
                                    <tr>
                                        <td colspan="6"><strong>Grand Total</strong></span></td>
                                        <td><strong><span class="pull-right"><?php echo number_format($total, 2) ?></span><strong></td>
                                    </tr>
                                    <?php

                                } else {
                                    $sq = mysqli_query($conn, "SELECT * FROM purchase_final  WHERE DATE(date) BETWEEN '$from' AND '$to' ORDER by date asc");
                                    while ($sqrow = mysqli_fetch_array($sq)) {
                                    ?>
                                    <tr>
                                        <td class="hidden"></td>

                                        <td><?php echo $sqrow['id']; ?></td>

                                        <td>
                                            <?php echo $sqrow['purchase_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sqrow['product_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $sqrow['supplier_id']; ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo $sqrow['quantity_purchase']; ?>
                                        </td>
                                        <td><?php echo date('M d, Y h:i A', strtotime($sqrow['date'])); ?></td>
                                        <td align="right"><?php echo number_format($sqrow['total_purchase'], 2);
                                                            $total += $sqrow['total_purchase']; ?></td>
                                   <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="6"><strong>Grand Total</strong></span></td>
                                        <td><strong><span class="pull-right"><?php echo number_format($total, 2) ?></span><strong></td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('script.php'); ?>
    <?php include('modal.php'); ?>
    <?php include('add_modal.php'); ?>
    <script src="custom.js"></script>
</body>

</html>