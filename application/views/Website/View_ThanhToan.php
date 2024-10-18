<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Thanh Toán</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('gio-hang/'); ?>" style="font-family: system-ui;">Giỏ Hàng</a></li>
                    <li><a style="font-family: system-ui;">Thanh Toán</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="page-section section section-padding">
        <div class="container">

			<!-- Checkout Form s-->
			<form method="POST" class="checkout-form">
			   <div class="row row-50 mbn-40">

				   <div class="col-lg-7">

					   <!-- Billing Address -->
					   <div id="billing-form" class="mb-20">
						   <h4 class="checkout-title">Thông Tin Thanh Toán</h4>

						   <div class="row">

							   <div class="col-md-6 col-12 mb-5">
								   <label>Tài Khoản</label>
								   <input type="text" placeholder="Tài khoản" value="<?php echo $_SESSION['khachhang']; ?>" disabled>
							   </div>

							   <div class="col-md-6 col-12 mb-5">
								   <label>Họ Tên</label>
								   <input type="text" placeholder="Họ tên khách hàng" disabled value="<?php echo $_SESSION['TenKhachHang']; ?>">
							   </div>

							   <div class="col-md-6 col-12 mb-5">
								   <label>Địa Chỉ Email</label>
								   <input type="email" placeholder="Email khách hàng" disabled value="<?php echo $_SESSION['Email']; ?>">
							   </div>

							   <div class="col-md-6 col-12 mb-5">
								   <label>Số Điện Thoại</label>
								   <input type="text" placeholder="Số điện thoại" value="<?php echo $_SESSION['SoDienThoai']; ?>" required disabled>
							   </div>

							   <div class="col-12 mb-5">
								   <label>Tên Công Ty (tùy chọn)</label>
								   <input type="text" placeholder="Tên công ty" name="tencongty">
							   </div>

							   <div class="col-md-6 col-12 mb-5">
								   <label>Tỉnh/Thành Phố</label>
								   	<select class="form-control" id="thanhpho" required>
					                    <option value="">Chọn Tỉnh / Thành Phố *</option>
					                </select>
							   </div>

							   <div class="col-md-6 col-12 mb-5">
								   	<label>Quận/Huyện</label>
								   	<select class="form-control" id="quanhuyen" required>
					                    <option value="">Chọn Quận / Huyện *</option>
					                </select>
							   </div>

							   <div class="col-md-6 col-12 mb-5">
								   	<label>Xã/Phường</label>
								   	<select class="form-control" id="xaphuong" required>
					                    <option value="">Chọn Xã / Phường *</option>
					                </select>
							   </div>

							   <div class="col-md-6 col-12 mb-5">
								   <label>Địa Chỉ (Cụ thể)</label>
								   <input type="text" placeholder="Số nhà hoặc xóm, thôn hoặc phố" required name="diachi">
							   </div>

							   <div class="col-12 mb-40">
								   <h4 class="checkout-title">Phương Thức Thanh Toán</h4>
								   <div class="checkout-payment-method">
									   <div class="single-method">
										   <input type="radio" id="payment_check" name="payment-method" value="1">
										   <label for="payment_check">Thanh Toán Khi Nhận Hàng</label>
									   </div>
									   <div class="single-method">
										   <input type="radio" id="payment_bank" name="payment-method" value="2">
										   <label for="payment_bank">Chuyển Khoản Ngân Hàng</label>
									   </div>
									   <div class="col-md-12 col-12 mb-5 list-bank">
										   	<label>Chọn Ngân Hàng</label>
										   	<select class="form-control" id="nganhang">
							                    <option value="NCB"> Ngân Hàng NCB</option>
											    <option value="AGRIBANK"> Ngân Hàng Agribank</option>
											    <option value="SCB"> Ngân Hàng SCB</option>
											    <option value="SACOMBANK">Ngân Hàng SacomBank</option>
											    <option value="EXIMBANK"> Ngân Hàng EximBank</option>
											    <option value="MSBANK"> Ngân Hàng MSBANK</option>
											    <option value="NAMABANK"> Ngân Hàng NamABank</option>
											    <option value="VNMART"> Vi Điện Tử VnMart</option>
											    <option value="VIETINBANK">Ngân Hàng Vietinbank</option>
											    <option value="VIETCOMBANK"> Ngân Hàng VCB</option>
											    <option value="HDBANK">Ngân Hàng HDBank</option>
											    <option value="DONGABANK"> Ngân Hàng Đông A</option>
											    <option value="TPBANK"> Ngân Hàng TPBank</option>
											    <option value="OJB"> Ngân Hàng OceanBank</option>
											    <option value="BIDV"> Ngân Hàng BIDV</option>
											    <option value="TECHCOMBANK"> Ngân Hàng Techcombank</option>
											    <option value="VPBANK"> Ngân Hàng VPBank</option>
											    <option value="MBBANK"> Ngân Hàng MBBank</option>
											    <option value="ACB"> Ngân Hàng ACB</option>
											    <option value="OCB"> Ngân Hàng OCB</option>
											    <option value="IVB"> Ngân Hàng IVB</option>
											    <option value="VISA"> Thanh toán qua VISA/MASTER</option>
							                </select>
									   </div>
								   </div>
								   
								   		<button type="submit" class="place-order" style="font-family: system-ui;">Đặt Hàng</button>
								   	<div class="submit-order"></div>
								   
							   </div>

						   </div>

					   </div>

				   </div>

				   <div class="col-lg-5">
					   <div class="row">

						   <!-- Cart Total -->
						   <div class="col-12 mb-40">

							   <h4 class="checkout-title">Thông Tin Đơn Hàng</h4>

							   <div class="checkout-cart-total">

								   <h4>Sản Phẩm <span>Thành Tiền</span></h4>

								   <ul>
								   		<?php foreach ($_SESSION['cart'] as $key => $value): ?>
											<li>
												<?php echo $value['name']; ?> (SL: <?php echo $value['number']; ?> - Size <?php echo $value['size']; ?>)
												<span><?php echo number_format($value['price'] * $value['number']); ?>đ</span>
											</li>
								   		<?php endforeach ?>
								   </ul>

								   <p style="font-family: system-ui;">Tổng Thành Tiền <span>
								   		<?php
                                            if(isset($_SESSION['saleCode'])){
                                                echo number_format($_SESSION['sumCart'] + $_SESSION['saleCode']);
                                            }else{
                                                echo number_format($_SESSION['sumCart']);
                                            } 
                                        ?>đ
								   	</span></p>
								   	<p style="font-family: system-ui;">
								   		Giảm Giá 
								   		<span>
								   			<?php if(isset($_SESSION['saleCode'])){ ?>
                                                - <?php echo number_format($_SESSION['saleCode']); ?>đ
                                            <?php }else{ ?>
                                                <?php echo '0đ'; ?>
                                            <?php } ?>
								   		</span>
								   	</p>

								   <h4>Tổng Tiền <span><?php echo number_format($_SESSION['sumCart']); ?>đ</span></h4>

							   </div>

						   </div>

					   </div>
				   </div>

			   </div>
			</form>
       
        </div>
    </div>
<style type="text/css">
	.form-control{
		width: 100%;
	    background-color: transparent;
	    border: 1px solid #666666;
	    border-radius: 50px;
	    line-height: 23px;
	    padding: 10px 20px;
	    font-size: 14px;
	    color: #1a161e;
	    margin-bottom: 15px;
	}
</style>
<?php require(__DIR__.'/layouts/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".list-bank").attr("style", "display: none;")
		$("#payment_bank").click(function(e){
			$(".list-bank").attr("style", "display: block;")
		})

		$("#payment_check").click(function(e){
			$(".list-bank").attr("style", "display: none;")
		})

		$('.place-order').click(function(e){
			e.preventDefault()
			var tencongty = $("input[name=tencongty]").val()
			var quanhuyen = $("#quanhuyen option:selected").text();
			var thanhpho = $("#thanhpho option:selected").text();
			var diachi = $("input[name=diachi]").val() + ", " + $("#xaphuong option:selected").text();


			if($("#thanhpho").val() == ""){
				$('.submit-order').empty()
				$('.submit-order').append('<p class="place-order" style="font-family: system-ui; border: none; text-transform: unset; background: white; color: #333; font-weight: 500; font-size: 14px;">Vui lòng chọn thành phố!</p>')
				return;
			}

			if($("#quanhuyen").val() == ""){
				$('.submit-order').empty()
				$('.submit-order').append('<p class="place-order" style="font-family: system-ui; border: none; text-transform: unset; background: white; color: #333; font-weight: 500; font-size: 14px;">Vui lòng chọn quận huyện!</p>')
				return;
			}

			if($("#xaphuong").val() == ""){
				$('.submit-order').empty()
				$('.submit-order').append('<p class="place-order" style="font-family: system-ui; border: none; text-transform: unset; background: white; color: #333; font-weight: 500; font-size: 14px;">Vui lòng chọn xã phường!</p>')
				return;
			}

			if($("input[name=diachi]").val() == ""){
				$('.submit-order').empty()
				$('.submit-order').append('<p class="place-order" style="font-family: system-ui; border: none; text-transform: unset; background: white; color: #333; font-weight: 500; font-size: 14px;">Vui lòng nhập địa chỉ!</p>')
				return;
			}

			var payment_method = $("input[name=payment-method]:checked").val()

			if(payment_method == 'undefined' || payment_method == null){
				payment_method = ""
			}

			if(payment_method == 2){
				var nganhang = $("#nganhang").val();
				window.location.href = '<?php echo base_url('thanh-toan/ngan-hang/'); ?>' + '?tencongty='+tencongty+'&quanhuyen='+quanhuyen+'&thanhpho='+thanhpho+'&diachi='+diachi+'&nganhang='+nganhang;
			}else{
				$.post('<?php echo base_url('thanh-toan/thuc-hien/'); ?>', {tencongty, quanhuyen, thanhpho, diachi, payment_method}, function(data){
					if(data == true){
						window.location.href = '<?php echo base_url('khach-hang/'); ?>'
					}else{
						$('.submit-order').empty()
						$('.submit-order').append('<p class="place-order" style="font-family: system-ui; border: none; text-transform: unset; background: white; color: #333; font-weight: 500; font-size: 14px;">'+ data +'</p>')
					}
				});
			}
		})
	})
</script>

<script type="text/javascript">
    $(document).ready(function () {
        // Tên đã chọn
        let selectedTinhName = '';
        let selectedHuyenName = '';
        let selectedXaName = '';

        // Lấy danh sách tỉnh
        function loadTinh() {
            $.ajax({
                url: 'https://vapi.vnappmob.com/api/province/', // API lấy danh sách tỉnh
                method: 'GET',
                success: function (data) {
                    $('#thanhpho').html('<option value="">Chọn Tỉnh / Thành Phố *</option>');
                    data.results.forEach(function (item) {
                        $('#thanhpho').append('<option value="' + item.province_id + '" data-name="' + item.province_name + '">' + item.province_name + '</option>');
                    });
                },
                error: function () {
                    alert('Không thể lấy danh sách tỉnh');
                }
            });
        }

        // Khi người dùng chọn tỉnh
        $('#thanhpho').on('change', function () {
            var tinhCode = $(this).val();
            selectedTinhName = $('#thanhpho option:selected').data('name'); // Lấy tên tỉnh

            if (tinhCode) {
                $.ajax({
                    url: 'https://vapi.vnappmob.com/api/province/district/' + tinhCode, // API lấy danh sách huyện theo tỉnh
                    method: 'GET',
                    success: function (data) {
                        $('#quanhuyen').html('<option value="">Chọn Quận / Huyện *</option>');
                        $('#xaphuong').html('<option value="">Chọn Xã / Phường *</option>'); // Xóa danh sách xã khi thay đổi huyện
                        data.results.forEach(function (item) {
                            $('#quanhuyen').append('<option value="' + item.district_id + '" data-name="' + item.district_name + '">' + item.district_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Không thể lấy danh sách huyện');
                    }
                });
            } else {
                $('#quanhuyen').html('<option value="">Chọn Quận / Huyện *</option>');
                $('#xaphuong').html('<option value="">Chọn Xã / Phường *</option>');
            }
        });

        // Khi người dùng chọn huyện
        $('#quanhuyen').on('change', function () {
            var huyenCode = $(this).val();
            selectedHuyenName = $('#quanhuyen option:selected').data('name'); // Lấy tên huyện

            if (huyenCode) {
                $.ajax({
                    url: 'https://vapi.vnappmob.com/api/province/ward/' + huyenCode, // API lấy danh sách xã theo huyện
                    method: 'GET',
                    success: function (data) {
                        $('#xaphuong').html('<option value="">Chọn Xã / Phường *</option>');
                        data.results.forEach(function (item) {
                            $('#xaphuong').append('<option value="' + item.ward_id + '" data-name="' + item.ward_name + '">' + item.ward_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Không thể lấy danh sách xã');
                    }
                });
            } else {
                $('#xaphuong').html('<option value="">Chọn Xã / Phường *</option>');
            }
        });

        // Khi người dùng chọn xã
        $('#xaphuong').on('change', function () {
            selectedXaName = $('#xaphuong option:selected').data('name'); // Lấy tên xã
        });

        // Xử lý form khi gửi
        $('#addressForm').on('submit', function (e) {
            e.preventDefault();

            if (selectedTinhName && selectedHuyenName && selectedXaName) {
                // Dữ liệu cần gửi lên server
                const formData = {
                    tinh: selectedTinhName,
                    huyen: selectedHuyenName,
                    xa: selectedXaName
                };

                // Gửi dữ liệu lên server
                $.ajax({
                    url: 'https://your-server.com/api/address', // Thay bằng URL API server của bạn
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function (response) {
                        alert('Dữ liệu đã được gửi thành công!');
                    },
                    error: function () {
                        alert('Gửi dữ liệu thất bại!');
                    }
                });
            } else {
                alert('Vui lòng chọn đầy đủ Tỉnh, Huyện, Xã!');
            }
        });

        // Load danh sách tỉnh khi trang được mở
        loadTinh();
    });
</script>