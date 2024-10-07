<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Nhà Cung Cấp</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Nhà Cung Cấp</li>
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
                    <h4 class="card-title">Danh sách nhà cung cấp</h4>
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
	                                                >Mô Tả</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Danh Mục</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Trạng Thái</th>
                                                <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Lịch Sử
                                                </th>
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
        	                                            <td style="white-space: unset;"><a style="font-weight: bold;" href="<?php echo base_url('admin/nha-cung-cap/sua/'.$value['MaNhaCungCap'].'/') ?>"><?php echo $value['TenNhaCungCap']; ?></a></td>

        	                                            <td><?php echo $value['MoTa']; ?></td>
                                                        <td><?php echo $value['TenChuyenMuc']; ?></td>
                                                        <td>
                                                            <?php 
                                                                if($value['TrangThai'] == 1){
                                                                    echo "Đang Cung Cấp";
                                                                }else if($value['TrangThai'] == 2){
                                                                    echo "Ngừng Cung Cấp";
                                                                } 
                                                            ?>
                                                        </td>

                                                        <td style="text-align: center;"><a href="<?php echo base_url('admin/nha-cung-cap/lich-su/'.$value['MaNhaCungCap'].'/') ?>"><i style="font-size: 24px; color: #393f4e;" class="bx bx-list-check"></i></a> </td>

        	                                            <td style="text-align: center;"><a href="<?php echo base_url('admin/nha-cung-cap/sua/'.$value['MaNhaCungCap'].'/') ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-detail"></i></a> </td>

        	                                            <td style="text-align: center;"><a href="<?php echo base_url('admin/nha-cung-cap/them-thung-rac/'.$value['MaNhaCungCap'].'/'); ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-trash-alt"></i></a></td>
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