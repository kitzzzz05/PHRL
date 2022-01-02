<?php  include('header2.php'); ?>

<?php
	session_start();

	if (isset($_SESSION['id'])){
		include('session.php');
		$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
		$row=mysqli_fetch_array($query);
		header('location:title.php');
			
	}    //erwewrrawretwtr
?>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> Please Login</center></h2>
		<hr>
		<form method="POST" action="login.php">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>
		Password: <input type="password" name="password" class="form-control" required>
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
		<span class="pull-right">
		<a data-toggle="modal" data-target="#register"><i ></i>Register</a>
		</span>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
<?php include('script2.php'); ?>
<?php include('add_modal.php'); ?>
</body>
</html>
