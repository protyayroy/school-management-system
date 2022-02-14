<?php
require_once "db_con.php";
session_start();
$id = base64_decode($_GET["id"]);
$sql ="DELETE FROM `class` WHERE `ID`=$id";
// print_r($sql);exit();
if($con->query($sql)){
    header("location:a_dash.php?page=class");
}
