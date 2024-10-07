<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_NhaCungCap extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT nhacungcap.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc FROM nhacungcap, chuyenmuc WHERE nhacungcap.MaChuyenMuc = chuyenmuc.MaChuyenMuc ORDER BY nhacungcap.MaNhaCungCap DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function add($tennhacungcap,$mota,$machuyenmuc){
		$data = array(
	        "TenNhaCungCap" => $tennhacungcap,
	        "MoTa" => $mota,
	        "MaChuyenMuc" => $machuyenmuc,
	    );
	    $this->db->insert('nhacungcap', $data);
	    $lastInsertedId = $this->db->insert_id();
	    return $lastInsertedId;
	}

	public function getById($MaNhaCungCap){
		$sql = "SELECT * FROM nhacungcap WHERE MaNhaCungCap = ?";
		$result = $this->db->query($sql, array($MaNhaCungCap));
		return $result->result_array();
	}

	public function update($tennhacungcap,$mota,$machuyenmuc,$trangthai,$MaNhaCungCap){
		$sql = "UPDATE `nhacungcap` SET `TenNhaCungCap`=?,`MoTa`=?,`MaChuyenMuc`=?,`TrangThai`=? WHERE `MaNhaCungCap`=?";
		$result = $this->db->query($sql, array($tennhacungcap,$mota,$machuyenmuc,$trangthai,$MaNhaCungCap));
		return $result;
	}

	public function remove($MaNhaCungCap){
		$sql = "UPDATE `nhacungcap` SET `TrangThai`=0 WHERE `MaNhaCungCap`=?";
		$result = $this->db->query($sql, array($MaNhaCungCap));
		return $result;
	}

	public function reset($MaNhaCungCap){
		$sql = "UPDATE `nhacungcap` SET `TrangThai`=1 WHERE `MaNhaCungCap`=?";
		$result = $this->db->query($sql, array($MaNhaCungCap));
		return $result;
	}

	public function resetAll(){
		$sql = "UPDATE `nhacungcap` SET `TrangThai`=1 WHERE `TrangThai`=0";
		$result = $this->db->query($sql);
		return $result;
	}

	public function delete($MaNhaCungCap){
		$sql = "DELETE FROM `nhacungcap` WHERE `MaNhaCungCap`=?";
		$result = $this->db->query($sql, array($MaNhaCungCap));
		return $result;
	}

	public function deleteAll(){
		$sql = "DELETE FROM `nhacungcap` WHERE `TrangThai`=0";
		$result = $this->db->query($sql);
		return $result;
	}

	public function getHistoryById($MaNhaCungCap){
		$sql = "SELECT sanpham.TenSanPham, sanpham.MaSanPham, nhacungcap.TenNhaCungCap, nhacungcap.MaNhaCungCap, lichsunhap.* FROM lichsunhap, sanpham, nhacungcap WHERE lichsunhap.MaNhaCungCap = nhacungcap.MaNhaCungCap AND lichsunhap.MaSanPham = sanpham.MaSanPham AND nhacungcap.MaNhaCungCap = ? ORDER BY lichsunhap.MaLichSuNhap DESC";
		$result = $this->db->query($sql, array($MaNhaCungCap));
		return $result->result_array();
	}
}

/* End of file Model_NhaCungCap.php */
/* Location: ./application/models/Model_NhaCungCap.php */