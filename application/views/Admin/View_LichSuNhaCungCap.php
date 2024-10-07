<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Lịch Sử Nhà Cung Cấp</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/nha-cung-cap/'); ?>">Nhà Cung Cấp</a></li>
                            <li class="breadcrumb-item active">Lịch Sử</li>
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
                    <h4 class="card-title">Lịch sử nhà cung cấp</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                            	<div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Tên Nhà Cung Cấp</th>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Tên Sản Phẩm</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Màu Sắc</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Kích Thước</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Số Lượng Cũ</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Số Lượng Nhập</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Thời Gian Nhập</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($detail as $key => $value): ?>
                                                <tr role="row" class="odd">
                                                    <td><?php echo $value['TenNhaCungCap']; ?></td>
                                                    <td><?php echo $value['TenSanPham']; ?></td>
                                                    <td><?php echo $value['MauSac']; ?></td>
                                                    <td><?php echo $value['KichThuoc']; ?></td>
                                                    <td><?php echo $value['SoLuongCu']; ?> sản phẩm</td>
                                                    <td>+<?php echo $value['SoLuong']; ?> sản phẩm</td>
                                                    <td><?php echo $value['ThoiGian']; ?></td>
                                                </tr>
                                    	   <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>