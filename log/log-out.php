<?php
session_start();
require_once('./../global.php');
if(!isset($_SESSION['user'])){
    header("Location: $website/");
    die;
}
unset($_SESSION['user']);
$_SESSION['success'] = "<script>alert('Bạn đã đăng xuất.');</script>";
header("Location: $website/");
?>