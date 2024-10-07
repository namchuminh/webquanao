<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('Website/Model_Website');
        $this->data['config'] = $this->Model_Website->getAllConfig();
        $this->load->vars($this->data);

        //Logout customer is deactive
        if($this->session->has_userdata('khachhang')){
            if($this->Model_Website->checkActiveCustomer($this->session->userdata('khachhang')) >= 1){
                $this->session->unset_userdata('khachhang');
                $this->session->unset_userdata('login');
                $this->session->unset_userdata('TenKhachHang');
                $this->session->unset_userdata('SoDienThoai');
                $this->session->unset_userdata('Email');
                $this->session->unset_userdata('MaKhachHang');
                $this->session->unset_userdata('DiaChi');
                $this->session->unset_userdata('NgayThamGia');
            }
        }

        if(!$this->session->has_userdata('session_id')){
            $session_id = $this->random_string(32);
            $this->session->set_userdata('session_id', $session_id);
        }

    }

    private function random_string($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';
        $character_count = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, $character_count - 1)];
        }

        return $random_string;
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */