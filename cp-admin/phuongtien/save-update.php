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
    checkEmpty($so_ghe) == false 

){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/phuongtien/update.php?id=$id");
    die;
}

$ton_tai_bien = getSelect_one('phuong_tien', 'bien_so', $bien_so);
if(!empty($ton_tai_bien) && $bien_so_cu != $bien_so){
    $_SESSION['error'] = "Biển số đã tồn tại !";
    header("Location: $website/admin/phuongtien/update.php?id=$id");
    die;
}
if(!checkBien($bien_so)){
    $_SESSION['error'] = "Biển số sai định dạng !";
    header("Location: $website/admin/phuongtien/update.php?id=$id");
    die;
}
$phuong_tien = getSelect_one('phuong_tien','id',$id);
if(!checkEmpty($anh['name'])){
    update_phuongtien($ten, $bien_so, $so_ghe,$phuong_tien['anh'], $id);
} else{
    if(!checkImage($anh)){
        $_SESSION['error'] = "File không phải là ảnh !";
        header("Location: $website/admin/phuongtien/update.php?id=$id");
        die;
    }
    save_file($anh,$image_path);
    unlink($image_path . $phuong_tien['anh']);
    update_phuongtien($ten, $bien_so, $so_ghe,$anh['name'], $id);
}   
header("Location: $website/admin/phuongtien/list.php");
?>