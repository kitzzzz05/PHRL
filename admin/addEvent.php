<?php
require_once('bdd.php');
include('session.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$name = $_POST['name'];


	$pq=mysqli_query($conn,"SELECT userid from customer where customer_name = '$name'");
	$row = mysqli_fetch_array($pq);
	$userId = $row['userid'];

	$nextId = $bdd->query("SHOW TABLE STATUS LIKE 'adminschedule'")->fetch(PDO::FETCH_ASSOC)['Auto_increment'];

	$sql1 = "INSERT INTO appointment(userIc, scheduleId, services, status, start, end, color) 
	values ('$userId',	$nextId,'$title','Processing', '$start', '$end', '$color')";
	$req = $bdd->prepare($sql1);
	$req->execute();


	// FOR ADMIN SCHEDULE
	$dt = new DateTime($start);
	$dt2 = new DateTime($end);
	$date = $dt->format('Y-m-d');
	$adminStart = $dt->format('H:i:s');
	$adminEnd = $dt2->format('H:i:s');
	$timestamp = strtotime($date);
	$day = date('l', $timestamp);

	$sql2 = "INSERT INTO adminschedule(scheduleDate, scheduleDay, startTime, endTime,bookAvail) 
	values ('$date ', '$day', '$adminStart', '$adminEnd','notAvail')";
	$req1 = $bdd->prepare($sql2);
	$req1->execute();
}
// header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
<script>
			window.alert('Schedule added successfully!');
			window.history.back();
		</script>
