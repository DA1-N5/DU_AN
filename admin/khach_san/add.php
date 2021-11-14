<?php
include_once('./../../global.php');
include_once("./../layout/start-admin.php");
include_once('./../../functions.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý khách sạn</a></li>
            <li class="active">Thêm Mới khách sạn</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới khách sạn</h3>
                    <span style="color: red;">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                </div>
                <form role="form" action="save-add.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tên khách sạn</label>
                            <input type="text" class="form-control" name="ten_ks" placeholder="Nhập tên khách sạn">
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" class="form-control" name="anh" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="mo_ta" class="form-control" cols="30" rows="6"></textarea>
                            <!-- <input type="text" class="form-control" name="mo_ta" placeholder="Mô tả"> -->
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <select name="id_dc" id="">
                                <option value="0">-------</option>
                                <?php
                                $rows = getSelect('dia_chi', 0, 10);
                                foreach ($rows as $row) {
                                    extract($row);
                                ?>
                                    <option value="<?= $id; ?>"><?= $dia_chi; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ chi tiết</label>
                            <input type="text" class="form-control" name="dia_chi_ct" placeholder="Địa chỉ chi tiết">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" placeholder="******">
                        </div>
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <select name="trang_thai">
                                <option value="1">Hoạt động</option>
                                <option value="2">Khóa</option>
                            </select>
                        </div>
                    </div>

                    <div class="box-footer-group">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                        <div class="box-footer">
                            <a href="<?= $website ?>/admin/index.php" class="btn btn-primary"><i class="fa fa-home"></i> Trang chủ</a>
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