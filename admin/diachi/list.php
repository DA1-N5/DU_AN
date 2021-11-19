<?php
require_once('./../../global.php');
require_once("./../layout/start-admin.php");
require_once("./../../functions.php");
$start = 0;
$quantity = 10;
$result = getSelect('dia_chi', $start, $quantity);
?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông tin địa chỉ
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Địa chỉ</a></li>
            <li class="active">Danh Sách Địa chỉ</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="add.php" class="btn btn-success">+Thêm mới Địa chỉ</a>

                    <div class="box-tools">
                        <form action="<?=$website?>/admin/diachi/find-user.php" class="input-group input-group-sm" style="width: 150px;" method="GET">
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
                                <td colspan="1">ID</td>
                                <td colspan="1">Địa chỉ</td>
                                <td>Ngày tạo</td>
                                <td>Trạng Thái</td>
                                <td colspan="2">Thao Tác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(empty($result)){
                            } else {
                                foreach($result as $values) {?>
                                <tr>
                                    <td>
                                        
                                        <?=$values['id']?>
                                    </td>
                                    <td>
                                        
                                        <?=$values['dia_chi']?>
                                    </td>
                                   
                                    <td>
                                        
                                        <?=$values['ngay_tao']?>
                                    </td>
                                    <td>
                                        
                                        <?php
                                        if($values['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=$website?>/admin/diachi/status.php?id=<?=$values['id']?>&st=1" class="btn btn-success">Hoạt Động</a> <!--trạng thái đang hoạt động ấn vào để chuyển trạng thái khóa-->
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=$website?>/admin/diachi/status.php?id=<?=$values['id']?>&st=2" class="btn btn-danger">Khóa</a> <!--trạng thái đang khóa ấn vào để chuyển trạng thái hoạt động-->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        
                                        <a href="<?=$website?>/admin/diachi/update.php?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=$website?>/admin/diachi/delete.php?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
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