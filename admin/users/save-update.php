<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
if(
    checkEmpty($id) == false ||
    checkEmpty($email) == false ||
    checkEmpty($mat_khau) == false ||
    checkEmpty($ten) == false ||
    checkEmpty($sdt) == false
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/users/update.php?id=$id");
    die;
}

$ton_tai = getSelect_one('khach_hang', 'email', $email);
if(!empty($ton_tai) && $email_cu != $email){
    $_SESSION['error'] = "Tài khoản đã tồn tại !";
    header("Location: $website/admin/users/update.php?id=$id");
    die;
}

if($mat_khau_cu == $mat_khau){
    $mat_khau = $mat_khau_cu;
} else {
    $mat_khau = md5($mat_khau);
}

if (checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: $website/admin/users/update.php?id=$id");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: $website/admin/users/update.php?id=$id");
    die;
}
update_user($email, $mat_khau, $ten, $sdt, $id);
header("Location: $website/admin/users/list.php");
?>