<?php
// Importing DBConfig.php file.
include 'DBConfig.php';

// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');

// decoding the received JSON and store into $obj variable.
$obj = json_decode($json, true);
if (isset($obj['email']))
{
    $email = $obj['email'];
}
if (isset($obj['password']))
{
    $password = $obj['password'];
}
if (isset($obj['name']))
{
    $name = $obj['name'];
}
if (isset($obj['ngayTao']))
{
    $ngayTao = $obj['ngayTao'];
}

// Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "INSERT INTO `taikhoan`(`Email`, `Password`, `HoTen`, `NgayTao`) VALUES  ('$email','$password','$name','$ngayTao')";
if (mysqli_query($con, $Sql_Query))
{
    echo 1;
}
else
{
    echo 0;
}
// echo json_encode($Sql_Query.''.mysqli_query($con, $Sql_Query));
mysqli_close($con);
?>
