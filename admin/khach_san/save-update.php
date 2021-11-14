<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);

if(empty($ten_ks) || empty($mo_ta) || empty($id_dc) || empty($dia_chi_ct) || empty($sdt) || empty($trang_thai)){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/khach_san/update.php?id=$id");
    die;
}

$ton_tai = getSelect_one('khach_san', 'ten_ks', $ten_ks);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Tên khách sạn đã tồn tại!";
    header("Location: $website/admin/khach_san/update.php?id=$id");
    die;
}

update_ks($ten_ks,$anh,$mo_ta,$id_dc,$dia_chi_ct,$sdt,$tinh_trang,$id);
header("Location: $website/admin/khach_san/list.php");
?>