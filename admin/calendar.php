<?php
require_once('bdd.php');
include_once('session.php');

$sql= "SELECT  b.appId as id, b.services as title, b.start, b.end, b.color , a.customer_name as name
FROM customer a
JOIN appointment b
On a.userid = b.userIc
JOIN adminschedule c
On b.scheduleId=c.scheduleId
WHERE b.status <> 'Pending for Approval'";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();


$pq=mysqli_query($conn,"SELECT customer_name from customer");
		$options = "";
		while($row = mysqli_fetch_array($pq))
		{
				$options = $options."<option>$row[0]</option>";
		}
		

?>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />

    <!-- Page Content -->
    <div class="container">		
        </div>
        <!-- /.row -->
	<!-- Modal -->
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
			  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
					 	<select name="name" class="form-control" id="name">
					<option>--Select Customer--</option>
         		   <?php echo $options;?>
        			</select>
					</div>
				  </div>
			  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Services</label>
					<div class="col-sm-10">
					  <!-- <input type="text" name="title" class="form-control" id="title" placeholder="Title"> -->
					  <select class="form-control" name="title" id="title">
                                <option value="FORK INSTALLATION">FORK INSTALLATION</option>
                                                    <option value="FORK CUTTING">FORK CUTTING</option>
                                                    <option value="HEADSET CLEARING">HEADSET CLEARING</option>
                                                    <option value="HANDLEBAR / STEM INSTALLATION">HANDLEBAR / STEM INSTALLATION</option>
                                                    <option value="CHANGE GROUPSET">CHANGE GROUPSET</option>
                                                    <option value="CHANGE HUB">CHANGE HUB</option>
	
							</select>
					</div>
					</div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
</div>
		
		
	
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit</h4>
			  </div>
			  <div class="modal-body">
			  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Name</label>
					<div class="col-sm-10">
					  <input type="text" name="name" class="form-control" id="name" 
					   value="<?php echo $b['customer_name']?>" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Services</label>
					<div class="col-sm-10">
					  <!-- <input type="text" name="title" class="form-control" id="title" placeholder="Title"> -->
					  <select class="form-control" name="title" id="title">
								<option value="<?php echo $b['services']?>"><?php echo $b['services']?></option>
                                <option value="FORK INSTALLATION">FORK INSTALLATION</option>
                                                    <option value="FORK CUTTING">FORK CUTTING</option>
                                                    <option value="HEADSET CLEARING">HEADSET CLEARING</option>
                                                    <option value="HANDLEBAR / STEM INSTALLATION">HANDLEBAR / STEM INSTALLATION</option>
                                                    <option value="CHANGE GROUPSET">CHANGE GROUPSET</option>
                                                    <option value="CHANGE HUB">CHANGE HUB</option>
	
							</select>
					</div>
					</div>
					<div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start</label>
					<div class="col-sm-10">
					<input type="text" name="start" class="form-control" id="start" placeholder="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End</label>
					<div class="col-sm-10">
					<input type="text" name="end" class="form-control" id="end" placeholder="end" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
	
    <!-- <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
	
	<!-- FullCalendar -->
	<!-- <script src='js/moment.min.js'></script> -->
	<!-- <script src='js/fullcalendar.min.js'></script> -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
 
<div class="modal fade" id="addproduct" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        
	  <div class="row">
            <div class="col-lg-12 text-center">

                <div id="calendar" class="col-centered">
                </div>
            </div></div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <input type="submit" class="btn btn-warning" id="doc-update" value="Update"> -->
     </div>
    </div>
  </div>
</div>
	
	<script>
	$(document).on('show.bs.modal', '.modal', function() {
  const zIndex = 1040 + 10 * $('.modal:visible').length;
  $(this).css('z-index', zIndex);
  setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack'));
});

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header:{
      		left:'prev,next today',
     		center:'title',
     		right:'month,agendaWeek,agendaDay'
     },
	 defaultView: 'agendaWeek',
	 editable: true, 
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			editOverlap: false,
			hiddenDays: [0],
			minTime:'06:00',
			maxTime:'21:00',
			eventOverlap:false,
			//to prevent selecting previous dates
			select: function(start, end) {
				if(start.isBefore(moment())) {
        $('#calendar').fullCalendar('unselect');
        return false;
    }
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #start').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit #end').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});  
			},
			eventDrop: function(event, delta, revertFunc) { 

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) {

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Saved');
					}
				}
			});
		}
		
	});

</script>

</body>

</html>
