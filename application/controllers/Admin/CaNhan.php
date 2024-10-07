<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CaNhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$this->load->model('Admin/Model_CaNhan');
		$data = array();
	}

	public function index()
	{
		$taikhoan = $this->session->userdata('taikhoan');
		$data['detail'] = $this->Model_CaNhan->getByUsername($taikhoan);

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenhanvien = $this->input->post('hoten');
			$sodienthoai = $this->input->post('sodienthoai');
			$email = $this->input->post('email');
			$diachi = $this->input->post('diachi');
			$matkhau = $this->input->post('matkhau');

			if(empty($tenhanvien) || empty($sodienthoai) || empty($email) || empty($diachi)){
				$data['error'] = "Tên quản trị viên, số điện thoại, email, địa chỉ không được bỏ trống!";
				return $this->load->view('Admin/View_CaNhan', $data);
			}

			//Update image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$image = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$image['file_name'];
				$this->Model_CaNhan->uploadAvatar($anhchinh,$taikhoan);
			}

			if(!empty($matkhau)){
				$this->Model_CaNhan->updatePassword(md5($matkhau),$taikhoan);
			}

			$this->Model_CaNhan->update($tenhanvien,$sodienthoai,$email,$diachi,$taikhoan);

			$newdata = array(
			    'hoten' => $this->Model_CaNhan->getByUsername($taikhoan)[0]['TenNhanVien'],
			    'anhchinh' => $this->Model_CaNhan->getByUsername($taikhoan)[0]['AnhChinh']
			);

			$this->session->set_userdata($newdata);

			$data['success'] = "Cập nhật thông tin quản trị thành công!";
			$data['detail'] = $this->Model_CaNhan->getByUsername($taikhoan);
			return $this->load->view('Admin/View_CaNhan', $data);
		}

		return $this->load->view('Admin/View_CaNhan', $data);
	}

}

/* End of file CaNhan.php */
/* Location: ./application/controllers/CaNhan.php */