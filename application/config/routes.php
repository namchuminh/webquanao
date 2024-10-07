<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'TrangChu';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Route customer
$route['khach-hang'] = 'Website/KhachHang/index';
$route['khach-hang/don-hang/(:any)'] = 'Website/KhachHang/Detail/$1';
$route['khach-hang/don-hang/huy-don/(:any)'] = 'Website/KhachHang/removeOrder/$1';
$route['khach-hang/cap-nhat'] = 'Website/KhachHang/Update';


//Route pay order
$route['thanh-toan'] = 'Website/ThanhToan/index';
$route['thanh-toan/thuc-hien'] = 'Website/ThanhToan/PayOrder';
$route['thanh-toan/ngan-hang'] = 'Website/ThanhToan/bankVnpay';
$route['thanh-toan-vnpay'] = 'Website/ThanhToan/resultBank';

//Route cart 
$route['gio-hang'] = 'Website/GioHang/index';
$route['gio-hang/them/(:any)/(:any)'] = 'Website/GioHang/Add/$1/$2';
$route['gio-hang/them-chi-tiet/(:any)/(:any)/(:any)/(:any)'] = 'Website/GioHang/AddDetail/$1/$2/$3/$4';
$route['gio-hang/xoa/(:any)'] = 'Website/GioHang/DeleteById/$1';
$route['gio-hang/sua-mau/(:any)/(:any)'] = 'Website/GioHang/UpdateColor/$1/$2';
$route['gio-hang/sua-so-luong/(:any)/(:any)'] = 'Website/GioHang/UpdateNumber/$1/$2';
$route['gio-hang/sua-kich-thuoc/(:any)/(:any)/(:any)'] = 'Website/GioHang/UpdateSize/$1/$2/$3';
$route['gio-hang/ma-giam-gia/(:any)'] = 'Website/GioHang/Code/$1';
$route['gio-hang/thanh-toan'] = 'Website/GioHang/checkCart';


//Route product
$route['san-pham'] = 'Website/SanPham/index';
$route['san-pham/trang/(:any)'] = 'Website/SanPham/Page/$1';
$route['san-pham/mau/(:any)'] = 'Website/SanPham/Color/$1';
$route['san-pham/mau/(:any)/trang/(:any)'] = 'Website/SanPham/PageColor/$1/$2';
$route['san-pham/(:any)'] = 'Website/SanPham/Detail/$1';
$route['tim-kiem'] = 'Website/SanPham/Search';
$route['tim-kiem/trang/(:any)'] = 'Website/SanPham/PageSearch/$1';
$route['lay-so-luong'] = 'Website/SanPham/getNumberSizeByColor';

//Route news
$route['tin-tuc'] = 'Website/TinTuc/index';
$route['tin-tuc/trang/(:any)'] = 'Website/TinTuc/Page/$1';
$route['tin-tuc/(:any)'] = 'Website/TinTuc/Detail/$1';

//Route contact
$route['lien-he'] = 'Website/LienHe/index';

//Route login
$route['dang-nhap'] = 'Website/DangNhap/Login';
$route['dang-xuat'] = 'Website/DangXuat';
$route['dang-ky'] = 'Website/DangNhap/Register';

$route['chuyen-muc'] = 'Website/ChuyenMuc/index';
$route['chuyen-muc/trang/(:any)'] = 'Website/ChuyenMuc/Page/$1';
$route['chuyen-muc/(:any)'] = 'Website/ChuyenMuc/Detail/$1';
$route['chuyen-muc/(:any)/trang/(:any)'] = 'Website/ChuyenMuc/PageDetail/$1/$2';

$route['admin'] = 'Admin/TrangChu';
$route['admin/thong-ke-chuyen-muc'] = 'Admin/TrangChu/categoryPopular';
$route['admin/thong-ke-doanh-thu'] = 'Admin/TrangChu/sumRevenue';
$route['admin/dang-nhap'] = 'Admin/DangNhap';
$route['admin/dang-xuat'] = 'Admin/DangXuat';
$route['admin/ca-nhan'] = 'Admin/CaNhan';

//Route admin product
$route['admin/san-pham'] = 'Admin/SanPham';
$route['admin/san-pham/trang/(:any)'] = 'Admin/SanPham/Page/$1';
$route['admin/san-pham/sua/(:any)'] = 'Admin/SanPham/Update/$1';
$route['admin/san-pham/them'] = 'Admin/SanPham/Add';
$route['admin/san-pham/them-thung-rac/(:any)'] = 'Admin/SanPham/remove/$1';
$route['admin/san-pham/thung-rac'] = 'Admin/SanPham/trash';
$route['admin/san-pham/thung-rac/xoa/(:any)'] = 'Admin/SanPham/delete/$1';
$route['admin/san-pham/thung-rac/xoa'] = 'Admin/SanPham/deleteAll';
$route['admin/san-pham/thung-rac/khoi-phuc'] = 'Admin/SanPham/resetAll';
$route['admin/san-pham/thung-rac/khoi-phuc/(:any)'] = 'Admin/SanPham/reset/$1';
$route['admin/san-pham/thung-rac/trang/(:any)'] = 'Admin/SanPham/PageTrash/$1';
$route['admin/san-pham/nhap/(:any)'] = 'Admin/SanPham/Import/$1';
$route['admin/san-pham/so-luong/(:any)'] = 'Admin/SanPham/Number/$1';
$route['admin/san-pham/lay-so-luong'] = 'Admin/SanPham/getNumberProduct';


//Route admin news
$route['admin/tin-tuc/them'] = 'Admin/TinTuc/Add';
$route['admin/tin-tuc'] = 'Admin/TinTuc/index';
$route['admin/tin-tuc/trang/(:any)'] = 'Admin/TinTuc/Page/$1';
$route['admin/tin-tuc/sua/(:any)'] = 'Admin/TinTuc/Update/$1';
$route['admin/tin-tuc/them-thung-rac/(:any)'] = 'Admin/TinTuc/remove/$1';
$route['admin/tin-tuc/thung-rac'] = 'Admin/TinTuc/trash';
$route['admin/tin-tuc/thung-rac/trang/(:any)'] = 'Admin/TinTuc/PageTrash/$1';
$route['admin/tin-tuc/thung-rac/khoi-phuc/(:any)'] = 'Admin/TinTuc/reset/$1';
$route['admin/tin-tuc/thung-rac/khoi-phuc'] = 'Admin/TinTuc/resetAll';
$route['admin/tin-tuc/thung-rac/xoa/(:any)'] = 'Admin/TinTuc/delete/$1';
$route['admin/tin-tuc/thung-rac/xoa'] = 'Admin/TinTuc/deleteAll/$1';

//Route admin category
$route['admin/chuyen-muc/them'] = 'Admin/ChuyenMuc/Add';
$route['admin/chuyen-muc'] = 'Admin/ChuyenMuc/index';
$route['admin/chuyen-muc/trang/(:any)'] = 'Admin/ChuyenMuc/Page/$1';
$route['admin/chuyen-muc/sua/(:any)'] = 'Admin/ChuyenMuc/Update/$1';
$route['admin/chuyen-muc/them-thung-rac/(:any)'] = 'Admin/ChuyenMuc/remove/$1';
$route['admin/chuyen-muc/thung-rac'] = 'Admin/ChuyenMuc/trash';
$route['admin/chuyen-muc/thung-rac/trang/(:any)'] = 'Admin/ChuyenMuc/PageTrash/$1';
$route['admin/chuyen-muc/thung-rac/khoi-phuc/(:any)'] = 'Admin/ChuyenMuc/reset/$1';
$route['admin/chuyen-muc/thung-rac/khoi-phuc'] = 'Admin/ChuyenMuc/resetAll';
$route['admin/chuyen-muc/thung-rac/xoa/(:any)'] = 'Admin/ChuyenMuc/delete/$1';
$route['admin/chuyen-muc/thung-rac/xoa'] = 'Admin/ChuyenMuc/deleteAll/$1';

//Route admin category
$route['admin/nha-cung-cap/them'] = 'Admin/NhaCungCap/Add';
$route['admin/nha-cung-cap'] = 'Admin/NhaCungCap/index';
$route['admin/nha-cung-cap/trang/(:any)'] = 'Admin/NhaCungCap/Page/$1';
$route['admin/nha-cung-cap/sua/(:any)'] = 'Admin/NhaCungCap/Update/$1';
$route['admin/nha-cung-cap/them-thung-rac/(:any)'] = 'Admin/NhaCungCap/remove/$1';
$route['admin/nha-cung-cap/thung-rac'] = 'Admin/NhaCungCap/trash';
$route['admin/nha-cung-cap/thung-rac/trang/(:any)'] = 'Admin/NhaCungCap/PageTrash/$1';
$route['admin/nha-cung-cap/thung-rac/khoi-phuc/(:any)'] = 'Admin/NhaCungCap/reset/$1';
$route['admin/nha-cung-cap/thung-rac/khoi-phuc'] = 'Admin/NhaCungCap/resetAll';
$route['admin/nha-cung-cap/thung-rac/xoa/(:any)'] = 'Admin/NhaCungCap/delete/$1';
$route['admin/nha-cung-cap/thung-rac/xoa'] = 'Admin/NhaCungCap/deleteAll/$1';
$route['admin/nha-cung-cap/lich-su/(:any)'] = 'Admin/NhaCungCap/history/$1';

//Route admin sale code
$route['admin/ma-giam-gia/them'] = 'Admin/MaGiamGia/Add';
$route['admin/ma-giam-gia'] = 'Admin/MaGiamGia/index';
$route['admin/ma-giam-gia/trang/(:any)'] = 'Admin/MaGiamGia/Page/$1';
$route['admin/ma-giam-gia/sua/(:any)'] = 'Admin/MaGiamGia/Update/$1';
$route['admin/ma-giam-gia/them-thung-rac/(:any)'] = 'Admin/MaGiamGia/remove/$1';
$route['admin/ma-giam-gia/thung-rac'] = 'Admin/MaGiamGia/trash';
$route['admin/ma-giam-gia/thung-rac/trang/(:any)'] = 'Admin/MaGiamGia/PageTrash/$1';
$route['admin/ma-giam-gia/thung-rac/khoi-phuc/(:any)'] = 'Admin/MaGiamGia/reset/$1';
$route['admin/ma-giam-gia/thung-rac/khoi-phuc'] = 'Admin/MaGiamGia/resetAll';
$route['admin/ma-giam-gia/thung-rac/xoa/(:any)'] = 'Admin/MaGiamGia/delete/$1';
$route['admin/ma-giam-gia/thung-rac/xoa'] = 'Admin/MaGiamGia/deleteAll/$1';


//Route admin contact
$route['admin/lien-he'] = 'Admin/LienHe/index';
$route['admin/lien-he/trang/(:any)'] = 'Admin/LienHe/Page/$1';
$route['admin/lien-he/xem/(:any)'] = 'Admin/LienHe/View/$1';
$route['admin/lien-he/them-thung-rac/(:any)'] = 'Admin/LienHe/remove/$1';
$route['admin/lien-he/thung-rac'] = 'Admin/LienHe/trash';
$route['admin/lien-he/thung-rac/trang/(:any)'] = 'Admin/LienHe/PageTrash/$1';
$route['admin/lien-he/thung-rac/khoi-phuc/(:any)'] = 'Admin/LienHe/reset/$1';
$route['admin/lien-he/thung-rac/khoi-phuc'] = 'Admin/LienHe/resetAll';
$route['admin/lien-he/thung-rac/xoa/(:any)'] = 'Admin/LienHe/delete/$1';
$route['admin/lien-he/thung-rac/xoa'] = 'Admin/LienHe/deleteAll/$1';

//Route admin customer
$route['admin/khach-hang'] = 'Admin/KhachHang/index';
$route['admin/khach-hang/trang/(:any)'] = 'Admin/KhachHang/Page/$1';
$route['admin/khach-hang/xem/(:any)'] = 'Admin/KhachHang/View/$1';
$route['admin/khach-hang/them-thung-rac/(:any)'] = 'Admin/KhachHang/remove/$1';
$route['admin/khach-hang/thung-rac'] = 'Admin/KhachHang/trash';
$route['admin/khach-hang/thung-rac/trang/(:any)'] = 'Admin/KhachHang/PageTrash/$1';
$route['admin/khach-hang/thung-rac/khoi-phuc/(:any)'] = 'Admin/KhachHang/reset/$1';
$route['admin/khach-hang/thung-rac/khoi-phuc'] = 'Admin/KhachHang/resetAll';
$route['admin/khach-hang/thung-rac/xoa/(:any)'] = 'Admin/KhachHang/delete/$1';
$route['admin/khach-hang/thung-rac/xoa'] = 'Admin/KhachHang/deleteAll/$1';
$route['admin/khach-hang/mo-khoa/(:any)'] = 'Admin/KhachHang/unlock/$1';

//Route admin config
$route['admin/cau-hinh'] = 'Admin/CauHinh/index';

//Route admin order
$route['admin/don-hang'] = 'Admin/DonHang/index';
$route['admin/don-hang/trang/(:any)'] = 'Admin/DonHang/Page/$1';
$route['admin/don-hang/xem/(:any)'] = 'Admin/DonHang/View/$1';
$route['admin/don-hang/them-thung-rac/(:any)'] = 'Admin/DonHang/remove/$1';
$route['admin/don-hang/thung-rac'] = 'Admin/DonHang/trash';
$route['admin/don-hang/thung-rac/trang/(:any)'] = 'Admin/DonHang/PageTrash/$1';
$route['admin/don-hang/thung-rac/khoi-phuc/(:any)'] = 'Admin/DonHang/reset/$1';
$route['admin/don-hang/thung-rac/khoi-phuc'] = 'Admin/DonHang/resetAll';
$route['admin/don-hang/thung-rac/xoa/(:any)'] = 'Admin/DonHang/delete/$1';
$route['admin/don-hang/thung-rac/xoa'] = 'Admin/DonHang/deleteAll/$1';
$route['admin/don-hang/hanh-dong/(:any)/(:any)'] = 'Admin/DonHang/action/$1/$2';
$route['admin/don-hang/(:any)'] = 'Admin/DonHang/Status/$1';


//Route admin theme
$route['admin/giao-dien'] = 'Admin/GiaoDien/index';
$route['admin/giao-dien/them'] = 'Admin/GiaoDien/Add';
$route['admin/giao-dien/trang/(:any)'] = 'Admin/GiaoDien/Page/$1';
$route['admin/giao-dien/sua/(:any)'] = 'Admin/GiaoDien/Update/$1';
$route['admin/giao-dien/xoa/(:any)'] = 'Admin/GiaoDien/delete/$1';


