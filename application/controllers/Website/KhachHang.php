<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KhachHang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('khachhang')){
			return redirect(base_url('dang-nhap/'));
		}

		if($this->session->has_userdata('redirectPay')){
			return redirect(base_url('thanh-toan/'));
		}

		$this->load->model('Website/Model_KhachHang');
		$this->load->model('Website/Model_SanPham');
		$this->load->model('Website/Model_ThanhToan');
		$this->load->model('Website/Model_GioHang');
		$data = array();
	}

	public function index()
	{
		$data['title'] = "Thông Tin Khách Hàng!";
		$data['list'] = $this->Model_KhachHang->getById($this->session->userdata('MaKhachHang'));
		return $this->load->view('Website/View_KhachHang', $data);
	}

	public function Detail($madonhang){
		if(count($this->Model_KhachHang->checkOrderById($madonhang)) == 0){
			return redirect(base_url('khach-hang/'));
		}
		$data['id'] = $madonhang;
		$data['title'] = "Xem Đơn Hàng ĐH00".$madonhang;
		$data['list'] = $this->Model_KhachHang->getDetailById($madonhang);
		return $this->load->view('Website/View_ChiTietDonHang', $data);
	}

	public function removeOrder($madonhang){
		if(count($this->Model_KhachHang->checkOrderById($madonhang)) == 0){
			return redirect(base_url('khach-hang/'));
		}

		$data = $this->Model_KhachHang->getDetailById($madonhang);

		$mausac = [
			'Xanh' => 'blue',
            'Đỏ' => 'red',
            'Vàng' => 'yellow',
            'Trắng' => 'white',
            'Đen' => 'black',
            'Hồng' => 'pink'
		];

		foreach ($data as $key => $value) {

			$tenmausac = $mausac[$value['MauSac']];

			$mamausac = $this->Model_GioHang->getIdColor($value['MaSanPham'], $tenmausac)[0]['MaMauSac'];

			$soluongcu = $this->Model_ThanhToan->getNumberOld($value['MaSanPham'],$mamausac,$value['KichThuoc'])[0]['SoLuong'];

			$soluongmoi = $soluongcu + $value['SoLuong'];
			$this->Model_KhachHang->updateNumberProductCancel($soluongmoi,$value['MaSanPham'],$mamausac,$value['KichThuoc']);
		}

		$this->Model_KhachHang->removeOrder($madonhang);

		return redirect(base_url('khach-hang/'));
	}

	public function Update(){
		$taikhoan = $this->session->userdata('khachhang');
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenkhachhang = $this->input->post('tenkhachhang_c');
			$sodienthoai = $this->input->post('sodienthoai_c');
			$email = $this->input->post('email_c');
			$diachi = $this->input->post('diachi_c');
			$matkhau = $this->input->post('matkhau_c');
			$matkhaumoi = $this->input->post('matkhaumoi_c');
			$matkhaumoi2 = $this->input->post('matkhaumoi2_c');

			if(empty($tenkhachhang) || empty($sodienthoai) || empty($email) || empty($diachi)){
				echo "Vui Lòng Nhập Đủ Thông Tin Khách Hàng!";
				return;
			}

			$regex = '/^[\p{L}\p{Mn}\p{Pd}\s]+$/u';
			if (!preg_match($regex, $tenkhachhang)) {
				echo "Họ Tên Khách Hàng Không Hợp Lệ!";
				return;
			}

			$regexEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
			if (!preg_match($regexEmail, $email)) {
				echo "Email Khách Hàng Không Hợp Lệ!";
				return;
			}

			$regexPhone = '/^(?:\+84|0)\d{9,11}$/';
			if (!preg_match($regexPhone, $sodienthoai)) {
				echo "Số Điện Thoại Khách Hàng Không Hợp Lệ!";
				return;
			}

			if(!empty($matkhau) || !empty($matkhaumoi) || !empty($matkhaumoi2)){
				if(empty($matkhau)){
					echo "Vui Lòng Nhập Mật Khẩu Hiện Tại!";
					return;
				}

				if($this->Model_KhachHang->getCustomerByUsername($taikhoan, md5($matkhau)) < 1){
					echo "Mật Khẩu Hiện Tại Không Chính Xác!";
					return;
				}

				if(empty($matkhaumoi)){
					echo "Vui Lòng Nhập Mật Khẩu Mới!";
					return;
				}

				if(empty($matkhaumoi2)){
					echo "Vui Lòng Nhập Lại Mật Khẩu Mới!";
					return;
				}	

				if($matkhaumoi != $matkhaumoi2){
					echo "Mật Khẩu Nhập Lại Không Trùng Khớp!";
					return;
				}

				$this->Model_KhachHang->updatePassword(md5($matkhaumoi),$taikhoan);
			}

			$this->Model_KhachHang->update($tenkhachhang, $sodienthoai, $diachi, $email, $taikhoan);

			$newdata = array(
			    'TenKhachHang' => $tenkhachhang,
			    'SoDienThoai' => $sodienthoai,
			    'Email' => $email,
			    'DiaChi' => $diachi,
			);
			
			$this->session->set_userdata($newdata);

			return TRUE;
		}

	}
}

/* End of file KhachHang.php */
/* Location: ./application/controllers/KhachHang.php */