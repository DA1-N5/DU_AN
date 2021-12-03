<div style="margin-top: 150px;"></div>
<h1 class="heading" style="margin-bottom:50px"><span>Chi Tiết Tour</span> </h1>
<div class="row col-8" style="margin:auto">
    <div class="col-6"><img src="<?= IMAGE_URL . $value['anh'] ?>" alt="" width="100%"></div>
    <div class="col-6">
        <h1 style="font-size:30px"><?= $value['ten'] ?></h1>
        <h1 style="border-bottom:1px solid #000"></h1>
        <p style="font-size:20px">Mô tả:</p>
        <h2><?= $value['mo_ta'] ?></h2>
        <h1 style="border-bottom:1px solid #000"></h1>
        <br>
        <h3>- Người Lớn: <span style="font-size:20px; color:red"><?= number_format($value['gia']) ?> VNĐ</span></h3>
        <h3>- Trẻ em dưới 10 tuổi: <span style="font-size:20px; color:red"><?=number_format(floor((intval($value['gia']))*(70/100)))?> VNĐ</span></h3>
        <h3>- Trẻ em dưới 3 tháng tuổi: <span style="font-size:20px; color:red">0 VNĐ</span></h3>
        <?php
            if (!isset($_SESSION['user'])) {
            ?>
                <a href="<?=BASE_URL?>/login?id_tour=<?=$_GET['id']?>" class="btn" style="border: 2px solid #000;padding: 5px; font-size:15px">Đăng nhập ngay để liên hệ đặt tour</a>
            <?php
            } else {
            ?>
                <a href="tel:1234567890" class="btn" style="border: 2px solid #000;padding: 10px; font-size:20px">Liên Hệ Để Đặt Tour</a>
            <?php
            }
            ?>
    </div>

</div>

<div class="col-8" style="margin: 50px auto;">
    <h1 style="border-bottom:1px solid #000"></h1>
</div>
<div class="col-7" style="margin:auto">
<h1 class="heading" style="margin-bottom:50px"><span class="fas fa-map"> Lịch Trình</span> </h1>
    <h2><?= $value['thong_tin'] ?></h2>
</div>
<div class="col-7" style="margin:auto">
    <h1 class="heading" style="margin-top:50px"><span>Đánh Giá</span> </h1>
    <div style="margin-bottom: 50px;">
        <?php
        if (empty($comment)) {
            echo "<h2 style='text-align: center; color:red'>Chưa có đánh giá !</h2>";
        } else {
            foreach ($comment as $value) {
                $user = getSelect_one('khach_hang', 'ma_khach_hang', $value['ma_khach_hang']);
        ?>
                <h4><?= $user['ten'] ?></h4>
                <div class="stars">
                    <?php
                    for ($i = 0; $i < intval($value['danh_gia']); $i++) {
                    ?>
                        <i class="fas fa-star"></i>
                    <?php
                    }
                    for ($j = 0; $j < (5 - intval($value['danh_gia'])); $j++) {
                    ?>
                        <i class="far fa-star"></i>
                    <?php
                    }
                    ?>
                    <br>
                    <br>
                    <p style="font-size:17px"><?= $value['noi_dung'] ?></p>
                    <p>
                        <?php
                        if (strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']) < 60) {
                            echo (strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) . " Giây trước";
                        } else if ((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 3600) {
                            echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) / 60) . " Phút trước";
                        } else if ((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 86400) {
                            echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) / 3600) . " Giờ trước";
                        } else if ((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 2592000) {
                            echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) / 86400) . " Ngày trước";
                        } else {
                            echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) / 2592000) . " Tháng trước";
                        }

                        ?>
                    </p>
                </div>
                <h1 style="border-bottom:1px solid #000"></h1>
        <?php
            }
        }
        ?>
    </div>
    <h1 class="col-12" style="border-bottom:1px solid #000"></h1>
    <h1 class="col-12" style="border-bottom:1px solid #000"></h1>
    <h1 class="col-12" class="col-10" style="border-bottom:1px solid #000"></h1>
    <div style="margin: 20px"></div>
    <style>
        

        /*reset css*/
        div,
        label {
            margin: 0;
            padding: 0;
        }

        /****** Style Star Rating Widget *****/
        #rating {
            border: none;
            float: left;
        }

        #rating>input {
            display: none;
        }

        /*ẩn input radio - vì chúng ta đã có label là GUI*/
        #rating>label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        /*1 ngôi sao*/
        #rating>label {
            float: right;
        }

        /*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
        /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
        #rating>input:checked~label,
        #rating:not(:checked)>label:hover,
        #rating:not(:checked)>label:hover~label {
            color: #ff9f1a;
        }

        /* Hover vào các sao phía trước ngôi sao đã chọn*/
        #rating>input:checked+label:hover,
        #rating>input:checked~label:hover,
        #rating>label:hover~input:checked~label,
        #rating>input:checked~label:hover~label {
            color: #FFD700;
        }
    </style>
    <div class="col-12" id="comment">
        <?php
        if (isset($_SESSION['error_cmt'])) {
            echo $_SESSION['error_cmt'];
            unset($_SESSION['error_cmt']);
        }
        ?>

        <form action="" method="POST">
            <h2>Đánh giá</h2>
            <input type="hidden" name="ma_san_pham" value="">
            <input type="hidden" name="ma_khach_hang" value="">
            <div id="rating">
                <input type="radio" id="star5" value="5" name="danh_gia" />
                <label class="full" for="star5" title="Tuyệt vời quá"></label>

                <input type="radio" id="star4" value="4" name="danh_gia" />
                <label class="full" for="star4" title="Rất tốt"></label>

                <input type="radio" id="star3" value="3" name="danh_gia" />
                <label class="full" for="star3" title="Bình thường"></label>

                <input type="radio" id="star2" value="2" name="danh_gia" />
                <label class="full" for="star2" title="Tạm được"></label>

                <input type="radio" id="star1" value="1" name="danh_gia" />
                <label class="full" for="star1" title="Không thích"></label>
            </div>
            <br><br>
            <br><br>
            <h2>Nội dung*</h2><br>
            <textarea name="noi_dung" id="noi_dung" placeholder="Tối đa 2000 kí tự"></textarea>
            <?php
            if (!isset($_SESSION['user'])) {
            ?>
                <a href="#" class="btn" style="border: 2px solid #000;padding: 5px; font-size:15px">Đăng nhập ngay để đánh giá</a>
            <?php
            } else {
            ?>
                <button class="btn" style="border: 2px solid #000;padding: 10px">Gửi Đánh Giá</button>
            <?php
            }
            ?>
        </form>
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
        <div style="margin: 50px"></div>
    </div>
</div>


<section class="products" id="products">

    <h1 class="heading"> Tour <span>Liên Quan</span> </h1>

    <div class="container">
        <div class="row g-2">

            <div class="col-3">
                <div class="col-6" id="so1">
                    <a href="#">
                        <div class="img">
                            <img src="images/anh1.png.jpg" style="max-width:100%">
                        </div>
                        <div class="conten-item">
                            <span>1.000.000 VNĐ</span><br>
                            <h2 class="btn btn-primary">Xem Thêm</h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3">
                <div class="col-6" id="so1">
                    <a href="#">
                        <div class="img">
                            <img src="images/anh1.png.jpg" style="max-width:100%">
                        </div>
                        <div class="conten-item">
                            <span>1.000.000 VNĐ</span><br>
                            <h2 class="btn btn-primary">Xem Thêm</h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3">
                <div class="col-6" id="so1">
                    <a href="#">
                        <div class="img">
                            <img src="images/anh1.png.jpg" style="max-width:100%">
                        </div>
                        <div class="conten-item">
                            <span>1.000.000 VNĐ</span><br>
                            <h2 class="btn btn-primary">Xem Thêm</h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-3">
                <div class="col-6" id="so1">
                    <a href="#">
                        <div class="img">
                            <img src="images/anh1.png.jpg" style="max-width:100%">
                        </div>
                        <div class="conten-item">
                            <span>1.000.000 VNĐ</span><br>
                            <h2 class="btn btn-primary">Xem Thêm</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>