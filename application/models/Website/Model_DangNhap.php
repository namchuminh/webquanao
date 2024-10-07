<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_DangNhap extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkAccount($taikhoan, $matkhau){
		$sql = "SELECT * FROM khachhang WHERE TaiKhoan = ? AND MatKhau = ?";
		$result = $this->db->query($sql, array($taikhoan, $matkhau));
		return $result->num_rows();
	}

	public function checkAccountStatus($taikhoan, $matkhau){
		$sql = "SELECT * FROM khachhang WHERE TaiKhoan = ? AND MatKhau = ? AND TrangThai = 0";
		$result = $this->db->query($sql, array($taikhoan, $matkhau));
		return $result->num_rows();
	}

	public function getInfoByUsername($taikhoan){
		$sql = "SELECT * FROM khachhang WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function checkPhoneStatus($sodienthoai){
		$sql = "SELECT * FROM khachhang WHERE SoDienThoai = ?";
		$result = $this->db->query($sql, array($sodienthoai));
		return $result->num_rows();
	}

	public function checkEmailStatus($email){
		$sql = "SELECT * FROM khachhang WHERE Email = ?";
		$result = $this->db->query($sql, array($email));
		return $result->num_rows();
	}

	public function checkUsernameStatus($taikhoan){
		$sql = "SELECT * FROM khachhang WHERE TaiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->num_rows();
	}

	public function add($tenkhachhang, $sodienthoai, $diachi, $email, $taikhoan, $matkhau){
		$sql = "INSERT INTO `khachhang`(`TenKhachHang`, `SoDienThoai`, `DiaChi`, `Email`, `TaiKhoan`, `MatKhau`) VALUES (?, ?, ?, ?, ?, ?)";
		$result = $this->db->query($sql, array($tenkhachhang, $sodienthoai, $diachi, $email, $taikhoan, $matkhau));
		return $result;
	}

}

/* End of file Model_DangNhap.php */
/* Location: ./application/models/Model_DangNhap.php */