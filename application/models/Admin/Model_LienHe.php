<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_LienHe extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getAll($start = 0, $end = 10){
		$sql = "SELECT * FROM lienhe WHERE TrangThai = 1 ORDER BY MaLienHe DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function checkNumber()
	{
		$sql = "SELECT * FROM lienhe WHERE TrangThai = 1";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getById($MaLienHe){
		$sql = "SELECT * FROM lienhe WHERE MaLienHe = ?";
		$result = $this->db->query($sql, array($MaLienHe));
		return $result->result_array();
	}

	public function remove($MaLienHe){
		$sql = "UPDATE `lienhe` SET `TrangThai`=0 WHERE `MaLienHe`= ?";
		$result = $this->db->query($sql, array($MaLienHe));
		return $result;
	}

	public function checkNumberTrash(){
		$sql = "SELECT * FROM lienhe WHERE TrangThai = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function getAllTrash($start = 0, $end = 10){
		$sql = "SELECT * FROM lienhe WHERE TrangThai = 0 ORDER BY MaLienHe DESC LIMIT ?, ?";
		$result = $this->db->query($sql, array($start, $end));
		return $result->result_array();
	}

	public function reset($MaLienHe){
		$sql = "UPDATE `lienhe` SET `TrangThai`= 1 WHERE `MaLienHe`= ?";
		$result = $this->db->query($sql,array($MaLienHe));
		return $result;
	}

	public function resetAll(){
		$sql = "UPDATE `lienhe` SET `TrangThai`= 1 WHERE `TrangThai`= 0";
		$result = $this->db->query($sql);
		return $result;
	}

	public function delete($MaLienHe){
		$sql = "DELETE FROM `lienhe` WHERE `MaLienHe`= ? AND `TrangThai` = 0";
		$result = $this->db->query($sql,array($MaLienHe));
		return $result;
	}

	public function deleteAll(){
		$sql = "DELETE FROM `lienhe` WHERE `TrangThai` = 0";
		$result = $this->db->query($sql);
		return $result;
	}
}

/* End of file Model_LienHe.php */
/* Location: ./application/models/Model_LienHe.php */