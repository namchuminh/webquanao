<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Tất Cả Sản Phẩm</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a style="font-family: system-ui;">Sản Phẩm</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="page-section section section-padding">
        <div class="container">
            <div class="row row-30 mbn-40">

                <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2 mb-40">
                    <div class="row">

                        <div class="col-12">
                            <div class="product-short">
                                <h4>Sắp xếp:</h4>
                                <select class="nice-select" style="display: none;">
                                    <option>Mới nhất</option>
                                    <option>Theo Giá Giảm</option>
                                    <option>Theo Giá Tăng</option>
                                    <option>Cũ Nhất</option>
                                </select>
                            </div>
                        </div>

                        <?php if(count($list) != 0){ ?>
                            <?php foreach ($list as $key => $value): ?>
                                <div class="col-xl-4 col-md-6 col-12 mb-40">
                                    <div class="product-item">
                                        <div class="product-inner">
                                            <div class="image" style="height: 320px;">
                                                <img style="height: 100%;" src="<?php echo $value['duongdananh']; ?>" alt="Image">
                                                <div class="image-overlay">
                                                    <div class="action-buttons">
                                                        <button>
                                                            <a style="color: unset;" class="them-gio-hang" value="<?php echo base_url('gio-hang/them/'.$value['MaSanPham'].'/1/'); ?>">THÊM GIỎ HÀNG
                                                            </a>
                                                        </button>
                                                        <button>Yêu Thích</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h4 class="title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>" title="<?php echo $value['TenSanPham']; ?>"><?php echo $value['TenSanPham']; ?></a></h4>
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
                            
                            <?php 
                                $url = $_SERVER['REQUEST_URI'];
                                $parts = explode('/', $url);
                                $number = end($parts);
                                $number = prev($parts);
                            ?>

                            <div class="col-12">
                                <ul class="page-pagination">
                                    <?php if(!is_numeric($number)){ ?>
                                        <li><a style="font-family: system-ui;"><i class="fa fa-angle-left"></i></a></li>
                                    <?php }else{ ?>
                                        <?php $prev = $number - 1; ?>
                                        <li><a href="<?php echo base_url('san-pham/trang/'.$prev.'/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-left"></i></a></li>
                                    <?php } ?>

                                    <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                                        <li><a href="<?php echo base_url('san-pham/trang/'.$i.'/'); ?>" style="font-family: system-ui;"><?php echo $i; ?></a></li>
                                    <?php } ?>

                                    <?php if(!is_numeric($number)){ ?>
                                        <li><a href="<?php echo base_url('san-pham/trang/2/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                                    <?php }else{ ?>
                                        <?php if($number == $totalPages){ ?>
                                            <li><a style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                                        <?php }else{ ?>
                                            <?php $next = $number + 1; ?>
                                            <li><a href="<?php echo base_url('san-pham/trang/'.$next.'/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                    
                                </ul>
                            </div>

                        <?php } ?>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 mb-40">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Tìm Kiếm</h3>
                        <div class="sidebar-product-wrap">
                            <form action="<?php echo base_url('tim-kiem/') ?>">
                                <input name="s" required="" type="text" placeholder="Nhập tên sản phẩm..." style="border: none; width: 100%;">
                            </form>
                        </div>
                    </div>
                    <div class="sidebar">
                        <h4 class="sidebar-title">Tất Cả Danh Mục</h4>
                        <ul class="sidebar-list">
                            <?php foreach ($category as $key => $value): ?>
                                <li><a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>" style="font-family: system-ui;"><?php echo $value['tenChuyenMuc']; ?> <span class="num"><?php echo $value['soLuongSanPham']; ?></span></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="sidebar">
                        <h4 class="sidebar-title">Màu Sắc</h4>
                        <ul class="sidebar-list">
                            <li><a href="<?php echo base_url('san-pham/mau/xanh/'); ?>" style="font-family: system-ui;"><span class="color" style="background-color: #0000FF"></span> Xanh</a></li>
                            <li><a href="<?php echo base_url('san-pham/mau/do/'); ?>" style="font-family: system-ui;"><span class="color" style="background-color: #FF0000"></span> Đỏ</a></li>
                            <li><a href="<?php echo base_url('san-pham/mau/vang/'); ?>" style="font-family: system-ui;"><span class="color" style="background-color: yellow;"></span> Vàng</a></li>
                            <li><a href="<?php echo base_url('san-pham/mau/trang/'); ?>" style="font-family: system-ui;"><span class="color" style="background-color: white; border: 1px solid #afafaf;"></span> Trắng</a></li>
                            <li><a href="<?php echo base_url('san-pham/mau/den/'); ?>" style="font-family: system-ui;"><span class="color" style="background-color: #000000"></span> Đen</a></li>
                            <li><a href="<?php echo base_url('san-pham/mau/hong/'); ?>" style="font-family: system-ui;"><span class="color" style="background-color: pink"></span> Hồng</a></li>
                        </ul>
                    </div>
                    <?php $number = 5; ?>
                    <?php 
                        if(count($popular) < $number){ 
                            $number = count($popular);
                        }
                    ?>
                    <?php if(count($popular) != 0){ ?>
                        <div class="sidebar">
                            <h4 class="sidebar-title">Sản Phẩm Nổi Bật</h4>
                            <div class="sidebar-product-wrap">

                                <?php for($i = 0; $i < $number; $i++){ ?>
                                    <div class="sidebar-product">
                                        <a href="<?php echo base_url('san-pham/'.$popular[$i]['DuongDan'].'/') ?>" class="image" style="font-family: system-ui; height: 90px;"><img style="height: 100%;" src="<?php echo $popular[$i]['duongdananh']; ?>" alt=""></a>
                                        <div class="content">
                                            <a href="<?php echo base_url('san-pham/'.$popular[$i]['DuongDan'].'/') ?>" class="title" style="font-family: system-ui;"><?php echo $popular[$i]['TenSanPham']; ?></a>
                                            <span class="price"><?php echo number_format($popular[$i]['GiaBan']); ?>đ <span class="old"><?php echo number_format($popular[$i]['GiaGoc']); ?>đ</span></span>
                                            <!-- <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div> -->
                                        </div>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>

<?php require(__DIR__.'/layouts/footer.php'); ?>
