<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Giao Diện</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Giao Diện</li>
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
                    <h4 class="card-title">Danh sách giao diện</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                            	<div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Hình Ảnh</th>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Danh Mục</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Thể Loại</th>
                                                <th tabindex="0" style="text-align: center;" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Cập Nhật</th>
	                                            <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Xóa
	                                            </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list as $key => $value): ?>
                                                <tr role="row" class="odd">
                                                    <td style="white-space: unset; max-width: 80px;"><img style="image-rendering: optimizeQuality;" src="<?php echo $value['HinhAnh']; ?>" width="100%" height="120"></td>
                                                    <td style="color: #346ee0; font-weight: bold;">
                                                        <?php 
                                                            if(empty($value['TenChuyenMuc'])){
                                                                echo "Không chọn";
                                                            }else{
                                                                echo $value['TenChuyenMuc']; 
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if($value['TheLoai'] == 1){
                                                                echo "Slide"; 
                                                            }else if($value['TheLoai'] == 2){
                                                                echo "Banner 1"; 
                                                            }else if($value['TheLoai'] == 3){
                                                                echo "Banner 2"; 
                                                            }
                                                        ?>
                                                    </td>
                                                    <td style="text-align: center;"><a href="<?php echo base_url('admin/giao-dien/sua/'.$value['MaGiaoDien'].'/'); ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-detail"></i></a></td>
                                                    <td style="text-align: center;"><a href="<?php echo base_url('admin/giao-dien/xoa/'.$value['MaGiaoDien'].'/'); ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-trash-alt"></i></a></td>
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