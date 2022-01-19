<?php include('session.php'); ?>


<?php

$query = mysqli_query($conn, "select * from user where userid='" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($query);

date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d H:i");
$datenow = date_format(new DateTime($date), "F d, Y H:i");
?>


<title>PHRL</title>

<body onload="window.print();">
    <center>
        <table width="90%" border="1" cellpadding="5" cellspacing="0">

            <tr>
                <td colspan="2" align="center" style="font-size:18px"> <img src="../LOGONAME.png" style="width:200px"></td>
            </tr>

            <tr>
                <td colspan="4">
                    <center><b>Fast Moving Report</b></center>
                    <table width="100%" cellpadding="5">
                        <tr>
                            <td width="65%">
                                Employee Name : <?php echo $row['fullname']; ?><br />
                            </td>
                            <td width="35%">
                                Date: <?php echo $datenow; ?><br />
                                Employee Role: <?php echo $_SESSION['username'];?><br />
                            </td>
                        </tr>
                    </table>
                    <br />
                    <table width="100%" cellpadding="5" cellspacing="0">
                        <tr>
                            <th class="hidden"></th>
                            <th>
                                <center>Date</center>
                            </th>
                            <th>
                                <center>Product Name</center>
                            </th>
                            <th>
                                <center>Quantity Sold</center>
                            </th>
                            <tbody>

                                <?php
                                $query = mysqli_query($conn, "SELECT SUM(a.quantity) as quantity, b.product_name, a.date  FROM cart_final a JOIN product b on
                           a.productid = b.productid WHERE status <> 'Voided'GROUP BY a.productid");
                                while ($row = mysqli_fetch_array($query)) {
                                    if ($row['quantity'] >= 30) {
                                ?>
                                        <tr>
                                            <td class="hidden"></td>
                                            <td align="right">
                                                <center><?php echo    $row['date']; ?></center>
                                            </td>
                                            <td align="right">
                                                <center><?php echo $row['product_name']; ?></center>
                                            </td>
                                            <td align="right">
                                                <center><?php echo $row['quantity']; ?></center>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="4"><span class="pull-right"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td colspan="4"><span class="pull-right"></td>
                                    <td></td>
                                </tr>
                        </tr>
                </td>
            </tr>
            <?php

            ?>



            </tbody>
</body>

<style type="text/css">
    .body {
        font-family: Abel, serif;
    }
</style>