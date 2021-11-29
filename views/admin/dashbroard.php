<div class="content-wrapper">
    <section class="content-header">
        <h1 style="text-align: center; font-size: 30px; margin: 30px;">
            Thống Kê
        </h1>
    </section>

    <section style="margin: 0 auto; max-width: 1000px">
    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr; grid-gap: 30px">
        <?php
            if($_SESSION['admin']['vai_tro'] == 2){
        ?>
        <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br> Quản Trị Viên</span></a>
        <?php
        }
        ?>
        <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br> Khách Hàng</span></a>
        <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br> Tour</span></a>
        <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br> Đơn Hàng</span></a>
        <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br> Slider</span></a>
    </div>
    

    </section>
</div>