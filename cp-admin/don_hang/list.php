<?php
require_once('./../../global.php');
require_once("./../layout/start-admin.php");
require_once("./../../functions.php");
$start = 0;
$quantity = 10;
$result = getSelect('don_hang', $start, $quantity);
?>
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Thông tin Đơn Hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Đơn Hàng</a></li>
            <li class="active">Danh Sách Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <br>
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
                                <td>Tour</td>
                                <td>Khách Hàng</td>
                                <td>Giá</td>
                                <td>Ngày đi</td>
                                <td>Đặt Cọc</td>
                                <td>Trạng Thái</td>
                                <td>Thao Tác</td>
                                <td>Khác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(empty($result)){
                            } else {
                                foreach($result as $values) {
                                    $tour = getSelect_one('tour', 'id', intval($values['id_tour']));
                                    $user = getSelect_one('khach_hang', 'id', intval($values['id_kh']));
                            ?>
                                <tr>
                                    <td>
                                        <?=$values['id']?>
                                    </td>
                                    <td>
                                        <a href="<?=$website?>/admin/tour/list.php?id=<?=$values['id_tour']?>" class="btn btn-default"><?=$tour['ten']?></a>
                                    </td>
                                    <td>
                                        <a href="<?=$website?>/admin/users/list.php?id=<?=$values['id_kh']?>" class="btn btn-default"><?=$user['ten']?></a>
                                    </td>
                                    <td>
                                        <?=number_format($values['gia'])?> VNĐ
                                    </td>
                                    <td>
                                        <?=$values['ngay_di']?>
                                    </td>
                                    <td>
                                        <?php
                                        $now = strtotime(date('Y-m-d'));
                                        if(strtotime($values['ngay_di']) - $now < (48*3600)){
                                            echo "<h5 style='color:red'>Quá Hạn Đặt Cọc</h5>";
                                        } else {
                                            if($values['dat_coc'] == 1){
                                        ?>
                                        <a href="<?=$website?>/admin/don_hang/deposit.php?id=<?=$values['id']?>&st=1" class="btn btn-success">Đã đặt cọc</a>
                                        <?php
                                            } else {
                                        ?>
                                        <a href="<?=$website?>/admin/don_hang/deposit.php?id=<?=$values['id']?>&st=2" class="btn btn-danger">Chưa đặt cọc</a>
                                        <?php
                                            }
                                        }
                                        ?>                                 
                                    </td>
                                    <td>
                                        <?php
                                        if($values['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=$website?>/admin/don_hang/status.php?id=<?=$values['id']?>&st=1" class="btn btn-success">Đã thanh toán</a>
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=$website?>/admin/don_hang/status.php?id=<?=$values['id']?>&st=2" class="btn btn-danger">Chưa thanh toán</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?=$website?>/admin/don_hang/update.php?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=$website?>/admin/don_hang/delete.php?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                    <td>
                                        <a href="<?=$website?>/admin/don_hang/detail.php?id=<?=$values['id']?>" class="btn btn-default">Xem Chi Tiết</a>     
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