<?php
require_once("./global.php");
require_once("./layout_user/start-user.php");
?>
<section class="home" id="home">
    <div class="slide-container active">
        <div class="slide">
            <div class="content">
                <h3>Giày nike </h3>
            </div>
            <div class="image">
                <img src="images/home-shoe-2.png.jpg" class="shoe" alt="">
                <img src="images/home-text-1.png" class="text" alt="">
            </div>
        </div>
    </div>
    <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
    <div id="next" class="fas fa-chevron-right" onclick="next()"></div>

</section>
<aside style="margin-top: 150px;">
    <div class="tournoibat">
        <h2>tour Nổi bật</h2>
        <div class="row col-10" style="margin:auto;">
            <div class="col-12   col-sm-12	col-md-12	col-lg-12	col-xl-6    col-xxl-6">
                <img src="images/anh1.png.jpg" style="max-width:100%">
            </div>
            <div style="margin:auto; display:grid; grid-template-rows:1fr 1fr; grid-template-columns:1fr 1fr; grid-gap:5px" class="col-12   col-sm-12	col-md-12	col-lg-12	col-xl-6    col-xxl-6">

                <img src="images/anh1.png.jpg" style="max-width:100%">
                <img src="images/anh1.png.jpg" style="max-width:100%">
                <img src="images/anh1.png.jpg" style="max-width:100%">
                <img src="images/anh1.png.jpg" style="max-width:100%">
            </div>
        </div>
    </div>
    <div class="contenner">

        <h2> Danh sách tour</h2>

    </div>
    <div class="container">
        <div class="row g-2">
         
            <div class="col-6">
            <div class="col-6" id="so1">
                <a href="#">
                <div class="img">
                    <img src="images/anh1.png.jpg" style="max-width:100%">
                </div>
                <div class="conten-item">
                    
            <p>Thông tin tour</p>
            <p>giá</p>

            <input name="productQuantiti" value="" hidden>
            <form action="" >
                <input name="productImage" value="" hidden>
                <input name="productName" value="" hidden>
                <input name="productPrice" value="" hidden>
                <input class="button" type="submit" name="addcard" value="them gh">

            </form>
        </div>
                </a>
            </div>
            </div>
            <div class="col-6">
            <div class="col-6" id="so1">
                <a href="#">
                <div class="img">
                    <img src="images/anh1.png.jpg" style="max-width:100%">
                </div>
                <div class="conten-item">
                    
                <p>Thông tin tour</p>
            <p>giá</p>

            <input name="productQuantiti" value="" hidden>
            <form action="" >
                <input name="productImage" value="" hidden>
                <input name="productName" value="" hidden>
                <input name="productPrice" value="" hidden>
                <input class="button" type="submit" name="addcard" value="them gh">

            </form>
        </div>
                </a>
            </div>
            </div>
            <div class="col-6">
            <div class="col-6" id="so1">
                <a href="#">
                <div class="img">
                    <img src="images/anh1.png.jpg" style="max-width:100%">
                </div>
                <div class="conten-item">
                    
                <p>Thông tin tour</p>
            <p>giá</p>

            <input name="productQuantiti" value="" hidden>
            <form action="" >
                <input name="productImage" value="" hidden>
                <input name="productName" value="" hidden>
                <input name="productPrice" value="" hidden>
                <input class="button" type="submit" name="addcard" value="them gh">

            </form>
        </div>
                </a>
            </div>
            </div>
            <div class="col-6">
            <div class="col-6"id="so1">
                <a href="#">
                <div class="img">
                    <img src="images/anh1.png.jpg" style="max-width:100%">
                </div>
                <div class="conten-item">
                    
                <p>Thông tin tour</p>
            <p>giá</p>

            <input name="productQuantiti" value="" hidden>
            <form action="" >
                <input name="productImage" value="" hidden>
                <input name="productName" value="" hidden>
                <input name="productPrice" value="" hidden>
                <input class="button" type="submit" name="addcard" value="them gh">

            </form>
        </div>
                </a>
            </div>
            </div>
        
        </div>
    </div>
</aside>

    <?php
    require_once("./layout_user/end-user.php");
    ?>