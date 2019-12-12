<?php
// Importing DBConfig.php file.
include 'DBConfig.php';

// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');

// decoding the received JSON and store into $obj variable.
$obj = json_decode($json, true);

// Populate User email from JSON $obj array and store into $email.
if (isset($obj["loai"])) {
    $loai = $obj["loai"];
}
if (isset($obj["idDanhMuc"])) {
    $idDanhMuc = $obj["idDanhMuc"];
}
if (isset($obj["anhDanhMuc"])) {
    $anhDanhMuc = $obj["anhDanhMuc"];
}
if (isset($obj["tenDanhMucMonAn"])) {
    $tenDanhMucMonAn = $obj["tenDanhMucMonAn"];
}

$Sql_Query = '';

if (isset($loai)) {
    # code...
    switch ($loai) {
        case 'LAY_DANH_MUC_MON_AN':
            LayDanhMucMonAn($con);
            break;
        case '2':
            LayDanhSachMonAn($con, $idDanhMuc);
            break;
        case 'THEM_DANH_MUC_MON_AN':
            ThemDanhMucMonAn($con, $tenDanhMucMonAn, $anhDanhMuc);
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

// Thêm danh mục món ăn
function ThemDanhMucMonAn($con, $tenDanhMucMonAn, $anhDanhMuc)
{
    $Sql_Query = "INSERT INTO `danhmucmonan`( `TenDanhMucMonAn`, `AnhDanhMuc`) VALUES ('$tenDanhMucMonAn','$anhDanhMuc')";
    $result    = $con->query($Sql_Query);
    if ($result) {
        echo 1;
    }
    else {
        echo 0;
    }
    mysqli_close($con);
}


?>