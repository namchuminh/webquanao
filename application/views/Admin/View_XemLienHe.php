<?php require(__DIR__.'/layouts/header.php'); ?>
<style type="text/css">
    .form-control:disabled, .form-control[readonly]{
        background-color: white;
        opacity: 1;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Liên hệ</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/lien-he/'); ?>">Liên Hệ</a></li>
                            <li class="breadcrumb-item active">Xem Chi Tiết</li>
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
                    <h4 class="card-title">Thông tin liên hệ chi tiết</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="simpleinput">Tên Khách Hàng</label>
                                            <input type="text" id="simpleinput" class="form-control" value="<?php echo $detail[0]['TenKhachHang']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="simpleinput">Số Điện Thoại</label>
                                            <input type="text" id="simpleinput" class="form-control" value="<?php echo $detail[0]['SoDienThoai']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="simpleinput">Thời Gian</label>
                                            <input type="date" id="simpleinput" class="form-control" value="<?php echo explode(" ",$detail[0]['ThoiGian'])[0]; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="simpleinput">Tiêu Đề</label>
                                            <input type="text" id="simpleinput" class="form-control" value="<?php echo $detail[0]['TieuDe']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="simpleinput">Nội Dung</label>
                                            <textarea id="simpleinput" class="form-control" rows="10" disabled><?php echo $detail[0]['NoiDung']; ?></textarea>
                                        </div>

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