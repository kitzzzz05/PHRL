<?php
	include('session.php');

    $id=$_GET['id'];

	$p=mysqli_query($conn,"select * from user where userid='$id'");
	$prow=mysqli_fetch_array($p);

	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$username=$_POST['username'];
	$password =md5($_POST['password']);
	$position =$_POST['position'];


	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location=$prow['photo'];
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location=$prow['photo'];
			?>
				<script>
					window.alert('Photo not updated. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	
	
	mysqli_query($conn,"UPDATE user set fullname = '$name', access = '$position' ,address = '$address', contact = '$contact',
    password = '$password',username = '$username', photo ='$location' WHERE userid='$id' ") 

	?>
		<script>
			window.alert('User Updated successfully!');
			window.history.back();
		</script>
	<?php
?>