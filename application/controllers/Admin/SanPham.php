<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SanPham extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
		$data = array();
		$this->load->model('Admin/Model_SanPham');
		$this->load->model('Admin/Model_NhaCungCap');
	}

	public function index()
	{
		$totalRecords = $this->Model_SanPham->checkNumberProduct();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_SanPham->getAllProduct();
		return $this->load->view('Admin/View_SanPham', $data);
	}

	public function Page($trang){

		$totalRecords = $this->Model_SanPham->checkNumberProduct();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/san-pham/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/san-pham/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAllProduct();
			return $this->load->view('Admin/View_SanPham', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAllProduct($start);
			return $this->load->view('Admin/View_SanPham', $data);
		}
	}

	public function Add(){

		$data['category'] = $this->Model_SanPham->getAllCategory();
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tensanpham = $this->input->post('tensanpham');
			$motangan = $this->input->post('motangan');
			$motadai = $this->input->post('motadai');
			$giagoc = $this->input->post('giagoc');
			$giaban = $this->input->post('giaban');
			$chuyenmuc = $this->input->post('chuyenmuc');
			$the = $this->input->post('the');
			$duongdan = $this->input->post('duongdan');
			$mausac = $this->input->post('colors');
			$loaisanpham = $this->input->post('loaisanpham');
			$anhchinh = "";
			$anhphu1 = "";
			$anhphu2 = "";
			$anhphu3 = "";

			if(empty($tensanpham) || empty($motangan) || empty($motadai) || empty($giagoc) || empty($giaban) || empty($chuyenmuc) || empty($duongdan) || empty($the) || empty($loaisanpham)){
				$data['error'] = "Vui lòng nhập đủ thông tin sản phẩm!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			if (!preg_match("/^[-+]?\d+$/", $giagoc)) {
				$data['error'] = "Vui lòng nhập giá gốc hợp lệ!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			if (!preg_match("/^[-+]?\d+$/", $giaban)) {
				$data['error'] = "Vui lòng nhập giá bán hợp lệ!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			if (empty($mausac)) {
				$data['error'] = "Vui lòng chọn màu cho sản phẩm!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			if (empty($_FILES['anhchinh']['name']) || empty($_FILES['anhphu1']['name']) || empty($_FILES['anhphu2']['name']) || empty($_FILES['anhphu3']['name'])) {
				$data['error'] = "Vui lòng nhập đủ ảnh sản phẩm!";
				return $this->load->view('Admin/View_ThemSanPham', $data);
			}

			//Add product
			$masanpham = $this->Model_SanPham->addProduct($tensanpham,$motangan,$motadai,$giagoc,$giaban,$chuyenmuc,$the, $duongdan, $loaisanpham);

			//Add image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$imageChinh = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$imageChinh['file_name'];
				$this->Model_SanPham->addImage($anhchinh, 1, $masanpham);
			}

			if ($this->upload->do_upload('anhphu1')){
				$imagePhu1 = $this->upload->data();
				$anhphu1 = base_url('uploads')."/".$imagePhu1['file_name'];
				$this->Model_SanPham->addImage($anhphu1, 2, $masanpham);
			}

			if ($this->upload->do_upload('anhphu2')){
				$imagePhu2 = $this->upload->data();
				$anhphu2 = base_url('uploads')."/".$imagePhu2['file_name'];
				$this->Model_SanPham->addImage($anhphu2, 3, $masanpham);
			}

			if ($this->upload->do_upload('anhphu3')){
				$imagePhu3 = $this->upload->data();
				$anhphu3 = base_url('uploads')."/".$imagePhu3['file_name'];
				$this->Model_SanPham->addImage($anhphu3, 4, $masanpham);
			}

			//Add color
			for($i = 0; $i < count($mausac); $i++){
				$this->Model_SanPham->addColor($masanpham, $mausac[$i], $mausac[$i]);
			}

			$data['success'] = "Thêm sản phẩm thành công!";
			return $this->load->view('Admin/View_ThemSanPham', $data);
		}
		return $this->load->view('Admin/View_ThemSanPham', $data);
	}

	public function getNumberProduct(){
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$mausac = $this->input->post('mausac');
			$kichthuoc = $this->input->post('kichthuoc');
			$soluong = 0;
			if(count($this->Model_SanPham->getNumberByColorSize($mausac,$kichthuoc)) > 0){
				$soluong = $this->Model_SanPham->getNumberByColorSize($mausac,$kichthuoc)[0]['SoLuong'];
			}

			echo $soluong;	
		}
	}

	public function Number($MaSanPham){
		if(count($this->Model_SanPham->getProductById($MaSanPham)) == 0){
			return redirect(base_url('admin/san-pham/'));
		}
		$data['category'] = $this->Model_SanPham->getAllCategory();
		$data['detail'] = $this->Model_SanPham->getProductById($MaSanPham);
		$data['color'] = $this->Model_SanPham->getColorById($MaSanPham);

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$mausac = $this->input->post('mausac');
			$kichthuoc = $this->input->post('kichthuoc');
			$soluong = $this->input->post('soluong');

			if(empty($mausac) || empty($kichthuoc) || empty($soluong)){
				$data['error'] = "Vui lòng chọn đủ thông tin sản phẩm!";
				return $this->load->view('Admin/View_SoLuongSanPham', $data);
			}

			if(count($this->Model_SanPham->getNumberByColorSize($mausac,$kichthuoc)) <= 0){
				$this->Model_SanPham->insertNumberByColorSize($mausac,$kichthuoc,$soluong,$MaSanPham);
			}else{
				$this->Model_SanPham->updateNumberByColorSize($mausac,$kichthuoc,$soluong,$MaSanPham);
			}

			$data['success'] = "Cập nhật số lượng sản phẩm thành công!";
			return $this->load->view('Admin/View_SoLuongSanPham', $data);
		}

		return $this->load->view('Admin/View_SoLuongSanPham', $data);
	}

	public function Update($MaSanPham){

		if(count($this->Model_SanPham->getProductById($MaSanPham)) == 0){
			return redirect(base_url('admin/san-pham/'));
		}

		$data['category'] = $this->Model_SanPham->getAllCategory();
		$data['detail'] = $this->Model_SanPham->getProductById($MaSanPham);
		$data['color'] = $this->Model_SanPham->getColorById($MaSanPham);
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$tensanpham = $this->input->post('tensanpham');
			$motangan = $this->input->post('motangan');
			$motadai = $this->input->post('motadai');
			$giagoc = $this->input->post('giagoc');
			$giaban = $this->input->post('giaban');
			$chuyenmuc = $this->input->post('chuyenmuc');
			$the = $this->input->post('the');
			$duongdan = $this->input->post('duongdan');
			$loaisanpham = $this->input->post('loaisanpham');
			$mausac = $this->input->post('colors');
			$anhchinh = "";
			$anhphu1 = "";
			$anhphu2 = "";
			$anhphu3 = "";

			if(empty($tensanpham) || empty($motangan) || empty($motadai) || empty($giagoc) || empty($giaban) || empty($chuyenmuc) || empty($duongdan) || empty($the) || empty($loaisanpham)){
				$data['error'] = "Vui lòng nhập đủ thông tin sản phẩm!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}

			if (!preg_match("/^[-+]?\d+$/", $giagoc)) {
				$data['error'] = "Vui lòng nhập giá gốc hợp lệ!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}

			if (!preg_match("/^[-+]?\d+$/", $giaban)) {
				$data['error'] = "Vui lòng nhập giá bán hợp lệ!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}

			$this->Model_SanPham->updateProduct($tensanpham,$motangan,$motadai,$giagoc,$giaban,$chuyenmuc,$the, $duongdan, $loaisanpham, $MaSanPham);

			//Update image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('anhchinh')){
				$imageChinh = $this->upload->data();
				$anhchinh = base_url('uploads')."/".$imageChinh['file_name'];
				$this->Model_SanPham->updateImage($MaSanPham, $anhchinh, 1);
			}

			if ($this->upload->do_upload('anhphu1')){
				$imagePhu1 = $this->upload->data();
				$anhphu1 = base_url('uploads')."/".$imagePhu1['file_name'];
				$this->Model_SanPham->updateImage($MaSanPham, $anhphu1, 2);
			}

			if ($this->upload->do_upload('anhphu2')){
				$imagePhu2 = $this->upload->data();
				$anhphu2 = base_url('uploads')."/".$imagePhu2['file_name'];
				$this->Model_SanPham->updateImage($MaSanPham, $anhphu2, 3);
			}

			if ($this->upload->do_upload('anhphu3')){
				$imagePhu3 = $this->upload->data();
				$anhphu3 = base_url('uploads')."/".$imagePhu3['file_name'];
				$this->Model_SanPham->updateImage($MaSanPham, $anhphu3, 4);
			}

			if(empty($mausac)){
				$data['error'] = "Vui lòng chọn 1 màu sắc cho sản phẩm!";
				return $this->load->view('Admin/View_SuaSanPham', $data);
			}else{
				$this->Model_SanPham->deleteColor($MaSanPham);
				for($i = 0; $i < count($mausac); $i++){
					$this->Model_SanPham->addColor($MaSanPham, $mausac[$i], $mausac[$i]);
				}
			}
			
			$data['detail'] = $this->Model_SanPham->getProductById($MaSanPham);
			$data['color'] = $this->Model_SanPham->getColorById($MaSanPham);
			$data['success'] = "Cập nhật sản phẩm thành công!";
			return $this->load->view('Admin/View_SuaSanPham', $data);
		}

		return $this->load->view('Admin/View_SuaSanPham', $data);
		
	}

	public function remove($MaSanPham){
		$this->Model_SanPham->removeProduct($MaSanPham);
		return redirect(base_url('admin/san-pham/'));
	}

	public function trash(){
		$totalRecords = $this->Model_SanPham->checkNumberProductTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_SanPham->getAllProductTrash();
		return $this->load->view('Admin/View_ThungRacSanPham', $data);
	}

	public function delete($MaSanPham){
		$this->Model_SanPham->deleteProduct($MaSanPham);
		$this->Model_SanPham->deleteNumberSizeById($MaSanPham);
		return redirect(base_url('admin/san-pham/thung-rac/'));
	}

	public function deleteAll(){
		if(count($this->Model_SanPham->getAllProductTrashDelete()) >= 1){
			foreach ($this->Model_SanPham->getAllProductTrashDelete() as $key => $value) {
				$this->Model_SanPham->deleteNumberSizeById($value['MaSanPham']);
			}
		}

		$this->Model_SanPham->deleteAllProduct();
		
		return redirect(base_url('admin/san-pham/thung-rac/'));
	}

	public function reset($MaSanPham){
		$this->Model_SanPham->resetProduct($MaSanPham);
		return redirect(base_url('admin/san-pham/thung-rac/'));
	}

	public function resetAll(){
		$this->Model_SanPham->resetAllProduct();
		return redirect(base_url('admin/san-pham/thung-rac/'));
	}

	public function PageTrash($trang){

		$totalRecords = $this->Model_SanPham->checkNumberProductTrash();
		$recordsPerPage = 10;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('admin/san-pham/thung-rac/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('admin/san-pham/thung-rac/'));
		}

		$start = ($trang - 1) * $recordsPerPage;


		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAllProductTrash();
			return $this->load->view('Admin/View_ThungRacSanPham', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAllProductTrash($start);
			return $this->load->view('Admin/View_ThungRacSanPham', $data);
		}
	}

	public function Import($MaSanPham){
		if(count($this->Model_SanPham->getProductById($MaSanPham)) == 0){
			return redirect(base_url('admin/san-pham/'));
		}

		$data['provide'] = $this->Model_NhaCungCap->getAll();
		$data['detail'] = $this->Model_SanPham->getProductById($MaSanPham);
		$data['color'] = $this->Model_SanPham->getColorById($MaSanPham);
		

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$nhacungcap = $this->input->post('nhacungcap');
			$soluong = $this->input->post('soluong');
			$mausac = $this->input->post('mausac');
			$kichthuoc = $this->input->post('kichthuoc');

			if(empty($soluong) || $soluong == 0){
				$data['error'] = "Vui lòng nhập số lượng sản phẩm!";
				return $this->load->view('Admin/View_NhapSanPham', $data);
			}

			if($soluong < 1){
				$data['error'] = "Số lượng sản phẩm phải lớn hơn hoặc bằng 1!";
				return $this->load->view('Admin/View_NhapSanPham', $data);
			}

			$pattern = '/^-?\d+$/';
			if(!preg_match($pattern, $soluong)){
				$data['error'] = "Số lượng nhập không hợp lệ!";
				return $this->load->view('Admin/View_NhapSanPham', $data);
			}

			if(empty($mausac) || empty($kichthuoc)){
				$data['error'] = "Vui lòng chọn đủ thông tin sản phẩm!";
				return $this->load->view('Admin/View_NhapSanPham', $data);
			}

			$soluongcu = count($this->Model_SanPham->getOldNumber($mausac,$kichthuoc)) == 0 ? 0 : $this->Model_SanPham->getOldNumber($mausac,$kichthuoc)[0]['SoLuong'];

			$soluongmoi = $soluongcu + $soluong;

			if(empty($nhacungcap) || !$nhacungcap){
				if(count($this->Model_SanPham->getNumberByColorSize($mausac,$kichthuoc)) <= 0){
					$this->Model_SanPham->insertNumberByColorSize($mausac,$kichthuoc,$soluongmoi,$MaSanPham);
				}else{
					$this->Model_SanPham->updateNumberByColorSize($mausac,$kichthuoc,$soluongmoi,$MaSanPham);
				}
				$data['detail'] = $this->Model_SanPham->getProductById($MaSanPham);
				$data['success'] = "Nhập số lượng sản phẩm vào kho thành công!";
				return $this->load->view('Admin/View_NhapSanPham', $data);
			}else{
				if(count($this->Model_SanPham->getNumberByColorSize($mausac,$kichthuoc)) <= 0){
					$this->Model_SanPham->insertNumberByColorSize($mausac,$kichthuoc,$soluongmoi,$MaSanPham);
				}else{
					$this->Model_SanPham->updateNumberByColorSize($mausac,$kichthuoc,$soluongmoi,$MaSanPham);
				}

                $tenmausac = [
                    'blue' => "Xanh",
                    'red' => "Đỏ",
                    'black' => "Đen",
                    'white' => "Trắng",
                    'yellow' => "Vàng",
                    'pink' => "Hồng"
                ];
				$arrmausac = $this->Model_SanPham->getColorById($MaSanPham);
				$key = array_search($mausac, array_column($arrmausac, 'MaMauSac'));
				$key = ($key !== false) ? $arrmausac[$key]['TenMauSac'] : '';

				$soluongcu = $soluongmoi - $soluong;

				$this->Model_SanPham->insertHistoryProvide($nhacungcap,$MaSanPham,$soluong,$soluongcu,$tenmausac[$key],$kichthuoc);
				$data['detail'] = $this->Model_SanPham->getProductById($MaSanPham);
				$data['success'] = "Nhập số lượng sản phẩm vào kho thành công!";
				return $this->load->view('Admin/View_NhapSanPham', $data);
			}
		}

		return $this->load->view('Admin/View_NhapSanPham', $data);
	}
}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */