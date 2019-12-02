<?php
// Importing DBConfig.php file.
include 'DBConfig.php';
// Connecting to MySQL Database.
// Getting the received JSON into $json variable.
$json = file_get_contents('php://input');

// decoding the received JSON and store into $obj variable.
$obj = json_decode($json, true);
$loai = $obj['loai'];

switch ($loai)
{
    case 1:
        {
                $item = new ThucDon;
                $item->ChuTaiKhoanId = $obj['ChuTaiKhoanId'];
                $item->BuaAnId = $obj['BuaAnId'];
                $item->MonAnId = $obj['MonAnId'];
                $item->NgayAn = $obj['NgayAn'];
                $item->SoLuong = $obj['SoLuong'];
                ThemMonAn($con, $item);
            break;
        }
    case 2: // Báo cáo ngày
        {
            $email = $obj["email"];
            $ngayAn = $obj["ngayAn"];
            LayThongTinThucDon($con, $email, $ngayAn);
            break;
        }
    case 3: // Báo cáo tuần
        {
            $email = $obj["email"];
            $khoangThoiGian = $obj["khoangThoiGian"];
            BaoCaoTuan($con,$email,$khoangThoiGian);
            break;
        }
    case 4:
        {
            $thucDonId = $obj["thucDonId"];
            XoaThucDon($con,$thucDonId);
            break;
        }
}

    // ThemMonAn($con,$obj);
    function ThemMonAn($con, ThucDon $thucDon)
    {
        // Thêm mới 1 món ăn
        $sql = "INSERT INTO `thucdon`(`ChuTaiKhoanId`, `BuaAnId`, `MonAnId`, `NgayAn`, `SoLuong`) 
                VALUES  ('{$thucDon->ChuTaiKhoanId}','{$thucDon->BuaAnId}','{$thucDon->MonAnId}','{$thucDon->NgayAn}','{$thucDon->SoLuong}')";
        $result = $con->query($sql);
        if (true)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
        mysqli_close($con);
    }

    function LayThongTinThucDon($con, $email, $ngayAn)
    {
        
        $sql = "SELECT TK.Email,TK.NgayTao,TT.TongNangLuong,TD.BuaAnId,MA.*,TD.SoLuong,TD.Id ThucDonId FROM taikhoan TK
                LEFT JOIN thongtinthanhvien TT ON TK.Email = TT.ChuTaiKhoan AND TT.ChucDanh ='Tôi'
                LEFT JOIN thucdon TD ON TK.Email = TD.ChuTaiKhoanId   AND TD.NgayAn='{$ngayAn}'
                LEFT JOIN monan MA ON TD.MonAnId = MA.Id
                WHERE TK.Email = '{$email}'
                ORDER BY TD.BuaAnId";

        $result = $con->query($sql);

        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $item = new ThongTinThucDon;
            $item->Email = $row['Email'];
            $item->NgayTao = $row['NgayTao'];
            $item->TongNangLuong = $row['TongNangLuong'];
            $item->DanhSachMon = array();

            $arr = array();
            $arrBuaAnId = ['1', '2', '3', '4'];
            foreach ($arrBuaAnId as  $value)
            {
                $arr = array();
                foreach ($result as $key1 => $value1)
                {
                    if ($value1['BuaAnId'] === $value)
                    {
                        array_push($arr, $value1);
                    }
                }
                $buaAn = new DanhSachMonAn;
                $buaAn->LoaiBua = $value;
                $buaAn->Mon = array();
                $buaAn->Mon = $arr;
                array_push($item->DanhSachMon,$buaAn);
            }
            echo json_encode($item);
        }
        else
        {
            echo 0;
        }
        mysqli_close($con);
    }

    function    BaoCaoTuan($con,$email, $khoangThoiGian){
        $sql = "SELECT TK.Email,SUM(TD.SoLuong* MA.Calo) Calo,TD.NgayAn FROM taikhoan TK
                LEFT JOIN thongtinthanhvien TT ON TK.Email = TT.ChuTaiKhoan AND TT.ChucDanh ='Tôi'
                LEFT JOIN thucdon TD ON TK.Email = TD.ChuTaiKhoanId   AND TD.NgayAn >='{$khoangThoiGian[0]}' and TD.NgayAn <='{$khoangThoiGian[count($khoangThoiGian)-1]}'
                LEFT JOIN monan MA ON TD.MonAnId = MA.Id
                WHERE TK.Email = '{$email}'
                GROUP BY TD.NgayAn
                ORDER BY TD.NgayAn";

        $result = $con->query($sql);
        if ($result->num_rows > 0)
        {
            $arr = array();
            foreach ($khoangThoiGian as  $value)
            {
                $daThem=false;
                foreach ($result as $key1 => $value1)
                {
                    if ($value1['NgayAn'] === $value)
                    {
                        $item = new BaoCaoThucDonTuan;
                        $item->NgayAn = $value1['NgayAn'];
                        $item->Calo = $value1['Calo'];
                        $item->Email = $value1['Email'];
                        array_push($arr, $item);
                        $daThem=true;
                        break;
                    }
                }
                if ($daThem ==false) {
                    $daThem=false;
                    $item = new BaoCaoThucDonTuan;
                    $item->NgayAn = $value;
                    $item->Calo = 0;
                    $item->Email = 0;
                    array_push($arr, $item);
                }
            }
            echo json_encode($arr);
        }
        else
        {
            echo 0;
        }
        mysqli_close($con);
    }

    function XoaThucDon($con,$thucDonId ){
        $sql = "DELETE FROM `thucdon` WHERE Id = {$thucDonId}";
        $result = $con->query($sql);
        if ($result) {
            echo 1;
        }else {
            echo 0;
        }
    }

?>
