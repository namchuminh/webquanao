<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ChuyenMuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkNumber(){
		$sql = "SELECT COUNT(sp.MaSanPham) AS soLuongSanPham, cm.tenChuyenMuc, cm.DuongDan, cm.AnhChinh FROM sanpham sp JOIN chuyenmuc cm ON sp.maChuyenMuc = cm.maChuyenMuc WHERE cm.TrangThai != 0 GROUP BY cm.maChuyenMuc, cm.tenChuyenMuc";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAllCategory($start = 0, $end = 8){
		$sql = "SELECT COUNT(sp.MaSanPham) AS soLuongSanPham, cm.tenChuyenMuc, cm.DuongDan, cm.AnhChinh FROM sanpham sp JOIN chuyenmuc cm ON sp.maChuyenMuc = cm.maChuyenMuc WHERE cm.TrangThai != 0 GROUP BY cm.maChuyenMuc, cm.tenChuyenMuc ORDER BY cm.MaChuyenMuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}


	public function checkNumberProduct($MaChuyenMuc){
		$sql = "SELECT chuyenmuc.MaChuyenMuc, sanpham.*, hinhanh.MaSanPham, hinhanh.LoaiAnh, hinhanh.DuongDan AS duongdananh FROM chuyenmuc, sanpham, hinhanh WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND sanpham.MaSanPham = hinhanh.MaSanPham AND hinhanh.LoaiAnh = 1 AND chuyenmuc.MaChuyenMuc = ?";
		$result = $this->db->query($sql, array($MaChuyenMuc));
		return $result->num_rows();
	}

	public function getAllProduct($MaChuyenMuc, $start = 0, $end = 12){
		$sql = "SELECT chuyenmuc.MaChuyenMuc, sanpham.*, hinhanh.MaSanPham, hinhanh.LoaiAnh, hinhanh.DuongDan AS duongdananh FROM chuyenmuc, sanpham, hinhanh WHERE sanpham.MaChuyenMuc = chuyenmuc.MaChuyenMuc AND sanpham.MaSanPham = hinhanh.MaSanPham AND hinhanh.LoaiAnh = 1 AND chuyenmuc.MaChuyenMuc = ? ORDER BY sanpham.MaSanPham DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($MaChuyenMuc, $start, $end));
		return $result->result_array();
	}

	public function getDetailCategory($DuongDan){
		$sql = "SELECT * FROM chuyenmuc WHERE DuongDan = ?";
		$result = $this->db->query($sql, array($DuongDan));
		return $result->result_array();
	}
}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */