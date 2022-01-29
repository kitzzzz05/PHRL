<body>
    <div id="wrapper">
        <?php include('navbar.php'); ?>
        <div style="height:50px;"></div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create DB Backup
                            <span class="pull-right">

                            </span>
                        </h1>
                        <form class="form-horizontal" method="post" action="backup.php">

                            <div class="form-group">
                                
                                <label class="control-label col-sm-2" for="product_id">Admin Password:</label>
                                <div class="col-sm-3">
                                    <input type="password" name="pswd" id="pswd" oninput="verifyPassword()" class="form-control">
                                    <span id="message" style="color:red"> </span></br>
                                    <button type="submit" id="submit" class="btn btn-default" disabled>Submit</button>
                                  
                                 
                                </div>
                            </div>

                            
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Restor DB
                            <span class="pull-right">

                            </span>
                        </h1>
                        <form class="form-horizontal" method="post" action="backup.php">

                            <div class="form-group">
                                
                                <label class="control-label col-sm-2" for="product_id">Admin Password:</label>
                                <div class="col-sm-3">
                                    <input type="password" name="pswd" id="pswd" oninput="verifyPassword()" class="form-control">
                                    <span id="message" style="color:red"> </span></br>
                                    <button type="submit" id="submit" class="btn btn-default" disabled>Submit</button>
                                  
                                 
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
        <script type="text/javascript">
            function verifyPassword() {

                var pw = document.getElementById("pswd").value;
                var pass = "admin"
                
                if (pw == pass) {
                    document.getElementById("submit").disabled = false;
                    document.getElementById("message").innerHTML = "";
                } else {
                    
                    document.getElementById("message").innerHTML = "**Wrong Password";
                    return false;


                }
            }
        </script>
        <?php include('script.php'); ?>