<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChuyenMuc extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Website/Model_ChuyenMuc');
		$data = array();
	}

	public function index()
	{
		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 8;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['title'] = "Tất Cả Chuyên Mục Sản Phẩm Trong Cửa Hàng!";
		$data['list'] = $this->Model_ChuyenMuc->getAllCategory();
		return $this->load->view('Website/View_ChuyenMuc', $data);
	}

	public function Page($trang)
	{

		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 8;
		$totalPages = ceil($totalRecords / $recordsPerPage);

		if($trang < 1){
			return redirect(base_url('chuyen-muc/trang/1/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('chuyen-muc/trang/'.$totalPages.'/'));
		}

		$start = ($trang - 1) * $recordsPerPage;

		if($start == 0){
			$data['title'] = "Tất Cả Chuyên Mục Sản Phẩm Trong Cửa Hàng!";
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllCategory();
			return $this->load->view('Website/View_ChuyenMuc', $data);
		}else{
			$data['title'] = "Tất Cả Chuyên Mục Sản Phẩm Trong Cửa Hàng!";
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllCategory($start);
			return $this->load->view('Website/View_ChuyenMuc', $data);
		}
		
	}

	public function Detail($DuongDan){

		if(count($this->Model_ChuyenMuc->getDetailCategory($DuongDan)) == 0){
			return redirect(base_url('chuyen-muc/'));
		}

		$MaChuyenMuc = $this->Model_ChuyenMuc->getDetailCategory($DuongDan)[0]['MaChuyenMuc'];
		$totalRecords = $this->Model_ChuyenMuc->checkNumberProduct($MaChuyenMuc);
		$recordsPerPage = 12;
		$totalPages = ceil($totalRecords / $recordsPerPage);

		$data['totalPages'] = $totalPages;
		$data['title'] = "Chuyên Muc ".$this->Model_ChuyenMuc->getDetailCategory($DuongDan)[0]['TenChuyenMuc'];
		$data['list'] = $this->Model_ChuyenMuc->getAllProduct($MaChuyenMuc);
		$data['category'] = $this->Model_ChuyenMuc->getDetailCategory($DuongDan)[0]['TenChuyenMuc'];
		$data['slug'] = $DuongDan;
		return $this->load->view('Website/View_SanPhamChuyenMuc', $data);

	}


	public function PageDetail($DuongDan, $trang){

		if(count($this->Model_ChuyenMuc->getDetailCategory($DuongDan)) == 0){
			return redirect(base_url('chuyen-muc/'));
		}

		$MaChuyenMuc = $this->Model_ChuyenMuc->getDetailCategory($DuongDan)[0]['MaChuyenMuc'];
		$totalRecords = $this->Model_ChuyenMuc->checkNumberProduct($MaChuyenMuc);
		$recordsPerPage = 12;
		$totalPages = ceil($totalRecords / $recordsPerPage);

		if($trang < 1){
			return redirect(base_url('chuyen-muc/'.$DuongDan.'/trang/1/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('chuyen-muc/'.$DuongDan.'/trang/'.$totalPages.'/'));
		}

		$start = ($trang - 1) * $recordsPerPage;

		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['title'] = "Chuyên Muc ".$this->Model_ChuyenMuc->getDetailCategory($DuongDan)[0]['TenChuyenMuc'];
			$data['list'] = $this->Model_ChuyenMuc->getAllProduct($MaChuyenMuc);
			$data['category'] = $this->Model_ChuyenMuc->getDetailCategory($DuongDan)[0]['TenChuyenMuc'];
			$data['slug'] = $DuongDan;
			return $this->load->view('Website/View_SanPhamChuyenMuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['title'] = "Chuyên Muc ".$this->Model_ChuyenMuc->getDetailCategory($DuongDan)[0]['TenChuyenMuc'];
			$data['list'] = $this->Model_ChuyenMuc->getAllProduct($MaChuyenMuc, $start);
			$data['category'] = $this->Model_ChuyenMuc->getDetailCategory($DuongDan)[0]['TenChuyenMuc'];
			$data['slug'] = $DuongDan;
			return $this->load->view('Website/View_SanPhamChuyenMuc', $data);
		}
	}		

}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */