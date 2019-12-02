<?php
// Importing DBConfig.php file.
include 'DBConfig.php';
    
    $json = file_get_contents('php://input');
    
    $obj = json_decode($json,true);
    
    $email = $obj['email'];
    
    $soNguoi = $obj['soNguoi'];
    
    // Lấy dữ liệu đăng nhập
    $Sql_Query = "SELECT * FROM `taikhoan` WHERE Email = '$email' AND Password ='$password'";
    // $Sql_Query = "SELECT * FROM `taikhoan` ";
    // Executing SQL Query.
    $result = $con->query($Sql_Query);
    if ($result->num_rows >0) {
        echo json_encode($result->num_rows);
    }
    else{
        echo json_encode(0) ; 
    }
 
 mysqli_close($con);

 
?>