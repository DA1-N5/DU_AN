<?php

use MicrosoftAzure\Storage\Common\Internal\Serialization\ISerializer;

require_once('./../../global.php');
require_once("./../layout/start-admin.php");
require_once("./../../functions.php");
$start = 0;
$quantity = 10;
if(isset($_GET['id'])){
    $values = getSelect_one('tour', 'id', intval($_GET['id']));
} else {
    $result = getSelect('tour', $start, $quantity);
}
?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông Tin Tour
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Tour</a></li>
            <li class="active">Danh Sách Tour</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="add.php" class="btn btn-success">+Thêm mới Tour</a>

                    <div class="box-tools">
                        <form action="" class="input-group input-group-sm" style="width: 150px;" method="GET">
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
                                <td>Ảnh</td>
                                <td>Ngày đi</td>
                                <td>Ngày đến</td>
                                <td>Giá</td>
                                <td>Ngày tạo</td>
                                <td>Ngày sửa</td>
                                <td>Trạng thái</td>
                                <td>Thao Tác</td>
                                <td>Khác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(!isset($result) || empty($result)){
                            } else if(!empty($result) ) {
                                foreach($result as $values) {
                            ?>
                                <tr>
                                    <td>
                                        <?=$values['id']?>
                                    </td>
                                    <td>
                                        <?=$values['ten']?>
                                    </td>
                                    <td>
                                        <img src="<?=$url_images . $values['anh']?>" width="50px" alt="">
                                    </td>
                                    <td>
                                        <?=$values['ngay_di']?>
                                    </td>
                                    <td>
                                        <?=$values['ngay_den']?>
                                    </td>
                                    <td>
                                        <?=$values['gia']?>
                                    </td>
                                    <td>
                                        <?=$values['ngay_tao']?>
                                    </td>
                                    <td>
                                        <?=$values['ngay_sua']?>
                                    </td>
                                    <td>
                                        <?php
                                        if($values['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=$website?>/admin/tour/status.php?id=<?=$values['id']?>&st=1" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=$website?>/admin/tour/status.php?id=<?=$values['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?=$website?>/admin/tour/update.php?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=$website?>/admin/tour/delete.php?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                    <td>
                                    <a href="<?=$website?>/admin/don_hang/add.php?id=<?=$values['id']?>" class="btn btn-primary">Đặt Tour</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            if (isset($values)){
                            ?>
                                <tr>
                                    <td>
                                        <?=$values['id']?>
                                    </td>
                                    <td>
                                        <?=$values['ten']?>
                                    </td>
                                    <td>
                                        <img src="<?=$url_images . $values['anh']?>" width="50px" alt="">
                                    </td>
                                    <td>
                                        <?=$values['ngay_di']?>
                                    </td>
                                    <td>
                                        <?=$values['ngay_den']?>
                                    </td>
                                    <td>
                                        <?=$values['gia']?>
                                    </td>
                                    <td>
                                        <?=$values['ngay_tao']?>
                                    </td>
                                    <td>
                                        <?=$values['ngay_sua']?>
                                    </td>
                                    <td>
                                        <?php
                                        if($values['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=$website?>/admin/tour/status.php?id=<?=$values['id']?>&st=1" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=$website?>/admin/tour/status.php?id=<?=$values['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?=$website?>/admin/tour/update.php?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=$website?>/admin/tour/delete.php?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                    <td>
                                    <a href="<?=$website?>/admin/don_hang/add.php?id=<?=$values['id']?>" class="btn btn-primary">Đặt Tour</a>
                                    </td>
                                </tr>
                            <?php
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