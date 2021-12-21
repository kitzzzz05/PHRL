<?php
require_once('bdd.php');
include('session.php');

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];

	$sql = "UPDATE appointment SET  start = '$start', end = '$end' WHERE appId = $id ";
	$query = $bdd->prepare( $sql );
	$sth = $query->execute();
	
	$query1=mysqli_query($conn,"SELECT scheduleId  from appointment WHERE appId = $id ");
	$row2 = mysqli_fetch_array($query1);
	$schedId = $row2['scheduleId'];

	$dt = new DateTime($start);
	$dt2 = new DateTime($end);
	$date = $dt->format('Y-m-d');
	$adminStart = $dt->format('H:i:s');
	$adminEnd = $dt2->format('H:i:s');
	$timestamp = strtotime($date);
	$day = date('l', $timestamp);

	$sql2 = "UPDATE adminschedule SET scheduleDate = '$date', scheduleDay = '$day',
	 startTime = '$adminStart', endTime = '$adminEnd' WHERE scheduleId = $schedId ";

	$query2 = $bdd->prepare($sql2);
	$sth2 = $query2->execute();
}
?>
