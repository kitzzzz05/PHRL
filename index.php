<?php
include_once 'assets/conn/dbconnect.php';
?>

<!-- login -->
<!-- check session -->
<?php
session_start();
// session_destroy();
if (isset($_SESSION['userSession']) != "") {
    header("Location: user/user.php");
}
if (isset($_POST['login'])) {
    $icuser = mysqli_real_escape_string($con, $_POST['icuser']);
    $password  = md5($_POST['password']);
    $res = mysqli_query($con, "SELECT * FROM customer WHERE email = '$icuser' and password = '$password'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    if ($row > 0) {
        $_SESSION['userSession'] = $row['userid']; ?>
        <script type="text/javascript">
            alert('Login Success');
        </script>
    <?php
        header("Location: user/user.php");
    } else { ?>
        <script>
            alert('wrong input ');
            header("Location: index.php");
        </script>
<?php
    }
}

?>
<!-- register -->
<?php

if (isset($_POST['signup'])) {
    $res = mysqli_query($con, "SELECT userid as icuser FROM customer");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    $userFirstName = mysqli_real_escape_string($con, $_POST['userFirstName']);
    $userLastName  = mysqli_real_escape_string($con, $_POST['userLastName']);
    $userEmail     = mysqli_real_escape_string($con, $_POST['userEmail']);
    $password         = md5($_POST['password']);
    $month            = mysqli_real_escape_string($con, $_POST['month']);
    $day              = mysqli_real_escape_string($con, $_POST['day']);
    $year             = mysqli_real_escape_string($con, $_POST['year']);
    $userDOB       = $year . "-" . $month . "-" . $day;
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $userPHone = mysqli_real_escape_string($con, $_POST['phoneNum']);
    $fullname = $userFirstName . " " . $userLastName;
    //INSERT
    $query = " INSERT INTO customer (password, customer_name,  dob, address,  contact, email)
VALUES ('$password', '$fullname', '$userDOB', '$address','$userPHone', '$userEmail') ";
    $result = mysqli_query($con, $query);
    // echo $result;
    if ($result) {
?>
        <script type="text/javascript">
            alert('Register success. Please Login to make an appointment.');
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('User already registered. Please try again <?php echo $icuser + 1 ?>');
        </script>
<?php
    }
}

include('fb-init.php');

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if (isset($_GET['code'])) {
    if (isset($_SESSION['access_token'])) {
        $access_token = $_SESSION['access_token'];
    } else {
        $access_token = $facebook_helper->getAccessToken();

        $_SESSION['access_token'] = $access_token;

        $facebook->setDefaultAccessToken($_SESSION['access_token']);
    }
    session_start();
    $_SESSION['user_id'] = '';
    $_SESSION['user_name'] = '';
    $_SESSION['user_email_address'] = '';
    $_SESSION['user_image'] = '';

    $graph_response = $facebook->get("/me?fields=name,email", $access_token);

    $facebook_user_info = $graph_response->getGraphUser();

    if (!empty($facebook_user_info['id'])) {
        $_SESSION['user_image'] = 'http://graph.facebook.com/' . $facebook_user_info['id'] . '/picture';
    }

    if (!empty($facebook_user_info['name'])) {
        $_SESSION['user_name'] = $facebook_user_info['name'];
    }

    if (!empty($facebook_user_info['email'])) {
        $_SESSION['user_email_address'] = $facebook_user_info['email'];
    }
} else {
    // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('http://127.0.0.1:3307/inventory3/user/test.php', $facebook_permissions);

    // Render Facebook login button
    $facebook_login_url = '<a href="' . $facebook_login_url . '" class="fb btn">Login with <i class="fa fa-facebook fa-fw"></i>
    </a>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHRL Bike Shop</title>
    <!-- Bootstrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style1.css" rel="stylesheet">
    <link href="assets/css/blocks.css" rel="stylesheet">
    <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
    <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
    <!-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />  -->

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="assets/css/material.css" rel="stylesheet">
</head>

<body>
    <!-- navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Float links to the right. Hide them on small screens -->
                    <div class="w3-left w3-hide-small">
                    </div>
                    <ul class="nav navbar-nav navbar-left navBar">
                        <li class="nav-item"> <a href="#product" class="w3-bar-item w3-button">Product</a></li>
                        <li class="nav-item"> <a href="#services" class="w3-bar-item w3-button">Services</a></li>
                        <li class="nav-item"> <a href="#about" class="w3-bar-item w3-button">About</a></li>
                    </ul>
                    <!-- <li><a href="adminlogin.php">Admin</a></li> -->
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>

                    <li>
                        <p class="navbar-text">Already have an account?</p>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">

                                        <form class="form" role="form" method="POST" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label class="sr-only" for="icuser">Email</label>
                                                <input type="text" class="form-control" name="icuser" placeholder="Email Address" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" value = " "class="form-control" name="password" placeholder="Password" required value = "" id ="myInput">
                                                <input type="checkbox" onclick="myFunction()"> Show Password
                                                <a href="forgot.php" class="forgot" style="text-align: center;"><center>Forgot Password?</center></a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Sign in</button>

                                                <?php echo $facebook_login_url ?>
                                                <a href="#" class="google btn">
                                                    Login with <i class="fa fa-google fa-fw"></i> </a>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navigation -->

    <!-- modal container start -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- modal content -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
          
                <!-- modal body start -->
                <div class="modal-body">

                    <!-- form start -->
                    <div class="container" id="wrap">
                        <div class="row">
                            <div class="col-md-6">

                                <h4>It's free and always will be.</h4>
                                <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">

                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <input type="text" name="userFirstName" value="" class="form-control input-lg" placeholder="First Name" required />
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <input type="text" name="userLastName" value="" class="form-control input-lg" placeholder="Last Name" required />
                                        </div>
                                    </div>

                                    <input type="text" name="userEmail" value="" class="form-control input-lg" placeholder="Your Email" required />
                                    <input type="text" name="phoneNum" value="" class="form-control input-lg" placeholder="Phone Number" required />

                                    <input type="password" name="password" value="" oninput="verifyPassword()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id= "pswd" class="form-control input-lg" placeholder="Password" required />
                                    <span id = "message" style="color:red"> </span><br>
                                    <label>Birth Date</label>
                                    <div class="row">

                                        <div class="col-xs-4 col-md-4">
                                            <select name="month" class="form-control input-lg" required>
                                                <option value="">Month</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4 col-md-4">
                                            <select name="day" class="form-control input-lg" required>
                                                <option value="">Day</option>
                                                <option value="01">1</option>
                                                <option value="02">2</option>
                                                <option value="03">3</option>
                                                <option value="04">4</option>
                                                <option value="05">5</option>
                                                <option value="06">6</option>
                                                <option value="07">7</option>
                                                <option value="08">8</option>
                                                <option value="09">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4 col-md-4">
                                            <select name="year" class="form-control input-lg" required>
                                                <option value="">Year</option>
                                                <option value="1950">1950</option>
                                                <option value="1951">1951</option>
                                                <option value="1952">1952</option>
                                                <option value="1953">1953</option>
                                                <option value="1954">1954</option>
                                                <option value="1955">1955</option>
                                                <option value="1956">1956</option>
                                                <option value="1957">1957</option>
                                                <option value="1958">1958</option>
                                                <option value="1959">1959</option>
                                                <option value="1960">1960</option>
                                                <option value="1961">1961</option>
                                                <option value="1962">1962</option>
                                                <option value="1963">1963</option>
                                                <option value="1964">1964</option>
                                                <option value="1965">1965</option>
                                                <option value="1966">1966</option>
                                                <option value="1967">1967</option>
                                                <option value="1968">1968</option>
                                                <option value="1969">1969</option>
                                                <option value="1970">1970</option>
                                                <option value="1971">1971</option>
                                                <option value="1972">1972</option>
                                                <option value="1973">1973</option>
                                                <option value="1974">1974</option>
                                                <option value="1975">1975</option>
                                                <option value="1976">1976</option>
                                                <option value="1977">1977</option>
                                                <option value="1978">1978</option>
                                                <option value="1979">1979</option>
                                                <option value="1980">1980</option>
                                                <option value="1981">1981</option>
                                                <option value="1982">1982</option>
                                                <option value="1983">1983</option>
                                                <option value="1984">1984</option>
                                                <option value="1985">1985</option>
                                                <option value="1986">1986</option>
                                                <option value="1987">1987</option>
                                                <option value="1988">1988</option>
                                                <option value="1989">1989</option>
                                                <option value="1990">1990</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="textarea" name="address" value="" class="form-control input-lg" placeholder="Address" required />

                                    <br />
                                    <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.<div class="navbar-right social-icons">


                                        </div></span>

                                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">Create my account</button>
                                    <div class="navbar-right social-icons">

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->
    <!-- modal container end -->

    <!-- 1st section start -->
    <section id="promo-1" class="content-block promo-1 min-height-600px bg-offwhite">      
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 style="color:white;">Make appointment today!</h2>
                    <p style="color:white;">This is Mechanic's Schedule. Please <span class="label label-danger">login</span> to make an appointment. </p>

                    <!-- date textbox -->

                    <div class="input-group" style="margin-bottom:10px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar" style="color:white">
                            </i>
                        </div>
                        <input class="form-control" id="date" name="date" style="color:white;" value="<?php echo date("Y-m-d") ?>" onchange="showUser(this.value)" />
                    </div>

                    <!-- date textbox end -->

                    <!-- script start -->
                    <script>
                        function showUser(str) {

                            if (str == "") {
                                document.getElementById("txtHint").innerHTML = "";
                                return;
                            } else {
                                if (window.XMLHttpRequest) {
                                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                } else {
                                    // code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function() {
                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                    }
                                };
                                xmlhttp.open("GET", "getuser.php?q=" + str, true);
                                console.log(str);
                                xmlhttp.send();
                            }
                        }
                    </script>

                    <!-- script start end -->

                    <!-- table appointment start -->
                    <div id="txtHint"><b> </b></div>

                    <!-- table appointment end -->
                </div>
                <!-- /.col -->
                <!--  <div class="col-md-6 col-md-offset-1">
                        <div class="video-wrapper">
                            <iframe width="560" height="315" src="http://www.youtube.com/embed/FEoQFbzLYhc?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div> -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    
    <div class="w3-content w3-padding" style="max-width:1564px">

        <!-- Project Section -->
        <!-- Project Section -->

        <div class="w3-container w3-padding-32" id="product">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Products</h3>
        </div>

        <div class="w3-row-padding">
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding">Pilo D716</div>
<<<<<<< Updated upstream
                    <img src="design/1.jpg" alt="House" style="width:100%;height:250px">
=======
                    <img src="design/1.jpg" alt="House" style="width:100%; height :250px">
>>>>>>> Stashed changes
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding">Water Proof Mount</div>
<<<<<<< Updated upstream
                    <img src="design/2.jpg" alt="House" style="width:100%;height:250px">
=======
                    <img src="design/2.jpg" alt="House" style="width:100%; height :250px">
>>>>>>> Stashed changes
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding">Sealed MTB Road</div>
<<<<<<< Updated upstream
                    <img src="design/3.jpg" alt="House" style="width:100%;height:250px">
=======
                    <img src="design/3.jpg" alt="House" style="width:100%; height :250px">
>>>>>>> Stashed changes
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding">Bike Lubricating Oil</div>
<<<<<<< Updated upstream
                    <img src="design/4.jpg" alt="House" style="width:100%;height:250px">
=======
                    <img src="design/4.jpg" alt="House" style="width:100%; height :250px">
>>>>>>> Stashed changes
                </div>
            </div>
        </div>

        <div class="w3-row-padding">
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding">Black Cat Inner Tube</div>
<<<<<<< Updated upstream
                    <img src="design/5.jpg" alt="House" style="width:99%;height:250px">
=======
                    <img src="design/5.jpg" alt="House" style="width:100%; height :250px">
>>>>>>> Stashed changes
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding">Bike Seat</div>
<<<<<<< Updated upstream
                    <img src="design/6.jpg" alt="House" style="width:99%;height:250px">
=======
                    <img src="design/6.jpg" alt="House" style="width:100%; height :250px">
>>>>>>> Stashed changes
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding">Bike Chain</div>
<<<<<<< Updated upstream
                    <img src="design/7.jpg" alt="House" style="width:99%;height:250px">
=======
                    <img src="design/7.jpg" alt="House" style="width:100%; height :250px">
>>>>>>> Stashed changes
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding">Bike Chain</div>
<<<<<<< Updated upstream
                    <img src="design/8.jpg" alt="House" style="width:99%;height:250px">
=======
                    <img src="design/8.jpg" alt="House" style="width:100%; height :250px">
>>>>>>> Stashed changes
                </div>
            </div>
        </div>

        <div class="w3-container w3-padding-32" id="services">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Services</h3>
        </div>
        <div class="w3-row-padding">
            <div class="w3-col l3 m6 w3-margin-bottom">
<<<<<<< Updated upstream
                <img src="design/forkinstallation.png" style="width:100%;;height:250px">
=======
                <img src="design/forkinstallation.png" style="width:100%; height :250px">
>>>>>>> Stashed changes
                <h3>FORK INSTALLATION</h3>
                <p class="w3-opacity">Bike Parts</p>
                <p>Each fork must be cut specifically according to the frame size (headset height) and the handling preferences (number of spacers to install below the stem). Especially when dealing with a new bike, it’s suggested to cut the tube leaving a slight margin, and place some extra spacers above and below the stem. This way you can test different handling characteristics by adjusting the handlebar position according to your preferences. Once you’ve found the ideal configuration, you can proceed with the final cut of the steerer tube.</p>

            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
<<<<<<< Updated upstream
                <img src="design/headsetclearing.jpg" style="width:100%;;height:250px">
=======
                <img src="design/headsetclearing.jpg" style="width:100%; height :250px">
>>>>>>> Stashed changes
                <h3>HEADSET CLEARING</h3>
                <p class="w3-opacity">HEAD</p>
                <p>Bounce the front wheel off the ground a few times: a rattling sound indicates the headset is loose. If the bars lock in the middle and point straight then it’s either too tight or the bearings are heavily worn. Holding the front wheel or frame between your legs, with the bars as leverage, carefully place a 32mm headset wrench over the locknut and turn anticlockwise</p>

            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
<<<<<<< Updated upstream
                <img src="design/grpset.jpg" alt="Mike" style="width:100%;;height:250px">
=======
                <img src="design/grpset.jpg" alt="Mike" style="width:100%; height :250px">
>>>>>>> Stashed changes
                <h3>CHANGE GROUP SET</h3>
                <p class="w3-opacity">Bike Set</p>
                <p>These are probably the first thing you would look to upgrade. So for instance is you are running a 105 Groupset you can always upgrade to a Ultegra crankset. They are much lighter, so can save quite a bit of weight. You can keep your existing 105 levers and even chain and cassette if you like. But just remember that if your chain and cassette are very old and are wearing out, by putting a new chainsets on it may not run 100% right. This is simply because mixing old with new tends to cause chain suck or slipping.</p>

            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
<<<<<<< Updated upstream
                <img src="design/chghub.jpg" alt="Dan" style="width:100%;;height:250px">
=======
                <img src="design/chghub.jpg" alt="Dan" style="width:100%; height :250px">
>>>>>>> Stashed changes
                <h3>CHANGE HUB</h3>
                <p class="w3-opacity">Bike Hub</p>
                <p>The hub is the metal tube going through the middle of the wheel that houses the moving parts. Installing a completely new hub
                    requires rebuilding the wheel from scratch, which is usually more expensive than
                    buying a new wheel. However, you can remove and service or replace the internal
                    hub components for a smoother ride and better performance.The hub is the metal tube
                    going through the middle of the wheel that houses the moving parts. Installing a
                    completely new hub requires rebuilding the wheel from scratch, which is usually more
                    expensive than buying a new wheel. However, you can remove and service or replace the
                    internal hub components for a smoother ride and better performanceThe hub is the </p>

            </div>
        </div>

        </section>
        <!-- forth section end -->
        <div class="w3-container w3-padding-32" id="about">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16"></h3>
        </div>
         <!-- Site footer -->

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6 style="color:#FF0000;">About</h6>
            <p><i>PHRL Bicycle Parts store</i> started selling various bicycle parts at the beginning of 2021 and still pursuing to distribute quality and affordable items that every cyclist needs. Our store also provides online services like reservation of an appointment for the assembling and repairing services that we offer, allowing customers to book their preferred date and time and assist them with our skilled and best bike mechanics..</p>
          </div>

          <div class="col-xs-6 col-md-3">
          <h6 style="color:#FF0000;">Contact Us</h6>

          <li class = "fa fa-map-marker"></i> <p> Blk 2 Lot 33 Mainroad Maryhomes Subdivision <span> Molino IV 4012 Bacoor, Philipphines.</span></p>
          <li class = "fa fa-phone"></i> <p><b>+6992.8222.3002</b></p>
          <li class = "fa fa-envelope"></i><p><a href="https://mail.google.com/mail/u/0/#search/phrlbicyclepartstore%40gmail.com?compose=new">phrlbicyclepartsstore@gmal.com</a></p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6 style="color:#FF0000;">Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://localhost:8080/phrl/">About Us</a></li>
              <li><a href="https://www.facebook.com/PhrlBicyclePartsStore">Contact Us</a></li>
              <li><a href="file:///C:/Users/BLANK/Desktop/Privacy.html">Privacy Policy</a></li>
              <li><a href="https://www.google.com/maps/place/Sta+monica+st/@14.3722757,120.9770042,17z/data=!3m1!4b1!4m5!3m4!1s0x3397d3fb332b69c7:0xfc3b5dfd7d2dc504!8m2!3d14.3722306!4d120.9792417/">Location</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
         <a href="#">PHRLBICYCLEPARTSTORE</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="https://www.facebook.com/PhrlBicyclePartsStore"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D"><i class="fa fa-twitter"></i></a></li>
              <li><a class="google" href="https://mail.google.com/mail/u/0/#search/phrlbicyclepartstore%40gmail.com?compose=new"><i class="fa fa-google"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').focus()
        })
    </script>
    <!-- date start -->

    <script>
        $(document).ready(function() {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
                startDate: new Date()
            })

        })
    </script>
    <script type="text/javascript">
     function verifyPassword() { 

  var pw = document.getElementById("pswd").value;  
 

  
  if(pw.search(/[0-9]/) < 0 && pw.length >7){
    document.getElementById("message").innerHTML = "**Your password must contain at least one digit";  
     return false;  
}
 //minimum password length validation  
  if(pw.length < 8) {  
     document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
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


    <style type="text/css">
        .fb {
            background-color: #3B5998;
            color: white;
            width: 100%;
        }

        .google {
            background-color: #dd4b39;
            color: white;
            width: 100%;
        }

        .site-footer
        {
        background-color:#26272b;
        padding:45px 0 20px;
        font-size:15px;
        line-height:24px;
        color:#737373;
        }
        .site-footer hr
        {
        border-top-color:#bbb;
        opacity:0.5
        }
        .site-footer hr.small
        {
        margin:20px 0
        }
        .site-footer h6
        {
        color:#fff;
        font-size:16px;
        text-transform:uppercase;
        margin-top:5px;
        letter-spacing:2px
        }
        .site-footer a
        {
        color:#737373;
        }
        .site-footer a:hover
        {
        color:#3366cc;
        text-decoration:none;
        }
        .footer-links
        {
        padding-left:0;
        list-style:none
        }
        .footer-links li
        {
        display:block
        }
        .footer-links a
        {
        color:#737373
        }
        .footer-links a:active,.footer-links a:focus,.footer-links a:hover
        {
        color:#3366cc;
        text-decoration:none;
        }
        .footer-links.inline li
        {
        display:inline-block
        }
        .site-footer .social-icons
        {
        text-align:right
        }
        .site-footer .social-icons a
        {
        width:40px;
        height:40px;
        line-height:40px;
        margin-left:6px;
        margin-right:0;
        border-radius:100%;
        background-color:#33353d
        }
        .copyright-text
        {
        margin:0
        }
        @media (max-width:991px)
        {
        .site-footer [class^=col-]
        {
            margin-bottom:50px
        }
        }
        @media (max-width:767px)
        {
        .site-footer
        {
            padding-bottom:0
        }
        .site-footer .copyright-text,.site-footer .social-icons
        {
            text-align:center
        }
        }
        .social-icons
        {
        padding-left:0;
        margin-bottom:0;
        list-style:none
        }
        .social-icons li
        {
        display:inline-block;
        margin-bottom:4px
        }
        .social-icons li.title
        {
        margin-right:15px;
        text-transform:uppercase;
        color:#96a2b2;
        font-weight:700;
        font-size:13px
        }
        .social-icons a{
        background-color:#eceeef;
        color:#818a91;
        font-size:16px;
        display:inline-block;
        line-height:44px;
        width:44px;
        height:44px;
        text-align:center;
        margin-right:8px;
        border-radius:100%;
        -webkit-transition:all .2s linear;
        -o-transition:all .2s linear;
        transition:all .2s linear
        }
        .social-icons a:active,.social-icons a:focus,.social-icons a:hover
        {
        color:#fff;
        background-color:#29aafe
        }
        .social-icons.size-sm a
        {
        line-height:34px;
        height:34px;
        width:34px;
        font-size:14px
        }
        .social-icons a.facebook:hover
        {
        background-color:#3b5998
        }
        .social-icons a.twitter:hover
        {
        background-color:#00aced
        }
        .social-icons a.google:hover
        {
        background-color:	#FF0000
        }
        @media (max-width:767px)
        {
        .social-icons li.title
        {
            display:block;
            margin-right:0;
            font-weight:600
        }
        }
        
    </style>
    <!-- date end -->

</body>

</html>