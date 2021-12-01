<section class="home" id="home">
    <?php
    for($i = 0; $i < count($slider); $i++) {
    ?>
    <div class="slide-container <?= ($i == 0) ? 'active' : '' ?>">   
        <a href="<?=$slider[$i]['url']?>">
            <img src="<?= IMAGE_URL . $slider[$i]['image'] ?>" alt="" width="100%" style="height: 60rem;">
        </a>
    </div>
    <?php
    }
    ?>
    <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
    <div id="next" class="fas fa-chevron-right" onclick="next()"></div>
</section>
<aside style="margin-top: 150px;">
    <div class="tournoibat">
        <h1 class="heading"> Tour <span>Nổi bật</span> </h1>
        <div class="row col-10" style="margin:auto;">
            <div class="col-12   col-sm-12	col-md-12	col-lg-12	col-xl-6    col-xxl-6">
                <img src="images/anh1.png.jpg" style="max-width:100%" class="col-12">
            </div>
            <div style="margin:auto;" class="row col-12   col-sm-12	col-md-12	col-lg-12	col-xl-6    col-xxl-6">
                <div class="col-6" style="padding-bottom:7.5px">
                    <img src="images/anh1.png.jpg" style="max-width:100%">
                </div>
                <div class="col-6" style="padding-bottom:7.5px">
                    <img src="images/anh1.png.jpg" style="max-width:100%">
                </div>
                <div class="col-6" style="padding-top:7.5px">
                    <img src="images/anh1.png.jpg" style="max-width:100%">
                </div>
                <div class="col-6" style="padding-top:7.5px">
                    <img src="images/anh1.png.jpg" style="max-width:100%">
                </div>
            </div>
        </div>
    </div>
    <div class="contenner">

        <h1 class="heading"> Tour <span>Mới Nhất</span> </h1>

    </div>
    <div class="col-10" id="row" style="margin:auto">

        <?php
        if (empty($result)) {
        } else {
            foreach ($result as $value) {
                if ($value['trang_thai'] == 1) {
        ?>
                    <div class="" id="so1">
                        <a href="<?= BASE_URL ?>/detail?id=<?= $value['id'] ?>">
                            <div class="img">
                                <img src="<?= IMAGE_URL . $value['anh'] ?>">
                            </div>
                            <div class="conten-item">
                                <h3><?= $value['ten'] ?></h3>
                                <p><?= number_format($value['gia']) ?> VNĐ</p>
                                <a href="<?= BASE_URL ?>/detail?id=<?= $value['id'] ?>" class="btn" style="border: 2px solid #fff;padding: 10px;color:#fff;">Xem Thêm</a>
                            </div>
                        </a>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>

</aside>

<article aria-label="Page navigation example" class="col-1" style="margin: 50px auto 20px auto;">
    <ul class="pagination col-12" style="margin:auto;">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</article>