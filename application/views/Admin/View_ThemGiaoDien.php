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
                    <h4 class="mb-0 font-size-18">Giao Diện</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/giao-dien/'); ?>">Giao Diện</a></li>
                            <li class="breadcrumb-item active">Thêm Giao Diện</li>
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
                    <h4 class="card-title">Nhập thông tin giao diện</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Chuyên Mục</label>
                                            <select name="chuyenmuc" class="form-control" id="exampleFormControlSelect1">
                                                <?php foreach ($category as $key => $value): ?>
                                                    <option value="<?php echo $value['MaChuyenMuc']; ?>" selected><?php echo $value['TenChuyenMuc']; ?></option>
                                                <?php endforeach ?>
                                                <option value="">Không Chọn</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Thể Loại</label>
                                            <select name="theloai" required class="form-control theloai" id="exampleFormControlSelect1">
                                                <option value="1">Slide</option>
                                                <option value="2">Banner 1</option>
                                                <option value="3">Banner 2</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Hình Ảnh</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" required name="hinhanh" id="customFile" onchange="loadFile(event, 'anhchinhload')">
                                                <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                                                <label class="mx-1 mt-1 kichthuoc" style="color: black; font-weight: normal;">*Kích thước 1920x752</label>
                                            </div>
                                            <br> 
                                            <img id="anhchinhload" style="width: 100%; height: 500px;" class="hinhanh">    
                                        </div>

                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm Giao Diện</button>
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

        
        $('.theloai').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            if(valueSelected == 1){
                $('.kichthuoc').html('*Kích thước 1920x700')
                $('.hinhanh').attr('style', "width: 100%; height: 500px;")
            }else if(valueSelected == 2){
                $('.kichthuoc').html('*Kích thước 560x315')
                $('.hinhanh').attr('style', "width: 400px; height: 215px;")
            }else if(valueSelected == 3){
                $('.kichthuoc').html('*Kích thước 635x402')
                $('.hinhanh').attr('style', "width: 500px; height: 280px;")
            }
        });
    });
</script>
<?php require(__DIR__.'/layouts/footer.php'); ?>