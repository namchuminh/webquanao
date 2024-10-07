<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_CaNhan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getByUsername($taikhoan){
		$sql = "SELECT * FROM nhanvien WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function uploadAvatar($anhchinh,$taikhoan){
		$sql = "UPDATE `nhanvien` SET `AnhChinh`=? WHERE `TaiKhoan`=?";
		$result = $this->db->query($sql, array($anhchinh,$taikhoan));
		return $result;
	}

	public function updatePassword($matkhau,$taikhoan){
		$sql = "UPDATE `nhanvien` SET `MatKhau`=? WHERE `TaiKhoan`=?";
		$result = $this->db->query($sql, array($matkhau,$taikhoan));
		return $result;
	}

	public function update($tenhanvien,$sodienthoai,$email,$diachi,$taikhoan){
		$sql = "UPDATE `nhanvien` SET `TenNhanVien`=?,`SoDienThoai`=?,`Email`=?,`DiaChi`=? WHERE `TaiKhoan`=?";
		$result = $this->db->query($sql, array($tenhanvien,$sodienthoai,$email,$diachi,$taikhoan));
		return $result;
	}
}

/* End of file Model_CaNhan.php */
/* Location: ./application/models/Model_CaNhan.php */