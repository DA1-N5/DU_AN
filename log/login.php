<?php
session_start();
require_once('./../global.php');
require_once('./../functions.php');

/* Login Form */
extract($_REQUEST);
    if(empty($email) || empty($mat_khau)) {
        $_SESSION['error'] = 'Không được để trống.';
        header("location: /DU_AN/log/loginform.php");
        die;
    }
    $user = getSelect_one('khach_hang', 'email', $email);
    
    if (empty($user) || md5($mat_khau) != $user['mat_khau']) {
        $_SESSION['error'] = 'Mật khẩu hoặc tài khoản không đúng.';
        header("location: /DU_AN/log/loginform.php");
        die;
    }
    $_SESSION['user'] = $user;
    $_SESSION['success'] = "<script>alert('Đăng nhập thành công.');</script>";
    header("location: /DU_AN/");
    

