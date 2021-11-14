<?php

session_start();
require_once('./../global.php');
require_once('./../functions.php');
require_once('./../validate.php');

extract($_REQUEST);
$_SESSION['info'] = $_REQUEST;
// Register
$user = getSelect_one('khach_hang', 'email', $email);
if(empty($email) || empty($mat_khau) || empty($mat_khau2) || empty($ten) || empty($sdt)) {
    $_SESSION['error'] = 'Mời bạn nhập đầy đủ thông tin.';
    header("location: /DU_AN/log/sign-up-form.php");
    die;
}
if(!empty($user)) {
    $_SESSION['error'] = 'Mail bạn vừa nhập đã tồn tại.';
    header("location: /DU_AN/log/sign-up-form.php");
    die;
}
if(strlen($mat_khau) < 6) {
    $_SESSION['error'] = 'Mật khẩu phải ít nhất 6 ký tự.';
    header("location: /DU_AN/log/sign-up-form.php");
    die;
}
if($mat_khau2 != $mat_khau) {
    $_SESSION['error'] = "Mật khẩu xác nhận không khớp";
    header("location: /DU_AN/log/sign-up-form.php");
    die;
}
if(!checkSdt($sdt)) {
    $_SESSION['error'] = 'Số điện thoại không đúng định dạng.';
    header("location: /DU_AN/log/sign-up-form.php");
    die;
}
else {
    $chu_de = "Xác nhận email";
    $code = random_int(0,999999);
    $noi_dung = "Xin chào $ten mã code xác nhận $code";
    $_SESSION['checkMail']['noi_dung'] = $noi_dung;
    $_SESSION['checkMail']['chu_de'] = $chu_de;
    $_SESSION['checkMail']['ten'] = $ten;
    $_SESSION['checkMail']['email'] = $email;
    $_SESSION['code'] = $code;
    header('Location: /DU_AN/sendmail/send.php?id=1');
}
?>