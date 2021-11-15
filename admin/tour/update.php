<?php
include_once('./../../global.php');
include_once("./../layout/start-admin.php");
include_once('./../../functions.php');
$id = intval($_GET['id']);
$result = getSelect_one('tour', 'id', $id);
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản Lý Tour</a></li>
            <li class="active">Update Tour</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Update Tour</h3>
                    <span style="color: red;">
                    <?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                    </span>
                </div>
                <form role="form" action="save-update.php" enctype="multipart/form-data"  method="POST">
                    <input type="hidden" name = "id" value = "<?=$result['id'] ?>">
                    <div class="box-body">
                       <!-- Thêm ở đây -->
                    </div>
                    <div class="box-footer-group">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="box-footer">
                        <a href="<?=$website ?>/admin/index.php" class="btn btn-primary"><i class="fa fa-home"></i> Trang chủ</a>
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