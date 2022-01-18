<!-- Add Supplier -->
<div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New Services</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addservice.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Service Name:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                            </div>
                            
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Price:</span>
                                <input type="text" style="width:400px;" class="form-control" name="price" required>
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
<!-- /.modal -->


<!-- Add Supplier -->
<div class="modal fade" id="addsupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Supplier</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addsupplier.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Company:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="address">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                            <input type="text" style="width:400px;" class="form-control" name="contact">
                        </div> 	
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contact Person:</span>
                            <input type="text" style="width:400px;" class="form-control" name="person">
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
<!-- Add Category -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="addcategory.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Category Name:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
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
<!-- /.modal -->

<!-- Add user -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="adduser.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Name:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Address:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="address">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                                <input type="text" style="width:400px;" class="form-control" name="contact">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Username:</span>
                                <input type="text" style="width:400px;" class="form-control" name="username" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Password:</span>
                                <input type="password" style="width:400px;" class="form-control" name="password" id ="pswd" 
                                oninput="verifyPassword()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <span id = "message" style="color:red"> </span><br>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Position:</span>
                                <select style="width:400px;" class="form-control" name="position">
                                    <option value="2">Cashier</option>
                                    <option value="3">Inventory Clerk</option>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Photo:</span>
                                <input type="file" style="width:400px;" class="form-control" name="image">
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

    <!-- Add user -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Name:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Address:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="address">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Contact Info:</span>
                                <input type="text" style="width:400px;" class="form-control" name="contact">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Username:</span>
                                <input type="text" style="width:400px;" class="form-control" name="username" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Password:</span>
                                <input type="password" style="width:400px;" class="form-control" name="password" id ="pswd" 
                                oninput="verifyPassword()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <span id = "message" style="color:red"> </span><br>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Position:</span>
                                <select style="width:400px;" class="form-control" name="position">
                                    <option value="2">Cashier</option>
                                    <option value="3">Inventory Clerk</option>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Photo:</span>
                                <input type="file" style="width:400px;" class="form-control" name="image">
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



<script type="text/javascript">
     function verifyPassword() { 

  var pw = document.getElementById("pswd").value;  
 

  
  if(pw.search(/[0-9]/) < 0 && pw.length >=6){
    document.getElementById("message").innerHTML = "**Your password must contain at least one digit";  
     return false;  
}
 //minimum password length validation  
  if(pw.length < 6) {  
     document.getElementById("message").innerHTML = "**Password length must be atleast 6 characters";  
     return false;  
  }
  
  if(pw.length >8 && pw.length <15 ) {  
     document.getElementById("message").innerHTML = "";  
     
  }


//maximum length of password validation  
  if(pw.length > 15) {  
     document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
     return false;  
  }
} 
</script>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>