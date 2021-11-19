<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="<?= BASE_URL ?>/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/user.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/tour.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/chitiettour.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<style>
    a {
        text-decoration: none;
    }

    .cart {
        position: relative;
    }

    .number {
        position: absolute;
        top: 1;
        left: 1;
        bottom: 1;
        right: 1;
        cursor: pointer;
    }
</style>

<body>
    <header>
        <?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        ?>
        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="<?= BASE_URL ?>/" class="logo">VNTRAVEL</a>

        <nav class="navbar">
            <a href="">Trang Chủ</a>
            <a href="">Giới Thiệu</a>
            <span>
                <select class="form-select" style="font-size: 17px; border:none;" name="ma_loai" onchange="location = this.value;">
                    <option selected>Danh Mục Tour</option>
                    <option value=""></option>
                </select>
            </span>
            <style>
                .container-2 {
                    vertical-align: middle;
                    white-space: nowrap;
                    position: relative;
                }

                .container-2 input#search {
                    width: 50px;
                    height: 50px;
                    background: #fff;
                    border: none;
                    font-size: 10pt;
                    float: left;
                    color: #000;
                    padding-left: 40px;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    color: #000;

                    -webkit-transition: width .55s ease;
                    -moz-transition: width .55s ease;
                    -ms-transition: width .55s ease;
                    -o-transition: width .55s ease;
                    transition: width .55s ease;

                }

                .container-2 input#search::-webkit-input-placeholder {
                    color: #000;
                }

                .container-2 input#search:-moz-placeholder {
                    /* Firefox 18- */
                    color: #000;
                }

                .container-2 input#search::-moz-placeholder {
                    /* Firefox 19+ */
                    color: #000;
                }

                .container-2 input#search:-ms-input-placeholder {
                    color: #000;
                }

                .container-2 .icon {
                    position: absolute;
                    top: 50%;
                    margin-left: 20px;
                    margin-top: 18px;
                    z-index: 1;
                    color: #000;
                    background: none;
                }

                .container-2 input#search:focus,
                .container-2 input#search:active {
                    outline: none;
                }

                .container-2:hover input#search {
                    outline: none;
                    width: 150px;
                    background: #ccc;
                    color: #000;
                }

                .container-2:hover .icon {
                    color: #000;
                    background: none;
                }
            </style>
            <span>
                <div class="box">
                    <form action="find.php" method="POST" class="container-2">
                        <button class="icon"><i class="fas fa-search"></i></button>
                        <input type="search" name="search" id="search" placeholder="Search..." />
                    </form>
                </div>
            </span>
        </nav>

        <div class="icons">
            <span>
                <a href="" type="submit"><i class="fas fa-shopping-bag cart"></i></a>
                <span class="number"><?php echo isset($sosp) ? intval($sosp) : 0 ?></span>
            </span>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <a href='#' class='fas fa-edit'></a>
                <a href='<?= BASE_URL ?>/log-out'><i class='fas fa-user-times'></i></a>
            <?php
            } else {
            ?>
                <a href='<?= BASE_URL ?>/login'><i class='fas fa-user'></i></a>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION['admin'])) {
            ?>
                <a href='<?= BASE_URL ?>/admin' class='fas fa-users-cog'></a>
            <?php
            }
            ?>
        </div>


    </header>
    <!-- START --- CONTENT-->


    <?php include_once $businessView;?>


    <!-- END --- CONTENT-->
    <section class="footer" id="info">

        <div class="box-container">

            <div class="box">
                <h3>Hệ Thống Cửa Hàng</h3>
                <a href="#">Việt Nam</a>
                <a href="#">Mỹ</a>
                <a href="#">Nhật Bản</a>
                <a href="#">Pháp</a>
            </div>

            <div class="box">
                <h3>Xem Nhanh</h3>
                <a href="">Trang Chủ</a>
                <a href="">Sản Phẩm Mới Nhất</a>
                <a href="">Sản Phẩm Nổi Bật</a>
                <a href="">Thông Tin Website</a>
            </div>

            <div class="box">
                <h3>Tác Vụ</h3>
                <a href="#">Tài Khoản</a>
                <a href="#">Yêu Thích</a>
                <a href="#">Đơn Hàng</a>
                <a href="#email">Đăng Kí Nhận Tin</a>
            </div>

            <div class="box">
                <h3>Theo Dõi Chúng Tôi</h3>
                <a href="#"><i class="bi bi-facebook"></i> facebook</a>
                <a href="#"><i class="twitter"></i> twitter</a>
                <a href="#"><i class="instagram"></i> instagram</a>
                <a href="#"><i class="linkedin"></i> linkedin</a>
            </div>
        </div>
    </section>
    <script>
        function confirm_delete() {
            if (confirm("Bạn chắc muốn xóa không ?") === true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <script src="<?= BASE_URL ?>/js/script.js"></script>

</body>

</html>