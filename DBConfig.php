<?php
include 'MyClass.php';
 
//Define your host here.
$HostName = "localhost";
 
//Define your database name here.
$DatabaseName = "chamsocsuckhoe";
 
//Define your database username here.
$HostUser = "root";
 
//Define your database password here.
$HostPass = "";
 
$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

?>