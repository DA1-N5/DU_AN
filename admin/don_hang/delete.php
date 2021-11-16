<?php
include_once("./../../global.php");
require_once ('./../../functions.php');
$id = intval($_GET['id']);
$phuong_tien = getSelect_one('phuong_tien','id',$id);
unlink($image_path . $phuong_tien['anh']);
getDelete('phuong_tien', 'id', $id);
header("Location: $website/admin/phuongtien/list.php");
?>