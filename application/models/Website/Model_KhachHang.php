<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_KhachHang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function updateNumberProductCancel($SoLuong,$MaSanPham,$MaMauSac,$TenKichThuoc){
		$sql = "UPDATE `kichthuoc` SET `SoLuong`= ? WHERE `MaSanPham`= ? AND `MaMauSac`= ? AND `TenKichThuoc`= ?";
		$result = $this->db->query($sql, array($SoLuong,$MaSanPham,$MaMauSac,$TenKichThuoc));
		return $result;
	}

	public function countViewHistory($makhachhang){
		$sql = "SELECT * FROM lichsuxem WHERE MaKHachHang = ?";
		$result = $this->db->query($sql, array($makhachhang));
		return $result->num_rows();
	}

	public function insertViewHistory($masanpham,$makhachhang){
		$sql = "INSERT INTO lichsuxem (MaSanPham,MaKhachHang) VALUES (?,?)";
		$result = $this->db->query($sql, array($masanpham,$makhachhang));
		return $result;
	}

	public function getById($makhachhang){
		$sql = "SELECT donhang.*, khachhang.MaKhachHang, khachhang.TenKhachHang FROM donhang, khachhang WHERE donhang.MaKhachHang = khachhang.MaKhachHang AND khachhang.MaKhachHang = ? ORDER BY donhang.MaDonHang DESC";
		$result = $this->db->query($sql, array($makhachhang));
		return $result->result_array();
	}

	public function checkOrderById($madonhang){
		$sql = "SELECT * FROM donhang WHERE MaDonHang = ?";
		$result = $this->db->query($sql, array($madonhang));
		return $result->result_array();
	}

	public function removeOrder($madonhang){
		$sql = "UPDATE donhang SET TrangThai = -1 WHERE MaDonHang = ?";
		$result = $this->db->query($sql, array($madonhang));
		return $result;
	}

	public function getDetailById($madonhang){
		$sql = "SELECT chitietdonhang.*, hinhanh.MaSanPham, hinhanh.DuongDan AS anhsanpham, hinhanh.LoaiAnh, donhang.MaDonHang, donhang.GiamGia, sanpham.GiaBan, sanpham.DuongDan, sanpham.MaSanPham, sanpham.TenSanPham FROM chitietdonhang, donhang, sanpham, hinhanh WHERE chitietdonhang.MaDonHang = donhang.MaDonHang AND chitietdonhang.MaSanPham = sanpham.MaSanPham AND hinhanh.MaSanPham = sanpham.MaSanPham AND hinhanh.LoaiAnh = 1 AND chitietdonhang.MaDonHang = ? ORDER BY chitietdonhang.MaChiTietDonHang;";
		$result = $this->db->query($sql, array($madonhang));
		return $result->result_array();
	}

	public function update($tenkhachhang, $sodienthoai, $diachi, $email, $taikhoan){
		$sql = "UPDATE `khachhang` SET `TenKhachHang`=?,`SoDienThoai`=?,`DiaChi`=?,`Email`=? WHERE `TaiKhoan`=?";
		$result = $this->db->query($sql, array($tenkhachhang, $sodienthoai, $diachi, $email, $taikhoan));
		return $result;
	}

	public function getCustomerByUsername($taikhoan, $matkhau){
		$sql = "SELECT * FROM khachhang WHERE TaiKhoan = ? AND matkhau = ?";
		$result = $this->db->query($sql, array($taikhoan, $matkhau));
		return $result->num_rows();
	}

	public function updatePassword($matkhau,$taikhoan){
		$sql = "UPDATE `khachhang` SET `MatKhau`=? WHERE `TaiKhoan`=?";
		$result = $this->db->query($sql, array($matkhau,$taikhoan));
		return $result;
	}
}

/* End of file Model_KhachHang.php */
/* Location: ./application/models/Model_KhachHang.php */