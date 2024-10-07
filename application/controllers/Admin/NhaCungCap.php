<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NhaCungCap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_NhaCungCap');
		$this->load->model('Admin/Model_SanPham');
	}

	public function index()
	{
		$data['list'] = $this->Model_NhaCungCap->getAll();
		return $this->load->view('Admin/View_NhaCungCap', $data);
	}

	public function Add(){
		$data['category'] = $this->Model_SanPham->getAllCategory();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tennhacungcap = $this->input->post('tennhacungcap');
			$machuyenmuc = $this->input->post('chuyenmuc');
			$mota = $this->input->post('mota');

			if(empty($tennhacungcap) || empty($machuyenmuc) || empty($mota)){
				$data['error'] = "Vui lòng nhập đủ thông tin nhà cung cấp!";
				return $this->load->view('Admin/View_ThemNhaCungCap', $data);
			}
			$regex = '/^.{1,255}$/u';
			if (!preg_match($regex, $tennhacungcap)) {
				$data['error'] = "Tên nhà cung câp phải là hợp lệ và dưới 255 ký tự!";
				return $this->load->view('Admin/View_ThemNhaCungCap', $data);
			}

			//Add news
			$masanpham = $this->Model_NhaCungCap->add($tennhacungcap,$mota,$machuyenmuc);

			$data['success'] = "Thêm nhà cung cấp thành công!";
			return $this->load->view('Admin/View_ThemNhaCungCap', $data);
		}

		return $this->load->view('Admin/View_ThemNhaCungCap', $data);
	}

	public function Update($MaNhaCungCap){
		$data['category'] = $this->Model_SanPham->getAllCategory();
		$data['detail'] = $this->Model_NhaCungCap->getById($MaNhaCungCap);
		if(count($this->Model_NhaCungCap->getById($MaNhaCungCap)) == 0){
			return redirect(base_url('admin/nha-cung-cap/'));
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tennhacungcap = $this->input->post('tennhacungcap');
			$machuyenmuc = $this->input->post('chuyenmuc');
			$mota = $this->input->post('mota');
			$trangthai = $this->input->post('trangthai');

			if(empty($tennhacungcap) || empty($machuyenmuc) || empty($mota) || empty($trangthai)){
				$data['error'] = "Vui lòng nhập đủ thông tin nhà cung cấp!";
				return $this->load->view('Admin/View_SuaNhaCungCap', $data);
			}


			$regex = '/^.{1,255}$/u';
			if (!preg_match($regex, $tennhacungcap)) {
				$data['error'] = "Tên nhà cung câp phải là hợp lệ và dưới 255 ký tự!";
				return $this->load->view('Admin/View_SuaNhaCungCap', $data);
			}

			$this->Model_NhaCungCap->update($tennhacungcap,$mota,$machuyenmuc,$trangthai,$MaNhaCungCap);

			$data['detail'] = $this->Model_NhaCungCap->getById($MaNhaCungCap);
			$data['success'] = "Cập nhật nhà cung cấp thành công!";
			return $this->load->view('Admin/View_SuaNhaCungCap', $data);
		}
		return $this->load->view('Admin/View_SuaNhaCungCap', $data);
	}

	public function remove($MaNhaCungCap){
		$this->Model_NhaCungCap->remove($MaNhaCungCap);
		return redirect(base_url('admin/nha-cung-cap/'));
	}

	public function trash(){
		$data['list'] = $this->Model_NhaCungCap->getAll();
		return $this->load->view('Admin/View_ThungRacNhaCungCap', $data);
	}

	public function reset($MaNhaCungCap){
		$this->Model_NhaCungCap->reset($MaNhaCungCap);
		return redirect(base_url('admin/nha-cung-cap/thung-rac/'));
	}

	public function resetAll(){
		$this->Model_NhaCungCap->resetAll();
		return redirect(base_url('admin/nha-cung-cap/thung-rac/'));
	}

	public function delete($MaNhaCungCap){
		$this->Model_NhaCungCap->delete($MaNhaCungCap);
		return redirect(base_url('admin/nha-cung-cap/thung-rac/'));
	}

	public function deleteAll(){
		$this->Model_NhaCungCap->deleteAll();
		return redirect(base_url('admin/nha-cung-cap/thung-rac/'));
	}

	public function history($MaNhaCungCap){
		if(count($this->Model_NhaCungCap->getById($MaNhaCungCap)) == 0){
			return redirect(base_url('admin/nha-cung-cap/'));
		}

		$data['detail'] = $this->Model_NhaCungCap->getHistoryById($MaNhaCungCap);
		return $this->load->view('Admin/View_LichSuNhaCungCap', $data);
	}
}

/* End of file NhaCungCap.php */
/* Location: ./application/controllers/NhaCungCap.php */