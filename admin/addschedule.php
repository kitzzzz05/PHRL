<?php
	include('session.php');
	
	$date=$_POST['date'];
	$start=$_POST['start'];
	$end=$_POST['end'];

    $timestamp = strtotime($date);
    $day = date('l', $timestamp);

    $cq=mysqli_query($conn,"SELECT * from adminschedule WHERE scheduleDate ='$date'
	 and ((startTime BETWEEN '$start' AND '$end') OR (endTime BETWEEN '$start' AND '$end')) ");
	
    if(mysqli_num_rows($cq)  > 0){
        ?>
		<script>
			window.alert('Schedule Already Added!');
			window.history.back();
		</script>
	<?php
    }else{
	mysqli_query($conn,"INSERT into adminschedule (scheduleDate, scheduleDay, startTime, endTime, bookAvail)
     values ('$date', '$day', '$start','$end','Avail')");
	$userid=mysqli_insert_id($conn);
	
	?>
		<script>
			window.alert('Schedule added successfully!');
			window.history.back();
		</script>
	<?php
    }
?>