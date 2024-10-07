<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_TrangChu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getSlides(){
		$sql = "SELECT giaodien.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc, chuyenmuc.DuongDan FROM `giaodien` LEFT JOIN `chuyenmuc` ON giaodien.MaChuyenMuc = chuyenmuc.MaChuyenMuc WHERE giaodien.TheLoai = 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getBanner1(){
		$sql = "SELECT giaodien.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc, chuyenmuc.DuongDan FROM `giaodien` LEFT JOIN `chuyenmuc` ON giaodien.MaChuyenMuc = chuyenmuc.MaChuyenMuc WHERE giaodien.TheLoai = 2";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getBanner2(){
		$sql = "SELECT giaodien.*, chuyenmuc.TenChuyenMuc, chuyenmuc.MaChuyenMuc, chuyenmuc.DuongDan FROM `giaodien` LEFT JOIN `chuyenmuc` ON giaodien.MaChuyenMuc = chuyenmuc.MaChuyenMuc WHERE giaodien.TheLoai = 3";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getPopular(){
		$sql = "SELECT sanpham.*, hinhanh.LoaiAnh, hinhanh.MaSanPham, hinhanh.DuongDan AS duongdananh FROM sanpham,hinhanh WHERE hinhanh.MaSanPham = sanpham.MaSanPham AND LoaiSanPham = 1 AND hinhanh.LoaiAnh = 1 AND sanpham.TrangThai != 0 ORDER BY sanpham.MaSanPham DESC LIMIT 8;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getNew(){
		$sql = "SELECT sanpham.*, hinhanh.LoaiAnh, hinhanh.MaSanPham, hinhanh.DuongDan AS duongdananh FROM sanpham,hinhanh WHERE hinhanh.MaSanPham = sanpham.MaSanPham AND LoaiSanPham = 3 AND hinhanh.LoaiAnh = 1 AND sanpham.TrangThai != 0 ORDER BY sanpham.MaSanPham DESC LIMIT 8;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getSale(){
		$sql = "SELECT sanpham.*, hinhanh.LoaiAnh, hinhanh.MaSanPham, hinhanh.DuongDan AS duongdananh FROM sanpham,hinhanh WHERE hinhanh.MaSanPham = sanpham.MaSanPham AND LoaiSanPham = 2 AND hinhanh.LoaiAnh = 1 AND sanpham.TrangThai != 0 ORDER BY sanpham.MaSanPham DESC LIMIT 8;";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getNews(){
		$sql = "SELECT tintuc.*, nhanvien.TenNhanVien, nhanvien.MaNhanVien, nhanvien.AnhChinh AS anhnhanvien FROM tintuc,nhanvien WHERE tintuc.MaNhanVien = nhanvien.MaNhanVien AND tintuc.TrangThai != 0 ORDER BY tintuc.MaTinTuc DESC LIMIT 4";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

}

/* End of file Model_TrangChu.php */
/* Location: ./application/models/Model_TrangChu.php */