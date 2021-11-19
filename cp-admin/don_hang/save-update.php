<?php
session_start();
include_once("./../../functions.php");  
require_once ('./../../validate.php');
include_once('./../../global.php');
extract($_REQUEST);
if( 
    checkEmpty($ngay_di) == false ||
    checkEmpty($noi_di) == false ||
    checkEmpty($gia) == false ||
    checkEmpty($email) == false 
){
    $_SESSION['error'] = "Vui lòng không để trống !";
    header("Location: $website/admin/don_hang/update.php?id=$id");
    die;
}

$user = getSelect_one("khach_hang", 'email', $email);
if(empty($user)){
    $_SESSION['error'] = "Email không có trong dữ liệu !";
    header("Location: $website/admin/don_hang/update.php?id=$id");
    die;
}
if(empty($nguoi_lon)){
    $nguoi_lon = 0;
}
if(empty($tre_em)){
    $tre_em = 0;
}
if(!checkInt(intval($nguoi_lon))){
    $_SESSION['error'] = "Số lượng người lớn không đúng định dạng !";
    header("Location: $website/admin/don_hang/update.php?id=$id");
    die;
}

if(!checkInt(intval($tre_em))){
    $_SESSION['error'] = "Số lượng trẻ em không đúng định dạng !";
    header("Location: $website/admin/don_hang/update.php?id=$id");
    die;
}

if(!checkInt(intval($gia))){
    $_SESSION['error'] = "Giá không đúng định dạng !";
    header("Location: $website/admin/don_hang/update.php?id=$id");
    die;
}
update_donhang($id_tour, $user['id'], $nguoi_lon, $tre_em, $ngay_di, $noi_di, $gia, $lich_trinh, $id);
header("Location: $website/admin/don_hang/list.php");
?>