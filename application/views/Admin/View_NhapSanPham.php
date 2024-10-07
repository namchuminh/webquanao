<?php require(__DIR__.'/layouts/header.php'); ?>

<?php if(isset($error) && !empty($error)){ ?>
<div style="position: fixed; top: 72px; z-index: 100000; right: 11px;opacity: 1;" class="toast fade show">
    <div class="toast-header">
        <strong class="mr-auto">Thông Báo</strong>
        <small>Có Lỗi Khi Thêm</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true" class="thoat">×</span>
        </button>
    </div>
    <div class="toast-body">
        <?php echo $error; ?>
    </div>
</div>
<?php } ?>

<?php if(isset($success) && !empty($success)){ ?>
<div style="position: fixed; top: 72px; z-index: 100000; right: 11px; opacity: 1;" class="toast">
    <div class="toast-header">
        <strong class="mr-auto">Thông Báo</strong>
        <small>Thành Công</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true" class="thoat">×</span>
        </button>
    </div>
    <div class="toast-body">
        <?php echo $success; ?>
    </div>
</div>
<?php } ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Sản Phẩm</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/san-pham/'); ?>">Sản Phẩm</a></li>
                            <li class="breadcrumb-item active">Nhập Sản Phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
</div> 


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nhập sản phẩm vào kho</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="simpleinput">Tên Sản Phẩm</label>
                                            <input type="text" id="simpleinput" class="form-control tensanpham" placeholder="Tên sản phẩm" required value="<?php echo $detail[0]['TenSanPham']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="duongdan">Số Lượng Hiện Tại</label>
                                            <input type="text" id="duongdan" class="form-control" placeholder="Số lượng..." required value="<?php echo $this->Model_SanPham->getAllNumberById($detail[0]['MaSanPham'])[0]['TongSoLuong'] == NULL ? "0" : $this->Model_SanPham->getAllNumberById($detail[0]['MaSanPham'])[0]['TongSoLuong'] ?> sản phẩm" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="duongdan">Danh Mục</label>
                                            <input type="text" id="duongdan" class="form-control" placeholder="Chuyên mục.." required value="<?php echo $detail[0]['TenChuyenMuc']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Nhà Cung Cấp</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="nhacungcap">
                                                <?php foreach ($provide as $key => $value): ?>
                                                    <?php if($detail[0]['MaNhaCungCap'] == $value['MaNhaCungCap']){ ?>
                                                        <option value="<?php echo $value['MaNhaCungCap']; ?>" selected><?php echo $value['TenNhaCungCap']; ?></option>       
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $value['MaNhaCungCap']; ?>"><?php echo $value['TenNhaCungCap']; ?></option>
                                                    <?php } ?>
                                                <?php endforeach ?>
                                                <option value="">Khác</option>
                                            </select>
                                        </div>
                                        <?php 
                                            $tenmausac = [
                                                'blue' => "Xanh",
                                                'red' => "Đỏ",
                                                'black' => "Đen",
                                                'white' => "Trắng",
                                                'yellow' => "Vàng",
                                                'pink' => "Hồng"
                                            ];
                                         ?>
                                        <div class="form-group">
                                            <label for="duongdan">Màu Sắc</label>
                                            <select name="mausac" required class="form-control" id="exampleFormControlSelect1">
                                                <option hidden value="">--Chọn Màu--</option>
                                                <?php foreach ($color as $key => $value): ?>
                                                    <option value="<?php echo $value['MaMauSac']; ?>"><?php echo $tenmausac[$value['TenMauSac']]; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="duongdan">Kích Thước</label>
                                            <select name="kichthuoc" required class="form-control" id="exampleFormControlSelect1">
                                                <option hidden value="">--Chọn Kích Thước--</option>
                                                <option value="XS">Size - XS</option>
                                                <option value="S">Size - S</option>
                                                <option value="M">Size - M</option>
                                                <option value="L">Size - L</option>
                                                <option value="XL">Size - XL</option>
                                                <option value="XXL">Size - XXL</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="soluong">Số Lượng Nhập</label>
                                            <input type="number" id="soluong" class="form-control" placeholder="Số lượng sản phẩm nhập..." min="1" required name="soluong">
                                        </div>

                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Nhập Sản Phẩm</button>
                                    </form>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card -->

                        </div>
                        </div>
                        
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.close').click(function(){
            $(".toast").attr("style", "display: none;")
        })
    });
</script>
<?php require(__DIR__.'/layouts/footer.php'); ?>