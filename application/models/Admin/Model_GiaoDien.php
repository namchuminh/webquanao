<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_GiaoDien extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($chuyenmuc,$theloai,$hinhanh){
		$data = array(
	        "MaChuyenMuc" => $chuyenmuc,
	        "TheLoai" => $theloai,
	        "HinhAnh" => $hinhanh,
	    );

	    $this->db->insert('giaodien', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function addNoCategory($theloai,$hinhanh){
		$data = array(
	        "TheLoai" => $theloai,
	        "HinhAnh" => $hinhanh,
	    );

	    $this->db->insert('giaodien', $data);
	    $lastInsertedId = $this->db->insert_id();

	    return $lastInsertedId;
	}

	public function checkNumber($theloai){
		$sql = "SELECT * FROM giaodien WHERE TheLoai = ?";
		$result = $this->db->query($sql, array($theloai));
		return $result->num_rows();
	}

	public function getAll(){
		$sql = "SELECT giaodien.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc FROM `giaodien` LEFT JOIN `chuyenmuc` ON giaodien.MaChuyenMuc = chuyenmuc.MaChuyenMuc";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getById($MaGiaoDien){
		$sql = "SELECT * FROM `giaodien` WHERE MaGiaoDien = ?";
		$result = $this->db->query($sql, array($MaGiaoDien));
		return $result->result_array();
	}

	public function updateImage($MaGiaoDien, $HinhAnh){
		$sql = "UPDATE `giaodien` SET `HinhAnh`=? WHERE `MaGiaoDien`=?";
		$result = $this->db->query($sql, array($HinhAnh,$MaGiaoDien));
		return $result;
	}

	public function update($ChuyenMuc, $MaGiaoDien){
		$sql = "UPDATE `giaodien` SET `MaChuyenMuc`=? WHERE `MaGiaoDien`=?";
		$result = $this->db->query($sql, array($ChuyenMuc,$MaGiaoDien));
		return $result;
	}

	public function updateNoCategory($MaGiaoDien){
		$sql = "UPDATE `giaodien` SET `MaChuyenMuc`= NULL WHERE `MaGiaoDien`=?";
		$result = $this->db->query($sql, array($MaGiaoDien));
		return $result;
	}

	public function delete($MaGiaoDien){
		$sql = "DELETE FROM `giaodien` WHERE `MaGiaoDien`=?";
		$result = $this->db->query($sql, array($MaGiaoDien));
		return $result;
	}
}

/* End of file Model_GiaoDien.php */
/* Location: ./application/models/Model_GiaoDien.php */