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
                    <h4 class="mb-0 font-size-18">Mã Giảm Giá</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/ma-giam-gia/'); ?>">Mã Giảm Giá</a></li>
                            <li class="breadcrumb-item active">Thêm Mã Giảm Giá</li>
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
                    <h4 class="card-title">Nhập thông tin mã giảm giá</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="simpleinput">Mã Sử Dụng</label>
                                            <input type="text" id="simpleinput" class="form-control tensanpham" placeholder="Mã sử dụng trên website..." required name="masudung">
                                        </div>

                                        <div class="form-group">
                                            <label for="trigia">Trị Giá (VNĐ)</label>
                                            <input type="text" id="trigia" class="form-control" placeholder="Ví dụ: 100000" required name="trigia">
                                        </div>

                                        <div class="form-group">
                                            <label for="solandung">Số Lần Dùng</label>
                                            <input type="number" min="1" id="solandung" class="form-control" placeholder="Số lần sử dụng tối đa..." required name="soluong">
                                        </div>

                                        <div class="form-group">
                                            <label for="hsd">Ngày Hết Hạn</label>
                                            <input type="date" id="hsd" class="form-control" placeholder="Hạn sử dụng.." required name="ngayhethan">
                                        </div>

                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm Mã Giảm Giá</button>
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