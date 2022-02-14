<?php
require_once "db_con.php";
session_start();
$id = $_GET['id'];
$s = "DELETE FROM `student` WHERE `SID`=$id";
if($con->query($s)){
    header("location:view-student.php?sm=Delete Successful");
    // echo "yes";
}else{echo "no";}


