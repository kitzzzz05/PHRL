<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$session= $_SESSION['userSession'];
// $appid=null;
// $appdate=null;
if (isset($_GET['scheduleDate']) && isset($_GET['appid'])) {
	$appdate =$_GET['scheduleDate'];
	$appid = $_GET['appid'];
}
// on b.icuser = a.icuser
$res = mysqli_query($con,"SELECT a.*, b.* FROM adminschedule a INNER JOIN customer b
WHERE a.scheduleDate='$appdate' AND scheduleId=$appid AND b.userid=$session");
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);

//INSERT
if (isset($_POST['appointment'])) {
$userIc = mysqli_real_escape_string($con,$userRow['userid']);
$scheduleid = mysqli_real_escape_string($con,$appid);
$symptom = mysqli_real_escape_string($con,$_POST['symptom']);
$comment = mysqli_real_escape_string($con,$_POST['comment']);
$start = mysqli_real_escape_string($con,$userRow['startTime']);
$end = mysqli_real_escape_string($con,$userRow['endTime']);
$avail = "notavail";
$status= "Pending for Approval";

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

$query = "INSERT INTO appointment (  userIc , scheduleId , status, services , appComment,start,end ,payment)
VALUES ( '$userIc', '$scheduleid','$status', '$symptom', '$comment','$appdate $start','$appdate $end','$location') ";

//update table appointment schedule
$sql = "UPDATE adminschedule SET bookAvail = '$avail'  WHERE scheduleId = $scheduleid" ;
$scheduleres=mysqli_query($con,$sql);
if ($scheduleres) {
	$btn= "disable";
} 

$result = mysqli_query($con,$query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Appointment made successfully.');
</script>
<?php
header("Location: userapplist.php");
}
else
{
	echo mysqli_error($con);
?>
<script type="text/javascript">
alert('Appointment booking fail. Please try again.');
</script>
<?php
header("Location: user.php");
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>Make Appoinment</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/default/style.css" rel="stylesheet">
		<link href="assets/css/default/blocks.css" rcel="stylesheet">


		<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

		

	</head>
	<body>
		<!-- navigation -->
		<nav class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<ul class="nav navbar-nav">
							<li><a href="user.php">Home</a></li>
							<li><a href="userapplist.php?userId=<?php echo $userRow['userid']; ?>">Appointment</a></li>
						</ul>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['customer_name']; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="profile.php?userId=<?php echo $userRow['userid']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
								</li>
								<li>
									<a href="userapplist.php?userId=<?php echo $userRow['userid']; ?>"><i class="glyphicon glyphicon-file"></i> Appointment</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="userlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		  <!-- modal container start -->
		  <div class="modal fade"tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
                    <!-- modal body start -->

        </div>	 <div class="modal-body">
       
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

		
		<div class="modal" tabindex="-1"  id="myModal" role="dialog">
		  <div class="modal-dialog" role="document">
    		<div class="modal-content">
     		 <div class="modal-header">
        <h5 class="modal-title">QR payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<center>  <img src="../<?php echo "upload/gcash.jpg" ?>" height="520px;" width ="400px"> </center>
	  
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		<!-- navigation -->
		<div class="container">
			<section style="padding-bottom: 50px; padding-top: 50px;">
				<div class="row">
					<!-- start -->
					<!-- USER PROFILE ROW STARTS-->
					<div class="row">
						<div class="col-md-3 col-sm-3">
							
							<div class="user-wrapper">
								<img src="assets/img/1.jpg" class="img-responsive" />
								<div class="description">
									<h4><?php echo $userRow['customer_name']; ?></h4>
									<h5>
									<p>
										
									</p>
									<hr />
										</div>
							</div>
						</div>
						
						<div class="col-md-9 col-sm-9  user-wrapper">
							<div class="description">
								
								
								<div class="panel panel-default">
									<div class="panel-body">
									<form role="form" method="POST" enctype="multipart/form-data">
											<div class="panel panel-default">
												<div class="panel-heading">user Information</div>
												<div class="panel-body">
													
													Full Name: <?php echo $userRow['customer_name'] ?><br>
													
													Contact Number: <?php echo $userRow['contact'] ?><br>
													Address: <?php echo $userRow['address'] ?>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading">Appointment Information</div>
												<div class="panel-body">
													Day: <?php echo $userRow['scheduleDay'] ?><br>
													Date: <?php echo $userRow['scheduleDate'] ?><br>
													Time: <?php echo $userRow['startTime'] ?> - <?php echo $userRow['endTime'] ?><br>
												</div>
											</div>
											
											<div class="form-group">
												<label for="recipient-name" class="control-label">Services:</label>
												
												<select name="symptom" class = "form-control input-lg" required>
                                                    <option value="">Services</option>
                                                    <option value="FORK INSTALLATION">FORK INSTALLATION</option>
                                                    <option value="FORK CUTTING">FORK CUTTING</option>
                                                    <option value="HEADSET CLEARING">HEADSET CLEARING</option>
                                                    <option value="HANDLEBAR / STEM INSTALLATION">HANDLEBAR / STEM INSTALLATION</option>
                                                    <option value="CHANGE GROUPSET">CHANGE GROUPSET</option>
                                                    <option value="CHANGE HUB">CHANGE HUB</option>

                                                </select>
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label" style="color:red;">* Optional</label>
												<textarea class="form-control" name="comment" placeholder="More detailed"></textarea>
											</div>
											<div class="form-group">
												
												<label for="payment" class="control-label">Make Payment via GCASH: <label  style="color:blue;">(Required)</label></label>
												<p>Note: 
												<i>PHRL-Bicyle (Bike Shop) required (Php 100.00) as reservation fee to make an appointment. This is non-refundable.</i></p>
												<li>Scan QR CODE</li><li>Screen Shot and Upload Receipt</li>
												<li>Click <a href="#" data-toggle="modal" data-target="#myModal">here</a> to View GCASH</li>
											<div >
												<br>
													<input type="file" style="width:300px;" class="form-control" name="image" required>
												</div>
											</div>
											<div class="form-group">
												<input type="submit" name="appointment" id="submit" class="btn btn-primary" value="Make Appointment">
											</div>
										</form>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					<!-- USER PROFILE ROW END-->
					<!-- end -->
					<script src="assets/js/jquery.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
				</body>
			</html>
			<sct