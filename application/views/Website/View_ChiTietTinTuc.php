<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col text-center">
                <h1><?php echo  $detail[0]['TieuDe']; ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="blog-section section section-padding">
        <div class="container">
            <div class="row row-30 mbn-40">

                <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2 mb-40">
                    <div class="single-blog">
                        <div class="image-wrap">
                            <h4 class="date">
                            	T-<?php echo explode('-',$detail[0]['NgayDang'])[2]; ?> 
                            	<span>
                            		<?php echo explode('-',$detail[0]['NgayDang'])[1]; ?>
                            	</span>
                            </h4>
                            <a class="image" href="<?php echo base_url('tin-tuc/'.$detail[0]['DuongDan'].'/'); ?>" style="font-family: system-ui;">
                            	<img style="height: 417px;" src="<?php echo $detail[0]['AnhChinh']; ?>" alt="">
                            </a>
                        </div>
                        <div class="content">
                            <ul class="meta">
                                <li><a href="#" style="font-family: system-ui;"><img src="<?php echo $detail[0]['anhnhanvien']; ?>" alt="Blog Author"><?php echo $detail[0]['TenNhanVien']; ?></a></li>
                                <li><a href="#" style="font-family: system-ui;"><?php echo $detail[0]['NgayDang']; ?></a></li>
                                <li><a href="#" style="font-family: system-ui;">1000 lượt xem </a></li>

                            </ul>
                            <div class="desc">
                                <?php echo $detail[0]['NoiDung']; ?>
                            </div>

                            <div class="blog-footer row mt-45">
                            	<?php $tag = explode(',',$detail[0]['The']); ?>
                                <div class="post-tags col-lg-6 col-12 mv-15">
                                    <h4>Thẻ:</h4>
                                    <ul class="tag">
                                    	<?php foreach ($tag as $key => $value): ?>
                                    		<li><?php echo $value; ?></li>
                                    	<?php endforeach ?>
                                    </ul>
                                </div>

                                <div class="post-share col-lg-6 col-12 mv-15">
                                    <h4>Share:</h4>
                                    <ul class="share">
                                        <li><a href="#" style="font-family: system-ui;"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" style="font-family: system-ui;"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" style="font-family: system-ui;"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#" style="font-family: system-ui;"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#" style="font-family: system-ui;"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 mb-40">

                	<?php if(count($category) != 0){ ?>
	                    <div class="sidebar">
	                        <h4 class="sidebar-title">Danh Mục Sản Phẩm</h4>
	                        <ul class="sidebar-list">

	                     		<?php foreach ($category as $key => $value): ?>
	                     			<li><a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>" style="font-family: system-ui;"><?php echo $value['tenChuyenMuc']; ?> <span class="num"><?php echo $value['soLuongSanPham']; ?></span></a></li>
	                     		<?php endforeach ?>
	                            
	                            
	                        </ul>
	                    </div>
	                <?php } ?>

                    <div class="sidebar">
                        <h4 class="sidebar-title">Tin Tức Mới</h4>
                        <div class="sidebar-blog-wrap">
                            <?php $number = 5; ?>
                            <?php 
                                if(count($new) < $number){ 
                                    $number = count($new);
                                }
                            ?>
                        	<?php for($i = 0; $i < $number; $i++){ ?>
	                            <div class="sidebar-blog">
	                                <a href="<?php echo base_url('tin-tuc/'.$new[$i]['DuongDan'].'/') ?>" class="image" style="font-family: system-ui;"><img style="    height: 70px;" src="<?php echo $new[$i]['AnhChinh']; ?>" alt=""></a>
	                                <div class="content">
	                                    <a href="<?php echo base_url('tin-tuc/'.$new[$i]['DuongDan'].'/') ?>" class="title" style="font-family: system-ui;"><?php echo $new[$i]['TieuDe']; ?></a>
	                                    <span class="date"><?php echo $new[$i]['NgayDang']; ?></span>
	                                </div>
	                            </div>
                            <?php } ?>

                        </div>
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
