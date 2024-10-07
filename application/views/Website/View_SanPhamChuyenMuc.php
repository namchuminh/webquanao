<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Danh Mục: <?php echo $category; ?></h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('chuyen-muc/'); ?>" style="font-family: system-ui;">Danh Mục</a></li>
                    <li><a style="font-family: system-ui;"><?php echo $category; ?></a></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="page-section section section-padding">
    <div class="container">
        <div class="row">
        	<?php if(count($list) != 0){ ?>
        		<?php foreach ($list as $key => $value): ?>
        			<div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">
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
	        <?php } ?>

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
                        <li><a href="<?php echo base_url('chuyen-muc/'.$slug.'/trang/'.$prev.'/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-left"></i></a></li>
                    <?php } ?>

                    <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                        <li><a href="<?php echo base_url('chuyen-muc/'.$slug.'/trang/'.$i.'/'); ?>" style="font-family: system-ui;"><?php echo $i; ?></a></li>
                    <?php } ?>

                    <?php if(!is_numeric($number)){ ?>
                        <li><a href="<?php echo base_url('chuyen-muc/'.$slug.'/trang/2/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                    <?php }else{ ?>
                        <?php if($number == $totalPages){ ?>
                            <li><a style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                        <?php }else{ ?>
                            <?php $next = $number + 1; ?>
                            <li><a href="<?php echo base_url('chuyen-muc/'.$slug.'/trang/'.$next.'/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>

        </div>

    </div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>
