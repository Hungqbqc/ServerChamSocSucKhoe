<?php
// Importing DBConfig.php file.
include 'DBConfig.php';

// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');

// decoding the received JSON and store into $obj variable.
$obj = json_decode($json, true);

// Populate User email from JSON $obj array and store into $email.
if (isset($obj["email"]))
{
    $email = $obj["email"];
}

if (isset($obj["loai"]))
{
    $loai = $obj["loai"];
}

if (isset($obj["soNguoi"]))
{
    $soNguoi = $obj["soNguoi"];
}

if (isset($obj["sql_Query"]))
{
    $sql_Query = $obj["sql_Query"];
}

if (isset($obj["listThanhVienId"]))
{
    $listThanhVienId = $obj["listThanhVienId"];
}

if (isset($obj["chucDanh"]))
{
    $chucDanh = $obj["chucDanh"];
}


if (isset($obj["uri"]))
{
    $uri = $obj["uri"];
}


switch ($loai)
{

        // đếm số thành viên trong gia đình
        
    case 'DEM_SO_THANH_VIEN':
        LaySoThanhVien($con, $email);
        // echo json_encode($email) ;
        
    break;
        //  Lấy hết thông tin của các thành viên trong gia đình
        
    case 'LAY_THONG_TIN_CALO_THANH_VIEN':
        LayThongTinCacThanhVien($con, $email);
    break;
        // Thêm mới 1 thành viên
        
    case 'THEM_SO_THANH_VIEN':
        ThemSoThanhVien($con, $email, $soNguoi);
    break;
        // Cập nhật thông tin của thành viên
        
    case 'CAP_NHAT_THONG_TIN_CALO_THANH_VIEN':
        CapNhatThanhVien($con, $sql_Query);
    break;
        // Lấy chi tiết thông tin của 1 thành viên
        
    case '5':
        LayThongTinThanhVien($con, $id);
    break;
    case 'XOA_THANH_VIEN':
        XoaThanhVien($con, $listThanhVienId);
    break;
    case 'THEM_THANH_VIEN':
        ThemThanhVien($con, $chucDanh, $email);
    break;

    case 'CAP_NHAT_AVATAR':
        CapNhatAvatar($con, $email,$uri);
    break;

}

function LaySoThanhVien($con, $email)
{
    $Sql_Query = "SELECT * FROM thongtinthanhvien WHERE ChuTaiKhoan = '$email'";
    $result = $con->query($Sql_Query);
    echo json_encode($result->num_rows);
    mysqli_close($con);
}

function LayThongTinCacThanhVien($con, $email)
{
    $Sql_Query = "SELECT * FROM thongtinthanhvien WHERE ChuTaiKhoan = '$email'";
    $result = $con->query($Sql_Query);
    $mangThongTin = array();
    if ($result->num_rows > 0)
    {
        // output dữ liệu trên trang
        while ($row = $result->fetch_assoc())
        {
            array_push($mangThongTin, new ThongTinThanhVien($row['Id'], $row['ChuTaiKhoan'], $row['ChucDanh'], $row['GioiTinh'], $row['NgaySinh'], $row['ChieuCao'], $row['CanNang'], $row['MucDoHoatDong']));
        }
        echo json_encode($mangThongTin);
    }
    else
    {
        echo 0;
    }
    mysqli_close($con);
}

function LayThongTinThanhVien($con, $id)
{
    $Sql_Query = "SELECT * FROM thongtinthanhvien WHERE Id = '$id'";
    $result = $con->query($Sql_Query);
    $mangThongTin = array();
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        echo json_encode(new ThongTinThanhVien($row['Id'], $row['ChuTaiKhoan'], $row['ChucDanh'], $row['GioiTinh'], $row['NgaySinh'], $row['ChieuCao'], $row['CanNang'], $row['MucDoHoatDong']));
    }
    else
    {
        echo 0;
    }
    mysqli_close($con);
}

function ThemSoThanhVien($con, $email, $soNguoi)
{
    $Sql_Query = 'INSERT INTO `thongtinthanhvien`( `ChuTaiKhoan`,`ChucDanh`) VALUES ';
    for ($i = 0;$i < $soNguoi;$i++)
    {
        if ($i == 0)
        {

            $Sql_Query .= '(' . "'$email','Tôi' ),";
        }
        else
        {
            $Sql_Query .= '(' . "'$email','' ),";
        }
    }
    $Sql_Query = substr($Sql_Query, 0, strlen($Sql_Query) - 1);
    $result = $con->query($Sql_Query);
    if ($result)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
    mysqli_close($con);

}

function CapNhatThanhVien($con, $Sql_Query)
{
    $result = $con->query($Sql_Query);
    if ($result)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
    mysqli_close($con);
}
function XoaThanhVien($con, $listThanhVienId)
{
    $Sql_Query = "DELETE FROM `thongtinthanhvien` WHERE Id IN ( $listThanhVienId )";
    $result = $con->query($Sql_Query);
    if ($result)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
    // echo json_encode($Sql_Query);
    mysqli_close($con);
}

function ThemThanhVien($con, $chucDanh, $email)
{
    $Sql_Query = "INSERT INTO `thongtinthanhvien` ( `ChuTaiKhoan`,`ChucDanh`) VALUES  ('$email','$chucDanh') ";
    $result = $con->query($Sql_Query);
    if ($result)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
    mysqli_close($con);
}

function  CapNhatAvatar($con, $email,$uri)
{
    $Sql_Query = "UPDATE `taikhoan` SET `Avatar`= '$uri'  WHERE  `Email`='$email'";
    $result = $con->query($Sql_Query);
    if ($result)
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
    mysqli_close($con);
}
?>
