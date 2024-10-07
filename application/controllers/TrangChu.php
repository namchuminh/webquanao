<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$project_path = realpath(APPPATH . '../');

require_once $project_path . '/vendor/autoload.php';

use Phpml\Association\Apriori;

class TrangChu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_TrangChu');
		$this->load->model('Website/Model_SanPham');
		$data = array();
	}

	public function index()
	{
		$suggestProduct = [];

		if($this->session->has_userdata('masanpham')){
			if(count($this->suggestProduct($this->session->userdata('masanpham'))) >= 4){
				$arr_masanpham = implode(',', $this->suggestProduct($this->session->userdata('masanpham')));
				$suggestProduct = $this->Model_SanPham->getSuggestProduct($arr_masanpham);
			}
		}

		$data['title'] = "Cửa hàng mua sắm trực tuyến uy tín, giá rẻ!";
		$data['slide'] = $this->Model_TrangChu->getSlides();
		$data['banner1'] = $this->Model_TrangChu->getBanner1();
		$data['banner2'] = $this->Model_TrangChu->getBanner2();
		$data['popular'] = $this->Model_TrangChu->getPopular();
		$data['new'] = $this->Model_TrangChu->getNew();
		$data['sale'] = $this->Model_TrangChu->getSale();
		$data['news'] = $this->Model_TrangChu->getNews();
		$data['suggestProduct'] = $suggestProduct;
		return $this->load->view('View_TrangChu', $data);
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
}

/* End of file TrangChu.php */
/* Location: ./application/controllers/TrangChu.php */