<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangNhap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/'));
		}
		$data = array();
		$this->load->model('Admin/Model_DangNhap');
	}

	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $taikhoan = $this->input->post('taikhoan');
			$matkhau = md5($this->input->post('matkhau'));

			if($taikhoan == "" || $matkhau == ""){
				$data["error"] = "Tài khoản hoặc mật khẩu không được trống!";
				return $this->load->view('Admin/View_DangNhap', $data);
			}


			if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $taikhoan)) {
			    $data["error"] = "Tài khoản không hợp lệ!";
				return $this->load->view('Admin/View_DangNhap', $data);
			} 

			if($this->Model_DangNhap->checkAccountAdmin($taikhoan, $matkhau) >= 1){
				if($this->Model_DangNhap->checkAccountAdminStatus($taikhoan, $matkhau) >= 1){
					$data["error"] = "Tài khoản không được phép truy cập!";
					return $this->load->view('Admin/View_DangNhap', $data);
				}else{
					$newdata = array(
					    'taikhoan'  => $taikhoan,
					    'login' => True,
					    'hoten' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['TenNhanVien'],
					    'anhchinh' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['AnhChinh']
					);
					$this->session->set_userdata($newdata);
					return redirect(base_url('admin/'));
				}
			}else{
				$data["error"] = "Tài khoản hoặc mật khẩu không đúng!";
				return $this->load->view('Admin/View_DangNhap', $data);
			}

        }

		return $this->load->view('Admin/View_DangNhap');
	}

}

/* End of file DangNhap.php */
/* Location: ./application/controllers/DangNhap.php */