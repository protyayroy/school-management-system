<?php
require_once "db_con.php";
session_start();
$id = $_GET["id"];
$sql ="DELETE FROM `hclass` WHERE `HID`= $id";
// print_r($sql);exit();
if($con->query($sql) or die ("QUERY Failed")){
    header("location:handled-class.php?msg=Class Delete Successful");
}
