<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LienHe extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Website/Model_LienHe');
		$data = array();
	}

	public function index()
	{
		$data['title'] = "Liên Hệ Với Cửa Hàng!";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenkhachhang = $this->input->post('tenkhachhang');
			$sodienthoai = $this->input->post('sodienthoai');
			$tieude = $this->input->post('tieude');
			$noidung = $this->input->post('noidung');
			if($this->session->has_userdata('khachhang')){
				if(empty($tieude) || empty($noidung)){
					$data['error'] = "Vui Lòng Nhập Đủ Thông Tin Liên Hệ";
					return $this->load->view('Website/View_LienHe', $data);
				}
				$tenkhachhang = $this->session->userdata('TenKhachHang');
				$sodienthoai = $this->session->userdata('SoDienThoai');
				$this->Model_LienHe->add($tenkhachhang, $sodienthoai, $tieude, $noidung);
				$data['success'] = "Gửi Liên Hệ Thành Công!";
				return $this->load->view('Website/View_LienHe', $data);
			}else{
				if(empty($tenkhachhang) || empty($sodienthoai) || empty($tieude) || empty($noidung)){
					$data['error'] = "Vui Lòng Nhập Đủ Thông Tin Liên Hệ";
					return $this->load->view('Website/View_LienHe', $data);
				}
				$this->Model_LienHe->add($tenkhachhang, $sodienthoai, $tieude, $noidung);
				$data['success'] = "Gửi Liên Hệ Thành Công!";
				return $this->load->view('Website/View_LienHe', $data);
			}
		}

		return $this->load->view('Website/View_LienHe', $data);
	}

}

/* End of file LienHe.php */
/* Location: ./application/controllers/LienHe.php */