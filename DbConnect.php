<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "chamsocsuckhoe";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    class ThucDon
{
    public $Id ;
    public $ChuTaiKhoanId ;
    public $BuaAnId ;
    public $MonAnId ;
    public $NgayAn ;
    public $MonAn ;
}

class MonAn{
    public $Id ;
    public $TenMonAn ;
}
?>