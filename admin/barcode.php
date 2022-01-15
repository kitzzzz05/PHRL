<?php include('session.php') ?>;


<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		include 'barcode128.php';
		$product = $_POST['user_id'];
		$rate = $_POST['last_name'];
		$prodid = $_POST['first_name'];
		$barcodeid = $_POST['barcode_id'];
		mysqli_query($conn,"UPDATE product set barcode_id  = '$barcodeid' WHERE productid='$prodid'");

		for($i=1;$i<=$_POST['print_qty'];$i++){
			echo "<p class='inline'><span ><b>Item: $product</b></span>".bar128(stripcslashes($_POST['barcode_id']))."<span ><b>Price: ".$rate." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
		}

		?>
	</div>
</body>
</html>