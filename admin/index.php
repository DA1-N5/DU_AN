<?php
require_once('./../global.php');
require_once('./layout/start-admin.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1 style="text-align: center; font-size: 30px; margin: 30px;">
            Thông Tin
        </h1>
    </section>

    <section style="margin: 0 auto; max-width: 1000px">
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr; grid-gap: 30px">
        <a href="<?=$url_admin?>admins/list-admin.php" class="btn btn-default"><span style="font-size: 20px;">Có <br> Quản Trị Viên</span></a>
        <a href="<?=$url_admin?>users/list-user.php" class="btn btn-default"><span style="font-size: 20px;">Có <br> Khách Hàng</span></a>
        <a href="<?=$url_admin?>goods/list-product.php" class="btn btn-default"><span style="font-size: 20px;">Có <br> Tour</span></a>
        <a href="<?=$url_admin?>catetory/list-catetory.php" class="btn btn-default"><span style="font-size: 20px;">Có <br> Danh Mục</span></a>
        <a href="<?=$url_admin?>comment/list-comment.php" class="btn btn-default"><span style="font-size: 20px;">Có <br> Bình Luận</span></a>
    </div>
    

    </section>
</div>
<?php
require_once('./layout/end-admin.php');
?>
