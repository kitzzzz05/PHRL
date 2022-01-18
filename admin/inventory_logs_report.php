<?php include('session.php'); ?>


<?php

$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
$row=mysqli_fetch_array($query);

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
				<center><b>Invetory Logs Report</b></center>
					<table width="100%" cellpadding="5">
						<tr>
							<td width="65%">
								Employee Name : <?php echo $row['fullname']; ?><br />
							</td>
							<td width="35%">
								Date:  <?php echo $datenow; ?><br />
								Employee Role: <?php echo $_SESSION['username']."- ".$_SESSION['fullname']; ?><br />
							</td>
						</tr>
					</table>
					<br />
					<table width="100%" cellpadding="5" cellspacing="0">
						<tr>
                            <th class="hidden"></th>
                            <th>Date</th>
                            <th>User</th>
                            <th>Name</th>
                            <th>Action</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
							<tbody>

                            <?php
                                $iq=mysqli_query($conn,"select * from inventory left join product on product.productid=inventory.productid order by inventory_date desc");
                                while($iqrow=mysqli_fetch_array($iq)){
                                ?>
                                    <tr>
                                        <td class="hidden"></td>
                                        <td><center><?php echo date('M d, Y h:i A',strtotime($iqrow['inventory_date'])); ?></center></td>
                                        <td>
                                        <?php 
                                            $u=mysqli_query($conn,"select * from `user` left join customer on customer.userid=user.userid left join supplier on supplier.userid=user.userid where user.userid='".$iqrow['userid']."'");
                                            $urow=mysqli_fetch_array($u);
                                            if($urow['access']==1){
                                                echo "Admin";
                                            }else if($urow['access']==2){
                                                echo "Cashier";
                                            }else{
                                                echo "Clerk";
                                            }
                                            
                                        ?>
                                        </td>
                                        <td align="right"><center><?php echo $iqrow['user']; ?></center></td>
                                        <td align="right"><center><?php echo $iqrow['action']; ?></center></td>
                                        <td align="right"><center><?php echo $iqrow['product_name']; ?></center></td>
                                        <td align="right"><center><?php echo $iqrow['quantity']; ?></center></td>
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