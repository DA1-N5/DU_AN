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

$ton_tai = getSelect_one('tour', 'ten', $ten);
if(!empty($ton_tai)){
    $_SESSION['error'] = "Tour đã tồn tại !";
    header("Location: $website/admin/tour/add.php");
    die;
}
save_file($anh, $image_path);
$ngay_them = date('Y-m-d');
insert_tour($ten, $anh['name'], $ngay_di, $ngay_den, $gia, $ngay_them);
header("Location: $website/admin/tour/list.php");
?>
