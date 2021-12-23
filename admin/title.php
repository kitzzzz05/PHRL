<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
    <div id="wrapper">
        <?php include('navbar.php'); ?>
        <div style="height:50px;"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php


                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);
                $chart_data = "";
                while ($row = mysqli_fetch_array($result)) {

                    $productname[]  = $row['product_name'];
                    $sales[] = $row['product_qty'];
                }


                ?>

                <script src="//code.jquery.com/jquery-1.9.1.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
                <div style="width:30%;height:20%;text-align:center">

                    <h2 class="page-header">Analytics Reports </h2>
                    <div>Product </div>
                    <canvas id="chartjs_bar"></canvas>
                </div>
            </div>
        </div>
        <?php include('script.php'); ?>
        <?php include('modal.php'); ?>



</body>

<script type="text/javascript">
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($productname); ?>,
            datasets: [{
                backgroundColor: [
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750",
                    "#2ec551",
                    "#7040fa",
                    "#ff004e"
                ],
                data: <?php echo json_encode($sales); ?>,
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },


        }
    });
</script>

</html>