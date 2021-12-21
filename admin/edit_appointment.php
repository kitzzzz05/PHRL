<?php
	
	include('session.php');
	$id=$_GET['id'];
	
	$services=$_POST['services'];
	$name=$_POST['name'];
	$date=$_POST['date'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	$status=$_POST['status'];
    $timestamp = strtotime($date);
    $day = date('l', $timestamp);
	$contact = $_POST['contact'];

	$appDate = date_format(new DateTime($date),"F d Y , D");
	$appStart = date_format(new DateTime($start),"H:i");
	$appEnd = date_format(new DateTime($end),"H:i");

	mysqli_query($conn,"update adminschedule set scheduleDate='$date', scheduleDay='$day', startTime='$start', endTime='$end' where scheduleId='$id'");
	mysqli_query($conn,"update appointment set services='$services', status='$status', start='$date $start', end='$date $end' where scheduleId='$id'");
	if ($status ==='Processing'){
	mysqli_query($conn,"insert into sales (customer_name, sales_total, sales_date, sales_type,product_name) values ('$name', 100, NOW() , 'Appointment','Reservation Fee')");

	function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
		}
	$result = itexmo("$contact","Hi $name, Appointment approved on $appDate on $appStart to $appEnd at PHRL.","TR-PHRLL620136_JZ2SK", "[q5m{{q}nv");
	}

	// if ($result == ""){
	// 	echo "iTexMo: No response from server!!!
	// 	Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
	// 	Please CONTACT US for help. ";	
	// 	}else if ($result == 0){
	// 	echo "Message Sent!";
	// 	}
	// 	else{	
	// 	echo "Error Num ". $result . " was encountered!";
	// 	}
	?>
		<script>
			window.alert('Appointment updated successfully!');
			window.history.back();
		</script>
	<?php

?>