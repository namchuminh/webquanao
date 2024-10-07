<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TinTuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}

		$data = array();
		$this->load->model('Admin/Model_TinTuc');
		$this->load->model('Admin/Model_DangNhap');
	}

	public function index()
	{
		$totalRecords = $this->Model_TinTuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_TinTuc->getAll();
		return $this->load->view('Admin/View_TinTuc', $data);
	}

	public function Page($trang){

		$totalRecords = $this->Model_TinTuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/tin-tuc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/tin-tuc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAll();
			return $this->load->view('Admin/View_TinTuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAll($start);
			return $this->load->view('Admin/View_TinTuc', $data);
		}
	}

	public function Add(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenbaiviet = $this->input->post('tenbaiviet');
			$duongdan = $this->input->post('duongdan');
			$the = $this->input->post('the');
			$noidung = $this->input->post('noidung');
			$anhchinh = "";

			if(empty($tenbaiviet) || empty($duongdan) || empty($the) || empty($noidung)){
				$data['error'] = "Vui lòng nhập đủ thông tin bài viết!";
				return $this->load->view('Admin/View_ThemTinTuc', $data);
			}
			$regex = '/^.{1,500}$/u';
			if (!preg_match($regex, $tenbaiviet)) {
				$data['error'] = "Tên bài viết phải là hợp lệ và dưới 500 ký tứ!";
				return $this->load->view('Admin/View_ThemTinTuc', $data);
			}

			if (empty($_FILES['anhchinh']['name'])){
				$data['error'] = "Vui lòng nhập ảnh chính của tin tức!";
				return $this->load->view('Admin/View_ThemTinTuc', $data);
			}


			//Add image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$imageChinh = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$imageChinh['file_name'];
			}

			$MaNhanVien = $this->Model_DangNhap->getInfoByUsername($this->session->userdata('taikhoan'))[0]['MaNhanVien'];
			
			//Add news
			$masanpham = $this->Model_TinTuc->addNews($tenbaiviet,$noidung,$anhchinh,$duongdan,$the,$MaNhanVien);

			$data['success'] = "Thêm tin tức thành công!";
			return $this->load->view('Admin/View_ThemTinTuc', $data);
		}
		return $this->load->view('Admin/View_ThemTinTuc');
	}

	public function Update($MaTinTuc){
		if(count($this->Model_TinTuc->getById($MaTinTuc)) == 0){
			return redirect(base_url('admin/tin-tuc/'));
		}


		$data['detail'] = $this->Model_TinTuc->getById($MaTinTuc);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenbaiviet = $this->input->post('tenbaiviet');
			$duongdan = $this->input->post('duongdan');
			$the = $this->input->post('the');
			$noidung = $this->input->post('noidung');
			$anhchinh = "";

			if(empty($tenbaiviet) || empty($duongdan) || empty($the) || empty($noidung)){
				$data['error'] = "Vui lòng nhập đủ thông tin bài viết!";
				return $this->load->view('Admin/View_ThemTinTuc', $data);
			}
			$regex = '/^.{1,500}$/u';
			if (!preg_match($regex, $tenbaiviet)) {
				$data['error'] = "Tên bài viết phải là hợp lệ và dưới 500 ký tứ!";
				return $this->load->view('Admin/View_ThemTinTuc', $data);
			}


			//Update image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$imageChinh = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$imageChinh['file_name'];
				$this->Model_TinTuc->update($tenbaiviet,$noidung,$anhchinh,$duongdan,$the,$MaTinTuc);
			}

			$this->Model_TinTuc->updateNoImage($tenbaiviet,$noidung,$duongdan,$the,$MaTinTuc);

			$data['detail'] = $this->Model_TinTuc->getById($MaTinTuc);
			$data['success'] = "Cập nhật tin tức thành công!";
			return $this->load->view('Admin/View_SuaTinTuc', $data);

		}
		return $this->load->view('Admin/View_SuaTinTuc', $data);
	}

	public function remove($MaTinTuc){
		$this->Model_TinTuc->remove($MaTinTuc);
		return redirect(base_url('admin/tin-tuc/'));
	}

	public function trash(){
		$totalRecords = $this->Model_TinTuc->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_TinTuc->getAllTrash();
		return $this->load->view('Admin/View_ThungRacTinTuc', $data);
	}

	public function PageTrash($trang){

		$totalRecords = $this->Model_TinTuc->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/tin-tuc/thung-rac/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/tin-tuc/thung-rac/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAllTrash();
			return $this->load->view('Admin/View_ThungRacTinTuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_TinTuc->getAllTrash($start);
			return $this->load->view('Admin/View_ThungRacTinTuc', $data);
		}
	}

	public function reset($MaTinTuc){
		$this->Model_TinTuc->reset($MaTinTuc);
		return redirect(base_url('admin/tin-tuc/thung-rac/'));
	}

	public function resetAll(){
		$this->Model_TinTuc->resetAll();
		return redirect(base_url('admin/tin-tuc/thung-rac/'));
	}

	public function delete($MaTinTuc){
		$this->Model_TinTuc->delete($MaTinTuc);
		return redirect(base_url('admin/tin-tuc/thung-rac/'));
	}

	public function deleteAll(){
		$this->Model_TinTuc->deleteAll();
		return redirect(base_url('admin/tin-tuc/thung-rac/'));
	}
}

/* End of file TinTuc.php */
/* Location: ./application/controllers/TinTuc.php */