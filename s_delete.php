<?php
require_once "db_con.php";
session_start();
$id = base64_decode($_GET['id']);
$s = "DELETE FROM `sub` WHERE `SID`=$id";
if($con->query($s)){
    header("location:a_dash.php?page=subject");
    // echo "yes";
}else{echo "no";}


