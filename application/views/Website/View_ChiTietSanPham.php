<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-banner-section section">
    <div class="container">
        <div class="row">
            <div class="page-banner-content col">

                <h1><?php echo $detail[0]['TenSanPham']; ?></h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>" style="font-family: system-ui;">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('san-pham'); ?>" style="font-family: system-ui;">Sản Phẩm</a></li>
                    <li><a style="font-family: system-ui;"><?php echo $detail[0]['TenSanPham']; ?></a></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="page-section section section-padding">
        <div class="container">
            <div class="row row-30 mbn-40">

                <div class="col-xl-9 col-lg-8 col-12 order-1 order-lg-2 mb-40">
                    <div class="row row-20">

                        <div class="col-lg-6 col-12 mb-40">

                            <div class="pro-large-img mb-10 fix easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                <a style="height: 420px" href="<?php echo $detail[0]['duongdananh']; ?>">
                                    <img style="height: 100%;" src="<?php echo $detail[0]['duongdananh']; ?>" alt=""/>
                                </a>
                            </div>
                            <!-- Single Product Thumbnail Slider -->
                            <ul id="pro-thumb-img" class="pro-thumb-img">
                                <li><a style="height: 100px;" href="<?php echo $detail[0]['duongdananh']; ?>" data-standard="<?php echo $detail[0]['duongdananh']; ?>"><img style="height: 100%;" src="<?php echo $detail[0]['duongdananh']; ?>" alt="" /></a></li>
                                <li><a style="height: 100px;" href="<?php echo $detail[1]['duongdananh']; ?>" data-standard="<?php echo $detail[1]['duongdananh']; ?>"><img style="height: 100%;" src="<?php echo $detail[1]['duongdananh']; ?>" alt="" /></a></li>
                                <li><a style="height: 100px;" href="<?php echo $detail[2]['duongdananh']; ?>" data-standard="<?php echo $detail[2]['duongdananh']; ?>"><img style="height: 100%;" src="<?php echo $detail[2]['duongdananh']; ?>" alt="" /></a></li>
                                <li><a style="height: 100px;" href="<?php echo $detail[3]['duongdananh']; ?>" data-standard="<?php echo $detail[3]['duongdananh']; ?>"><img style="height: 100%;" src="<?php echo $detail[3]['duongdananh']; ?>" alt="" /></a></li>
   
                            </ul>
                        </div>

                        <div class="col-lg-6 col-12 mb-40">
                            <div class="single-product-content">

                                <div class="head">
                                    <div class="head-left">

                                        <h3 class="title"><?php echo $detail[0]['TenSanPham']; ?></h3>
<!-- 
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div> -->

                                    </div>

                                    <div class="head-right">
                                        <span class="price"><?php echo number_format($detail[0]['GiaBan']); ?>đ</span>
                                    </div>
                                </div>

                                <div class="description">
                                    <p><?php echo $detail[0]['MoTaNgan']; ?></p>
                                </div>

                                <span class="availability">Trạng Thái: <span>
                                    <?php if($this->Model_SanPham->getAllNumberById($detail[0]['MaSanPham'])[0]['TongSoLuong'] == NULL){ ?>
                                        Hết hàng!
                                    <?php }else{ ?>
                                        Còn <?php echo $this->Model_SanPham->getAllNumberById($detail[0]['MaSanPham'])[0]['TongSoLuong']; ?> sản phẩm
                                    <?php } ?>
                                </span></span>

                                <?php if($this->Model_SanPham->getAllNumberById($detail[0]['MaSanPham'])[0]['TongSoLuong'] == NULL){ ?>
                                    <div class="quantity-colors">
                                        <div class="quantity">
                                            <h5>Số Lượng:</h5>
                                            <div class="pro-qty"><input type="number" class="soluong" value="0" max="0" disabled></div>
                                        </div>                            
                                    </div>
                                    <div class="quantity-colors">
                                        <div class="colors" style="width: 100%;">
                                            <h5>Màu Sắc:</h5>
                                            <ul class="sidebar-list d-flex" style="margin-top: -5px;">
                                                <?php foreach ($color as $key => $value): ?>
                                                    <li>
                                                        <a>
                                                            <span class="color" style="border: 1px solid #d8d8d8;width: 30px; height: 30px;background-color: #ffffff;"></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                            <p class="error-cart"></p>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <button class="them-gio-hang-ct" disabled>
                                            <i class="ti-shopping-cart"></i>
                                            <span style="text-decoration: line-through;">THÊM GIỎ HÀNG</span>
                                        </button>
                                        <button class="box" data-tooltip="Wishlist"><i class="ti-heart"></i></button>
                                    </div>
                                <?php }else{ ?>
                                    <div class="quantity-colors">
                                        <div class="quantity">
                                            <h5>Số Lượng:</h5>
                                            <div class="pro-qty"><input type="text" class="soluong" value="1"></div>
                                        </div>            
                                    </div>
                                    <p class="error-cart-number"></p>    
                                    <div class="quantity-colors">
                                        <div class="colors" style="width: 100%;">
                                            <h5>Màu Sắc:</h5>
                                            <ul class="sidebar-list d-flex" style="margin-top: -5px;">
                                                <?php foreach ($color as $key => $value): ?>
                                                    <li>
                                                        <a>
                                                            <span value="<?php echo $value['MaHienThi']; ?>" class="color" style="border: 1px solid #d8d8d8;width: 30px; height: 30px;background-color: <?php echo $value['MaHienThi']; ?>;"></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                            <p class="error-cart"></p>
                                        </div>
                                    </div>
                                    <div class="quantity-colors size-list d-none" style="margin-top: -15px;">
                                        <div class="colors" style="width: 100%;">
                                            <h5>Kích Thước:</h5>
                                            <ul class="sidebar-list d-flex list_size" style="gap: 5px;">
                                                
                                            </ul>
                                            <p class="error-cart-size"></p>
                                        </div>                           
                                    </div>
                                    <div class="actions">
                                        <button class="them-gio-hang-ct">
                                            <i class="ti-shopping-cart"></i>
                                            <span>THÊM GIỎ HÀNG</span>
                                        </button>
                                        <button class="box" data-tooltip="Wishlist"><i class="ti-heart"></i></button>
                                    </div>
                                <?php } ?>

                                

                                <div class="tags">
                                    <h5>Thẻ:</h5>
                                    <?php $tag = explode(',',$detail[0]['The']); ?>
                                    <?php foreach ($tag as $key => $value): ?>
                                        <a><?php echo $value; ?></a>
                                    <?php endforeach ?>
                                </div>

                                <div class="share">

                                    <h5>Share: </h5>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row mb-50">
                        <!-- Nav tabs -->
                        <div class="col-12">
                            <ul class="pro-info-tab-list section nav">
                                <li><a class="active" href="#more-info" data-bs-toggle="tab">THÔNG TIN MÔ TẢ</a></li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content col-12">
                            <div class="pro-info-tab tab-pane active" id="more-info">
                                <?php echo $detail[0]['MoTaDai']; ?>
                            </div>
                        </div>
                    </div>
                    <?php if(count($suggestProduct) >=3 ){ ?>
                        <div class="section-title text-start mb-30">
                            <h3 style="font-weight: 500;">Sản Phẩm Đề Xuất</h3>
                        </div>
                    <?php } ?>

                    <div class="related-product-slider related-product-slider-2 slick-space p-0">
                        <?php if(count($suggestProduct) >=3 ){ ?>
                            <?php foreach ($suggestProduct as $key => $value): ?>
                                <div class="slick-slide">
                                    <div class="product-item">
                                        <div class="product-inner">
                                            <div class="image" style="height: 320px;">
                                                <img style="height: 100%;" src="<?php echo $value['duongdananh']; ?>" alt="">
                                                <div class="image-overlay">
                                                    <div class="action-buttons">
                                                        <button>
                                                            <a style="color: unset;" class="them-gio-hang" value="<?php echo base_url('gio-hang/them/'.$value['MaSanPham'].'/1/'); ?>">THÊM GIỎ HÀNG
                                                            </a>
                                                        </button>
                                                        <button>YÊU THÍCH</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h4 class="title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></h4>
                                                    <!-- <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div> -->
                                                    <h5 class="size">Giá Gốc: <span style="text-decoration: line-through;" class="price"><?php echo number_format($value['GiaGoc']); ?>đ</span></h5>
                                                    <h5 class="size">Giá Bán: <span class="price"><?php echo number_format($value['GiaBan']); ?>đ</span>
                                                    </h5>
                                                </div>
                                                <div class="content-right">
                                                    <span class="price" style="font-size: 16px;">-<?php echo number_format((($value['GiaGoc'] - $value['GiaBan']) / $value['GiaGoc']) * 100,1); ?>%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php } ?>
                    </div>
                    <br>
                    <hr/>
                    <?php if(count($related) != 0){ ?>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="section-title text-start mb-30">
                                <h3 style="font-weight: 500;">Sản Phẩm Cùng Loại</h3>
                            </div>
                            <div class="small-product-slider row row-12 mbn-40 col-12">
                                <?php foreach ($related as $key => $value): ?>
                                    <div class="col mb-40">
                                        <div class="on-sale-product">
                                            <a style="height: 165px;" href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>" class="image"><img style="height: 100%;" src="<?php echo $value['duongdananh']; ?>" alt="Image"></a>
                                            <div class="content text-center">
                                                <h4 class="title"><a href="<?php echo base_url('san-pham/'.$value['DuongDan'].'/'); ?>"><?php echo $value['TenSanPham']; ?></a></h4>
                                                <span class="price"><?php echo number_format($value['GiaBan']); ?>đ <span class="old"><?php echo number_format($value['GiaGoc']); ?>đ</span></span>
                                                <!-- <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php } ?>

                </div>

                <div class="col-xl-3 col-lg-4 col-12 order-2 order-lg-1 mb-40">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Tìm Kiếm</h3>
                        <div class="sidebar-product-wrap">
                            <form action="<?php echo base_url('tim-kiem/') ?>">
                                <input name="s" required="" type="text" placeholder="Nhập tên sản phẩm..." style="border: none; width: 100%;">
                            </form>
                        </div>
                    </div>

                    <div class="sidebar">
                        <h4 class="sidebar-title">DANH MỤC</h4>
                        <ul class="sidebar-list">
                            <?php foreach ($category as $key => $value): ?>
                                <li><a href="<?php echo base_url('chuyen-muc/'.$value['DuongDan'].'/'); ?>" style="font-family: system-ui;"><?php echo $value['tenChuyenMuc']; ?> <span class="num"><?php echo $value['soLuongSanPham']; ?></span></a></li>
                            <?php endforeach ?>
                        </ul>
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
    <?php if($this->Model_SanPham->getAllNumberById($detail[0]['MaSanPham'])[0]['TongSoLuong'] != NULL){ ?>
        <input type="hidden" class="url_giohang" value="<?php echo base_url('gio-hang/them-chi-tiet/'.$detail[0]['MaSanPham'].'/'); ?>">
        <input type="hidden" class="mausac" value="">
        <input type="hidden" class="kichthuoc" value="">
    <?php } ?>
    
<style type="text/css">
    #more-info img{
        width: 100%;
    }
    .size-product{
        padding: 5px;
        padding-right: 5px;
        padding-left: 5px;
        border: 1px solid #adadad;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        background: #fdfdfd;
    }
    .no-size{
        padding: 5px;
        padding-right: 5px;
        padding-left: 5px;
        text-align: center;
        cursor: no-drop;
        color: #bcbcbc;
        text-decoration: line-through;
        border: 1px solid #f3f3f3;
        border-radius: 5px;
    }
</style>
<?php require(__DIR__.'/layouts/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        var color = ""
        var masanpham = "<?php echo $detail[0]['MaSanPham']; ?>"
        $(".color").click(function(e){
            color = $(this).attr("value")
            $('.mausac').val(color)
            $('.size-list').removeClass("d-none")
            $('.error-cart').html("")
            $.post("<?php echo base_url('lay-so-luong/'); ?>", {masanpham, tenmausac: color}, function(data){
                var data = JSON.parse(data)
                var size = [];
                for (var i = 0; i < data.length; i++) {
                    size.push(data[i].TenKichThuoc);
                }

                var list_size = ["XS","S","M","L","XL","XXL"]
                $(".list_size").empty();
                for (var i = 0; i < list_size.length; i++) {
                    if(size.includes(list_size[i])){
                        $(".list_size").append('<li class="size-item size-product" value='+list_size[i]+'>'+ list_size[i] +' </li>')
                    }else{
                        $(".list_size").append('<li class="no-size">'+ list_size[i] +' </li>')
                    }
                }

                $(".list_size li:last-child").attr("style", "margin-bottom: auto;");

                $(".size-item").click(function(){
                    $('.error-cart-size').html("")
                    $('.kichthuoc').val($(this).attr("value"))
                })

            });

        })
        $(".them-gio-hang-ct").click(function(e){
            if($('.soluong').val() == "" || $('.soluong').val() == 0){
                $('.error-cart').html("Số Lượng Sản Phẩm Phải Lớn Hơn 0!")
                return
            }
            if($('.mausac').val() == ""){
                $('.error-cart').html("Vui Lòng Chọn Màu Sắc Sản Phẩm!")
                return
            }

            if($('.kichthuoc').val() == ""){
                $('.error-cart').html("")
                $('.error-cart-size').html("Vui Lòng Chọn Kích Thước Sản Phẩm!")
                return
            }

            var url = $('.url_giohang').val() + $('.soluong').val() + '/' + $('.mausac').val() + '/' + $('.kichthuoc').val() + '/'

            $.get(url, function(data){
                if(data == "number_limit"){
                    $('.error-cart-number').html("Số Lượng Vượt Quá Số Lượng Trong Kho")
                    return
                }else{
                    var data = JSON.parse(data)
                    $('.cart-info').html('(' + data.numberCart + ') ' + data.sumCart + 'đ')
                    $('.error-cart-number').html("")
                    $('.error-cart-size').html("Đã Thêm Sản Phẩm Vào Giỏ Hàng!")
                }
                
            });

        });
    })
</script>