<?php
session_start();
require_once "./../functions.php";

extract($_REQUEST);

if(isset($_SESSION['code'])) {
    if(intval($_SESSION['code']) != intval($code)) {
        $_SESSION['error'] = 'Mã code sai';
        header('Location: /DU_AN/log/formCheckCode.php');
        die;
    }
}

if(isset($_SESSION['info'])) {
    extract($_SESSION['info']);
    $date = date('d m Y');
        $new_user = insert_user($ten, md5($mat_khau), $email, $sdt, $date);
        if(empty($new_user)) {
            $_SESSION['success'] = "<script>alert('Đăng ký thành công');</script>";
            header("location: /DU_AN/log/loginform.php");
            die;
        }
    unset($_SESSION['info']);
    die;
}
?>