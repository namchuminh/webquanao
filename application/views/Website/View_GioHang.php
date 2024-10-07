<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Giỏ Hàng</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a style="font-family: system-ui;">Giỏ Hàng</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="page-section section section-padding">
        <div class="container">

            <form action="#">				
                <div class="row mbn-40">
                    <div class="col-12 mb-40">
                        <div class="cart-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="font-family: system-ui;" class="pro-thumbnail">Hình Ảnh</th>
                                        <th style="font-family: system-ui;" class="pro-title">Tên Sản Phẩm</th>
                                        <th style="font-family: system-ui;" class="pro-title">Màu Sắc</th>
                                        <th style="font-family: system-ui;" class="pro-title">Kích Thước</th>
                                        <th style="font-family: system-ui;" class="pro-price">Giá Bán</th>
                                        <th style="font-family: system-ui;" class="pro-quantity">Số Lượng</th>
                                        <th style="font-family: system-ui;" class="pro-subtotal">Thành Tiền</th>
                                        <th style="font-family: system-ui;" class="pro-remove">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($_SESSION['cart'])){ ?>
                                        <?php foreach ($list as $key => $value): ?>
                                            <tr class="product-<?php echo $value['id'];?>">
                                                <td class="pro-thumbnail">
                                                    <a style="font-family: system-ui;">
                                                        <img style="width: 100px; height: 100px;" src="<?php echo $value['image']; ?>" alt="">
                                                    </a>
                                                </td>
                                                <td class="pro-title">
                                                    <a href="<?php echo base_url('san-pham/'.$value['slug'].'/') ?>" style="font-family: system-ui;"><?php echo $value['name']; ?></a>
                                                </td>
                                                <?php 
                                                    $mau = [
                                                        'blue' => 'Xanh',
                                                        'red' => 'Đỏ',
                                                        'yellow' => 'Vàng',
                                                        'white' => 'Trắng',
                                                        'black' => 'Đen',
                                                        'pink' => 'Hồng'
                                                    ];
                                                 ?>
                                                <td class="pro-quantity">
                                                    <?php if(count($value['color']) == 1){ ?>
                                                        <span style="font-size: 17px;" value="<?php echo $value['color'][0]; ?>" class="color<?php echo $value['id']; ?>">
                                                            <?php echo $mau[$value['color'][0]]; ?>
                                                        </span>
                                                    <?php }else{ ?>
                                                        <select class="form-select mausac">
                                                            <option hidden>Chọn</option>
                                                            <?php foreach ($value['color'] as $key1 => $value1): ?>
                                                                <option value="<?php echo $value1['MaHienThi'].','.$value['id']; ?>"><?php echo $mau[$value1['MaHienThi']] ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    <?php } ?>
                                                </td>
                                                <td class="pro-quantity">
                                                    <?php if($value['size'] != ""){ ?>
                                                        <span style="font-size: 17px;">
                                                            Size - <?php echo $value['size']; ?>
                                                        </span>
                                                    <?php }else{ ?>
                                                        <select class="form-select kichthuoc">
                                                            <option hidden>Chọn</option>
                                                            <option value="36,<?php echo $value['id']; ?>">Size - 36</option>
                                                            <option value="37,<?php echo $value['id']; ?>">Size - 37</option>
                                                            <option value="38,<?php echo $value['id']; ?>">Size - 38</option>
                                                            <option value="39,<?php echo $value['id']; ?>">Size - 39</option>
                                                            <option value="40,<?php echo $value['id']; ?>">Size - 40</option>
                                                            <option value="41,<?php echo $value['id']; ?>">Size - 41</option>
                                                            <option value="42,<?php echo $value['id']; ?>">Size - 42</option>
                                                            <option value="43,<?php echo $value['id']; ?>">Size - 43</option>
                                                        </select>
                                                    <?php } ?>
                                                </td>
                                                <td class="pro-price">
                                                    <span class="amount"><?php echo number_format($value['price']); ?>đ</span>
                                                </td>
                                                <td class="pro-quantity">
                                                    <div class="pro-qty">
                                                        <span class="dec-qtybtn-<?php echo $value['id'];?> dec qtybtn">
                                                            <i class="ti-minus"></i>
                                                        </span>
                                                        <input class="number-<?php echo $value['id']; ?>" type="text" value="<?php echo $value['number']; ?>" disabled style="background: white;">
                                                        <span style="z-index: 1;" class="inc-qtybtn-<?php echo $value['id'];?> inc qtybtn">
                                                            <i class="ti-plus"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal"><?php echo number_format($value['number'] * $value['price']); ?>đ</td>
                                                <td class="pro-remove"><a class="remove_pro" value="<?php echo $value['id']; ?>" style="font-family: system-ui;">×</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if(!isset($_SESSION['cart'])){ ?>
                                <p class="text-center mt-30">Không Có Sản Phẩm Nào Trong Giỏ Hàng!</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12 mb-40">
                        <div class="cart-buttons mb-30">
                            <a href="<?php echo base_url('san-pham/'); ?>" style="font-family: system-ui;">Tiếp Tục Mua Sắm</a>
                        </div>
                        <?php if(isset($_SESSION['sumCart']) && $_SESSION['sumCart'] != 0){ ?>
                            <div class="cart-coupon">
                                <h4>Mã Giảm Giá</h4>
                                <p class="coupon-info" style="font-family: system-ui;">Nhập mã giảm giá nếu có.</p>
                                 <div class="cuppon-form">
                                    <input type="text" class="code_input" placeholder="Mã giảm giá...">
                                    <input class="sale-code" type="submit" value="Áp Dụng">
                                 </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if(isset($_SESSION['sumCart']) && $_SESSION['sumCart'] != 0){ ?>
                        <div class="col-lg-4 col-md-5 col-12 mb-40">
                            <div class="cart-total fix">
                                <h3>Tổng Giỏ Hàng</h3>
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th style="text-transform: unset;">Tổng đơn</th>
                                            <td>
                                                <span class="amount">
                                                    <?php
                                                        if(isset($_SESSION['saleCode'])){
                                                            echo number_format($_SESSION['sumCart'] + $_SESSION['saleCode']);
                                                        }else{
                                                            echo number_format($_SESSION['sumCart']);
                                                        } 
                                                    ?>đ
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th style="text-transform: unset;">Mã giảm giá</th>
                                            <td><span class="amount">
                                                <?php if(isset($_SESSION['saleCode'])){ ?>
                                                    - <?php echo number_format($_SESSION['saleCode']); ?>đ
                                                <?php }else{ ?>
                                                    <?php echo '0đ'; ?>
                                                <?php } ?>
                                            </span></td>
                                        </tr>
                                        
                                        <tr class="order-total">
                                            <th style="text-transform: unset;">Tổng Tiền</th>
                                            <td>
                                                <strong><span class="amount" ><?php echo number_format($_SESSION['sumCart']); ?>đ</span></strong>
                                            </td>
                                        </tr>											
                                    </tbody>
                                </table>
                                <div class="proceed-to-checkout section mt-30">
                                    <p class="error-pay" style="font-family: system-ui;"></p>
                                    <a class="check-pay" style="font-family: system-ui;">Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
<input type="hidden" class="url_suagiohang" value="<?php echo base_url('gio-hang/'); ?>">
<?php require(__DIR__.'/layouts/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.mausac').on('change', function (e) {
            var valueSelected = this.value;
            var mau = valueSelected.split(',')[0]
            var masanpham = valueSelected.split(',')[1]
            $.get($('.url_suagiohang').val() + 'sua-mau/' + masanpham + '/' + mau + '/', function(data){
                location.reload()
            });
        });

        $('.kichthuoc').on('change', function (e) {
            var valueSelected = this.value;
            var kichthuoc = valueSelected.split(',')[0]
            var masanpham = valueSelected.split(',')[1]
            var mausac = $('.color'+masanpham).attr('value')

            if(mausac == undefined){
                alert("Vui lòng chọn màu sắc cho sản phẩm trước!")
                return;
            }

            var url = $('.url_suagiohang').val() + 'sua-kich-thuoc/' + masanpham + '/' + mausac + '/' + kichthuoc + '/'

            $.get(url, function(data){
                if(data == 1){
                    location.reload()
                }else{
                    alert("Kích thước size " + kichthuoc + " không có sản phẩm nào!")
                }
            });
        });

        $('.qtybtn').click(function(e){
            var product = $(this).attr('class').split(' ')[0]
            var typ = product.split('-')[0]
            var masanpham = product.split('-')[2]
            var soluong = $('.number-'+masanpham).val()
            if(soluong == 0){
                alert("Số lượng phải lớn hơn 0!")
                $('.number-'+masanpham).val(1)
            }else{
                $.get($('.url_suagiohang').val() + 'sua-so-luong/' + masanpham + '/' + soluong + '/', function(data){
                    location.reload()
                });
            }
        })

        $('.remove_pro').click(function(e){
            var masanpham = $(this).attr('value')
            $.get($('.url_suagiohang').val() + 'xoa/' + masanpham + '/', function(data){
                location.reload()
            });
        })

        $('.sale-code').click(function(e){
            e.preventDefault()
            var magiamgia = $('.code_input').val()
            $.get($('.url_suagiohang').val() + 'ma-giam-gia/' + magiamgia + '/', function(data){
                if(data == true){
                    location.reload()
                }else{
                    $('.coupon-info').html(data)
                }
            });
        })

        $('.check-pay').click(function(e){
            $.get($('.url_suagiohang').val() + 'thanh-toan' + '/', function(data){
                if(data != true){
                    $('.error-pay').html(data)
                }else{
                    window.location.href = '<?php echo base_url('thanh-toan/'); ?>'
                }
            });
        })
    })
</script>