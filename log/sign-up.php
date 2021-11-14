<?php

session_start();
require_once('./../global.php');
require_once('./../functions.php');

// Register
extract($_REQUEST);
$date = date('d m Y');
$partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
$user = getSelect_one('khach_hang', 'email', $email);
if(empty($email) || empty($mat_khau) || empty($mat_khau2) || empty($ten) || empty($sdt)) {
    $_SESSION['error'] = 'Mời bạn nhập đầy đủ thông tin.';
    header("location: /DU_AN/log/sign-up-form.php");
    die;
}
if(!preg_match($partten, $email, $matchs)) {
    $_SESSION['error'] = 'Mail bạn vừa nhập không đúng định dạng.';
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
if(strlen($sdt) < 10) {
    $_SESSION['error'] = 'Số điện thoại tối thiểu 10 chữ số.';
    header("location: /DU_AN/log/sign-up-form.php");
    die;
}
else {
    $new_user = insert_user($ten, md5($mat_khau), $email, $sdt, $date);
    if(empty($new_user)) {
        $_SESSION['success'] = "<script>alert('Đăng ký thành công');</script>";
        header("location: /DU_AN/log/loginform.php");
    }
}
?>