<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">
                <h1>Đăng Nhập</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a>Đăng Nhập</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="page-section section section-padding">
        <div class="container">
            <div class="row mbn-40" style="justify-content: center;">
            <div class="col-lg-6 col-12 mb-40">
                <div class="login-register-form-wrap">
                    <h3 class="text-center">Đăng Nhập - Khách Hàng</h3>
                    <form method="POST" class="mb-30">
	                    <?php if(isset($error)){ ?>
	                    	<h4 style="text-align: center; color: #333; font-weight: normal;"><?php echo $error; ?><h4>
	                    <?php } ?>
                        <div class="row">
                            <div class="col-12 mb-30"><input type="text" required name="taikhoan" placeholder="Tài khoản..."></div>
                            <div class="col-12 mb-30"><input type="password" required name="matkhau" placeholder="Mật khẩu..."></div>
                            <div class="col-12 mb-30 d-flex justify-content-between">
                            	<input type="submit" value="Đăng Nhập">
                            	<h4 class="text-right" style="line-height: 2.5;">Chưa có tài khoản? <a href="<?php echo base_url('dang-ky/') ?>">Đăng Ký?</a></h4>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>
