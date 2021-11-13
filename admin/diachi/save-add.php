<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
if(
    
    checkEmpty($diachi) == false
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/diachi/add.php");
    die;
}

$ton_tai = getSelect_one('dia_chi', 'dia_chi', $diachi);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Địa chỉ đã tồn tại !";
    header("Location: $website/admin/diachi/add.php");
    die;
}


$ngay_tao = date('Y-m-d');
insert_diachi($diachi, $ngay_tao);
header("Location: $website/admin/diachi/list.php");
?>