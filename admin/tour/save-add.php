<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
$anh = $_FILES['anh'];
if(
    checkEmpty($ten) == false ||
    checkEmpty($gia) == false ||
    checkEmpty($mo_ta) == false ||
    checkEmpty($thong_tin) == false ||
    checkEmpty($anh['name']) == false 
    

){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/tour/add.php");
    die;
}
if(!checkImage($anh)){
    $_SESSION['error'] = "File phải là ảnh !";
    header("Location: $website/admin/tour/add.php");
    die;
}
save_file($anh, $image_path);
$ngay_them = date('Y-m-d');
insert_tour( $ten, $id_diachi, $anh['name'], $id_danhmuc, $ngay_di, $ngay_den, $mo_ta, $thong_tin, $gia ,$ngay_them);
header("Location: $website/admin/tour/list.php");
?>
