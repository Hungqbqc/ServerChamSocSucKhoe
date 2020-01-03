<?php
// Importing DBConfig.php file.
include 'DBConfig.php';
$json = file_get_contents('php://input');

$obj = json_decode($json, true);

if (isset($obj['email']))
{
    $email = $obj['email'];
}
if (isset($obj['password']))
{
    $password = $obj['password'];
}

// Lấy dữ liệu đăng nhập
$Sql_Query = "SELECT * FROM `taikhoan` WHERE Email = '$email' AND Password ='$password'";
// $Sql_Query = "SELECT * FROM `taikhoan` ";
// Executing SQL Query.
$result = $con->query($Sql_Query);
if ($result->num_rows > 0)
{
    echo json_encode($result->fetch_assoc());
}
else
{
    echo json_encode(0);
}
// echo json_encode($Sql_Query);
mysqli_close($con);
?>
