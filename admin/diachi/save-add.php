<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
if(
    
    checkEmpty($dia_chi) == false
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/diachi/add.php");
    die;
}

$ton_tai = getSelect_one('dia_chi', 'diachi', $email);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Địa chỉ đã tồn tại !";
    header("Location: $website/admin/diachi/add.php");
    die;
}


$ngay_them = date('Y-m-d');
insert_diachi($dia_chi, $ngay_tao, $trang_thai, $id);
header("Location: $website/admin/diachi/list.php");
?>