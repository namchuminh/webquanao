<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Tất Cả Danh Mục</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a style="font-family: system-ui;">Danh Mục</a></li>
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
	                            <div style="height: 250px;" class="image">
	                                <img style="height: 100%;" src="<?php echo $value['AnhChinh']; ?>" alt="">
	                            </div>
	                            <div class="content">
	                                <div class="content-left">
	                                    <h4 class="title"><a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>" style="font-family: system-ui;"><?php echo $value['tenChuyenMuc']; ?></a></h4>
	                                    <div class="ratting">
                                            <h5 class="size">Số Lượng: <span><?php echo $value['soLuongSanPham']; ?> sản phẩm</span></h5>
	                                    </div>
	                                    <h5 class="color">Màu Sắc: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>
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
                    <?php if(count($list) != 0){ ?>
                        <?php if(!is_numeric($number)){ ?>
                            <li><a style="font-family: system-ui;"><i class="fa fa-angle-left"></i></a></li>
                        <?php }else{ ?>
                            <?php $prev = $number - 1; ?>
                            <li><a href="<?php echo base_url('chuyen-muc/trang/'.$prev.'/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-left"></i></a></li>
                        <?php } ?>

                        <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                            <li><a href="<?php echo base_url('chuyen-muc/trang/'.$i.'/'); ?>" style="font-family: system-ui;"><?php echo $i; ?></a></li>
                        <?php } ?>

                        <?php if(!is_numeric($number)){ ?>
                            <li><a href="<?php echo base_url('chuyen-muc/trang/2/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                        <?php }else{ ?>
                            <?php if($number == $totalPages){ ?>
                                <li><a style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                            <?php }else{ ?>
                                <?php $next = $number + 1; ?>
                                <li><a href="<?php echo base_url('chuyen-muc/trang/'.$next.'/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>

        </div>

    </div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>
