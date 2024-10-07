<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_KhachHang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM khachhang ORDER BY MaKhachHang DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM khachhang";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getById($Makhachhang){
		$sql = "SELECT * FROM khachhang WHERE Makhachhang = ?";
		$result = $this->db->query($sql, array($Makhachhang));
		return $result->result_array();
	}

	public function remove($Makhachhang){
		$sql = "UPDATE `khachhang` SET `TrangThai`=0 WHERE `Makhachhang`= ?";
		$result = $this->db->query($sql, array($Makhachhang));
		return $result;
	}

	public function checkNumberTrash(){
		$sql = "SELECT * FROM khachhang WHERE TrangThai = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAllTrash($start = 0, $end = 10){
		$sql = "SELECT * FROM khachhang WHERE TrangThai = 0 ORDER BY Makhachhang DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function reset($Makhachhang){
		$sql = "UPDATE `khachhang` SET `TrangThai`= 1 WHERE `Makhachhang`= ?";
		$result = $this->db->query($sql,array($Makhachhang));
		return $result;
	}

	public function resetAll(){
		$sql = "UPDATE `khachhang` SET `TrangThai`= 1 WHERE `TrangThai`= 0";
		$result = $this->db->query($sql);
		return $result;
	}

	public function delete($Makhachhang){
		$sql = "DELETE FROM `khachhang` WHERE `Makhachhang`= ? AND `TrangThai` = 0";
		$result = $this->db->query($sql,array($Makhachhang));
		return $result;
	}

	public function deleteAll(){
		$sql = "DELETE FROM `khachhang` WHERE `TrangThai` = 0";
		$result = $this->db->query($sql);
		return $result;
	}

}

/* End of file Model_KhachHang.php */
/* Location: ./application/models/Model_KhachHang.php */