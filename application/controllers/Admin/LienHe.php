<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LienHe extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_LienHe');
	}

	public function index()
	{
		$totalRecords = $this->Model_LienHe->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_LienHe->getAll();
		return $this->load->view('Admin/View_LienHe', $data);
	}

	public function Page($trang){

		$totalRecords = $this->Model_LienHe->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/lien-he/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/lien-he/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LienHe->getAll();
			return $this->load->view('Admin/View_LienHe', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LienHe->getAll($start);
			return $this->load->view('Admin/View_LienHe', $data);
		}
	}

	public function View($MaLienHe){
		if(count($this->Model_LienHe->getById($MaLienHe)) == 0){
			return redirect(base_url('admin/lien-he/'));
		}

		$data['detail'] = $this->Model_LienHe->getById($MaLienHe);
		return $this->load->view('Admin/View_XemLienHe', $data);
	}

	public function remove($MaLienHe){
		$this->Model_LienHe->remove($MaLienHe);
		return redirect(base_url('admin/lien-he/'));
	}

	public function trash(){
		$totalRecords = $this->Model_LienHe->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_LienHe->getAllTrash();
		return $this->load->view('Admin/View_ThungRacLienHe', $data);
	}

	public function PageTrash($trang){

		$totalRecords = $this->Model_LienHe->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/lien-he/thung-rac/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/lien-he/thung-rac/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LienHe->getAllTrash();
			return $this->load->view('Admin/View_ThungRacLienHe', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_LienHe->getAllTrash($start);
			return $this->load->view('Admin/View_ThungRacLienHe', $data);
		}
	}

	public function reset($MaLienHe){
		$this->Model_LienHe->reset($MaLienHe);
		return redirect(base_url('admin/lien-he/thung-rac/'));
	}

	public function resetAll(){
		$this->Model_LienHe->resetAll();
		return redirect(base_url('admin/lien-he/thung-rac/'));
	}

	public function delete($MaLienHe){
		$this->Model_LienHe->delete($MaLienHe);
		return redirect(base_url('admin/lien-he/thung-rac/'));
	}

	public function deleteAll(){
		$this->Model_LienHe->deleteAll();
		return redirect(base_url('admin/lien-he/thung-rac/'));
	}
}

/* End of file LienHe.php */
/* Location: ./application/controllers/LienHe.php */