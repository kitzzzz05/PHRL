<?php include('session.php'); ?>


<?php


date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d H:i");
$datenow = date_format(new DateTime($date), "F d, Y H:i");
$query = mysqli_query($conn, "SELECT a.*,b.* ,c.* from purchase a JOIN 
product b on a.product_id = b.productid JOIN supplier c on b.supplierid = c.userid");

$row2 = mysqli_fetch_array($query);
?>


<title>PHRL</title>

<body onload="window.print();">
  <center>
    <table width="90%" border="1" cellpadding="5" cellspacing="0">

      <tr>
        <td colspan="2" align="center" style="font-size:18px"> <img src="../LOGONAME.png" style="width:200px"></td>
      </tr>
      <tr>
        <td colspan="2">
          <table width="100%" cellpadding="5">
            <tr>
              <td width="65%">
                Name : <?php echo $row2['company_name'] ?><br />
                Supplier Address : <?php echo $row2['company_address'] ?><br />
                Order By : <?php echo $_SESSION['fullname'] ?><br />
              </td>
              <td width="35%">
                Purchase Number:  <?php echo "PN-0000".$row2['purcase_id'].""?><br />
                Purchase Date : <?php echo $datenow ?><br />
                
              </td>
            </tr>
          </table>
          <br />
          <table width="100%" cellpadding="5" cellspacing="0">
            <tr>
              
              <th align="left">Sales Id</th>
              <th align="left">Product Name</th>
              <th align="left">Item Name</th>
              <th align="left">Price</th>
              <th align="left">Quantity</th>
              <th align="left">Actual Amt.</th>

              <tbody>

                <?php
                	$total = 0;
                $query2 = mysqli_query($conn, "SELECT a.*,b.* ,c.* from purchase a JOIN 
                product b on a.product_id = b.productid JOIN supplier c on b.supplierid = c.userid");
                while ($row = mysqli_fetch_array($query2)) {
                  $prodId = $row['productid'];
                ?>
                  <tr>
                  <td><?php echo $row2['purcase_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><span><?php 
                    	$subtotal = $row['purchase_quantity'] * $row['price'];
                    echo number_format($row['price'], 2);  
                    $total += $subtotal; ?></span></td>
                    <td><span><?php echo $row['purchase_quantity'] ?></span>
                    </td>
                    <td><strong><span> <?php echo number_format($row['purchase_quantity'] * $row['price'], 2) ?></span></strong></td>
                    <td>
                    </td>
                  </tr>
                <?php
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
									</tr></tr>
                <tr>
										<td colspan="5"><span class="pull-right"><strong>Grand Total</strong></span></td>
										<td><strong><span id="total"><?php echo "₱ ".number_format($total, 2); ?></span><strong></td>
									</tr>
        </td>
      </tr>
      <?php

      ?>



      </tbody>
</body>

<style type="text/css">

.body{
  font-family: Abel, serif;
}
</style>