<?php
include_once('./../../global.php');
include_once("./../layout/start-admin.php");
include_once('./../../functions.php');
$don_hang = getSelect_one("don_hang", 'id', intval($_GET['id']));
$tour = getSelect_one("tour", 'id', $don_hang['id_tour']);
$user = getSelect_one("khach_hang", 'id', $don_hang['id_kh']);
extract($tour);
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Đơn Hàng</a></li>
            <li class="active">Chi Tiết Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thông Tin Khách Hàng</h3>
                </div>
                <div class="box-body">
                <span>Họ Và Tên: <?=$user['ten']?></span><br>
                <span>Email: <?=$user['email']?></span><br>
                <span>SĐT: <?=$user['sdt']?></span><br>
                <span>Địa Chỉ: <?=$don_hang['noi_di']?></span><br>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thông Tin Tour</h3>
                </div>
                <div class="box-body">
                <span>Người lớn: <?=$don_hang['nguoi_lon']?></span><br>
                <span>Trẻ em dưới 10 tuổi: <?=$don_hang['tre_em']?></span><br>
                <span>Đơn giá: <?=number_format($don_hang['gia'])?> VNĐ</span><br>
                <span>Ngày đi: <?=$don_hang['ngay_di']?></span><br>
                <h4>Lịch Trình</h4>
                <p><?=$don_hang['lich_trinh']?></p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
  include_once("./../layout/end-admin.php");
?>