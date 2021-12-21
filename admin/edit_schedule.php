<?php
	include('session.php');

    $id=$_GET['id'];

	$date=$_POST['date'];
	$start=$_POST['start'];
	$end=$_POST['end'];

    $timestamp = strtotime($date);
    $day = date('l', $timestamp);
  
	mysqli_query($conn,"update adminschedule set scheduleDate='$date', scheduleDay='$day',
     startTime='$start', endTime='$end' where scheduleId='$id'");
	?>
		<script>
			window.alert('Schedule updated successfully!');
			window.history.back();
		</script>
	<?php
    
?>