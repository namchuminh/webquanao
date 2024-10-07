<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $config[0]['TenWebsite']; ?> - <?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $config[0]['Logo']; ?>">
    
    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/website/'); ?>css/bootstrap.min.css">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/website/'); ?>css/icon-font.min.css">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/website/'); ?>css/plugins.css">
    
    <!-- Helper CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/website/'); ?>css/helper.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/website/'); ?>css/style.css">
    
    <!-- Modernizer JS -->
    <script src="<?php echo base_url('public/website/'); ?>js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>

<div class="main-wrapper">

    <!-- Header Section Start -->
    <div class="header-section section">

        <!-- Header Top Start -->
        <div class="header-top header-top-one bg-theme-two">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">

                    <div class="col mt-10 mb-10 d-none d-md-flex">
                        <!-- Header Top Left Start -->
                        <div class="header-top-left">
                            <p>Xin chào khách hàng!</p>
                            <p>Điện thoại: <a href="tel:<?php echo $config[0]['SoDienThoai']; ?>"><?php echo $config[0]['SoDienThoai']; ?></a></p>
                        </div><!-- Header Top Left End -->
                    </div>

                    <div class="col mt-10 mb-10">
                        <!-- Header Shop Links Start -->
                        <?php if(isset($_SESSION['khachhang'])){ ?>
                            <div class="header-top-right">
                                <p><a href="<?php echo base_url('khach-hang/'); ?>"><?php echo ucwords($_SESSION['TenKhachHang']); ?></a><a href="<?php echo base_url('dang-xuat/'); ?>">Đăng Xuất</a></p>
                            </div>
                        <?php }else{ ?>
                            <div class="header-top-right">
                                <p><a href="<?php echo base_url('dang-nhap/'); ?>">Đăng Nhập</a><a href="<?php echo base_url('dang-ky/'); ?>">Đăng Ký</a></p>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div><!-- Header Top End -->

        <!-- Header Bottom Start -->
        <div class="header-bottom header-bottom-one header-sticky">
            <div class="container-fluid">
                <div class="row menu-center align-items-center justify-content-between">

                    <div class="col mt-15 mb-15">
                        <!-- Logo Start -->
                        <div class="header-logo">
                            <a href="<?php echo base_url(); ?>">
                                <img style="width: 100%; image-rendering: -WEBKIT-OPTIMIZE-CONTRAST;" src="<?php echo $config[0]['ThuongHieu']; ?>" alt="Jadusona">
                            </a>
                        </div><!-- Logo End -->
                    </div>

                    <div class="col order-2 order-lg-3">
                        <!-- Header Advance Search Start -->
                        <div class="header-shop-links">

                            <div class="header-search">
                                <button class="search-toggle"><img src="<?php echo base_url('public/website/'); ?>images/icons/search.png" alt="Search Toggle"><img class="toggle-close" src="<?php echo base_url('public/website/'); ?>images/icons/close.png" alt="Search Toggle"></button>
                                <div class="header-search-wrap">
                                    <form action="<?php echo base_url('tim-kiem/') ?>">
                                        <input name="s" required type="text" placeholder="Nhập tên sản phẩm...">
                                        <button><img src="<?php echo base_url('public/website/'); ?>images/icons/search.png" alt="Tìm kiếm"></button>
                                    </form>
                                </div>
                            </div>

                            <div class="header-wishlist">
                                <a href="wishlist.html"><img src="<?php echo base_url('public/website/'); ?>images/icons/wishlist.png" alt="Wishlist"> <span></span></a>
                            </div>

                            <div class="header-mini-cart">
                                <a href="<?php echo base_url('gio-hang/'); ?>"><img src="<?php echo base_url('public/website/'); ?>images/icons/cart.png" alt="Cart"> 
                                    <span style="font-size: 14px;" class="cart-info">
                                        <?php if(isset($_SESSION['sumCart'])){ ?>
                                            (<?php echo $_SESSION['numberCart']; ?>)
                                            <?php echo number_format($_SESSION['sumCart']); ?>đ
                                        <?php }else{ ?>
                                            <?php echo "0đ"; ?>
                                        <?php } ?>
                                    </span>
                                </a>
                            </div>

                        </div><!-- Header Advance Search End -->
                    </div>

                    <div class="col order-3 order-lg-2">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="active"><a href="<?php echo base_url(); ?>">TRANG CHỦ</a>
                                    </li>
                                    <li>
                                    	<a href="<?php echo base_url('san-pham/'); ?>">SẢN PHẨM</a>
                                    </li>
                                    <li><a href="<?php echo base_url('chuyen-muc/'); ?>">DANH MỤC</a>
                                    </li>
                                    <li>
                                    	<a href="<?php echo base_url('tin-tuc/'); ?>">TIN TỨC</a>
                                    </li>
                                    <li><a href="<?php echo base_url('lien-he/'); ?>">LIÊN HỆ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Mobile Menu -->
                    <div class="mobile-menu order-4 d-block d-lg-none col"></div>

                </div>
            </div>
        </div><!-- Header BOttom End -->

    </div>
    <?php if(count($slide) != 0){ ?>
	    <div class="hero-section section">
	        <div class="hero-slider hero-slider-one fix">
	        	<?php foreach ($slide as $key => $value): ?>
	        		<?php if(empty($value['MaChuyenMuc'])){ ?>
		        		<a href="#">
		           			<div class="hero-item" style="padding-top: 246px; padding-bottom: 246px;background-image: url(<?php echo $value['HinhAnh']; ?>)">
		           			</div>
		           		</a>
		           	<?php }else{ ?>
		           		<a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan']); ?>">
		           			<div class="hero-item" style="padding-top: 246px; padding-bottom: 246px;background-image: url(<?php echo $value['HinhAnh']; ?>)">
		           			</div>
		           		</a>
		           	<?php } ?>
	        	<?php endforeach ?>
	        </div>
	    </div>
	<?php } ?>

    <?php if(count($banner1) != 0){ ?>
	    <div class="banner-section section mt-40">
	        <div class="container-fluid">
	            <div class="row row-10 mbn-20">
	            		<?php foreach ($banner1 as $key => $value): ?>
			        		<?php if(empty($value['MaChuyenMuc'])){ ?>
				                <div class="col-lg-4 col-md-6 col-12 mb-20">
				                    <div class="banner banner-1 content-left content-middle">
				                        <a  class="image" style="height: 210px;"><img style="height: 100%;" src="<?php echo $value['HinhAnh']; ?>" alt="Banner Image"></a>
				                    </div>
				                </div>
			                <?php }else if(!empty($value['MaChuyenMuc'])){ ?>
			                	<div class="col-lg-4 col-md-6 col-12 mb-20">
				                    <div class="banner banner-1 content-left content-middle">
				                        <a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan']); ?>" class="image" style="height: 210px;"><img style="height: 100%;" src="<?php echo $value['HinhAnh']; ?>" alt="Banner Image"></a>
				                    </div>
				                </div>
			                <?php } ?>
			            <?php endforeach ?>
	            </div>
	        </div>
	    </div>
    <?php } ?>

    <?php if(count($popular) != 0){ ?>
        <div class="product-section section section-padding">
            <div class="container">
                <div class="row">
                    <div class="section-title text-center col mb-30">
                        <h1>Sản Phẩm Nổi Bật</h1>
                        <p>Tất cả sản phẩm phổ biến trong cửa hàng</p>
                    </div>
                </div>
                <div class="row mbn-40">

                    <?php foreach ($popular as $key => $value): ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">
                            <div class="product-item">
                                <div class="product-inner">
                                    <div class="image" style="height: 320px;">
                                        <img style="height: 100%;" src="<?php echo $value['duongdananh']; ?>" alt="Image">
                                        <div class="image-overlay">
                                            <div class="action-buttons">
                                                <button><a class="them-gio-hang" style="color: unset;" value="<?php echo base_url('gio-hang/them/'.$value['MaSanPham'].'/1/'); ?>">Thêm Giỏ Hàng</a></button>
                                                <button>Yêu Thích</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h4 class="title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenSanPham']; ?></a></h4>
                                            <!-- <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div> -->
                                            <h5 class="size">Giá Gốc: <span style="text-decoration: line-through;" class="price"><?php echo number_format($value['GiaGoc']); ?>đ</span></h5>
                                            <h5 class="size">Giá Bán: <span class="price"><?php echo number_format($value['GiaBan']); ?>đ</span>
                                            </h5>
                                        </div>
                                        <div class="content-right">
                                            <span class="price" style="font-size: 16px;">-<?php echo number_format((($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc']) * 100,1); ?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(count($banner2) != 0){ ?>
	    <div class="banner-section section section-padding pt-0 fix">
	        <div class="row row-5 mbn-10">
	        	<?php foreach ($banner2 as $key => $value): ?>
			        <?php if(empty($value['MaChuyenMuc'])){ ?>
			            <div class="col-lg-4 col-md-6 col-12 mb-10">
			                <div class="banner banner-3">
			                    <a style="height: 280px;" class="image"><img style="height: 100%;" src="<?php echo $value['HinhAnh']; ?>" alt="Banner Image"></a>
			                </div>
			            </div>
			        <?php }else{ ?>
			        	<div class="col-lg-4 col-md-6 col-12 mb-10">
			                <div class="banner banner-3">
			                    <a style="height: 280px;" href="<?php echo base_url('chuyen-muc/'.$value['DuongDan']); ?>" class="image"><img style="height: 100%;" src="<?php echo $value['HinhAnh']; ?>" alt="Banner Image"></a>
			                    
			                    <a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan']); ?>" class="shop-link" data-hover="MUA NGAY">MUA NGAY</a>
			                </div>
			            </div>
			        <?php } ?>
			    <?php endforeach ?>
	        </div>
	    </div>
    <?php } ?>

    <!-- Product Section Start -->
    <div class="product-section section section-padding pt-0">
        <div class="container">
            <div class="row mbn-40">

                <?php if(count($new) != 0){ ?>
                    <div class="col-lg-8 col-md-6 col-12 ps-3 ps-lg-4 ps-xl-5 mb-40">
                        <div class="row">
                            <div class="section-title text-start col mb-30">
                                <h1>Sản Phẩm Mới</h1>
                                <p>Sản phẩm mới trong cửa hàng</p>
                            </div>
                        </div>
                        <div class="small-product-slider row row-7 mbn-40">
                            <?php foreach ($new as $key => $value): ?>
                                <div class="col mb-40">
                                    <div class="on-sale-product">
                                        <a style="height: 165px;" href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>" class="image"><img style="height: 100%;" src="<?php echo $value['duongdananh']; ?>" alt="Image" ></a>
                                        <div class="content text-center">
                                            <h4 class="title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>" title="<?php echo $value['TenSanPham']; ?>" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block;"><?php echo $value['TenSanPham']; ?></a></h4>
                                            <span class="price"><?php echo number_format($value['GiaBan']); ?>đ</span>
                                            <span class="old" style="text-decoration: line-through; color: #99caec; font-weight: 500;"><?php echo number_format($value['GiaGoc']); ?>đ</span>
                                            <!-- <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if(count($sale) != 0){ ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-40">
                        <div class="row">
                            <div class="section-title text-start col mb-30">
                                <h1>Siêu Giảm Giá</h1>
                                <p>Sản phẩm giá giá sốc trong cửa hàng</p>
                            </div>
                        </div>
                        <div class="best-deal-slider w-100">

                            <?php foreach ($sale as $key => $value): ?>
                                <div class="slide-item">
                                    <div class="best-deal-product">
                                        <div style="height: 547px;" class="image"><img style="height: 100%;" src="<?php echo $value['duongdananh'];?>" alt="Image"></div>
                                        <div class="content-top">
                                            <div class="content-top-left">
                                                <h4 class="title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenSanPham'];?></a></h4>
                                                <h5 style="font-weight: bold; color: #ff8091;">- <?php echo number_format((($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc']) * 100,1); ?>%</h5>
                                                <!-- <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                            </div>
                                            <div class="content-top-right">
                                                <span class="price"><?php echo number_format($value['GiaBan']);?>đ <span style="text-decoration: line-through;" class="old"><?php echo number_format($value['GiaGoc']);?>đ</span></span>
                                            </div>
                                        </div>
                                        <?php 
                                            $currentDate = date('Y/m/d'); 
                                            $futureDate = date('Y/m/d', strtotime($currentDate . ' +2 days')); 
                                        ?>
                                        <div class="content-bottom">
                                            <div class="countdown" data-countdown="<?php echo $futureDate; ?>"></div>
                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>" data-hover="MUA NGAY">MUA NGAY</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>

                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <!-- Feature Section Start -->
    <div class="feature-section bg-theme-two section section-padding fix" style="background-image: url(<?php echo base_url('public/website/'); ?>images/pattern/pattern-dot.png);">
        <div class="container">
            <div class="feature-wrap row justify-content-between mbn-30">

                <div class="col-md-4 col-12 mb-30">
                    <div class="feature-item text-center">

                        <div class="icon"><img src="<?php echo base_url('public/website/'); ?>images/feature/feature-1.png" alt="Image"></div>
                        <div class="content">
                            <h3>MIỄN PHÍ GIAO HÀNG</h3>
                            <p>Tất cả sản phẩm</p>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 col-12 mb-30">
                    <div class="feature-item text-center">

                        <div class="icon"><img src="<?php echo base_url('public/website/'); ?>images/feature/feature-2.png" alt="Image"></div>
                        <div class="content">
                            <h3>ĐỔI TRẢ HÀNG</h3>
                            <p>Trong 25 ngày</p>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 col-12 mb-30">
                    <div class="feature-item text-center">

                        <div class="icon"><img src="<?php echo base_url('public/website/'); ?>images/feature/feature-3.png" alt="Image"></div>
                        <div class="content">
                            <h3>THANH TOÁN</h3>
                            <p>Bảo mật & an toàn</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div><!-- Feature Section End -->
    <?php if(count($suggestProduct) >= 4){ ?>
        <div class="blog-section section section-padding">
            <div class="container">
                <div class="row mbn-40">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="row">
                            <div class="section-title text-start col mb-30">
                                <h1>Sản Phẩm Dành Cho Bạn</h1>
                                <p style="font-family: system-ui;">Sản phẩm gợi ý cho bạn</p>
                            </div>
                        </div>
                        <div class="small-product-slider row row-12 mbn-40 col-12">
                            <?php foreach ($suggestProduct as $key => $value): ?>
                                <div class="col mb-40">
                                    <div class="on-sale-product">
                                        <a style="height: 300px;" href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>" class="image"><img style="height: 100%;" src="<?php echo $value['duongdananh']; ?>" alt="Image"></a>
                                        <div class="content text-center">
                                            <h4 class="title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenSanPham']; ?></a></h4>
                                            <span class="price"><?php echo number_format($value['GiaBan']); ?>đ <span class="old"><?php echo number_format($value['GiaGoc']); ?>đ</span></span>
                                            <!-- <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    
    <!-- Blog Section Start -->
    <div class="blog-section section section-padding">
        <div class="container">
            <div class="row mbn-40">
                
                <?php if(count($news) != 0){ ?>
                    <div class="col-xl-12 col-lg-12 col-12 mb-40">
                        <div class="row">
                            <div class="section-title text-start col mb-30">
                                <h1>TIN TỨC MỚI</h1>
                                <p>Bài viết mới trong cửa hàng được xuất bản gần đây</p>
                            </div>
                        </div>
                        <div class="row mbn-40">
                            <?php foreach ($news as $key => $value): ?>
                                <div class="col-6 mb-40">
                                    <div class="blog-item">
                                        <div class="image-wrap">
                                            <h4 class="date">T-<?php echo explode('-',$value['NgayDang'])[1]; ?> <span><?php echo explode('-',$value['NgayDang'])[2]; ?></span></h4>
                                            <a class="image" href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/'); ?>">
                                                <img style="width: 209px; height: 177px;" src="<?php echo $value['AnhChinh']; ?>" alt="Image">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TieuDe']; ?></a></h4>
                                            <div class="desc">

                                                <?php 
                                                    $words = explode(' ', $value['NoiDung']);
                                                    $first15Words = array_slice($words, 0, 15);
                                                    $noidung = implode(' ', $first15Words);
                                                 ?>

                                                <p><?php echo $noidung; ?>...</p>
                                            </div>
                                            <ul class="meta">
                                                <li>
                                                    <a>
                                                        <img style="width: 40px; height: 40px;" src="<?php echo $value['anhnhanvien']; ?>" alt="Blog Author">
                                                        <?php echo $value['TenNhanVien']; ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <?php echo $value['NgayDang']; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="footer-top-section section bg-theme-two-light section-padding">
        <div class="container">
            <div class="row mbn-40">

                <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                    <h4 class="title">LIÊN HỆ & KẾT NỐI</h4>
                    <p>Thông tin liên hệ<br/><?php echo $config[0]['DiaChi']; ?></p>
                    <p><a href="tel:<?php echo $config[0]['SoDienThoai']; ?>"><?php echo $config[0]['SoDienThoai']; ?></a><a href="tel:<?php echo $config[0]['SoDienThoai']; ?>"><?php echo $config[0]['SoDienThoai']; ?></a></p>
                    <p><a href="mailto:<?php echo $config[0]['Email']; ?>"><?php echo $config[0]['Email']; ?></a><a href="#"><?php echo base_url(); ?></a></p>
                </div>

                <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                    <h4 class="title">NỘI DUNG WEBSITE</h4>
                    <ul>
                        <li><a href="<?php echo base_url('san-pham/') ?>">Sản Phẩm</a></li>
                        <li><a href="<?php echo base_url('chuyen-muc/') ?>">Danh Mục</a></li>
                        <li><a href="<?php echo base_url('tin-tuc/') ?>">Tin Tức</a></li>
                        <li><a href="<?php echo base_url('gio-hang/') ?>">Giỏ Hàng</a></li>
                        <li><a href="<?php echo base_url('lien-he/') ?>">Liên Hệ & Phản Hồi</a></li>

                    </ul>
                </div>

                <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                    <h4 class="title">THÔNG TIN</h4>
                    <ul>
                        <li><a href="#">Về Chúng Tôi</a></li>
                        <li><a href="#">Điều Khoản & Hoạt Động</a></li>
                        <li><a href="#">Thanh Toán</a></li>
                        <li><a href="#">Đổi Trả Hàng</a></li>
                        <li><a href="#">Chế Độ Bảo Hành</a></li>
                    </ul>
                </div>

                <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                    <h4 class="title">ĐĂNG KÝ</h4>
                    <p>Nhận thông báo về sản phẩm mới!</p>

                    <form id="mc-form" class="mc-form footer-subscribe-form">
                        <input id="mc-email" autocomplete="off" placeholder="Nhập email của bạn..." name="EMAIL" type="email">
                        <button id="mc-submit"><i class="fa fa-paper-plane-o"></i></button>
                    </form>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div><!-- mailchimp-alerts end -->

                    <h5>THEO DÕI</h5> 
                    <p class="footer-social">
                    	<?php if(empty($config[0]['Facebook'])){ ?>
                    		<a href="<?php echo $config[0]['Instagram']; ?>">Instagram</a> -
                    		<a href="<?php echo $config[0]['Tiktok']; ?>">Tiktok</a>
                    	<?php }else if(empty($config[0]['Instagram'])){ ?>
                    		<a href="<?php echo $config[0]['Facebook']; ?>">Facebook</a> - 
                    		<a href="<?php echo $config[0]['Tiktok']; ?>">Tiktok</a>
                    	<?php }else if(empty($config[0]['Tiktok'])){ ?>
                    		<a href="<?php echo $config[0]['Facebook']; ?>">Facebook</a> -
                    		<a href="<?php echo $config[0]['Instagram']; ?>">Instagram</a>
                    	<?php }else{ ?>
                    		<a href="<?php echo $config[0]['Facebook']; ?>">Facebook</a> -
                    		<a href="<?php echo $config[0]['Instagram']; ?>">Instagram</a> -
                    		<a href="<?php echo $config[0]['Tiktok']; ?>">Tiktok</a>
                    	<?php } ?>
                    </p>

                </div>

            </div>
        </div>
    </div><!-- Footer Top Section End -->

    <!-- Footer Bottom Section Start -->
    <div class="footer-bottom-section section bg-theme-two pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p class="footer-copyright">© 2023 Cửa hàng trực tuyến <i class="fa fa-heart heart-icon"></i> Thiết kế bởi, <a target="_blank" href="<?php echo base_url(); ?>">Admin</a></p>
                </div>
            </div>
        </div>
    </div><!-- Footer Bottom Section End -->

</div>

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="<?php echo base_url('public/website/'); ?>js/vendor/jquery-3.6.0.min.js"></script>
<!-- Migrate JS -->
<script src="<?php echo base_url('public/website/'); ?>js/vendor/jquery-migrate-3.3.2.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url('public/website/'); ?>js/bootstrap.bundle.min.js"></script>
<!-- Plugins JS -->
<script src="<?php echo base_url('public/website/'); ?>js/plugins.js"></script>
<!-- Main JS -->
<script src="<?php echo base_url('public/website/'); ?>js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".them-gio-hang").click(function(e){
            e.preventDefault()
            var urlThem = $(this).attr("value");
            $.get(urlThem, function(data){
                if(data){
                    var data = JSON.parse(data)
                    $('.cart-info').html('(' + data.numberCart + ') ' + data.sumCart + 'đ')
                }
                
            })

        });
    });
</script>

</body>

</html>