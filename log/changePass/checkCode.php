<?php
session_start();
require_once "./../../functions.php";
require_once "./../../validate.php";

extract($_REQUEST);
if(!checkEmpty($code)) {
    $_SESSION['error'] = 'Mời bạn nhập mã code!';
    header('Location: /DU_AN/log/changePass/checkCode-form.php');
    die;
}

if(isset($_SESSION['code'])) {
    if(intval($_SESSION['code']) != intval($code)) {
        $_SESSION['error'] = 'Mã code sai';
        header('Location: /DU_AN/log/changePass/checkCode-form.php');
        die;
    }
}

    header('location: /DU_AN/log/changePass/changePass-form.php');


// if(isset($_SESSION['info'])) {
//     extract($_SESSION['info']);
//         $new_pass = update_status('khach_hang', 'mat_khau', $mat_khau);
//         if(empty($new_user)) {
//             $_SESSION['success'] = "<script>alert('Đăng ký thành công');</script>";
//             header("location: /DU_AN/log/loginform.php");
//             die;
//         }
//     unset($_SESSION['info']);
//     die;
// }
?>