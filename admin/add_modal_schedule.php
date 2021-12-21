<!-- Add Product -->
<div class="modal fade" id="addschedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Schedule</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                <form role="form" method="POST" action="addschedule.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Date:</span>
                            <input type="date" style="width:400px; " class="form-control" name="date" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Start Time:</span>
                            <input type="time" style="width:400px; " class="form-control" name="start">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">End Time:</span>
                            <input type="time" style="width:400px; " class="form-control" name="end">
                        </div>
                      
						</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" id ="send" ><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
      
    </div>

    <script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"\
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
            startDate: new Date()
        })

    })

</script>


  
<!-- /.modal -->