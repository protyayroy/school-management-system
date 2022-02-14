<?php
// require_once "db_con.php";


session_start();

unset($_SESSION['AID']);
unset($_SESSION['ANAME']);

session_destroy();
header("location:admin_login.php");
 
