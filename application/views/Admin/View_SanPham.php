<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Sản Phẩm</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Sản Phẩm</li>
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
                    <h4 class="card-title">Danh sách sản phẩm</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">

                            <div class="col-sm-12">
                                <div id="basic-datatable_filter" class="dataTables_filter" style="text-align: left;"><label>Tìm kiếm:<input
                                            type="search" class="form-control form-control-sm" placeholder="Tên sản phẩm"
                                            aria-controls="basic-datatable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            	<div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th tabindex="0" aria-controls="basic-datatable"
                                                rowspan="1" colspan="1"
                                                >Hình Ảnh</th>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Tên Sản Phẩm</th>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Giá Gốc</th>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Giá Bán
	                                            </th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Tổng Số
                                                </th>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Danh Mục
	                                            </th>
                                                <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Nhập Hàng
                                                </th>
                                                <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Số Lượng
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
                                    		<tr role="row" class="odd">
	                                            <td style="white-space: unset; width: 100px"><img style="image-rendering: optimizeQuality;" src="<?php echo $value['duongdananh']; ?>" width="100" height="100"></td>
	                                            <td style="white-space: unset; max-width: 150px"><a style="font-weight: bold;" href="<?php echo base_url('admin/san-pham/sua/'.$value['MaSanPham'].'/') ?>"><?php echo $value['TenSanPham']; ?></a></td>
	                                            <td><?php echo number_format($value['GiaGoc']); ?> đ</td>
	                                            <td><?php echo number_format($value['GiaBan']); ?> đ</td>
                                                <td>
                                                    <?php if($this->Model_SanPham->getAllNumberById($value['MaSanPham'])[0]['TongSoLuong'] == NULL){ ?>
                                                        0 sản phẩm
                                                    <?php }else{ ?>
                                                        <?php echo $this->Model_SanPham->getAllNumberById($value['MaSanPham'])[0]['TongSoLuong']; ?> sản phẩm
                                                    <?php } ?>
                                                </td>
	                                            <td><?php echo $value['TenChuyenMuc']; ?></td>
                                                <td style="text-align: center;"><a href="<?php echo base_url('admin/san-pham/nhap/'.$value['MaSanPham'].'/') ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-add-to-queue"></i></a> </td>
                                                <td style="text-align: center;"><a href="<?php echo base_url('admin/san-pham/so-luong/'.$value['MaSanPham'].'/') ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-file"></i></a> </td>
	                                            <td style="text-align: center;"><a href="<?php echo base_url('admin/san-pham/sua/'.$value['MaSanPham'].'/') ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-detail"></i></a> </td>
	                                            <td style="text-align: center;"><a href="<?php echo base_url('admin/san-pham/them-thung-rac/'.$value['MaSanPham'].'/'); ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-trash-alt"></i></a></td>
	                                        </tr>
                                    	<?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="dataTables_paginate paging_simple_numbers" id="basic-datatable_paginate">
                                    <ul class="pagination pagination-rounded">
                                        <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                                       		<li style="margin-right: 5px;" class="paginate_button page-item"><a href="<?php echo base_url('admin/san-pham/trang/'.$i.'/') ?>"
                                                class="page-link"><?php echo $i; ?></a></li>
                                        <?php } ?>           
                                    </ul>
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