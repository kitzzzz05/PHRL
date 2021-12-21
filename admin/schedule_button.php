<!-- Delete Product -->

<?php
						$a=mysqli_query($conn,"SELECT * from adminschedule where scheduleId='$pid'");
						$b=mysqli_fetch_array($a);  
					?>
<div class="modal fade" id="delsched_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete Schedule</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">

                    <h5><center>Scheudle ID: <strong><?php echo $b['scheduleId']; ?></strong></center></h5>
					<form role="form" method="POST" action="deletesched.php<?php echo '?id='.$pid; ?>">
                </div>                 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit Appointment -->
<div class="modal fade" id="editsched_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Mechanic Schedule</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="edit_schedule.php <?php echo '?id='.$pid; ?>" enctype="multipart/form-data">
						<div class="container-fluid">
					    
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Date:</span>
                            <input type="date" style="width:400px; " class="form-control" value ="<?php echo $b['scheduleDate'] ?>" name="date" required>
                        </div>
                        <div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Start Time:</span>
                            <input type="time" style="width:400px; " class="form-control" value ="<?php echo $b['startTime'] ?>" name="start">
                        </div>
                        <div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">End Time:</span>
                            <input type="time" style="width:400px; " class="form-control" value ="<?php echo $b['endTime'] ?>" name="end">
                        </div>
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>
    </div>
<!-- /.modal -->




