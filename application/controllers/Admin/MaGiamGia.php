<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MaGiamGia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_MaGiamGia');
	}

	public function index()
	{
		$data['list'] = $this->Model_MaGiamGia->getAll();
		return $this->load->view('Admin/View_MaGiamGia', $data);
	}

	public function Add()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {

			$masudung = $this->input->post('masudung');
			$trigia = $this->input->post('trigia');
			$soluong = $this->input->post('soluong');
			$ngayhethan = $this->input->post('ngayhethan');

			if(empty($masudung) || empty($trigia) || empty($soluong) || empty($ngayhethan)){
				$data['error'] = "Vui lòng nhập đủ thông tin mã giảm giá!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			if (strpos($masudung, ' ') !== false) {
    			$data['error'] = "Mã sử dụng phải viết liền và không dấu!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
    		}

			$pattern = '/^-?\d+$/';
			if(!preg_match($pattern, $trigia)){
				$data['error'] = "Trị giá của mã giảm giá không hợp lệ!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			if(!preg_match($pattern, $soluong)){
				$data['error'] = "Số lượng sử dụng không hợp lệ!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			$currentTime = strtotime(date("Y-m-d"));
			$inputTime = strtotime($ngayhethan);


			if (($inputTime < $currentTime) == 1) {
				$data['error'] = "Ngày hết hạn phải lớn hơn ngày tạo!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			$msd = strtoupper($masudung);
			
			if($this->Model_MaGiamGia->checkCode($msd) == 1){
				$data['error'] = "Mã giảm giá này đã tồn tại!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			$this->Model_MaGiamGia->add($msd,$ngayhethan,$trigia,$soluong);

			$data['success'] = "Thêm mã giảm giá thành công!";
			return $this->load->view('Admin/View_ThemMaGiamGia', $data);
		}
		return $this->load->view('Admin/View_ThemMaGiamGia');
	}

	public function Update($MaGiamGia){
		if(count($this->Model_MaGiamGia->getById($MaGiamGia)) == 0){
			return redirect(base_url('admin/ma-giam-gia'));
		}

		$data['detail'] = $this->Model_MaGiamGia->getById($MaGiamGia);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$trigia = $this->input->post('trigia');
			$soluong = $this->input->post('soluong');
			$ngayhethan = $this->input->post('ngayhethan');

			if(empty($trigia) || empty($soluong) || empty($ngayhethan)){
				$data['error'] = "Vui lòng nhập đủ thông tin mã giảm giá!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			$pattern = '/^-?\d+$/';
			if(!preg_match($pattern, $trigia)){
				$data['error'] = "Trị giá của mã giảm giá không hợp lệ!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			if(!preg_match($pattern, $soluong)){
				$data['error'] = "Số lượng sử dụng không hợp lệ!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			$currentTime = strtotime(date("Y-m-d"));
			$inputTime = strtotime($ngayhethan);


			if (($inputTime < $currentTime) == 1) {
				$data['error'] = "Ngày hết hạn phải lớn hơn ngày tạo!";
				return $this->load->view('Admin/View_ThemMaGiamGia', $data);
			}

			$this->Model_MaGiamGia->update($ngayhethan,$trigia,$soluong,$MaGiamGia);

			$data['success'] = "Cập nhật mã giảm giá thành công!";
			$data['detail'] = $this->Model_MaGiamGia->getById($MaGiamGia);
			return $this->load->view('Admin/View_SuaMaGiamGia', $data);
		}

		return $this->load->view('Admin/View_SuaMaGiamGia', $data);
	}

	public function remove($MaGiamGia){
		$this->Model_MaGiamGia->remove($MaGiamGia);
		return redirect(base_url('admin/ma-giam-gia/'));
	}

	public function trash(){
		$data['list'] = $this->Model_MaGiamGia->getAll();
		return $this->load->view('Admin/View_ThungRacMaGiamGia', $data);
	}

	public function reset($MaGiamGia){
		$this->Model_MaGiamGia->reset($MaGiamGia);
		return redirect(base_url('admin/ma-giam-gia/thung-rac/'));
	}

	public function resetAll(){
		$this->Model_MaGiamGia->resetAll();
		return redirect(base_url('admin/ma-giam-gia/thung-rac/'));
	}

	public function delete($MaGiamGia){
		$this->Model_MaGiamGia->delete($MaGiamGia);
		return redirect(base_url('admin/ma-giam-gia/thung-rac/'));
	}

	public function deleteAll(){
		$this->Model_MaGiamGia->deleteAll();
		return redirect(base_url('admin/ma-giam-gia/thung-rac/'));
	}

}

/* End of file MaGiamGia.php */
/* Location: ./application/controllers/MaGiamGia.php */