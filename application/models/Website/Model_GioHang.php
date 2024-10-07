<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GioHang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getIdColor($MaSanPham,$TenMauSac){
		$sql = "SELECT * FROM mausac WHERE MaSanPham = ? AND TenMauSac = ?";
		$result = $this->db->query($sql, array($MaSanPham,$TenMauSac));
		return $result->result_array();
	}

	public function checkSize($MaMauSac,$TenKichThuoc){
		$sql = "SELECT * FROM kichthuoc WHERE MaMauSac = ? AND TenKichThuoc = ?";
		$result = $this->db->query($sql, array($MaMauSac,$TenKichThuoc));
		return $result->result_array();
	}

	public function getProductById($MaSanPham){
		$sql = "SELECT * FROM sanpham WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($MaSanPham));
		return $result->result_array();
	}

	public function getImageProductById($MaSanPham){
		$sql = "SELECT * FROM hinhanh WHERE MaSanPham = ? AND LoaiAnh = 1";
		$result = $this->db->query($sql, array($MaSanPham));
		return $result->result_array();
	}

	public function getColorById($MaSanPham){
		$sql = "SELECT * FROM mausac WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($MaSanPham));
		return $result->result_array();
	}


	public function checkCode($magiamgia){
		$sql = "SELECT * FROM magiamgia WHERE MaSuDung = ? AND TrangThai != 0";
		$result = $this->db->query($sql, array($magiamgia));
		return $result->result_array();
	}

	public function updateCode($solandung,$magiamgia){
		$sql = "UPDATE `magiamgia` SET `SoLanDung`=? WHERE `MaSuDung`=?";
		$result = $this->db->query($sql, array($solandung,$magiamgia));
		return $result;
	}

	public function checkNumberBeforeAdd($MaSanPham, $TenKichThuoc, $MaMauSac){
		$sql = "SELECT SoLuong FROM `kichthuoc` WHERE MaSanPham = ? AND TenKichThuoc = ? AND MaMauSac = ?";
		$result = $this->db->query($sql, array($MaSanPham, $TenKichThuoc, $MaMauSac));
		return $result->result_array();
	}

}	

/* End of file Model_GioHang.php */
/* Location: ./application/models/Model_GioHang.php */