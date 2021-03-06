<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Appointment List
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus-circle"></i> View Calendar</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
                    <th>App ID</th>
                        <th>Name</th>
                        <th>Services</th>
						<th>Day</th>
                        <th>Date</th>
						<th>Start</th>
						<th>End</th>
                        <th>Payment</th>
                        <th>Status</th>
						<th>Action</th>       
                    </tr>
                </thead>
                <tbody>
				<?php
					$pq=mysqli_query($conn,"SELECT a.*, b.*,c.*
                    FROM customer a
                    JOIN appointment b
                    On a.userid = b.userIc
                    JOIN adminschedule c
                    On b.scheduleId=c.scheduleId
                    Order By appId desc");
					while($pqrow=mysqli_fetch_array($pq)){
                        $pid = $pqrow['scheduleId'];

					?>
						 <tr>
                         <td><center> <?php echo $pqrow['appId']; ?></center> </td>
							<td><center> <?php echo $pqrow['customer_name']; ?></center></td>
							<td><center> <?php echo $pqrow['services']; ?></center></td>
							<td><center> <?php echo $pqrow['scheduleDay']; ?></center> </td>
							<td><center> <?php echo $pqrow['scheduleDate']; ?></center> </td>
							<td><center> <?php echo $pqrow['startTime']; ?></center> </td>
							<td><center> <?php echo $pqrow['endTime']; ?></center> </td>
                            <td><center> <img src="../<?php if(empty($pqrow['payment'])){echo "upload/noimage.jpg";}else{echo $pqrow['payment'];} ?>" height="30px" width="30px;"></td>
						
                            <td><center> <span class='badge badge-pill' style='background:gray'><?php 
                            echo $pqrow['status']; ?></span></center></td>
							<td><center>
                                <?php if ($pqrow['status']==='Processing' ||$pqrow['status']==='Pending for Approval' ) {?>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editappontment_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delappointment_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('appointment_button.php'); ?>
                                <?php }
                                else {
                                    ?>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delappointment_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('appointment_button.php'); ?>

                              <?php }?>
							</td> </center>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('calendar.php'); ?>
<script src="custom.js"></script>
</body>
</html>