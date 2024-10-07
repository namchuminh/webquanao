<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_MaGiamGia extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll()
	{
	    $sql = "SELECT * FROM magiamgia ORDER BY magiamgia DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function add($MaSuDung, $NgayHetHan, $TriGia, $SoLuong){
		$data = array(
	        "MaSuDung" => $MaSuDung,
	        "NgayHetHan" => $NgayHetHan,
	        "TriGia" => $TriGia,
	        "SoLuong" => $SoLuong,
	    );

	    $this->db->insert('magiamgia', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkCode($MaSuDung){
		$sql = "SELECT * FROM magiamgia WHERE MaSuDung = ?";
		$result = $this->db->query($sql, array($MaSuDung));
		return $result->num_rows();
	}

	public function getById($MaGiamGia){
		$sql = "SELECT * FROM magiamgia WHERE MaGiamGia = ?";
		$result = $this->db->query($sql, array($MaGiamGia));
		return $result->result_array();
	}

	public function update($ngayhethan,$trigia,$soluong,$MaGiamGia){
		$sql = "UPDATE `magiamgia` SET `NgayHetHan`=?,`TriGia`=?,`SoLuong`=? WHERE `MaGiamGia`=?";
		$result = $this->db->query($sql, array($ngayhethan,$trigia,$soluong,$MaGiamGia));
		return $result;
	}

	public function remove($MaGiamGia)
	{
	    $sql = "UPDATE `magiamgia` SET `TrangThai`= 0 WHERE `MaGiamGia`=?";
		$result = $this->db->query($sql, array($MaGiamGia));
		return $result;
	}

	public function reset($MaGiamGia)
	{
	    $sql = "UPDATE `magiamgia` SET `TrangThai`= 1 WHERE `MaGiamGia`=?";
		$result = $this->db->query($sql, array($MaGiamGia));
		return $result;
	}

	public function resetAll()
	{
	    $sql = "UPDATE `magiamgia` SET `TrangThai`= 1 WHERE `TrangThai`= 0";
		$result = $this->db->query($sql);
		return $result;
	}

	public function delete($MaGiamGia)
	{
	    $sql = "DELETE FROM `magiamgia` WHERE `MaGiamGia`=?";
		$result = $this->db->query($sql, array($MaGiamGia));
		return $result;
	}

	public function deleteAll()
	{
	    $sql = "DELETE FROM `magiamgia` WHERE `TrangThai`=0";
		$result = $this->db->query($sql);
		return $result;
	}
}

/* End of file Model_MaGiamGia.php */
/* Location: ./application/models/Model_MaGiamGia.php */