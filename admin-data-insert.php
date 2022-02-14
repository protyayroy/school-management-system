<?php
$nam = $_POST["name"];
$password = $_POST["pass"];

$con = mysqli_connect("localhost", "root", "", "database") or die("not connected");
$sql = "INSERT INTO `admin`(`ANAME`, `APASS`) VALUES ('$nam','$password')";
$query = mysqli_query($con,$sql) or die("Query failed");
if($query){
    echo 1;
}else{ echo 0;}