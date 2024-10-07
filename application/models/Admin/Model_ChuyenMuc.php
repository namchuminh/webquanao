<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ChuyenMuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($tenchuyenmuc,$duongdan,$anhchinh){
		$data = array(
	        "TenChuyenMuc" => $tenchuyenmuc,
	        "DuongDan" => $duongdan,
	        "AnhChinh" => $anhchinh,
	    );

	    $this->db->insert('chuyenmuc', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 1 ORDER BY MaChuyenMuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function getById($MaChuyenMuc){
		$sql = "SELECT * FROM chuyenmuc WHERE MaChuyenMuc = ?";
		$result = $this->db->query($sql, array($MaChuyenMuc));
		return $result->result_array();
	}

	public function update($TenChuyenMuc,$DuongDan,$AnhChinh,$MaChuyenMuc){
		$sql = "UPDATE `chuyenmuc` SET `TenChuyenMuc`=?,`DuongDan`=?,`AnhChinh`=? WHERE `MaChuyenMuc`= ?";
		$result = $this->db->query($sql, array($TenChuyenMuc,$DuongDan,$AnhChinh,$MaChuyenMuc));
		return $result;
	}

	public function updateNoImage($TenChuyenMuc,$DuongDan,$MaChuyenMuc){
		$sql = "UPDATE `chuyenmuc` SET `TenChuyenMuc`=?,`DuongDan`=? WHERE `MaChuyenMuc`= ?";
		$result = $this->db->query($sql, array($TenChuyenMuc,$DuongDan,$MaChuyenMuc));
		return $result;
	}

	public function remove($MaChuyenMuc){
		$sql = "UPDATE `chuyenmuc` SET `TrangThai`= 0 WHERE `MaChuyenMuc`= ?";
		$result = $this->db->query($sql,array($MaChuyenMuc));
		return $result;
	}

	public function checkNumberTrash(){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAllTrash($start = 0, $end = 10){
		$sql = "SELECT * FROM chuyenmuc WHERE TrangThai = 0 ORDER BY MaChuyenMuc DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function reset($MaChuyenMuc){
		$sql = "UPDATE `chuyenmuc` SET `TrangThai`= 1 WHERE `MaChuyenMuc`= ?";
		$result = $this->db->query($sql,array($MaChuyenMuc));
		return $result;
	}

	public function resetAll(){
		$sql = "UPDATE `chuyenmuc` SET `TrangThai`= 1 WHERE `TrangThai`= 0";
		$result = $this->db->query($sql);
		return $result;
	}

	public function delete($MaChuyenMuc){
		$sql = "DELETE FROM `chuyenmuc` WHERE `MaChuyenMuc`= ? AND `TrangThai` = 0";
		$result = $this->db->query($sql,array($MaChuyenMuc));
		return $result;
	}

	public function deleteAll(){
		$sql = "DELETE FROM `chuyenmuc` WHERE `TrangThai` = 0";
		$result = $this->db->query($sql);
		return $result;
	}

}

/* End of file Model_ChuyenMuc.php */
/* Location: ./application/models/Model_ChuyenMuc.php */