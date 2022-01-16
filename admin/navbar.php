<!-- Navigation -->

<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php
$sq = mysqli_query($conn, "select access from `user` where userid='" . $_SESSION['id'] . "'");
$srow = mysqli_fetch_array($sq);

$access = $srow['access'];
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
                <li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span> My Account</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="title.php"><i class="fa fa-home fa-fw"></i> Home</a>
                </li>
                <?php if ($access == 1) {  ?>
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
                <?php if ($access == 1 || $access == 2) {  ?>
                    <li>
                        <a href="#"><i class="fa fa-copy fa-fw"></i> Point of Sale<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="pos.php"></i>POS</a>
                            </li>
                            <li>
                                <a onclick="myFunction()">Void Order</a>
                                <script>
                                    function myFunction() {
                                        var promptCount = 0;
                                        window.pw_prompt = function(options) {
                                            var lm = options.lm || "Password:",
                                                bm = options.bm || "Submit";
                                            if (!options.callback) {
                                                alert("No callback function provided! Please provide one.")
                                            };

                                            var prompt = document.createElement("div");
                                            prompt.className = "pw_prompt";

                                            var submit = function() {
                                                options.callback(input.value);
                                                document.body.removeChild(prompt);
                                            };

                                            var label = document.createElement("label");
                                            label.textContent = lm;
                                            label.for = "pw_prompt_input" + (++promptCount);
                                            prompt.appendChild(label);

                                            var input = document.createElement("input");
                                            input.id = "pw_prompt_input" + (promptCount);
                                            input.type = "password";
                                            input.addEventListener("keyup", function(e) {
                                                if (e.keyCode == 13) submit();
                                            }, false);
                                            prompt.appendChild(input);

                                            var button = document.createElement("button");
                                            button.textContent = bm;
                                            button.addEventListener("click", submit, false);
                                            prompt.appendChild(button);

                                            document.body.appendChild(prompt);
                                        };

                                        pw_prompt({
                                            lm: "Please enter admin password:",
                                            callback: function(password) {
                                                if (password == 'admin') {
                                                    window.location.href = "void.php";
                                                }
                                            }
                                        });
                                    }
                                </script>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($access == 1 || $access == 3) {  ?>
                    <li>
                        <a href="#"><i class="fa fa-copy fa-fw"></i> Inventory<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="product.php">Products</a>
                            </li>
                            <li>
                                <a href="category.php"></i> Product Line</a>
                            </li>
                            <li>
                                <a href="generatebarcode.php"></i> Generate Barcode</a>
                            </li>
                            <li>
                                <a href="supplier.php"></i> Supplier</a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>
                <?php if ($access == 1) {  ?>
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
                                <a href="inventory.php"> Audit Trails </a>
                            </li>
                        </ul>
                    </li>
                    
                    <?php }
                    if($access == 1 || $access == 3) {?>
                    <li>
                        
                        <a href="#"><i class="fa fa-copy fa-fw"></i>Order<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="purchase_order.php"> Purchase Order</a>
                            </li>
                            <li>
                                <a href="order.php">Order data</a>
                            </li>
                            <li>
                                <a href="received_order.php">Recevied Order</a>
                            </li>
                            <li>
                                <a href="back_order.php">Back Order</a>
                            </li>
                            <li>
                                <a href="return.php">Return Order</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                } 
                 if($access==1){ ?>
                 <li>
                        <a href="#">Master Files<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                            <li>
                                <a href="user.php"></i> User Accounts</a>
                            </li>
                            <li>
                                <a href="database.php"></i> Backup and Restore</a>
                            </li>

                    </li>
                    <li>
                    <li>
                        <a href="services.php"></i> Services</a>
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
<style type="text/css">
    .pw_prompt {
        position: absolute;
        top: 30%;
        left: 50%;
        margin-left: -100px;
        padding: 15px;
        width: 300px;
        border: 1px solid black;
        background-color: lightblue;
    }

    .pw_prompt label {
        display: block;
        margin-bottom: 5px;
    }

    .pw_prompt input {
        margin-bottom: 10px;
    }
</style>