<?php

	include('session.php');
	
	$cpass=md5($_POST['cpass']);
	$repass=md5($_POST['repass']);
	$username=$_POST['username'];

	$pass = md5($_POST['password']);

	$cq=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($cq);
	$oldpass = $srow['password'];
	
	if($cpass!=$repass){
		?>
		<script>
			window.alert('New passwords did not match. Account not updated!');
			window.history.back();
		</script>
		<?php
	}
	elseif($pass != $oldpass){
		?>
		<script>
			window.alert('Current password did not match. Account not updated!');
			window.history.back();
		</script>
		<?php
	}
	else{
		
		
		mysqli_query($conn,"update `user` set username='$username', password='$cpass' where userid='".$_SESSION['id']."'");
		// mysqli_query($conn,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Update account',NOW())");
		?>
		<script>
			window.alert('Account updated successfully!');
			window.history.back();
		</script>
		<?php
	}
		
?>