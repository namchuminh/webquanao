<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ChuyenMuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_ChuyenMuc');
	}

	public function index()
	{
		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ChuyenMuc->getAll();
		return $this->load->view('Admin/View_ChuyenMuc', $data);
	}

	public function Page($trang){

		$totalRecords = $this->Model_ChuyenMuc->checkNumber();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/chuyen-muc/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAll();
			return $this->load->view('Admin/View_ChuyenMuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAll($start);
			return $this->load->view('Admin/View_ChuyenMuc', $data);
		}
	}

	public function Add(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenchuyenmuc = $this->input->post('tenchuyenmuc');
			$duongdan = $this->input->post('duongdan');
			$anhchinh = "";

			if(empty($tenchuyenmuc) || empty($duongdan) ){
				$data['error'] = "Vui lòng nhập đủ thông tin chuyên mục!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}
			$regex = '/^.{1,255}$/u';
			if (!preg_match($regex, $tenchuyenmuc)) {
				$data['error'] = "Tên chuyên mục phải là hợp lệ và dưới 255 ký tứ!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}

			if (empty($_FILES['anhchinh']['name'])){
				$data['error'] = "Vui lòng nhập ảnh chính của chuyên mục!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}


			//Add image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$imageChinh = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$imageChinh['file_name'];
			}
			
			//Add news
			$masanpham = $this->Model_ChuyenMuc->add($tenchuyenmuc,$duongdan,$anhchinh);

			$data['success'] = "Thêm chuyên mục thành công!";
			return $this->load->view('Admin/View_ThemChuyenMuc', $data);
		}

		return $this->load->view('Admin/View_ThemChuyenMuc');
	}

	public function Update($MaChuyenMuc){
		if(count($this->Model_ChuyenMuc->getById($MaChuyenMuc)) == 0){
			return redirect(base_url('admin/chuyen-muc/'));
		}


		$data['detail'] = $this->Model_ChuyenMuc->getById($MaChuyenMuc);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tenchuyenmuc = $this->input->post('tenchuyenmuc');
			$duongdan = $this->input->post('duongdan');
			$anhchinh = "";

			if(empty($tenchuyenmuc) || empty($duongdan) ){
				$data['error'] = "Vui lòng nhập đủ thông tin chuyên mục!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}
			$regex = '/^.{1,255}$/u';
			if (!preg_match($regex, $tenchuyenmuc)) {
				$data['error'] = "Tên chuyên mục phải là hợp lệ và dưới 255 ký tứ!";
				return $this->load->view('Admin/View_ThemChuyenMuc', $data);
			}


			//Update image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$imageChinh = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$imageChinh['file_name'];
				$this->Model_ChuyenMuc->update($tenchuyenmuc,$duongdan,$anhchinh,$MaChuyenMuc);
			}
			$this->Model_ChuyenMuc->updateNoImage($tenchuyenmuc,$duongdan,$MaChuyenMuc);
			$data['detail'] = $this->Model_ChuyenMuc->getById($MaChuyenMuc);
			$data['success'] = "Cập nhật chuyên mục thành công!";
			return $this->load->view('Admin/View_SuaChuyenMuc', $data);
		}
		return $this->load->view('Admin/View_SuaChuyenMuc', $data);
	}

	public function remove($MaChuyenMuc){
		$this->Model_ChuyenMuc->remove($MaChuyenMuc);
		return redirect(base_url('admin/chuyen-muc/'));
	}

	public function trash(){
		$totalRecords = $this->Model_ChuyenMuc->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_ChuyenMuc->getAllTrash();
		return $this->load->view('Admin/View_ThungRacChuyenMuc', $data);
	}

	public function PageTrash($trang){

		$totalRecords = $this->Model_ChuyenMuc->checkNumberTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/chuyen-muc/thung-rac/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/chuyen-muc/thung-rac/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllTrash();
			return $this->load->view('Admin/View_ThungRacChuyenMuc', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_ChuyenMuc->getAllTrash($start);
			return $this->load->view('Admin/View_ThungRacChuyenMuc', $data);
		}
	}

	public function reset($MaChuyenMuc){
		$this->Model_ChuyenMuc->reset($MaChuyenMuc);
		return redirect(base_url('admin/chuyen-muc/thung-rac/'));
	}

	public function resetAll(){
		$this->Model_ChuyenMuc->resetAll();
		return redirect(base_url('admin/chuyen-muc/thung-rac/'));
	}

	public function delete($MaChuyenMuc){
		$this->Model_ChuyenMuc->delete($MaChuyenMuc);
		return redirect(base_url('admin/chuyen-muc/thung-rac/'));
	}

	public function deleteAll(){
		$this->Model_ChuyenMuc->deleteAll();
		return redirect(base_url('admin/chuyen-muc/thung-rac/'));
	}

}

/* End of file ChuyenMuc.php */
/* Location: ./application/controllers/ChuyenMuc.php */