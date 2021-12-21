<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php

if (isset($_POST['submit'])) {

    $prodid = $_POST['prodid'];
    mysqli_query($conn, "INSERT into purchase (product_id, date,purchase_quantity)
		VALUES ('$prodid',now(),1)");
}
?>

<head>


<body>
    <div id="wrapper">
        <?php include('navbar.php'); ?>
        <div style="height:50px;"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">PURCHASE ORDER
                            <span class="pull-right">

                            </span>
                        </h1>
                        <div class="col-lg-12 main-chart">
                            <br>

                            <h2> &nbsp;&nbsp;&nbsp; PRODUCT</h2>

                            <div class="panel-body">
                                <form role="form" method="POST">
                                    <div class="form-group input-group">

                                        <select style="width:400px;" class="form-control" name="prodid">
                                            <?php
                                            $cat = mysqli_query($conn, "select * from product");
                                            while ($catrow = mysqli_fetch_array($cat)) {
                                            ?>
                                                <option value="<?php echo $catrow['productid']; ?>"><?php echo $catrow['product_name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <input type="submit" name="submit" value="Add" class="btn btn-success" />
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table style="width:100%" class="table">
                                    <thead>

                                        <th>Product Name</th>
                                        <th>Supplier</th>
                                        <th>Product Price</th>
                                        <th>Purchase Qty</th>
                                        <th>SubTotal</th>
                                        <th></th>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $total = 0;
                                        $query = mysqli_query($conn, "SELECT a.*,b.* ,c.* from purchase a JOIN 
                                        product b on a.product_id = b.productid JOIN supplier c on b.supplierid = c.userid");
                                        while ($row = mysqli_fetch_array($query)) {
                                            $total = $row['purcase_id'];
                                            $prodId = $row['productid'];
                                        ?>
                                            <tr>

                                                <td><?php echo $row['product_name']; ?></td>
                                                <td><?php echo $row['company_name']; ?></td>
                                                <td><input type="text" style="width:100px;" value="<?php echo number_format($row['price'], 2);  ?>" id="price_<?php echo $total  ?>"></td>
                                                <td><input type="number" style="width:100px;" id="quantity_<?php echo $total  ?>" oninput="getChange(<?php echo $total ?>)" min="0" 
                                                value="<?php   echo $row['purchase_quantity'] > 0 ? $row['purchase_quantity'] :  1 ?>">
                                                </td>
                                                <td><strong><span class="subt" id="tag_<?php echo $total  ?>"><?php echo number_format($row['purchase_quantity'] * $row['price'], 2) ?></span></strong></td>
                                                <td><a class="btn btn-danger btn-sm" href="deletepurchase.php?id=<?php echo $row['purcase_id']; ?>">
                                                        <span class="glyphicon glyphicon-trash"></span> </a>
                                                    <a class="btn btn-primary btn-sm" onclick="getUrl(<?php echo $total?>,<?php echo  $prodId?>)">
                                                        <span class="glyphicon glyphicon-save"></span></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="5"><span class="pull-right"></td>
                                           
                                            <td><strong>
                                            <a href="processorder.php"><button class="btn btn-success" id="order" disabled>Process</button></a>
                                            <a href="testprint.php" target="_blank">
												<button class="btn btn-default" id ="print" disabled>
													<i class="fa fa-print"></i> Print
												</button></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>

                <script type="text/javascript">
                
                if(<?php echo $total > 0?>){
                    document.getElementById("order").disabled = false;
                    document.getElementById("print").disabled = false;

                }
              

                    function getUrl(id,prodId) {
                        var text1 = document.getElementById("price_" + id);
                        var text2 = document.getElementById("quantity_" + id);
                        var price = parseFloat(text1.value);
                        var quant = parseFloat(text2.value);
                        window.location.href = "savepurchase.php?id=" + id + "&prodid="+ prodId+"&price=" + price + "&quant="+quant+"";
                    }

                    function getChange(total) {

                        var text1 = document.getElementById("price_" + total);
                        var text2 = document.getElementById("quantity_" + total);

                        var first_number = parseFloat(text1.value);
                        if (isNaN(first_number)) first_number = 0;
                        var second_number = parseFloat(text2.value);
                        if (isNaN(second_number)) second_number = 0;
                        var result = second_number * first_number;
                        // document.getElementById('tag_' + total).innerHTML = "";
                        document.getElementById('tag_' + total).innerHTML = result + ".00";
                    }
                </script>
                <?php include('script.php'); ?>
                <script src="custom.js"></script>
</body>

</html>