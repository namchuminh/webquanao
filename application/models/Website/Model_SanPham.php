<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_SanPham extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getNumberSize($MaSanPham,$MaMauSac){
		$sql = "SELECT * FROM `kichthuoc` WHERE MaSanPham = ? AND MaMauSac = ?";
		$result = $this->db->query($sql, array($MaSanPham,$MaMauSac));
		return $result->result_array();
	}

	public function getIdColor($MaSanPham,$TenMauSac){
		$sql = "SELECT * FROM `mausac` WHERE MaSanPham = ? AND TenMauSac = ?";
		$result = $this->db->query($sql, array($MaSanPham,$TenMauSac));
		return $result->result_array();
	}

	public function getAllNumberById($MaSanPham){
		$sql = "SELECT SUM(SoLuong) AS TongSoLuong FROM kichthuoc WHERE MaMauSac IN (SELECT MaMauSac FROM mausac WHERE MaSanPham = ?)";
		$result = $this->db->query($sql, array($MaSanPham));
		return $result->result_array();
	}

	public function getAll($start = 0, $end = 12){
		$sql = "SELECT sanpham.*, hinhanh.LoaiAnh, hinhanh.MaSanPham, hinhanh.DuongDan AS duongdananh FROM sanpham,hinhanh WHERE hinhanh.MaSanPham = sanpham.MaSanPham AND hinhanh.LoaiAnh = 1 AND sanpham.TrangThai != 0 ORDER BY sanpham.MaSanPham DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function checkNumber(){
		$sql = "SELECT * FROM sanpham WHERE TrangThai != 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getCategory(){
		$sql = "SELECT COUNT(sp.MaSanPham) AS soLuongSanPham, cm.tenChuyenMuc, cm.DuongDan FROM sanpham sp JOIN chuyenmuc cm ON sp.maChuyenMuc = cm.maChuyenMuc GROUP BY cm.maChuyenMuc, cm.tenChuyenMuc;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAllColor($mau, $start = 0, $end = 12){
		$sql = "SELECT sanpham.*, mausac.TenMauSac, mausac.MaSanPham, hinhanh.LoaiAnh, hinhanh.MaSanPham, hinhanh.DuongDan AS duongdananh FROM sanpham,mausac,hinhanh WHERE sanpham.MaSanPham = mausac.MaSanPham AND hinhanh.MaSanPham = sanpham.MaSanPham AND hinhanh.LoaiAnh = 1 AND sanpham.TrangThai != 0 AND mausac.TenMauSac = ? ORDER BY sanpham.MaSanPham DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($mau, $start, $end));
		return $result->result_array();
	}

	public function checkNumberColor($mau){
		$sql = "SELECT sanpham.*, mausac.TenMauSac, mausac.MaSanPham FROM sanpham,mausac,hinhanh WHERE sanpham.MaSanPham = mausac.MaSanPham AND sanpham.TrangThai != 0 AND mausac.TenMauSac = ? GROUP BY sanpham.MaSanPham";
		$result = $this->db->query($sql,array($mau));
		return $result->num_rows();
	}

	public function getAllSearch($tensanpham, $start = 0, $end = 12){
		$tsp = "%".$tensanpham."%";
		$sql = "SELECT sanpham.*, hinhanh.LoaiAnh, hinhanh.MaSanPham, hinhanh.DuongDan AS duongdananh FROM sanpham,hinhanh WHERE hinhanh.MaSanPham = sanpham.MaSanPham AND hinhanh.LoaiAnh = 1 AND sanpham.TrangThai != 0 AND sanpham.TenSanPham LIKE ? ORDER BY sanpham.MaSanPham DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($tsp,$start, $end));
		return $result->result_array();
	}

	public function checkNumberSearch($tensanpham){
		$tsp = "%".$tensanpham."%";
		$sql = "SELECT * FROM sanpham WHERE TrangThai != 0 AND TenSanPham LIKE ?";
		$result = $this->db->query($sql, array($tsp));
		return $result->num_rows();
	}

	public function getBySlug($DuongDan){
		$sql = "SELECT sanpham.*, hinhanh.DuongDan AS duongdananh, hinhanh.LoaiAnh, chuyenmuc.TenChuyenMuc FROM sanpham LEFT JOIN hinhanh ON sanpham.MaSanPham = hinhanh.MaSanPham INNER JOIN chuyenmuc ON sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc WHERE sanpham.TrangThai != 0 AND sanpham.DuongDan = ?";
		$result = $this->db->query($sql, array($DuongDan));
		return $result->result_array();
	}

	public function getById($masanpham){
		$sql = "SELECT * FROM sanpham WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($masanpham));
		return $result->result_array();
	}

	public function updateNumberProductPay($masanpham, $soluong){
		$sql = "UPDATE `sanpham` SET `SoLuong`= ? WHERE `MaSanPham`= ?";
		$result = $this->db->query($sql, array($soluong,$masanpham));
		return $result;
	}

	public function updateNumberProductCancel($masanpham, $soluong){
		$sql = "UPDATE `sanpham` SET `SoLuong`= ? WHERE `MaSanPham`= ?";
		$result = $this->db->query($sql, array($soluong,$masanpham));
		return $result;
	}

	public function getRelated($machuyenmuc){
		$sql = "SELECT sanpham.*, hinhanh.LoaiAnh, hinhanh.MaSanPham, hinhanh.DuongDan AS duongdananh FROM sanpham,hinhanh WHERE hinhanh.MaSanPham = sanpham.MaSanPham AND hinhanh.LoaiAnh = 1 AND sanpham.TrangThai != 0 AND sanpham.MaChuyenMuc = ? ORDER BY RAND() LIMIT 10";
		$result = $this->db->query($sql, array($machuyenmuc));
		return $result->result_array();
	}

	public function getColor($masanpham){
		$sql = "SELECT * FROM mausac WHERE MaSanPham = ?";
		$result = $this->db->query($sql, array($masanpham));
		return $result->result_array();
	}

	public function getSuggestProduct($arr_masanpham){
		$sql = "SELECT sanpham.*, hinhanh.LoaiAnh, hinhanh.MaSanPham, hinhanh.DuongDan AS duongdananh FROM sanpham,hinhanh WHERE hinhanh.MaSanPham = sanpham.MaSanPham AND hinhanh.LoaiAnh = 1 AND sanpham.TrangThai != 0 AND sanpham.MaSanPham IN ($arr_masanpham)";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

/* End of file Model_SanPham.php */
/* Location: ./application/models/Model_SanPham.php */