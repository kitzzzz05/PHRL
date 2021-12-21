<?php
	include('session.php');
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$username=$_POST['username'];
	$password =md5($_POST['password']);
	$position =$_POST['position'];

	$fileInfo = PATHINFO($_FILES["image"]["name"]);
	
	if (empty($_FILES["image"]["name"])){
		$location="";
	}
	else{
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
			$location = "upload/" . $newFilename;
		}
		else{
			$location="";
			?>
				<script>
					window.alert('Photo not added. Please upload JPG or PNG photo only!');
				</script>
			<?php
		}
	}
	mysqli_query($conn,"insert into user (fullname, access,address, contact,password,username,photo) 
	values ('$name','$position', '$address', '$contact','$password','$username','$location')");
	
	?>
		<script>
			window.alert('User added successfully!');
			window.history.back();
		</script>
	<?php
?>