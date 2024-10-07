<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Khách Hàng</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a style="font-family: system-ui;">Khách Hàng</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>
<div class="page-section section section-padding">
    <div class="container">
        <div class="row mbn-30">

            <!-- My Account Tab Menu Start -->
            <div class="col-lg-3 col-12 mb-30">
                <div class="myaccount-tab-menu nav" role="tablist">
                    <a href="#orders" data-bs-toggle="tab" aria-selected="false" role="tab" style="font-family: system-ui;" class="active" tabindex="-1"><i class="fa fa-cart-arrow-down"></i> Đơn Hàng</a>

                    <a href="#address-edit" data-bs-toggle="tab" aria-selected="false" role="tab" style="font-family: system-ui;" class="" tabindex="-1"><i class="fa fa-user"></i> Thông Tin</a>

                    <a href="#account-info" data-bs-toggle="tab" aria-selected="false" role="tab" style="font-family: system-ui;" class="" tabindex="-1"><i class="fa fa-gear"></i> Cập nhật thông tin</a>

                    <a href="<?php echo base_url('dang-xuat/'); ?>" style="font-family: system-ui;"><i class="fa fa-sign-out"></i> Đăng Xuất</a>
                </div>
            </div>
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12 mb-30">
                <div class="tab-content" id="myaccountContent">
                    <div class="tab-pane fade active show" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Đơn Hàng</h3>

                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr style="font-family: system-ui;">
                                        <th>Mã Đơn</th>
                                        <th>Tên Người Nhận</th>
                                        <th>Thời Gian</th>
                                        <th>Trạng Thái</th>
                                        <th>Xem Chi Tiết</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($list) != 0){ ?>
                                            <?php foreach ($list as $key => $value): ?>
                                                <tr>
                                                    <td>ĐH00<?php echo $value['MaDonHang']; ?></td>
                                                    <td><?php echo $value['TenKhachHang']; ?></td>
                                                    <td><?php echo $value['ThoiGian']; ?></td>
                                                    <td>
                                                        <?php 
                                                            if($value['TrangThai'] == 1){
                                                                echo "Chưa được duyệt"; 
                                                            }else if ($value['TrangThai'] == 2) {
                                                                echo "Đang chuẩn bị hàng";
                                                            }else if ($value['TrangThai'] == 3) {
                                                                echo "Đang giao hàng";
                                                            }else if ($value['TrangThai'] == 4) {
                                                                echo "Đã giao hàng";
                                                            }else if ($value['TrangThai'] == 0) {
                                                                echo "Đã hủy đơn";
                                                            }else if ($value['TrangThai'] == -1) {
                                                                echo "Khách hàng hủy";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><a href="<?php echo base_url('khach-hang/don-hang/'.$value['MaDonHang'].'/'); ?>" class="btn btn-light btn-round" style="font-family: system-ui;">XEM</a></td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Thông Tin Thanh Toán</h3>
                            <address>
                                <p style="font-family: system-ui;"><strong><?php echo $_SESSION['TenKhachHang']; ?></strong></p>
                                <p style="font-family: system-ui;">Tài khoản: <?php echo $_SESSION['khachhang']; ?></p>

                                <p style="font-family: system-ui;">Địa chỉ: <?php echo $_SESSION['DiaChi']; ?> <br>
                                    Email: <?php echo $_SESSION['Email']; ?></p>
                                <p style="font-family: system-ui;">Điện thoại: <?php echo $_SESSION['SoDienThoai']; ?></p>
                                <p style="font-family: system-ui;">Ngày tham gia: <?php echo $_SESSION['NgayThamGia']; ?></p>
                            </address>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Cập Nhật Thông Tin</h3>

                            <div class="account-details-form">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-12 mb-30"><h4>Đổi thông tin khách hàng</h4></div>

                                        <div class="col-lg-12 col-12 mb-30">
                                            <input id="first-name2" placeholder="Tài khoản" type="text" name="taikhoan" value="<?php echo $_SESSION['khachhang']; ?>" disabled require>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="first-name" placeholder="Họ tên khách hàng" type="text" value="<?php echo $_SESSION['TenKhachHang']; ?>" require name="tenkhachhang_c">
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="last-name" placeholder="Số điện thoại" type="text" value="<?php echo $_SESSION['SoDienThoai']; ?>" require name="sodienthoai_c">
                                        </div>

                                        <div class="col-6 mb-30">
                                            <input id="Email Address" placeholder="Email khách hàng" type="email" value="<?php echo $_SESSION['Email']; ?>" require name="email_c"> 
                                        </div>

                                        <div class="col-6 mb-30">
                                            <input id="text" placeholder="Địa chỉ khách hàng" type="text" value="<?php echo $_SESSION['DiaChi']; ?>" require name="diachi_c">
                                        </div>

                                        <div class="col-12 mb-30"><h4>Đổi mật khẩu</h4></div>

                                        <div class="col-12 mb-30">
                                            <input id="current-pwd" placeholder="Mật khẩu hiện tại" type="password" name="matkhau_c">
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="new-pwd" placeholder="Mật khẩu mới" type="password" name="matkhaumoi_c">
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="confirm-pwd" placeholder="Nhập lại mật khẩu mới" type="password" name="matkhaumoi2_c">
                                        </div>

                                        <div class="col-12 d-flex">
                                            <button type="submit" class="update-info btn btn-dark btn-round btn-lg" style="font-family: system-ui;">Cập Nhật</button>
                                            <span class="btn btn-white mt-1" style="font-family: system-ui; cursor: text;">
                                                <h4 class="erorr-info"></h4>
                                            </span>
                                            
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                </div>
            </div>
            <!-- My Account Tab Content End -->
            
        </div>
    </div>
</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".update-info").click(function(e){
            e.preventDefault()
            var tenkhachhang_c = $("input[name=tenkhachhang_c]").val()
            var sodienthoai_c = $("input[name=sodienthoai_c]").val()
            var email_c = $("input[name=email_c]").val()
            var diachi_c = $("input[name=diachi_c]").val()
            var matkhau_c = $("input[name=matkhau_c]").val()
            var matkhaumoi_c = $("input[name=matkhaumoi_c]").val()
            var matkhaumoi2_c = $("input[name=matkhaumoi2_c]").val()
            $.post('<?php echo base_url('khach-hang/cap-nhat/'); ?>', 
                {
                    tenkhachhang_c,sodienthoai_c,email_c,diachi_c,matkhau_c,matkhaumoi_c,matkhaumoi2_c
                },
                function(data){
                    if(data == ''){
                        $('.erorr-info').empty()
                        $('.erorr-info').html("Cập Nhật Thành Công!")
                        $("input[name=matkhau_c]").val('')
                        $("input[name=matkhaumoi_c]").val('')
                        $("input[name=matkhaumoi2_c]").val('')
                        setTimeout(function() {
                            $('.erorr-info').empty();
                        }, 2000);
                    }else{
                        $('.ten_taikhoan').empty()
                        $('.erorr-info').empty()
                        $('.ten_taikhoan').html(tenkhachhang_c)
                        $('.erorr-info').html(data)
                    }
                }
            );
        });
    });
</script>