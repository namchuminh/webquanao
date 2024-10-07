<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TinTuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll($start = 0, $end = 6){
		$sql = "SELECT tintuc.*, nhanvien.TenNhanVien, nhanvien.MaNhanVien, nhanvien.AnhChinh AS anhnhanvien FROM tintuc,nhanvien WHERE tintuc.MaNhanVien = nhanvien.MaNhanVien AND tintuc.TrangThai != 0 ORDER BY tintuc.MaTinTuc DESC LIMIT ?,?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function checkNumber(){
		$sql = "SELECT * FROM tintuc WHERE TrangThai != 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getBySlug($DuongDan){
		$sql = "SELECT tintuc.*, nhanvien.TenNhanVien, nhanvien.MaNhanVien, nhanvien.AnhChinh AS anhnhanvien FROM tintuc,nhanvien WHERE tintuc.MaNhanVien = nhanvien.MaNhanVien AND tintuc.TrangThai != 0 AND tintuc.DuongDan = ? ORDER BY tintuc.MaTinTuc";
		$result = $this->db->query($sql, array($DuongDan));
		return $result->result_array();
	}
}

/* End of file Model_TinTuc.php */
/* Location: ./application/models/Model_TinTuc.php */