<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Tất Cả Tin Tức</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a style="font-family: system-ui;">Tin Tức</a></li>
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
        			<div class="col-lg-6 col-12 mb-50">
                        <div class="blog-item">
                            <div class="image-wrap">
                                <h4 class="date">T-<?php echo explode('-',$value['NgayDang'])[1]; ?> <span><?php echo explode('-',$value['NgayDang'])[2]; ?></span></h4>
                                <a class="image" href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/'); ?>" style="font-family: system-ui;"><img style="width: 209px; height: 177px;" src="<?php echo $value['AnhChinh']; ?>" alt=""></a>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="<?php echo base_url('tin-tuc/'.$value['DuongDan'].'/'); ?>" style="font-family: system-ui;"><?php echo $value['TieuDe']; ?></a></h4>
                                <div class="desc">
                                    <?php 
                                        $words = explode(' ', $value['NoiDung']);
                                        $first15Words = array_slice($words, 0, 15);
                                        $noidung = implode(' ', $first15Words);
                                    ?>
                                    <p style="font-family: system-ui;"><?php echo $noidung; ?></p>
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
                            <li><a href="<?php echo base_url('tin-tuc/trang/'.$prev.'/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-left"></i></a></li>
                        <?php } ?>

                        <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                            <li><a href="<?php echo base_url('tin-tuc/trang/'.$i.'/'); ?>" style="font-family: system-ui;"><?php echo $i; ?></a></li>
                        <?php } ?>

                        <?php if(!is_numeric($number)){ ?>
                            <li><a href="<?php echo base_url('tin-tuc/trang/2/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                        <?php }else{ ?>
                            <?php if($number == $totalPages){ ?>
                                <li><a style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                            <?php }else{ ?>
                                <?php $next = $number + 1; ?>
                                <li><a href="<?php echo base_url('tin-tuc/trang/'.$next.'/'); ?>" style="font-family: system-ui;"><i class="fa fa-angle-right"></i></a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>

        </div>

    </div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>
