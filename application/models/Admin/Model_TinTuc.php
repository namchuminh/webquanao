<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TinTuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM tintuc WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT tintuc.*, nhanvien.MaNhanVien, nhanvien.TenNhanVien FROM tintuc, nhanvien WHERE tintuc.MaNhanVien = nhanvien.MaNhanVien AND tintuc.TrangThai = 1 ORDER BY tintuc.MaTinTuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function addNews($TieuDe,$NoiDung,$AnhChinh,$DuongDan,$The,$MaNhanVien){
		$data = array(
	        "TieuDe" => $TieuDe,
	        "NoiDung" => $NoiDung,
	        "AnhChinh" => $AnhChinh,
	        "DuongDan" => $DuongDan,
	        "The" => $The,
	        "MaNhanVien" => $MaNhanVien
	    );

	    $this->db->insert('tintuc', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}


	public function getById($MaTinTuc){
		$sql = "SELECT * FROM tintuc WHERE MaTinTuc = ?";
		$result = $this->db->query($sql, array($MaTinTuc));
		return $result->result_array();
	}

	public function update($TieuDe,$NoiDung,$AnhChinh,$DuongDan,$The,$MaTinTuc){
		$sql = "UPDATE `tintuc` SET `TieuDe`=?,`NoiDung`=?,`AnhChinh`=?,`DuongDan`=?,`The`=? WHERE `MaTinTuc`= ?";
		$result = $this->db->query($sql, array($TieuDe,$NoiDung,$AnhChinh,$DuongDan,$The,$MaTinTuc));
		return $result;
	}

	public function updateNoImage($TieuDe,$NoiDung,$DuongDan,$The,$MaTinTuc){
		$sql = "UPDATE `tintuc` SET `TieuDe`=?,`NoiDung`=?,`DuongDan`=?,`The`=? WHERE `MaTinTuc`= ?";
		$result = $this->db->query($sql, array($TieuDe,$NoiDung,$DuongDan,$The,$MaTinTuc));
		return $result;
	}

	public function remove($MaTinTuc){
		$sql = "UPDATE `tintuc` SET `TrangThai`= 0 WHERE `MaTinTuc`= ?";
		$result = $this->db->query($sql,array($MaTinTuc));
		return $result;
	}

	public function checkNumberTrash(){
		$sql = "SELECT * FROM tintuc WHERE TrangThai = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAllTrash($start = 0, $end = 10){
		$sql = "SELECT tintuc.*, nhanvien.MaNhanVien, nhanvien.TenNhanVien FROM tintuc, nhanvien WHERE tintuc.MaNhanVien = nhanvien.MaNhanVien AND tintuc.TrangThai = 0 ORDER BY tintuc.MaTinTuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function reset($MaTinTuc){
		$sql = "UPDATE `tintuc` SET `TrangThai`= 1 WHERE `MaTinTuc`= ?";
		$result = $this->db->query($sql,array($MaTinTuc));
		return $result;
	}

	public function resetAll(){
		$sql = "UPDATE `tintuc` SET `TrangThai`= 1 WHERE `TrangThai`= 0";
		$result = $this->db->query($sql);
		return $result;
	}

	public function delete($MaTinTuc){
		$sql = "DELETE FROM `tintuc` WHERE `MaTinTuc`= ? AND `TrangThai` = 0";
		$result = $this->db->query($sql,array($MaTinTuc));
		return $result;
	}

	public function deleteAll(){
		$sql = "DELETE FROM `tintuc` WHERE `TrangThai` = 0";
		$result = $this->db->query($sql);
		return $result;
	}
}

/* End of file Model_TinTuc.php */
/* Location: ./application/models/Model_TinTuc.php */