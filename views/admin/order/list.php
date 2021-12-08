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
                            <select class="form-control-sm" onchange="location=this.value;" >
                                <option value="0" selected>Chọn danh mục</option>
                                <?php
                                $rows = getSelect('danh_muc', 0, 10);
                                foreach ($rows as $row) {
                                    extract($row);
                                ?>
                                    <option value=" <?=BASE_URL?>/admin/tour/list?id_ct=<?= $id; ?>"><?= $ten; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select name="" id="" onchange="location=this.value;">
                                <option value="">Chọn trạng Thái</option>
                                <option value=" <?=BASE_URL?>/admin/tour/list?id_st=1">Hoạt động</option>
                                <option value=" <?=BASE_URL?>/admin/tour/list?id_st=2">Khóa</option>                  
                            </select>
                    <br>
                    <div class="box-tools">
                        <span>
                        <div class="dropdown">
                            
                            <a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-search"></i>
                            </a>

                            <form action="list" method="POST" style="width:300px" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <div>
                                        <a>Chọn ngày đi:</a>
                                        <input type="date" class="form-control" name="ngay_di" style="font-size: 17px;" value="">
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a>Tìm kiếm giá hoặc nơi khởi hành:</a>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="values" style="font-size: 17px;" placeholder="Nhập vào giá, địa chỉ khởi hành" value="">
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <select class="form-select" style="font-size: 17px;" name="dia_chi">
                                            <option selected value="">Bạn muốn đi đâu?</option>
                                            <?php
                                            if (empty($address)) {
                                            } else {
                                                foreach ($address as $value) {
                                                    if ($value['trang_thai'] == 1) {
                                            ?>
                                                        <option value="<?= $value['id'] ?>"><?= $value['dia_chi'] ?></option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <button type="submit" style="font-size:17px" name="search_order" class="btn btn-default form-control">Tìm kiếm</button>
                                    </div>
                                </li>
                            </form>
                        </div>
                        </span>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tour</td>
                                <td>Khách Hàng</td>
                                <td>Truy Thu</td>
                                <td>Ngày đi</td>
                                <td>Đặt Cọc</td>
                                <td>Trạng Thái</td>
                                <td>Thao Tác</td>
                                <td>Khác</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            if(empty($result1)){
                            } else {
                                foreach($result1 as $value) {
                                    foreach($value as $values) {
                                    $tour = getSelect_one('tour', 'id', intval($values['id_tour']));
                                    $user = getSelect_one('khach_hang', 'id', intval($values['id_kh']));
                            ?>
                                <tr>
                                    <td>
                                        <?=$values['id']?>
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/tour/list?id=<?=$values['id_tour']?>" class="btn btn-default"><?=$tour['ten']?></a>
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/user/list?id=<?=$values['id_kh']?>" class="btn btn-default"><?=$user['ten']?></a>
                                    </td>
                                    <td>
                                            <?php
                                            if (intval($values['trang_thai']) == 2) {
                                            ?>
                                                <?= intval($values['dat_coc']) == 1 ? (number_format(($values['gia']) * (30 / 100))) : "0" ?>
                                            <?php
                                            } else {
                                            ?>
                                                <?= number_format($values['gia']) ?>
                                            <?php } ?>
                                            /<?= number_format($values['gia']) ?> VNĐ
                                    </td>
                                    <td>
                                        <?=$values['ngay_di']?>
                                    </td>
                                    <td>
                                        <?php
                                        $now = strtotime(date('Y-m-d'));
                                        if((strtotime($values['ngay_di']) - $now < (12*3600)) && ($values['dat_coc'] == 2)){
                                            echo "<h5 style='color:red'>Quá Hạn Đặt Cọc</h5>";
                                        } else {
                                        if($values['dat_coc'] == 1){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/order/deposit?id=<?=$values['id']?>&dc=1" class="btn btn-success">Đã đặt cọc</a>
                                        <?php
                                            } else {
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/order/deposit?id=<?=$values['id']?>&dc=2" class="btn btn-danger">Chưa đặt cọc</a>
                                        <?php
                                            }
                                        }
                                        ?>                                 
                                    </td>
                                    <td>
                                        <?php
                                        if($values['trang_thai'] == 1){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/order/status?id=<?=$values['id']?>&st=1" class="btn btn-success">Đã thanh toán</a>
                                        <?php
                                        } else {
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/order/status?id=<?=$values['id']?>&st=2" class="btn btn-danger">Chưa thanh toán</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/order/update?id=<?=$values['id']?>" class="btn btn-success">Update</a>
                                        <?php
                                            if($_SESSION['admin']['vai_tro'] == 2){
                                        ?>
                                        <a href="<?=BASE_URL?>/admin/order/delete?id=<?=$values['id']?>" onclick="return confirm('Bạn có chắc muốn xóa không ? ')" class="btn btn-danger">Delete</a>
                                        <?php
                                            }
                                        ?>        
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/order/detail?id=<?=$values['id']?>" class="btn btn-default">Xem Chi Tiết</a>     
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                            }
                            if(empty($result)){
                            } else {
                                foreach($result as $values) {
                                    foreach($values as $value) {
                                    $tour = getSelect_one('tour', 'id', intval($value['id_tour']));
                                    $users = select_user_by_id_tour(intval($value['id_tour']));
                                    $don_hang = select_status_order(intval($value['id_tour'])); 
                                    $don_hang1 = select_deposit_order(intval($value['id_tour']));
                            ?>
                                <tr>
                                    <td>
                                        <?=$value['id']?>
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/tour/list?id=<?=$value['id_tour']?>" class="btn btn-default"><?=$tour['ten']?></a>
                                    </td>
                                    <td>
                                        <a href="<?php admin_render('user/list.php', ['result' => $users])?>" class="btn btn-default">Có <?=count($users)?> Khách hàng</a>
                                    </td>
                                    <td></td>
                                    <td>
                                        <?=$value['ngay_di']?>
                                    </td>
                                    <td>
                                    <h5><?=count($user) - count($don_hang1) >= 1 ? "Có " . count($don_hang1) . " khách hàng đã đặt cọc" : "Tất cả khách hàng đã đặt cọc"?></h5>                            
                                    </td>
                                    <td>
                                        <h5><?=count($user) - count($don_hang) >= 1 ? "Có " . count($don_hang) . " khách hàng đã thanh toán" : "Tất cả khách hàng đã thanh toán"?></h5>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <a href="<?=BASE_URL?>/admin/order/detail?ed=<?=$value['id_tour']?>" class="btn btn-default">Xem Chi Tiết</a>     
                                    </td>
                                </tr>
                            <?php
                                    }
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