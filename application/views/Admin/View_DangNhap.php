<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Lunoz - Đăng Nhập Hệ Thống Admin!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('public/admin/'); ?>images/favicon.ico">
        <!-- App css -->
        <link href="<?php echo base_url('public/admin/'); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/admin/'); ?>css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/admin/'); ?>css/theme.min.css" rel="stylesheet" type="text/css" />
    
    </head>

<body class="bg-primary">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block my-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-4 mt-3">
                                                <a href="#">
                                                    <span><img src="<?php echo base_url('public/admin/'); ?>images/logo-dark.png" alt="" height="26"></span>
                                                </a>
                                            </div>
                                            <form method="POST" class="p-2">
                                                <?php if(isset($error) && !empty($error)){ ?>
                                                    <p style="text-align: center; font-weight: bold;"><?php echo $error; ?> </p>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label for="emailaddress">Tài khoản</label>
                                                    <input class="form-control" type="text" id="emailaddress" required="" name="taikhoan" placeholder="Nhập tài khoản...">
                                                </div>
                                                <div class="form-group">
                                                    <a href="pages-recoverpw.html" class="text-muted float-right">Quên mật khẩu?</a>
                                                    <label for="password">Mật khẩu</label>
                                                    <input class="form-control" type="password" required="" id="password" name="matkhau" placeholder="Nhập mật khẩu...">
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit"> Đăng Nhập </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="<?php echo base_url('public/admin/'); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url('public/admin/'); ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('public/admin/'); ?>js/metismenu.min.js"></script>
    <script src="<?php echo base_url('public/admin/'); ?>js/waves.js"></script>
    <script src="<?php echo base_url('public/admin/'); ?>js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url('public/admin/'); ?>js/theme.js"></script>

</body>

</html>