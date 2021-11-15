<?php
include_once('./../../global.php');
include_once("./../layout/start-admin.php");
include_once('./../../functions.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Tour</a></li>
            <li class="active">Thêm Mới Tour</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới Tour</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="save-add.php" enctype="multipart/form-data" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                           <label>Tên*</label>
                            <input type="text" class="form-control" name ="ten" placeholder="Nhập vào tên">
                        </div>
                        <div class="form-group">
                        <label>Chọn ảnh*</label>
                            <input type="file" name="anh" />
                        </div>
                        <div class="form-group">
                            <label>Ngày đi</label>
                            <input type="date" class="form-control" name= "ngay_di" placeholder="Chọn ngày đi">
                        </div>
                        <div class="form-group">
                            <label>Ngày đến*</label>
                            <input type="date" class="form-control" name= "ngay_den" placeholder="Chọn ngày đến">
                        </div>
                        <div class="form-group">
                            <label>Giá*</label>
                            <input type="text" class="form-control" name= "gia" placeholder="Nhập vào giá">
                        </div> 
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <select name="id_diachi" id="">
                                <option value="0" selected>Chọn địa chỉ</option>
                                <?php
                                $rows = getSelect('id_diachi', 0, 10);
                                foreach ($rows as $row) {
                                    extract($row);
                                ?>
                                    <option value="<?= $id; ?>"><?= $id_diachi; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="id_danhmuc" id="">
                                <option value="0" selected>Chọn danh mục</option>
                                <?php
                                $rows = getSelect('id_danhmuc', 0, 10);
                                foreach ($rows as $row) {
                                    extract($row);
                                ?>
                                    <option value="<?= $id; ?>"><?= $id_danhmuc; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>   
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="mo_ta" id="mo_ta"></textarea>
                        </div>                                       
                        <div class="form-group">
                            <label>Thông tin</label>
                            <textarea name="thong_tin" id="thong_tin" rows="10"></textarea>
                        </div>                  
                        <script src="<?=$website ?>/ckeditor/ckeditor.js"></script>
                        <script>
                            ClassicEditor
                            .create(document.querySelector('#thong_tin'),{
                                ckfinder: {
                                    uploadUrl: '<?=$website ?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                                },
                            })
                            .catch(error => {
                                console.error(error);
                            });
                            ClassicEditor
                            .create(document.querySelector('#mo_ta'),{
                                ckfinder: {
                                    uploadUrl: '<?=$website ?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                                },
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        </script>
                       <br>
                    </div>
                    
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=$website ?>/admin/index.php" class="btn btn-primary"><i class="fa fa-home"></i> Trang chủ</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
  include_once("./../layout/end-admin.php");
?>