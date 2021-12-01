<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Giới Thiệu</a></li>
            <li class="active">Thêm Mới Giới Thiệu</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Thêm mới Giới Thiệu</h3>
                    <span style="color: red;">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </span>
                </div>
                <form role="form" action="<?= BASE_URL ?>/admin/infor/save-add" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nội Dung </label>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ten"></textarea>
                                <script src="<?= BASE_URL ?>/ckeditor/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#noi_dung'), {
                    ckfinder: {
                        uploadUrl: '<?= BASE_URL ?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                    },
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer-group">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
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