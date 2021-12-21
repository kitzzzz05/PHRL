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
            <h1 class="page-header">Users
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus-circle"></i> Add User</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="cusTable">
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>Image</th>
                        <th>Full name</th>
						<th>Username</th>
                        <th>Position</th>
						<th>Contact</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$cq=mysqli_query($conn,"SELECT * from user WHERE access <> 1");
					while($cqrow=mysqli_fetch_array($cq)){
					?>
						<tr>
							<td><?php echo $cqrow['userid']; ?></td>
                            <td><img src="../<?php if(empty($cqrow['photo'])){echo "upload/profile.jpg";}else{echo $cqrow['photo'];} ?>" height="30px" width="30px;"></td>
                            <td><?php echo $cqrow['fullname']; ?></td>
							<td><?php echo $cqrow['username']; ?></td>
							<td><?php echo $cqrow['access'] == 2 ?
                            'Cashier' : 'Inventory Clerk';   ?></td>
							<td><?php echo $cqrow['contact']; ?></td>
                            <td><?php echo $cqrow['address']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $cqrow['userid']; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $cqrow['userid']; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('user_button.php'); ?>
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
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>