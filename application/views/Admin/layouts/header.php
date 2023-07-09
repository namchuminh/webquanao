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
                                        <img src="<?php echo base_url('public/admin/'); ?>images/users/avatar-2.jpg"
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
                            <img class="rounded-circle header-profile-user" src="<?php echo base_url('public/admin/'); ?>images/users/avatar-3.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Jamie D.</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                Cá Nhân
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
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
                    <a href="index.html" class="logo">
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
                                <li><a href="ui-butto46554ns.html">Danh Sách</a></li>
                                <li><a href="ui-car4654ds.html">Thêm Mới</a></li>
                                <li><a href="ui-caro4564usel.html">Thùng Rác</a>
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
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-layer"></i><span>Chuyên Mục</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-buttons.html">Danh Sách</a></li>
                                <li><a href="ui-cards.html">Thêm Mới</a></li>
                                <li><a href="ui-carousel.html">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-truck"></i><span>Nhà Cung Cấp</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-butt1ons.html">Danh Sách</a></li>
                                <li><a href="ui-car1ds.html">Thêm Mới</a></li>
                                <li><a href="ui-car1ousel.html">Thùng Rác</a>
                            </ul>
                        </li>

                        <li class="menu-title">QUẢN LÝ BÁN HÀNG</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-barcode"></i><span>Mã Giảm Giá</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-butt21ons.html">Danh Sách</a></li>
                                <li><a href="ui-car12ds.html">Thêm Mới</a></li>
                                <li><a href="ui-car12ousel.html">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-contact"></i><span>Liên Hệ</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-butt21foans.html">Danh Sách</a></li>
                                <li><a href="ui-car12aoausel.html">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-cart"></i><span>Đơn Hàng</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-butt21fons.html">Danh Sách</a></li>
                                <li><a href="ui-car12aousel.html">Thùng Rác</a>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-user"></i><span>Khách Hàng</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-butt21aoens.html">Danh Sách</a></li>
                                <li><a href="ui-car12ofeusel.html">Đang Cấm</a>
                            </ul>
                        </li>

                        <li class="menu-title">HỆ THỐNG</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bxs-dashboard"></i><span>Giao Diện</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="ui-butt21fons.html">Danh Sách</a></li>
                                <li><a href="ui-buttgdf21fons.html">Thêm Mới</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect"><i class="bx bx-cog"></i><span>Cấu Hình</span></a>
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