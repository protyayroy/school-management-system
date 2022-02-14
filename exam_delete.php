<?php
require_once "db_con.php";
session_start();
$id = $_GET["id"];
$sql = "DELETE FROM `exam` WHERE `EID` = $id";
$r = $con->query($sql) or die("QUERY Falied");

if($r ==1){
    // echo $r;exit();
    // echo "<script> alert('Do you want to delete this Exam date? ') </script>";
    header("location:a_dash.php?page=view_exam");
    // $_SESSION["exam_delete"] = "Delete Successfully Exam Details";
}else {echo "Exam Details were no delete";}
