<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Thùng Rác Đơn Hàng</h4>
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
                            <div class="col-sm-12 col-sm-6">
                                <div id="basic-datatable_filter" class="dataTables_filter" style="text-align: right;">
                                <a class="btn btn-primary" href="<?php echo base_url('admin/don-hang/thung-rac/khoi-phuc/'); ?>">Phục Hồi Tất Cả</a>
                                <a class="btn btn-warning" href="<?php echo base_url('admin/don-hang/thung-rac/xoa/'); ?>">Xóa Tất Cả</a>
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
                                                    >Địa Chỉ</th>
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
                                                    >Trạng Thái
                                                </th>
                                                <th tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Khôi Phục
                                                </th>
                                                <th style="text-align: center;" tabindex="0" aria-controls="basic-datatable" rowspan="1"
                                                    colspan="1"
                                                    >Xóa
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list as $key => $value): ?>
                                            <tr role="row" class="odd">

                                                <td style="font-weight: bold; color: #346ee0;">ĐH00<?php echo $value['MaDonHang']; ?></td>
                                                <td><?php echo $value['TenKhachHang']; ?></td>
                                                <td><?php echo $value['DiaChi']; ?></td>
                                                <td><?php echo $value['ThoiGian']; ?></td>
                                                <td><?php echo $value['SoLuong']; ?> sản phẩm</td>
                                                <td><?php echo number_format($value['ThanhTien']); ?> đ</td>
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
                                                <td style="text-align: center;"><a href="<?php echo base_url('admin/don-hang/thung-rac/khoi-phuc/'.$value['MaDonHang'].'/') ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-reset"></i></a> </td>

                                                <td style="text-align: center;"><a href="<?php echo base_url('admin/don-hang/thung-rac/xoa/'.$value['MaDonHang'].'/'); ?>"><i style="font-size: 18px; color: #393f4e;" class="bx bx-trash-alt"></i></a></td>
                                                
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
                                            <li style="margin-right: 5px;" class="paginate_button page-item"><a href="<?php echo base_url('admin/don-hang/thung-rac/trang/'.$i.'/') ?>"
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