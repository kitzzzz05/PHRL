<!-- Delete Product -->

<?php
						$a=mysqli_query($conn,"SELECT a.*, b.*,c.*
                        FROM customer a
                        JOIN appointment b
                        On a.userid = b.userIc
                        JOIN adminschedule c
                        On b.scheduleId=c.scheduleId 
                        where c.scheduleId='$pid'");
						$b=mysqli_fetch_array($a);  

                        $zero = "0";
					?>
<div class="modal fade" id="delappointment_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete Appointment</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">

                    <h5><center>Appointment ID: <strong><?php echo $b['appId']; ?></strong></center></h5>
					<form role="form" method="POST" action="deleteappointment.php<?php echo '?id='.$pid; ?>">
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
    <div class="modal fade" id="editappontment_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit Appointment</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_appointment.php<?php echo '?id='.$pid; ?>" enctype="multipart/form-data">
                        <div class="form-group input-group">
                           
                            <span class="input-group-addon" style="width:120px;">Customer Details:</span>
                        <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['customer_name']); ?>" class="form-control" name="name" readonly>
                        <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo $b['contact'] ?>" class="form-control" name="contact" readonly>
                    </div>
                        <div style="height:10px;"></div>

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
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Services:</span>
                            <select style="width:400px;" class="form-control" name="services">
                            <option value="<?php echo $b['services']; ?>"><?php echo $b['services']; ?></option>
                                    <?php
                                    $sup = mysqli_query($conn, "select * from services");
                                    while ($suprow = mysqli_fetch_array($sup)) {
                                    ?>
                                        <option value="<?php echo $suprow['product_name']; ?>"><?php echo $suprow['product_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            
                        </div>
					
                <div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Status:</span>
                            <select style="width:400px;" class="form-control" name="status">
								<option value="<?php echo $b['status']?>"><?php echo $b['status']?></option>
                                <option value="Processing">Processing</option>
                                <option value="Done">Done</option> 
							</select> </div>
				</div>
                
</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->