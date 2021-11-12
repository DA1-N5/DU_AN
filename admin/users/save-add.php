<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
if(
    checkEmpty($email) == false ||
    checkEmpty($mat_khau) == false ||
    checkEmpty($ten) == false ||
    checkEmpty($sdt) == false
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/users/add.php");
    die;
}

$ton_tai = getSelect_one('khach_hang', 'email', $email);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Email đã tồn tại !";
    header("Location: $website/admin/users/add.php");
    die;
}

$mat_khau = md5($mat_khau);

if (checkEmail($email) == false){
    $_SESSION['error'] = "Email không đúng định dạng !";
    header("Location: $website/admin/users/add.php");
    die;
}

if (checkSdt($sdt) == false){
    $_SESSION['error'] = "Số điện thoại không đúng định dạng !";
    header("Location: $website/admin/users/add.php");
    die;
}
$ngay_them = date('Y-m-d');
insert_user($email, $mat_khau, $ten, $sdt, $ngay_them);
header("Location: $website/admin/users/list.php");
?>