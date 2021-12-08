<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Đơn Hàng</a></li>
            <li class="active">Chi Tiết Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-10">
            <!--TOUR Linh Động-->
            <?php if (isset($user)) { ?>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="<?=BASE_URL?>/admin/order/list" class="btn btn-primary">Quay Lại</a>
                        <h3>Thông Tin Khách Hàng</h3>
                    </div>
                    <div class="box-body">
                        <span>Họ Và Tên: <?= $user['ten'] ?></span><br>
                        <span>Email: <?= $user['email'] ?></span><br>
                        <span>SĐT: <?= $user['sdt'] ?></span><br>
                        <span>Địa Chỉ: <?= $don_hang['noi_di'] ?></span><br>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3>Thông Tin Tour</h3>
                    </div>
                    <div class="box-body">
                        <span>Người lớn: <?= $don_hang['nguoi_lon'] ?></span><br>
                        <span>Trẻ em dưới 10 tuổi: <?= $don_hang['tre_em'] ?></span><br>
                        <span>Đơn giá: <?= number_format($don_hang['gia']) ?> VNĐ</span><br>
                        <span>Ngày đi: <?= $don_hang['ngay_di'] ?></span><br>
                        <h4>Lịch Trình</h4>
                        <p><?= $don_hang['lich_trinh'] ?></p>
                    </div>
                </div>
            <?php } ?>
            <!--TOUR Cố Định-->
            <?php if (!isset($user)) { ?>
                <div class="row box box-primary">
                    <div class="col-md-12 box-header with-border">
                        <a href="<?=BASE_URL?>/admin/order/list" class="btn btn-primary">Quay Lại</a>
                        <h3>Thông Tin Khách Hàng</h3>
                    </div>
                    <?php
                    $i = 1;
                    $coc = 0;
                    $tong = 0;
                    foreach ($don_hang as $don) {
                        $user = getSelect_one('khach_hang', 'id', intval($don['id_kh']));
                    ?>
                        <div class="row col-md-12">
                            <h2 style="border-top: 2px solid #000"></h2>
                            <div class="col-md-6">
                                <br>
                                <span style="color:red">Khách Hàng Thứ <?= $i ?></span><br>
                                <span>Họ Và Tên: <?= $user['ten'] ?></span><br>
                                <span>Email: <?= $user['email'] ?></span><br>
                                <span>SĐT: <?= $user['sdt'] ?></span><br>
                                <span>Địa Chỉ: <?= $don['noi_di'] ?></span><br>
                                <span>Người lớn: <?= $don['nguoi_lon'] ?></span><br>
                                <span>Trẻ em dưới 10 tuổi: <?= $don['tre_em'] ?></span><br>
                                <span>Đơn giá: <?= number_format($don['gia']) ?> VNĐ</span><br>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <?php
                                if($don['trang_thai'] == 2){
                                    $now = strtotime(date('Y-m-d'));
                                    if ((strtotime($don['ngay_di']) - $now < (12 * 3600)) && ($don['dat_coc'] == 2)) {
                                        echo "<span style='color:red'>Quá Hạn Đặt Cọc</span>";
                                    } else {
                                        if ($don['dat_coc'] == 1) {
                                ?>
                                        <a href="<?= BASE_URL ?>/admin/order/deposit?id=<?= $don['id'] ?>&dc=1&ct=<?= $don['id_tour'] ?>" class="btn btn-success">Đã đặt cọc</a>
                                    <?php
                                        } else {
                                    ?>
                                        <a href="<?= BASE_URL ?>/admin/order/deposit?id=<?= $don['id'] ?>&dc=2&ct=<?= $don['id_tour'] ?>" class="btn btn-danger">Chưa đặt cọc</a>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                <?php
                                if ($don['trang_thai'] == 1) {
                                ?>
                                    <a href="<?= BASE_URL ?>/admin/order/status?id=<?= $don['id'] ?>&st=1&ct=<?= $don['id_tour'] ?>" class="btn btn-success">Đã thanh toán</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?= BASE_URL ?>/admin/order/status?id=<?= $don['id'] ?>&st=2&ct=<?= $don['id_tour'] ?>" class="btn btn-danger">Chưa thanh toán</a>
                                <?php
                                }
                                ?>
                                <a href="<?= BASE_URL ?>/admin/order/update?id=<?= $don['id'] ?>&ct=<?= $don['id_tour'] ?>" class="btn btn-primary">Update</a>
                                <?php
                                if ($_SESSION['admin']['vai_tro'] == 2) {
                                ?>
                                    <a href="<?= BASE_URL ?>/admin/order/delete?id=<?= $don['id'] ?>&ct=<?= $don['id_tour'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                <?php
                                }
                                ?>
                                <div>
                                    <h4>Truy Thu: </h4>
                                    <span>
                                        <?php
                                        if (intval($don['trang_thai']) == 2) {
                                            if(intval($don['dat_coc']) == 1){
                                                $coc += ($don['gia']) * (30 / 100);
                                            }else {
                                                $coc += 0;
                                            }
                                        ?>
                                            <?= intval($don['dat_coc']) == 1 ? (number_format(($don['gia']) * (30 / 100))) : "0" ?>
                                             
                                        <?php
                                        } else {
                                            $coc += $don['gia'];
                                        ?>
                                            <?= number_format($don['gia']) ?>
                                        <?php
                                        }
                                        ?>
                                        /<?= number_format($don['gia']) ?> VNĐ
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php
                        $tong += $don['gia'];
                        $i++;
                    }
                    ?>
                </div>
                <div><p class="btn btn-success">Tổng tiền: <?=number_format($coc)?>/<?=number_format($tong)?> VNĐ</p></div><br>
                <div class="row box box-primary">
                    <div class="box-header with-border">
                        <h3>Thông Tin Tour</h3>
                    </div>
                    <div class="box-body">
                        <span>Ngày đi: <?= $don['ngay_di'] ?></span><br>
                        <h4>Lịch Trình</h4>
                        <p><?= $don['lich_trinh'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</div>