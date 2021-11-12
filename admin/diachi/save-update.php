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
    header("Location: $website/admin/diachi/update.php?id=$id");
    die;
}

$ton_tai = getSelect_one('dia_chi', 'dia_chi', $dia_chi);
if(!empty($ton_tai) && $dia_chi_cu != $dia_chi){
    $_SESSION['error'] = "Địa chỉ đã tồn tại !";
    header("Location: $website/admin/diachi/update.php?id=$id");
    die;
}

update_diachi($dia_chi,$id,$ngay_tao,$trang_thai);
header("Location: $website/admin/diachi/list.php");
?>