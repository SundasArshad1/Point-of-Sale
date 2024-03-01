<?php session_start();
$_SESSION=array();
session_destroy();
$_SESSION["PID"]=array();
header("location:main.html");
?>