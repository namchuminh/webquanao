<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">
                <h1>Đăng Ký</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a>Đăng Ký</a></li>
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
                    <h3 class="text-center">Đăng Ký - Khách Hàng</h3>
                    <form method="POST" class="mb-30">
	                    <?php if(isset($error)){ ?>
	                    	<h4 style="text-align: center; color: #333; font-weight: normal;"><?php echo $error; ?><h4>
	                    <?php } ?>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-30"><input type="text" name="tenkhachhang" required placeholder="Tên khách hàng..."></div>
                            <div class="col-md-6 col-12 mb-30"><input type="text" name="sodienthoai" required placeholder="Số điện thoại..."></div>
                            <div class="col-md-6 col-12 mb-30"><input type="email" name="email" required placeholder="Email khách hàng..."></div>
                            <div class="col-md-6 col-12 mb-30"><input type="text" name="taikhoan" required placeholder="Tài khoản..."></div>
                            <div class="col-md-6 col-12 mb-30"><input type="password" name="matkhau" required placeholder="Mật khẩu..."></div>
                            <div class="col-md-6 col-12 mb-30"><input type="password" name="matkhau2" required placeholder="Nhập lại mật khẩu..."></div>
                            <div class="col-md-12 col-12 mb-30"><input type="text" name="diachi" required placeholder="Địa chỉ khách hàng..."></div>
                            <div class="col-md-12 col-12 d-flex justify-content-between">
                                <input type="submit" value="Đăng Ký">
                                <h4 class="text-right" style="line-height: 2.5;">Đã có tài khoản? <a href="<?php echo base_url('dang-nhap/') ?>">Đăng Nhập?</a></h4>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>
