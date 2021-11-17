<?php
session_start();
require_once("./global.php");
require_once("./layout_user/start-user.php");

// Thông báo đăng nhập thành công (có thể bỏ đi)
// if (isset($_SESSION['success'])) {
//     echo $_SESSION['success'];
//     unset($_SESSION['success']);
// }

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
                            <form action="">
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
                            <form action="">
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
                            <form action="">
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
                            <form action="">
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
                            <form action="">
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
                            <form action="">
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

<article aria-label="Page navigation example" class="col-1" style="margin: 20px auto 20px auto;">
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
<?php
require_once("./layout_user/end-user.php");
?>