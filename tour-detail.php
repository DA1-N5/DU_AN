<?php
session_start();
require_once("./global.php");
require_once("./layout_user/start-user.php");
$comment = [];
?>

<div style="margin-top: 150px;"></div>
<h1 style="text-align: center; color: #ff9f1a; margin: 50px 0px;">Chi Tiết Tour</h1>
<div class="container mt-5 rows" style="display:grid; grid-template-columns: 3fr 2fr">
    <div><img src="./images/anh1.png.jpg" alt="" width="70%"></div>
    <div>
        <h2 style="font-size:30px">Du Lịch Bái Đính - Tràng An</h2>
        <h1 style="border-bottom:1px solid #000"></h1>
        <p style="font-size:17px">Mô tả:</p>
        <p style="font-size:17px">ABC ................ XYZ</p>
        <h1 style="border-bottom:1px solid #000"></h1>
        <br>
        <h3 style="font-site:20px">1.000.000 VNĐ</h3>
        <a href="tel:1234567890" class="btn" style="border: 2px solid #000;padding: 10px">Liên Hệ Để Đặt Tour</a>
    </div>
    
</div>

<div class="container" style="margin-top: 50px;">
<h1 style="border-bottom:1px solid #000"></h1>
</div>
<div class="lichtrinh">
            <h2>Lịnh Trình</h2>
            <p>Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất ba tiếng.

Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Hà Nội.
Đến sân bay Nội Bài, Hướng Dẫn Viên đón đoàn, Khởi hành đến Hạ Long. Đến núi Yên Tử - 
ngọn núi cao 1068 m so với mực nước biển, một thắng cảnh thiên nhiên còn lưu giữ hệ thống các di tích lịch 
sử văn hóa gắn với sự ra đời, hình thành và phát triển của thiền phái Trúc Lâm Yên Tử, được mệnh danh là “đấ
t tổ Phật giáo Việt Nam”.
Trưa: Dùng cơm trưa.
Quý khách lên núi bằng cáp treo (chi phí cáp treo tự túc), tham quan chùa Hoa Yên, Bảo Tháp, Trúc L
âm Tam Tổ, Hàng Tùng 700 tuổi…xuống núi tham quan Thiền Viện Trúc Lâm với quả cầu Như Ý nặng 6 tấn đư
ợc xếp kỷ lục guiness Việt Nam.
Đoàn khởi hành đến Hạ Long
Tối: Dùng bữa tối. Nghỉ đêm tại Hạ Long.

Quý khách tự do dạo phố, mua sắm tại chợ đêm hoặc tham gia khu Sunworld Hạ Long Park với tất cả khu trò chơi trong nhà, ngoài trời hoành tráng có các khu Công viên Rồng, Cáp treo Nữ Hoàng vòng quay Sun wheel…(chi phí tự túc).</p>
</div>
<div class="col-6" style="margin:auto">
    <h1 style="text-align: center; color: #ff9f1a; margin: 50px 0px;" id="cmt">Đánh Giá</h1>
    <div style="margin-bottom: 50px;">
        <?php
        if(empty($comment)){
           echo "<h2 style='text-align: center'>Chưa có đánh giá !</h2>";
        } else {
            foreach($comment as $value){
                $user = getSelect_one('khach_hang', 'ma_khach_hang', $value['ma_khach_hang']);
        ?>
        <h4><?=$user['ten']?></h4>
        <div class="stars">
            <?php
            for($i = 0; $i < intval($value['danh_gia']); $i++){
            ?>
            <i class="fas fa-star"></i>
            <?php
            }
            for($j = 0; $j < (5 - intval($value['danh_gia'])); $j++){
            ?>
            <i class="far fa-star"></i>
            <?php
            }
            ?>
            <br>
            <br>
            <p style="font-size:17px"><?=$value['noi_dung']?></p>
            <p>
                <?php
                if(strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']) < 60){
                    echo (strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) . " Giây trước";
                } else if((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 3600){
                    echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']))/60) . " Phút trước";
                } else if((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 86400){
                    echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']))/3600) . " Giờ trước";
                } else if((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them'])) < 2592000){
                    echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']))/86400) . " Ngày trước";
                } else {
                    echo floor((strtotime(date('Y-m-d H:i:s')) - strtotime($value['ngay_them']))/2592000) . " Tháng trước";
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
    <h1 style="border-bottom:1px solid #000"></h1>
    <h1 style="border-bottom:1px solid #000"></h1>
    <h1 style="border-bottom:1px solid #000"></h1>
    <div style="margin: 20px"></div>
    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
        /*reset css*/
        div,label{margin:0;padding:0;}
        /****** Style Star Rating Widget *****/
        #rating{border:none;float:left;}
        #rating>input{display:none;}/*ẩn input radio - vì chúng ta đã có label là GUI*/
        #rating>label:before{margin:5px;font-size:1.25em;font-family:FontAwesome;display:inline-block;content:"\f005";}/*1 ngôi sao*/
        #rating>label{float:right;}/*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
        /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
        #rating>input:checked~label,
        #rating:not(:checked)>label:hover, 
        #rating:not(:checked)>label:hover~label{color:#ff9f1a;}
        /* Hover vào các sao phía trước ngôi sao đã chọn*/
        #rating>input:checked+label:hover,
        #rating>input:checked~label:hover,
        #rating>label:hover~input:checked~label,
        #rating>input:checked~label:hover~label{color:#FFD700;} 
    </style>
    <div id="comment">
        <?php
        if(isset($_SESSION['error_cmt'])){
            echo $_SESSION['error_cmt'];
            unset($_SESSION['error_cmt']);
        }
        ?>
    
        <form action="" method="POST">
            <h2>Đánh giá</h2>
            <input type="hidden" name="ma_san_pham" value="">
            <input type="hidden" name="ma_khach_hang" value="">
            <div id="rating">
                <input type="radio" id="star5" value="5" name="danh_gia"/>
                <label class = "full" for="star5" title="Tuyệt vời quá"></label>

                <input type="radio" id="star4" value="4" name="danh_gia"/>
                <label class = "full" for="star4" title="Rất tốt"></label>

                <input type="radio" id="star3" value="3" name="danh_gia"/>
                <label class = "full" for="star3" title="Bình thường"></label>

                <input type="radio" id="star2" value="2" name="danh_gia"/>
                <label class = "full" for="star2" title="Tạm được"></label>

                <input type="radio" id="star1" value="1" name="danh_gia"/>
                <label class = "full" for="star1" title="Không thích"></label>
            </div>
            <br><br>
            <br><br>
            <h2>Nội dung*</h2><br>
            <textarea rows="5" cols="80" name="noi_dung" placeholder="Tối đa 2000 từ" style="font-size: 15px; border: 1px solid #000; border-radius: 7px;"></textarea>
            <?php
            if(!isset($_SESSION['user'])){
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

<?php
require_once("./layout_user/end-user.php");
?>