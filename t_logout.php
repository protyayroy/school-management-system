<?php
session_start();

unset($_SESSION['TID']);
unset($_SESSION['teachername']);

session_destroy();
header("location:index.php");
 
