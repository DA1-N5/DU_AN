<?php
require_once "./../../functions.php";

session_start();
extract($_REQUEST);

$email = $_SESSION['checkMail']['email'];
if(strlen($mat_khau) < 6) {
    $_SESSION['error'] = 'Mật khẩu phải ít nhất 6 ký tự.';
    header("location: /DU_AN/log/changePass/changePass-form.php");
    die;
}

if($mat_khau2 != $mat_khau) {
    $_SESSION['error'] = "Mật khẩu xác nhận không khớp";
    header("location: /DU_AN/log/changePass/changePass-form.php");
    die;
}

$newPass = update_user_one(md5($mat_khau), $email);
if(!empty($newPass)) {
    $_SESSION['success'] = "<script>alert('Đổi mật khẩu không thành công');</script>";
    header("location: /DU_AN/log/loginform.php");
    die;
}
else {
    $_SESSION['success'] = "<script>alert('Đổi mật khẩu thành công');</script>";
    header("location: /DU_AN/log/loginform.php");
    die;
}

