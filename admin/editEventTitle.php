<?php

require_once('bdd.php');
include('session.php');

if (isset($_POST['delete']) && isset($_POST['id'])){
	
	$id = $_POST['id'];

	$query1=mysqli_query($conn,"SELECT scheduleId  from appointment WHERE appId = $id ");
	$row2 = mysqli_fetch_array($query1);
	$schedId = $row2['scheduleId'];
	
	$sql = "DELETE FROM appointment WHERE appId = $id";
	$query = $bdd->prepare( $sql );
	$res = $query->execute();

		
	$sql2 = "DELETE FROM adminschedule WHERE scheduleId = $schedId";
	$query2 = $bdd->prepare($sql2);
	$res = $query2->execute();
	
	
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	
	$sql = "UPDATE appointment SET  services = '$title', color = '$color' WHERE appId = $id ";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}

header('location:appointmentlist.php');
?>

	
