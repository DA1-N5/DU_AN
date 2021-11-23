<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Đơn Hàng</a></li>
            <li class="active">Chi Tiết Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <?php if(isset($user)){?>
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
            <?php }?>
            <?php if(!isset($user)){?>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thông Tin Khách Hàng</h3>
                </div>
                <?php 
                $i = 1;
                foreach($don_hang as $don){
                    $user = getSelect_one('khach_hang', 'id', intval($don['id_kh']));
                ?>
                <div class="box-body">
                <span style="color:red">Khách Hàng Thứ <?=$i?></span><br>
                <span>Họ Và Tên: <?=$user['ten']?></span><br>
                <span>Email: <?=$user['email']?></span><br>
                <span>SĐT: <?=$user['sdt']?></span><br>
                <span>Địa Chỉ: <?=$don['noi_di']?></span><br>
                <span>Người lớn: <?=$don['nguoi_lon']?></span><br>
                <span>Trẻ em dưới 10 tuổi: <?=$don['tre_em']?></span><br>
                <span>Đơn giá: <?=number_format($don['gia'])?> VNĐ</span><br>
                </div>
                <?php
                    $now = strtotime(date('Y-m-d'));
                    if(strtotime($don['ngay_di']) - $now < (48*3600)){
                        echo "<span style='color:red'>Quá Hạn Đặt Cọc</span>";
                    } else {
                        if($don['dat_coc'] == 1){
                    ?>
                    <a href="<?=BASE_URL?>/admin/order/deposit?id=<?=$don['id']?>&dc=1" class="btn btn-success">Đã đặt cọc</a>
                    <?php
                        } else {
                    ?>
                    <a href="<?=BASE_URL?>/admin/order/deposit?id=<?=$don['id']?>&dc=2" class="btn btn-danger">Chưa đặt cọc</a>
                    <?php
                        }
                    }
                ?>
                <?php
                    if($don['trang_thai'] == 1){
                    ?>
                    <a href="<?=BASE_URL?>/admin/order/status?id=<?=$don['id']?>&st=1" class="btn btn-success">Đã thanh toán</a>
                    <?php
                    } else {
                    ?>
                    <a href="<?=BASE_URL?>/admin/order/status?id=<?=$don['id']?>&st=2" class="btn btn-danger">Chưa thanh toán</a>
                    <?php
                    }
                ?>
                <a href="<?=BASE_URL?>/admin/order/update?id=<?=$don['id']?>" class="btn btn-primary">Update</a>
                <?php
                    if($_SESSION['admin']['vai_tro'] == 2){
                ?>
                <a href="<?=BASE_URL?>/admin/order/delete?id=<?=$don['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                <?php
                    }
                ?> 
                <?php
                $i++;
                }
                ?>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thông Tin Tour</h3>
                </div>
                <div class="box-body">
                
                <span>Ngày đi: <?=$don['ngay_di']?></span><br>
                <h4>Lịch Trình</h4>
                <p><?=$don['lich_trinh']?></p>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
</div>