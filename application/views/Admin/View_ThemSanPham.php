<?php require(__DIR__.'/layouts/header.php'); ?>

<?php if(isset($error) && !empty($error)){ ?>
<div style="position: fixed; top: 72px; z-index: 100000; right: 11px; display: block; opacity: 1;" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-toggle="toast">
    <div class="toast-header">
        <strong class="mr-auto">Thông Báo</strong>
        <small>Có Lỗi Khi Thêm</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true" class="thoat">×</span>
        </button>
    </div>
    <div class="toast-body">
        <?php echo $error; ?>
    </div>
</div>
<?php } ?>

<?php if(isset($success) && !empty($success)){ ?>
<div style="position: fixed; top: 72px; z-index: 100000; right: 11px; display: block; opacity: 1;" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-toggle="toast">
    <div class="toast-header">
        <strong class="mr-auto">Thông Báo</strong>
        <small>Thành Công</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true" class="thoat">×</span>
        </button>
    </div>
    <div class="toast-body">
        <?php echo $success; ?>
    </div>
</div>
<?php } ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Sản Phẩm</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/san-pham/'); ?>">Sản Phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
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
                    <h4 class="card-title">Nhập thông tin sản phẩm</h4>
                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="simpleinput">Tên Sản Phẩm</label>
                                            <input type="text" id="simpleinput" class="form-control tensanpham" placeholder="Tên Sản Phẩm..." required name="tensanpham">
                                        </div>

                                        <div class="form-group">
                                            <label for="simpleinput">Mô Tả Ngắn</label>
                                            <textarea id="simpleinput" class="form-control" placeholder="Mô tả ngắn..." rows="5" required name="motangan"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Mô Tả Dài</label>
                                            <textarea required class="form-control" id="myTextarea" name="motadai">
                                            </textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Giá Gốc</label>
                                            <input required type="number" class="form-control" id="exampleFormControlInput1" min="1" placeholder="Nhập giá gốc..." name="giagoc">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Giá Bán</label>
                                            <input required type="number" class="form-control" id="exampleFormControlInput1" min="1" placeholder="Nhập giá bán..." name="giaban">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Loại Sản Phẩm</label>
                                            <select name="loaisanpham" required class="form-control" id="exampleFormControlSelect1">
                                                <option value="3">Bình Thường</option>
                                                <option value="1">Nổi Bật</option>
                                                <option value="2">Siêu Giảm Giá</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Danh Mục</label>
                                            <select required class="form-control" id="exampleFormControlSelect1" name="chuyenmuc">
                                            	<?php foreach ($category as $key => $value): ?>
                                            		<option value="<?php echo $value['MaChuyenMuc']; ?>"><?php echo $value['TenChuyenMuc']; ?></option>       
                                            	<?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="simpleinput">Thẻ</label>
                                            <input type="text" id="simpleinput" class="form-control" placeholder="Thẻ cách bởi dấu phẩy..." required name="the">
                                        </div>

                                        <div class="form-group">
                                            <label for="simpleinput">Màu Sắc Sản Phẩm</label>
                                            <br>
                                            <label for="color-red" style="margin-right: 15px;">
                                                <input type="checkbox" id="color-red" name="colors[]" value="blue"> Xanh
                                            </label>
                                            <label for="color-blue" style="margin-right: 15px;">
                                                <input type="checkbox" id="color-blue" name="colors[]" value="red"> Đỏ
                                            </label>
                                            <label for="color4" style="margin-right: 15px;">
                                                <input type="checkbox" id="color4" name="colors[]" value="yellow"> Vàng
                                            </label>
                                            <label for="color3" style="margin-right: 15px;">
                                                <input type="checkbox" id="color3" name="colors[]" value="white"> Trắng
                                            </label>
                                            <label for="color2" style="margin-right: 15px;">
                                                <input type="checkbox" id="color2" name="colors[]" value="black"> Đen
                                            </label>
                                            <label for="color1" style="margin-right: 15px;">
                                                <input type="checkbox" id="color1" name="colors[]" value="pink"> Hồng
                                            </label>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="duongdan">Đường Dẫn</label>
                                            <span id="taoduongdan" style="float: right; cursor: pointer; text-decoration: underline;">Tạo Tự Động</span>
                                            <input type="text" id="duongdan" class="form-control" placeholder="Đường dẫn sản phẩm..." required name="duongdan">
                                        </div>

                                        <div class="form-group">
                                            <label>Ảnh Chính</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" required name="anhchinh" id="customFile" onchange="loadFile(event, 'anhchinhload')">
                                                <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                                            </div>   
                                            <br>  
                                            <br> 
                                            <img id="anhchinhload" style="width: 200px; height: 200px;"> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Ảnh Phụ 1</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" required name="anhphu1" id="customFile" onchange="loadFile(event, 'anhphu1load')">
                                                <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                                            </div>
                                            <br>  
                                            <br> 
                                            <img id="anhphu1load" style="width: 200px; height: 200px;">             
                                        </div>

                                        <div class="form-group">
                                            <label>Ảnh Phụ 2</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" required name="anhphu2" id="customFile" onchange="loadFile(event, 'anhphu2load')">
                                                <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                                            </div>
                                            <br>  
                                            <br> 
                                            <img id="anhphu2load" style="width: 200px; height: 200px;">           
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Ảnh Phụ 3</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" required name="anhphu3" id="customFile" onchange="loadFile(event, 'anhphu3load')">
                                                <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                                            </div>
                                            <br>  
                                            <br> 
                                            <img id="anhphu3load" style="width: 200px; height: 200px;">
                                        </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm Sản Phẩm</button>
                                    </form>
                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card -->

                        </div>
                        </div>
                        
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
<script src="<?php echo base_url('public/ckeditor/ckeditor.js'); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    CKEDITOR.replace('myTextarea', {
        // Các tùy chọn khác ...
    });
</script>
<script>
    function createSlug(str) {
        // Chuyển đổi tiếng Việt thành dạng slug
        str = str.toLowerCase().trim();
        str = str.replace(/\s+/g, '-'); // Thay thế khoảng trắng bằng dấu gạch ngang
        str = convertVietnameseToSlug(str); // Xử lý các dấu tiếng Việt

        return str;
    }

    function convertVietnameseToSlug(str) {
        var slug = str;

        // Xử lý dấu tiếng Việt
        slug = slug.replace(/[áàảãạăắằẳẵặâấầẩẫậ]/g, 'a');
        slug = slug.replace(/[éèẻẽẹêếềểễệ]/g, 'e');
        slug = slug.replace(/[íìỉĩị]/g, 'i');
        slug = slug.replace(/[óòỏõọôốồổỗộơớờởỡợ]/g, 'o');
        slug = slug.replace(/[úùủũụưứừửữự]/g, 'u');
        slug = slug.replace(/[ýỳỷỹỵ]/g, 'y');
        slug = slug.replace(/đ/g, 'd');

        return slug;
    }

    var loadFile = function(event, idLoad) {
        var output = document.getElementById(idLoad);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
    };
    $(document).ready(function(){
        $('#taoduongdan').click(function(){
            if($(".tensanpham").val() == ""){
                alert("Vui lòng nhập tên sản phẩm")
            }else{
                $("#duongdan").val(createSlug($(".tensanpham").val()))
            }
        })

        $('.close').click(function(){
            $(".toast").attr("style", "display: none;")
        })
    });
</script>
<?php require(__DIR__.'/layouts/footer.php'); ?>