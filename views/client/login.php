<<<<<<< Updated upstream
=======
<?php
session_start();
require_once "../global.php";
if(isset($_SESSION['user'])){
    header("Location: <? BASE_URL/");
    die;
}
if(isset($_GET['id_tour'])){
    $_SESSION['id_tour'] = $_GET['id_tour'];
}
?>
>>>>>>> Stashed changes
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/login.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-background"></div>
        <div class="auth-container">
<<<<<<< Updated upstream
            <form class="auth-form" action="<?= BASE_URL ?>/save-login" method="post">
=======
            <form class="auth-form" action="login.php" method="post">
>>>>>>> Stashed changes
                <div class="auth-form--title">
                    <h1>Đăng Nhập vào tài khoản</h1>
                </div>
                <div class="auth-form--body">

                    <div class="mb-3">
                        <span style="color: red;">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="" placeholder="snowwhite@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" name="mat_khau" id="password" placeholder="******">
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
<<<<<<< Updated upstream
                        <a href="<?= BASE_URL ?>/sign-up" id="hihi">Đăng Kí ngay</a>
                        <a href="<?= BASE_URL ?>/forget" id="hihi">Quên mật khẩu?</a>
=======
                        <a href="./sign-up-form.php" id="hihi">Đăng Kí ngay</a>
                        <a href="./changePass/forgetps-form.php" id="hihi">Quên mật khẩu?</a>
>>>>>>> Stashed changes
                    </div>
                    <button type="submit" class="btn btn-blue mb-3">Đăng nhập</button>

                </div>
            </form>
        </div>
    </div>
</body>

</html>