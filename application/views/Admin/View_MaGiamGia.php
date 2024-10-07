<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Mã Giảm Giá</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Mã Giảm Giá</li>
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
                    <h4 class="card-title">Danh sách mã giảm giá</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                            	<div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Mã Sử Dụng</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Giá Trị</th>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Ngày Tạo</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Ngày Hết Hạn</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Đã Dùng</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Tối Đa</th>
	                                            <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Cập Nhật
	                                            </th>
	                                            <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Thùng Rác
	                                            </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list as $key => $value): ?>
                                                <?php if($value['TrangThai'] != 0){ ?>
                                            		<tr role="row" class="odd">
        	                                            <td style="font-weight: bold; color: #346ee0;"><?php echo $value['MaSuDung']; ?></td>
                                                        <td><?php echo number_format($value['TriGia']); ?> đ</td>
                                                        <td><?php echo $value['NgayTao']; ?></td>
                                                        <td><?php echo $value['NgayHetHan']; ?></td>
                                                        <td><?php echo $value['SoLanDung']; ?> lần</td>
                                                        <td><?php echo $value['SoLuong']; ?> lần</td>
        	                                            <td style="text-align: center;"><a href="<?php echo base_url('admin/ma-giam-gia/sua/'.$value['MaGiamGia'].'/') ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-detail"></i></a> </td>

        	                                            <td style="text-align: center;"><a href="<?php echo base_url('admin/ma-giam-gia/them-thung-rac/'.$value['MaGiamGia'].'/'); ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-trash-alt"></i></a></td>
        	                                        </tr>
                                                <?php } ?>
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