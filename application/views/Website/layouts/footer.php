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
                var data = JSON.parse(data)
                $('.cart-info').html('(' + data.numberCart + ') ' + data.sumCart + 'đ')
            })
        });
    });
</script>
</body>

</html>