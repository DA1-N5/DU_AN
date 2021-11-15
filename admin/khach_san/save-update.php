<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');

extract($_REQUEST);
$id = $_SESSION['id'];
$anh = $_FILES['anh'];


if(empty($ten_ks) || empty($mo_ta) || empty($id_dc) || empty($dia_chi_ct) || empty($sdt)){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/khach_san/update.php?id=$id");
    die;
}

$ton_tai = getSelect_one('khach_san', 'ten_ks', $ten_ks);
if(!empty($ton_tai) && $ten_ks_cu != $ten_ks){
    $_SESSION['error'] = "Tên khách sạn không được trùng với khách sạn cũ   !";
    header("Location: $website/admin/khach_san/update.php?id=$id");
    die;
}
if(!checkSdt($sdt)) {
    $_SESSION['error'] = 'Số điện thoại không đúng định dạng.';
    header("location: $website/admin/khach_san/update.php?id=$id");
    die;
}

$khach_san = getSelect_one('khach_san', 'id', $id);
if(!checkEmpty($anh['name'])) {
    update_ks($ten_ks,$khach_san['anh'],$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id);
}
else {
    if(!checkImage($anh)) {
        $_SESSION['error'] = "File không phải là ảnh !";
        header("Location: $website/admin/khach_san/update.php?id=$id");
        die;
    }
    save_file($anh, $image_path);
    unlink($image_path . $khach_san['anh']);
    update_ks($ten_ks,$anh['name'],$mo_ta,$id_dc,$dia_chi_ct,$sdt,$id);
}
header("Location: $website/admin/khach_san/list.php");
?>