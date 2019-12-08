<?php
class TaiKhoan
{
    private $email;
    private $password;
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}

class ThongTinThanhVien
{
    public function ThongTinThanhVien($id, $chuTaiKhoan, $chucDanh, $gioiTinh, $ngaySinh, $chieuCao, $canNang, $mucDoHoatDong,$checked=false)
    {
        $this->id = $id;
        $this->chuTaiKhoan = $chuTaiKhoan;
        $this->chucDanh = $chucDanh;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->chieuCao = $chieuCao;
        $this->canNang = $canNang;
        $this->mucDoHoatDong = $mucDoHoatDong;
        $this->checked = $checked;
    }
}

class DanhMucMonAn
{

    public function DanhMucMonAn($id, $tenDanhMucMonAn, $anhDanhMuc)
    {
        $this->id = $id;
        $this->tenDanhMucMonAn = $tenDanhMucMonAn;
        $this->anhDanhMuc = $anhDanhMuc;
    }
}

class MonAn
{
    public function MonAn($Id, $TenMonAn, $AnhMonAn, $DonViTinh, $Calo, $Dam, $Beo, $Xo, $IdDanhMucMonAn)
    {
        $this->Id = $Id;
        $this->TenMonAn = $TenMonAn;
        $this->AnhMonAn = $AnhMonAn;
        $this->DonViTinh = $DonViTinh;
        $this->Calo = $Calo;
        $this->Dam = $Dam;
        $this->Beo = $Beo;
        $this->Xo = $Xo;
        $this->IdDanhMucMonAn = $IdDanhMucMonAn;
    }
}

class ThucDon
{
    public $Id ;
    public $ChuTaiKhoanId ;
    public $BuaAnId ;
    public $MonAnId ;
    public $NgayAn ;
    public $SoLuong ;
    public $MonAn ;
}

class ThongTinThucDon
{
    public $Email ;
    public $NgayTao ;
    public $TongNangLuong ;
    public $DanhSachMon ;
    // public $NgayDangKy ;
    
}

class DanhSachMonAn{
    public $LoaiBua ;
    public $Mon ;
}

class BaoCaoThucDonTuan{
    public $Email ;
    public $Calo ;
    public $NgayAn ;
}

?>
