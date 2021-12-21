<!-- Navigation -->

<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php
	$sq=mysqli_query($conn,"select access from `user` where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
	
	$access=$srow['access'];
?>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
			         </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-lock"></span> <?php echo $user; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span>  My Account</a></li>
						<li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li>
                            <a href="title.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li> -->
                        <?php if($access == 1){  ?>
                        <li>
                            <a href="#"><i class="fa fa-copy fa-fw"></i> Appointment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="appointmentlist.php"></i> Appointment List</a>
                                </li>
                                <li>
                                    <a href="mechanic.php"></i> Mechanic Schedule</a>
                                </li>
                                <li> 
                                    <a href="customer.php">Customer</a>
                                </li>
                            </ul>
                        </li>
                         <?php } ?>
                         <?php if($access == 1 || $access == 2) {  ?>
                        <li>
                            <a href="#"><i class="fa fa-copy fa-fw"></i> Point of Sale<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="pos.php"></i>POS</a>
                                </li>
                                
                            </ul>
                        </li>
                         <?php } ?>
                         <?php if($access == 1 || $access == 3) {  ?>
						<li>
                            <a href="#"><i class="fa fa-copy fa-fw"></i> Inventory<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="product.php">Products</a>
                                </li>
                                <li>
                                    <a href="category.php"></i> Category</a>
                                </li>
                                <li>
                                    <a href="generatebarcode.php"></i> Generate Barcode</a>
                                </li>
                                <li> 
                                    <a href="supplier.php"></i> Supplier</a>
                                </li>
                            </ul>
                        </li>

                        <?php }?>
                        <?php if($access == 1){  ?>  
                        <li>
                            <a href="#"><i class="fa fa-copy fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">   
                                <li>
                                    <a href="sales.php"> Sales Report</a>
                                </li>
                                <li>
                                    <a href="inventory_report.php"> Inventory Report</a>
                                </li>
                                <li>
                                    <a href="inventory.php"> Inventory Logs Report</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-copy fa-fw"></i>Order<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">   
                                <li>
                                    <a href="purchase_order.php"> Purchase Order</a>
                                </li>
                                <li>
                                    <a href="order.php">Order data</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Master Files<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                        <li>
                                            <a href="user.php"></i> User</a>
                                        </li>
                                        
                                </li>
                               
                            </ul>
                        </li>
                        <?php } ?>
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
