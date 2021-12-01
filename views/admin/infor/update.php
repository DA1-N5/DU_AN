<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Giới Thiệu</a></li>
            <li class="active">Cập nhật Giới Thiệu</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Cập nhật Giới Thiệu</h3>
                    <span style="color: red;">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                </div>
                <form role="form" action="<?=BASE_URL?>/admin/infor/save-update" method="POST" >
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$result['id']?>">
                            <label>Tên Giới Thiệu</label>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ten"><?=$result['noi_dung']?></textarea>
                            </div>
                            <input type="hidden" class="form-control" name="ten_cu"  value="<?=$result['noi_dung']?>">
                        </div>
                    </div>
                    <div class="box-footer-group">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                        <div class="box-footer">
                            <a href="<?= BASE_URL ?>/admin/infor/list" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>