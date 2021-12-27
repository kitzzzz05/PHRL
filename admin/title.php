<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>

    <div id="wrapper">
        <?php include('navbar.php'); ?>
        <div style="height:50px;"></div>
        <div id="page-wrapper">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-green update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">

                                <center>
                                    <h4 class="text-white">
                                        <?php
                                        $sql = "SELECT * FROM customer";
                                        $qsql = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($qsql);
                                        ?>
                                    </h4>
                                </center>
                                <center>
                                    <h6 class="text-white m-b-0">Total Customer </h6>
                                </center>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-pink update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">

                                <center>
                                    <h4 class="text-white">
                                        <?php
                                        $sql = "SELECT * FROM user WHERE userid <> 1";
                                        $qsql = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($qsql);
                                        ?>
                                    </h4>
                                </center>
                                <center>
                                    <h6 class="text-white m-b-0">Total Users</h6>
                                </center>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-3" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-lite-green update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">

                                <center>
                                    <h4 class="text-white">
                                        <?php
                                        $sql = "SELECT * FROM user WHERE userid=1";
                                        $qsql = mysqli_query($conn, $sql);
                                        echo mysqli_num_rows($qsql);
                                        ?>
                                    </h4>
                                </center>
                                <center>
                                    <h6 class="text-white m-b-0">Performing Admin
                                    </h6>
                                </center>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-4" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-c-yellow update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">

                                <center>
                                    <h4 class="text-white">
                                        <?php
                                        $sql = "SELECT sum(total_purchase) as total  FROM `purchase_final` ";
                                        $qsql = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($qsql)) {
                                            echo $row['total'];
                                        }
                                        ?>
                                    </h4>
                                </center>
                                <center>
                                    <h6 class="text-white m-b-0">Total Purchase of Items</h6>
                            </div>
                            <div class="col-4 text-right">
                                <canvas id="update-chart-1" height="50"></canvas> </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5></h5>

                        </div>
                        <canvas id="fast" style="width:100%;max-width:700px"></canvas>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <canvas id="slow" style="width:100%;max-width:700px"></canvas>
                    </div>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
            </script>
            <script>
                var fastXValues = [];
                var fastYValues = [];
                var slowXValues = [];
                var slowYValues = [];
                <?php
                $query = mysqli_query($conn, "SELECT SUM(a.quantity) as quantity, b.product_name  as product_name  FROM cart_final a JOIN product b on
                a.productid = b.productid WHERE status <> 'Voided'GROUP BY a.productid");
                while ($row = mysqli_fetch_array($query)) {

                    if ($row['quantity'] >=30) {
                ?>
                        fastXValues.push("<?php echo $row['product_name'] ?>");
                        fastYValues.push(<?php echo $row['quantity']; ?>);
                    <?php  }else{
                          ?>
                          slowXValues.push("<?php echo $row['product_name'] ?>");
                          slowYValues.push(<?php echo $row['quantity']; ?>);
                  <?php  } ?>
                <?php  } ?>

                fastYValues.push(0);
                fastYValues.push(80);
                var barColors = ["red", "green", "blue", "orange", "brown","gray","pink","yellow"];

                new Chart("fast", {
                    type: "bar",
                    data: {
                        labels: fastXValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: fastYValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: "Fast Moving Items"
                        }
                    }
                });

                fastYValues.push(0);
                fastYValues.push(80);
                new Chart("slow", {
                    type: "bar",
                    data: {
                        labels: slowXValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: slowYValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: "Slow Moving Items"
                        }
                    }
                });
            </script>
            <?php include('script.php'); ?>
            <?php include('modal.php'); ?>
            <style type="text/css">
                .update-card {
                    color: blue;
                    background-color: lightgrey;
                    width: 180px;
                    border: 2px solid green;
                    padding: 50px;
                    margin: 20px;
                    height: 180px;
                }
            </style>
</body>

</html>