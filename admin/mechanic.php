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
            <h1 class="page-header">Mechanic Schedule
			<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addschedule"><i class="fa fa-plus-circle"></i> Add Schedule</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="cusTable">
                <thead>
                    <tr>
                        <th>Schedule ID</th>
                        <th>Schedule Date</th>
                        <th>Schedule Day</th>
						<th>Start Time</th>
                        <th>End Time</th>
						<th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"SELECT * from adminschedule Order By scheduleId asc");
					while($cqrow=mysqli_fetch_array($cq)){
						$pid=$cqrow['scheduleId']
					?>
						<tr>
							<td><?php echo $cqrow['scheduleId']; ?></td>
							<td><?php echo $cqrow['scheduleDate']; ?></td>
							<td><?php echo $cqrow['scheduleDay']; ?></td>
							<td><?php echo $cqrow['startTime']; ?></td>
                            <td><?php echo $cqrow['endTime']; ?></td>
							<td><?php echo $cqrow['bookAvail']; ?></td>
							<td>
								<?php if($cqrow['bookAvail'] === 'Avail') {?>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editsched_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delsched_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('schedule_button.php'); ?>
								<?php } ?>
							</td>
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
<?php include('add_modal_schedule.php'); ?>
<script src="custom.js"></script>
</body>
</html>