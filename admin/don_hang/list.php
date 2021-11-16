<?php
require_once('./../../global.php');
require_once("./../layout/start-admin.php");
require_once("./../../functions.php");
$start = 0;
$quantity = 10;
$result = getSelect('phuong_tien', $start, $quantity);
?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông tin phương tiện
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý phương tiện</a></li>
            <li class="active">Danh Sách phương tiện</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="add.php" class="btn btn-success">+Thêm mới phương tiện</a>

                    <div class="box-tools">
                        <form action="<?=$website?>/admin/phuongtien/find-user.php" class="input-group input-group-sm" style="width: 150px;" method="GET">
                            <input type="text" name="id" class="form-control pull-right"placeholder="Search ID">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tên</td>
                                <td>Biển số</td>
                                <td>Số ghê</td>
                                <td>Ảnh</td>
                                <td>Ngày tạo</td>
                                <td>Ngày bận</td>
                                <td>Ngày hoạt dộng</td>
                                <td>Trạng Thái</td>
                                <td>Thao Tác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(empty($result)){
                            } else {
                                foreach($result as $values) {?>
                                <tr>
                                    <td>
                                        <br>
                                        <?=$values['id']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?=$values['ten']?>
                                    </td>
                                   
                                    <td>
                                        <br>
                                        <?=$values['bien_so']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?=$values['so_ghe']?>
                                    </td>
                                    <td>
                                        <br>
                                        <img src="<?=$url_images . $values['anh']?>" width="50px" alt="">                                       
                                    </td>
                                    <td>
                                        <br>
                                        <?=$values['ngay_tao']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?=$values['ngay_ban']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?=$values['ngay_hoat_dong']?>
                                    </td>
                                    <td>
                                        <br>
                                        <?php
                                        if($values['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=$website?>/admin/phuongtien/status.php?id=<?=$values['id']?>&st=1" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=$website?>/admin/phuongtien/status.php?id=<?=$values['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <br>
                                        <a href="<?=$website?>/admin/phuongtien/update.php?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=$website?>/admin/phuongtien/delete.php?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                </tr>
                            <?php
                                }
                            } 
                            ?>
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include_once("./../layout/end-admin.php");
?>