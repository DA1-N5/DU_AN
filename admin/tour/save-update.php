<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
$anh = $_FILES['anh'];
$ngay_sua = date('Y-m-d');
if(
    checkEmpty($ten) == false ||
    checkEmpty($gia) == false ||
    checkEmpty($mo_ta) == false ||
    checkEmpty($thong_tin) == false 
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/tour/add.php?id=$id");
    die;
}
if(!checkInt($gia)){
    $_SESSION['error'] = "Giá không đúng định dạng !";
    header("Location: $website/admin/tour/add.php?id=$id");
    die;
}
$tour = getSelect_one('tour','id',$id);
if(!checkEmpty($anh['name'])){
    update_tour($ten, $id_diachi, $tour['anh'], $id_danhmuc, $ngay_di, $ngay_den, $mo_ta, $thong_tin, $gia, $ngay_sua, $id);
} else{
    if(!checkImage($anh)){
        $_SESSION['error'] = "File không phải là ảnh !";
        header("Location: $website/admin/tour/update.php?id=$id");
        die;
    }
    save_file($anh,$image_path);
    unlink($image_path . $tour['anh']);
    update_phuongtien($ten, $id_diachi, $anh['name'], $id_danhmuc, $ngay_di, $ngay_den, $mo_ta, $thong_tin, $gia, $ngay_sua, $id);
}   
header("Location: $website/admin/tour/list.php");
?>
