<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
$anh = $_FILES['anh'];
 
if(
    checkEmpty($ten) == false ||
    checkEmpty($bien_so) == false ||
    checkEmpty($anh['name']) == false ||
    checkEmpty($so_ghe) == false 

){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/phuongtien/add.php");
    die;
}

if(!checkBien($bien_so)){
    $_SESSION['error'] = "Biển số sai định dạng !";
    header("Location: $website/admin/phuongtien/add.php");
    die;
}
$ton_tai_bien= getSelect_one('phuong_tien','bien_so', $bien_so);
if(!empty($ton_tai_bien)){
    $_SESSION['error'] = "Biển số đã tồn tại !";
    header("Location: $website/admin/phuongtien/add.php");
    die;
}
if(!checkImage($anh)){
    $_SESSION['error'] = "File phải là ảnh!";
    header("Location: $website/admin/phuongtien/add.php");
    die;
}

$ton_tai = getSelect_one('phuong_tien', 'bien_so', $bien_so);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Phương tiện đã tồn tại !";
    header("Location: $website/admin/phuongtien/add.php");
    die;
}
save_file($anh,$image_path);
$ngay_them = date('Y-m-d');
insert_phuongtien($ten, $bien_so, $so_ghe,$anh['name'],$ngay_them);
header("Location: $website/admin/phuongtien/list.php");
?>