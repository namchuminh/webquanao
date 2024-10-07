<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KhachHang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_KhachHang');
	}

	public function index()
	{
		$totalRecords = $this->Model_KhachHang->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_KhachHang->getAll();
		return $this->load->view('Admin/View_KhachHang', $data);
	}

	public function Page($trang){

		$totalRecords = $this->Model_KhachHang->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/khach-hang/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/khach-hang/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_KhachHang->getAll();
			return $this->load->view('Admin/View_KhachHang', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_KhachHang->getAll($start);
			return $this->load->view('Admin/View_KhachHang', $data);
		}
	}

	public function View($MaKhachHang){
		if(count($this->Model_KhachHang->getById($MaKhachHang)) == 0){
			return redirect(base_url('admin/khach-hang/'));
		}

		$data['detail'] = $this->Model_KhachHang->getById($MaKhachHang);
		return $this->load->view('Admin/View_KhachHang', $data);
	}

	public function remove($MaKhachHang){
		$this->Model_KhachHang->remove($MaKhachHang);
		return redirect(base_url('admin/khach-hang/'));
	}

	public function trash(){
		$totalRecords = $this->Model_KhachHang->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_KhachHang->getAllTrash();
		return $this->load->view('Admin/View_ThungRacKhachHang', $data);
	}

	public function PageTrash($trang){

		$totalRecords = $this->Model_KhachHang->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/khach-hang/thung-rac/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/khach-hang/thung-rac/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_KhachHang->getAllTrash();
			return $this->load->view('Admin/View_ThungRacKhachHang', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_KhachHang->getAllTrash($start);
			return $this->load->view('Admin/View_ThungRacKhachHang', $data);
		}
	}

	public function unlock($MaKhachHang){
		$this->Model_KhachHang->reset($MaKhachHang);
		return redirect(base_url('admin/khach-hang/'));
	}

	public function reset($MaKhachHang){
		$this->Model_KhachHang->reset($MaKhachHang);
		return redirect(base_url('admin/khach-hang/thung-rac/'));
	}

	public function resetAll(){
		$this->Model_KhachHang->resetAll();
		return redirect(base_url('admin/khach-hang/thung-rac/'));
	}

	public function delete($MaKhachHang){
		$this->Model_KhachHang->delete($MaKhachHang);
		return redirect(base_url('admin/khach-hang/thung-rac/'));
	}

	public function deleteAll(){
		$this->Model_KhachHang->deleteAll();
		return redirect(base_url('admin/khach-hang/thung-rac/'));
	}
}

/* End of file KhachHang.php */
/* Location: ./application/controllers/KhachHang.php */