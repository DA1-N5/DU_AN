<?php
session_start();
require_once('./../global.php');
require_once('./../functions.php');

/* Login Form */
extract($_REQUEST);
    if(empty($email) || empty($mat_khau)) {
        $_SESSION['error'] = 'Không được để trống.';
        header("location: $website/log/loginform.php");
        die;
    }
    $user = getSelect_one('khach_hang', 'email', $email);
    
    if (empty($user) || md5($mat_khau) != $user['mat_khau']) {
        $_SESSION['error'] = 'Mật khẩu hoặc tài khoản không đúng.';
        header("location: $website/log/loginform.php");
        die;
    }
    $_SESSION['user'] = $user;
    $_SESSION['success'] = "<script>alert('Đăng nhập thành công.');</script>";
    if(isset($_SESSION['id_tour'])){
        $id_tour = $_SESSION['id_tour'];
        unset($_SESSION['id_tour']);
        header("location: $website/tour-detail.php?id=$id_tour");
        die;
    }
    header("Location: $website/");
?>
    

