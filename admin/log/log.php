<?php
session_start();
require_once('./../../global.php');
require_once('./../../connect_DB.php');
require_once('./../../functions.php');
require_once('./../../validate.php');
extract($_REQUEST);
if (
    checkEmpty($email) == false ||
    checkEmpty($mat_khau) == false
    ) {
        $_SESSION['error'] = "Vui lòng không để trống !";
        header("Location: $website/admin/log/login.php");
        die;
    }

$admin = getSelect_one('admin', 'email', $email);
if(empty($admin) || $admin['mat_khau'] != md5($mat_khau)){
    $_SESSION['error'] = "Thông tin email hoặc mật khẩu không chính xác !";
    header("Location: $website/layout/login/log.php");
    die;
}
$_SESSION['admin'] = $admin;

header("Location: $website/admin/index.php");
?>