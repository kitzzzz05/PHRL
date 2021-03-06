<?php

include_once 'assets/conn/dbconnect.php';
$q = $_GET['q'];
// echo $q;

date_default_timezone_set('Asia/Manila');
$dt = new DateTime(date("Y-m-d H:i:s"));
$timeNow = $dt->format('H:i:s');
$timeNow;
$time= '08:00:00';
$res = mysqli_query($con, "SELECT * FROM adminschedule WHERE scheduleDate='$q' and bookavail='Avail' 
and startTime > '$time' order by startTime asc");


if (!$res) {
    die("Error running $sql: " . mysqli_error());
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  
  text-align: left;
  padding: 8px;
}

tr {
  background-color: #FDFEFE;
}
</style>
</head>

<body>
    <?php

    if (mysqli_num_rows($res) == 0) {

        echo "<div class='alert alert-danger' role='alert'>No schedule available. Choose other date.</div>";
    } else {
        echo "   <table class='table table-hover'>";
        echo " <thead>";
        echo " <tr>";
        echo " <th>Day</th>";
        echo " <th>Date</th>";
        echo "  <th>Start</th>";
        echo "  <th>End</th>";
        echo " <th>Availability</th>";
        echo " </tr>";
        echo "  </thead>";
        echo "  <tbody>";

        while ($row = mysqli_fetch_array($res)) {

    ?>

            <tr>
                <?php

                // $avail=null;
                if ($row['bookAvail'] != 'Avail') {
                    $avail = "danger";
                } else {
                    $avail = "primary";
                }
                echo "<td>" . $row['scheduleDay'] . "</td>";
                echo "<td>" . $row['scheduleDate'] . "</td>";
                echo "<td>" . $row['startTime'] . "</td>";
                echo "<td>" . $row['endTime'] . "</td>";
                echo "<td> <span class='label label-" . $avail . "'>Available</span></td>";
                ?>
            </tr>
    <?php
        }
    }
    ?>
    </tbody>
</body>

</html>