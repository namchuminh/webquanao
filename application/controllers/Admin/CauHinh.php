<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CauHinh extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_CauHinh');
	}

	public function index()
	{
		$data['detail'] = $this->Model_CauHinh->getAll();

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenwebsite = $this->input->post('tenwebsite');
			$sodienthoai = $this->input->post('sodienthoai');
			$email = $this->input->post('email');
			$diachi = $this->input->post('diachi');
			$facebook = $this->input->post('facebook');
			$instagram = $this->input->post('instagram');
			$tiktok = $this->input->post('tiktok');
			$logo = "";
			$thuonghieu = "";

			if(empty($tenwebsite) || empty($sodienthoai) || empty($email) || empty($diachi)){
				$data['error'] = "Tên website, số điện thoại, email, địa chỉ không được bỏ trống!";
				return $this->load->view('Admin/View_CauHinh', $data);
			}

			//Update image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('thuonghieu')){
				$imagebranh = $this->upload->data();
				$thuonghieu = base_url('uploads')."/".$imagebranh['file_name'];
				$this->Model_CauHinh->uploadBrand($thuonghieu);
			}

			if ($this->upload->do_upload('logo')){
				$imagelogo = $this->upload->data();
				$logo = base_url('uploads')."/".$imagelogo['file_name'];
				$this->Model_CauHinh->update($email,$sodienthoai,$diachi,$tenwebsite,$logo,$facebook,$instagram,$tiktok);
			}else{
				$this->Model_CauHinh->updateNoImage($email,$sodienthoai,$diachi,$tenwebsite,$facebook,$instagram,$tiktok);
			}

		
			$data['detail'] = $this->Model_CauHinh->getAll();
			$data['success'] = "Cập nhật cấu hình thành công!";
			return $this->load->view('Admin/View_CauHinh', $data);

		}
		return $this->load->view('Admin/View_CauHinh', $data);
	}

}

/* End of file CauHinh.php */
/* Location: ./application/controllers/CauHinh.php */