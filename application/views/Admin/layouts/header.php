<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Trang Quản Trị Dành Cho Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('public/admin/'); ?>images/favicon.ico">
    <link href="<?php echo base_url('public/'); ?>plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('public/'); ?>plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('public/'); ?>plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('public/'); ?>plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="<?php echo base_url('public/admin/'); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('public/admin/'); ?>css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('public/admin/'); ?>css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-plus"></i> Tạo Mới
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 70px, 0px);">

                            <!-- item-->
                            <a href="<?php echo base_url('admin/san-pham/them/') ?>" class="dropdown-item notify-item">
                                Sản Phẩm
                            </a>

                            <!-- item-->
                            <a href="<?php echo base_url('admin/tin-tuc/them/') ?>" class="dropdown-item notify-item">
                                Tin Tức
                            </a>

                            <!-- item-->
                            <a href="<?php echo base_url('admin/ma-giam-gia/them/') ?>" class="dropdown-item notify-item">
                                Mã Giảm Giá
                            </a>

                            <!-- item-->
                            <a href="<?php echo base_url('admin/chuyen-muc/them/') ?>" class="dropdown-item notify-item">
                            Danh Mục
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="badge badge-danger badge-pill">3</span>
                            <i class="mdi mdi-bell"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Thông Báo </h6>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">

                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="<?php echo base_url('public/admin/'); ?>images/avatar.jpg"
                                            class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                                            <p class="font-size-13 mb-1">You have new follower on Instagram</p>
                                            <p class="font-size-12 mb-0 text-muted"><i
                                                    class="mdi mdi-clock-outline"></i> 2 min ago</p>
                                        </div>
                                    </div>
                                </a>
                                
                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-down-circle mr-1"></i> Xem Thêm
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?php echo $_SESSION['anhchinh']; ?>"
                                alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1"><?php echo $_SESSION['hoten']; ?></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="<?php echo base_url('admin/ca-nhan/') ?>">
                                Cá Nhân
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="<?php echo base_url('admin/dang-xuat/') ?>">
                                <span>Đăng Xuất</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div class="navbar-brand-box">
                    <a href="<?php echo base_url('admin/'); ?>" class="logo">
                        <img src="<?php echo base_url('public/admin/'); ?>images/logo-light.png" />
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">QUẢN LÝ CỬA HÀNG</li>

                        <li>
                            <a href="<?php echo base_url('admin/'); ?>" class="waves-effect"><i class='bx bx-home-smile'></i><span class="badge badge-pill badge-primary float-right"></span><span>Trang Chủ</span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-news"></i><span>Tin Tức</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/tin-tuc/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/tin-tuc/them/'); ?>">Thêm Mới</a></li>
                                <li><a href="<?php echo base_url('admin/tin-tuc/thung-rac/'); ?>">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxl-shopify"></i><span>Sản Phẩm</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/san-pham/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/san-pham/them/'); ?>">Thêm Mới</a></li>
                                <li><a href="<?php echo base_url('admin/san-pham/thung-rac/'); ?>">Thùng Rác</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-layer"></i><span>Danh Mục</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/chuyen-muc/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/chuyen-muc/them/'); ?>">Thêm Mới</a></li>
                                <li><a href="<?php echo base_url('admin/chuyen-muc/thung-rac/'); ?>">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-truck"></i><span>Nhà Cung Cấp</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/nha-cung-cap/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/nha-cung-cap/them/'); ?>">Thêm Mới</a></li>
                                <li><a href="<?php echo base_url('admin/nha-cung-cap/thung-rac/'); ?>">Thùng Rác</a>
                            </ul>
                        </li>

                        <li class="menu-title">QUẢN LÝ BÁN HÀNG</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-barcode"></i><span>Mã Giảm Giá</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/ma-giam-gia/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/ma-giam-gia/them/'); ?>">Thêm Mới</a></li>
                                <li><a href="<?php echo base_url('admin/ma-giam-gia/thung-rac/'); ?>">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-contact"></i><span>Liên Hệ</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/lien-he/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/lien-he/thung-rac/'); ?>">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-cart"></i><span>Đơn Hàng</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/don-hang/') ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/don-hang/thung-rac/') ?>">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-user"></i><span>Khách Hàng</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/khach-hang/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/khach-hang/thung-rac/'); ?>">Đang Cấm</a>
                            </ul>
                        </li>

                        <li class="menu-title">HỆ THỐNG</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-dashboard"></i><span>Giao Diện</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?php echo base_url("admin/giao-dien/") ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url("admin/giao-dien/them/") ?>">Thêm Mới</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/cau-hinh/') ?>" class="waves-effect"><i class="bx bx-cog"></i><span>Cấu Hình</span></a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">