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
        // Danh mục món ăn
        case 'LAY_DANH_MUC_MON_AN':
            LayDanhMucMonAn($con);
            break;
        case 'THEM_DANH_MUC_MON_AN':
            ThemDanhMucMonAn($con, $tenDanhMucMonAn, $anhDanhMuc);
            break;
        case 'SUA_DANH_MUC_MON_AN':
            SuaDanhMucMonAn($con,$idDanhMuc, $tenDanhMucMonAn, $anhDanhMuc);
            break;
        case 'XOA_DANH_MUC_MON_AN':
            XoaDanhMucMonAn($con,$idDanhMuc);
            break;
        // Món ăn
        case 'LAY_MON_AN':
            {
                if (isset($obj["idDanhMuc"])) {
                    $idDanhMuc = $obj["idDanhMuc"];
                }
                LayDanhSachMonAn($con, $idDanhMuc);
            break;
        }
        case 'THEM_MON_AN':
            {
                $monAn = new MonAn($obj['Id'], $obj['TenMonAn'], $obj['AnhMonAn'], $obj['DonViTinh'], $obj['Calo'], $obj['Dam'], $obj['Beo'], $obj['Xo'], $obj['IdDanhMucMonAn']);
                ThemMonAn($con, $monAn);
                break;
            }
        case 'SUA_MON_AN':
            {
                $monAn = new MonAn($obj['Id'], $obj['TenMonAn'], $obj['AnhMonAn'], $obj['DonViTinh'], $obj['Calo'], $obj['Dam'], $obj['Beo'], $obj['Xo'], $obj['IdDanhMucMonAn']);
                SuaMonAn($con,$monAn);
                // echo json_encode($obj);

            break;
        }
        case 'XOA_MON_AN':
        {
            if (isset($obj["idMonAn"])) {
                $idMonAn = $obj["idMonAn"];
            }
            XoaMonAn($con,$idMonAn);
            break;
        }
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

// Thêm danh mục món ăn
function SuaDanhMucMonAn($con, $id, $tenDanhMucMonAn, $anhDanhMuc)
{
    // Nếu không chọn ảnh thì k update ảnh
    if ($anhDanhMuc === '') {
        $Sql_Query = "UPDATE `danhmucmonan` SET `TenDanhMucMonAn`='$tenDanhMucMonAn' WHERE `Id`='$id'";
    }
    else {
        $Sql_Query = "UPDATE `danhmucmonan` SET `TenDanhMucMonAn`='$tenDanhMucMonAn',`AnhDanhMuc`='$anhDanhMuc' WHERE `Id`='$id'";
    }
    $result    = $con->query($Sql_Query);
    if ($result) {
        echo 1;
    }
    else {
        echo 0;
    }
    mysqli_close($con);
}

// Xóa danh mục món ăn
function XoaDanhMucMonAn($con, $id)
{
    $Sql_Query = "DELETE FROM `danhmucmonan` WHERE `Id`='$id'";
    $result    = $con->query($Sql_Query);
    if ($result) {
        echo 1;
    }
    else {
        echo 0;
    }
    mysqli_close($con);
}

// Thêm danh mục món ăn
function ThemMonAn($con, $monAn)
{
    $Sql_Query = "INSERT INTO `monan`( `TenMonAn`, `AnhMonAn`, `DonViTinh`, `Calo`, `Dam`, `Beo`, `Xo`, `IdDanhMucMonAn`) VALUES ('{$monAn->TenMonAn}','{$monAn->AnhMonAn}','{$monAn->DonViTinh}','{$monAn->Calo}','{$monAn->Dam}','{$monAn->Beo}','{$monAn->Xo}','{$monAn->IdDanhMucMonAn}')";
    $result = $con->query($Sql_Query);
    if ($result) {
        echo 1;
    }
    else {
        echo 0;
    }
    mysqli_close($con);
}

// Sửa món ăn
function SuaMonAn($con, $monAn)
{
    $Sql_Query = "UPDATE `monan` SET `TenMonAn`='{$monAn->TenMonAn}',`AnhMonAn`='{$monAn->AnhMonAn}',`DonViTinh`='{$monAn->DonViTinh}',
    `Calo`='{$monAn->Calo}',`Dam`='{$monAn->Dam}',`Beo`='{$monAn->Beo}',`Xo`='{$monAn->Xo}'  WHERE `Id`='{$monAn->Id}'";
    $result = $con->query($Sql_Query);
    if ($result) {
        echo 1;
    }
    else {
        echo 0;
    }
    mysqli_close($con);
}

// Xóa món ăn
function XoaMonAn($con, $id)
{
    $Sql_Query = "DELETE FROM `monan` WHERE `Id`='$id'";
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