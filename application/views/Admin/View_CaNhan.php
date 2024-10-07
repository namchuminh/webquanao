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
                    <h4 class="mb-0 font-size-18">Cá Nhân</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Cá Nhân</li>
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
                    <h4 class="card-title">Thông tin cá nhân quản trị viên</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align: center;">
                                        <?php if(!empty($detail[0]['AnhChinh'])){ ?>
                                            <img id="anhchinhload" src="<?php echo $detail[0]['AnhChinh']; ?>" style="width: 120px; height: 120px;">
                                            <br>
                                            <br>
                                        <?php }else{ ?>
                                            <img id="anhchinhload" style="width: 120px; height: 120px;">
                                            <br>
                                            <br>
                                        <?php } ?>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data">
                                        <?php if(!empty($detail[0]['TenNhanVien'])){ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Họ Tên</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Họ tên..." required name="hoten" value="<?php echo $detail[0]['TenNhanVien']; ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Họ Tên</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Họ tên..." required name="hoten">
                                            </div>
                                        <?php } ?>
                                        
                                        <?php if(!empty($detail[0]['SoDienThoai'])){ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Số Điện Thoại</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Số điện thoại..." required name="sodienthoai" value="<?php echo $detail[0]['SoDienThoai']; ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Số Điện Thoại</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Số điện thoại..." required name="sodienthoai">
                                            </div>
                                        <?php } ?>

                                        <?php if(!empty($detail[0]['Email'])){ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Email</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Nhập email..." required name="email" value="<?php echo $detail[0]['Email']; ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Email</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Nhập email..." required name="email">
                                            </div>
                                        <?php } ?>
                                        

                                        <?php if(!empty($detail[0]['DiaChi'])){ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Địa Chỉ</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Địa chỉ..." required name="diachi" value="<?php echo $detail[0]['DiaChi']; ?>">
                                            </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Địa Chỉ</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Địa chỉ..." required name="diachi">
                                            </div>
                                        <?php } ?>


                                        <?php if(!empty($detail[0]['AnhChinh'])){ ?>
                                            <div class="form-group">
                                                <label>Ảnh Chính</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="anhchinh" id="customFile" onchange="loadFile(event, 'anhchinhload')">
                                                    <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                                                </div>
                                            </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                                <label>Ảnh Chính</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="anhchinh" id="customFile" onchange="loadFile(event, 'anhchinhload')">
                                                    <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if(!empty($detail[0]['TaiKhoan'])){ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Tên Đăng Nhập</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Tên đăng nhập..." name="taikhoan" value="<?php echo $detail[0]['TaiKhoan']; ?>"disabled>
                                            </div>
                                        <?php }else{ ?>
                                            <div class="form-group">
                                                <label for="simpleinput">Tên Đăng Nhập</label>
                                                <input type="text" id="simpleinput" class="form-control" placeholder="Tên đăng nhập..." name="taikhoan" disabled>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label for="simpleinput">Mật Khẩu</label>
                                            <input type="password" id="simpleinput" class="form-control" placeholder="Nhập mật khẩu mới..." name="matkhau">
                                        </div>

                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật Thông Tin</button>
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
    var loadFile = function(event, idLoad) {
        var output = document.getElementById(idLoad);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
    };

    $(document).ready(function(){
        $('.close').click(function(){
            $(".toast").attr("style", "display: none;")
        })
    });
</script>
<?php require(__DIR__.'/layouts/footer.php'); ?>