<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1>Đơn Hàng: ĐH00<?php echo $id; ?></h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('khach-hang/'); ?>" style="font-family: system-ui;">Khách Hàng</a></li>
                    <li><a style="font-family: system-ui;">Đơn Hàng</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>
<div class="page-section section section-padding">
    <div class="container">
        <form>               
            <div class="row">
                <div class="col-12">
                    <div class="cart-table table-responsive">
                        <table>
                            <thead style="font-family: system-ui;">
                                <tr>
                                    <th class="pro-remove">STT</th>
                                    <th class="pro-thumbnail">Hình Ảnh</th>
                                    <th class="pro-title">Tên Sản Phẩm</th>
                                    <th class="pro-price">Màu Sắc</th>
                                    <th class="pro-price">Kích Thước</th>
                                    <th class="pro-price">Giá Bán</th>
                                    <th class="pro-quantity">Số Lượng</th>
                                    <th class="pro-subtotal">Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody style="font-family: system-ui; font-size: 16px;">
                                <?php $tongdon = 0; ?>
                                <?php foreach ($list as $key => $value): ?>
                                    <?php $tongdon +=  $value['SoLuong'] * $value['GiaBan']; ?>
                                    <tr>
                                        <td class="pro-remove">
                                            <?php echo $key + 1; ?>
                                        </td>
                                        <td class="pro-thumbnail">
                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>" style="font-family: system-ui;">
                                                <img style="width: 100px; height: 100px;" src="<?php echo $value['anhsanpham']; ?>" alt="">
                                            </a>
                                        </td>
                                        <td class="pro-title">
                                            <a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>" style="font-family: system-ui;"><?php echo $value['TenSanPham']; ?></a>
                                        </td>
                                        <td class="pro-quantity">
                                            <?php echo $value['MauSac']; ?>
                                        </td><td class="pro-quantity">
                                            Size - <?php echo $value['KichThuoc']; ?>
                                        </td>
                                        <td class="pro-price">
                                            <?php echo number_format($value['GiaBan']); ?>đ
                                        </td>
                                        <td class="pro-add-cart">
                                            <?php echo $value['SoLuong']; ?> sản phẩm
                                        </td>
                                        <td class="pro-add-cart">
                                            <?php echo number_format($value['GiaBan'] * $value['SoLuong']); ?>đ
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
        <div class="row mt-40">
            <div class="col-lg-8 col-md-7 col-12">
                <div class="cart-buttons mb-30">
                    <a href="<?php echo base_url('khach-hang/'); ?>" style="font-family: system-ui;">Quay Lại</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-12">
                <div class="cart-total fix">
                    <h3>Tổng Đơn Hàng</h3>
                    <table>
                        <tbody>
                            <tr class="cart-subtotal">
                                <th style="text-transform: unset;">Tổng đơn</th>
                                <td>
                                    <span class="amount">
                                        <?php
                                            if($tongdon != 0){
                                                echo number_format($tongdon);
                                            }else{
                                                echo $tongdon;
                                            }
                                        ?>đ
                                    </span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th style="text-transform: unset;">Mã giảm giá</th>
                                <td><span class="amount">
                                    <?php if(count($list) != 0){ ?>
                                        <?php if($list[0]['GiamGia'] != 0){ ?>
                                            - <?php echo number_format($list[0]['GiamGia']); ?>đ
                                        <?php }else{ ?>
                                            <?php echo '0đ'; ?>
                                        <?php } ?>
                                    <?php }else{ ?>
                                        0đ
                                    <?php } ?>
                                </span></td>
                            </tr>
                            <tr class="order-total">
                                <th style="text-transform: unset;">Tổng Tiền</th>
                                <td>
                                    <strong>
                                        <span class="amount" >
                                            <?php if(count($list) != 0){ ?>
                                                <?php echo number_format($tongdon - $list[0]['GiamGia']); ?>đ
                                            <?php }else{ ?>
                                                0đ
                                            <?php } ?>
                                        </span>
                                    </strong>
                                </td>
                            </tr>                                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>
