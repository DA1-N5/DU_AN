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