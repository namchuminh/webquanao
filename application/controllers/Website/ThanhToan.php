<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ThanhToan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('khachhang')){
			return redirect(base_url('dang-nhap/'));
		}

		$this->session->unset_userdata('redirectPay');


		$cart = $this->session->userdata('cart');
        if(!$cart || count($cart) == 0){
            return redirect(base_url('gio-hang/'));
        }
        foreach ($cart as $key => $value) {
            if(count($value['color']) > 1){
                return redirect(base_url('gio-hang/'));
            }
        }
        $this->load->model('Website/Model_ThanhToan');
        $this->load->model('Website/Model_SanPham');
        $this->load->model('Website/Model_GioHang');
        $data = array();
	}

	public function index()
	{
		$cart = $this->session->userdata('cart');
		$data['title'] = "Thanh Toán Đơn Hàng!";
		return $this->load->view('Website/View_ThanhToan', $data);
	}

	public function resultBank(){
		
		if($_GET['vnp_ResponseCode'] != 00){
			return redirect(base_url('thanh-toan/'));
		}

		$cart = $this->session->userdata('cart');
		$makhachhang = $this->Model_ThanhToan->getCustomerById($this->session->userdata('khachhang'))[0]['MaKhachHang'];
		$tencongty = $_GET['tencongty'] == "" ? "Không" : $_GET['tencongty'];
		$quanhuyen = $_GET['quanhuyen'];
		$thanhpho = $_GET['thanhpho'];
		$diachi = $_GET['diachi'];

		$thanhtien = $this->session->userdata('sumCart');
		$giamgia = 0;
		$soluong = 0;
		$phuongthucthanhtoan = 2;

		foreach ($cart as $key => $value) {
			$soluong += $value['number'];
		}

		if($this->session->has_userdata('saleCode')){
			$giamgia = $this->session->userdata('saleCode');
		}

		$diachi = $diachi. ", ".$quanhuyen.", ".$thanhpho;

		$madonhang = $this->Model_ThanhToan->add($makhachhang, $soluong, $thanhtien, $diachi, $giamgia, $tencongty, $phuongthucthanhtoan);

		$mau = [
            'blue' => 'Xanh',
            'red' => 'Đỏ',
            'yellow' => 'Vàng',
            'white' => 'Trắng',
            'black' => 'Đen',
            'pink' => 'Hồng'
        ];

		foreach ($cart as $key => $value) {
			$this->Model_ThanhToan->addDetail($madonhang, $value['id'], $value['number'], $mau[$value['color'][0]], $value['size']);

			$mamausac = $this->Model_GioHang->getIdColor($value['id'], $value['color'][0])[0]['MaMauSac'];


			$soluongcu = $this->Model_ThanhToan->getNumberOld($value['id'],$mamausac,$value['size'])[0]['SoLuong'];

			$soluongmoi = $soluongcu - $value['number'];


			if($soluongmoi <= 0){
				$soluongmoi = 0;
			}
			$this->Model_ThanhToan->updateNumberProductPay($soluongmoi,$value['id'],$mamausac,$value['size']);
		}

		$this->session->unset_userdata('saleCode');
		$this->session->unset_userdata('cart');
		$this->session->unset_userdata('sumCart');
		$this->session->unset_userdata('numberCart');

		return redirect(base_url('khach-hang/'));

	}

	public function bankVnpay(){
		$tencongty = $_GET['tencongty'];
		$quanhuyen = $_GET['quanhuyen'];
		$thanhpho = $_GET['thanhpho'];
		$diachi = $_GET['diachi'];
		$bank_code = $_GET['nganhang'];
		$amount = $this->session->userdata('sumCart');

		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$vnp_TmnCode = "UKSNYWZS"; //Website ID in VNPAY System
		$vnp_HashSecret = "9RYAAKDJNOQB8PWV0HVOY2BBN1O5HUFQ"; //Secret key
		$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
		$vnp_Returnurl = base_url("/thanh-toan-vnpay/"."?tencongty=".$tencongty."&quanhuyen=".$quanhuyen."&thanhpho=".$thanhpho."&diachi=".$diachi);
		$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

		$startTime = date("YmdHis");
		$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
		$vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
		$vnp_OrderInfo = "thanh toan vnpay";
		$vnp_OrderType = "order";
		$vnp_Amount = $amount * 100;
		$vnp_Locale = 'vn';
		$vnp_BankCode = $bank_code;

		$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

		$inputData = array(
		    "vnp_Version" => "2.1.0",
		    "vnp_TmnCode" => $vnp_TmnCode,
		    "vnp_Amount" => $vnp_Amount,
		    "vnp_Command" => "pay",
		    "vnp_CreateDate" => date('YmdHis'),
		    "vnp_CurrCode" => "VND",
		    "vnp_IpAddr" => $vnp_IpAddr,
		    "vnp_Locale" => $vnp_Locale,
		    "vnp_OrderInfo" => $vnp_OrderInfo,
		    "vnp_OrderType" => $vnp_OrderType,
		    "vnp_ReturnUrl" => $vnp_Returnurl,
		    "vnp_TxnRef" => $vnp_TxnRef,
		);

		if (isset($vnp_BankCode) && $vnp_BankCode != "") {
		    $inputData['vnp_BankCode'] = $vnp_BankCode;
		}
		if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
		    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
		}
		ksort($inputData);
		$query = "";
		$i = 0;
		$hashdata = "";
		foreach ($inputData as $key => $value) {
		    if ($i == 1) {
		        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
		    } else {
		        $hashdata .= urlencode($key) . "=" . urlencode($value);
		        $i = 1;
		    }
		    $query .= urlencode($key) . "=" . urlencode($value) . '&';
		}
		$vnp_Url = $vnp_Url . "?" . $query;
		$vnpSecureHash = "";
		if (isset($vnp_HashSecret)) {
		    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
		    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
		}
		$returnData = array('code' => '00'
		    , 'message' => 'success'
		    , 'data' => $vnp_Url);
		header('Location: ' . $vnp_Url);
	    die();
	}

	public function PayOrder(){
		$cart = $this->session->userdata('cart');
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$makhachhang = $this->Model_ThanhToan->getCustomerById($this->session->userdata('khachhang'))[0]['MaKhachHang'];
			$quanhuyen = $this->input->post('quanhuyen');
			$thanhpho = $this->input->post('thanhpho');
			$diachi = $this->input->post('diachi');
			$tencongty = "Không";
			$thanhtien = $this->session->userdata('sumCart');
			$giamgia = 0;
			$soluong = 0;
			$phuongthucthanhtoan = $this->input->post('payment_method');

			if(empty($quanhuyen) || empty($thanhpho) || empty($diachi)){
				echo "Vui Lòng Nhập Đầy Đủ Thông Tin Địa Chỉ Giao Hàng!";
				return;
			}

			if(empty($phuongthucthanhtoan)){
				echo "Vui Lòng Chọn Phương Thức Thanh Toán!";
				return;
			}

			foreach ($cart as $key => $value) {
				$soluong += $value['number'];
			}
			
			if(!empty($this->input->post('tencongty'))){
				$tencongty = $this->input->post('tencongty');
			}

			if($this->session->has_userdata('saleCode')){
				$giamgia = $this->session->userdata('saleCode');
			}

			$diachi = $diachi. ", ".$quanhuyen.", ".$thanhpho;

			$madonhang = $this->Model_ThanhToan->add($makhachhang, $soluong, $thanhtien, $diachi, $giamgia, $tencongty, $phuongthucthanhtoan);


			$mau = [
                'blue' => 'Xanh',
                'red' => 'Đỏ',
                'yellow' => 'Vàng',
                'white' => 'Trắng',
                'black' => 'Đen',
                'pink' => 'Hồng'
            ];

			foreach ($cart as $key => $value) {
				$this->Model_ThanhToan->addDetail($madonhang, $value['id'], $value['number'], $mau[$value['color'][0]], $value['size']);

				$mamausac = $this->Model_GioHang->getIdColor($value['id'], $value['color'][0])[0]['MaMauSac'];


				$soluongcu = $this->Model_ThanhToan->getNumberOld($value['id'],$mamausac,$value['size'])[0]['SoLuong'];

				$soluongmoi = $soluongcu - $value['number'];


				if($soluongmoi <= 0){
					$soluongmoi = 0;
				}
				$this->Model_ThanhToan->updateNumberProductPay($soluongmoi,$value['id'],$mamausac,$value['size']);
			}

			$this->session->unset_userdata('saleCode');
			$this->session->unset_userdata('cart');
			$this->session->unset_userdata('sumCart');
			$this->session->unset_userdata('numberCart');

			echo TRUE;
		}
	}

}

/* End of file ThanhToan.php */
/* Location: ./application/controllers/ThanhToan.php */