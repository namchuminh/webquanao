<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DangNhap extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('khachhang')){
			return redirect(base_url('khach-hang/'));
		}

		$this->load->model('Website/Model_DangNhap');
		$data = array();
	}

	public function Login()
	{
		$data['title'] = "Đăng Nhập Khách Hàng!";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$taikhoan = $this->input->post('taikhoan');
			$matkhau = $this->input->post('matkhau');

			if($taikhoan == "" || $matkhau == ""){
				$data["error"] = "Tài khoản hoặc mật khẩu không được trống!";
				return $this->load->view('Website/View_DangNhap', $data);
			}

			if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $taikhoan)) {
			    $data["error"] = "Tài khoản không hợp lệ!";
				return $this->load->view('Website/View_DangNhap', $data);
			}

			if($this->Model_DangNhap->checkAccount($taikhoan, md5($matkhau)) >= 1){
				if($this->Model_DangNhap->checkAccountStatus($taikhoan, md5($matkhau)) >= 1){
					$data["error"] = "Tài khoản không được phép truy cập!";
					return $this->load->view('Website/View_DangNhap', $data);
				}else{
					$newdata = array(
					    'khachhang'  => $taikhoan,
					    'login' => True,
					    'TenKhachHang' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['TenKhachHang'],
					    'SoDienThoai' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['SoDienThoai'],
					    'Email' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['Email'],
					    'MaKhachHang' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['MaKhachHang'],
					    'DiaChi' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['DiaChi'],
					    'NgayThamGia' => $this->Model_DangNhap->getInfoByUsername($taikhoan)[0]['NgayThamGia']
					);
					$this->session->set_userdata($newdata);
					return redirect(base_url('khach-hang/'));
				}
			}else{
				$data["error"] = "Tài khoản hoặc mật khẩu không đúng!";
				return $this->load->view('Website/View_DangNhap', $data);
			}

		}
		return $this->load->view('Website/View_DangNhap', $data);
	}

	public function Register(){
		$data['title'] = "Đăng Ký Tài Khoản Khách Hàng!";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$taikhoan = $this->input->post('taikhoan');
			$matkhau = $this->input->post('matkhau');
			$matkhau2 = $this->input->post('matkhau2');
			$tenkhachhang = $this->input->post('tenkhachhang');
			$email = $this->input->post('email');
			$diachi = $this->input->post('diachi');
			$sodienthoai = $this->input->post('sodienthoai');

			if(empty($taikhoan) || empty($matkhau) || empty($matkhau2) || empty($tenkhachhang) || empty($email) || empty($diachi) || empty($sodienthoai)){
				$data["error"] = "Vui lòng nhập đủ thông tin khách hàng!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $taikhoan)) {
			    $data["error"] = "Tài khoản phải lớn hơn 3 ký tự và không chứa ký tự đặc biệt!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			$regex = '/^[\p{L}\p{Mn}\p{Pd}\s]+$/u';
			if (!preg_match($regex, $tenkhachhang)) {
				$data["error"] = "Họ tên khách hàng không hợp lệ!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			$regexEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
			if (!preg_match($regexEmail, $email)) {
				$data["error"] = "Email khách hàng không hợp lệ!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			$regexPhone = '/^(?:\+84|0)\d{9,11}$/';
			if (!preg_match($regexPhone, $sodienthoai)) {
				$data["error"] = "Số điện thoại khách hàng không hợp lệ!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			if($matkhau != $matkhau2){
				$data["error"] = "Mật khẩu không trùng khớp!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			if($this->Model_DangNhap->checkPhoneStatus($sodienthoai) >= 1){
				$data["error"] = "Số điện thoại đã được đăng ký trước đó!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			if($this->Model_DangNhap->checkEmailStatus($email) >= 1){
				$data["error"] = "Email đã được đăng ký trước đó!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			if($this->Model_DangNhap->checkUsernameStatus($taikhoan) >= 1){
				$data["error"] = "Tài khoản đã được đăng ký trước đó!";
				return $this->load->view('Website/View_DangKy', $data);
			}

			$this->Model_DangNhap->add(ucwords($tenkhachhang), $sodienthoai, $diachi, $email, $taikhoan, md5($matkhau));

			$newdata = array(
			    'khachhang'  => $taikhoan,
			    'login' => True,
			    'TenKhachHang' => $tenkhachhang,
			    'SoDienThoai' => $sodienthoai,
			);
			$this->session->set_userdata($newdata);
			return redirect(base_url('khach-hang/'));
		}

		return $this->load->view('Website/View_DangKy', $data);
	}

}

/* End of file DangNhap.php */
/* Location: ./application/controllers/DangNhap.php */