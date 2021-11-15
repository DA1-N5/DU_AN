<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
$date = date(DATE_ATOM);
$anh = $_FILES['anh'];

if(empty($ten_ks) || empty($mo_ta) || empty($id_dc) || empty($dia_chi_ct) || empty($sdt)){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/khach_san/add.php");
    die;
}

$ton_tai = getSelect_one('khach_san', 'ten_ks', $ten_ks);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Tên khách sạn đã tồn tại!";
    header("Location: $website/admin/khach_san/add.php");
    die;
}
if(!checkSdt($sdt)) {
    $_SESSION['error'] = 'Số điện thoại không đúng định dạng.';
    header("location: $website/admin/khach_san/add.php");
    die;
}

if(!checkImage($anh)) {
    $_SESSION['error'] = 'Loại ảnh không đúng.';
    header("location: $website/admin/khach_san/add.php");
    die;
}

save_file($anh, $image_path);
insert_ks($ten_ks, $anh['name'], $mo_ta, $id_dc, $dia_chi_ct, $sdt, $trang_thai, $date);
header("Location: $website/admin/khach_san/list.php");
?>