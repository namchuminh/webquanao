<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_CauHinh extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$sql = "SELECT * FROM cauhinh";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function update($email,$sodienthoai,$diachi,$tenwebsite,$logo,$facebook,$instagram,$tiktok){
		$sql = "UPDATE `cauhinh` SET `Email`=?,`SoDienThoai`=?,`DiaChi`=?,`TenWebsite`=?,`Logo`=?,`Facebook`=?,`Instagram`=?,`Tiktok`=? WHERE 1";
		$result = $this->db->query($sql,array($email,$sodienthoai,$diachi,$tenwebsite,$logo,$facebook,$instagram,$tiktok));
		return $result;
	}

	public function uploadBrand($ThuongHieu){
		$sql = "UPDATE `cauhinh` SET `ThuongHieu`=? WHERE 1";
		$result = $this->db->query($sql,array($ThuongHieu));
		return $result;
	}

	public function updateNoImage($email,$sodienthoai,$diachi,$tenwebsite,$facebook,$instagram,$tiktok){
		$sql = "UPDATE `cauhinh` SET `Email`=?,`SoDienThoai`=?,`DiaChi`=?,`TenWebsite`=?,`Facebook`=?,`Instagram`=?,`Tiktok`=? WHERE 1";
		$result = $this->db->query($sql,array($email,$sodienthoai,$diachi,$tenwebsite,$facebook,$instagram,$tiktok));
		return $result;
	}
}

/* End of file Model_CauHinh.php */
/* Location: ./application/models/Model_CauHinh.php */