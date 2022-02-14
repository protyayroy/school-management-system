<?php
$did = $_POST["id"];
require_once "db_con.php";
// $id = $_GET["id"];
$sql = "DELETE FROM `staff` WHERE `SID`= $did";
$query = mysqli_query($con,$sql) or die("Query failed");
if($query){
    echo 1;
    // header("location:a_dash.php?page=view_staff");
    // echo "<script>window.open{'a_dash.php?page=view_staff','_self'};</script>";
}else{echo "not delete";}
