<?php
// Importing DBConfig.php file.
include 'DBConfig.php';

// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');

// decoding the received JSON and store into $obj variable.
$obj = json_decode($json, true);

// // Populate User email from JSON $obj array and store into $email.
if (isset($_GET["loai"])) {
    $loai = $_GET["loai"];
}
if (isset($_GET["idDanhMuc"])) {
    $idDanhMuc = $_GET["idDanhMuc"];
}

$Sql_Query = '';

if (isset($loai)) {
    # code...
    switch ($loai) {
        case '1':
        LayDanhMucMonAn($con);
        break;
        case '2':
        LayDanhSachMonAn($con, $idDanhMuc);
        break;
        default:
        break;
    }
}

function LayDanhMucMonAn($con)
{
    $Sql_Query = "SELECT * FROM `danhmucmonan`";
    $result    = $con->query($Sql_Query);
    $mang      = array();
    
    if ($result->num_rows > 0) {
        // output dữ liệu trên trang
        while ($row = $result->fetch_assoc()) {
            array_push($mang, new DanhMucMonAn($row['Id'], $row['TenDanhMucMonAn'], $row['AnhDanhMuc']));
        }
        echo json_encode($mang);
    } else {
        echo 0;
    }
    mysqli_close($con);
}

function LayDanhSachMonAn($con, $idDanhMuc)
{
    $Sql_Query = "SELECT * FROM `monan` WHERE `idDanhMucMonAn` = '$idDanhMuc'";
    $result    = $con->query($Sql_Query);
    $mang      = array();
    
    if ($result->num_rows > 0) {
        // output dữ liệu trên trang
        while ($row = $result->fetch_assoc()) {
            array_push($mang, new MonAn($row['Id'], $row['TenMonAn'], $row['AnhMonAn'], $row['DonViTinh'], $row['Calo'], $row['Dam'], $row['Beo'], $row['Xo'], $row['IdDanhMucMonAn']));
        }
        echo json_encode($mang);
    } else {
        echo json_encode(0);
    }
    mysqli_close($con);
}

function LayChiTietMonAn($con, $idMonAn)
{
    $Sql_Query = "SELECT * FROM `monan` WHERE `Id` = '$idMonAn'";
    $result    = $con->query($Sql_Query);
    $mang      = array();
    
    if ($result->num_rows > 0) {
        // output dữ liệu trên trang
        while ($row = $result->fetch_assoc()) {
            array_push($mang, new MonAn($row['Id'], $row['TenMonAn'], $row['AnhMonAn'], $row['DonViTinh'], $row['Calo'], $row['Dam'], $row['Beo'], $row['Xo'], $row['IdDanhMucMonAn']));
        }
        echo json_encode($mang);
    } else {
        echo json_encode(0);
    }
    mysqli_close($con);
}



?>