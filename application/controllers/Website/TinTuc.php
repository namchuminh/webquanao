<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TinTuc extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Website/Model_TinTuc');
		$this->load->model('Website/Model_SanPham');
		$this->load->model('Model_TrangChu');
		$data = array();
	}

	public function index()
	{
		$totalRecords = $this->Model_TinTuc->checkNumber();
		$recordsPerPage = 6;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['title'] = "Tất Cả Tin Tức Trong Cửa Hàng!";
		$data['list'] = $this->Model_TinTuc->getAll();
		return $this->load->view('Website/View_TinTuc', $data);
	}

	public function Page($trang){
		$totalRecords = $this->Model_TinTuc->checkNumber();
		$recordsPerPage = 6;
		$totalPages = ceil($totalRecords / $recordsPerPage);

		if($trang < 1){
			return redirect(base_url('tin-tuc/trang/1/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('tin-tuc/trang/'.$totalPages.'/'));
		}

		$start = ($trang - 1) * $recordsPerPage;

		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['title'] = "Tất Cả Tin Tức Trong Cửa Hàng!";
			$data['list'] = $this->Model_TinTuc->getAll();
			return $this->load->view('Website/View_TinTuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['title'] = "Tất Cả Tin Tức Trong Cửa Hàng!";
			$data['list'] = $this->Model_TinTuc->getAll($start);
			return $this->load->view('Website/View_TinTuc', $data);
		}
	}

	public function Detail($DuongDan){
		if(count($this->Model_TinTuc->getBySlug($DuongDan)) == 0){
			return redirect(base_url('tin-tuc/'));
		}

		$data['category'] = $this->Model_SanPham->getCategory();
		$data['popular'] = $this->Model_TrangChu->getPopular();
		$data['title'] = $this->Model_TinTuc->getBySlug($DuongDan)[0]['TieuDe'];
		$data['detail'] = $this->Model_TinTuc->getBySlug($DuongDan);
		$data['new'] = $this->Model_TinTuc->getAll();
		return $this->load->view('Website/View_ChiTietTinTuc', $data);
	}

}

/* End of file TinTuc.php */
/* Location: ./application/controllers/TinTuc.php */