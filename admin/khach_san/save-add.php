<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
$date = date(DATE_ATOM);
if(empty($ten_ks) || empty($mo_ta) || empty($id_dc) || empty($dia_chi_ct) || empty($sdt) || empty($trang_thai)){
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

insert_ks($ten_ks, $anh, $mo_ta, intval($id_dc), $dia_chi_ct, $sdt, $trang_thai, $date);
header("Location: $website/admin/khach_san/list.php");
?>