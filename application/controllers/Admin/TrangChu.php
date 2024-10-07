<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrangChu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$this->load->model('Admin/Model_TrangChu');
		$data = array();
	}

	public function index()
	{
		$data['productCategory'] = $this->Model_TrangChu->getProductCategory()[0]['TongSoLuong'];
		$data['topCustomer'] = $this->Model_TrangChu->getTopCustomer();
		$data['productSelling'] = $this->Model_TrangChu->getProductSelling();
		$data['numberProduct'] = $this->Model_TrangChu->getNumberProductCurrent();
		$data['sumCustomer'] = $this->Model_TrangChu->getNumberCustomerCurrent() - $this->Model_TrangChu->getNumberCustomerOld();
		$data['customerCurrent'] = $this->Model_TrangChu->getNumberCustomerCurrent();
		$data['sumCurrent'] = $this->Model_TrangChu->getNumberRevenueCurrent() - $this->Model_TrangChu->getNumberRevenueOld();
		$data['revenueCurrent'] = $this->Model_TrangChu->getNumberRevenueCurrent();
		$data['sumOrders'] = $this->Model_TrangChu->getNumberOrdersCurrent() - $this->Model_TrangChu->getNumberOrdersOld();
		$data['numberOrders'] = $this->Model_TrangChu->getNumberOrdersCurrent();
		$data['getSumGroupByCategory'] = $this->Model_TrangChu->getSumGroupByCategory();
		return $this->load->view('Admin/View_TrangChu', $data);
	}


	public function categoryPopular(){
		$data = array();
		$list = $this->Model_TrangChu->getCategoryPopular();

		foreach ($list as $key => $value) {
			$category = [
				"label" => $value['TenChuyenMuc'],
				"value" => round($value['PhanTram'])
			];
			array_push($data,$category);
		}

		$data = json_encode($data);

		echo $data;
	}

	public function sumRevenue(){
		$data = array();

		for($i = 1; $i <= 12; $i++){
			$list = $this->Model_TrangChu->getSumRevenue($i);
			if(empty($list[0]['TongTien']) || !isset($list[0]['TongTien']) || $list[0]['TongTien'] == null){
				array_push($data,0);
			}else{
				array_push($data,(int)$list[0]['TongTien']);
			}
		}

		$data = json_encode($data);

		echo $data;
	}
}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */