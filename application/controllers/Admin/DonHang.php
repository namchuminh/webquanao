<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DonHang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_DonHang');
	}

	public function index()
	{
		$totalRecords = $this->Model_DonHang->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_DonHang->getAll();
		return $this->load->view('Admin/View_DonHang', $data);
	}

	public function Page($trang){

		$totalRecords = $this->Model_DonHang->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/don-hang/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/don-hang/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_DonHang->getAll();
			return $this->load->view('Admin/View_DonHang', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_DonHang->getAll($start);
			return $this->load->view('Admin/View_DonHang', $data);
		}
	}

	public function action($MaHanhDong, $MaDonHang){
		$this->Model_DonHang->action($MaHanhDong, $MaDonHang);
		return redirect(base_url('admin/don-hang/'));
	}

	public function remove($MaDonHang){
		$this->Model_DonHang->remove($MaDonHang);
		return redirect(base_url('admin/don-hang/'));
	}

	public function trash(){
		$totalRecords = $this->Model_DonHang->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_DonHang->getAllTrash();
		return $this->load->view('Admin/View_ThungRacDonHang', $data);
	}

	public function PageTrash($trang){

		$totalRecords = $this->Model_DonHang->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/don-hang/thung-rac/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/don-hang/thung-rac/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_DonHang->getAllTrash();
			return $this->load->view('Admin/View_ThungRacChuyenMuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_DonHang->getAllTrash($start);
			return $this->load->view('Admin/View_ThungRacChuyenMuc', $data);
		}
	}

	public function reset($MaDonHang){
		$this->Model_DonHang->reset($MaDonHang);
		return redirect(base_url('admin/don-hang/thung-rac/'));
	}

	public function resetAll(){
		$this->Model_DonHang->resetAll();
		return redirect(base_url('admin/don-hang/thung-rac/'));
	}

	public function delete($MaDonHang){
		$this->Model_DonHang->delete($MaDonHang);
		return redirect(base_url('admin/don-hang/thung-rac/'));
	}

	public function deleteAll(){
		$this->Model_DonHang->deleteAll();
		return redirect(base_url('admin/don-hang/thung-rac/'));
	}

	public function View($MaDonHang){
		$data['list'] = $this->Model_DonHang->getDetailById($MaDonHang);
		$data['list_order'] = $this->Model_DonHang->getDetailOrderById($MaDonHang);
		return $this->load->view('Admin/View_XemDonHang', $data);
	}

	public function Status($loaidonhang){
		$result = null;
		if($loaidonhang == "chua-duyet"){
			$result = $this->Model_DonHang->getOrderByStatus(1);
		}else if($loaidonhang == "dang-giao"){
			$result = $this->Model_DonHang->getOrderByStatus(3);
		}else if($loaidonhang == "da-giao"){
			$result = $this->Model_DonHang->getOrderByStatus(4);
		}else if($loaidonhang == "tim-kiem"){
			if(isset($_GET['madonhang']) && !empty($_GET['madonhang'])){
				$madonhang = explode("ĐH",$_GET['madonhang']);
				$result = $this->Model_DonHang->searchOrderByCode($madonhang[1]);
			}else{
				return redirect(base_url('admin/don-hang/'));
			}
		}else{
			return redirect(base_url('admin/don-hang/'));
		}
		$data['list'] = $result;
		$data['totalPages'] = 1;
		return $this->load->view('Admin/View_DonHang', $data);
	}
}

/* End of file DonHang.php */
/* Location: ./application/controllers/DonHang.php */