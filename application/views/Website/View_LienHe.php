<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Liên Hệ</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a style="font-family: system-ui;">Liên Hệ</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>
<div class="page-section section section-padding">
    <div class="container">
        <div class="row row-30 mbn-40">

           <div class="contact-info-wrap col-md-6 col-12 mb-40">
               <h3>Thông Tin Liên Hệ</h3>
               <p style="font-family: system-ui;">Ngoài việc mua hàng trực tuyến trên hệ thống website của chúng tôi, khách hàng có thể liên hệ và tìm đến cửa hàng để lựa chọn sản phẩm một cách thực tế nhất. Khách hàng có thể tìm đến cửa hàng thông qua các thông tin dưới đây.</p>
               <ul class="contact-info">
                   <li>
                       <i class="fa fa-map-marker"></i>
                       <p style="font-family: system-ui;"><?php echo $config[0]['DiaChi']; ?></p>
                   </li>
                   <li>
                       <i class="fa fa-phone"></i>
                       <p style="font-family: system-ui;"><a href="#" style="font-family: system-ui;"><?php echo $config[0]['SoDienThoai']; ?></a><a href="#" style="font-family: system-ui;"><?php echo $config[0]['SoDienThoai']; ?></a></p>
                   </li>
                   <li>
                       <i class="fa fa-globe"></i>
                       <p style="font-family: system-ui;"><a href="#" style="font-family: system-ui;"><?php echo $config[0]['Email']; ?></a><a href="#" style="font-family: system-ui;"><?php echo base_url(); ?></a></p>
                   </li>
               </ul>
           </div>

           <div class="contact-form-wrap col-md-6 col-12 mb-40">
				<h3>Gửi Liên Hệ</h3>
				<?php if(isset($error) && !empty($error)){ ?>
					<p>*<?php echo $error; ?></p>
				<?php } ?>
				<?php if(isset($success) && !empty($success)){ ?>
					<p><?php echo $success; ?></p>
				<?php } ?>
               <form method="POST">
                   <div class="contact-form">
                       	<div class="row">
							<div class="col-lg-6 col-12 mb-30">
								<?php if(isset($_SESSION['TenKhachHang'])){ ?>
									<input type="text" name="tenkhachhang" placeholder="Tên khách hàng" value="<?php echo $_SESSION['TenKhachHang']; ?>" required disabled>
								<?php }else{ ?>
									<input type="text" required name="tenkhachhang" placeholder="Tên khách hàng">
								<?php } ?>
							</div>
							<div class="col-lg-6 col-12 mb-30">
								<?php if(isset($_SESSION['SoDienThoai'])){ ?>
									<input type="text" name="sodienthoai" value="<?php echo $_SESSION['SoDienThoai']; ?>" placeholder="Số điện thoại..." required disabled>
								<?php }else{ ?>
									<input type="text" required name="sodienthoai" placeholder="Số điện thoại...">
								<?php } ?>
							</div>
							<div class="col-12 mb-30">
								<input type="text" name="tieude" placeholder="Tiêu đề..." required>
							</div>
							<div class="col-12 mb-30">
							<textarea name="noidung" placeholder="Nội dung..." required></textarea>
							</div>
							<div class="col-12"><input type="submit" value="Gửi"></div>
                       </div>
                   </div>
               </form>
               <div class="form-message mt-3"></div>
           </div>

        </div>
    </div>
</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>
