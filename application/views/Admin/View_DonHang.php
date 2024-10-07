<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Đơn Hàng</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Đơn Hàng</li>
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
                    <h4 class="card-title">Danh sách đơn hàng</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-sm-6">
                                <form method="GET" action="<?php echo base_url('admin/don-hang/tim-kiem/');?>" style="display: flex;">
                                    <input required type="text" class="form-control col-md-5" placeholder="Nhập mã đơn hàng" name="madonhang" value="<?php echo isset($_GET['madonhang']) ? $_GET['madonhang'] : ''; ?>">
                                    <button class="btn btn-primary col-md-2" type="submit" style="margin-left: 5px;">Tìm Kiếm</button>
                                </form>
                            </div>
                            <div class="col-sm-6 col-sm-6">
                                <div id="basic-datatable_filter" class="dataTables_filter" style="text-align: right;">
                                    <a class="btn btn-success" href="<?php echo base_url('admin/don-hang/'); ?>">Tất Cả Đơn Hàng</a>
                                    <a class="btn btn-light" href="<?php echo base_url('admin/don-hang/chua-duyet/'); ?>">Chưa Duyệt</a>
                                    <a class="btn btn-secondary" href="<?php echo base_url('admin/don-hang/dang-giao/'); ?>">Đang Giao</a>
                                    <a class="btn btn-info" href="<?php echo base_url('admin/don-hang/da-giao/'); ?>">Đã Giao</a>
                                </div>
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
                                                >Mã Đơn Hàng</th>
	                                            <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Tên Khách Hàng</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Thời Gian</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Số Lượng</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Thành Tiền</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Thanh Toán</th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Trạng Thái
                                                </th>
	                                            <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
	                                                colspan="1"
	                                                >Xem Chi Tiết
	                                            </th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Hành Động
                                                </th>
                                                <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Hủy Đơn
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list as $key => $value): ?>
                                    		<tr role="row" class="odd">

	                                            <td style="font-weight: bold; color: #346ee0;">ĐH00<?php echo $value['MaDonHang']; ?></td>
                                                <td><?php echo $value['TenKhachHang']; ?></td>
                                                <td><?php echo $value['ThoiGian']; ?></td>
                                                <td><?php echo $value['SoLuong']; ?> sản phẩm</td>
                                                <td><?php echo number_format($value['ThanhTien']); ?> đ</td>
                                                <td><?php echo $value['PhuongThucThanhToan'] == 1 ? "Chưa Thanh Toán" : "Đã Thanh Toán"; ?></td>
                                                <td>
                                                    <?php 
                                                        if($value['TrangThai'] == 1){
                                                            echo "Chưa được duyệt"; 
                                                        }else if ($value['TrangThai'] == 2) {
                                                            echo "Đang chuẩn bị hàng";
                                                        }else if ($value['TrangThai'] == 3) {
                                                            echo "Đang giao hàng";
                                                        }else if ($value['TrangThai'] == 4) {
                                                            echo "Đã giao hàng";
                                                        }else if ($value['TrangThai'] == 0) {
                                                            echo "Đã hủy đơn";
                                                        }else if ($value['TrangThai'] == -1) {
                                                            echo "Khách hàng hủy";
                                                        }
                                                    ?>
                                                </td>
                                                <td style="text-align: center;"><a href="<?php echo base_url('admin/don-hang/xem/'.$value['MaDonHang'].'/') ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-receipt"></i></a> </td>
                                                <td>
                                                    <?php if($value['TrangThai'] == 1){ ?>
                                                        <a class="btn btn-light" href="<?php echo base_url('admin/don-hang/hanh-dong/2/'.$value['MaDonHang'].'/'); ?>">Duyệt Đơn</a>
                                                    <?php }else if ($value['TrangThai'] == 2) { ?>
                                                        <a class="btn btn-secondary" href="<?php echo base_url('admin/don-hang/hanh-dong/3/'.$value['MaDonHang'].'/'); ?>">Giao Hàng</a>
                                                    <?php }else if ($value['TrangThai'] == 3) { ?>
                                                        <a class="btn btn-info" href="<?php echo base_url('admin/don-hang/hanh-dong/4/'.$value['MaDonHang'].'/'); ?>">Đã Hoàn Thành</a>
                                                    <?php }else if ($value['TrangThai'] == 4) { ?>
                                                        Không được phép
                                                    <?php } ?>
                                                </td>
                                                <?php if($value['TrangThai'] == 4){ ?>
                                                    <td>Không được phép</td>
                                                <?php }else{ ?>
	                                               <td style="text-align: center;"><a href="<?php echo base_url('admin/don-hang/them-thung-rac/'.$value['MaDonHang'].'/'); ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-basket"></i></a></td>
                                                <?php } ?>
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
                                       		<li style="margin-right: 5px;" class="paginate_button page-item"><a href="<?php echo base_url('admin/don-hang/trang/'.$i.'/') ?>"
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