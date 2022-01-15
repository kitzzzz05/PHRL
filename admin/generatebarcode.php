<?php include('header.php'); ?>
<?php 

$con = mysqli_connect("localhost", "root", "", "pos");
      
    // Get corresponding first name and 
    // last name for that user id    
	$options = "";
    $query = mysqli_query($con, "SELECT product_name,barcode_id FROM product");
	while($row = mysqli_fetch_array($query))
	{
			$options = $options."<option>$row[0]</option>";
	}
    ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Generate Barcode
				<span class="pull-right">
					
				</span>
			</h1>
            <form class="form-horizontal" method="post" action="barcode.php" target="_blank">
  	<div class="form-group">
      <label class="control-label col-sm-2" for="product">Product Name:</label>
      <div class="col-sm-10">
      <select  class="form-control" id='user_id' name="user_id" onchange="GetDetail(this.value)">
	  <option>--Select Product--</option>
         		   <?php echo $options;?>
        			</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_id">Product Id:</label>
      <div class="col-sm-10">
      <input type="text" name="first_name"
						id="first_name" class="form-control"
						value="" readonly>
                         </div>
    </div>

	<div class="form-group">
      <label class="control-label col-sm-2" for="product_id">Barcode Id:</label>
      <div class="col-sm-10">
      <input type="text" name="barcode_id"
						id="barcode_id" class="form-control"
						value="" readonly>
                         </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rate">Price:</label>
      <div class="col-sm-10">          
      <input type="text" name="last_name"
						id="last_name" class="form-control"
						value="" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="print_qty">Barcode Quantity</label>
      <div class="col-sm-10">          
        <input autocomplete="OFF" type="number" class="form-control" id="print_qty"  name="print_qty" required="">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("first_name").value = "";
				document.getElementById("last_name").value = "";
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("first_name").value = myObj[0];
						
						// Assign the value received to
						// last name input field
						document.getElementById(
							"last_name").value = myObj[1];

							document.getElementById(
							"barcode_id").value = myObj[2];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "getproduct.php?user_id=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>
</body>
</html>