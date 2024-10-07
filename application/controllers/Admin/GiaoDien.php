<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GiaoDien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_SanPham');
		$this->load->model('Admin/Model_GiaoDien');
	}

	public function index()
	{
		$data['list'] = $this->Model_GiaoDien->getAll();
		return $this->load->view('Admin/View_GiaoDien', $data);
	}

	public function Add(){
		$data['category'] = $this->Model_SanPham->getAllCategory();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$chuyenmuc = $this->input->post('chuyenmuc');
			$theloai = $this->input->post('theloai');
			$hinhanh = "";

			if(empty($theloai)){
				$data['error'] = "Vui lòng chọn thể loại của giao diện!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}

			//Update image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$image = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$image['file_name'];
			}else{
				$data['error'] = "Vui lòng chọn hình ảnh của giao diện!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}


			if(($this->Model_GiaoDien->checkNumber($theloai) >=3) && ($theloai == 2)){
				$data['error'] = "Giao diện chỉ được phép có 3 hình ảnh Banner 1!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}

			if(($this->Model_GiaoDien->checkNumber($theloai) >=3) && ($theloai == 3)){
				$data['error'] = "Giao diện chỉ được phép có 3 hình ảnh Banner 2!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}

			if(empty($chuyenmuc) == 1){
				$this->Model_GiaoDien->addNoCategory($theloai,$hinhanh);
				$data['success'] = "Thêm giao diện thành công!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}else{
				$this->Model_GiaoDien->add($chuyenmuc,$theloai,$hinhanh);
				$data['success'] = "Thêm giao diện thành công!";
				return $this->load->view('Admin/View_ThemGiaoDien', $data);
			}
		}

		return $this->load->view('Admin/View_ThemGiaoDien', $data);
	}

	public function Update($MaGiaoDien){
		if(count($this->Model_GiaoDien->getById($MaGiaoDien)) == 0){
			return redirect(base_url('admin/giao-dien/'));
		}

		$data['detail'] = $this->Model_GiaoDien->getById($MaGiaoDien);
		$data['category'] = $this->Model_SanPham->getAllCategory();

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$chuyenmuc = $this->input->post('chuyenmuc');
			$theloai = $this->input->post('theloai');

			//Update image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('hinhanh')){
				$image = $this->upload->data();
				$hinhanh = base_url('uploads')."/".$image['file_name'];
				$this->Model_GiaoDien->updateImage($MaGiaoDien, $hinhanh);
			}

			if(!empty($chuyenmuc)){
				$this->Model_GiaoDien->update($chuyenmuc, $MaGiaoDien);
				$data['detail'] = $this->Model_GiaoDien->getById($MaGiaoDien);
				$data['success'] = "Cập nhật giao diện thành công!";
				return $this->load->view('Admin/View_SuaGiaoDien', $data);
			}else{
				$this->Model_GiaoDien->updateNoCategory($MaGiaoDien);
				$data['detail'] = $this->Model_GiaoDien->getById($MaGiaoDien);
				$data['success'] = "Cập nhật giao diện thành công!";
				return $this->load->view('Admin/View_SuaGiaoDien', $data);
			}

			
		}
		return $this->load->view('Admin/View_SuaGiaoDien', $data);
	}

	public function delete($MaGiaoDien){
		$this->Model_GiaoDien->delete($MaGiaoDien);
		return redirect(base_url('admin/giao-dien/'));
	}

}

/* End of file GiaoDien.php */
/* Location: ./application/controllers/GiaoDien.php */