<?php
session_start();
// include_once '../assets/conn/dbconnect.php';

echo $_SESSION['user_id'];
echo $_SESSION['user_name'];
echo $_SESSION['user_email_address'];
echo $_SESSION['user_image'];
?>