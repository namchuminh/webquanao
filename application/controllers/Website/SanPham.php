<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$project_path = realpath(APPPATH . '../');

require_once $project_path . '/vendor/autoload.php';

use Phpml\Association\Apriori;

class SanPham extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Website/Model_SanPham');
		$this->load->model('Model_TrangChu');
		$this->load->model('Website/Model_KhachHang');
		$data = array();
	}

	public function index()
	{
		$totalRecords = $this->Model_SanPham->checkNumber();
		$recordsPerPage = 12;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['popular'] = $this->Model_TrangChu->getPopular();
		$data['category'] = $this->Model_SanPham->getCategory();
		$data['totalPages'] = $totalPages;
		$data['list'] = $this->Model_SanPham->getAll();
		$data['title'] = "Tất Cả Sản Phẩm Trong Cửa Hàng";
		return $this->load->view('Website/View_SanPham', $data);
	}

	public function suggestProduct($product_id){
		$this->db->order_by('MaLichSuXem', 'desc');
		$this->db->limit(50); 
		$history = $this->db->get('lichsuxem')->result_array();

		// Tạo một mảng dữ liệu để áp dụng thuật toán Apriori
        $dataset = [];
        foreach ($history as $row) {
            $dataset[$row['MaKhachHang']][] = $row['MaSanPham'];
        }

        // Áp dụng thuật toán Apriori để tạo ra các gợi ý sản phẩm
        $apriori = new Apriori($support = 0.1);
        $apriori->train($dataset, []);


        // Lấy ra các gợi ý sản phẩm dựa trên quy tắc kết hợp
        $newTransaction = [$product_id];
        $associationRules = $apriori->getRules();
        $recommendations = [];
        foreach ($associationRules as $rule) {
		    if (array_diff($rule["antecedent"], $newTransaction) === []) {
		        $recommendations[] = $rule["consequent"];
		    }
		}

		$max_length = 0;
		$result = [];

		foreach ($recommendations as $recommendation) {
		    if (count($recommendation) > $max_length) {
		        $max_length = count($recommendation);
		        $result = $recommendation;
		    }
		}

		return $result;
	}

	public function Detail($DuongDan){

		if(count($this->Model_SanPham->getBySlug($DuongDan)) == 0){
			return redirect(base_url('san-pham'));
		}

		$machuyenmuc = $this->Model_SanPham->getBySlug($DuongDan)[0]['MaChuyenMuc'];
		$masanpham = $this->Model_SanPham->getBySlug($DuongDan)[0]['MaSanPham'];
		$makhachhang = $this->session->userdata('session_id');

		$this->session->set_userdata('masanpham',$masanpham);

		if($this->session->has_userdata('khachhang')){
			$makhachhang = $this->session->userdata('MaKhachHang');
		}

		if($this->Model_KhachHang->countViewHistory($makhachhang) <= 5){
			$this->Model_KhachHang->insertViewHistory($masanpham,$makhachhang);
		}

		$suggestProduct = [];
		if(count($this->suggestProduct($masanpham)) >= 3){
			$arr_masanpham = implode(',', $this->suggestProduct($masanpham));
			$suggestProduct = $this->Model_SanPham->getSuggestProduct($arr_masanpham);
		}

		$data['related'] = $this->Model_SanPham->getRelated($machuyenmuc);
		$data['detail'] = $this->Model_SanPham->getBySlug($DuongDan);
		$data['popular'] = $this->Model_TrangChu->getPopular();
		$data['category'] = $this->Model_SanPham->getCategory();
		$data['list'] = $this->Model_SanPham->getAll();
		$data['title'] = $this->Model_SanPham->getBySlug($DuongDan)[0]['TenSanPham'];
		$data['color'] = $this->Model_SanPham->getColor($masanpham);
		$data['suggestProduct'] = $suggestProduct;
		return $this->load->view('Website/View_ChiTietSanPham', $data);
	}

	public function getNumberSizeByColor(){
		$MaSanPham = $this->input->post('masanpham');
		$MaMauSac = $this->Model_SanPham->getIdColor($MaSanPham,$this->input->post('tenmausac'))[0]["MaMauSac"];
		$KichThuoc = $this->Model_SanPham->getNumberSize($MaSanPham,$MaMauSac);

		echo json_encode($KichThuoc);
	}

	public function Page($trang){
		$totalRecords = $this->Model_SanPham->checkNumber();
		$recordsPerPage = 12;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('san-pham/trang/1/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('san-pham/trang/'.$totalPages.'/'));
		}

		$start = ($trang - 1) * $recordsPerPage;

		$data['popular'] = $this->Model_TrangChu->getPopular();
		$data['category'] = $this->Model_SanPham->getCategory();
		$data['title'] = "Tất Cả Sản Phẩm Trong Cửa Hàng";

		if($start == 0){
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAll();
			return $this->load->view('Website/View_SanPham', $data);
		}else{
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAll($start);
			return $this->load->view('Website/View_SanPham', $data);
		}
	}

	public function Color($mau){
		$mauSacMap = [
	        "xanh" => "blue",
	        "do" => "red",
	        "vang" => "yellow",
	        "trang" => "white",
	        "den" => "black",
	        "hong" => "pink"
	    ];

	    if (array_key_exists($mau, $mauSacMap)) {
	        $mauSacCSDL = $mauSacMap[$mau];

	        $totalRecords = $this->Model_SanPham->checkNumberColor($mauSacCSDL);
			$recordsPerPage = 12;
			$totalPages = ceil($totalRecords / $recordsPerPage); 


			$data['popular'] = $this->Model_TrangChu->getPopular();
			$data['category'] = $this->Model_SanPham->getCategory();
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAllColor($mauSacCSDL);
			$data['title'] = "Tất Cả Sản Phẩm Trong Cửa Hàng";
			$data['mau'] = $mau;
			return $this->load->view('Website/View_MauSanPham', $data);
	        
	    } else {
	        return redirect(base_url('san-pham/'));
	    }
	}

	public function PageColor($mau,$trang){
		$mauSacMap = [
	        "xanh" => "blue",
	        "do" => "red",
	        "vang" => "yellow",
	        "trang" => "white",
	        "den" => "black",
	        "hong" => "pink"
	    ];

	    if (array_key_exists($mau, $mauSacMap)) {
	        $mauSacCSDL = $mauSacMap[$mau];

	        $totalRecords = $this->Model_SanPham->checkNumberColor($mauSacCSDL);
			$recordsPerPage = 12;
			$totalPages = ceil($totalRecords / $recordsPerPage); 

			if($trang < 1){
				return redirect(base_url('san-pham/mau/'.$mau.'/trang/1/'));
			}

			if($trang > $totalPages){
				return redirect(base_url('san-pham/mau/'.$mau.'/trang/'.$totalPages.'/'));
			}

			$start = ($trang - 1) * $recordsPerPage;

			if($start == 0){
				$data['popular'] = $this->Model_TrangChu->getPopular();
				$data['category'] = $this->Model_SanPham->getCategory();
				$data['totalPages'] = $totalPages;
				$data['list'] = $this->Model_SanPham->getAllColor($mauSacCSDL);
				$data['title'] = "Tìm Sản Phẩm Theo Màu Sắc!";
				$data['mau'] = $mau;
				return $this->load->view('Website/View_MauSanPham', $data);
			}else{
				$data['popular'] = $this->Model_TrangChu->getPopular();
				$data['category'] = $this->Model_SanPham->getCategory();
				$data['totalPages'] = $totalPages;
				$data['list'] = $this->Model_SanPham->getAllColor($mauSacCSDL,$start);
				$data['title'] = "Tìm Sản Phẩm Theo Màu Sắc!";
				$data['mau'] = $mau;
				return $this->load->view('Website/View_MauSanPham', $data);
			}
	        
	    } else {
	        return redirect(base_url('san-pham/'));
	    }
	}

	public function Search(){
		$tensanpham = $this->input->get('s');

		if(!isset($tensanpham) || empty($tensanpham)){
			return redirect(base_url('san-pham/'));
		}

		$totalRecords = $this->Model_SanPham->checkNumberSearch($tensanpham);
		$recordsPerPage = 12;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		$data['popular'] = $this->Model_TrangChu->getPopular();
		$data['category'] = $this->Model_SanPham->getCategory();
		$data['list'] = $this->Model_SanPham->getAllSearch($tensanpham);
		$data['totalPages'] = $totalPages;
		$data['title'] = "Tìm Kiếm: ".$tensanpham;
		$data['search'] = $tensanpham;
		return $this->load->view('Website/View_TimKiemSanPham', $data);
	}

	public function PageSearch($trang){

		$tensanpham = $this->input->get('s');

		if(!isset($tensanpham) || empty($tensanpham)){
			return redirect(base_url('san-pham/'));
		}

		$totalRecords = $this->Model_SanPham->checkNumberSearch($tensanpham);
		$recordsPerPage = 12;
		$totalPages = ceil($totalRecords / $recordsPerPage); 

		if($trang < 1){
			return redirect(base_url('tim-kiem/trang/1/'));
		}

		if($trang > $totalPages){
			return redirect(base_url('tim-kiem/trang/'.$totalPages.'/'));
		}

		$start = ($trang - 1) * $recordsPerPage;

		if($start == 0){
			$data['popular'] = $this->Model_TrangChu->getPopular();
			$data['category'] = $this->Model_SanPham->getCategory();
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAllSearch($tensanpham);
			$data['title'] = "Tìm Kiếm: ".$tensanpham;
			$data['search'] = $tensanpham;
			return $this->load->view('Website/View_TimKiemSanPham', $data);
		}else{
			$data['popular'] = $this->Model_TrangChu->getPopular();
			$data['category'] = $this->Model_SanPham->getCategory();
			$data['totalPages'] = $totalPages;
			$data['list'] = $this->Model_SanPham->getAllSearch($tensanpham,$start);
			$data['title'] = "Tìm Kiếm: ".$tensanpham;
			$data['search'] = $tensanpham;
			return $this->load->view('Website/View_TimKiemSanPham', $data);
		}

	}

	
}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */