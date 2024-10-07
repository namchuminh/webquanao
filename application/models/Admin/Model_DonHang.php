<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_DonHang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM donhang WHERE TrangThai != 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT donhang.*, khachhang.MaKhachHang, khachhang.TenKhachHang FROM donhang, khachhang WHERE donhang.MaKhachHang = khachhang.MaKhachHang AND donhang.TrangThai != 0 AND donhang.TrangThai != -1 ORDER BY MaDonHang DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaDonHang){
		$sql = "SELECT * FROM donhang WHERE MaDonHang = ?";
		$result = $this->db->query($sql, array($MaDonHang));
		return $result->result_array();
	}

	public function action($MaHanhDong, $MaDonHang){
		$sql = "UPDATE `donhang` SET `TrangThai`=? WHERE `MaDonHang`= ?";
		$result = $this->db->query($sql, array($MaHanhDong, $MaDonHang));
		return $result;
	}

	public function remove($MaDonHang){
		$sql = "UPDATE `donhang` SET `TrangThai`=0 WHERE `MaDonHang`= ? AND TrangThai != 4";
		$result = $this->db->query($sql, array($MaDonHang));
		return $result;
	}

	public function checkNumberTrash(){
		$sql = "SELECT * FROM donhang WHERE TrangThai < 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAllTrash($start = 0, $end = 10){
		$sql = "SELECT donhang.*, khachhang.MaKhachHang, khachhang.TenKhachHang FROM donhang, khachhang WHERE donhang.MaKhachHang = khachhang.MaKhachHang AND donhang.TrangThai < 1 ORDER BY MaDonHang DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function reset($MaDonHang){
		$sql = "UPDATE `donhang` SET `TrangThai`= 1 WHERE `MaDonHang`= ? AND `TrangThai` < 1";
		$result = $this->db->query($sql,array($MaDonHang));
		return $result;
	}

	public function resetAll(){
		$sql = "UPDATE `donhang` SET `TrangThai`= 1 WHERE `TrangThai` < 1";
		$result = $this->db->query($sql);
		return $result;
	}

	public function delete($MaDonHang){
		$sql = "DELETE FROM `donhang` WHERE `MaDonHang`= ? AND `TrangThai` < 1";
		$result = $this->db->query($sql,array($MaDonHang));
		return $result;
	}

	public function deleteAll(){
		$sql = "DELETE FROM `donhang` WHERE `TrangThai` < 1";
		$result = $this->db->query($sql);
		return $result;
	}

	public function getDetailById($MaDonHang){
		$sql = "SELECT chitietdonhang.*, donhang.MaDonHang, donhang.GiamGia, sanpham.GiaBan, sanpham.MaSanPham, sanpham.TenSanPham FROM chitietdonhang, donhang, sanpham WHERE chitietdonhang.MaDonHang = donhang.MaDonHang AND chitietdonhang.MaSanPham = sanpham.MaSanPham AND chitietdonhang.MaDonHang = ?";
		$result = $this->db->query($sql, array($MaDonHang));
		return $result->result_array();
	}

	public function getDetailOrderById($MaDonHang){
		$sql = "SELECT donhang.*, khachhang.MaKhachHang, khachhang.TenKhachHang, khachhang.TaiKhoan FROM donhang, khachhang WHERE donhang.MaKhachHang = khachhang.MaKhachHang AND donhang.TrangThai != 0 AND donhang.TrangThai != -1 AND donhang.MaDonHang = ?";
		$result = $this->db->query($sql, array($MaDonHang));
		return $result->result_array();
	}

	public function getOrderByStatus($trangthai){
		$sql = "SELECT donhang.*, khachhang.MaKhachHang, khachhang.TenKhachHang FROM donhang, khachhang WHERE donhang.MaKhachHang = khachhang.MaKhachHang AND donhang.TrangThai = ? ORDER BY MaDonHang DESC LIMIT 20";
		$result = $this->db->query($sql, array($trangthai));
		return $result->result_array();
	}

	public function searchOrderByCode($madonhang){
		$sql = "SELECT donhang.*, khachhang.MaKhachHang, khachhang.TenKhachHang FROM donhang, khachhang WHERE donhang.MaKhachHang = khachhang.MaKhachHang AND donhang.TrangThai >= 1 AND donhang.MaDonHang LIKE ".$madonhang." ORDER BY MaDonHang DESC LIMIT 20";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

}

/* End of file Model_DonHang.php */
/* Location: ./application/models/Model_DonHang.php */